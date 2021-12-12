@extends('layout.index', ['title' => 'Dashboard', 'heading' => 'Dashboard'])

@section('css')
<style>
    .action-button {
        width: 75% !important;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    #filter-date {
        display: none;
    }

    .select2-container--default.select2 {
        width: 25% !important;
    }

    .header-print {
        visibility: hidden;
        display: none;
    }

    @media print {
        * {
            visibility: hidden;
        }

        .header-logo a img {
            visibility: hidden !important;
        }

        #section-to-print,
        #section-to-print *,
        .header-print {
            visibility: visible;
        }

        .header-print {
            display: block;
        }

        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
        }
    }

</style>
@endsection

@section('action-button')
<button class="button button-info button-lg button-outline" data-toggle="modal" data-target="#modal-courier">ASSIGN TO
    COURIER</button>
@endsection

@section('contents')
<div class="col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h3 class="title">Order List</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered data-table" id="table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>AWB No</th>
                        <!-- <th>Date of Shipment</th> -->
                        <th>Receiver Name</th>
                        <th>Receiver Phone</th>
                        <th>Destination</th>
                        <th>Received Date</th>
                        <th>Status</th>
                        <th>Courier Name</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>
<div class="modal fade" id="modal-courier">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List Courier</h5>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <br>

                <form>
                    <div class="form-group" id="form-courier">
                        <div id="courier-list"></div>
                        <!-- <input type="submit" value=""> -->
                    </div>
                </form>
                <br>

            </div>
            <div class="modal-footer">
                <button class="button button-danger" data-dismiss="modal">Close</button>
                <button class="button button-primary" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables/datatables.active.js') }}"></script>

<!-- Plugins & Activation JS For Only This Page -->
<script src="assets/js/plugins/moment/moment.min.js"></script>

<script>
    let endpoint = '/api/v1/order/get-web';

    $.ajax({
        type: "GET",
        url: endpoint,
        async: false,
        dataType: 'json',
        success: function (response) {
            var tablePeserta = $('#table-data').DataTable({
                data: response.data,
                columns: [{
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: "resi"
                    },
                    {
                        data: "receiver_name"
                    },
                    // {
                    //     data: null,
                    //     render: function (data, type, row, meta) {
                    //         return row.created_at || '-'
                    //     }
                    // },
                    {
                        data: "receiver_phone",
                    },
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return `${row.street} ${row.street_no}, ${row.district}, ${row.city}, ${row.province}, ${row.postal_code}.`
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return row.received_date || '-'
                        }
                    },
                    {
                        data: "status"
                    },
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return row.courier_name || '-'
                        }
                    }
                ],
                responsive: true,
                paging: true,
                language: {
                    paginate: {
                        previous: '<i class="zmdi zmdi-chevron-left"></i>',
                        next: '<i class="zmdi zmdi-chevron-right"></i>'
                    }
                },
            });
        }
    });

    $('#modal-courier').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var res = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-body #courier-list').empty()
        $.ajax({
            url: '/api/v1/courier/get-web',
            type: 'GET',
            contentType: false,
            processData: false,
            success: function (data) {
                data.data.map((e, i) => {
                    modal.find('.modal-body #courier-list').append(
                        `
                        <div class="adomx-checkbox-radio-group">
                            <label class="adomx-checkbox"><input type="checkbox" name="list-courier[]" value="${e.id}" id="courier-id-${e.id}"> <i class="icon"></i> ${e.name} (${e.phone})</label>
                        </div>
                        `
                    )
                })

            }
        });
        modal.find('#saveChanges').click(function () {
            console.log($("input[name='list-courier[]']").val())
            var checked = [];

            $("input[name='list-courier[]']:checked").each(function (index, obj) {
                // loop all checked items
                checked.push($(this).val());
            });

            console.log(checked)
            // alert (checked.join (','));

            // $("input[name='list-courier[]']").each( function () {

            //     alert($(this).val());
            // });
            // $('#saveChanges').attr('style', 'pointer-events:none')

            var formData = new FormData();
            formData.append('list-courier', checked.join (','));
            // formData.append('name', modal.find('.modal-body #recipient-name').val());
            // formData.append('id', res.id);
            $.ajax({
                url: '/api/v1/order/assign-courier',
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (msg) {
                    swal({
                        title: "Success!",
                        text: "Success update data !",
                        icon: "success"
                    }).then(() => {
                        location.href = '/dashboard'
                    })
                }
            });
        });
    })

</script>
<!-- <script src="assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/js/plugins/daterangepicker/daterangepicker.active.js"></script> -->
@endsection
