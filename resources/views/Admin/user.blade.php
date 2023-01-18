@extends('layouts.base-admin')

@section('title', 'Data User')

@section('content')

<div class="wrapperTable table-responsive">
    <table id="userTable" class="tables" style="width:100%">
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Name</th>
                <th style="width: 20%">Address</th>
                <th style="width: 20%">No Telp</th>
                <th style="width: 10%">Email</th>
                <th style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regis as $key => $i)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $i['name'] }}</td>
                <td>{{ $i['address'] }}</td>
                <td>{{ $i['no_telp'] }}</td>
                <td>{{ $i['email'] }}</td>
                <td>
                    <div class="ml-auto"> 
                        <form action="{{ route('delete', $i['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="fa-sharp fa-solid fa-delete-left" style="border:none;  background:none;"> </button>
                      </form>
                </div>
            <div class="ml-auto">
                    
                    <form action="{{ route('update', $i->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="fa-sharp fa-solid fa-arrow-rotate-left" style="border: none; background:none;"></button> 
                    </form>  
                </div>
                </td>
            </tr>
            @endforeach      
        </tbody>
    </table>
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