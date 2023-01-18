@extends('layouts.base-admin')

@section('title', 'Create Book')

@section('content')
<form method="POST" action="{{ route('update', $category['id'])}}" id="create-form" class="card py-4 px-4">
    @csrf
    @method('PATCH')
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
@endsection