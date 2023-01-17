@extends('layouts.base-home')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
@endsection

@section('content')
    {{-- Navbar --}}

    <nav class="navbar navbar-expand-md navbar-light fixed-top shadow " style="margin-top: -.5rem">
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
                            <a class="nav-link scrollto text-primary active" href="#">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link scrollto active text-primary me-3" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (Session::get('success'))
        <div class="alert alert-success w-100">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="container" style="min-height: 100vh; margin-top: 7rem">
        <div class="d-flex flex-row card">
            <div class="col-4 m-3 d-flex justify-content-center">
                <img src="{{ $book->image }}" class="w-100">
            </div>
            <div class="col-8 m-3">
                <p>Judul: {{ $book->title }}</p>
                <p>Penulis: {{ $book->writer }}</p>
                <p>Penerbit: {{ $book->publisher }}</p>
                <p>No ISBN: {{ $book->no }}</p>
                <h4>
                    <strong>Sinopsis:</strong>
                </h4><br>
                <p>{{ $book->synopsis }}</p>
                <a href="{{ route('bookDownload', $book->id) }}" class="btn btn-success">Download</a>
                <a href="{{ route('book') }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="bg-primary w-100 py-3">
            <p class="text-center text-white p-0 m-0">Copyright</p>
        </div>
    </div>
@endsection
