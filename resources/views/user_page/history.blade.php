@extends('layouts.nav_profile')

@section('content')
    {{-- Custom CSS --}}
    <style>
        .card {
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
            margin-top: 2rem;
            
        }
    </style>
    {{-- End --}}

    {{-- Content Start --}}
    <div class="container">
        <br>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-3 d-flex align-items-center justify-content-start"> <!-- Mengubah ukuran kolom gambar -->
                    <img src="{{ asset('images/history/Tame.jpeg') }}" class="card-img custom-img" alt="Placeholder Image"
                        width="110">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Use Bootstrap classes for layout -->
                            <h4 class="m-0 p-0 font-weight-bold" style="font-size: 20px">Currents</h4>
                            <h9 class="card-title">Batal Otomatis 05 sep 23.59</h9>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0 p-0" style="color: rgb(162, 170, 162);">
                                    <strong>Status:</strong> menunggu konfirmasi
                                </p>
                                <p class="m-0 p-0">
                                    <strong style="color: rgb(231, 57, 188);" data-toggle="modal"
                                        data-target="#transactionModal">Lihat Detail Transaksi</strong>
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

    {{-- Transaction Modal --}}
    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Detail Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Metode Pembayaran: Transfer Bank</p>
                    <p>Biaya Admin: Rp 10.000</p>
                    <p>Nomor Telepon: 08123456789</p>
                    <p>Total Harga: Rp 500.000</p>
                    <hr>
                    <h5>Detail Tiket</h5>
                    <p>Tiket 1: Konser A, Tanggal 10 Oktober 2023</p>
                    <p>Tiket 2: Konser B, Tanggal 15 Oktober 2023</p>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}
@endsection
