@extends('layouts/base-home')

@section('content')

<div class="content-sign px-3" >
    <div class="d-flex flex row ">
    <div class="col-6  d-flex justify-content-center col-lg-6 mt-2 pt-2 ">
        <img src="{{asset('assets/img/book-2.png')}}" alt="" class="w-100">
    </div>
    <div class="col-6 col-md-12 col-lg-5 col-xl-6 mt-5 pt-2">
        <form method="POST" action="{{route('store')}}" class="card py-4 px-4">
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
                <label for="exampleFormControlTextarea1" class="form-label">Category Book</label>
                <select name="category" id="">
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
                <label for="exampleFormControlInput1" class="form-label">Synonimm</label>
                <textarea name="synonim" id="" ></textarea>
              </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
         
        </form>
    </div>
   
    </div>
</div>
@endsection

    