@extends('layouts/base-home')

@section('content')

<div class="content-sign px-3" >
    <div class="d-flex flex row ">
    <div class="col-6  d-flex justify-content-center col-lg-6 ">
        <img src="{{asset('assets/img/book1.png')}}" alt="" class="w-100">
    </div>
    <div class="col-6 col-md-12 col-lg-5 col-xl-6 mt-2 pt-2">
        <form method="POST" action="{{ route('store')}}"  enctype="multipart/form-data" class="card py-4 px-4">
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
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Input Title">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Writer</label>
                <input type="text" name="writer" class="form-control" id="exampleFormControlInput1" placeholder="Input Writer">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Publisher</label>
                <input type="text" name="publisher" class="form-control" id="exampleFormControlInput1" placeholder="Input Publisher">
              </div>
              <div class="mb-3">
                <label  class="form-label">Category Book</label>
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
                <input type="text" name="no" class="form-control" id="exampleFormControlInput1" placeholder="Input No ISBN">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Synopsis</label>
                <textarea type="text" class="form-control" name="synopsis" id="" ></textarea>
              </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
         
        </form>
    </div>
    </div>

    <div class="container mt-5 px-3">    
        <div class="wrapperTable table-responsive">
          <table id="userTable" class="tables" style="width:100%">
            <thead>
              <tr>
                <th style="width: 5%">No</th>
                <th style="width: 10%">Book ID</th>
                <th style="width: 15%">Category ID</th>
                <th style="width: 15%">Title</th>
                <th style="width: 15%">Writer</th>
                <th style="width: 15%">Publisher</th>
                <th style="width: 15%">ISBN</th>
                <th style="width: 15%">Sinopsis</th>
                <th style="width: 5%">Action</th>
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
                      <div class="ml-auto mt-2 "> 
                        <form action="{{ route('delete', $categories['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " >Delete</button>
                        </form>
                      </div>
                    <div class="ml-auto mt-2 ">
                      <form action="{{ route('update', $categories->id) }}" method="POST">
                          @method('PATCH')
                          @csrf
                          <button type="submit" class="btn btn-warning " >Update</button> 
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