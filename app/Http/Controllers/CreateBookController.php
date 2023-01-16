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
    public function create()
    {
       return view('admin.create');
    }


    public function store(Request $request, CreateBook $createBook)
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
            'no' => $request->image,
            'synopsis' => $request->synopsis,
        ]);

        return redirect()->route('adminDash')->with('success', 'berhasil membuat akun!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreateBook  $createBook
     * @return \Illuminate\Http\Response
     */
    public function show(CreateBook $createBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreateBook  $createBook
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateBook $createBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreateBook  $createBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreateBook $createBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreateBook  $createBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreateBook $createBook)
    {
        //
    }
}
