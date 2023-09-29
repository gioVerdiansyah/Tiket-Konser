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
        <img src="" alt="" id="gambarku">
        @php
            $i = 1;
        @endphp
        @forelse ($orders as $i => $order)
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-3 d-flex align-items-center justify-content-start">
                        <!-- Mengubah ukuran kolom gambar -->
                        <img src="{{ asset('storage/image/konser/banner/' . $order->konser->banner) }}"
                            class="card-img custom-img" alt="Placeholder Image" width="110">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="m-0 p-0 font-weight-bold" style="font-size: 20px">
                                    {{ $order->konser->nama_konser }}</h4>
                                <h6 class="card-title">Di order pada:
                                    {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('l, d F Y H:i') }}
                                    <br>
                                    Di bayar pada:
                                    {{ \Carbon\Carbon::parse($order->transactionHistory[0]->transaction_time)->translatedFormat('l, d F Y H:i') }}
                                </h6>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="m-0 p-0" style="color: rgb(162, 170, 162);">
                                        <strong>Status:</strong>
                                        {{ Str::before($order->transactionHistory[0]->status_message, ',') }}
                                    </p>
                                    <p class="m-0 p-0">
                                        <strong style="color: rgb(231, 57, 188);" data-toggle="modal"
                                            data-target="#transactionModal">Lihat Detail Transaksi</strong>
                                    </p>
                                    <button id="generatePdf" onclick="generatePDF('{{ $i }}')">Tiket
                                        Anda</button>
                                </div>
                                <div class="wrapper mb-20 px-5 mx-5">
                                    <p class="m-0 p-0" style="font-size: 20px;">Total harga</p>
                                    <p class="m-0 p-0 font-weight-bold" style="font-size: 20px">@currency($order->total_price)</p>
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
            <p>Anda belum mungkin belum melakukan pemesanan atau bahkan belum melakukan pembayaran, coba cek pada halaman <a
                    href="{{ route('orders.index') }}">order</a></p>
        @endforelse
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
        integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function generatePDF(id) {
            var ticketId = 'ticket' + id;

            $.ajax({
                url: `{{ route('test') }}#ticket${id}`,
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
