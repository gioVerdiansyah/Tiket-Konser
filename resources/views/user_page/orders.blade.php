@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Daftar Order</h1>
        <ul class="list-group">
            @forelse ($orders as $order)
                {{-- @dump($order) --}}
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('storage/image/konser/banner/' . $order->konser->banner) }}"
                                alt="Gambar Konser" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $order->konser->nama_konser }}</h4>
                            <p class="m-0">Kategori: {{ $order->kategori_tiket }}</p>
                            <p class="m-0">Harga Satu Tiket: @currency($order->harga_satuan)</p>
                            <p class="m-0">Jumlah Tiket: {{ $order->jumlah }}</p>
                            <p class="m-0">Total Harga: @currency($order->total_price)</p>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                            <form action="{{ route('orders.show', $order->id) }}">
                                <button class="btn btn-primary">Bayar Sekarang</button>
                            </form>
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">
                    <p>Belum memesan tiket apapun...</p>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
