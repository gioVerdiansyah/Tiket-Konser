 @extends('layouts.master')
 @section('content')
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
         integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
         crossorigin="" />
     <!-- Make sure you put this AFTER Leaflet's CSS reference -->
     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
         integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
         crossorigin=""></script>
     {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     {{-- SELECT2 --}}
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <style>
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
             cursor: pointer;
             /* Menambahkan pointer cursor untuk menandakan elemen dapat diklik */
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
             display: none;
             /* Sembunyikan tombol asli file input */
             cursor: pointer;
         }

         .organizer-input {
             border: none;
             /* Remove the border */
             outline: none;
             /* Remove the outline */
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
             max-width: 70px;
             /* Sesuaikan ukuran gambar sesuai kebutuhan */
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
             border: none;
             /* Menghilangkan border */
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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     {{-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> --}}
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif

     <div class="container py-5">
         <form id="eventForm" action="{{ route('buatkonser.store') }}" method="POST" enctype="multipart/form-data"
             class="d-flex justify-content-center">
             @csrf
             <div class="card">
                 <!-- Tambahkan fungsi JavaScript untuk mengklik tombol file input saat gambar diklik -->
                 <img src="{{ asset('images/jual-ticket/banner.png') }}" class="card-img-top tall-image" id="tiket"
                     alt="Gambar Contoh" onclick="document.getElementById('fileInputA').click()">
                 <!-- Simpan tombol file input yang semula tersembunyi di sini -->
                 <input type="file" id="fileInputA" name="banner" class="file-input-button">
                 @error('banner')
                     <p class="text-danger">*{{ $message }}</p>
                 @enderror
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
                         <input type="text" name="nama_konser" class="no-border"
                             style="font-size: 25px;margin-left: 32px;margin-top: 20px;" placeholder="Nama Konser*">
                         @error('nama_konser')
                             <p class="text-danger">*{{ $message }}</p>
                         @enderror
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="card no-border" style="width: 920px">
                         <div class="card-body">
                             <div class="left-column" style="margin-right: 50px">
                                 <h5 class="card-title">Diselenggarakan oleh</h5>
                                 <div style="display: flex; align-items: center;margin-top: 25px;">
                                     <!-- Tambahkan elemen input file yang tersembunyi -->
                                     <input type="file" id="profileImageInput" name="photo_penyelenggara"
                                         style="display: none;">
                                     @error('photo_penyelenggara')
                                         <p class="text-danger">*{{ $message }}</p>
                                     @enderror
                                     <!-- Tambahkan foto profil yang dapat diklik -->
                                     <label for="profileImageInput">
                                         <img src="{{ asset('images/jual-ticket/logo-upload.png') }}"
                                             alt="Gambar Penyelenggara" id="organizerImage"
                                             class="organizer-image rounded-circle" onclick="triggerProfileUpload()">
                                     </label>

                                     <input type="text" name="nama_penyelenggara" class="input100 organizer-input"
                                         id="organizerInput" placeholder="Nama Penyelenggara"
                                         style="font-size: 16px;margin-bottom: 3px;margin-left: 15px">
                                     @error('nama_penyelenggara')
                                         <p class="text-danger">*{{ $message }}</p>
                                     @enderror
                                 </div>
                             </div>

                             <div class="left-center">
                                 <h5 class="card-title">Tanggal dan Waktu</h5>
                                 <!-- Button trigger modal -->
                                 <div class="py-3">
                                     <a id="tanggalAnchor" href="#" class="text-decoration-none"
                                         style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;"
                                         data-bs-toggle="modal" data-bs-target="#pilihtanggal">Pilih Tanggal</a>
                                     @error('tanggal_konser')
                                         <p class="text-danger">*{{ $message }}</p>
                                     @enderror
                                 </div>
                                 <a id="waktuAnchor" href="#" class="text-decoration-none"
                                     style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;"
                                     data-bs-toggle="modal" data-bs-target="#pilihwaktu" data-bs-whatever="@fat">Pilih
                                     Waktu</a>
                                 @error('waktu_mulai')
                                     <p class="text-danger">*{{ $message }}</p>
                                 @enderror
                                 @error('waktu_selesai')
                                     <p class="text-danger">*{{ $message }}</p>
                                 @enderror
                                 <!-- Modal tanggal -->
                                 <div class="modal fade" id="pilihtanggal" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="pilihtanggal"
                                     aria-hidden="true">
                                     <div class="modal-dialog modal-dialog-centered">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h1 class="modal-title fs-5" id="pilihtanggal">Tanggal event</h1>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                     aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="mb-0">
                                                     <label for="" class="form-label">Tanggal Konser</label>
                                                     <input name="tanggal_konser" class="form-control form-control-solid"
                                                         placeholder="Pilih Tanggal" id="kt_datepicker_3" />
                                                 </div>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-primary mt-3"
                                                     style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;"
                                                     onclick="checkModalTanggalEvent()">Simpan</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                             </div>

                             <div class="left-right" style="max-width: 190px;margin-left: 100px;">
                                 <h5 class="card-title">Lokasi</h5>
                                 <div class="py-3">
                                     <a id="selectedLocation" href="#" class="text-decoration-none"
                                         style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;"
                                         data-bs-toggle="modal" data-bs-target="#pilihlokasi" data-bs-whatever="@fat">
                                         Pilih Lokasi
                                     </a>
                                     @error('tempat')
                                         <p class="text-danger">*{{ $message }}</p>
                                     @enderror
                                     @error('alamat')
                                         <p class="text-danger">*{{ $message }}</p>
                                     @enderror
                                     @error('kota')
                                         <p class="text-danger">*{{ $message }}</p>
                                     @enderror
                                 </div>

                             </div>
                             <!-- Modal lokasi -->
                             <div class="modal fade" id="pilihlokasi" data-bs-backdrop="static" data-bs-keyboard="false"
                                 tabindex="-1" aria-labelledby="pilihlokasi" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" id="lokasi">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h1 class="modal-title fs-5" id="pilihlokasi">Lokasi event</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                 aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <div class="mb-0">
                                                 <label for="" class="form-label">Pilih Lokasi Konser</label>
                                                 <div class="mb-3" id="map"></div>
                                                 <div class="form-group mb-3">
                                                     <label for="alamat">Alamat Konser</label>
                                                     <textarea type="text" name="alamat" id="alamat" class="form-control mt-3"
                                                         placeholder="Masukan Alamat Konser"></textarea>
                                                 </div>
                                                 <div class="form-group mb-0">
                                                     <input type="hidden" name="lat" id="lat"
                                                         class="form-control mt-3">
                                                     <input type="hidden" name="lon" id="lon"
                                                         class="form-control mt-3">
                                                 </div>
                                                 <div class="form-group mb-3">
                                                     <label for="nama_tempat">Nama Tempat (Cth: Gedung, Taman, DLL)</label>
                                                     <input type="text" name="tempat" id="nama-tempat"
                                                         class="form-control mt-3" placeholder="Masukkan Nama Tempat">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-primary mt-3" id="simpan"
                                                 style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;"
                                                 onclick="checkModalLocation()">Simpan</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Modal waktu -->
                             <div class="modal fade" id="pilihwaktu" data-bs-backdrop="static" data-bs-keyboard="false"
                                 tabindex="-1" aria-labelledby="pilihwaktu" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h1 class="modal-title fs-5" id="pilihwaktu">Waktu event</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                 aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <div class="mb-0">
                                                 <label for="kt_datepicker_4" class="form-label">Mulai dari</label>
                                                 <input name="waktu_mulai" class="form-control form-control-solid"
                                                     placeholder="Pilih Waktu" id="kt_datepicker_4" />
                                             </div>
                                             <div class="mb-0 mt-3">
                                                 <label for="kt_datepicker_5" class="form-label">Sampai</label>
                                                 <input name="waktu_selesai" class="form-control form-control-solid"
                                                     placeholder="Pilih Waktu" id="kt_datepicker_5" />
                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-primary mt-3"
                                                 style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;"
                                                 onclick="checkModalWaktuEvent()">Simpan</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Modal Detail Tiket -->
                             <div class="modal fade" id="pilihharga" data-bs-backdrop="static" data-bs-keyboard="false"
                                 aria-labelledby="pilihharga" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h1 class="modal-title fs-5" id="pilihharga">Detail Tiket</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                 aria-label="Close"></button>
                                         </div>

                                         <div class="modal-body">

                                             <div class="mb-4">
                                                 <label class="form-label">Kategori Konser</label><br>
                                                 <select id="kategori" class="custom-select js-example-basic-single"
                                                     name="kategori" style="width: 100%;height: 38p%">
                                                     <option selected>Pilih kategori</option>
                                                     @foreach ($kategoris as $row)
                                                         <option value="{{ $row->id }}">{{ $row->nama_kategori }}
                                                         </option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                             <button type="button" id="btnTambahKategoriTiket"
                                                 class="btn btn-secondary mb-3"><i class="bi bi-plus-square"></i> Kategori
                                                 Tiket</button>

                                             <!-- Tempat untuk menambahkan input -->
                                             <div id="tempatInputKategoriHarga">
                                                 <!-- Input kategori tiket akan ditambahkan di sini -->
                                                 <!-- Input harga akan ditambahkan di sini -->
                                             </div>

                                             <div class="mb-4">
                                                 <label class="form-label">Denah Konser (Optional)</label><br>
                                                 <div class="mb-3">
                                                     <input class="form-control" type="file" name="denah_konser"
                                                         id="formFile">
                                                 </div>
                                             </div>

                                             <div class="mb-3">
                                                 <label for="jumlahtiket" class="form-label mb-4">Jumlah Tiket</label>
                                                 <input name="jumlahtiket" id="jumlahtiket"
                                                     class="form-control form-control-solid" placeholder="" />
                                             </div>
                                             <div class="mb-0 mt-4">
                                                 <label for="deskripsi" class="form-label mb-4">Deskripsi</label>
                                                 <textarea class="form-control form-control-solid" name="deskripsi" id="deskripsi" cols="20" rows="3"></textarea>
                                             </div>
                                         </div>
                                         <div class="modal-footer mt-3 mb-2">
                                             <button type="button" onclick="checkModalHarga()"
                                                 class="btn btn-primary mt-3"
                                                 style="width: 100%;height: 60px;background-color: #000000;border: none;border-radius: 15px;">Simpan</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card-body-2 mb-5 d-flex flex-column">
                     <div class="left-column align-self-start">
                         <a id="hargaAnchor" href="#" class="text-decoration-none"
                             style="font-size: 16px;color: #ADB6C9;font-family: Poppins-Regular;margin-left: 32px;"
                             data-bs-toggle="modal" data-bs-target="#pilihharga">Detail Tiket*</a>
                         @error('kategori')
                             <p class="text-danger">*{{ $message }}</p>
                         @enderror
                         @error('jumlahtiket')
                             <p class="text-danger">*{{ $message }}</p>
                         @enderror
                         @error('harga')
                             <p class="text-danger">*{{ $message }}</p>
                         @enderror
                         @error('deskripsi')
                             <p class="text-danger">*{{ $message }}</p>
                         @enderror
                         @error('denah_konser')
                             <p class="text-danger">*{{ $message }}</p>
                         @enderror
                     </div>
                     <div class="left-column align-self-end me-5">
                         <button type="submit" class="btn btn-primary">Buat Konser!</button>
                     </div>
                 </div>
             </div>
     </div>
     </form>
     </div>
     <script>
         $(document).ready(function() {
             $('#kategori').select2({
                 dropdownParent: $('#pilihharga')
             });
         });

         function alertGagal() {
             Swal.fire({
                 icon: "error",
                 title: "Gagal",
                 text: "Harap lengkapi semua data terlebih dahulu sebelum menyimpan",
                 allowOutsideClick: true,
                 allowEscapeKey: false,
             });
         }
         $("#kt_datepicker_3").flatpickr({
             enableTime: true,
             dateFormat: "Y-m-d H:i",
         });

         function checkModalTanggalEvent() {
             let tanggal_konser = document.getElementById('kt_datepicker_3').value;
             if (!tanggal_konser) {
                 alertGagal();
                 return;
             }
             // Ambil nilai dari input waktu mulai dan waktu selesai yang dipilih
             var startDate = document.querySelector('#kt_datepicker_3').value;

             // Ganti teks pada elemen anchor dengan output waktu yang dipilih
             document.querySelector('#tanggalAnchor').textContent = startDate;
             $('#pilihtanggal').modal('hide');
         }

         function checkModalHarga() {
             let kategori = document.getElementById('kategori').value;
             let jumlahtiket = document.getElementById('jumlahtiket').value;
             let kategoritiket = document.querySelectorAll(`[name="kategoritiket1"]`)[0];
             let harga = document.querySelectorAll(`[name="harga1"]`)[0];

             if (!kategori || !jumlahtiket || !harga || !kategoritiket) {
                 alertGagal();
                 return;
             }

             $('#pilihharga').modal('hide');
         }

         function checkModalWaktuEvent() {
             let tanggal_waktu1 = document.getElementById('kt_datepicker_4').value;
             let tanggal_waktu2 = document.getElementById('kt_datepicker_5').value;
             if (!tanggal_waktu1 || !tanggal_waktu2) {
                 alertGagal();
                 return;
             }
             // Ambil nilai dari input waktu mulai dan waktu selesai yang dipilih
             var startTime = document.querySelector('#kt_datepicker_4').value;
             var endTime = document.querySelector('#kt_datepicker_5').value;

             // Ganti teks pada elemen anchor dengan output waktu yang dipilih
             document.querySelector('#waktuAnchor').textContent = startTime + ' - ' + endTime;
             $('#pilihwaktu').modal('hide');
         }

         function checkModalLocation() {
             var namaTempat = document.getElementById('nama-tempat').value;
             var alamat = document.getElementById('alamat').value;
             try {
                 var lat = document.getElementById('lat').value;
                 var lon = document.getElementById('lon').value;
             } catch (error) {
                 Swal.fire({
                     icon: "error",
                     title: "Gagal",
                     text: "Harap mengotak-atik input latitude dan longitude",
                     allowOutsideClick: true,
                     allowEscapeKey: false,
                 });
             }

             if (!namaTempat || !alamat || !lat || !lon) {
                 alertGagal();
                 return;
             }
             var selectedLocation = document.querySelector('#alamat').value;

             // Update the content of the <span> element with the selected location
             document.querySelector('#selectedLocation').textContent = selectedLocation;
             $('#pilihlokasi').modal('hide');
         }
     </script>
     <!-- SCRIPT MAPS API -->
     <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
     <script>
         var map = L.map('map').setView([20.5, 20.1], 3);

         // Tambahkan tile layer ke peta
         L.tileLayer(
             'https://maptiles.p.rapidapi.com/en/map/v1/{z}/{x}/{y}.png?rapidapi-key=3230a3c055mshfdd385da7074bfbp12a3d8jsn8c2083fc1b95', {
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
                                 console.log(results[0])
                                 address += results[0].properties.street || '';
                                 address += results[0].properties.city || '';
                                 address += results[0].properties.state || '';
                                 address += results[0].properties.country || '';

                                 document.getElementById('lat').value = results[0].properties.lat;
                                 document.getElementById('lon').value = results[0].properties.lon;
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
         // Mendapatkan referensi ke elemen input gambar profil dan tombol unggah
         function triggerProfileUpload() {
             var profileImageInput = document.getElementById('profileImageInput');
             var uploadProfileButton = document.getElementById('uploadProfileButton');
             var organizerImage = document.getElementById('organizerImage');

             // Menambahkan event listener untuk perubahan pada input file gambar profil
             profileImageInput.addEventListener('change', function() {
                 // Memastikan ada file gambar yang dipilih
                 if (profileImageInput.files && profileImageInput.files[0]) {
                     // Lakukan sesuatu dengan file gambar yang dipilih di sini
                     var selectedImage = profileImageInput.files[0];

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
         }
     </script>

     <script>
         $("#kt_datepicker_3").flatpickr({
             mode: "range", // Mode "range" untuk memilih rentang tanggal
             minDate: "today", // Minimum tanggal yang dapat dipilih adalah hari ini
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

     <!-- BTN TAMBAH FORM -->
     <script>
         $(document).ready(function() {
             var maxField = 5; //Input fields increment limitation
             var addButton = $('#btnTambahKategoriTiket'); //Add button selector
             var wrapper = $('#tempatInputKategoriHarga'); //Input field wrapper
             var x = 1; //Initial field counter is 1

             // Function to renumber input fields
             function renumberFields() {
                 $(wrapper).find('input[name^="kategoritiket"]').each(function(index, element) {
                     $(element).attr('name', 'kategoritiket' + (index + 1));
                     $(element).attr('placeholder', 'Kategori Tiket ' + (index + 1));
                 });

                 $(wrapper).find('input[name^="harga"]').each(function(index, element) {
                     $(element).attr('name', 'harga' + (index + 1));
                 });
             }

             // Once add button is clicked
             $(addButton).click(function() {
                 // Check maximum number of input fields
                 if (x <= maxField) {
                     x++; // Increase field counter
                     var fieldHTML =
                         `<div class="mb-3"><input name="kategoritiket${(x - 1)}" class="form-control form-control-solid mb-3" placeholder="Kategori Tiket ${(x - 1)}"><input name="harga${(x - 1)}" class="form-control form-control-solid mb-1" placeholder="Harga"><a href="javascript:void(0);" class="remove_button btn btn-danger btn-sm ml-2"><i class="bi bi-trash"></i></a></div>`;
                     $(wrapper).append(fieldHTML); // Add field html
                 } else {
                     Swal.fire({
                         icon: "error",
                         title: "Gagal",
                         text: "Maksimal kategori tiket adalah 5!",
                         allowOutsideClick: true,
                         allowEscapeKey: false,
                     });
                 }
             });

             // Once remove button is clicked
             $(wrapper).on('click', '.remove_button', function(e) {
                 e.preventDefault();
                 $(this).parent('div').remove(); // Remove field html
                 x--; // Decrease field counter
                 renumberFields(); // Re-number the fields
             });
         });
     </script>

     <!-- END BTN TAMBAH FORM -->
 @endsection
