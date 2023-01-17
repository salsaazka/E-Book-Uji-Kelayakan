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
                            <a class="nav-link scrollto text-primary" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link scrollto active text-primary me-3" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto text-primary" href="{{ route('login') }}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex w-100 align-items-center">
            <div class="w-100 w-md-50">
                <h2 class=" text-primary pt-5">
                    <strong>Selamat Datang Di E-Book!</strong>
                </h2>
                <span class="text-muted fs-6">Untuk memenuhi kebutuhan pemustaka, kami melanggan berbagai bahan perpustakaan
                    digital online (E-Book) seperti jurnal , ebook, dan karya-karya referensi online lainnya. Setiap anggota
                    E-Book dan telah memiliki nomor anggota yang sah, berhak memanfaatkan layanan koleksi digital online
                    yang kami langgan (E-Book).</span>
                <div class="d-flex mt-4">
                    <button class="btn btn-donasi btn-primary me-1">
                        <a href="/auth/register" class="text-white text-decoration-none">Registrasi</a>
                    </button>
                    <button class="btn btn-donasi-outline btn-outline-primary">
                        <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                    </button>
                </div>
            </div>
            <div class="w-100 w-md-50">
                <center>
                    <img src="{{ asset('assets/img/book1.png') }}" alt="" class="w-75">
                </center>
            </div>
        </div>
        <div class="d-flex w-100 align-items-center">
            <div class="w-100 w-md-50">
                <center>
                    <img src="{{ asset('assets/img/6263.jpg') }}" alt="" class="w-75">
                </center>
            </div>
            <div class="w-100 w-md-50">
                <h2 class=" text-primary">
                    <strong>Tentang Kami</strong>
                </h2>
                <span class="text-muted fs-6">Perpustakaan Nasional melaksanakan tugas pemerintahan di bidang perpustakaan
                    sesuai dengan ketentuan peraturan perundang-undangan meliputi: <br><br>

                    menetapkan kebijakan nasional, kebijakan umum, dan kebijakan teknis pengelolaan perpustakaan;
                    melaksanakan pembinaan, pengembangan, evaluasi, dan koordinasi terhadap pengelolaan perpustakaan;
                    membina kerja sama dalam pengelolaan berbagai jenis perpustakaan; dan
                    mengembangkan standar nasional perpustakaan.
                </span>
            </div>
        </div>
        <div class="mt-4">
            <h3 class=" text-primary text-center">
                <strong>Buku Terpopuler</strong>
            </h3>
            <div class="d-flex justify-content-around mt-3">
                @foreach ($createBook as $item)
                    <a class="card w-25" href="#">
                        <img src="{{ $item->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ $item->title }}</p>
                        </div>
                    </a>
                @endforeach
                {{-- <div class="card w-25">
                    <img src="{{ asset('assets/img/book1.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div>
                <div class="card w-25">
                    <img src="{{ asset('assets/img/book1.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div> --}}
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('book') }}" class="btn btn-primary mt-3">Lihat Semua</a>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="bg-primary w-100 py-3">
            <p class="text-center text-white p-0 m-0">Copyright</p>
        </div>
    </div>
@endsection
