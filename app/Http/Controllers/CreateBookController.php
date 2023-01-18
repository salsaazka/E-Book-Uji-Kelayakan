<?php

namespace App\Http\Controllers;

use App\Models\CreateBook;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class CreateBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBook()
    {
        $category = CreateBook::all();
        return view('admin.create', compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'category' => 'required',
            'image' => 'required',
            'no' => 'required',
            'synopsis' => 'required',
        ]);


        $image = $request->file('image');
        $imgName = time().rand().'.'.$image->extension();

        if(!file_exists(public_path('/assets/img/data/'.$image->getClientOriginalName()))){
            //set untuk menyimpan file nya
            $dPath = public_path('/assets/img/data/');
            //memindahkan file yang diupload ke directory yang telah ditentukan
            $image->move($dPath, $imgName);
            $uploaded = $imgName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }

        CreateBook::create([
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'category' => $request->category,
            'image' => $uploaded,
            'no' => $request->no,
            'synopsis' => $request->synopsis,
        ]);

        return redirect()->route('store')->with('success', 'berhasil membuat akun!');
    }
    
    public function show(CreateBook $createBook)
    {
        //
    }

    public function edit($id)
    {
       $category = CreateBook::where('id', $id)->first();
       return view('admin.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required',
        'writer' => 'required',
        'publisher' => 'required',
        'category' => 'required',
        'no' => 'required',
        'synopsis' => 'required',
      ]);

      CreateBook::where('id', $id)->update([
        'title' => $request->title,
        'writer' => $request->writer,
        'publisher' => $request->publisher,
        'category' => $request->category,
        'no' => $request->image,
        'synopsis' => $request->synopsis,
      ]);

      return redirect()->route('createBook')->with('successUpdate', "Anda berhasil memperbaharui data!");
    }
    public function destroy($id)
    {
       CreateBook::where('id', $id)->delete();
       return redirect()->route('createBook')->with('delete', 'Berhasil menghapus data!');
    }
}
