@extends('layouts.app')
@section('title','Transaksi Keluar')
@section('content')
<x-head-datatable/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header row">
                    <div class="d-flex justify-content-end align-items-center w-100">
                        <button class="btn btn-success" type="button"  data-toggle="modal" data-target="#TambahData" id="modal-button"><i class="fas fa-plus m-1"></i> Tambah Data </button>
                    </div>
                </div>

                <!-- Modal Barang -->
            <div class="modal fade" id="modal-barang" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog  modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Pilih Barang</h5>
                            <button type="button" class="close" id="close-modal-barang" >
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-barang" width="100%"  class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0" width="8%">NO</th>
                                            <th class="border-bottom-0">GAMBAR</th>
                                            <th class="border-bottom-0">KODE BARANG</th>
                                            <th class="border-bottom-0">NAMA</th>
                                            <th class="border-bottom-0">JENIS</th>
                                            <th class="border-bottom-0">SATUAN</th>
                                            <th class="border-bottom-0">MERK</th>
                                            <th class="border-bottom-0">STOK AWAL</th>
                                            <th class="border-bottom-0">HARGA</th>
                                            <th class="border-bottom-0" width="1%">Tindakan</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>



                <!-- Modal -->
                <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="TambahDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TambahDataModalLabel">Buat Transaksi Masuk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"  >&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="kode" class="form-label">Kode Barang Keluar<span class="text-danger">*</span></label>
                                        <input type="text" name="kode" readonly class="form-control">
                                        <input type="hidden" name="id"/>
                                        <input type="hidden" name="id_barang"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_keluar" class="form-label">Tanggal Keluar <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_keluar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer" class="form-label">Pilih Customer<span class="text-danger">*</span></label>
                                        <select name="customer" class="form-control">
                                            <option selected value="-- Pilih Customer --">-- Pilih Customer --</option>
                                            @foreach( $customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="kode_barang" class="form-label">Kode Barang <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="kode_barang" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="cari-barang"><i class="fas fa-search"></i></button>
                                            <button class="btn btn-success" type="button" id="barang"><i class="fas fa-box"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" name="nama_barang" id="nama_barang" readonly class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="satuan_barang" class="form-label">Satuan</label>
                                                <input type="text" name="satuan_barang" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jenis_barang" class="form-label">Jenis</label>
                                                <input type="text" name="jenis_barang" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah" class="form-label">Jumlah Keluar<span class="text-danger">*</span></label>
                                        <input type="number" name="jumlah"  class="form-control">
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

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" width="100%"  class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="8%">NO</th>
                                    <th class="border-bottom-0">TANGGAL KELUAR</th>
                                    <th class="border-bottom-0">KODE BARANG KELUAR</th>
                                    <th class="border-bottom-0">KODE BARANG</th>
                                    <th class="border-bottom-0">CUSTOMER</th>
                                    <th class="border-bottom-0">BARANG</th>
                                    <th class="border-bottom-0">JUMLAH KELUAR</th>
                                    <th class="border-bottom-0" width="1%">TINDAKAN</th>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    

    function load(){
        $('#data-barang').DataTable({
            lengthChange: true,
            processing:true,
            serverSide:true,
            ajax:`{{route('barang.list')}}`,
            columns:[
                {
                    "data":null,"sortable":false,
                    render:function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart+1;
                    }
                },
                {
                    data:'img',
                    name:'img'
                },{
                    data:'code',
                    name:'code'
                },{
                    data:'name',
                    name:'name'
                },{
                    data:'category_name',
                    name:'category_name'
                },
                {
                    data:'unit_name',
                    name:'unit_name'
                },
                {
                    data:'brand_name',
                    name:'brand_name'
                },
                {
                    data:'quantity',
                    name:'quantity'
                },
                {
                    data:'price',
                    name:'price'
                },
                {
                    data:'tindakan',
                    render:function(data){
                        const pattern = /id='(\d+)'/;
                        const matches = data.match(pattern);
                        return `<button class='pilih-data-barang btn btn-success' data-id='${matches[1]}'>Pilih</button>`;
                    }
                }
            ]
        }).buttons().container();
    }



    
    $(document).ready(function(){
        load();

        // pilih data barang
        $(document).on("click",".pilih-data-barang",function(){
            id = $(this).data("id");
            $.ajax({
                url:"{{route('barang.detail')}}",
                type:"post",
                data:{
                    id:id,
                    "_token":"{{csrf_token()}}"
                },
                success:function({data}){
                    $("input[name='kode_barang']").val(data.code);
                    $("input[name='id_barang']").val(data.id);
                    $("input[name='nama_barang']").val(data.name);
                    $("input[name='satuan_barang']").val(data.unit_name);
                    $("input[name='jenis_barang']").val(data.category_name);
                    $('#modal-barang').modal('hide');
                    $('#TambahData').modal('show');
                }
             });
        });
    });

</script>
<script>
    function detail(){
        const kode_barang = $("input[name='kode_barang']").val();
        $.ajax({
            url:`{{route('barang.code')}}`,
            type:'post',
            data:{
                code:kode_barang
            },
            success:function({data}){
                $("input[name='id_barang']").val(data.id);
                $("input[name='nama_barang']").val(data.name);
                $("input[name='satuan_barang']").val(data.unit_name);
                $("input[name='jenis_barang']").val(data.category_name);
            }
        });
        
    }

    


    function simpan(){
        const item_id =  $("input[name='id_barang']").val();
        const user_id = `{{Auth::user()->id}}`;
        const date_out = $("input[name='tanggal_keluar']").val();
        const customer_id = $("select[name='customer']").val();
        const invoice_number = $("input[name='kode'").val();
        const quantity = $("input[name='jumlah'").val();

        const Form = new FormData();
        Form.append('user_id',user_id);
        Form.append('item_id',item_id);
        Form.append('date_out', date_out );
        Form.append('quantity', quantity );
        Form.append('customer_id', customer_id );
        Form.append('invoice_number', invoice_number );
        $.ajax({
            url:`{{route('transaksi.keluar.save')}}`,
            type:"post",
            processData: false,
            contentType: false,
            dataType: 'json',
            data:Form,
            success:function(res){
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#kembali').click();
                    $("input[name='id_barang']").val(null);
                    $("input[name='tanggal_keluar']").val(null);
                    $("select[name='customer']").val('-- Pilih Customer --');
                    $("input[name='nama_barang']").val(null);
                    $("input[name='kode_barang']").val(null);
                    $("select[name='jenis_barang']").val(null);
                    $("select[name='satuan_barang']").val(null);
                    $("input[name='jumlah']").val(0);
                    $('#data-tabel').DataTable().ajax.reload();
            },
            statusCode:{
                400:function(res){
                    const  {message} =res.responseJSON;
                    Swal.fire({
                        position: "center",
                        icon: "warning",
                        title: "Oops...",
                        text:message,
                        showConfirmButton: false,
                        timer: 1900
                    });
                }
            }
                
        })     
    }


    function ubah(){
        const id =  $("input[name='id']").val();
        const item_id =  $("input[name='id_barang']").val();
        const user_id = `{{Auth::user()->id}}`;
        const date_out = $("input[name='tanggal_keluar']").val();
        const customer_id = $("select[name='customer']").val();
        const invoice_number = $("input[name='kode']").val();
        const quantity = $("input[name='jumlah'").val();
        $.ajax({
            url:`{{route('transaksi.keluar.update')}}`,
            type:"put",
            data:{id,item_id,user_id,date_out,customer_id,invoice_number,quantity},
            success:function(res){
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#kembali').click();
                    $("input[name='id']").val(null);
                    $("input[name='id_barang']").val(null);
                    $("select[name='customer']").val('-- Pilih Customer --');
                    $("input[name='nama_barang']").val(null);
                    $("input[name='tanggal_keluar']").val(null);
                    $("input[name='kode_barang']").val(null);
                    $("select[name='jenis_barang']").val(null);
                    $("select[name='satuan_barang']").val(null);
                    $("input[name='jumlah']").val(0);
                    $('#data-tabel').DataTable().ajax.reload();
                },
                error:function(err){
                    console.log(err);
            },
        })     
    }
    
    $(document).ready(function(){
        $('#data-tabel').DataTable({
            lengthChange: true,
            processing:true,
            serverSide:true,
            ajax:`{{route('transaksi.keluar.list')}}`,
            columns:[
                {
                    "data":null,"sortable":false,
                    render:function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart+1;
                    }
                },
               {
                data:"date_out",
                name:"date_out"
               },
               {
                data:"invoice_number",
                name:"invoice_number"
               },{
                data:"kode_barang",
                name:"kode_barang"
               },
               {
                data:"customer_name",
                name:"customer_name"
               },{
                data:"item_name",
                name:"item_name"
               },
               {
                data:"quantity",
                name:"quantity"
               },
               {
                data:"tindakan",
                name:"tindakan"
               }
            ]
        });
        $("#barang").on("click",function(){
            $('#modal-barang').modal('show');
            $('#TambahData').modal('hide');
        });
        $("#close-modal-barang").on("click",function(){
            $('#modal-barang').modal('hide');
            $('#TambahData').modal('show');
        });
        $("#cari-barang").on("click",detail);

        $('#simpan').on('click',function(){
            if($(this).text() === 'Simpan Perubahan'){
                ubah();
            }else{
                simpan();
            }
        });

        $("#modal-button").on("click",function(){
            id = new Date().getTime();
            $("input[name='kode']").val("BRGMSK-"+id);
            $("input[name='id']").val(null);
            $("input[name='id_barang']").val(null);
            $("select[name='customer']").val('-- Pilih Customer --');
            $("input[name='nama_barang']").val(null);
            $("input[name='tanggal_keluar']").val(null);
            $("input[name='kode_barang']").val(null);
            $("input[name='jenis_barang']").val(null);
            $("input[name='satuan_barang']").val(null);
            $("input[name='jumlah']").val(null);
            $('#simpan').text("Simpan");
        });


    });



    $(document).on("click",".ubah",function(){
        $("#modal-button").click();
        $("#simpan").text("Simpan Perubahan");
        let id = $(this).attr('id');
        $.ajax({
            url:"{{route('transaksi.keluar.detail')}}",
            type:"post",
            data:{
                id:id,
            },
            success:function({data}){
                $("input[name='id']").val(data.id);
                $("input[name='kode']").val(data.invoice_number);
                $("input[name='id_barang']").val(data.id_barang);
                $("select[name='customer']").val(data.customer_id);
                $("input[name='nama_barang']").val(data.nama_barang);
                $("input[name='tanggal_keluar']").val(data.date_out);
                $("input[name='kode_barang']").val(data.kode_barang);
                $("input[name='jenis_barang']").val(data.jenis_barang);
                $("input[name='satuan_barang']").val(data.satuan_barang);
                $("input[name='jumlah']").val(data.quantity);
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
                    url:"{{route('transaksi.keluar.delete')}}",
                    type:"delete",
                    data:{
                        id:id
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