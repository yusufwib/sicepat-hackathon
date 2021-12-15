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
                        <th>Name</th>
                        <th>Phone</th>
                    </tr>
                </thead>
            </table>

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
    let endpoint = '/api/v1/courier/get-web';

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
                        data: "name"
                    },
                    {
                        data: "phone"
                    },

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

</script>
<!-- <script src="assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/js/plugins/daterangepicker/daterangepicker.active.js"></script> -->
@endsection
