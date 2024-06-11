@extends('layouts.app')
@section('title','Dashboard')
@section('content')
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$product_count}}</h3>

                <p class="font-weight-bold">Inventaris</p>
              </div>
              <div class="icon">
                <i class="fas fa-boxes"></i>
              </div>
              <a href="{{route('barang')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #FF6961; color: white;">
              <div class="inner">
                <h3>{{$category_count}}</h3>

                <p class="font-weight-bold">Master Non-PC</p>
              </div>
              <div class="icon">
                <i class="fas fa-server"></i>
              </div>
              <a href="{{route('barang.jenis')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #4682B4; color: white">
              <div class="inner">
                <h3>{{$unit_count}}</h3>

                <p class="font-weight-bold">Master PC</p>
              </div>
              <div class="icon">
                <i class="fas fa-laptop"></i>
              </div>
              <a href="{{route('barang.satuan')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #E07A79; color: white">
              <div class="inner">
                <h3>{{$brand_count}}</h3>

                <p class="font-weight-bold">Merk Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-pricetag"></i>
              </div>
              <a href="{{route('barang.merk')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}

          

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #32CD32; color: white;">
              <div class="inner">
                <h3>{{$goodsin}}</h3>

                <p class="font-weight-bold">Transaksi Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-swap"></i>
              </div>
              <a href="{{route('transaksi.masuk')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #FFB347">
              <div class="inner" style="color:white !important;">
                <h3>{{$goodsout}}</h3>

                <p class="font-weight-bold">Transaksi Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-swap"></i>
              </div>
              <a href="{{route('transaksi.keluar')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #FF92B3; color: white;">
              <div class="inner">
                <h3>{{$customer}}</h3>

                <p class="font-weight-bold">Customer</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="{{route('customer')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #8A79B1; color:white">
              <div class="inner">
                <h3>{{$supplier}}</h3>

                <p class="font-weight-bold">Supplier</p>
              </div>
              <div class="icon">
                <i class="fas fa-shipping-fast"></i>
              </div>
              <a href="{{route('customer')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #C3B1E1; color:white !important;">
              <div class="inner">
                <h3>{{$staffCount}}</h3>

                <p class="font-weight-bold">Petugas</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-person"></i>
              </div>
              <a href="{{route('settings.users')}}" class="small-box-footer" style="color:white !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-lg-6">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title text-lg font-weight-bold">TRANSAKSI BARANG BULAN INI</h1>
        </div>
        <div class="card-body">
          <div class="row  d-flex justify-content-start align-items-center">
            <div class="col-6">
              <label for="month" class="form-label">Pilih Bulan</label>
              <div class="input-group mb-3">
                <div class="w-100 mb-3 d-flex align-items-center py-3">
                  <input type="month" name="month" id="month" class="form-control w-50">
                  <button id="filter" class="btn btn-primary mx-2"><i class="fas fa-filter"></i>Filter</button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-content p-0">
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
              <canvas id="stok-barang" height="300" style="height: 300px;"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-lg-6">
      
      <div class="card">
        <div class="card-header">
            <h1 class="card-title text-lg font-weight-bold">PENDAPAN DAN PENGELUARAN BULAN INI</h1>
        </div>
          <div class="card-body">
            <div class="row  d-flex justify-content-start align-items-center">
              <div class="col-6">
                <label for="month-income" class="form-label">Pilih Bulan</label>
                <div class="input-group mb-3">
                  <div class="w-100 mb-3 d-flex align-items-center py-3">
                    <input type="month" name="month-income" id="month-income" class="form-control w-50">
                    <button id="filter-income" class="btn btn-primary mx-2"><i class="fas fa-filter"></i>Filter</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content p-0">
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <canvas id="pendapatan" height="300" style="height: 300px;"></canvas>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div> 

<script src="{{asset('theme/plugins/chart.js/Chart.min.js')}}"></script>
<script>

  function formatIDR(angka) {
      const strAngka = angka.toString().replace(/[^0-9]/g,'');
      if (!strAngka) return '';
      const parts = strAngka.split('.');
      let intPart = parts[0];
      const decPart = parts.length > 1 ? '.' + parts[1] : '';
      intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      const result = 'RP.' + ''+intPart+decPart;
      return result;
  }

  $(document).ready(function() {

        function getDataWithMonth(){
          const month = $("input[name='month']").val();
          $.ajax({
            url: `{{route('laporan.stok.grafik')}}`,
            data:{month},
            dataType: 'json',
            success: function(data) {
              if(data.goods_in_this_month+data.goods_out_this_month+data.total_stock_this_month === 0){
                return false;
              }
              $("input[name='month']").val(data.month);
              const chartstok_barang =  document.getElementById('stok-barang').getContext('2d'); 
              const data_stok = {
              labels:['Barang Masuk', 'Barang Keluar', 'Total Stok'],
              datasets: [{
                label: 'Jumlah',
                data: [data.goods_in_this_month, data.goods_out_this_month, data.total_stock_this_month],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                  ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                  ],
                  borderWidth: 1
               }]
              
             }
             const opsi = {
              maintainAspectRatio: false,
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                xAxes: [{
                  gridLines: {
                    display: false
                  }
                }],
                yAxes: [{
                    ticks: {
                      beginAtZero:true,
                      callback: function(value, index, values) {
                          return Math.floor(value);
                      }
                  },
                  gridLines: {
                    display: false
                  }
                }]
              }
             }

              const ChartStokBarang = new Chart(chartstok_barang,{
                type:'bar',
                data:data_stok,
                options:opsi
              });
            }
          });
        }
        $("#filter").click(getDataWithMonth);
        getDataWithMonth();


        function getDataIncomeWithMonth(){
          const month = $("input[name='month-income']").val();
          $.ajax({
            url: `{{route('laporan.pendapatan')}}`,
            data:{month},
            dataType: 'json',
            success: function(data) {
              if(data.pengeluaran+data.pendapatan+data.total === 0){
                return false;
              }
              $("input[name='month-income']").val(data.bulan);
              const pendapatan =  document.getElementById('pendapatan').getContext('2d'); 
              const data_income = {
              labels:['Pengeluaran','Pendapatan', 'Total Pendapatan'],
              datasets: [{
                label: 'harga',
                data: [data.pengeluaran,data.pendapatan, data.total],
                  backgroundColor: [
                    'rgba(245, 86, 86, 0.8)',
                    'rgba(245, 86, 217, 0.8)',
                    'rgba(86, 245, 124, 0.8)',
                  ],
                  borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                  ],
                  borderWidth: 1
               }]
              
             }
             const opsi = {
              maintainAspectRatio: false,
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                xAxes: [{
                  gridLines: {
                    display: false
                  }
                }],
                yAxes: [{
                  ticks: {
                      callback: function(value, index, values) {
                          return formatIDR(value);
                      }
                  },
                  gridLines: {
                    display: false
                  }
                }]
              },
              tooltips: {
                  callbacks: {
                      label: function(tooltipItem, chart){
                          const datasetLabel = chart.datasets[tooltipItem.datasetIndex].label ;
                          return datasetLabel + ': ' + formatIDR(tooltipItem.yLabel);
                      }
                  }
              }
             }

              const ChartPendaptan = new Chart(pendapatan,{
                type:'bar',
                data:data_income,
                options:opsi
              });
            }
          });
        }
        $("#filter-income").click(getDataIncomeWithMonth);
        getDataIncomeWithMonth();
    });




</script>

@endsection