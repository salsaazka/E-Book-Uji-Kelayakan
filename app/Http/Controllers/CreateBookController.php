<?php

namespace App\Http\Controllers;

use App\Models\CreateBook;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Route;
use App\Exports\EbooksExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class CreateBookController extends Controller
{

    public function index()
    {
        //
    }


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
      $category = CreateBook::where('id', $id)->first();
      return redirect()->route('createBook')->with('successUpdate', "Anda berhasil memperbaharui data!");
    }

    public function destroy($id)
    {
       CreateBook::where('id', $id)->delete();
       return redirect()->route('createBook')->with('delete', 'Berhasil menghapus data!');
    }

     //Excel
     public function export()
     {
         return Excel::download(new EbooksExport, 'Data.xlsx');

     }

     
     public function bookDownload($id)
    {
        $book = CreateBook::where('id', $id)->first();
        $book->count_download = $book->count_download + 1;
        $book->save();
        $user = Auth::user()->download;
        $user = $user + 1;
        User::where('id', Auth::user()->id)->update([
            'download' => $user,
        ]);
        view()->share('book',$book);
        $pdf = PDF::loadView('user.pdf', $book->toArray());
        // return $pdf->download('Data.pdf', compact('book'));
        return view ('landing.bookDetail', compact('book'));

        // Artisan::call('cache.clear');
        // $cek = Ebooklog::where('user_id', Auth::user()->id)
        // ->wheredate('created_at', date('Y-m-d'))->get();

        // if(count($cek) >= 3){
        //     return back()->with('wrong', 'jkbadbjkhsdjaj');
        // }
        // $log = new Ebooklog;
        // $log->user_id = Auth::user()->id;
        // $log->ebook_id = $ebook_id;
        // $log->save();

    }
}
