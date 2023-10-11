@extends('layouts.master')

@section('content')
    <style>
        .sahh {
            align-items: center;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
            position: relative;
            width: 100%;
        }

        b {
            background-color: currentColor;
            display: block;
            flex: 1;
            height: 2px;
            opacity: .1;
        }

        body {
            width: auto;
        }

        .col-3 {
            flex: auto;
        }


        @media(max-width:988px) {
            .col-3 {
                width: 100%;
            }
        }


        @media(min-width: 637px) {
            .img-fluid {
                height: 80%;
            }
        }

        @media(max-width: 636px) {
            .row.py-5 {
                display: flex;
            }

            .col-4 {
                width: 100%;
            }
        }

        @media(max-width:414px) {
            body {
                width: 100%;
            }
        }

        @media(max-width:393px) {
            body {
                width: 106%;
            }
        }

        @media(max-width:375px) {
            body {
                width: 113%;
            }
        }

        @media(max-width:360px) {
            body {
                width: 115%;
            }
        }

        @media(max-width:320px) {
            body {
                width: 129%;
            }
        }

        @media(max-width:280px) {
            body {
                width: 150%;
            }
        }
    </style>

    {{-- Carousel Start --}}
    <div id="carouselExampleCaptions" class="carousel slide animate__animated animate__fadeIn" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/homepage/jumbotron.png') }}" class="d-block w-100" alt="">
                <div class="carousel-caption" style="top: 20%; left: 100px; right: auto; text-align: left;">
                    <h1 class="text-black fw-bold" style="max-width: 600px">Temukan Keseruan dengan menonton konser!</h1>
                    <a href="{{ route('konser') }}" class="btn btn-dark rounded-5">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Carousel End --}}

    {{-- How to buy Start --}}
    <div class="container-fluid bg-black text-center text-white">
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="300">
            <h1 class="fw-bold pt-5">Cara Membeli</h1>
            <div class="row py-5" style="text-align: left; padding-left: 1.5rem; padding-right: 1.5rem;">
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
        <h1 class="fw-bold pt-5 ">Konser Terbaru</h1>
        <div class="row py-5">
            @forelse ($konser as $row)
                <div class="col-3 concert-card">
                    <a href="{{ route('detail_konser', $row->id) }}">
                        <img width="250" height="267" src="{{ asset('storage/image/konser/banner/' . $row->banner) }}"
                            alt="" class="mb-4" style="border-radius:5%;">
                    </a>
                    <h3 class="fw-bold">{{ $row->nama_konser }}</h3>
                    @foreach ($row->tiket as $tiket)
                        <p class="fw-bold">@currency($tiket->harga1)</p>
                    @endforeach
                </div>
            @empty
                <p>Belum ada konser...</p>
            @endforelse
        </div>
    </div>
    <hr>
    {{-- Card Konser Terbaru End --}}

    {{-- Card Sedang Hot Start --}}
    <div class="container bg-white text-center" data-aos="fade-up" data-aos-delay="300">
        <h1 class="fw-bold pt-5">Sedang Hot</h1>
        <div class="row py-5">
            @forelse ($hotConcerts as $row)
                <div class="col-3 concert-card">
                    <a href="{{ route('detail_konser', $row->id) }}">
                        <img width="250" height="267" src="{{ asset('storage/image/konser/banner/' . $row->banner) }}"
                            alt="" class="mb-4" style="border-radius: 5%;">
                    </a>
                    <h3 class="fw-bold">{{ $row->nama_konser }}</h3>
                    @foreach ($row->tiket as $tiket)
                        <p class="fw-bold">@currency($tiket->harga1)</p>
                    @endforeach
                </div>
            @empty
                <p>Belum ada konser yang populer...</p>
            @endforelse
        </div>
    </div>
    </div>
    <hr>
    {{-- Card Sedang Hot End --}}

    {{-- Komentar Kustomer Start --}}
    <div class="container mt-5 d-flex" data-aos="fade-up" data-aos-delay="300">
        <h1 class="fw-bold">Komentar Pelanggan</h1>
    </div>
    <div class="container">
        <style>
            .dari-konser {
                position: absolute;
                bottom: 0;
                right: 3px;
                font-size: 13px;
            }
        </style>
        <div class="row py-5">
            @forelse ($komen as $cell)
                @if ($cell->konser)
                    <div class="col" data-aos="fade-up" data-aos-delay="500">
                        <div class="card mb-3 d-flex flex-row align-items-center rounded-4">
                            <div class="p-3">
                                <div style="  border-radius:100%; height:55px; width:55px;">
                                <img src="{{ asset('storage/image/photo-user/' . $cell->user->pp) }}" class="rounded-circle"
                                alt="Komentar 1" width="100"  style="width: 100%; height: 100%; border-radius:50%;">
                            </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $cell->user->name }}</h5>
                                <p class="card-text">{{ $cell->fillin }}</p>
                            </div>
                            <p class="dari-konser">Dari konser: <a
                                    href="{{ route('detail_konser', $cell->konser->id) }}">{{ $cell->konser->nama_konser }}</a>
                            </p>
                        </div>
                    </div>
                @endif
            @empty
                <p>Jadilah orang pertama yang memberi ulasan</p>
            @endforelse
        </div>
    </div>
    </div>
    {{-- Komentar Kustomer End --}}
@endsection
