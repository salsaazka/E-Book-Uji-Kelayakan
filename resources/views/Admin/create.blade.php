@extends('layouts/base-home')

@section('content')

<div class="content-sign px-3" >
    <div class="d-flex flex row ">
    <div class="col-6  d-flex justify-content-center col-lg-6 ">
        <img src="{{asset('assets/img/book1.png')}}" alt="" class="w-100">
    </div>
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
</div>

<div class="wrapperTable table-responsive">
  <table id="userTable" class="tables" style="width:100%">
      <thead>
          <tr>
              <th style="width: 5%">No</th>
              <th style="width: 10%">Book ID</th>
              <th style="width: 10%">Category ID</th>
              <th style="width: 10%">Title</th>
              <th style="width: 10%">Writer</th>
              <th style="width: 10%">Publisher</th>
              <th style="width: 10%">ISBN</th>
              <th style="width: 10%">Action</th>
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
                      <button type="submit" class="fa-sharp fa-solid fa-delete-left" style="border:none;  background:none;"> </button>
                    </form>
              </div>
              <div class="ml-auto">
                  
                  <form action="{{ route('update', $categories->id) }}" method="POST">
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

    