{{--  @extends('layouts.master')
@section('content')  --}}
<!DOCTYPE html>
<html lang="zxx">

<head>
    {{--  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
        .kartu-keluarga{
            font-size: 15px;
        }
        .kartu-keluarga{
            font:900;
        }

        .card {
            width: 60rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            cursor: pointer; /* Menambahkan pointer cursor untuk menandakan elemen dapat diklik */
        }

        .card-body {

        }

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

        /* Gaya tambahan untuk tombol file input */
        .file-input-button {
            display: none; /* Sembunyikan tombol asli file input */
            cursor: pointer;
        }

        .organizer-input {
            border: none; /* Remove the border */
            outline: none; /* Remove the outline */
        }

        .choose-file-button {
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .organizer-image {
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 70px; /* Sesuaikan ukuran gambar sesuai kebutuhan */
            height: auto;
            /* margin-bottom: 10px; 
            padding-right: 15px; */
        }
        .rounded-circle {
            width: auto;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
</head>

<body>
    <div class="card">
        <!-- Tambahkan fungsi JavaScript untuk mengklik tombol file input saat gambar diklik -->
        <img src="{{ asset('images/jual-ticket/banner.png') }}" class="card-img-top tall-image" id="tiket" alt="Gambar Contoh" onclick="document.getElementById('fileInputA').click()">
        <!-- Simpan tombol file input yang semula tersembunyi di sini -->
        <input type="file" id="fileInputA" name="fileInputA" class="file-input-button">
        {{-- <label for="fileInputA" class="change-image choose-file-button" id="chooseFileButton">Choose File</label> --}}
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
                        <input type="text"  class="no-border" style="font-size: 25px; " placeholder="Nama Konser*">
                    </div>
                </div>

        <div class="card-body">
            <div class="card" style="width: 920px">
                <div class="card-body ">
                    <div class="left-column">
                        <h5 class="card-title">Diselenggarakan oleh</h5>
                        <p class="m-0 p-0" style="font-size: 15px;">Deni Sumargo</p>
                    </div>
                    
                    <div class="left-center">
                        <h5 class="card-title">Tanggal dan Waktu</h5>
                        {{-- <p class="m-0 p-0" style="font-size: 15px;">Pilih Tanggal</p> --}}
                        <!-- Button trigger modal -->
                        <div class="py-3">
                            <button type="button" class="btn btn-light border; none;" style="width: 120px; font-size: 16px; border: none;" data-bs-toggle="modal" data-bs-target="#pilihtanggal">Pilih Tanggal</button>

                        </div>

                        <button type="button" class="btn btn-light border; none;" style="width: 120px; font-size: 16px; border: none;" data-bs-toggle="modal" data-bs-target="#pilihtanggal" data-bs-whatever="@fat"> Pilih Waktu </button

                        <!-- Modal tanggal -->
                        <div class="modal fade" id="pilihtanggal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pilihtanggal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="pilihtanggal">Tanggal event</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                    <div class="modal-body">
                                        <div class="mb-0">
                                            <label for="" class="form-label">Pilih Waktu dan Tanggal Konser</label>
                                            <input class="form-control form-control-solid" placeholder="Pilih Waktu dan Tanggal" id="kt_datepicker_3"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                   
                    
                    <div class="left-right">
                        <h5 class="card-title">Lokasi</h5>
                        {{-- <p class="m-0 p-0" style="font-size: 15px;">Pilih Lokasi</p> --}}
                        <button type="button" class="btn btn-light border; none;" style="width: 120px; font-size: 16px; border: none;" data-bs-toggle="modal" data-bs-target="#pilihtanggal" data-bs-whatever="@fat"> Pilih lokasi </button>
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
    {{-- <script>
        // Tangani klik tombol "Simpan" pada modal
        document.querySelector('#pilihtanggal .btn-primary').addEventListener('click', function() {
            // Ambil nilai dari input tanggal dan waktu yang dipilih
            var selectedDate = document.querySelector('#kt_datepicker_3').value;
            
            // Tampilkan nilai tersebut di input yang akan disimpan
            document.querySelector('.input-container').style.display = 'block';
            document.querySelector('#tanggalDisimpan').value = selectedDate;
            
            // Sembunyikan tombol "Pilih Tanggal"
            document.querySelector('.py-3').style.display = 'none';
        });
    </script> --}}
    <script>
        // Get references to HTML elements
        const organizerText = document.getElementById('organizerText');
        const organizerInput = document.getElementById('organizerInput');
        const editOrganizerButton = document.getElementById('editOrganizerButton');

        // Function to enter edit mode when the <p> is clicked
        function enterEditMode() {
            organizerText.classList.add('d-none');
            organizerInput.classList.remove('d-none');
            organizerInput.value = organizerText.textContent; // Set nilai input sesuai dengan teks <p>
            organizerInput.focus();
        }

        // Function to save changes and exit edit mode
        function saveChangesAndExit() {
            const newName = organizerInput.value;
            organizerText.textContent = newName; // Update teks <p> dengan nilai input yang baru
            organizerText.classList.remove('d-none');
            organizerInput.classList.add('d-none');
        }

        // Event listener for clicking the <p> element
        organizerText.addEventListener('click', enterEditMode);

        // Event listener for blurring out of the input field (e.g., pressing Enter or clicking outside)
        organizerInput.addEventListener('blur', saveChangesAndExit);

        // Event listener for clicking the "Edit" button
        editOrganizerButton.addEventListener('click', () => {
            enterEditMode(); // Show the input field when the "Edit" button is clicked
        });

        // Initially hide the input field and keep the <p> tag visible
        organizerInput.classList.add('d-none');
    </script>
    <script>
        // Mendapatkan referensi ke elemen input gambar profil dan tombol unggah
        var profileImageInput = document.getElementById('profileImageInput');
        var uploadProfileButton = document.getElementById('uploadProfileButton');
        var organizerImage = document.getElementById('organizerImage');
    
        // Menambahkan event listener untuk klik pada tombol unggah
        uploadProfileButton.addEventListener('click', function() {
            // Mengklik input file yang tersembunyi saat tombol unggah diklik
            profileImageInput.click();
        });
    
        // Menambahkan event listener untuk perubahan pada input file gambar profil
        profileImageInput.addEventListener('change', function() {
            // Memastikan ada file gambar yang dipilih
            if (profileImageInput.files && profileImageInput.files[0]) {
                // Lakukan sesuatu dengan file gambar yang dipilih di sini
                var selectedImage = profileImageInput.files[0];
                console.log('File yang dipilih:', selectedImage.name);
                
                // Anda dapat mengunggah gambar ini ke server atau menampilkan preview di sini
                // Contoh: Tampilkan gambar di bawah tombol unggah
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imageURL = e.target.result;
                    // Mengganti atribut src dari elemen gambar penyelenggara dengan URL baru
                    organizerImage.src = imageURL;
                };
                reader.readAsDataURL(selectedImage);
            }
        });
    </script>
    <script>
        function triggerProfileUpload() {
        // Mengklik tombol "Unggah Gambar Profil" saat gambar profil di klik
        document.getElementById('profileImageInput').click();
    }

    // ...

    // Menambahkan event listener untuk perubahan pada input file gambar profil
    profileImageInput.addEventListener('change', function() {
        // Memastikan ada file gambar yang dipilih
        if (profileImageInput.files && profileImageInput.files[0]) {
            // Lakukan sesuatu dengan file gambar yang dipilih di sini
            var selectedImage = profileImageInput.files[0];
            console.log('File yang dipilih:', selectedImage.name);
            
            // Anda dapat mengunggah gambar ini ke server atau menampilkan preview di sini
            // Contoh: Tampilkan gambar di bawah tombol unggah
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageURL = e.target.result;
                // Mengganti atribut src dari elemen gambar penyelenggara dengan URL baru
                organizerImage.src = imageURL;
            };
            reader.readAsDataURL(selectedImage);
        }
    });

    </script>

<script>
    $("#kt_datepicker_3").flatpickr({
        mode: "range",     // Mode "range" untuk memilih rentang tanggal
        minDate: "today",  // Minimum tanggal yang dapat dipilih adalah hari ini
        dateFormat: "Y-m-d",
        disable: [
            function(date) {
                // Menonaktifkan tanggal-tanggal yang merupakan kelipatan dari 8
                return date.getDate() % 8 === 0;
            }
        ]
    });
</script>
<script>
    $("#kt_datepicker_4").flatpickr({
        enableTime: true, // Mengaktifkan pilihan waktu
        noCalendar: true, // Tidak menampilkan kalender
        dateFormat: "H:i", // Format waktu dalam format 24 jam
        time_24hr: true // Menggunakan format waktu 24 jam
    });
</script>
<script>
    $("#kt_datepicker_5").flatpickr({
        enableTime: true, // Mengaktifkan pilihan waktu
        noCalendar: true, // Tidak menampilkan kalender
        dateFormat: "H:i", // Format waktu dalam format 24 jam
        time_24hr: true // Menggunakan format waktu 24 jam
    });
</script>
<script>
    // Menangani klik tombol "Simpan" pada modal
    document.querySelector('#pilihwaktu .btn-primary').addEventListener('click', function() {
        // Ambil nilai dari input waktu mulai dan waktu selesai yang dipilih
        var startTime = document.querySelector('#kt_datepicker_4').value;
        var endTime = document.querySelector('#kt_datepicker_5').value;

        // Ganti teks pada elemen anchor dengan output waktu yang dipilih
        document.querySelector('#waktuAnchor').textContent = startTime + ' - ' + endTime;
    });
</script>
<script>
    // Menangani klik tombol "Simpan" pada modal
    document.querySelector('#pilihtanggal .btn-primary').addEventListener('click', function() {
        // Ambil nilai dari input waktu mulai dan waktu selesai yang dipilih
        var startDate = document.querySelector('#kt_datepicker_3').value;

        // Ganti teks pada elemen anchor dengan output waktu yang dipilih
        document.querySelector('#tanggalAnchor').textContent = startDate;
    });
</script>


    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script
</body>

</html>
