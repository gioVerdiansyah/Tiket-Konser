<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Menambahkan Bootstrap CSS untuk tampilan kartu -->
    <style>
        .card {
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
        }

        .custom-img {
            max-width: 100%; /* Adjust the width as needed */
            height: auto;
            display: block;
            margin: 0 auto; /* Center horizontally */
        }
    </style>
</head>
<body>
    <br>
    <h1 class="mx-3">History</h1>
    <div class="container">
        <br>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-3 d-flex align-items-center justify-content-start"> <!-- Mengubah ukuran kolom gambar -->
                    <img src="{{ asset('foto/sekolah.jpg') }}" class="card-img custom-img w-75" style="border: 0; border-radius:1em;" alt="Placeholder Image">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center"> <!-- Use Bootstrap classes for layout -->
                            <h5 class="card-title">Currents</h5>
                            <h9 class="card-title">Batal Otomatis 05 sep 23.59</h9>
                            <!-- Additional text to the right of the title -->
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0 p-0">1 barang x Rp 500.000</p>
                                <p class="m-0 p-0" style="color: green;">
                                    <strong>Status :</strong> menunggu konfirmasi
                                </p>
                                <p class="m-0 p-0">
                                    <strong style="color: red;">Lihat Detail Transaksi</strong>
                                </p>
                            </div>
                            <div class="wrapper mb-20 px-5 mx-5">
                                <p class="m-0 p-0" style="font-size: 20px;">Total harga</p>
                                <p class="m-0 p-0 font-weight-bold" style="font-size: 20px">Rp 500.000</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
