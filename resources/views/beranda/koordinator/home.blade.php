@extends('adminlte.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0">Dashboard Koordinator</h1>
        </div><!-- /.col -->
        <div class="col d-flex justify-content-end">
        <div class="btn-group mr-2">
          <!-- Messages Dropdown Menu -->
          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Periode
              </button>
              <ul class="dropdown-menu">
                  <li><a href="#" class="dropdown-item">2024</a></li>
                  <li><a href="#" class="dropdown-item">2023</a></li>
                </ul>
              </div>
            </div>
        <div class="btn-group mr-2">   
            <!-- Messages Dropdown Menu -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Kelas
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-item">D3-A</a></li>
                    <li><a href="#" class="dropdown-item">D3-B</a></li>
                    <li><a href="#" class="dropdown-item">D4-A</a></li>
                    <li><a href="#" class="dropdown-item">D4-B</a></li>
                </ul>
            </div>
        </div>
        <div class="btn-group mr-2">
            <!-- Notifications Dropdown Menu -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">
                    Tahapan TA
                </button>
                <ul class="dropdown-menu dropdown-menu-lg">
                    <li><a href="#" class="dropdown-item">Seminar 1</a></li>
                    <li><a href="#" class="dropdown-item">Seminar 2</a></li>
                    <li><a href="#" class="dropdown-item">Seminar 3</a></li>
                    <li><a href="#" class="dropdown-item">Sidang</a></li>
                </ul>
            </div>
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Progress KoTA</strong></h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Jumlah Bimbingan PerKoTA</strong></h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="bimbinganPerKotaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Intensitas Bimbingan Setiap KoTA</strong></h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {


      var lineChartCanvas = document.getElementById('lineChart').getContext('2d');
      var lineChartData = {
          labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5', 'Minggu 6', 'Minggu 7'],
          datasets: [
              {
                  label: '101',
                  data: [1, 2, 4, 5, 5, 6, 7],
                  borderColor: 'rgba(255, 99, 132, 1)',
                  fill: false
              },
              {
                  label: '102',
                  data: [1, 1, 2, 4, 7, 7, 8],
                  borderColor: 'rgba(100, 162, 235, 1)',
                  fill: false
              },
              {
                  label: '103',
                  data: [2, 2, 4, 5, 5, 6, 6],
                  borderColor: 'rgba(54, 100, 235, 1)',
                  fill: false
              }
            ]
      };

      var lineChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          datasetFill: false
      };

      // Create line chart
      var lineChart = new Chart(lineChartCanvas, {
          type: 'line',
          data: lineChartData,
          options: lineChartOptions
      });

      const bimbinganPerKotaChartCanvas = document.getElementById('bimbinganPerKotaChart').getContext('2d');
      const data = @json($jumlahBimbinganPerKota);
      const labels = data.map(item => item.kota);
      const bimbinganData = data.map(item => item.jumlah_bimbingan);

      const bimbinganPerKotaChartData = {
        labels: labels,
        datasets: [{
          label: 'Jumlah Bimbingan',
          data: bimbinganData,
          backgroundColor: 'rgba(54, 162, 235, 0.8)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      const bimbinganPerKotaChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,  
              stepSize: 1,
              callback: function(value) {
                if (Number.isInteger(value)) {
                  return value;
                }
              }
            },
            scaleLabel: {
              display: true,
              labelString: ''
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              return data.datasets[tooltipItem.datasetIndex].label + ': ' + tooltipItem.yLabel + ' Bimbingan';
            }
          }
        }
      };

      // Create bar chart
      new Chart(bimbinganPerKotaChartCanvas, {
        type: 'bar',
        data: bimbinganPerKotaChartData,
        options: bimbinganPerKotaChartOptions
      });
    });
  </script>

@endsection
