@extends('layouts.app')

@section('content')
<div class="limiter" style="height: 100vh;">
    <div class="container-login100">
        <div class="login100-more"
            style="background-image:  url('{{ asset('images/login.jpeg') }}');width: 864px;height: auto;flex-shrink: 0;"></div>
        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                
                @csrf
                <span class="login100-form-title p-b-5">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klik disini untuk meminta kirim ulang email.</button>
                    </form>
                </span>
                </div>
        </div>
    </div>
</div>
@endsection
