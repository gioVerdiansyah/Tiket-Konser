@extends('layouts.admin', ['title' => 'Transaksi'])
@section('content')
    {{-- message --}}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">

                    </div>
                </div>
            </div>

            <div class="konser-search-form">
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Date">
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">

                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                    </div>
                                </div>
                            </div>

                            <table class="table star-konser table-hover table-center mb-0 datatable table-striped">
                                <thead class="konser-thread">
                                    <tr>

                                        <th>PAYMENT TYPE</th>
                                        <th>TANGGAL & WAKTU</th>
                                        <th>ID PESANAN</th>
                                        <th>EMAIL PELANGGAN</th>
                                        <th>JUMLAH</th>
                                        <th class="">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dengan data konser -->
                                    <tr>
                                        <td class="fw-bold">Credit Card</td>
                                        <td class="fw-bold">Minggu,07:30</td>
                                        <td class="fw-bold">1365873bb9</td>
                                        <td class="fw-bold">bahlul@gmail.com</td>
                                        <td class="fw-bold">Rp 100.000</td>
                                        <td class="">
                                            <button type="button" class="btn btn-outline-success rounded-4">Success</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="fw-bold">Credit Card</td>
                                        <td class="fw-bold">Minggu,07:30</td>
                                        <td class="fw-bold">1365873bb9</td>
                                        <td class="fw-bold">bahlul@gmail.com</td>
                                        <td class="fw-bold">Rp 100.000</td>
                                        <td class="">
                                            <button type="button" class="btn btn-outline-success rounded-4">Success</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="fw-bold">Credit Card</td>
                                        <td class="fw-bold">Minggu,07:30</td>
                                        <td class="fw-bold">1365873bb9</td>
                                        <td class="fw-bold">bahlul@gmail.com</td>
                                        <td class="fw-bold">Rp 100.000</td>
                                        <td class="">
                                            <button type="button" class="btn btn-outline-success rounded-4">Success</button>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan entri lainnya seperti di atas -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
@endsection

@endsection
