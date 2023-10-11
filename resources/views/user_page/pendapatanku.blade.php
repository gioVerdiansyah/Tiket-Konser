@extends('layouts.master')
<link href="{{ secure_asset('/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category font-weight-bold">Total Pendapatan</h5>
                            <h2 class="card-title text-dark">{{ $nama_konser }}</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                    <input type="radio" name="options" checked>
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Kategori</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple" id="1">
                                    <input type="radio" class="d-none d-sm-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Bulanan</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-gift-2"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                        <script type="text/javascript">
                            var categoryLabels = @json($categoryData['labels']);
                            var categoryTotals = @json($categoryData['totals']);

                            var monthlyLabels = @json($monthlyData['labels']);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-chart" style="height: 550px">
                <div class="card-header">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pendapatan (Bulanan)
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <p class="text-dark font-weight-bold">Rp. {{ number_format(end($monthlyData['totals'])) }}</p>
                    </div>
                    <h3 class="card-category font-weight-bold">Metode Pembayaran</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                        <p id="noDataMessage" style="display: none;">Belum ada data yang tersedia.</p>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            
                            function updateChart(labels, data) {
                                var ctx = document.getElementById("CountryChart").getContext("2d");
                
                                // Periksa apakah ada data
                                var hasData = labels.length > 0 && data.length > 0;
                
                                if (!hasData) {
                                    // Sembunyikan canvas grafik jika tidak ada data
                                    ctx.canvas.style.display = 'none';
                
                                    // Tampilkan pesan jika tidak ada data
                                    document.getElementById("noDataMessage").style.display = 'block';
                                } else {
                                    // Tampilkan canvas grafik jika ada data
                                    ctx.canvas.style.display = 'block';
                
                                    // Sembunyikan pesan jika ada data
                                    document.getElementById("noDataMessage").style.display = 'none';
                
                                    if (window.myChart) {
                                        window.myChart.data.labels = labels;
                                        window.myChart.data.datasets[0].data = data;
                                        window.myChart.update();
                                    } else {
                                        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
                                        gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
                                        gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
                                        gradientStroke.addColorStop(0, 'rgba(29,140,248,0)');
                
                                        window.myChart = new Chart(ctx, {
                                            type: 'bar',
                                            responsive: true,
                                            legend: {
                                                display: false
                                            },
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: "Metode Pembayaran",
                                                    fill: true,
                                                    backgroundColor: gradientStroke,
                                                    hoverBackgroundColor: gradientStroke,
                                                    borderColor: '#1f8ef1',
                                                    borderWidth: 2,
                                                    borderDash: [],
                                                    borderDashOffset: 0.0,
                                                    data: data,
                                                }]
                                            },
                                            options: gradientBarChartConfiguration
                                        });
                                    }
                                }
                            }
                
                            // Ambil data dari endpoint 'get-payment-data'
                            fetch('{{ route('get-payment-data', ['id' => $konser_id]) }}')
                                .then(response => response.json())
                                .then(data => {
                                    // Ekstrak data dari respons
                                    var labels = data.paymentType.labels || [];
                                    var totals = data.paymentType.totals || [];
                
                                    // Perbarui grafik dengan data yang diambil
                                    updateChart(labels, totals);
                                })
                                .catch(error => {
                                    console.error('Error fetching data:', error);
                                    // Tampilkan pesan kesalahan jika terjadi kesalahan saat mengambil data
                                    document.getElementById("noDataMessage").innerText = 'Terjadi kesalahan saat mengambil data.';
                                    document.getElementById("noDataMessage").style.display = 'block';
                                });
                        </script>
                    </div>
                </div>                
                
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-chart" style="height: 550px">
                <div class="card-header">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pendapatan Hari ini
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <p class="text-dark font-weight-bold">Rp. {{ number_format(end($dailyData['totals'])) }}</p>
                    </div>
                    <h3 class="card-category font-weight-bold">Pendapatan Perhari</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="DailyChart"></canvas>
                        <p id="noDataMessage" style="display: none;">Belum ada data yang tersedia.</p>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            function createDailyChart(labels, data) {
                              var ctx = document.getElementById("DailyChart").getContext("2d");
                              var canvas = document.getElementById("DailyChart");
                              var noDataMessage = document.getElementById("noDataMessage");
                          
                              // Periksa apakah ada data
                              var hasData = labels.length > 0 && data.length > 0;
                              var isDataZero = data.every(value => value === 0);
                          
                              if (!hasData || isDataZero) {
                                // Sembunyikan grafik jika tidak ada data atau semua data adalah 0
                                if (window.dailyChart) {
                                  window.dailyChart.destroy();
                                }
                                // Tampilkan pesan jika tidak ada data
                                noDataMessage.style.display = 'block';
                              } else {
                                // Tampilkan grafik jika ada data
                                if (window.dailyChart) {
                                  window.dailyChart.data.labels = labels;
                                  window.dailyChart.data.datasets[0].data = data;
                                  window.dailyChart.update();
                                } else {
                                  var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
                                  gradientStroke.addColorStop(1, 'rgba(46, 204, 113, 0.2)');
                                  gradientStroke.addColorStop(0.4, 'rgba(46, 204, 113, 0.0)');
                                  gradientStroke.addColorStop(0, 'rgba(46, 204, 113, 0)');
                          
                                  window.dailyChart = new Chart(ctx, {
                                    type: 'bar',
                                    responsive: true,
                                    legend: {
                                      display: false
                                    },
                                    data: {
                                      labels: labels,
                                      datasets: [{
                                        label: "Pembelian Tiket Per Hari",
                                        fill: true,
                                        backgroundColor: gradientStroke,
                                        hoverBackgroundColor: gradientStroke,
                                        borderColor: '#005B41',
                                        borderWidth: 2,
                                        borderDash: [],
                                        borderDashOffset: 0.0,
                                        data: data,
                                      }]
                                    }
                                  });
                                }
                                // Sembunyikan pesan jika ada data
                                noDataMessage.style.display = 'none';
                              }
                            }
                          
                            var dailyData = {!! json_encode($dailyData) !!};
                          
                            var labels = dailyData.labels || [];
                            var totals = dailyData.totals || [];
                          
                            // Panggil fungsi createDailyChart setelah halaman selesai dimuat
                            window.addEventListener('DOMContentLoaded', function() {
                              createDailyChart(labels, totals);
                            });
                          </script>    
                    </div>
                </div>     
            </div>
        </div>
    </div>
    @endsection

    @push('js')
        <script src="{{ secure_asset('/js/plugins/chartjs.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                demo.initDashboardPageCharts();
            });
        </script>
    @endpush
