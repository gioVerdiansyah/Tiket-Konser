@extends('layouts.admin', ['title' => 'Penjualan'])
@section('content')
    <div class="container p-2" style="border: 2px dashed gray; border-radius: 5px">
        <div class="rounded-tl-none rounded-tr-none rounded-bl-none rounded-br-none rotate-0 opacity-100 relative">
            <div class="d-flex">
                <div class="row">
                    <img src="{{ asset('admin/img/image.png') }}"
                        class="w-auto [20px] rounded-tr-[20px] rounded-bl-[20px] rounded-br-[20px] rotate-0 opacity-100 bg-[#f0eeed]">
                    <div class="col">
                        <h2
                            class="w-[104.02961730957031px] h-[27.78864860534668px] rotate-0 opacity-100 text-left text-xl font-bold relative text-[#000000]">
                            Currents</h2>
                        <div
                            class="rounded-tl-[15px] rounded-tr-[15px] rounded-bl-[15px] rounded-br-[15px] rotate-0 opacity-100 border-t-[3px] border-r-[3px] border-b-[3px] border-l-[3px] border-t-[#000000] border-r-[#000000] border-b-[#000000] border-l-[#000000]">
                        </div>
                        <div
                            class="rounded-tl-none rounded-tr-none rounded-bl-none rounded-br-none rotate-[-90.00000250447849deg] opacity-100 bg-[#e6e6e6]">
                        </div>
                        <a href="#"
                            class="w-[185px] h-3.5 rotate-0 opacity-100 text-left text-[15px] font-bold relative text-[#c10c99]"
                            style="color:rgb(193,12,153)">
                            Lihat
                            Detail Verifikasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Add your jQuery code here
        });
    </script>
@endsection
