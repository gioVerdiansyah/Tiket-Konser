@extends('layouts.master')
@section('content')
    <style>
        .card-body{
            padding: 40px 20px;
            overflow: auto;
        }
        th{
            font-family: "Nunito Sans", sans-serif;
            font-size: 100%;
        }
        td{
            font-family: "Nunito Sans", sans-serif;
            font-size: 100%;
            background-color: #fff;
        }
        tr{
            font-family: "Nunito Sans", sans-serif;
            background-color: #fff;
            width: 100%;
        }
    </style>

    @forelse ($orders as $order)
        <style>
            .card {
                width: 100%;
                background-color: #fff;
                border-radius: 15px;
                justify-content: center;
            }
        </style>
        <div class="container" style="display:flex; flex-wrap:wrap; gap:20px ">
            <div class="card mt-4 mb-3" >
                <div class="card-body">
                    <h3 style="font-size: 1.2rem; font-weight:700; font-family:Nunito Sans, sans-serif;"><i class="fa fa-shopping-cart"></i>{{ $order->konser->nama_konser }}</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Kategori Tiket</th>
                                <th>Harga Tiket</th>
                                <th>Jumlah Tiket</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/image/konser/banner/' . $order->konser->banner) }}"
                                        width="100" alt="...">
                                </td>
                                <td>{{ $order->kategori_tiket }}</td>
                                <td>@currency($order->harga_satuan)</td>
                                <td>{{ $order->jumlah }}</td>
                                <td>@currency($order->harga_satuan * $order->jumlah)</td>
                            </tr>

                            <!-- Kode yang akan ditampilkan jika $orders kosong -->

                            <tr>
                                <td colspan="5" align="right
                                "><strong>Total Harga :</strong></td>
                                <td align="left"><strong>@currency($order->harga_satuan * $order->jumlah)</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Biaya Admin (5%) :</strong></td>
                                <td align="left"><strong>@currency($order->harga_satuan * $order->jumlah * (5 / 100))</strong></td>
                            </tr>
                            {{-- <tr>
                        <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                        <td align="right"><strong>Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong></td>
                    </tr> --}}
                            <tr>
                                <td colspan="5" align="right"><strong>Total yang harus dibayar :</strong></td>
                                <td align="left"><strong>@currency($order->total_price)</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Action :</strong></td>
                                <td align="left" class="d-flex">
                                    @if ($order->payment_status == 1)
                                        <button class="btn btn-primary" id="order-now"
                                            onclick="payNow('{{ $order->snap_token }}')">Bayar Sekarang</button>
                                    @endif
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ms-2"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    @empty
        <li class="list-group-item" style="position: relative; min-height: 60vh;">
            <p class="my-3 text-center">Belum memesan tiket apapun...</p>
        </li>
    @endforelse
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
                        url: "https://ca7a-182-1-113-78.ngrok-free.app/orders/trans",
                        data: result,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                html: `${response.message}. Refresh untuk melihat perubahan atau <a href="{{ route('history') }}">lihat history tiket Anda.</a>`,
                                allowOutsideClick: true,
                                allowEscapeKey: false,
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: "error",
                                title: "Gagal",
                                text: "Gagal karena: " + xhr.responseJSON.message,
                                allowOutsideClick: true,
                                allowEscapeKey: false,
                            });
                        }
                    });
                },
                onError: function(result) {
                    console.log(result);
                    if (result.status_code == 407) {
                        Swal.fire({
                            icon: "warning",
                            title: "Pembayaran Kadaluarsa",
                            text: "Pembayaran telah kadaluarsa!",
                            allowOutsideClick: true,
                            allowEscapeKey: false,
                        });
                    }
                    $.ajax({
                        type: "POST",
                        url: "{{ secure_url(route('sendTrans')) }}",
                        data: result,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "error",
                                title: "Gagal!",
                                text: 'gagal, respon server: ' + response.message,
                                allowOutsideClick: true,
                                allowEscapeKey: false,
                            });
                        }
                    });
                }
            });
        };
    </script>
@endsection
