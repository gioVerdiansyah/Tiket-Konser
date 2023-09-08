@extends('layouts.master')

@section('content')

{{-- Custom CSS --}}
<style>
    .counter {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 24px;
    }

    button {
    background: none;
    border: none;
    cursor: pointer;
    }

    .count {
    width: 30px;
    text-align: center;
    font-weight: bold;
    }
</style>
{{-- End --}}

{{-- Content Start --}}
<div class="container py-5">
    <div class="row">
        <div class="col-6 text-center">
            <img src="{{asset('images/homepage/card.jpg')}}" class="img-fluid rounded-4 shadow-lg" style="width: 300px" alt="">
        </div>
        <div class="col-6 text-left mt-5">
            <h3 class="fw-bold">Currents</h3>
            <h5 class="fw-bold">Rp. 500.000</h5>
            <p>Saksikan keseruan konser yang mempesona.</p>
            <p>Stok : 5</p>
            <input type="checkbox" class="btn-check" id="VVIP" autocomplete="off">
            <label class="btn btn-outline-dark rounded-3" for="VVIP">VVIP</label>

            <input type="checkbox" class="btn-check" id="VIP" autocomplete="off">
            <label class="btn btn-outline-dark ms-2 rounded-3" for="VIP">VIP</label>

            <input type="checkbox" class="btn-check" id="Reguler" autocomplete="off">
            <label class="btn btn-outline-dark ms-2 rounded-3" for="Reguler">Reguler</label>
            <hr>
            <div class="button d-flex">
                <div class="counter btn btn-light text-center rounded-3"">
                    <button id="minus" class="minus"><i class="bi bi-dash-lg"></i></button>
                    <span id="count" class="fw-medium">0</span>
                    <button id="plus" class="plus"><i class="bi bi-plus-lg"></i></button>
                </div>
                <div class="pesan col-9 mx-4">
                    <a href="/cart" class="btn btn-dark d-flex justify-content-center align-items-center rounded-3" style="height: 60px;">
                        <span>Pesan Sekarang</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Content End --}}

{{-- Anchor Detail Konser dan Ulasan Start --}}
<div id="" class="container text-center py-3">
    <div id="#row" class="row">
        <div class="col-6" id="">
            <a href="#" class="text-dark"  style="text-decoration: none">Detail Konser</a>
        </div>
        <div class="col-6" id="" >
            <a href="#" class="text-dark" style="text-decoration: none">Ulasan</a>
        </div>
    </div>
</div>
{{-- Anchor Detail Konser dan Ulasan End --}}

{{-- Detail Konser Start --}}
<div class="container py-5">
    <div class="detail_konser my-5">
        <h4 class="fw-bold">DETAIL KONSER</h4>
        <p>Tame Impala Concert</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus tempore vitae dolore labore nemo repellat ea impedit eligendi, quisquam aspernatur ad alias. Aspernatur deleniti velit accusamus aperiam, voluptatem beatae perferendis ad, iste corrupti hic earum, modi eius repellendus. Autem, quisquam.</p>
        <hr>
        <div class="lok d-flex justify-content-center gap-5">
            <p><i class="bi bi-geo-alt-fill"></i> Jakarta, Jl. Panglima Sudirman, Stadion Pangsud</p>
            <p><i class="bi bi-calendar"></i> 1 Oktober 2023 Pukul 18:00</p>
            <p><i class="bi bi-person"></i> Diselenggarakan Oleh <span class="fw-bold">Otello Asia</span></p>
        </div>
        <hr>
    </div>
    <div class="denah_konser mt-5">
        <a href="" class="btn btn-outline-dark btn-lg">Denah Konser</a>
    </div>
</div>
{{-- Detail Konser End --}}

{{-- Custom JS for Counter--}}
<script>
    // Variabel untuk menghitung jumlah tiket
    let ticketCount = 0;
    let plusIntervalId = null;
    let minusIntervalId = null;

    // Fungsi untuk mengurangi jumlah tiket saat tombol minus ditekan
    document.getElementById('minus').addEventListener('mousedown', () => {
        // Hentikan interval penambahan jika sedang berjalan
        clearInterval(plusIntervalId);

        // Mulai interval pengurangan saat tombol minus ditekan dan ditahan
        minusIntervalId = setInterval(() => {
            if (ticketCount > 0) {
                ticketCount--;
                updateTicketCount();
            }
        }, 500); // Anda dapat menyesuaikan kecepatan pengurangan sesuai kebutuhan Anda
    });

    // Hentikan pengurangan tiket saat tombol minus dilepas
    document.getElementById('minus').addEventListener('mouseup', () => {
        clearInterval(minusIntervalId);
    });

    // Fungsi untuk menambah jumlah tiket saat tombol plus ditekan
    document.getElementById('plus').addEventListener('mousedown', () => {
        // Hentikan interval pengurangan jika sedang berjalan
        clearInterval(minusIntervalId);

        // Mulai interval penambahan saat tombol plus ditekan dan ditahan
        plusIntervalId = setInterval(() => {
            ticketCount++;
            updateTicketCount();
        }, 500); // Anda dapat menyesuaikan kecepatan penambahan sesuai kebutuhan Anda
    });

    // Hentikan penambahan tiket saat tombol plus dilepas
    document.getElementById('plus').addEventListener('mouseup', () => {
        clearInterval(plusIntervalId);
    });

    // Fungsi untuk memperbarui tampilan jumlah tiket
    function updateTicketCount() {
        document.getElementById('count').textContent = ticketCount;
    }
</script>
{{-- End --}}

@endsection
