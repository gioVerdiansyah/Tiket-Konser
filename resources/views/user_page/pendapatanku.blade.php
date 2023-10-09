@extends('layouts.master')
<link href="{{ asset('/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
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
                            var\ = @json($monthlyData['totals']);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
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
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            function updateChart(labels, data) {
                                var ctx = document.getElementById("CountryChart").getContext("2d");

                                // Buat atau perbarui grafik menggunakan data baru
                                if (window.myChart) {
                                    window.myChart.data.labels = labels;
                                    window.myChart.data.datasets[0].data = data;
                                    window.myChart.update(); // Perbarui grafik yang ada
                                } else {
                                    // Buat grafik baru jika belum ada
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
                                                label: "Metode Pembayaran ",
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

                            // Ambil data dari endpoint 'get-payment-data'
                            fetch('{{ route('get-payment-data', ['id' => $konser_id]) }}')
                                .then(response => response.json())
                                .then(data => {
                                    // Ekstrak data dari respons
                                    var labels = data.paymentType.labels;
                                    var totals = data.paymentType.totals;

                                    // Perbarui grafik dengan data yang diambil
                                    updateChart(labels, totals);
                                })
                                .catch(error => console.error('Error fetching data:', error));
                        </script>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                demo.initDashboardPageCharts();
            });
        </script>
    @endpush
