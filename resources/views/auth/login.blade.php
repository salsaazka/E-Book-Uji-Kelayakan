@extends('layouts.base-home')

@section('content')

<div class="content-sign px-3" >
    <div class="d-flex flex row ">
    <div class="col-6  d-flex justify-content-center col-lg-6 mt-2 pt-2 ">
        <img src="{{asset('assets/img/book-2.png')}}" alt="" class="w-100">
    </div>
    <div class="col-6 col-md-12 col-lg-5 col-xl-6 mt-5 pt-5">
        <form method="POST" action="{{route('login.auth')}}" class="card py-4 px-4">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::get('success'))
                    <div class="alert alert-success w-100">
                        {{ Session::get('success') }}
                    </div>  
                 @endif

            
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Input Email">
              </div>
        
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Input Password">
              </div>
            
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
         
        </form>
    </div>
    
</div>
@endsection

    