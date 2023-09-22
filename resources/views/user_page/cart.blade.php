@extends('layouts.master')

@section('content')
 {{-- Custom CSS --}}
 <style>
    .ltr-text {
        direction: ltr;
    }
</style>
{{-- End --}}

{{-- Content Start --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-4 text-center">
                            <img src="{{ asset('images/homepage/card.jpg') }}" class="img-fluid rounded-4 shadow-lg"
                                style="width:200px; margin-right:130%;" alt="">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h4 class="fw-bold">Tame Impala Concert</h4>
                                <p class="ltr-text">Kota: Jakarta</p>
                                <p class="ltr-text">Kategori: VIP</p>
                                <h5 class="fw-bold">Rp 800.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="fw-bold">Order Summary</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="fw-bold">Rp 800.000</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Admin Fee</td>
                                    <td class="fw-bold">Rp 5.000</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="fw-bold">RP 805.000</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="btn btn-dark">Beli Sekarang</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Content End --}}
@endsection
