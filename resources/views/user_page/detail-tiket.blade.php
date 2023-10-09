@extends('layouts.master')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- Custom CSS --}}
    <style>
        body {
            width: 100%;
            height: auto;
        }

        .breadcrumb__linkss a {
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            text-decoration: none;
        }

        a.nac-link {
            font-size: 15px;
        }

        .lok {
            display: flex;
            justify-content: start;
            /* atau flex-start */
            text-align: start;
            /* atau left */
            gap: 20px;
        }

        .warning {
            display: flex;
            padding-top: 1rem;
            justify-content: center;
            margin: 0 auto;
        }

        .aku {
            display: flex;
            justify-content: space-between;
            background-color: #ffbc003b;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

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
            color: #000000;
            /* opacity: 60%; */
            border-bottom: 1px solid transparent;
            border-top: none;
            border-left: none;
            border-right: none;
            transition: border-bottom-color 0.3s ease-in-out;
        }

        .nav-tabs .nav-link.active {
            border-bottom-color: #000000;
            color: #000000
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
            color: #000000;
            cursor: pointer;
            font-size: 18px;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 5px;
            margin-left: 5px;
            background-color: #F0F0F0;
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
            margin-top: 0px;
        }

        .tengah {
            text-align: center;
        }

        .radio {
            transform: scale(0.8);
            /* Mengubah ukuran radio button */
        }

        .label {
            font-size: 12px;
            font-weight: 800;
            /* Mengubah ukuran teks label */
            padding: 15px 15px;
        }

        @media(max-width:766px) {}

        @media(max-width:460px) {
            .lok {
                display: grid;
            }
        }

        @media(max-width:338px) {
            .lok {
                gap: 0px;
            }

            .label {
                padding: 15px 15px;
                margin-bottom: 8px;
            }
        }

        @media(max-width:414px) {
            .img-fluid {
                width: 85%;
            }
        }

        @media(max-width:692px) {
            .row {
                display: block;
            }

            .row .col-6 {
                margin-top: 5%;
            }

            .row .col-6 {
                width: 100%;
            }

            body {
                width: auto;
                height: auto;
            }
        }
    </style>
    {{-- End --}}

    {{-- Content Start --}}
    <div class="container py-2">
        <div class="row">
            <div class="col-6 text-center">
                <img src="{{ asset('storage/image/konser/banner/' . $konser->banner) }}" class="img-fluid rounded-4"
                    alt="Banner konser">
            </div>
            <div class="col-6 text-left" style="margin-top:10%;">
                <form @if (!$konser->deleted_at && $tiket->jumlah_tiket) action="{{ route('orders.store') }}" method="POST" @endif>
                    @csrf
                    <input type="hidden" name="konser_id" value="{{ $konser->id }}">
                    <h3 class="fw-bold" style="margin-bottom: 0.4%;">{{ $konser->nama_konser }}</h3>
                    <h5 class="fw-bold" id="harga" style="margin-bottom: 1%;">Rp.
                        {{ number_format($tiket->harga1, 0, ',', '.') }}</h5>

                    @if (!$konser->deleted_at && $tiket->jumlah_tiket)
                        <p style="margin-bottom: 1%">
                            Stok :
                            @if ($tiket->jumlah_tiket)
                                {{ $tiket->jumlah_tiket }}
                            @else
                                <span style="color: red">Sold Out!</span>
                            @endif
                        </p>

                        <input type="radio" id="lang-1" name="price" value="{{ $tiket->harga1 }}" class="radio"
                            checked>
                        <label class="label label-1 kecil" for="lang-1">{{ strtoupper($tiket->kategoritiket1) }}</label>
                        <input type="radio" id="kategori-lang-1" name="kategori_tiket"
                            value="{{ $tiket->kategoritiket1 }}" hidden checked>

                        @if (isset($tiket->kategoritiket2) && isset($tiket->harga2))
                            <input type="radio" id="lang-2" name="price" value="{{ $tiket->harga2 }}"
                                class="radio">
                            <label class="label label-2" for="lang-2">{{ strtoupper($tiket->kategoritiket2) }}</label>
                            <input type="radio" id="kategori-lang-2" name="kategori_tiket"
                                value="{{ $tiket->kategoritiket2 }}" hidden>
                        @endif

                        @if (isset($tiket->kategoritiket3) && isset($tiket->harga3))
                            <input type="radio" id="lang-3" name="price" value="{{ $tiket->harga3 }}"
                                class="radio">
                            <label class="label label-3" for="lang-3">{{ strtoupper($tiket->kategoritiket3) }}</label>
                            <input type="radio" id="kategori-lang-3" name="kategori_tiket"
                                value="{{ $tiket->kategoritiket3 }}" hidden>
                        @endif

                        @if (isset($tiket->kategoritiket4) && isset($tiket->harga4))
                            <input type="radio" id="lang-4" name="price" value="{{ $tiket->harga4 }}"
                                class="radio">
                            <label class="label label-4" for="lang-4">{{ strtoupper($tiket->kategoritiket4) }}</label>
                            <input type="radio" id="kategori-lang-4" name="kategori_tiket"
                                value="{{ $tiket->kategoritiket4 }}" hidden>
                        @endif

                        @if (isset($tiket->kategoritiket5) && isset($tiket->harga5))
                            <input type="radio" id="lang-5" name="price" value="{{ $tiket->harga5 }}"
                                class="radio">
                            <label class="label label-5" for="lang-5">{{ strtoupper($tiket->kategoritiket5) }}</label>
                            <input type="radio" id="kategori-lang-5" name="kategori_tiket"
                                value="{{ $tiket->kategoritiket5 }}" hidden>
                        @endif

                        <hr>
                        <div class="button" id="countparent" style="display:-webkit-box;">
                            <div class="counter btn btn-light text-center rounded-3">
                                <button type="button" id="minus" class="minus">
                                    <i class="bi bi-dash-lg"></i>
                                </button>
                                <input type="number" id="count" name="jumlah" class="form-control tengah"
                                    max="{{ $tiket->jumlah_tiket }}" value="1"
                                    style="width: 50px; padding: 10px 5px;">
                                <button type="button" id="plus" class="plus">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                            <div class="pesan col-5 mx-4">
                                <button type="submit" id="buatpesanan" class="btn btn-dark rounded-4"
                                    style="height: 60px;">Pesan sekarang</button>
                            </div>
                        </div>
                        @error('jumlah')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    @endif
                </form>
                @if ($konser->deleted_at)
                    <div class="aku">
                        <i class="material-icons" style="font-size: 30px; padding:1rem;">warning</i>
                        <p class="warning">Konser telah kadaluarsa</p>
                    </div>
                @endif
                @if ($tiket->jumlah_tiket == 0)
                    <div class="aku">
                        <i class="material-icons" style="font-size: 30px; padding:1rem;">warning</i>
                        <p class="warning">Stock tiket sudah habis!</p>
                    </div>
                @endif
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
                        <p class="left-align" style="color: #000000;"> {{ $konser->nama_konser }}</p>
                        @if (isset($konser->deskripsi))
                            <!-- Tampilkan deskripsi dengan batasan karakter -->
                            <p class="left-align deskripsi-pendek" id="deskripsi-pendek">
                                {{ Str::limit($konser->deskripsi, 500) }}
                            </p>
                            <!-- Tampilkan deskripsi lengkap -->
                            <p class="left-align deskripsi-lengkap" id="deskripsi-lengkap" style="display: none;">
                                {{ $konser->deskripsi }}
                            </p>
                            <!-- Tombol "Read More" -->
                            @if (strlen($konser->deskripsi) > 500)
                                <a href="#" id="read-more-btn" class="text-dark text-decoration-none">Selengkapnya</a>
                            @endif
                        @else
                            <p>Penjual tidak menambahkan deskripsi...</p>
                        @endif
                        <hr>
                        <div class="lok">
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
                                <img src="{{ asset('storage/image/' . $konser->photo_penyelenggara) }}"
                                    alt="Photo penyelenggara" width="30">
                                Diselenggarakan Oleh <span class="fw-bold">
                                    {{ $konser->nama_penyelenggara }}
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
                        <h4 id="jumlah_komen">KOMENTAR (<span>{{ $jumlahKomentar }}</span>)</h4>
                    </div>
                    @auth
                        @if ($orderExists)
                            @if (!$konser->deleted_at)
                                <div class="comment-form">
                                    <form id="comment-form" action="{{ route('comment', $konser->id) }}" method="POST"
                                        class="d-flex flex-column">
                                        <input type="hidden" name="komen_id"
                                            value="{{ \App\Models\Comment::max('id') + 1 }}">
                                        <div class="form-group">
                                            <textarea class="form-control" id="komentar" name="fillin" rows="3" placeholder="Tulis komentar Anda"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3" style="width: max-content">Kirim
                                            Komentar</button>
                                    </form>
                                </div>
                            @endif
                        @else
                            @if (!$konser->deleted_at)
                                <p>Belilah tiket untuk memberi ulasan</p>
                            @else
                                <p>Konser telah kadaluarsa!</p>
                            @endif
                        @endif
                    @else
                        <p>Login untuk memberi ulasan</p>
                    @endauth
                    <div id="comment-list-container">
                        @forelse ($konser->comment->sortByDesc('created_at') as $i => $comment)
                            <div class="comment-list mt-4" id="comment-list{{ ++$i }}">
                                <div class="comment d-flex align-items-start">
                                    <div class="user-info">
                                        <div class="d-flex flex-row align-items-center">
                                            <img src="{{ asset('storage/image/photo-user/' . $comment->user->pp) }}"
                                                alt="Foto Profil Verdi" width="40">
                                            <div class="d-flex flex-column text-start ms-3">
                                                <p class="mb-0"><strong>{{ $comment->user->name }}</strong></p>
                                                <p>{{ \Carbon\Carbon::parse($comment->created_at)->translatedFormat('d M Y') }}
                                                </p>
                                            </div>
                                            @auth
                                                @if ($comment->user->id == Auth::user()->id)
                                                    <div class="nav-item dropdown">
                                                        <a class="nav-link" href="#" id="profileDropdown"
                                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical ms-3"></i>
                                                        </a>
                                                        <div class="komenku dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="profileDropdown"
                                                            id="comment-list{{ $i }}">
                                                            <form
                                                                onsubmit="
                                                                    event.preventDefault();
                                                                    deleteComment({{ $comment->id }}, {{ $i }});
                                                                ">
                                                                <button type="submit" class="dropdown-item">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                        <div class="text-start">
                                            <p>{{ $comment->fillin }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @if (!$konser->deleted_at)
                                @if ($orderExists)
                                    <p id="first-comment">Belum ada komentar, jadilah orang pertama yang berkomentar</p>
                                @endif
                            @else
                                <p>Anda sudah tidak bisa memberi ulasan karena konser telah kadaluarsa</p>
                            @endif
                        @endforelse
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
                        <div class="nama-tempat text-start mt-3">
                            <h5>Nama Tempat :</h5>
                            <p>{{ $konser->tempat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const form = document.getElementById('comment-form');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                });

                if (!response.ok) {
                    throw new Error(response.statusText);
                }

                const data = await response.json();
                console.log(data);
                if (data && data.message) {
                    if (data && data.message) {
                        var lastValue = parseInt($('#jumlah_komen span').text());
                        $('#jumlah_komen span').text(lastValue + 1);
                        const lastCommentIndex = $('#comment-list-container .comment-list').length + 1;
                        const now = new Date();
                        const tanggal = now.toLocaleDateString('id-ID', {
                            day: 'numeric',
                            month: 'short',
                            year: 'numeric',
                        });

                        if (lastValue == 0) {
                            $('#first-comment').remove();
                        }

                        const newComment = `
                            <div class="comment-list mt-4" id="comment-list${lastCommentIndex}">
                                <div class="comment d-flex align-items-start">
                                    <div class="user-info">
                                        <div class="d-flex flex-row align-items-center">
                                            @auth
                                        <img src="{{ asset('storage/image/photo-user/' . Auth::user()->pp) }}"
                                            alt="Foto Profil Verdi" width="40">
                                            @endauth
                                        <div class="d-flex flex-column text-start ms-3">
                                            @auth
                                            <p class="mb-0"><strong>{{ Auth::user()->name }}</strong></p>
                                            <p>${tanggal}</p>
                                            @endauth
                                        </div>
                                                <div class="nav-item dropdown">
                                                    <a class="nav-link" href="#" id="profileDropdown" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical ms-3"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="profileDropdown">
                                                        <form onsubmit="
                                                                    event.preventDefault();
                                                                    deleteComment(${formData.get('komen_id')}, ${lastCommentIndex});
                                                                ">
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                    </div>
                                        <div class="text-start">
                                            <p>${formData.get('fillin')}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#comment-list-container').prepend(newComment);
                        form.reset();
                    }

                } else if (data && data.error) {
                    console.log(data.error);
                    Swal.fire('Kesalahan!', data.error[0], 'error');
                }
            } catch (error) {
                console.log(error);
                Swal.fire('Kesalahan!', `Request gagal: ${error.message}`, 'error');
            }
        });

        function deleteComment(id, listId) {
            const commentElement = $('#comment-list' + listId);
            try {
                $.ajax({
                    type: 'DELETE',
                    url: `{{ route('delete-comment', '') }}/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        var lastValue = parseInt($('#jumlah_komen span').text());
                        $('#jumlah_komen span').text(lastValue - 1);
                        if (data.message) {
                            commentElement.remove();
                            if (lastValue == 1) {
                                $('#comment-list-container').prepend(
                                    @if (!$konser->deleted_at)
                                        '<p id="first-comment">Belum ada komentar, jadilah orang pertama yang berkomentar</p>'
                                    @else
                                        '<p>Anda sudah tidak bisa memberi ulasan karena konser telah kadaluarsa</p>'
                                    @endif
                                );
                            }
                        } else {
                            Swal.fire('Error!', `Gagal karena: ${data.error}`, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Kesalahan!', `Request gagal, coba refresh halaman untuk menghapusnya`,
                            'error');
                    }
                });
            } catch (error) {
                Swal.fire('Kesalahan!', `Request gagal: ${error.message}`, 'error');
            }
        }
    </script>
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
        var radioInputs = document.querySelectorAll('input[name="price"]');
        var hargaElement = document.getElementById('harga');

        radioInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                if (input.checked) {
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
    <script>
        const radioHarga = document.querySelectorAll('[name="price"]');

        radioHarga.forEach((radio) => {
            radio.addEventListener('change', function() {
                const selectedId = this.id;
                const kategoriId = 'kategori-' + selectedId;
                const kategoriInput = document.getElementById(kategoriId);
                kategoriInput.checked = this.checked;
            });
        });
    </script>

    {{-- END click kategori tiket harga auto berubah --}}

    {{-- Custom JS for Counter --}}
    <script>
        let warningShown = false;

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
                    $('#countparent').after(newParagraph);
                    warningShown = true;
                }
            }
        });

        $('#minus').click(function(e) {
            e.preventDefault();
            let i = parseInt($('#count').val());

            if (i > 1) {
                $('#count').val(i - 1);
            }
            if (warningShown) {
                $('.text-danger').remove();
                warningShown = false;
            }
        });
    </script>
    {{-- End --}}

    {{-- Read More --}}
    <script>
        $(document).ready(function () {
            // Saat tombol "Read More" diklik
            $('#read-more-btn').click(function (e) {
                e.preventDefault();
                $('.deskripsi-pendek').toggle();
                $('.deskripsi-lengkap').toggle();
                $(this).text(function (i, text) {
                    return text === 'Selengkapnya' ? 'Lebih sedikit' : 'Selengkapnya';
                });
            });
        });
    </script>
    {{-- End --}}
@endsection
