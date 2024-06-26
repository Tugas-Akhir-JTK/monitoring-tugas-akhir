@extends('adminlte.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0">Dashboard Kaprodi</h1>
        </div><!-- /.col -->
        <div class="col d-flex justify-content-end">
        <div class="btn-group mr-2">
            <!-- Messages Dropdown Menu -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Periode
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2023]) }}" class="dropdown-item">2023</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2024]) }}" class="dropdown-item">2024</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2025]) }}" class="dropdown-item">2025</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2026]) }}" class="dropdown-item">2026</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2027]) }}" class="dropdown-item">2027</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2028]) }}" class="dropdown-item">2028</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2029]) }}" class="dropdown-item">2029</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'periode', 'direction' => 'asc', 'value' => 2030]) }}" class="dropdown-item">2026</a></li>
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
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 1]) }}" class="dropdown-item">D3-A</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 2]) }}" class="dropdown-item">D3-B</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 3]) }}" class="dropdown-item">D4-A</a></li>
                  <li><a href="{{ route('kota', ['sort' => 'kelas', 'direction' => 'asc', 'value' => 4]) }}" class="dropdown-item">D4-B</a></li>
                </ul>
            </div>
        </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><strong>Sebaran Luaran Tambahan TA</strong></h2>
            </div>
            <div class="card-body">
              <canvas id="luaranPieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><strong>Sebaran Mitra KoTA</strong></h2>
            </div>
            <div class="card-body">
              <canvas id="mitraChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          {{-- <div class="card">
            <div class="card-header">
              <h2 class="card-title"><strong>Pie Chart</strong></h2>
            </div>
            <div class="card-body">
              <canvas id="pieChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div> --}}
        </div>

        <div class="col-md-6">
          {{-- <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Line Chart</strong></h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div> --}}
        </div>

        <div class="col-md-6">
          {{-- <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Bar Chart</strong></h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  


<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('luaranPieChart').getContext('2d');
    const luaranCounts = @json($luaranCounts);
    const kotas = @json($kotas);

    const luaranLabels = Object.keys(luaranCounts);
    const luaranData = Object.values(luaranCounts);

    const luaranChartData = {
        labels: luaranLabels,
        datasets: [{
            label: 'Persentase Luaran',
            data: luaranData,
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
    };

    const luaranChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        tooltips: {
            callbacks: {
                label: function (tooltipItem, data) {
                    const dataset = data.datasets[tooltipItem.datasetIndex];
                    const total = dataset.data.reduce((prev, curr) => prev + curr, 0);
                    const currentValue = dataset.data[tooltipItem.index];
                    const percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                    return data.labels[tooltipItem.index] + ': ' + percentage + '%';
                },
                afterLabel: function (tooltipItem, data) {
                    const index = tooltipItem.index;
                    const label = data.labels[index];
                    const filteredKotas = kotas.filter(kota => kota.luaran.includes(label));
                    return filteredKotas.map(kota => kota.nama_kota).join(', ');
                }
            }
        }
    };

    // Create luaran pie chart
    new Chart(ctx, {
        type: 'pie',
        data: luaranChartData,
        options: luaranChartOptions
    });

    const mitraChartCanvas = document.getElementById('mitraChart').getContext('2d');
    const mitraCounts = @json($mitraCounts);

    const mitraLabels = Object.keys(mitraCounts);
    const mitraData = Object.values(mitraCounts);
  
    const mitraChartData = {
        labels: mitraLabels,
        datasets: [{
            label: 'Jumlah Kota',
            data: mitraData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)', // Non-mitra
                'rgba(54, 162, 235, 0.6)', // Organisasi
                'rgba(255, 206, 86, 0.6)' // Industri
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    const mitraChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        tooltips: {
            callbacks: {
                label: function (tooltipItem, data) {
                    const dataset = data.datasets[tooltipItem.datasetIndex];
                    const total = dataset.data.reduce((prev, curr) => prev + curr, 0);
                    const currentValue = dataset.data[tooltipItem.index];
                    const percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                    return data.labels[tooltipItem.index] + ': ' + percentage + '%';
                },
                afterLabel: function (tooltipItem, data) {
                    const index = tooltipItem.index;
                    const label = data.labels[index];
                    const filteredKotas = kotas.filter(kota => kota.mitra.includes(label));
                    return filteredKotas.map(kota => kota.nama_kota).join(', ');
                }
            }
        }
    };

    // Create mitra pie chart
    new Chart(mitraChartCanvas, {
        type: 'pie',
        data: mitraChartData,
        options: mitraChartOptions
    });
});
</script>
  
@endsection
