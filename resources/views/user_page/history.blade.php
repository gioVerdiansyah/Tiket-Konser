@extends('layouts.nav_profile')
@section('content')
    <h1 class="monserat">History</h1>
    <div class="container">
        <br>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-3 d-flex align-items-center justify-content-start">
                    <!-- Mengubah ukuran kolom gambar -->
                    <img src="{{ asset('foto/yuu.jpg') }}" class="card-img custom-img w-75"
                        style="border: 0; border-radius:1em;" alt="Placeholder Image">
                    <div class="col-md-3"> <!-- Mengubah ukuran kolom gambar -->
                        <img src=" {{ asset('images/history/Tame.jpeg') }} " class="card-img custom-img"
                            alt="Placeholder Image" width="150">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Use Bootstrap classes for layout -->
                                <h4 class="m-0 p-0 font-weight-bold" style="font-size: 20px">Currents</h4>
                                <h4 class="card-title">Batal Otomatis 05 sep 23.59</h4>

                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="m-0 p-0">1 barang x Rp 500.000</p>
                                    <p class="m-0 p-0" style="color: green;">
                                        <strong> Status :</strong> menunggu konfirmasi
                                    <p class="m-0 p-0" style="color: rgb(162, 170, 162);">
                                        <strong>Status :</strong> menunggu konfirmasi
                                    </p>
                                    <p class="m-0 p-0">
                                        <strong style="color: rgb(231, 57, 188);">Lihat Detail Transaksi</strong>
                                    </p>
                                </div>
                                <div class="wrapper mb-20 px-5 mx-5">
                                    <p class="m-0 p-0" style="font-size: 20px;">Total harga</p>
                                    <p class="m-0 p-0 font-weight-bold" style="font-size: 20px">Rp 500.000</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
