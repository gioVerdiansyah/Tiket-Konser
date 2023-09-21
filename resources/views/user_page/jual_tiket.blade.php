{{--  @extends('layouts.master')
@section('content')  --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin="" />
        <!-- Make sure you put this AFTER Leaflet's CSS reference -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        #map {
                width: 100%;
                height: 300px;
            }

        .card {
            width: 56rem;
            background-color: #fff;
            border-radius: 15px;
        }

        .card-img-top {
            width: 100%;
            height: auto;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            cursor: pointer; /* Menambahkan pointer cursor untuk menandakan elemen dapat diklik */
        }

        .card-body {
            padding: 1rem;
        }

        .card-text {
            font-size: 20px;
            color: #333;
        }

        .card-body {
            display: flex;
            justify-content: flex-start;
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
        .card-title {
            font-size: 16px;
        }
        .no-border {
            border: none; /* Menghilangkan border */
        }
        #pilihharga .modal-content {
            border-radius: 20px;
        }
        #pilihwaktu .modal-content {
            border-radius: 20px;
        }
        #pilihtanggal .modal-content {
            border-radius: 20px;
        }
        #pilihlokasi .modal-content {
            border-radius: 20px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
</head>

<body>
    <form id="eventForm" action="/url-tujuan" method="POST" enctype="multipart/form-data">
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
                    <input type="text"  class="no-border" style="font-size: 25px;margin-left: 32px;margin-top: 20px;" placeholder="Nama Konser*">
                </div>
            </div>
            <div class="card-body">
                <div class="card no-border" style="width: 920px">
                    <div class="card-body">
                        <div class="left-column"  style="margin-right: 50px">
                            <h5 class="card-title">Diselenggarakan oleh</h5>
                            <div style="display: flex; align-items: center;margin-top: 25px;">
                                <!-- Tambahkan elemen input file yang tersembunyi -->
                                <input type="file" id="profileImageInput" accept="image/*" style="display: none;">
                                <!-- Tambahkan foto profil yang dapat diklik -->
                                <img src="{{ asset('images/jual-ticket/logo-upload.png') }}" alt="Gambar Penyelenggara" id="organizerImage" class="organizer-image rounded-circle" onclick="triggerProfileUpload()">

                                <input type="text" class="input100 organizer-input" id="organizerInput" placeholder="Nama Penyelenggara" style="font-size: 16px;margin-bottom: 3px;margin-left: 15px">
                            </div>
                        </div>
                        
                        <div class="left-center">
                            <h5 class="card-title">Tanggal dan Waktu</h5>
                            <!-- Button trigger modal -->
                            <div class="py-3">
                                <a id="tanggalAnchor" href="#" class="text-decoration-none" style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;" data-bs-toggle="modal" data-bs-target="#pilihtanggal">Pilih Tanggal</a>
                            </div>
                            {{-- <div class="input-container" style="display: none;">
                                <input type="text" class="input100" placeholder="Tanggal yang Disimpan" id="tanggalDisimpan" style="font-size: 20px;">
                            </div> --}}
                            <a id="waktuAnchor" href="#" class="text-decoration-none" style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;" data-bs-toggle="modal" data-bs-target="#pilihwaktu" data-bs-whatever="@fat">Pilih Waktu</a>
                            <!-- Modal tanggal -->
                            <div class="modal fade" id="pilihtanggal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pilihtanggal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="pilihtanggal">Tanggal event</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                                        <div class="modal-body">
                                            <div class="mb-0">
                                                <label for="" class="form-label">Tanggal Konser</label>
                                                <input class="form-control form-control-solid" placeholder="Pilih Tanggal" id="kt_datepicker_3"/>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary mt-3" style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                        </div>                                   
                        
                        <div class="left-right" style="max-width: 190px;margin-left: 100px;">
                            <h5 class="card-title">Lokasi</h5>
                            <div class="py-3">
                                <a id="selectedLocation" href="#" class="text-decoration-none" style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;" data-bs-toggle="modal" data-bs-target="#pilihlokasi" data-bs-whatever="@fat">
                                    Pilih Lokasi
                                </a>    
                            </div>
                            
                        </div>
                        <!-- Modal lokasi -->
                        <div class="modal fade" id="pilihlokasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pilihlokasi" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="pilihlokasi">Lokasi event</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                    <div class="modal-body">
                                        <div class="mb-0">
                                            <label for="" class="form-label">Pilih Lokasi Konser</label>
                                            {{-- <div class="form-group">
                                                <input type="text" name="autocomplete" id="autocomplete" class="form-control mt-2" placeholder="Masukkan Alamat">
                                            </div> --}}
                                            <div class="form-group mb-4">
                                                <label for="autocomplete">Nama Tempat</label>
                                                <input type="text" name="nama-tempat" id="nama-tempat" class="form-control mt-3" placeholder="Masukkan Nama Tempat">
                                            </div>
                                            <div class="mb-3" id="map"></div>
                                            <div class="form-group mb-3">
                                                <label for="autocomplete">Masukkan Alamat</label>
                                                <textarea type="text" name="autocomplete" id="alamat" class="form-control mt-3" placeholder=""></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="autocomplete">Provinsi</label>
                                                <select class="form-control" name="provinsi" id="provinsi">
                                                    <option value="">Pilih Provinsi...</option>
                                                    @foreach ($provinces as $provinsi)
                                                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="autocomplete">Kota</label>
                                                <select class="form-control" name="kota" id="kota">
                                                    <option value="">Pilih Kota...</option>
                                                    
                                                </select>
                                            </div>
                                            {{-- <div class="form-group" id="latitudeArea">
                                                <label for="latitude">Latitude</label>
                                                <input type="text" name="latitude" id="latitude" class="form-control">
                                            </div>
                                            <div class="form-group" id="longitudeArea">
                                                <label for="longitude">Longitude</label>
                                                <input type="text" name="longitude" id="longitude" class="form-control">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mt-3" onclick="
                                            if($('#'))
                                        " style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal waktu -->
                        <div class="modal fade" id="pilihwaktu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pilihwaktu" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="pilihwaktu">Waktu event</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                    <div class="modal-body">
                                        <div class="mb-0">
                                            <label for="" class="form-label">Mulai dari</label>
                                            <input class="form-control form-control-solid" placeholder="Pilih Waktu" id="kt_datepicker_4"/>
                                        </div>
                                        <div class="mb-0 mt-3">
                                            <label for="" class="form-label">Sampai</label>
                                            <input class="form-control form-control-solid" placeholder="Pilih Waktu" id="kt_datepicker_5"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mt-3" style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal harga -->
                        <div class="modal fade" id="pilihharga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pilihharga" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="pilihharga">Harga event</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                                    <div class="modal-body">
                                        <div class="mb-4">
                                            <div><label for="" class="form-label">Kategori Konser</label></div>
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" onclick="limitCheckboxSelection(this)">
                                                <label class="form-check-label" for="inlineCheckbox1">POP</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" onclick="limitCheckboxSelection(this)">
                                                <label class="form-check-label" for="inlineCheckbox2">ROCK</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" onclick="limitCheckboxSelection(this)">
                                                <label class="form-check-label" for="inlineCheckbox3">JAZZ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4" onclick="limitCheckboxSelection(this)">
                                                <label class="form-check-label" for="inlineCheckbox4">HIPHOP</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlahtiket" class="form-label mb-4">Jumlah Tiket</label>
                                            <input name="jumlahtiket" id="jumlahtiket" class="form-control form-control-solid" placeholder=""/>
                                        </div>
                                        <div class="mb-0 mt-4">
                                            <label for="harga" class="form-label mb-4">Harga</label>
                                            <input name="harga" id="harga" class="form-control form-control-solid" placeholder=""/>
                                        </div>
                                        <div class="mb-0 mt-4">
                                            <label for="" class="form-label mb-4">Deskripsi</label>
                                            <textarea class="form-control form-control-solid" name="deskripsi" id="deskripsi" cols="20" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-3 mb-2">
                                        <button type="button" class="btn btn-primary mt-3" style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                    </div>
                </div>
                <div class="card-body-2 mb-5">
                    <div class="left-column">
                        <a id="hargaAnchor" href="#" class="text-decoration-none" style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;margin-left: 32px;" data-bs-toggle="modal" data-bs-target="#pilihharga">Harga*</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
    $("#kt_datepicker_3").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    </script>
      <!-- SCRIPT MAPS API -->
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script>
      var map = L.map('map').setView([20.5, 20.1], 3);

      // Tambahkan tile layer ke peta
      L.tileLayer(
        'https://maptiles.p.rapidapi.com/en/map/v1/{z}/{x}/{y}.png?rapidapi-key=3230a3c055mshfdd385da7074bfbp12a3d8jsn8c2083fc1b95',{
              attribution: 'Tiles &copy: <a href="https://www.maptilesapi.com/">MapTiles API</a>, Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
              maxZoom: 19
          }).addTo(map);

      var marker;

      // Fungsi untuk menambahkan marker berdasarkan lokasi saat ini
      function addMarkerBasedOnCurrentLocation() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                  var lat = position.coords.latitude;
                  var lng = position.coords.longitude;

                  // Hapus marker jika ada
                  if (marker) {
                      map.removeLayer(marker);
                  }

                  // Tambahkan marker baru
                  marker = L.marker([lat, lng], {
                      draggable: true
                  }).addTo(map);

                  // Event listener saat marker di-drag
                  marker.on('dragend', function(event) {
                      var latlng = event.target.getLatLng();

                      // Lakukan geocoding untuk mendapatkan alamat
                      L.Control.Geocoder.nominatim().reverse(latlng, map.options.crs.scale(map.getZoom()),
                          function(results) {
                              var address = results[0].name || '';
                              address += results[0].properties.street || '';
                              address += results[0].properties.city || '';
                              address += results[0].properties.state || '';
                              address += results[0].properties.country || '';

                              // Isi nilai input alamat dengan alamat lengkap
                              document.getElementById('alamat').value = address;
                          });
                  });

                  // Set peta ke lokasi saat ini
                  map.setView([lat, lng], 15);
              });
          } else {
              alert('Geolocation tidak didukung oleh browser Anda.');
          }
      }

      // Panggil fungsi untuk menambahkan marker berdasarkan lokasi saat ini
      addMarkerBasedOnCurrentLocation();
  </script>
  <!-- END SCRIPT MAPS API -->
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
        // disable: [
        //     function(date) {
        //         // Menonaktifkan tanggal-tanggal yang merupakan kelipatan dari 8
        //         return date.getDate() % 8 === 0;
        //     }
        // ]
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
<!-- MODAL BTN -->
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
<script>
    // Event listener for clicking the "Simpan" button in the modal
    document.querySelector('#pilihlokasi .btn-primary').addEventListener('click', function() {
        // Get the selected location from the input field
        var selectedLocation = document.querySelector('#alamat').value;

        // Update the content of the <span> element with the selected location
        document.querySelector('#selectedLocation').textContent = selectedLocation;
    });
</script>
<!-- END MODAL BTN -->

<script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "AIzaSyBnaueX8_LeUKMzIfbOEjFElopgvR9z_TE",
      v: "weekly",
      // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
      // Add other bootstrap parameters as needed, using camel case.
    });
  </script>

 {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnaueX8_LeUKMzIfbOEjFElopgvR9z_TE&libraries=places"></script> --}}
  {{-- <script type="text/javascript">
    $(document).ready(function(){
        $('#latitudeArea').addClass('d-none');
        $('#longitude').addClass('d-none');
    })
  </script>
  <script type="text/javascript">

    google.maps.event.addDomListener(window,'load',initialize);

    function initialize(){
        var input = document.getElementById.('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed',function(){
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat())
            $('#longitude').val(place.geometry['location'].lng())

            $('#latutudeArea').removeClass('d-none');
            $('#longitudeArea').removeClass('d-none');
        })
    }
  </script> --}}
  <!-- CHECKBOX -->
  <script>
    function limitCheckboxSelection(clickedCheckbox) {
      // Mendapatkan semua checkbox
      var checkboxes = document.querySelectorAll('.form-check-input');
      
      // Jika checkbox yang di-klik adalah yang sudah dicentang, batalkan pemilihan yang lain
      if (clickedCheckbox.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i] !== clickedCheckbox) {
            checkboxes[i].checked = false;
          }
        }
      }
    }
    </script>
    <!-- END CHECKBOX -->
    <!-- DROPDOWN KOTA DAN PROVINSI -->
    <script>
        $(function(){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        
            $('#provinsi').on('change', function(){
                let id_provinsi = $(this).val();
        
                // Hapus opsi kota yang ada sebelumnya
                $('#kota').empty();
        
                // Jika pilih Provinsi tidak dipilih (nilai kosong), maka hentikan proses
                if (id_provinsi === '') {
                    return;
                }
        
                // Kirim permintaan AJAX untuk mendapatkan kota berdasarkan provinsi
                $.ajax({
                    type: 'POST',
                    url: "{{ route('getkota') }}",
                    data: { id_provinsi: id_provinsi },
                    cache: false,
        
                    success: function(data){
                        // Tambahkan opsi-opsi kota ke dropdown kota
                        $.each(data, function(key, value){
                            $('#kota').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function(data){
                        console.log('error:', data);
                    }
                });
            });
        });
        </script>
        
    <!-- END DROPDOWN KOTA DAN PROVINSI -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script
</body>

</html>
