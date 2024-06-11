@extends('layouts.app')
@section('title','Laporan Barang Masuk')
@section('content')
<x-head-datatable/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-header row">
                    <div class="row w-100">
                        <div class="col-lg-6  w-100">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="date_start">Start Date: </label>
                                        <input type="date" name="start_date" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="date_start">End Date: </label>
                                         <input type="date" name="end_date" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="col-sm-4 pt-4">
                                    <button class="btn btn-primary font-weight-bold m-1 mt-1" id="filter"><i class="fas fa-filter m-1"></i>Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  w-100 d-flex justify-content-end align-items-center">
                                <button class="btn btn-outline-primary font-weight-bold m-1" id="print"><i class="fas fa-print m-1"></i>Print</button>
                                <button class="btn btn-outline-danger font-weight-bold m-1" id="export-pdf">Export to PDF</button>
                                <button class="btn btn-outline-success font-weight-bold m-1" id="export-excel">Export to Excel</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-tabel" width="100%"  class="table table-bordered text-nowrap border-bottom dataTable no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="8%">NO</th>
                                    <th class="border-bottom-0">TANGGAL MASUK</th>
                                    <th class="border-bottom-0">KODE BARANG MASUK</th>
                                    <th class="border-bottom-0">KODE BARANG</th>
                                    <th class="border-bottom-0">SUPPLIER</th>
                                    <th class="border-bottom-0">BARANG</th>
                                    <th class="border-bottom-0">JUMLAH MASUK</th>
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
    
    $(document).ready(function(){
        const tabel = $('#data-tabel').DataTable({
            lengthChange: true,
            processing:true,
            serverSide:true,
            ajax:{
                url:`{{route('laporan.masuk.list')}}`,
                data:function(d){
                    d.start_date = $("input[name='start_date']").val();
                    d.end_date = $("input[name='end_date']").val();
                }
            },
            columns:[
                {
                    "data":null,"sortable":false,
                    render:function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart+1;
                    }
                },
               {
                data:"date_received",
                name:"date_received"
               },
               {
                data:"invoice_number",
                name:"invoice_number"
               },{
                data:"kode_barang",
                name:"kode_barang"
               },
               {
                data:"supplier_name",
                name:"supplier_name"
               },{
                data:"item_name",
                name:"item_name"
               },
               {
                data:"quantity",
                name:"quantity"
               }
            ],
            buttons:[
                {
                    extend:'excel',
                    class:'buttons-excel'
                },
                {
                    extend:'print',
                    class:'buttons-print'
                },{
                    extend:'pdf',
                    class:'buttons-pdf'
                }
            ]
        });

        $("#filter").on('click',function(){
            tabel.draw();
        });
        $("#print").on('click',function(){
            tabel.button(".buttons-print").trigger();
        });
        $("#export-pdf").on('click',function(){
            tabel.button(".buttons-pdf").trigger();
        });
        $("#export-excel").on('click',function(){
            tabel.button(".buttons-excel").trigger();
        });
    });
</script>
@endsection