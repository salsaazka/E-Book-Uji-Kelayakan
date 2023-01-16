@extends('layouts.base-admin')

@section('title', 'Hai, Admin!')

@section('content')


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