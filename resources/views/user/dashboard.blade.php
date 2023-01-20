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
                    <li class="nav-item">
                        <a class="nav-link scrollto active text-primary me-3" href="#">Home</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link scrollto text-primary" href="/logout">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link scrollto text-primary" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/">
                                    <i class="fa-solid fa-house" style="color: rgb(240, 182, 57)"></i> Home
                                </a></li>
                            <li><a class="dropdown-item" href="/">
                                    <i class="fa-solid fa-user" style="color: rgb(240, 182, 57)"></i> Profile Detail
                                </a></li>
                            @if (Auth::user()->role == 'admin')
                                <li>
                                    <a class="dropdown-item" href="/">
                                        <i class="fas fa-server" style="color: rgb(240, 182, 57)"></i> Data User
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt" style="color: rgb(240, 182, 57)"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>


    @if (Session::get('success'))
        <div class="container">
            <div class="alert alert-success w-40 alert-dismissible fade show" style="margin-top: 7rem">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container" style="margin-top: 7rem">
        <div>
            <h3 class=" text-primary text-center">
                <strong>Daftar Buku</strong>
            </h3>
            <div class="d-flex justify-content-center mt-4">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach ($category as $item)
                        {{-- if active --}}
                        @if ($loop->first)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-{{ $item->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $item->id }}" type="button" role="tab"
                                    aria-controls="pills-{{ $item->id }}"
                                    aria-selected="true">{{ $item->name }}</button>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-{{ $item->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $item->id }}" type="button" role="tab"
                                    aria-controls="pills-{{ $item->id }}"
                                    aria-selected="false">{{ $item->name }}</button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($category as $item)
                    {{-- if active --}}
                    @if ($loop->first)
                        <div class="tab-pane fade show active" id="pills-{{ $item->id }}" role="tabpanel"
                            aria-labelledby="pills-{{ $item->id }}-tab" tabindex="0">
                            <div class="d-flex justify-content-around mt-3">
                                @foreach ($createBook as $items)
                                    @if ($items->category == $item->name)
                                        <a class="card w-25" href="{{ route('bookDetail', $items->id) }}">
                                            <img src="{{ url('assets/img/data/' . $items->image) }}" class="card-img-top"
                                                style="max-height: 300px">
                                            <div class="card-body">
                                                <p class="card-text">{{ $items->title }}</p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="tab-pane fade" id="pills-{{ $item->id }}" role="tabpanel"
                            aria-labelledby="pills-{{ $item->id }}-tab" tabindex="0">
                            <div class="d-flex justify-content-around mt-3">
                                @foreach ($createBook as $items)
                                    @if ($items->category == $item->name)
                                        <a class="card w-25" href="{{ route('bookDetail', $items->id) }}">
                                            <img src="{{ url('assets/img/data/' . $items->image) }}" class="card-img-top"
                                                style="max-height: 300px">
                                            <div class="card-body">
                                                <p class="card-text">{{ $items->title }}</p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">...</div> --}}
            </div>
        </div>
    @endsection
