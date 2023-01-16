@extends('layout/base-home')

@section('content')

<div class="container my-5">
    <div class="col-6">
        <form method="POST" action="{{route('auth.login')}}" class="card py-4 px-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Input Email">
              </div>
        
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="number" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Input Password">
              </div>
            
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
         
        </form>
    </div>
    
</div>
@endsection

    