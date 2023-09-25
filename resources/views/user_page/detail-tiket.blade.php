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
        #lang-3:checked~.label-3,
        #lang-4:checked~.label-4,
        #lang-5:checked~.label-5 {
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
                <img src="{{ asset('storage/image/konser/banner/' . $konser->banner) }}" class="img-fluid rounded-4 shadow-lg"
                    style="width: 300px" alt="">
            </div>
            <div class="col-6 text-left mt-5">
                <form>
                    <h3 class="fw-bold">{{ $konser->nama_konser }}</h3>
                    <h5 class="fw-bold" id="harga">Rp. {{ number_format($tiket->harga1, 0, ',', '.') }}</h5>
                    @if (isset($konser->deskripsi))
                        <p>{{ $konser->deskripsi }}</p>
                    @else
                        <p>Penjual tidak menambahkan deskripsi...</p>
                    @endif

                    <p>Stok : {{ $tiket->jumlah_tiket }}</p>

                    <input type="radio" id="lang-1" name="lang" value="{{ $tiket->harga1 }}" class="radio" checked>
                    <label class="label label-1" for="lang-1">{{ strtoupper($tiket->kategoritiket1) }}</label>

                    @if (isset($tiket->kategoritiket2) && isset($tiket->harga2))
                        <input type="radio" id="lang-2" name="lang" value="{{ $tiket->harga2 }}" class="radio">
                        <label class="label label-2" for="lang-2">{{ strtoupper($tiket->kategoritiket2) }}</label>
                    @endif

                    @if (isset($tiket->kategoritiket3) && isset($tiket->harga3))
                        <input type="radio" id="lang-3" name="lang" value="{{ $tiket->harga3 }}" class="radio">
                        <label class="label label-3" for="lang-3">{{ strtoupper($tiket->kategoritiket3) }}</label>
                    @endif

                    @if (isset($tiket->kategoritiket4) && isset($tiket->harga4))
                        <input type="radio" id="lang-4" name="lang" value="{{ $tiket->harga4 }}" class="radio">
                        <label class="label label-4" for="lang-4">{{ strtoupper($tiket->kategoritiket4) }}</label>
                    @endif

                    @if (isset($tiket->kategoritiket5) && isset($tiket->harga5))
                        <input type="radio" id="lang-5" name="lang" value="{{ $tiket->harga5 }}" class="radio">
                        <label class="label label-5" for="lang-5">{{ strtoupper($tiket->kategoritiket5) }}</label>
                    @endif

                    <hr>
                    <div class="button d-flex" id="countparent">
                        <div class="counter btn btn-light text-center rounded-3">
                            <button type="button" id="minus" class="minus">
                                <i class="bi bi-dash-lg"></i>
                            </button>
                            <input type="number" id="count" class="form-control" max="{{ $tiket->jumlah_tiket }}"
                                value="1" style="width: 50px;text-align: end;padding: 10px 5px;">
                            <button type="button" id="plus" class="plus">
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
                        <p class="left-align">{{ $konser->nama_konser }}</p>
                        @if (isset($konser->deskripsi))
                            <p>{{ $konser->deskripsi }}</p>
                        @else
                            <p>Penjual tidak menambahkan deskripsi...</p>
                        @endif
                        <hr>
                        <div class="lok d-flex justify-content-start text-start gap-5 py-2">
                            <a href="" class="fw-bold text-dark text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#denahKonserModal"><i class="bi bi-map"></i> Denah Konser</a>
                            <a href="" class="text-dark text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#detail-location"><i
                                    class="bi bi-geo-alt-fill"></i>{{ $konser->alamat }}</a>
                            <p><i class="bi bi-calendar"></i>
                                @php
                                    $tanggalKonser = $konser->tanggal_konser;
                                    $posisiTo = strpos($tanggalKonser, 'to');
                                    if ($posisiTo !== false) {
                                        $tanggalKonser = str_replace('to', 'sampai', $tanggalKonser);
                                    }
                                    echo $tanggalKonser;
                                @endphp
                                Jam
                                @php
                                    $waktuMulai = \Carbon\Carbon::parse($konser->waktu_mulai);
                                    echo $waktuMulai->format('H:i');
                                @endphp
                                sampai
                                @php
                                    $waktuSelesai = \Carbon\Carbon::parse($konser->waktu_selesai);
                                    echo $waktuSelesai->format('H:i');
                                @endphp

                            </p>
                            <p>
                                @if (isset($konser->photo_penyelenggara))
                                    <img src="{{ asset('storage/image/' . $konser->photo_penyelenggara) }}"
                                        alt="Photo penyelenggara" width="30">
                                @else
                                    <img src="{{ asset('storage/image/photo-user/' . Auth::user()->pp) }}"
                                        alt="Photo penyelenggara" width="30">
                                @endif
                                Diselenggarakan Oleh <span class="fw-bold">
                                    @if (isset($konser->nama_penyelenggara))
                                        {{ $konser->nama_penyelenggara }}
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif
                                </span>
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
    <div class="modal fade" id="denahKonserModal" tabindex="-1" aria-labelledby="denahKonserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-semibold" id="denahKonserModalLabel">Denah Konser</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    @if (isset($konser->denah))
                        <img src="{{ asset('storage/image/konser/denah_konser/' . $konser->denah) }}" alt="Denah Konser"
                            class="img-fluid"width="%">
                    @else
                        <p>Denah tidak ditambahkan!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Denah Konser End --}}
    <div class="modal fade" id="detail-location" tabindex="-1" aria-labelledby="lokasiKonserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-semibold" id="denahKonserModalLabel">Lokasi konser</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="modal-body">
                        <div id="map" style="width: 100%; height: 400px;"></div>
                        <div class="nama-tempat text-start">
                            <h5>Nama Tempat:</h5>
                            <p>{{ $konser->tempat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- iframe --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS reference -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        // Inisialisasi peta dengan koordinat yang diambil dari variabel
        var map = L.map('map').setView([{{ $konser->lat }}, {{ $konser->lon }}], 15);

        // Tambahkan tile layer ke peta (Anda dapat mengganti URL tile layer sesuai kebutuhan)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Tambahkan marker ke peta
        var marker = L.marker([{{ $konser->lat }}, {{ $konser->lon }}]).addTo(map);
    </script>

    {{-- END iframe --}}
    {{-- click kategori tiket harga auto berubah --}}
    <script>
        // Dapatkan semua input radio dengan nama "lang"
        var radioInputs = document.querySelectorAll('input[name="lang"]');

        // Dapatkan elemen h5 dengan id "harga"
        var hargaElement = document.getElementById('harga');

        // Tambahkan event listener pada setiap input radio
        radioInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                // Periksa apakah input radio ini yang sedang dipilih
                if (input.checked) {
                    // Setel nilai elemen h5 "harga" sesuai dengan nilai input radio yang dipilih
                    hargaElement.textContent = "Rp. " + formatRupiah(input.value);
                }
            });
        });

        // Fungsi untuk mengubah format angka menjadi format Rupiah
        function formatRupiah(angka) {
            var numberString = angka.toString();
            var split = numberString.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }
    </script>

    {{-- END click kategori tiket harga auto berubah --}}

    {{-- Custom JS for Counter --}}
    <script>
        let warningShown = false; // Variabel untuk melacak apakah pesan peringatan sudah ditampilkan

        $('#plus').click(function(e) {
            e.preventDefault();
            let i = parseInt($('#count').val());

            if (i < 5) {
                $('#count').val(i + 1);
            } else {
                if (!warningShown) {
                    var newParagraph = $('<p></p>');
                    newParagraph.text('Peringatan: Anda hanya dapat memesan 5 tiket.');
                    newParagraph.addClass('text-danger');
                    $('#countparent').after(newParagraph); // Menambahkan pesan setelah elemen dengan id "count"
                    warningShown = true; // Setel ke true agar pesan hanya muncul sekali
                }
            }
        });

        $('#minus').click(function(e) {
            e.preventDefault();
            let i = parseInt($('#count').val());

            if (i > 0) {
                $('#count').val(i - 1);
            }

            // Sembunyikan pesan peringatan jika ada
            if (warningShown) {
                $('.text-danger').remove();
                warningShown = false; // Setel kembali ke false saat mengurangi jumlah tiket
            }
        });
    </script>
    {{-- End --}}
@endsection
