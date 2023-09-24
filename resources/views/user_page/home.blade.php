@extends('layouts.master')

@section('content')
    {{-- Carousel Start --}}
    <div id="carouselExampleCaptions" class="carousel slide animate__animated animate__fadeIn" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/homepage/jumbotron.png') }}" class="d-block w-100" alt="">
                <div class="carousel-caption" style="top: 20%; left: 100px; right: auto; text-align: left;">
                    <h1 class="text-black fw-bold" style="max-width: 600px">Temukan Keseruan dengan menonton konser!</h1>
                    <a href="#" class="btn btn-dark rounded-5">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Carousel End --}}

    {{-- How to buy Start --}}
    <div class="container-fluid bg-black text-center text-white">
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="300">
            <h1 class="fw-bold pt-5">Cara Membeli</h1>
            <div class="row py-5">
                <div class="col-4">
                    <h4 class="mb-4">1. Pilih Konser</h4>
                    <p>
                        Silahkan pilih konser yang ingin kalian beli di daftar konser
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="mb-4">2. Konfirmasi Pemesanan</h4>
                    <p>
                        Kemudian, kalian bisa memilih kategori tiket dan jumlah tiket yang akan dibeli, lalu kalian dapat
                        klik “pesan” dan menuju ke halaman cart
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="mb-4">3. Pembayaran</h4>
                    <p>
                        Kemudian setelah melakukan konfirmasi pemesanan
                        kalian bisa menuju ke pembayaran, mengisi data2 yang diperlukan,
                        dan memilih metode pembayaran. Selanjutnya kalian bisa menunggu
                        konfirmasi admin, dan melihat status pembayaran kalian di histori.
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- How to buy End --}}

    {{-- Card Konser Terbaru Start --}}
    <div class="container bg-white text-center" data-aos="fade-up" data-aos-delay="300">
        <h1 class="fw-bold pt-5">Konser Terbaru</h1>
        <div class="row py-5">
            @foreach ($konser as $row)
                <div class="col-3 concert-card">
                    <a href="{{ route('detail_konser', $row->id) }}">
                        <img src="{{ asset('storage/image/konser/banner/' . $row->banner) }}" alt=""
                            class="img-fluid rounded-5 mb-4">
                    </a>
                    <h3 class="fw-bold">{{ $row->nama_konser }}</h3>
                    @foreach ($row->tiket as $tiket)
                        <p class="fw-bold">Rp. {{ number_format($tiket->harga1, 0, ',', '.') }}</p>
                    @endforeach
                </div>
            @endforeach
            <div class="container">
                <a href="#" class="btn btn-outline-dark mt-5 rounded-5">Tampilkan Lebih</a>
            </div>
        </div>
    </div>
    <hr>
    {{-- Card Konser Terbaru End --}}

    {{-- Card Sedang Hot Start --}}
    <div class="container bg-white text-center" data-aos="fade-up" data-aos-delay="300">
        <h1 class="fw-bold pt-5">Sedang Hot</h1>
        <div class="row py-5">
            <div class="col-3">
                <a href="#">
                    <img src="{{ 'images/homepage/card.jpg' }}" alt="" class="img-fluid rounded-5 mb-4">
                </a>
                <h3 class="fw-bold">Tame Impala</h3>
                <p class="fw-bold">Rp. 300.000</p>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{ 'images/homepage/card.jpg' }}" alt="" class="img-fluid rounded-5 mb-4">
                </a>
                <h3 class="fw-bold">Tame Impala</h3>
                <p class="fw-bold">Rp. 300.000</p>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{ 'images/homepage/card.jpg' }}" alt="" class="img-fluid rounded-5 mb-4">
                </a>
                <h3 class="fw-bold">Tame Impala</h3>
                <p class="fw-bold">Rp. 300.000</p>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{ 'images/homepage/card.jpg' }}" alt="" class="img-fluid rounded-5 mb-4">
                </a>
                <h3 class="fw-bold">Tame Impala</h3>
                <p class="fw-bold">Rp. 300.000</p>
            </div>
            <div class="container">
                <a href="#" class="btn btn-outline-dark mt-5 rounded-5">Tampilkan Lebih</a>
            </div>
        </div>
    </div>
    <hr>
    {{-- Card Sedang Hot End --}}

    {{-- Komentar Kustomer Start --}}
    <div class="container mt-5 d-flex" data-aos="fade-up" data-aos-delay="300">
        <h1 class="fw-bold">Komentar Pelanggan</h1>
        <div class="ms-auto me-5">
            <a href="" class="text-black"><i class="bi bi-arrow-left"></i></a>
            <a href="" class="text-black"><i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
    <div class="container">
        <div class="row py-5">
            <div class="col" data-aos="fade-up" data-aos-delay="500">
                <div class="card mb-3 d-flex flex-row align-items-center rounded-4">
                    <div class="p-3">
                        <img src="{{ 'images/homepage/komentar.jpeg' }}" class="rounded-circle" alt="Komentar 1"
                            width="100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Alex Turner</h5>
                        <p class="card-text">Mantap jiwa raga</p>
                    </div>
                </div>
            </div>
            <div class="col" data-aos="fade-up" data-aos-delay="1000">
                <div class="card mb-3 d-flex flex-row align-items-center rounded-4">
                    <div class="p-3">
                        <img src="{{ 'images/homepage/komentar.jpeg' }}" class="rounded-circle" alt="Komentar 1"
                            width="100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Alex Turner</h5>
                        <p class="card-text">Mantap jiwa raga</p>
                    </div>
                </div>
            </div>
            <div class="col" data-aos="fade-up" data-aos-delay="1500">
                <div class="card mb-3 d-flex flex-row align-items-center rounded-4">
                    <div class="p-3">
                        <img src="{{ 'images/homepage/komentar.jpeg' }}" class="rounded-circle" alt="Komentar 1"
                            width="100">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Alex Turner</h5>
                        <p class="card-text">Mantap jiwa raga</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- Komentar Kustomer End --}}
@endsection
