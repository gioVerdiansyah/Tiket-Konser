@extends('layouts.admin', ['title' => 'Transaksi'])
@section('content')
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
                <div class="col-lg-4 col-md-6">
                    <form action="{{ route('list-konser.search') }}" method="GET">
                        <div class="form-group d-flex">
                            <input type="text" id="search-input" class="form-control" name="search" placeholder="Cari menurut ID Pesanan atau Email Pelanggan">
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
                                        @if ($order->payment_status == 2)
                                            <tr>
                                                <td class="fw-bold"></td>
                                                <td class="fw-bold">{{ $order->created_at }}</td>
                                                <td class="fw-bold">{{ $order->id }}</td>
                                                <td class="fw-bold">{{ $order->user->email }}</td>
                                                <td class="fw-bold">@currency($order->total_price)</td>
                                                <td class="">
                                                    <button class="btn btn-success">Sukses di bayar</button>
                                                </td>
                                                <td class="">
                                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger rounded-4">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
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
                                            <a class="page-link" href="{{ $orders->previousPageUrl() }}" rel="prev">Previous</a>
                                        </li>
                                    @endif
                            
                                    @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                        <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                            
                                    @if ($orders->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orders->nextPageUrl() }}" rel="next">Next</a>
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
    $(document).ready(function () {
        $('#search-input').on('keyup', function () {
            var searchText = $(this).val().toLowerCase();
            var $tableRows = $('.datatable tbody tr');
            
            $tableRows.hide();

            var $matchedRows = $tableRows.filter(function () {
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
