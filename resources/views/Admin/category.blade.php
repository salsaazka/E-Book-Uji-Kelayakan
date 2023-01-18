@extends('layouts/base-admin')

@section('content')

<div class="content-sign px-3" >
    <div class="d-flex justify-content-center flex row ">
    {{-- <div class="col-6  d-flex justify-content-center col-lg-6 ">
        <img src="{{asset('assets/img/book1.png')}}" alt="" class="w-100">
    </div> --}}
    <div class="col-6 col-md-12 col-lg-5 col-xl-6 mt-2 pt-2">
        <form method="POST" action="{{ route('store')}}" class="card py-4 px-4">
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

              <div class="mb-3">
                <h3>Category Name</h3>
                    <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Input Title">
              </div>
                <button type="submit" class="btn btn-success"></i> Submit</button>
        </form>
    </div>
</div>
</div>

@endsection

