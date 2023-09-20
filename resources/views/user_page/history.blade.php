<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Menambahkan Bootstrap CSS untuk tampilan kartu -->
    <style>
        .card {
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
        }

        .custom-img {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
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
                    <img src="{{ asset('images/history/Tame.jpeg') }}" class="card-img custom-img" alt="Placeholder Image" width="150">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Use Bootstrap classes for layout -->
                            <h4 class="m-0 p-0 font-weight-bold" style="font-size: 20px">Currents</h4>
                            <h9 class="card-title">Batal Otomatis 05 sep 23.59</h9>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0 p-0" style="color: rgb(162, 170, 162);">
                                    <strong>Status:</strong> menunggu konfirmasi
                                </p>
                                <p class="m-0 p-0">
                                    <strong style="color: rgb(231, 57, 188);">Lihat Detail Transaksi</strong>
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
