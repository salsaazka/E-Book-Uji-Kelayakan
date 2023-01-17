@extends('layouts/base-home')

@section('content')

<div class="content-sign px-3" >
    <div class="d-flex flex row ">
    <div class="col-6  d-flex justify-content-center col-lg-6 mt-2 pt-2 ">
        <img src="{{asset('assets/img/3180758.jpg')}}" alt="" class="w-100">
    </div>
    <div class="col-6 col-md-12 col-lg-5 col-xl-6 mt-5 pt-2">
        <form method="POST" action="{{route('register.post')}}" class="card py-4 px-4">
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
            <div class="text-center logo ml-3">
                <i class="fas fa-user-plus"></i>
            </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Input Name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Input Email">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">No Telepon</label>
                <input type="number" name="no_telp" class="form-control" id="exampleFormControlInput1" placeholder="Input Number">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="number" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Input Password">
              </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
         
        </form>
    </div>
   
    </div>
</div>
@endsection

    