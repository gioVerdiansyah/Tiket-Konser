@extends('layouts.nav_profile')
@section('content')
        {{--  <style>
            .profile-image {
                width: 70%; /* Gambar akan mengisi wadah secara proporsional */
                object-fit: cover; /* Mengatur gambar untuk mengisi wadah dengan menjaga aspek rasio */
                object-position: center center; /* Posisi gambar di tengah-tengah wadah */
                border-radius: 50%; /* Untuk membuat gambar bundar seperti wadah */
            }
        </style>  --}}
    <div class="container-fluid mt-3">
        <form action="{{ route('updateProfile', '') }}/{{ $data_user->id }}" method="POST" enctype="multipart/form-data"
            class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="card d-flex align-items-center p-2 h-100">
                        <div  style="border-radius: 100%; height:150px; width:155px;">
                            <img src="{{ asset('storage/image/photo-user/' . $data_user->pp) }}"
                            class="profile-image card-img-top" alt="Profile" id="photo-profile" style="width: 100%; height: 100%; border-radius:50%;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $data_user->name }}</h5>
                            @error('pp')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="file" name="pp" id="pp"
                                onchange="
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#photo-profile').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(this.files[0]);
                                ">
                            <label for="pp" class="btn btn-outline-dark btn-block mb-2">Upload New
                                Avatar</label>
                            <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal"
                                data-target="#gantiKataSandiModal">
                                Ubah Kata Sandi
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Detail Info User</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="inputName"
                                        placeholder="Name" value="{{ $data_user->name }}">
                                    @error('nama')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="inputEmail"
                                        placeholder="Email" value="{{ $data_user->email }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" name="phone" id="no_telp"
                                        placeholder="{{ $data_user->phone ?? 'Nomor telepon belum ditambahkan' }}"
                                        value="{{ $data_user->phone ?? '' }}">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" id="inputExperience"
                                        placeholder="{{ $data_user->alamat ?? 'Alamat belum ditambahkan' }}">{{ $data_user->alamat ?? '' }}</textarea>
                                    @error('alamat')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end pt-3">
                <button type="submit" class="btn btn-dark">Simpan</button>
                <button type="reset" class="btn btn-dark ml-2">Batal</button>
            </div>
        </form>
    </div>
    <!-- Modal Ganti Kata Sandi -->
    <div class="modal fade" id="gantiKataSandiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Kata Sandi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateProfilePass', '') }}/{{ $data_user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="passwordLama">Kata Sandi Lama</label>
                            <input type="password" class="form-control" name="passwordLama" id="passwordLama"
                                placeholder="Kata Sandi Lama">
                            @error('passwordLama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="passwordBaru">Kata Sandi Baru</label>
                            <input type="password" class="form-control" name="passwordBaru" id="passwordBaru"
                                placeholder="Kata Sandi Baru">
                            @error('passwordBaru')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="konfirmasiPasswordBaru">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" class="form-control" name="konfirmasiPasswordBaru"
                                id="konfirmasiPasswordBaru" placeholder="Konfirmasi Kata Sandi Baru">
                            @error('konfirmasiPasswordBaru')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
