@extends('layouts.master')
@section('content')
    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        <title>Ticket.</title>
        <link rel="stylesheet" href="path-to-bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('malefashion') }}/css/elegant-icons.css" type="text/css">
        <style>
            .paginate ul {
                justify-content: center;
            }

            .shop_spad {
                position: relative;
                min-height: 50vh;
            }

            .shop__left d {
                font-size: 24px;
                font-weight: bold;
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
    </head>

    <body>
        <section class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a class="nac-link" href="/">Beranda</a>

                            <div>
                                <canvas id="myChart" width="10px" height="4px"></canvas>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Data yang akan ditampilkan dalam grafik
                const data = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [{
    label: 'Konser',
    data: [65, 59, 80, 81, 26, 55, 40],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
  }]
};
                // Konfigurasi grafik
                var options = {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                };

                // Membuat grafik setelah halaman selesai dimuat
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line', // Menggunakan line chart
                    data: data,
                    options: options
                });
            });
        </script>

        <script>
            function confirmSubmit(event, konser) {
                event.preventDefault(); // Prevent the form from submitting

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Tunggu dulu!',
                    text: 'Apakah kamu yakin ingin menghapus konser: ' + konser,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete_konser').submit();
                    }
                });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    </body>

    </html>
@endsection
