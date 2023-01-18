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
                                <th style="width: 10%">Book ID</th>
                                <th style="width: 10%">Category ID</th>
                                <th style="width: 15%">Title</th>
                                <th style="width: 15%">Writer</th>
                                <th style="width: 10%">Publisher</th>
                                <th style="width: 15%">ISBN</th>
                                <th style="width: 15%">Synopsis</th>
                                <th style="width: 10%">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($category as $key => $categories)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $categories['id'] }}</td>
                                    <td>{{ $categories['category'] }}</td>
                                    <td>{{ $categories['title'] }}</td>
                                    <td>{{ $categories['writer'] }}</td>
                                    <td>{{ $categories['publisher'] }}</td>
                                    <td>{{ $categories['no'] }}</td>
                                    <td>{{ $categories['synopsis'] }}</td>
                                    <td>
                                        <div class="ml-auto">
                                            <form action="{{ route('delete', $categories['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete </button>
                                            </form>
                                        </div>
                                        <div class="ml-auto mt-3">
                                            <a href="/edit/{{ $categories['id']}}" class="btn btn-warning">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end pb-2 mt-3">
                        <a href="{{ route('export.excel') }}" class="btn btn-success " target="_blank">Export Excel</a>
                    </div>
                </div>
            </div>
        </div>

    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="d-flex flex row ">
            <div class="col-6 d-flex justify-content-center ">
                <img src="{{ asset('assets/img/book1.png') }}" alt="">
            </div>
            <div class="col-6 col-md-12 col-lg-5 col-xl-6 mt-2 pt-2">
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" class="card py-4 px-2">
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
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                            placeholder="Input Title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Writer</label>
                        <input type="text" name="writer" class="form-control" id="exampleFormControlInput1"
                            placeholder="Input Writer">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Publisher</label>
                        <input type="text" name="publisher" class="form-control" id="exampleFormControlInput1"
                            placeholder="Input Publisher">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Book</label>
                        <select class="form-select" aria-label="Default select example" name="category" id="">
                            <option selected>--Select--</option>
                            <option value="Fiksi">Fiksi</option>
                            <option value="Non Fiksi">Non Fiksi</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No ISBN</label>
                        <input type="text" name="no" class="form-control" id="exampleFormControlInput1"
                            placeholder="Input No ISBN">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Synopsis</label>
                        <textarea type="text" class="form-control" name="synopsis" id=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
                </form>
            </div>
        </div>
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
