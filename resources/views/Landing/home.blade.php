@extends('layouts.base-home')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
@endsection

@section('content')
    {{-- Navbar --}}

    <nav class="navbar navbar-expand-md navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand ">
                <h4 class="text-primary">
                    <strong>E-Book</strong>
                </h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-1 mb-lg-0 ">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link scrollto active" href="#">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link scrollto active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div class="content-sign px-3" style="min-height: 100vh">
        <div class="d-flex flex row ">
            <div class="col-md-12 col-lg-5 col-xl-6 mt-5 pt-5">
                @if (Session::get('success'))
                    <div class="alert alert-success w-100">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <h3 class="text-center text-primary">
                    <strong>Welcome! This is E-Book Online</strong>
                </h3>
                <span class="text-center text-muted offset-3">Better soulutions for your choice book we can access book for
                    online and free!</span>

                <div class="d-flex justify-content-center  mt-4">
                    <button class="btn btn-donasi btn-primary me-1">
                        <a href="/auth/register" class="text-white text-decoration-none">Registrasi</a>
                    </button>
                    <button class="btn btn-donasi-outline btn-outline-primary">
                        <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                    </button>
                </div>
            </div>

            <div class=" d-flex justify-content-center col-lg-6 mt-2 pt-2 ">
                <img src="{{ asset('assets/img/book1.png') }}" alt="" class="p-3">
            </div>

        </div>
    @endsection
