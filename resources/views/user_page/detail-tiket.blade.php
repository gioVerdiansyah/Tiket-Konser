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

        .nav-tabs .nav-link {
            border-bottom: 1px solid transparent;
            border-top: none;
            border-left: none;
            border-right: none;
            transition: border-bottom-color 0.3s ease-in-out;
        }

        .nav-tabs .nav-link.active {
            border-bottom-color: #1170ff;
        }

        .count {
            width: 30px;
            text-align: center;
            font-weight: bold;
        }

        .radio {
            display: none;
        }

        .label {
            /* background-color: #F0F0F0; */
            color: #1170ff;
            cursor: pointer;
            font-size: 18px;
            padding: 15px 25px;
            border-radius: 15px;
            margin-left: 5px
        }

        #lang-1:checked~.label-1,
        #lang-2:checked~.label-2,
        #lang-3:checked~.label-3 {
            background-color: #000000;
            color: #F0F0F0;
        }

        .left-align {
            text-align: left;
        }

        .container {
            margin-top: -10px;
        }
    </style>
    {{-- End --}}

    {{-- Content Start --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-6 text-center">
                <img src="{{ asset('images/homepage/card.jpg') }}" class="img-fluid rounded-4 shadow-lg" style="width: 300px"
                    alt="">
            </div>
            <div class="col-6 text-left mt-5">
                <form>
                    <h3 class="fw-bold">Currents</h3>
                    <h5 class="fw-bold">Rp. 500.000</h5>
                    <p>Saksikan keseruan konser yang mempesona.</p>
                    <p>Stok : 5</p>
                    <input type="radio" id="lang-1" name="lang" value="VVIP" class="radio" checked>
                    <label class="label label-1" for="lang-1">VVIP</label>

                    <input type="radio" id="lang-2" name="lang" value="VIP" class="radio">
                    <label class="label label-2" for="lang-2">VIP</label>

                    <input type="radio" id="lang-3" name="lang" value="Reguler" class="radio">
                    <label class="label label-3" for="lang-3">Reguler</label>
                    <hr>
                    <div class="button d-flex">
                        <div class="counter btn btn-light text-center rounded-3">
                            <button type="button" id="minus" class="minus"
                                onclick="
                                let i = $('#count').val();
                                if (i > 1) {
                                    $('#count').val(--i);
                                }
                                ">
                                <i class="bi bi-dash-lg"></i>
                            </button>
                            <input type="number" id="count" class="form-control" max="5" value="1"
                                style="width: 50px;text-align: end;padding: 10px 5px;">
                            <button type="button" id="plus" class="plus"
                                onclick="
                                let i = parseInt($('#count').val());
                                let max = parseInt($('#count').attr('max'));
                                    if (i < max) {
                                        $('#count').val(i + 1);
                                    }
                            ">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                        </div>
                        <div class="pesan col-9 mx-4">
                            {{-- <a href="/cart" class="btn btn-dark d-flex justify-content-center align-items-center rounded-5"
                            style="height: 60px;">
                            <span>Pesan Sekarang</span>
                        </a> --}}
                            <button type="submit"
                                class="btn btn-dark d-flex justify-content-center align-items-center rounded-5"
                                style="height: 60px;">Pesan sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Content End --}}

    {{-- Anchor Detail Konser dan Ulasan Start --}}
    <div id="" class="container text-center py-3">
        <div class="nav nav-tabs d-flex justify-content-between">
            <div class="nav-item col-6">
                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#tab1">Detail</a>
            </div>
            <div class="nav-item col-6">
                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#tab2">Ulasan</a>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade show active">
                <div class="container">
                    <div class="detail_konser my-5">
                        <h4 class="fw-bold left-align">DETAIL KONSER</h4>
                        <p class="left-align">Tame Impala Concert</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus tempore vitae dolore labore
                            nemo repellat
                            eaimpedit eligendi, quisquam aspernatur ad alias. Aspernatur deleniti velit accusamus aperiam,
                            voluptatem
                            beatae perferendis ad, iste corrupti hic earum, modi eius repellendus. Autem, quisquam.</p>
                        <hr>
                        <div class="lok d-flex justify-content-start text-start gap-5 py-2">
                            <a href="" class="fw-bold text-dark text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#denahKonserModal"><i class="bi bi-map"></i> Denah Konser</a>
                            <p><i class="bi bi-geo-alt-fill"></i>Jakarta, Jl. Panglima Sudirman, Stadion Pangsud</p>
                            <p><i class="bi bi-calendar"></i> 1 Oktober 2023 Pukul 18:00</p>
                            <p><i class="bi bi-person"></i> Diselenggarakan Oleh <span class="fw-bold">Otello Asia</span>
                            </p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div id="tab2" class="tab-pane fade">
                <div class="container py-5">
                    <div class="title d-flex">
                        <h4 class="">KOMENTAR<span>(2)</span></h4>
                    </div>
                    <div class="review-button d-flex">
                        <a href="" class="btn btn-dark rounded-5">Beri Ulasan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Memuat jQuery dan script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> {{-- Anchor Detail Konser dan Ulasan End --}}

    {{-- Detail Konser Start --}}

    {{-- Detail Konser End --}}

    {{-- Modal Denah Konser Start --}}
    <div class="modal fade" id="denahKonserModal" tabindex="-1" aria-labelledby="denahKonserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-semibold" id="denahKonserModalLabel">Denah Konser</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('images/detail-tiket/denah.jpg') }}" alt="Denah Konser" class="img-fluid"
                        width="%">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Denah Konser End --}}

    {{-- Custom JS for Counter --}}
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
