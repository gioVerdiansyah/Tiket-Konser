@extends('layouts.app')
@guest
<div class="limiter" style="height: 100vh; overflow: hidden;">
    <div class="container-login100">
        <div class="login100-more" style="background-image: url('images/login.jpeg');width: 864px;height: auto;flex-shrink: 0;"></div>
        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form action="{{ route('register') }}" method="POST" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title p-b-5">
                    Sign Up
                    <p class="mt-4" style="color: #fff;font-size:20px">Sudah punya akun?</p>
                    <p style="color: #fff;font-size:20px">Silahkan <a href="/login" style="color: #C10C99;font-size:20px">Login Disini!</a></p>
                </span>
                
                <br><br>
                <div class="wrap-input100">
                    <label for="name" class="label-input100">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email anda">
                    <span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100 mb-5">
                    <label for="email" class="label-input100">Nama</label>
                    <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" placeholder="Masukkan nama anda">
                    <span class="focus-input100"></span>
                </div>
                
                
                <div class="wrap-input100">
                    <label for="password" class="label-input100">{{ __('Password') }}</label>
                    <input class="input100" type="password" name="password" id="password" placeholder="Masukkan password anda">
                    <span class="focus-input100"></span>
                    <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                </div>
                
                <div class="wrap-input100">
                    <label for="password-confirm" class="label-input100">Confirm Password</label>
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan ulang password anda">
                    <span class="focus-input100"></span>
                </div>
                
                <div class="container-login100-form-btn mt-4">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn">
                            
                        </div> 
                        <button type="submit" class="login100-form-btn" id="signup-button">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endguest