@extends('layouts.nav_profile')

@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Custom CSS --}}
    <style>
        @media(max-width: 766px) {
            .bittin {
                font-size: 13px;
            }

            .m-0 {
                font-size: 14px;
            }

            h6.card-title {
                margin-top: 14px;
                text-align: left;
                font-size: 10px;
                font-style: italic;
            }

            .d-flex {
                justify-content: center;
            }

            .wrapper {
                text-align: right;
                padding: 0%;
                margin: 0%;
            }
        }

        @media(max-width: 575px) {
            .modal-dialog {
                margin: 1.7rem auto;
            }
        }

        @media(max-width: 420px) {
            .modal-dialog {
                width: 300px;
            }
        }

        .modal-header {
            border: none;
        }

        .modal-dialog {
            margin: 1.7rem auto;
            max-width: 500px;
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        }

        .modal-body0 {
            position: relative;
            flex: auto;
            padding-right: 1rem;
            padding-left: 1rem;
            padding-top: 1rem;
            padding-bottom: 0;
            border-bottom-style: dashed;
            border-bottom-color: #dee2e6;
            border-bottom-width: 1px;
        }

        .modal-body0 h5 {
            margin-bottom: 40px;
            align-items: center;
            font-size: 20px;
        }

        .modal-body0 p {
            margin: 0px;
        }

        .pembatas {
            margin-bottom: 0.5rem;
        }

        .pembatas2 {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            border-bottom-style: solid;
            border-bottom-color: #dee2e6;
            border-bottom-width: 1px;
        }

        .background_abu {
            border-bottom-style: dashed;
            border-bottom-color: #dee2e6;
            border-bottom-width: 1px;
            position: relative;
            flex: auto;
            background: #ddd3;
            width: 100%;
            height: 130px;
        }

        .background_abu h5 {
            padding-left: 1rem;
            color: rgb(255, 0, 0)
        }

        .background_abu p {
            padding-left: 1rem;
        }

        .padding {
            padding-top: 10px;
        }

        .total {
            color: crimson;
        }

        .type {
            font-size: 14px;
        }

        .typep {
            color: crimson;
            font-size: 14px;
        }

        .value {
            font-size: 14px;
        }

        .valuep {
            color: crimson;
            font-size: 14px;
        }

        .card-title {
            font-size: 14px;
            margin-top: 14px;
            margin-bottom: 0px;
        }

        .wrapper {
            padding-bottom: 0px;
        }

        .big-wrapper {
            padding-top: 1rem;
            max-width: 500px;
            margin: 0 auto;
        }

        .title-transaction {
            font-size: 16px;
        }

        .title-wrapper {
            text-align: center;
            color: #22c264;
            font-size: 1.2em;
            padding: 10px;
        }

        .wrapper-transaction {
            h1.title-transaction {
                font-size: 0.5em;
                margin-bottom: 1.5em;
                color: #2e2d39;
            }

            margin-bottom:2rem;
        }

        .list-transaction {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.8rem;

            span.type {
                color: #9e9e9e;
            }

            span.value {
                color: #3b445b;
            }
        }

        .status_message {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 0.8rem;

            span.type {
                color: #9e9e9e;
            }

            span.value {
                color: #3b445b;
            }
        }

        .single-line {
            display: flex;
            justify-content: space-between;
            padding-bottom: 1rem;
            border-bottom: 1px solid #E5E5E5;
        }

        .dashed {
            border-bottom-style: dashed;
            border-bottom-color: #0000002e
        }

        .value-bolder {
            display: flex;
            border-radius: 10px;
            justify-content: center;
            align-items: center;
            height: 40px;
            width: 100%;
            border: solid 1px #00ff40;
            background-color: #9bffc5;
        }

        .status_sukses {
            border-radius: 10px;
            border: solid 1px #00ff40;
            background-color: #9bffc5;
        }

        .spin {
            font-weight: bold;
            color: #00d60b;
            /* Atur warna teks agar kontras dengan latar belakang */
        }

        .spin before {
            content: "";
            /* Menambahkan konten pseudo-element */
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 1px solid black;
            /* Mengatur border tipis */
            z-index: -1;
            /* Mengatur z-index agar border ada di belakang teks */
        }

        .bolder {
            text-align: center;
            align-content: center;
            font-weight: bold;
            color: #2e2d39 !important;
        }

        .new-background {
            padding: 1rem;
            border-radius: 5px;
            background-color: #F5F5F5;
        }

        .body {
            background-color: #ffffff
        }

        .mb-0 {
            font-size: 18px;
        }

        .bittin {
            font-size: 14px;
            box-shadow: 1px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            transition-duration: 0.4s;
            background-color: white;
            border: 1px solid #161616;
            color: #161616;
        }

        .bittin:hover {
            background-color: #161616;
            /* Green */
            color: white;
        }

        .aa {
            font-size: 14px;
        }

        .card {
            height: 100%;
            margin-bottom: 1%;
            background-color: ghostwhite;
            border: solid 1px #0000002e;
            border-radius: 10px;
            box-shadow: 10px 15px 17px -17px rgba(0, 0, 0, 0.25);
        }

        .c-details span {
            font-weight: 300;
            font-size: 13px
        }

        .icon {
            width: 50px;
            height: 50px;
            background-color: #eee;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 39px
        }

        .badge span {
            background-color: #fffbec;
            width: 60px;
            height: 25px;
            padding-bottom: 3px;
            border-radius: 5px;
            display: flex;
            color: #fed85d;
            justify-content: center;
            align-items: center
        }

        .progress {
            height: 10px;
            border-radius: 10px
        }

        .progress div {
            background-color: red
        }

        .text1 {
            font-size: 14px;
            font-weight: 600
        }

        .text2 {
            color: #a5aec0
        }

        .m-0 {
            margin-bottom: 4px;
            font-size: 14px;
        }

        .element.style {}

        @media screen and (max-width: 766px) {}

        img {
            max-width: 100%;
            height: auto;
        }

        @media screen and (max-width: 768px) {
            img {
                max-width: 100%;
            }
        }

        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>
    {{-- End --}}
    {{-- Content Start --}}
    <div class="container-fluid mt-2">
        <div class="container">
            <br>
            <img src="" alt="" id="gambarku">
            @php
                $i = 1;
            @endphp
            @forelse ($orders as $i => $order)
                <div class="card">

                    <div class="card-full">
                        <div class="row no-gutters">
                            <div class="col-md-4 ">
                                <!-- Mengubah ukuran kolom gambar -->
                                <img src="{{ asset('storage/image/konser/banner/' . $order->konser->banner) }}"
                                    class="card-img custom-img" alt="Placeholder Image" height="200 px;" width="110">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="d-flex ">
                                        <h4 class="m-0 p-0 font-weight-bold" style="font-size: 20px">
                                            {{ $order->konser->nama_konser }}</h4>
                                    </div>
                                    <h6 class="card-title">Di order pada:
                                        {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('l, d F Y H:i') }}
                                        <br>
                                        @if ($order->payment_status == 2)
                                            Di bayar pada:
                                            {{ \Carbon\Carbon::parse($order->transactionHistory[0]->transaction_time)->translatedFormat('l, d F Y H:i') }}
                                        @endif
                                    </h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>

                                            <p class="m-0 p-0" style="color: rgb(162, 170, 162);">
                                            <p class="m-0 p-0">Total harga: @currency($order->total_price)</p>
                                            <strong>Status:</strong>
                                            @if ($order->payment_status == 2)
                                                <p style="color: #21ad44; font-weight:bolder; font-style:normal;">
                                                    {{ Str::before($order->transactionHistory[0]->status_message, ',') }}
                                                </p>
                                                <button class="bittin hover" id="generatePdf"
                                                    onclick="generatePDF('{{ $i }}')">Tiket
                                                    Anda</button>
                                            @endif
                                            @if ($order->payment_status == 3)
                                                <p style="color: #ffb60d; font-weight:bolder; font-style:normal;">
                                                    Kadaluarsa
                                                <p>
                                            @endif
                                            @if ($order->payment_status == 4)
                                                <p style="color: rgb(255, 48, 48); font-weight:bolder; font-style:normal;">
                                                    Gagal
                                                <p>
                                            @endif
                                        </div>
                                        @if ($order->payment_status == 2)
                                            <div class="wrapper ">
                                                <p class="m-0 p-0">
                                                    <strong
                                                        style="color: rgb(231, 57, 188); text-decoration: underline;  cursor: pointer;"
                                                        data-toggle="modal"
                                                        data-target="#transactionModal{{ $i + 1 }}">Lihat
                                                        Detail
                                                        Transaksi</strong>
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @empty
                <p class="text-center">Anda belum mungkin belum melakukan pemesanan atau bahkan belum melakukan pembayaran,
                    coba
                    cek pada halaman <a href="{{ route('orders.index') }}">order</a></p>
            @endforelse
        </div>
    </div>
    @forelse ($orders as $i => $orderku)
        @if ($orderku->payment_status == 2)
            <div class="modal fade" id="transactionModal{{ ++$i }}" tabindex="-1" role="dialog"
                aria-labelledby="transactionModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="transactionModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="big-wrapper">
                                <div class="wrapper-transaction new-background">
                                    <h5 class="title-wrapper" id="exampleModalLabel">Detail Transaksi</h5>
                                    @if ($orderku->transactionHistory[0]->payment_type == 'credit_card')
                                        <div class="list-transaction">
                                            <span class="type">Kode Aproval</span>
                                            <span class="value">{{ $orderku->transactionHistory[0]->approval_code }}</span>
                                        </div>
                                    @endif
                                    @if (
                                        $orderku->transactionHistory[0]->payment_type == 'bank_transfer' ||
                                            $orderku->transactionHistory[0]->payment_type == 'credit_card' ||
                                            $orderku->transactionHistory[0]->payment_type == 'echannel')
                                        <div class="list-transaction">
                                            <span class="type">Bank</span>
                                            <span class="value">{{ $orderku->transactionHistory[0]->bank }}</span>
                                        </div>
                                    @endif
                                    <div class="list-transaction">
                                        <span class="type">Status transaksi</span>
                                        <span class="value">{{ $orderku->transactionHistory[0]->fraud_status }}</span>
                                    </div>
                                    @if ($orderku->transactionHistory[0]->payment_type == 'credit_card')
                                        <div class="list-transaction">
                                            <span class="type">Tipe Kartu</span>
                                            <span class="value">{{ $orderku->transactionHistory[0]->card_type }}</span>
                                        </div>
                                    @endif
                                    @if (
                                        $orderku->transactionHistory[0]->payment_type == 'credit_card' ||
                                            $orderku->transactionHistory[0]->payment_type == 'bank_transfer' ||
                                            $orderku->transactionHistory[0]->payment_type == 'echannel')
                                        <div class="list-transaction">
                                            <span class="type">No Kartu</span>
                                            <span class="value">
                                                @if ($orderku->transactionHistory[0]->payment_type == 'credit_card')
                                                    {{ substr_replace($orderku->transactionHistory[0]->masked_card, str_repeat('*', strlen($orderku->transactionHistory[0]->masked_card) - 8), 4, -4) }}
                                                @endif
                                                @if (
                                                    $orderku->transactionHistory[0]->payment_type == 'bank_transfer' ||
                                                        $orderku->transactionHistory[0]->payment_type == 'echannel')
                                                    {{ substr_replace($orderku->transactionHistory[0]->va_number, str_repeat('*', strlen($orderku->transactionHistory[0]->va_number) - 8), 4, -4) }}
                                                @endif
                                            </span>
                                        </div>
                                    @endif
                                    @if ($orderku->transactionHistory[0]->payment_type == 'echannel')
                                        <div class="list-transaction">
                                            <span class="type">Kode Pembayaran</span>
                                            <span class="value">{{ $orderku->transactionHistory[0]->biller_code }}</span>
                                        </div>
                                    @endif
                                    <div class="list-transaction">
                                        <span class="type">Tipe Pembayaran</span>
                                        <span
                                            class="value">{{ str_replace('_', ' ', $orderku->transactionHistory[0]->payment_type) }}</span>
                                    </div>
                                    <div class="list-transaction ">
                                        <span class="type">Tanggal Transaksi</span>
                                        <span
                                            class="value">{{ \Carbon\Carbon::parse($orderku->transactionHistory[0]->transaction_time)->translatedFormat('l, d F Y H:i') }}</span>
                                    </div>
                                    <div class="list-transaction single-line ">
                                        <span class="type">Nomor Telepon</span>
                                        <span class="value">{{ Auth::user()->phone }}</span>
                                    </div>
                                    <div class="list-transaction ">
                                        <span class="type">Harga satuan</span>
                                        <span class="value">@currency($orderku->harga_satuan)</span>
                                    </div>
                                    <div class="list-transaction ">
                                        <span class="type">Jumlah</span>
                                        <span class="value">{{ $orderku->jumlah }}</span>
                                    </div>
                                    <div class="list-transaction ">
                                        <span class="type">Biaya Admin</span>
                                        <span class="value">@currency($orderku->harga_satuan * $orderku->jumlah * (5 / 100))</span>
                                    </div>
                                    <div class="list-transaction single-line dashed">
                                        <span class="typep">Total Harga</span>
                                        <span class="valuep">@currency($orderku->total_price)</span>
                                    </div>
                                    <div class="status_message">
                                        <span class="type bolder">Status</span>
                                    </div>
                                    <div class="value-bolder">
                                        <span class="spin">Berhasil</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @empty
    @endforelse
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
        integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function generatePDF(id) {
            var ticketId = 'ticket' + id;

            $.ajax({
                url: `{{ route('tiketku') }}#ticket${id}`,
                method: 'GET',
                data: {
                    ticketId: ticketId
                },
                success: function(response) {
                    var $ticketElement = $(response).filter('#ticket' + id);
                    console.log($ticketElement);

                    $ticketElement.printThis();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        };
    </script>
    {{-- End --}}
@endsection
