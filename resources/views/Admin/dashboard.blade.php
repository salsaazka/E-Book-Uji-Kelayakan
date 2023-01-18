@extends('layouts.base-admin')

@section('title', 'Hai, Admin!')

@section('content')
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

 <div class="alert alert-dark w-100 d-flex align-items-center alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle text-danger " style="margin-right: 10px;"></i>
    <div>
        Selamat Datang dihalaman Admin E-Book!
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div> 
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "info": false,
                "bSort": false,
            });
        });
    </script>
@endsection