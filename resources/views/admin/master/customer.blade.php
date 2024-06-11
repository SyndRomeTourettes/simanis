@extends('layouts.app')
@section('title','Customer')
@section('content')
<x-head-datatable/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header row">
                    <div class="d-flex justify-content-end align-items-center w-100">
                        @if(Auth::user()->role->name != 'staff')
                        <button class="btn btn-success" type="button"  data-toggle="modal" data-target="#TambahData" id="modal-button">Tambah Data</button>
                        @endif
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="TambahDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TambahDataModalLabel">Tambah Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" onclick="clear()" >&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" autocomplete="off">
                                <input type="hidden" name="id" id="id">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone_number">Nomor Hp</label>
                                <input type="text" class="form-control" id="phone_number" autocomplete="off">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" id="address"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="kembali">Kembali</button>
                            <button type="button" class="btn btn-success" id="simpan">Simpan</button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" width="100%"  class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="4%">No</th>
                                    <th class="border-bottom-0">Nama</th>
                                    <th class="border-bottom-0">Nomor HP</th>
                                    <th class="border-bottom-0">Alamat</th>
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
        $('#data-tabel').DataTable({
            responsive: true, lengthChange: true, autoWidth: false,
            processing:true,
            serverSide:true,
            ajax:`{{route('customer.list')}}`,
            columns:[
                {
                    "data":null,"sortable":false,
                    render:function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart+1;
                    }
                },
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'phone_number',
                    name:'phone_number',
                },
                {
                    data:'address',
                    name:'address',
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

    function simpan(){
            $.ajax({
                url:`{{route('customer.save')}}`,
                type:"post",
                data:{
                    name:$("#name").val(),
                    phone_number:$("#phone_number").val(),
                    address:$("#address").val(),
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
                    $("#phone_number").val(null);
                    $("#address").val(null);
                    $('#data-tabel').DataTable().ajax.reload();
                },
                error:function(err){
                    console.log(err);
                },
                
            });
    }


    function ubah(){
            $.ajax({
                url:`{{route('customer.update')}}`,
                type:"put",
                data:{
                    id:$("#id").val(),
                    name:$("#name").val(),
                    phone_number:$("#phone_number").val(),
                    address:$("#address").val(),
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
                    $("#phone_number").val(null);
                    $("#address").val(null);
                    $('#data-tabel').DataTable().ajax.reload();
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
            $("#TambahDataModalLabel").text("Tambah Data Customer");
            $("#name").val(null);
            $("#phone_number").val(null);
            $("#address").val(null);
            $("#simpan").text("Simpan");
        });


    });



    $(document).on("click",".ubah",function(){
        let id = $(this).attr('id');
        $("#modal-button").click();
        $("#TambahDataModalLabel").text("Ubah Data Customer");
        $("#simpan").text("Simpan Perubahan");
        $.ajax({
            url:"{{route('customer.detail')}}",
            type:"post",
            data:{
                id:id,
                "_token":"{{csrf_token()}}"
            },
            success:function({data}){
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#phone_number").val(data.phone_number);
                $("#address").val(data.address);
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
                    url:"{{route('customer.delete')}}",
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
                        $('#data-tabel').DataTable().ajax.reload();
                    }
                });
            }
        });

        
    });
</script>
@endsection