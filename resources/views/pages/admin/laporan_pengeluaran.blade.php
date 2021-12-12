@extends('layout.index', ['title' => 'Laporan Pengeluaran', 'heading' => 'Pengeluaran'])

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .select2-container{
        z-index:100000;
    }
    .show-calendar{
        z-index:100000;
    }
    .buttons-excel{
        display:none !important;
    }
</style>
@endsection

@section('action-button')
<div class="buttons-group">
    <div class="button button-outline button-success d-inline w-50" id="ExportReporttoExcel">Export Excel</div>
    <a href="#modalCreate" data-toggle="modal" class="button button-outline button-primary d-inline w-50">Tambah Pengeluaran</a>
</div>
@endsection

@section('contents')
<div class="box">
    <div class="box-head">
        <h4>Daftar Pemasukan</h4>
    </div>
    <div class="box-body">
        <table class="table table-bordered data-table text-center" id="data-table-pemasukan">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Pemasukan</th>
                        <th>Lomba</th>
                        <th>Nominal</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
    </div>
</div>
@endsection

@section('modal')
    <!-- Modal Create Pemngeluaran -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createPengeluaran">
                    <div class="form-group mb-3">
                        <label for="">Lomba <span class="text-danger">*</span></label>
                        <select class="form-control select-contest" name="id_contest" id="dd-create-pengeluaran" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Nama Pengeluaran <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Pengeluaran" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Tanggal <span class="text-danger">*</span></label>
                        <input type="text" id="tanggal-pengeluaran" class="form-control" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Nominal <span class="text-danger">*</span></label>
                        <input type="number" name="nominal" class="form-control" placeholder="Jumlah Nominal" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" name="amount" class="form-control" placeholder="Jumlah Pengeluaran" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="type" value="out">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Pemngeluaran -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editPengeluaran">
                    <div class="form-group mb-3">
                        <label for="">Lomba <span class="text-danger">*</span></label>
                        <select class="form-control select-contest" name="id_contest" id="dd-edit-pengeluaran" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Nama Pengeluaran <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Pengeluaran" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Tanggal <span class="text-danger">*</span></label>
                        <input type="text" id="tanggal-pengeluaran-edit" class="form-control" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Nominal <span class="text-danger">*</span></label>
                        <input type="number" name="nominal" class="form-control" placeholder="Jumlah Nominal" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" name="amount" class="form-control" placeholder="Jumlah Pengeluaran" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="type" value="out">
                    <input type="hidden" name="id" id="id-pengeluaran">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('assets/js/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/datatables/datatables.active.js')}}"></script>

<!-- Plugins & Activation JS For Only This Page -->
<script src="{{ asset('assets/js/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/js/plugins/daterangepicker/daterangepicker.active.js')}}"></script>
<script src="{{ asset('assets/js/plugins/inputmask/bootstrap-inputmask.js')}}"></script>
<script>
    dataPengeluaran = () => {
        let data;

        let base_url = window.location.origin;
        let enpoint = base_url+'/api/v1/cash-flow/get';

        $.ajax({
            type: "POST",
            url: enpoint,
            data : {
                'type' : 'out'
            },
            async: false,
            dataType : 'json',
            success: function (response) {
                data = response.data;
            }
        });
        return data;
    }
    dataListLomba = () => {
        let data;
        let masterLomba = [];

        let base_url = window.location.origin;
        let enpoint = base_url+'/api/v1/contest/get-web';

        $.ajax({
            type: "POST",
            url: enpoint,
            data : {
                'status' : 'all'
            },
            async: false,
            dataType : 'json',
            success: function (response) {
                data = response.data;

                data.map((val,index) => {
                    let lomba ={
                        id : val.id,
                        text : val.name
                    }
                    masterLomba.push(lomba);
                })
            }
        });
        return masterLomba;
    }
</script>
<script>
    var dataCash = dataPengeluaran();
    var dataListLomba = dataListLomba();

    $(document).ready(function () {
        $('#tanggal-pengeluaran').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD MMMM YYYY',
            }
        });

        $('#tanggal-pengeluaran-edit').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD MMMM YYYY',
            }
        });

        $('.select-contest').select2({
            placeholder : 'Pilih Lomba',
            data : dataListLomba
        })

        var tablePengeluaran = $('#data-table-pemasukan').dataTable({
                data : dataCash,
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5'
                ],
                columns : [
                    {
                        data : "created_at",
                        render : function (data) {
                                moment.locale('id')

                                let dateParse = moment(data).format('D MMM YYYY');

                                return dateParse;
                            }
                    },
                    {
                        data : "name"
                    },
                    {
                        data : "contest_name"
                    },
                    {
                        data : "nominal",
                        render: function ( data) {
                            let rupiah = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(data);
                            return rupiah;
                        }
                    },
                    {
                        data : "amount"
                    },
                    {
                        data: null,
                        render: function ( data, type, row, meta ) {
                            let subtotal = row.amount * row.nominal;
                            let rupiah = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(subtotal);
                            return rupiah;
                        }
                    },
                    {
                        className: "text-center",
                        data : "id",
                        render : function (data, type, row, meta){
                            return `
                                <a href="#modalEdit" data-toggle="modal" class="button button-info text-white button-sm button-box mr-2 edit-pengeluaran"
                                    data-id=${data}
                                    data-lomba=${row.id_contest}
                                    data-nominal=${row.nominal}
                                    data-tanggal=${row.created_at}
                                    data-name="${row.name}"
                                    data-jumlah=${row.amount}
                                > <i class="fa fa-pencil"></i> </a>
                                <a class="button button-danger text-white button-sm button-box delete-pengeluaran" data-id=${data}> <i class="fa fa-trash"></i> </a>
                                `
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

        // EXPORT EXCEL
        $("#ExportReporttoExcel").click(function() {
            $('.buttons-excel').click();
        });

        // TAMBAH PENGELUARAN
        $('#createPengeluaran').submit(function (e) {
            e.preventDefault();

            var formdata = new FormData(this);
            let pickedDate = $('#tanggal-pengeluaran').val();
            let formatedDate = moment(pickedDate).format('YYYY-MM-DD');

            formdata.append('date',formatedDate);

            $.ajax({
                type: "POST",
                url: base_url+'/api/v1/cash-flow/create',
                data: formdata,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success == true) {
                        swal({
                            title: "Berhasil Tambah Pengeluaran!",
                            text: 'Data pengeluaran perserta berhasil diubah.',
                            icon: "success"
                        }).then(() => {
                            window.location.reload()
                        })
                    }else{
                        swal({
                            title: "Gagal Membuat Pengeluaran!",
                            icon: "error"
                        })
                    }
                }
            });
        });

        // DELETE PENGELUARAN
        $('.delete-pengeluaran').click(function (e) {
            e.preventDefault();
            let idPengeluaran  = $(this).data('id')

            swal({
                title: "Yakin Menghapus data?",
                text: 'Data yang dihapus tidak dapat dikembalikan dan dapat berefek pada data lainnya',
                icon: "error",
                buttons: true,
                dangerMode: true
            }).then((e) => {
                if (e) {
                    let base_url = window.location.origin;
                    let enpoint = base_url+'/api/v1/cash-flow/delete';

                    $.ajax({
                        type: "POST",
                        url: enpoint,
                        data: {
                            id : idPengeluaran
                        },
                        success: function (response) {
                            if (response.success) {
                                console.log(response)
                                swal({
                                    title: "Berhasil Hapus Pengeluaran!",
                                    text: 'Data pengeluaran berhasil dihapus.',
                                    icon: "success"
                                }).then(() => {
                                    window.location.reload()
                                })
                            }else{
                                swal({
                                    title: "Gagal Hapus Pengeluaran!",
                                    icon: "error"
                                })
                            }
                        }
                    });
                }
            })
        });

        // EDIT PENGELUARAN MODAL
        $('.edit-pengeluaran').click(function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let name = $(this).data('name');
            let lomba = $(this).data('lomba');
            let tanggal = $(this).data('tanggal');
            let jumlah = $(this).data('jumlah');
            let nominal = $(this).data('nominal');

            let formatedTanggal = moment(tanggal).format('DD MMMM YYYY')

            $('#editPengeluaran input[name=name]').val(name);
            $('#editPengeluaran input[name=nominal]').val(nominal);
            $('#editPengeluaran input[name=amount]').val(jumlah);
            $('#id-pengeluaran').val(id);
            $('#tanggal-pengeluaran-edit').val(formatedTanggal);
            $('#dd-edit-pengeluaran').val(lomba).trigger('change');

            $('#modalEdit').modal('show');
        });

        // EDIT PENGELUARAN
        $('#editPengeluaran').submit(function (e) {
            e.preventDefault();
            var formdata = new FormData(this);

            let enpoint = base_url+'/api/v1/cash-flow/update';

            $.ajax({
                type: "POST",
                url: enpoint,
                data: formdata,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        swal({
                            title: "Berhasil Edit Pemasukan!",
                            text: 'Data pemasukan baru berhasil ditambahakan.',
                            icon: "success"
                        }).then(() => {
                            window.location.reload()
                        })
                    }else{
                        swal({
                        title: "Gagal Edit Pemasukan!",
                        icon: "error"
                    })
                    }
                }
            });
        });

        loadingFalse();
    });
</script>
@endsection
