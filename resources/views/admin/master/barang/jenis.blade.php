@extends('layouts.app')
@section('title','Jenis Barang Non-PC')
@section('content')
<x-head-datatable/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header row">
                    <div class="d-flex justify-content-end align-items-center w-100">
                    @if(Auth::user()->role->name != 'staff')
                        <button class="btn btn-success" type="button" id="modal-button">Tambah Perangkat</button>
                    @endif
                    </div>
                </div>

                <!-- Modal Form untuk Mengisi Jenis Barang -->
                <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="TambahDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TambahDataModalLabel">Tambah Jenis Barang Non-PC</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk Non-PC -->
                                <div id="non-pc-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kode_inventaris">Kode Inventaris</label>
                                            <input type="text" class="form-control" id="kode_inventaris">
                                            <input type="hidden" name="id" id="id">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="jenis_barang">Jenis Barang</label>
                                            <input type="text" class="form-control" id="jenis_barang" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="serial_number">Serial Number</label>
                                            <input type="text" class="form-control" id="serial_number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="merk_type">Merk/Type</label>
                                            <input type="text" class="form-control" id="merk_type">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggal_registrasi">Tanggal Registrasi</label>
                                            <input type="date" class="form-control" id="tanggal_registrasi">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tipe_barang">Tipe Barang</label>
                                            <input type="text" class="form-control" id="tipe_barang">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="kembali">Kembali</button>
                                <button type="button" class="btn btn-success" id="simpan">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#modal-button').click(function() {
                        $('#TambahData').modal('show'); // Munculkan modal "Tambah Data" untuk Non-PC
                        $('#jenis_barang').val('Non-PC'); // Isi kolom jenis barang dengan "Non-PC"
                    });

                    // Ketika tombol "Kembali" ditekan
                    $('#kembali').click(function() {
                        $('#TambahData').modal('hide'); // Sembunyikan modal "Tambah Data"
                    });

                    // Fungsi untuk menyimpan data
                    $('#simpan').on('click', function() {
                        if (validateForm()) {
                            simpan();
                        }
                    });

                    function validateForm() {
                        let valid = true;
                        // Periksa setiap field di form Non-PC
                        $('#non-pc-form input').each(function() {
                            if ($(this).val() === '') {
                                valid = false;
                                // Tambahkan border merah pada input yang kosong
                                $(this).css('border-color', 'red');
                            } else {
                                // Kembalikan border ke warna semula jika sudah diisi
                                $(this).css('border-color', '');
                            }
                        });

                        if (!valid) {
                            // Jika ada field yang kosong, tampilkan alert
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Semua field harus diisi!',
                                confirmButtonColor: '#6FB98F' // Mengubah warna tombol "OK" menjadi hijau
                            });
                        }

                        return valid;
                    }

                    });
                </script>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-jenis" width="100%"  class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="8%">No</th>
                                    <th class="border-bottom-0">Kode Inventaris</th>
                                    <th class="border-bottom-0">Jenis Barang</th>
                                    <th class="border-bottom-0">Serial Number</th>
                                    <th class="border-bottom-0">Merk/Type</th>
                                    <th class="border-bottom-0">Tanggal Registrasi</th>
                                    <th class="border-bottom-0">Tipe Barang</th>
                                    <th class="border-bottom-0">Nama</th>
                                    <th class="border-bottom-0">Keterangan</th>
                                    @if(Auth::user()->role->name != 'staff')
                                    <th class="border-bottom-0" width="1%">Tindakan</th>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-data-table/>
<script>
    function isi(){
        $('#data-jenis').DataTable({
            responsive: true, lengthChange: true, autoWidth: false,
            processing:true,
            serverSide:true,
            ajax:`{{route('barang.jenis.list')}}`,
            columns:[
                {
                    "data":null,"sortable":false,
                    render:function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart+1;
                    }
                },
                {
                    data:'kode_inventaris', // Menambahkan kolom kode inventaris
                    name:'kode_inventaris'
                },
                {
                    data:null, // Menambahkan kolom jenis barang
                    name:'jenis_barang',
                    render:function(){
                        return 'Non-PC';
                    }
                },
                {
                    data:'serial_number',
                    name:'serial_number'
                },
                {
                    data:'merk_type',
                    name:'merk_type'
                },
                {
                    data:'tanggal_registrasi', // Menambahkan kolom tanggal registrasi
                    name:'tanggal_registrasi'
                },
                {
                    data:'tipe_barang', // Menambahkan kolom tipe barang
                    name:'tipe_barang'
                },
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'description',
                    name:'description',
                    render:function(data){
                        if(data == null){
                            return "<span class='font-weight-bold'>-</span>";
                        }
                        return data;
                    }
                },
                @if(Auth::user()->role->name != 'staff')
                {
                    data:'tindakan',
                    name:'tindakan'
                }
                @endif
            ]
        }).buttons().container();
    }

    function simpan() {
        // Logika untuk menyimpan data
        $.ajax({
            url: `{{route('barang.jenis.save')}}`,
            type: "post",
            data: {
                kode_inventaris: $("#kode_inventaris").val(),
                jenis_barang: $("#jenis_barang").val(),
                serial_number: $("#serial_number").val(),
                merk_type: $("#merk_type").val(),
                tanggal_registrasi: $("#tanggal_registrasi").val(),
                tipe_barang: $("#tipe_barang").val(),
                "_token": "{{csrf_token()}}"
            },
            success: function(res) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: res.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#kembali').click();
                // Kosongkan form setelah data disimpan
                $("#kode_inventaris").val(null);
                $("#serial_number").val(null);
                $("#merk_type").val(null);
                $("#tanggal_registrasi").val(null);
                $("#tipe_barang").val(null);
                $('#data-jenis').DataTable().ajax.reload();
            },
            error: function(err) {
                console.log(err.responseJSON.text);
            },
        });
    }


    function ubah(){
            $.ajax({
                url:`{{route('barang.jenis.update')}}`,
                type:"put",
                data:{
                    id:$("#id").val(),
                    name:$("#name").val(),
                    description:$("#desc").val(),
                    "_token":"{{csrf_token()}}"
                },
                success:function(res){
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#kembali').click();
                    $("#name").val(null);
                    $("#desc").val(null);
                    $('#data-jenis').DataTable().ajax.reload();
                    $('#simpan').text('Simpan');
                },
                error:function(err){
                    console.log(err.responJson.text);
                },
                
            });
    }
    
    $(document).ready(function(){
        isi();

        $('#simpan').on('click',function(){
            if($(this).text() === 'Simpan Perubahan'){
                ubah();
            }else{
                simpan();
            }
        });

        $("#modal-button").on("click",function(){
            $("#name").val(null);
            $("#desc").val(null);
            $("#simpan").text("Simpan");
        });

      
    });



    $(document).on("click",".ubah",function(){
        let id = $(this).attr('id');
        $("#modal-button").click();
        $("#simpan").text("Simpan Perubahan");
        $.ajax({
            url:"{{route('barang.jenis.detail')}}",
            type:"post",
            data:{
                id:id,
                "_token":"{{csrf_token()}}"
            },
            success:function({data}){
                
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#desc").val(data.description);
            }
        });
        
    });

    $(document).on("click",".hapus",function(){
        let id = $(this).attr('id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success m-1",
                cancelButton: "btn btn-danger m-1"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Anda Yakin ?",
            text: "Data Ini Akan Di Hapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya,Hapus",
            cancelButtonText: "Tidak, Kembali!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"{{route('barang.jenis.delete')}}",
                    type:"delete",
                    data:{
                        id:id,
                        "_token":"{{csrf_token()}}"
                    },
                    success:function(res){
                        Swal.fire({
                                position: "center",
                                icon: "success",
                                title: res.message,
                                showConfirmButton: false,
                                timer: 1500
                        });
                        $('#data-jenis').DataTable().ajax.reload();
                    }
                });
            }
        });

        
    });


</script>
@endsection