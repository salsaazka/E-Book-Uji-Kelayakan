@extends('layouts/base-admin')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button"
                role="tab" aria-controls="home-tab-pane" aria-selected="true">Table</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
                role="tab" aria-controls="profile-tab-pane" aria-selected="false">Tambah Data</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="mt-5">
                <div class="wrapperTable table-responsive">
                    <table id="userTable" class="tables" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 10%">Name</th>
                                <th style="width: 10%">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($category as $key => $categories)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $categories['name'] }}</td>
                                    <td>
                                        <div class="ml-auto">
                                            <form action="{{ route('delete', $categories['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="fa-sharp fa-solid fa-delete-left"
                                                    style="border:none;  background:none;"> </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <form method="POST" action="{{ route('store') }}" class="card py-4 px-4">
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
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                        placeholder="Input Title">
                </div>
                <button type="submit" class="btn btn-success"></i> Submit</button>
            </form>
        </div>
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
