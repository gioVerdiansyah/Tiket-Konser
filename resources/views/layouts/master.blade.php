<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ticket.</title>

        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        {{-- bootstrap css --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        {{-- Link Icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        {{-- Custom CSS --}}
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
            }

            .navbar-nav2 {}

            #profileDropdown img {
                border-radius: 50px;
                width: 45px;
            }

            .notice {
                background-color: red;
                border-radius: 50px;
                position: absolute;
                font-size: 13px;
                width: max-content;
                height: max-content;
                padding: 0 8px;
                color: white;
                top: 32px;
                transform: translateX(-7px);
            }

            .notice.notif {
                top: 8px;
            }

            .navbar {
                background-color: #333;
            }

            .nav {
                list-style-type: none;
                padding: 0;
                margin: 0;
                overflow: hidden;
            }

            .nav li {
                float: left;
            }

            .nav li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .nav li a:hover {
                background-color: #ddd;
                color: black;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }
            .pp_profile{
                border-radius:50%;
                height:55px;
                width:55px;
            }

            .dropdown-content {}

            @media(max-width:991px) {
                .navbar-expand-lg .navbar-nav .dropdown-menu {
                    position: absolute;
                }
                .pp_profile{
                    width: 45px;
                    height: 61px;
                }
            }
        </style>
        {{-- Custom CSS End --}}

        {{-- Link Animate CSS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        {{-- End --}}

        {{-- Link AOS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        {{-- End --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- JQuery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        {{-- JQuery End --}}
        <!-- Icons -->
        {{-- <link href="{{ asset('/css/nucleo-icons.css') }}" rel="stylesheet" /> --}}
        <!-- CSS -->
        {{-- <link href="{{ asset('/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" /> --}}
        <link href="{{ secure_asset('/css/theme.css') }}" rel="stylesheet" />
    </head>

    <body>

        {{-- Nav Start --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary py-4">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/"><span style="margin-right: 5px;">Ticket.</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('konser') }}">Konser</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('buatkonser.create') }}">Buat Konser</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('konserku') }}">Konserku</a>
                            </li>
                        @endauth
                    </ul>
                </div>
                @auth
                    <div class="navbar-nav ml-auto" style="flex-direction:inherit;">
                        <ul class="navbar-nav" style="flex-direction: row; ">
                            <li class="nav-item d-flex align-items-center me-3">
                                <a style="position: relative;" class="nav-link" href="{{ route('orders.index') }}"><i
                                        class="bi bi-basket fs-4"></i>
                                    @php
                                        $cart = \App\Models\Order::where('user_id', Auth::user()->id)
                                            ->where('payment_status', 1)
                                            ->count();
                                    @endphp
                                    @if ($cart > 0)
                                        <div class="notice cart" style="position: absolute; top: 5px">
                                            {{ $cart }}
                                        </div>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    @endauth
                    @guest
                        <ul class="navbar-nav">
                            {{-- Pengguna belum login, tampilkan tombol login dan register --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                    @else
                        @auth
                            @php
                                $notif = \App\Models\Notifications::where('user_id', Auth::user()->id)->get();
                                $count = \App\Models\Notifications::where('user_id', Auth::user()->id)
                                    ->where('read', 1)
                                    ->count();
                            @endphp
                        @endauth
                        <li class="nav-item dropdown d-flex flex-row align-items-center">
                            <a role="button" class="me-3 text-secondary" id="notification-dropdown-button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                @if ($count > 0) onclick="
                                        $.ajax({
                                            type: 'PUT',
                                            url: '{{ route('read-notif') }}',
                                            beforeSend: function(xhr) {
                                                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                                            },
                                            data: {
                                                user_id: {{ Auth::user()->id }}
                                            },
                                            dataType: 'json',
                                            success: function(response) {
                                                console.log(response);
                                                document.querySelector('.notice.notif').remove();
                                                var notificationDiv = document.getElementById('notification-dropdown-button');
                                                notificationDiv.removeAttribute('onclick');
                                            },
                                            error: function(error) {
                                                console.error('Kesalahan:', error);
                                            }
                                        });
                                        " @endif>
                                <i class="bi bi-bell fs-4"></i>
                                @if ($count > 0)
                                    <div class="notice notif">{{ $count }}</div>
                                @endif
                            </a>
                            <ul id="parentnotif" class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="notification-dropdown-button"
                                style="
                                        width: max-content;
                                        max-width: 500px;
                                    ">
                                @forelse ($notif as $row)
                                    <li class="px-3 py-2 d-flex flex-row justify-content-between align-items-center"
                                        data-notification-id="{{ $row->id }}">
                                        <div class="d-flex flex-column">
                                            <strong style="font-size: 10px;">
                                                @if (Str::startsWith($row->nama_konser, 'Komentar') || Str::startsWith(strtolower($row->nama_konser), 'konser'))
                                                    Dari: {{ $row->nama_konser }}
                                                @else
                                                    Dari konser: {{ $row->nama_konser }}
                                                @endif
                                            </strong>
                                            {{ $row->fillin }}
                                        </div>
                                        <button class="btn" data-bs-dismiss="false" id="butonnotid{{ $row->id }}"
                                            onclick="deleteNotif(this, {{ $row->id }})"><i
                                                class="bi bi-x"></i></button>
                                    </li>
                                @empty
                                    <p class="mx-3 my-2">Tidak ada notifikasi...</p>
                                @endforelse

                            </ul>

                                <a  class="nav-link pp_profile" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ secure_asset('storage/image/photo-user/' . Auth::user()->pp) }}" alt="Photo user"
                                srcset="" style="width: 100%; height: 100%;">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="{{ route('profileUser') }}">Profil Saya</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>

                                    <form method="POST" id="form-logout" action="{{ route('logout') }}"
                                        onsubmit="
                                        event.preventDefault();
                                        Swal.fire({
                                      title: `Tunggu dulu!`,
                                      text: `Apakah kamu yakin ingin logout?`, icon: 'warning' , showCancelButton: true,
                                      confirmButtonColor: '#3085d6' , cancelButtonColor: '#d33' ,
                                      confirmButtonText: 'Ya!' }).then((result)=> {
                                      if (result.isConfirmed) {
                                          document.getElementById('form-logout').submit();
                                      }
                                      })">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        </ul>
                    @endguest
                </div>
            </div>
            </div>
        </nav>
        {{-- Nav End --}}

        {{-- Content Start --}}
        @yield('content')
        {{-- Content End --}}

        {{-- Footer Start --}}
        <div class="container-fluid bg-body-secondary" style=" position: relative; bottom: -90px;">

            <div class="container">
                <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 pt-5">
                    <div class="col mb-3">
                        <a href="/"
                            class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                            <h3 class="fw-bold">Ticket.</h3>
                        </a>
                        <p>Kami menyediakan tiket konser mancanegara dengan harga yang relatif terjangkau.</p>
                        <p class="text-body-secondary">&copy; {{ config('app.name') }} 2023</p>
                    </div>

                    <div class="col mb-3">

                    </div>

                    <div class="col mb-3">
                        <h5>Peta Situs</h5>
                        <ul class="nav flex-column">
                            @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Beranda</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('konser') }}"
                                    class="nav-link p-0 text-body-secondary text-start">Konser</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('buatkonser.create') }}"
                                    class="nav-link p-0 text-body-secondary text-start">Buat Konser</a></li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <h5>Help</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Customer
                                    Support</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Delivery
                                    Details</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Terms
                                    & Conditions</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Privacy
                                    Policy</a></li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <h5>FAQ</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Account</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Manage
                                    Deliveries</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Orders</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary text-start">Payments</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        {{-- Footer End --}}

        {{-- <script src="{{ asset('/js/core/jquery.min.js') }}"></script> --}}
        <script src="{{ secure_asset('/js/core/popper.min.js') }}"></script>
        <script src="{{ secure_asset('/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ secure_asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
        <script src="{{ secure_asset('/js/plugins/bootstrap-notify.js') }}"></script>

        <script src="{{ secure_asset('/js/black-dashboard.min.js?v=1.0.0') }}"></script>
        <script src="{{ secure_asset('/js/theme.js') }}"></script>
        <script>
            function deleteNotif(button, id) {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route('delete-notif') }}',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    },
                    data: {
                        notif_id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        console.log(button.parentElement.parentElement.childElementCount);
                        if (button.parentElement.parentElement.childElementCount === 1) {
                            $('#parentnotif').append('<li><p class="mx-3 my-0">Tidak ada notifikasi...</p></li>');
                        }
                        button.parentElement.remove();
                    },
                    error: function(error) {
                        console.error('Kesalahan:', error);
                    }
                });
            }
        </script>

        @if (session('message'))
            <script>
                Swal.fire({
                    icon: "{{ session('message')['icon'] ?? 'success' }}",
                    title: "{{ session('message')['title'] }}",
                    text: "{{ session('message')['text'] }}",
                    allowOutsideClick: true,
                    allowEscapeKey: false,
                });
            </script>
        @endif

        {{-- bootstrap js --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
        {{-- End --}}

        {{-- JS Initialize AOS --}}
        <script>
            AOS.init();
        </script>
        {{-- End --}}
        @stack('js')
    </body>

</html>
