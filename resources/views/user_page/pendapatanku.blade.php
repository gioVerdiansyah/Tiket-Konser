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
                        <h2 class="card-title text-dark">Tiket Konser</h2>
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
                        {{-- <label class="btn btn-sm btn-primary btn-simple" id="2">
                            <input type="radio" class="d-none" name="options">
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Perbulan</span>
                            <span class="d-block d-sm-none">
                                <i class="tim-icons icon-tap-02"></i>
                            </span>
                        </label> --}}
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
                        var \ = @json($monthlyData['totals']);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ml-3">
                            Pendapatan (Bulanan)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <p class="text-dark ml-3">Rp. {{ number_format($monthlyData['totals'][0]) }}</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Total Shipments</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="chartLinePurple"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
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
                {{-- <h3 class="card-title text-dark"><i class="tim-icons icon-delivery-fast text-info"></i>Tiket Konser</h3> --}}
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="CountryChart"></canvas>
                     {{-- <script type="text/javascript">
                        var paymentData = {
                            labels: @json($labels),
                            data: @json($data)
                        };
                    </script> --}}
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
    {{-- <div class="col-lg-4">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-category">Completed Tasks</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="chartLineGreen"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
</div>
{{-- <div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card card-tasks">
            <div class="card-header ">
                <h6 class="title d-inline">Tasks(5)</h6>
                <p class="card-category d-inline">today</p>
                <div class="dropdown">
                    <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                        <i class="tim-icons icon-settings-gear-63"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#pablo">Action</a>
                        <a class="dropdown-item" href="#pablo">Another action</a>
                        <a class="dropdown-item" href="#pablo">Something else</a>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-full-width table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Update the Documentation</p>
                                    <p class="text-muted">Dwuamish Head, Seattle, WA 8:47 AM</p>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">GDPR Compliance</p>
                                    <p class="text-muted">The GDPR is a regulation that requires businesses to protect the personal data and privacy of Europe citizens for transactions that occur within EU member states.</p>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Solve the issues</p>
                                    <p class="text-muted">Fifty percent of all respondents said they would be more likely to shop at a company </p>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Release v2.0.0</p>
                                    <p class="text-muted">Ra Ave SW, Seattle, WA 98116, SUA 11:19 AM</p>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Export the processed files</p>
                                    <p class="text-muted">The report also shows that consumers will not easily forgive a company once a breach exposing their personal data occurs. </p>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <p class="title">Arival at export process</p>
                                    <p class="text-muted">Capitol Hill, Seattle, WA 12:34 AM</p>
                                </td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                                        <i class="tim-icons icon-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Simple Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Country
                                </th>
                                <th>
                                    City
                                </th>
                                <th class="text-center">
                                    Salary
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                  Dakota Rice
                                </td>
                                <td>
                                  Niger
                                </td>
                                <td>
                                  Oud-Turnhout
                                </td>
                                <td class="text-center">
                                  $36,738
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Minerva Hooper
                                </td>
                                <td>
                                    Curaçao
                                </td>
                                <td>
                                    Sinaai-Waas
                                </td>
                                <td class="text-center">
                                    $23,789
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sage Rodriguez
                                </td>
                                <td>
                                    Netherlands
                                </td>
                                <td>
                                    Baileux
                                </td>
                                <td class="text-center">
                                    $56,142
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Philip Chaney
                                </td>
                                <td>
                                    Korea, South
                                </td>
                                <td>
                                    Overland Park
                                </td>
                                <td class="text-center">
                                    $38,735
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Doris Greene
                                </td>
                                <td>
                                    Malawi
                                </td>
                                <td>
                                    Feldkirchen in Kärnten
                                </td>
                                <td class="text-center">
                                    $63,542
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mason Porter
                                </td>
                                <td>
                                    Chile
                                </td>
                                <td>
                                    Gloucester
                                </td>
                                <td class="text-center">
                                    $78,615
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jon Porter
                                </td>
                                <td>
                                    Portugal
                                </td>
                                <td>
                                    Gloucester
                                </td>
                                <td class="text-center">
                                    $98,615
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('js')
<script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>
<script>
    $(document).ready(function() {
      demo.initDashboardPageCharts();
    });
</script>
@endpush
