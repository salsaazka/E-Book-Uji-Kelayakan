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
                    <form class="d-flex" role="search">
                        <div class="nav-item dropdown" >
                          <a class="nav-link dropdown-toggle" href="#" role="button" style="color:white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"> </i> {{Auth::user()->name}} 
                        </a>
                      
                     <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/">
                        <i class="fa-solid fa-house" style="color: rgb(0, 41, 177)"></i> 
                      </a></li>
                       <li><a class="dropdown-item" href="/">
                         <i class="fa-solid fa-user" style="color: rgb(0, 41, 177)"></i> Profile Detail
                        </a></li>
                        
                          <li>
                            <a class="dropdown-item" href="" >
                              <i class="fas fa-server" style="color: rgb(0, 41, 177)"></i> Data User
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
@endsection