@extends('layouts.nav_profile')
@section('content')
    <div class="container-fluid mt-3">
        <form action="{{ route('updateProfile', '') }}/{{ $data_user->id }}" method="POST" enctype="multipart/form-data"
            class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="card d-flex align-items-center p-2 h-100">
                        <img src="{{ asset('storage/image/photo-user/' . $data_user->pp) }}"
                            class="profile-image card-img-top rounded" alt="Profile" id="photo-profile">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $data_user->name }}</h5>
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
                            <button type="button" class="btn btn-outline-dark btn-block">Ubah Kata Sandi</button>
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
                                </div>
                                @error('name')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="inputEmail"
                                        placeholder="Email" value="{{ $data_user->email }}">
                                </div>
                                @error('email')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" name="phone" id="no_telp"
                                        placeholder="{{ $data_user->phone ?? 'Nomor telepon belum ditambahkan' }}"
                                        value="{{ $data_user->phone ?? '' }}">
                                    @error('phone')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" id="inputExperience"
                                        placeholder="{{ $data_user->alamat ?? 'Alamat belum ditambahkan' }}">{{ $data_user->alamat ?? '' }}</textarea>
                                </div>
                                @error('alamat')
                                    <p>{{ $message }}</p>
                                @enderror
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
@endsection
