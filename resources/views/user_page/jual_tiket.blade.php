{{--  @extends('layouts.master')
@section('content')  --}}
<!DOCTYPE html>
<html lang="zxx">

    <head>
        {{--  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Tiket</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            input.no-border {
                border: none;
            }

            input.no-border:focus {
                outline: none;
            }

            .kartu-keluarga {
                font-size: 15px;
            }

            .kartu-keluarga {
                font: 900;
            }

            .card {
                width: 60rem;
                background-color: #fff;
                border: none;
                {{--  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);  --}}
            }

            .card-img-top {
                width: 100%;
                height: auto;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .card-body {}

            .card-text {
                font-size: 20px;
                color: #333;
            }

            .card-judul {
                font-size: 20px;
                color: #494A4A;
            }

            .card-body-1 {
                display: flex;
                justify-content: space-between;
                padding-left: 30px;
                padding-top: 20px;
                padding-bottom: ;
            }

            .card-body {
                display: flex;
                justify-content: space-between;
            }

            .center-text {
                text-align: center;
            }

            /* Atur tinggi gambar */
            .tall-image {
                height: 400px;
                /* Ubah tinggi sesuai dengan kebutuhan Anda */
            }

            .change-image {}
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </head>

    <body>
        <div class="card">
            <img src="{{ asset('foto/ciket.png') }}" class="card-img-top tall-image" id="tiket" alt="Gambar Contoh">
            <label for="fileInputA" class="change-image" id="chooseFileButton">

            </label>
            <input type="file" id="fileInputA" name="fileInputA">
            <script>
                // Mendapatkan referensi ke elemen input file dan elemen gambar
                var fileInput = document.getElementById('fileInputA');
                var imageElement = document.getElementById('tiket');

                // Menambahkan event listener untuk perubahan pada input file
                fileInput.addEventListener('change', function() {
                    // Memastikan ada file yang dipilih
                    if (fileInput.files && fileInput.files[0]) {
                        // Membuat objek URL untuk file yang dipilih
                        var imageURL = URL.createObjectURL(fileInput.files[0]);

                        // Mengganti atribut src dari elemen gambar dengan URL baru
                        imageElement.src = imageURL;
                    }
                });
            </script>

            <div class="card-body-1">
                <div class="left-column">
                    {{--  <h5 class="card-title">Diselenggarakan oleh</h5>  --}}
                    <input type="text" class="no-border" style="font-size: 25px; " placeholder="Nama Konser*">
                </div>
            </div>

            <div class="card-body">
                <div class="card" style="width: 920px">
                    <div class="card-body ">
                        <div class="left-column">
                            <h5 class="kartu-keluarga">Diselenggarakan oleh</h5>
                            <input type="text" class="no-border" style="font-size: 15px; " placeholder="nama">

                        </div>

                        <div class="left-center">
                            <h5 class="kartu-keluarga">Tanggal dan Waktu</h5>
                            {{-- <p class="m-0 p-0" style="font-size: 15px;">Pilih Tanggal</p> --}}
                            <!-- Button trigger modal -->
                            <div class="py-1">
                                <button type="button" class="btn btn-light"
                                    style="width: 120px; font-size: 16px; border: none;" data-bs-toggle="modal"
                                    data-bs-target="#pilihtanggal">Pilih Tanggal</button>
                            </div>
                            <button type="button" class="btn btn-light"
                                style="width: 120px; font-size: 16px; border: none;" data-bs-toggle="modal"
                                data-bs-target="#pilihtanggal" data-bs-whatever="@fat"> Pilih Waktu </button <!-- Modal
                                -->
                            <div class="modal fade" id="pilihtanggal" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="pilihtanggal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="pilihtanggal">Tanggal event</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                                        <div class="modal-body">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Pilih Waktu dan Tanggal
                                                    Konser</label>
                                                <input class="form-control form-control-solid"
                                                    placeholder="Pilih Waktu dan Tanggal" id="kt_datepicker_3" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <p class="m-0 p-0"style="font-size: 15px;">Pilih Waktu</p> --}}
                        </div>
                        <div class="left-right">
                            <h5 class="kartu-keluarga">Lokasi</h5>
                            {{-- <p class="m-0 p-0" style="font-size: 15px;">Pilih Lokasi</p> --}}
                            <button type="button" class="btn btn-light "
                                style="width: 120px; font-size: 16px; border: none; background:none;"
                                data-bs-toggle="modal" data-bs-target="#pilihtanggal" data-bs-whatever="@fat"> Pilih
                                lokasi </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            {{--  @endsection  --}}
            $("#kt_datepicker_3").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
    </body>

</html>
