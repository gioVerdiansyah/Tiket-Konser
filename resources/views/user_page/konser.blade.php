@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="path-to-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('malefashion') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion') }}/css/elegant-icons.css" type="text/css">
    <style>
        .shop__left {
            padding-bottom: 8px;
        }

        .shop__left d {
            font-size: 24px;
            font-weight: bold;
        }

        .paginate ul {
            justify-content: center;
        }
    </style>
    <script nonce="39342a9c-a4b6-4c37-a019-bd53c0eeded9">
        (function(w, d) {
            ! function(bg, bh, bi, bj) {
                bg[bi] = bg[bi] || {};
                bg[bi].executed = [];
                bg.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bg.zaraz.q = [];
                bg.zaraz._f = function(bk) {
                    return async function() {
                        var bl = Array.prototype.slice.call(arguments);
                        bg.zaraz.q.push({
                            m: bk,
                            a: bl
                        })
                    }
                };
                for (const bm of ["track", "set", "debug"]) bg.zaraz[bm] = bg.zaraz._f(bm);
                bg.zaraz.init = () => {
                    var bn = bh.getElementsByTagName(bj)[0],
                        bo = bh.createElement(bj),
                        bp = bh.getElementsByTagName("title")[0];
                    bp && (bg[bi].t = bh.getElementsByTagName("title")[0].text);
                    bg[bi].x = Math.random();
                    bg[bi].w = bg.screen.width;
                    bg[bi].h = bg.screen.height;
                    bg[bi].j = bg.innerHeight;
                    bg[bi].e = bg.innerWidth;
                    bg[bi].l = bg.location.href;
                    bg[bi].r = bh.referrer;
                    bg[bi].k = bg.screen.colorDepth;
                    bg[bi].n = bh.characterSet;
                    bg[bi].o = (new Date).getTimezoneOffset();
                    if (bg.dataLayer)
                        for (const bt of Object.entries(Object.entries(dataLayer).reduce(((bu, bv) => ({
                                ...bu[1],
                                ...bv[1]
                            })), {}))) zaraz.set(bt[0], bt[1], {
                            scope: "page"
                        });
                    bg[bi].q = [];
                    for (; bg.zaraz.q.length;) {
                        const bw = bg.zaraz.q.shift();
                        bg[bi].q.push(bw)
                    }
                    bo.defer = !0;
                    for (const bx of [localStorage, sessionStorage]) Object.keys(bx || {}).filter((bz => bz
                        .startsWith("_zaraz_"))).forEach((by => {
                        try {
                            bg[bi]["z_" + by.slice(7)] = JSON.parse(bx.getItem(by))
                        } catch {
                            bg[bi]["z_" + by.slice(7)] = bx.getItem(by)
                        }
                    }));
                    bo.referrerPolicy = "origin";
                    bo.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bg[bi])));
                    bn.parentNode.insertBefore(bo, bn)
                };
                ["complete", "interactive"].includes(bh.readyState) ? zaraz.init() : bg.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a class="nac-link" href="/">Beranda</a>
                        <span>Konser</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{ route('konser.search') }}" method="get">
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                        </div>

                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">

                                {{--  harga  --}}
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Harga</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">

                                            <div class="middle">
                                                <div class="multi-range-slider my-2">
                                                    <input type="range" id="input_left" name="harga_min"
                                                        class="range_slider" min="0" max="1000000" value="250000"
                                                        onmousemove="left_slider(this.value)">
                                                    <input type="range" id="input_right" class="range_slider"
                                                        name="harga_max" min="0" max="1000000" value="750000"
                                                        onmousemove="right_slider(this.value)">
                                                    <div class="slider">
                                                        <div class="track"></div>
                                                        <div class="range"></div>
                                                        <div class="thumb left"></div>
                                                        <div class="thumb right"></div>

                                                    </div>
                                                </div>
                                                <div id="multi_range">
                                                    <span id="left_value">Rp 250.000</span><span> ~ </span><span
                                                        id="right_value">Rp 750.000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--  kategori  --}}
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Kategori</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">

                                        @isset($kategoris)
                                            <div class="card-body">
                                                <div class="shop__sidebar__categories">
                                                    <ul class="nice-scroll">
                                                        @forelse ($kategoris as $i => $kategori)
                                                            <li>
                                                                @for ($j = 0; $j < 2; $j++)
                                                                    @php
                                                                        $index = $i * 2 + $j;
                                                                        $kategoriItem = $kategoris[$index] ?? null;
                                                                    @endphp
                                                                    @if ($kategoriItem)
                                                                        <label for="kategori{{ $index }}" role="button"
                                                                            id="label{{ $index }}"
                                                                            class="p-2 m-2">{{ $kategoriItem->nama_kategori }}</label>
                                                                        <input type="checkbox" name="kategori[]"
                                                                            id="kategori{{ $index }}"
                                                                            value="{{ $kategoriItem->id }}"
                                                                            onchange="onchangeInputCheckbox('{{ $index }}')"
                                                                            hidden>
                                                                    @endif
                                                                @endfor
                                                            </li>
                                                        @empty
                                                            <p>Tidak ada kategori yang tersedia</p>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        @endisset

                                    </div>
                                </div>
                                {{--  button  --}}
                                <div class="card ">
                                    <div class="card-bodys">
                                        <div class="shop__sidebar__tags d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-dark"
                                                style="background: black; color:#ffffff; border-radius: 10px; ">Terapkan
                                                Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                {{--  daftarkonser  --}}
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__left">
                                    <d>Daftar Konser</d>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        @forelse ($konsers as $konser)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic">
                                        <img src="{{ asset('storage/image/konser/banner/' . $konser->banner) }}"
                                            style="width: 100%; height: 300px; border-bottom: solid 1px #d4d4d4;">
                                        <ul class="product__hover">
                                            <li><a href="{{ route('detail_konser', $konser->id) }}"><img
                                                        src="img/icon/detail-removebg-preview.png"
                                                        style="border-radius: 5px;" alt><span>Detail</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6> {{ $konser->nama_konser }}
                                            <span>
                                                {{ $konser->kategori->nama_kategori }}
                                            </span>
                                        </h6>
                                        <h5>
                                            @currency ($konser->tiket[0]->harga1)
                                            @if ($konser->deleted_at)
                                            <span class="text-warning float-end">Kadaluarsa</span>
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada item yang tersedia.</p>
                        @endforelse

                    </div>
                    {{--  paginate  --}}
                    <div class="row mt-3">
                        <div class="paginate">
                            {{ $konsers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function onchangeInputCheckbox(index) {
            let labelId = 'label' + index;
            let checkbox = document.getElementById('kategori' + index);
            let label = document.getElementById(labelId);

            if (checkbox.checked) {
                label.classList.add('bg-secondary', 'rounded', 'text-white');
            } else {
                label.classList.remove('bg-secondary', 'rounded', 'text-white');
            }
        }
    </script>

    <script src="{{ asset('malefashion') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('malefashion') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('malefashion') }}/js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(e) {
            $('.range_slider').on('change', function() {
                let left_value = $('#input_left').val();
                let right_value = $('#input_right').val();
                // alert(left_value+right_value);
                $.ajax({
                    {{--  url:"{{ route('search.products') }}",  --}}
                    method: "GET",
                    data: {
                        left_value: left_value,
                        right_value: right_value
                    },
                    success: function(res) {
                        $('.search-result').html(res);
                    }
                });
            });

            $('#sort_by').on('change', function() {
                let sort_by = $('#sort_by').val();
                $.ajax({
                    {{--  url:"{{ route('sort.by') }}",  --}}
                    method: "GET",
                    data: {
                        sort_by: sort_by
                    },
                    success: function(res) {
                        $('.search-result').html(res);
                    }
                });
            });
        })
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"8035967efd494ac7","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
@endsection
