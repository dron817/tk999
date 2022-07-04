@extends('layouts.general')

@section('title', 'Авторизация - Регистрация')
@section('custom-css')
@endsection
@section('custom-js-before')
@endsection
@section('custom-js-after')
@endsection

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif



@section('content')
    <section id="bus-image-section">

    </section>
    <section id="auth-section">
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-4">
                    <h2>Авторизация</h2>
                    <div class="row">
                        <form action="{{ $login_url }}" method="post">
                            @csrf
                            {{-- Email field --}}
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Password field --}}
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                       placeholder="{{ __('adminlte::adminlte.password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Login field --}}
                            <div class="row">
                                <div class="col-12">
                                    <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                        <span class="fas fa-sign-in-alt"></span>
                                        {{ __('adminlte::adminlte.sign_in') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-1"></div>
                <div class="col-4">
                    <h2>Регистрация</h2>
                    <div class="row">
                        <form action="{{ $register_url }}" method="post">
                            @csrf
                            {{-- Name field --}}
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Email field --}}
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Password field --}}
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                       placeholder="{{ __('adminlte::adminlte.password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Confirm password field --}}
                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- Register button --}}
                            <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                {{ __('adminlte::adminlte.register') }}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>
@endsection
