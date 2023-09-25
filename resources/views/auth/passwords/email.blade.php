@extends('layouts.app')
@guest
<div class="limiter" style="height: 100vh;">
    <div class="container-login100">
        <div class="login100-more"
            style="background-image:  url('{{ asset('images/login.jpeg') }}');width: 864px;height: auto;flex-shrink: 0;"></div>
        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST" class="login100-form validate-form"
                style="padding: 20px;    padding: 20px;display: flex;
            flex-direction: column;">
                @csrf
                <span class="login100-form-title p-b-5">
                    {{ __('Reset Password') }}
                    <p class="mt-4" style="color: #fff;font-size:20px">Silahkan isi email anda untuk <br> Atur Ulang Kata Sandi</p>
                </span>

                <br><br>
                <div class="wrap-input100">
                    <label for="email" class="label-input100">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Masukkan email anda">
                    <span class="focus-input100"></span>
                </div>
                @error('email')
                    <p style="color:rgb(193,12,153)">{{ $message }}</p>
                @enderror

                <div class="container-login100-form-btn mt-4">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn">

                        </div>
                        <button type="submit" class="login100-form-btn" id="signup-button">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endguest


