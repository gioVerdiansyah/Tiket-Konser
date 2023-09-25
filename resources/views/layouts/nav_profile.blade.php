<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Tambahkan link CSS Bootstrap di sini -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Profile User</title>
        <style>
            .profile-image {
                width: 180px
            }

            #pp {
                display: none;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Ganti kelas "bg-body-tertiary" dengan "navbar-light bg-light" -->
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> <!-- Tambahkan ikon Hamburger Menu -->
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('profileUser') }}">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('history') }}">History</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
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
                          })
                        ">
                                @csrf
                                <button type="submit" class="dropdown-item nav-link">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Tambahkan skrip Bootstrap JS di sini (setelah jQuery) -->
        @if (session('message'))
            <script>
                Swal.fire({
                    icon: "{{ session('message')['icon'] ?? 'success' }}",
                    title: "{{ session('message')['title'] }}",
                    text: "{{ session('message')['text'] }}",
                    timer: {{ session('message')['timer'] ?? 5000 }},
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                });
            </script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>
