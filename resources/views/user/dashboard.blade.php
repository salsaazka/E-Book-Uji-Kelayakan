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
                        <a class="nav-link scrollto text-primary active" href="/logout">Logout</a>
                      </li>
                    @else
                      <li class="nav-item">
                        <a class="nav-link scrollto active text-primary me-3" href="{{ route('userDash')}}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link scrollto" href="{{ route('login') }}">Login</a>
                      </li>

                    <form class="d-flex" role="search">
                        <div class="nav-item dropdown" >
                          <a class="nav-link dropdown-toggle" href="#" role="button" style="color:white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"> </i> {{Auth::user()->name}}
                        </a>

                     <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/">
                        <i class="fa-solid fa-house" style="color: rgb(0, 41, 177)"></i> Novel
                      </a></li>
                       <li><a class="dropdown-item" href="/">
                         <i class="fa-solid fa-user" style="color: rgb(0, 41, 177)"></i> IT
                        </a></li>

                          <li>
                            <a class="dropdown-item" href="/" >
                              <i class="fas fa-server" style="color: rgb(0, 41, 177)"></i> Fiksi
                            </a>
                          </li>

                        <li>
                          <a class="dropdown-item" href="/logout" >
                            <i class="fas fa-sign-out-alt" style="color: rgb(0, 41, 177)"></i>  Logout
                          </a>
                        </li>
                       </ul>
                      </div>
                    </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (Session::get('success'))
    <div class="alert alert-success w-40 justify-content-center">
        {{ Session::get('success') }}
    </div>
@endif
@endsection
