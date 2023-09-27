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

            #profileDropdown img {
                border-radius: 50px;
                width: 45px;
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
    </head>

    <body>

        {{-- Nav Start --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary py-4">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">Ticket.</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('buatkonser.create') }}">Buat Konser</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('konserku') }}">Konserku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                            </li>
                        @endauth
                </div>
                <div class="navbar-nav ml-auto">
                    @guest
                        {{-- Pengguna belum login, tampilkan tombol login dan register --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        {{-- Pengguna sudah login, tampilkan dropdown profil --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('storage/image/photo-user/' . Auth::user()->pp) }}" alt="Photo user"
                                    srcset="">
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
        <div class="container-fluid bg-body-secondary">

            <div class="container">
                <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 pt-5">
                    <div class="col mb-3">
                        <a href="/"
                            class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                            <h3 class="fw-bold">Ticket.</h3>
                        </a>
                        <p>Kami menyediakan tiket konser mancanegara dengan harga yang relatif terjangkau.</p>
                        <p class="text-body-secondary">&copy; 2023</p>
                    </div>

                    <div class="col mb-3">

                    </div>

                    <div class="col mb-3">
                        <h5>Peta Situs</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Beranda</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('konser.search') }}"
                                    class="nav-link p-0 text-body-secondary">Konser</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('buatkonser.create') }}"
                                    class="nav-link p-0 text-body-secondary">Buat Konser</a></li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <h5>Help</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Customer Support</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Delivery Details</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Terms
                                    & Conditions</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <h5>FAQ</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Account</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Manage Deliveries</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Orders</a></li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Payments</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        {{-- Footer End --}}
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

    </body>

</html>
