@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Daftar Order</h1>
        <ul class="list-group">
            @for ($i = 1; $i <= 5; $i++)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('foto/ooh.jpg') }}" alt="Gambar Konser" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h4>Nama Konser</h4>
                            <p>Jumlah Tiket: 2</p>
                            <p>Kategori: VIP</p>
                            <p>Harga: $200</p>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary">Bayar Sekarang</button>
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
@endsection
