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