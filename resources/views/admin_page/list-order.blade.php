@extends('layouts.admin', ['title' => 'List Order'])
@section('content')

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <style>
            .card {
                overflow: auto;
            }

            .sayah {
                display: flex;
                justify-content: space-between;
            }

            .table th {
                text-align: center;
            }

            .table td {
                max-width: 200px;
                /* Batasi lebar maksimum sel */
                white-space: nowrap;
                /* Hindari pemutaran teks */
                overflow: hidden;
                /* Sembunyikan teks yang berlebihan */
                text-overflow: ellipsis;
                /* Tambahkan elipsis (...) jika teks terlalu panjang */
            }
        </style>
    </head>
    {{-- message --}}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                    </div>
                </div>
            </div>

            <div class="konser-search-form">
                <div class="col-lg-6 col-md-6">
                    <form action="{{ route('list-konser.search') }}" method="GET">
                        <div class="form-group d-flex">
                            <input type="text" id="search-input" class="form-control" name="search"
                                placeholder="Cari menurut ID Pesanan atau Email Pelanggan">
                            <button type="submit" class="btn btn-primary ml-2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">

                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                    </div>
                                </div>
                            </div>

                            <table class="table star-konser table-hover table-center mb-0 datatable table-striped">
                                <thead class="konser-thread">
                                    <tr>
                                        <th>PAYMENT TYPE</th>
                                        <th>TANGGAL & WAKTU</th>
                                        <th>ID PESANAN</th>
                                        <th>EMAIL PELANGGAN</th>
                                        <th>JUMLAH</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div id="search-results">
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td class="fw-bold">{{ $order->transactionHistory[0]->payment_type }}
                                                </td>
                                                <td class="fw-bold">{{ $order->created_at }}</td>
                                                <td class="fw-bold">#{{ $order->number }}
                                                </td>
                                                <td class="fw-bold">{{ $order->user->email }}</td>
                                                <td class="fw-bold">@currency($order->total_price)</td>
                                                <td class="">
                                                    <button class="btn btn-success" style="border-radius: 10px">Sukses
                                                        di bayar</button>
                                                </td>
                                                <td class="sayah">
                                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            style="border-radius: 10px; margin-right: 8px;">Hapus
                                                        </button>
                                                    </form>
                                                    <a class="btn btn-info" style="border-radius: 10px;" data-toggle="modal"
                                                        data-target="#modal-{{ $order->id }}">
                                                        Lihat
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-{{ $order->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Order</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Isi modal sesuai dengan data order -->
                                                            <p><strong>Dari Konser:</strong>
                                                                {{ $order->konser->nama_konser }}</p>
                                                            <p><strong>Payment Type:</strong>
                                                                {{ $order->transactionHistory[0]->payment_type }}</p>
                                                            <p><strong>Tanggal dan Waktu:</strong>
                                                                {{ $order->created_at }}</p>
                                                            <p><strong>ID Pesanan:</strong>
                                                                {{ $order->transactionHistory[0]->transaction_id }}</p>
                                                            <p><strong>Nama Pelanggan:</strong>
                                                                {{ $order->user->name }}</p>
                                                            <p><strong>Email Pelanggan:</strong>
                                                                {{ $order->user->email }}</p>
                                                            <p><strong>Jumlah:</strong> @currency($order->total_price)</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example" class="mt-3">
                                <ul class="pagination justify-content-center">
                                    @if ($orders->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Previous</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orders->previousPageUrl() }}"
                                                rel="prev">Previous</a>
                                        </li>
                                    @endif

                                    @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                        <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($orders->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orders->nextPageUrl() }}"
                                                rel="next">Next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">Next</span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                            <p id="no-results" style="display: none;">Tidak ada hasil yang cocok.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            $(document).ready(function() {
                $('#search-input').on('keyup', function() {
                    var searchText = $(this).val().toLowerCase();
                    var $tableRows = $('.datatable tbody tr');

                    $tableRows.hide();

                    var $matchedRows = $tableRows.filter(function() {
                        return $(this).text().toLowerCase().indexOf(searchText) > -1;
                    });

                    $matchedRows.show();

                    if ($matchedRows.length === 0) {
                        $('#no-results').show();
                    } else {
                        $('#no-results').hide();
                    }
                });
            });
        </script>
    @endsection
@endsection
