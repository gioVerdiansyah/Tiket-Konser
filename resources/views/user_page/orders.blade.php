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
                            @if ($order->payment_status == 1)
                                <button class="btn btn-primary" id="order-now"
                                    onclick="payNow('{{ $order->snap_token }}')">Bayar Sekarang</button>
                            @endif
                            @if ($order->payment_status == 2)
                                <button class="btn btn-success">Sukses di bayar</button>
                                <a href="">Lihat Tiket mu!</a>
                            @endif
                            @if ($order->payment_status == 3)
                                <button class="btn btn-warning">Sudah kadaluarsa!</button>
                            @endif
                            @if ($order->payment_status == 4)
                                <button class="btn btn-danger">Gagal!</button>
                            @endif
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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        const payButton = document.querySelector('#order-now');

        function payNow(snapToken) {
            snap.pay(snapToken, {
                // Optional
                onSuccess: function(result) {
                    console.log(result)
                    $.ajax({
                        type: "POST",
                        url: "{{ route('sendTrans') }}",
                        data: result,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                text: response.message +
                                    " Refresh untuk melihat perubahan",
                                allowOutsideClick: true,
                                allowEscapeKey: false,
                            });
                        }
                    });
                },
                onError: function(result) {
                    console.log(result)
                    $.ajax({
                        type: "POST",
                        url: "{{ route('sendTrans') }}",
                        data: result,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        },
                        success: function(response) {
                            console.log('Berhasil terkirim')
                        }
                    });
                }
            });
        };
    </script>
@endsection
