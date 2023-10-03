@extends('layouts.master')
@section('content')
    @forelse ($orders as $order)
        <style>
            .card {
                width: 100%;
                background-color: #fff;
                border-radius: 15px;
                justify-content: center;
            }

        </style>
        <div class="container">
            <div class="card mt-4 mb-3">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i>{{ $order->konser->nama_konser }}</h3>
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
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
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
                                <td colspan="5" align="right"><strong>Status :</strong></td>
                                <td align="left"><strong>
                                        @if ($order->payment_status == 1)
                                            <button class="btn btn-primary" id="order-now"
                                                onclick="payNow('{{ $order->snap_token }}')">Bayar Sekarang</button>
                                        @endif
                                        @if ($order->payment_status == 3)
                                            <button class="btn btn-warning">Sudah kadaluarsa!</button>
                                        @endif
                                        @if ($order->payment_status == 4)
                                            <button class="btn btn-danger">Gagal!</button>
                                        @endif
                                        @if ($order->payment_status == 2)
                                            <button class="btn btn-success">Sukses di bayar</button>
                                            {{-- <a href="">Lihat Tiket mu!</a> --}}
                                    </strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Tiket Anda : </strong></td>
                                <td align="left"><strong><a href="">Lihat Tiket anda!</a></strong></td>
                            </tr>
    @endif

    </tbody>
    </table>

    {{-- <form method="post" action="proses_upload" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
                <!-- tambahkan elemen input untuk file gambar -->
                <input class="form-control mb-2" type="file" id="image" name="bukti_pembayaran">
                <input type="submit" value="Upload" class="btn btn-primary">
            </form> --}}

    </div>
    </div>
    </div>
@empty
    <li class="list-group-item" style="position: relative; min-height: 50vh;">
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
                        url: "{{ route('sendTrans') }}",
                        data: result,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Berhasil",
                                html: `${response.message}. Refresh untuk melihat perubahan atau <a href="{{ route('history') }}">lihat history tiket Anda.</a>`,
                                allowOutsideClick: true,
                                allowEscapeKey: false,
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr)
                            console.log(status)
                            console.log(error)
                            Swal.fire({
                                icon: "error",
                                title: "Gagal",
                                text: "Terjadi kesalahan saat mengirim data.",
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
