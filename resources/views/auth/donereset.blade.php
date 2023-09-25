@extends('layouts.app')

<div class="limiter" style="height: 100vh;">
    <div class="container-login100">
        <div class="login100-more"
            style="background-image:  url('{{ asset('images/login.jpeg') }}');width: 864px;height: auto;flex-shrink: 0;"></div>
        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form action="{{ route('password.email') }}" method="POST" class="login100-form validate-form"
                style="padding: 20px;    padding: 20px;display: flex;
            flex-direction: column;">
                @csrf
                <span class="login100-form-title p-b-5">
                    Selesai
                    <p class="mt-4" style="color: #fff;font-size:20px">Kata sandi anda telah di atur ulang!
                </span>

                <br><br>

                <div class="container-login100-form-btn mt-4">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn">

                        </div>
                        <a style="text-decoration: none" href="{{ route('login') }}" class="login100-form-btn" id="signup-button">
                            Masuk
                        </a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>



