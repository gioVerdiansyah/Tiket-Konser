@extends('layouts.master')
@section('content')
    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        {{--  <meta charset="UTF-8">
<meta name="description" content="Male_Fashion Template">
<meta name="keywords" content="Male_Fashion, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  --}}
        <title>Ticket.</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/style.css" type="text/css">
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
    </head>

    <body>

        {{--  <div id="preloder">
<div class="loader"></div>
</div>  --}} <!-- ini untuk waktu loading ada animasinya -->

        {{--  <div class="container">
<div class="row">
<div class="col-lg-3 col-md-3">
<div class="header__logo">
<a href="index.html"><img src="img/logo.png" alt></a>
</div>
</div>
<div class="col-lg-6 col-md-6">
<nav class="header__menu mobile-menu">
<ul>
    <li class="nav-item">
        <a class="nav-link" href="/">Beranda</a>
      </li>

  <li class="active"><a href="">Konser</a></li>

  <li class="nav-item">
    <a class="nav-link" href="/jualtiket">Jual Tiket</a>
  </li>
</ul>
</nav>
</div>


  <div class="col-lg-3 col-md-3">
<div class="header__nav__option">
<a href="#" class="search-switch"><img src="img/icon/search.png" alt></a>
  <a href="#"><img src="img/icon/heart.png" alt></a>
<a href="/cart"><img src="img/icon/cart.png" alt> <span>0</span></a>
  <div class="price">$0.00</div>
</div>
</div>
</div>
<div class="canvas__open"><i class="fa fa-bars"></i></div>
</div>
</header>  --}}



        <section class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        {{--  <div class="breadcrumb__text">
                            <h4>Konser</h4>  --}}
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
                    <div class="col-lg-3" >
                        <div class="shop__sidebar">
                            <div class="shop__sidebar__search">
                                <form action="{{ route('konser.search') }}" method="get">
                                    <input type="text" name="search" placeholder="Search...">
                                    <button type="submit"><span class="icon_search"></span></button>
                                </form>
                            </div>


                            <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseOne">Kategori</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__categories">
                                                    <ul class="nice-scroll">
                                                        @foreach ($kategoris as $kategori)
                                                        <li><a href="/konser/kategori/{{ $kategori->id }}">{{ $kategori->nama_kategori }}</a></li>
                                                        @endforeach

                                                        {{--  <li><a href="#">Rock (20)</a></li>
                                                        <li><a href="#">Hip Hop (20)</a></li>
                                                        <li><a href="#">Dangdut (20)</a></li>
                                                        <li><a href="#">Rap (20)</a></li>
                                                        <li><a href="#">Campursari (20)</a></li>
                                                        <li><a href="#"> CampurKebo(20)</a></li>
                                                        <li><a href="#">Ludruk (20)</a></li>
                                                        <li><a href="#">Pop (20)</a></li>  --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree">Harga</a>
                                        </div>
                                        <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__price">
                                                    <ul>
                                                        <li><a href="#">Rp50.000 - Rp100.000</a></li>
                                                        <li><a href="#">Rp100.000 - Rp150.000</a></li>
                                                        <li><a href="#">Rp150.000 - Rp200.000</a></li>
                                                        <li><a href="#">Rp200.000 - Rp250.000</a></li>
                                                        <li><a href="#">Rp250.000+</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseSix">Kota</a>
                                        </div>
                                        <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__tags">
                                                    <a href="#">Jakarta</a>
                                                    <a href="#">Banyuwangi</a>
                                                    <a href="#">Maluku</a>
                                                    <a href="#">Malang</a>
                                                    <a href="#">Ngawi</a>
                                                    <a href="#">Klaten</a>
                                                    <a href="#">Singosari</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="shop__product__option">
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__left">
                                        <d>Daftar Konser</d>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__right">
                                        <p>Sort by Price:</p>
                                        <select>
                                            <option value>Low To High</option>
                                            <option value>$0 - $55</option>
                                            <option value>$55 - $100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        @forelse ($konsers as $konser)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic">
                                        {{--  <img src="{{ $konser->foto_tiket }}" style="width: 240px; height: 260px;">  --}}
                                        <img src="{{ asset($konser->foto_tiket) }}"
                                        style="width: 265px; height: 280px; border-radius: 5%; ">
                                        <ul class="product__hover">
                                            {{--  <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt><span>Compare</span></a></li>  --}}
                                            <li><a href="detail-tiket"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{ $konser->nama }}</h6>
                                        <a href="#" class="add-cart">+ Masukan ke keranjang</a>
                                        <h5>{{ $konser->harga }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                           <p>Tidak ada item yang tersedia.</p>
                    @endforelse
                </div>



                            {{--  <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item sale">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                                        <span class="label">Sale</span>
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Multi-pocket Chest Bag</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$43.48</h5>
                                        <div class="product__color__select">
                                            <label for="pc-7">
                                                <input type="radio" id="pc-7">
                                            </label>
                                            <label class="active black" for="pc-8">
                                                <input type="radio" id="pc-8">
                                            </label>
                                            <label class="grey" for="pc-9">
                                                <input type="radio" id="pc-9">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Diagonal Textured Cap</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$60.9</h5>
                                        <div class="product__color__select">
                                            <label for="pc-10">
                                                <input type="radio" id="pc-10">
                                            </label>
                                            <label class="active black" for="pc-11">
                                                <input type="radio" id="pc-11">
                                            </label>
                                            <label class="grey" for="pc-12">
                                                <input type="radio" id="pc-12">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item sale">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-6.jpg">
                                        <span class="label">Sale</span>
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Ankle Boots</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$98.49</h5>
                                        <div class="product__color__select">
                                            <label for="pc-16">
                                                <input type="radio" id="pc-16">
                                            </label>
                                            <label class="active black" for="pc-17">
                                                <input type="radio" id="pc-17">
                                            </label>
                                            <label class="grey" for="pc-18">
                                                <input type="radio" id="pc-18">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>T-shirt Contrast Pocket</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$49.66</h5>
                                        <div class="product__color__select">
                                            <label for="pc-19">
                                                <input type="radio" id="pc-19">
                                            </label>
                                            <label class="active black" for="pc-20">
                                                <input type="radio" id="pc-20">
                                            </label>
                                            <label class="grey" for="pc-21">
                                                <input type="radio" id="pc-21">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-8.jpg">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Basic Flowing Scarf</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$26.28</h5>
                                        <div class="product__color__select">
                                            <label for="pc-22">
                                                <input type="radio" id="pc-22">
                                            </label>
                                            <label class="active black" for="pc-23">
                                                <input type="radio" id="pc-23">
                                            </label>
                                            <label class="grey" for="pc-24">
                                                <input type="radio" id="pc-24">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-9.jpg">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Piqué Biker Jacket</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$67.24</h5>
                                        <div class="product__color__select">
                                            <label for="pc-25">
                                                <input type="radio" id="pc-25">
                                            </label>
                                            <label class="active black" for="pc-26">
                                                <input type="radio" id="pc-26">
                                            </label>
                                            <label class="grey" for="pc-27">
                                                <input type="radio" id="pc-27">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item sale">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-10.jpg">
                                        <span class="label">Sale</span>
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Multi-pocket Chest Bag</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$43.48</h5>
                                        <div class="product__color__select">
                                            <label for="pc-28">
                                                <input type="radio" id="pc-28">
                                            </label>
                                            <label class="active black" for="pc-29">
                                                <input type="radio" id="pc-29">
                                            </label>
                                            <label class="grey" for="pc-30">
                                                <input type="radio" id="pc-30">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-11.jpg">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Diagonal Textured Cap</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$60.9</h5>
                                        <div class="product__color__select">
                                            <label for="pc-31">
                                                <input type="radio" id="pc-31">
                                            </label>
                                            <label class="active black" for="pc-32">
                                                <input type="radio" id="pc-32">
                                            </label>
                                            <label class="grey" for="pc-33">
                                                <input type="radio" id="pc-33">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item sale">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-12.jpg">
                                        <span class="label">Sale</span>
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Ankle Boots</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$98.49</h5>
                                        <div class="product__color__select">
                                            <label for="pc-34">
                                                <input type="radio" id="pc-34">
                                            </label>
                                            <label class="active black" for="pc-35">
                                                <input type="radio" id="pc-35">
                                            </label>
                                            <label class="grey" for="pc-36">
                                                <input type="radio" id="pc-36">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-14.jpg">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt>
                                                    <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Basic Flowing Scarf</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$26.28</h5>
                                        <div class="product__color__select">
                                            <label for="pc-40">
                                                <input type="radio" id="pc-40">
                                            </label>
                                            <label class="active black" for="pc-41">
                                                <input type="radio" id="pc-41">
                                            </label>
                                            <label class="grey" for="pc-42">
                                                <input type="radio" id="pc-42">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product__pagination">
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <span>...</span>
                                    <a href="#">21</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form">
                    <input type="text" id="search-input" placeholder="Search here.....">
                </form>
            </div>
        </div>


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
    </body>


    </html>
@endsection
