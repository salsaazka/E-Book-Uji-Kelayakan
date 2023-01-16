<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CreateBook;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        // createBook max 3 berdasarkan count_download terbnayak
        $createBook = CreateBook::orderBy('count_download', 'desc')->take(3)->get();
        return view('landing.home' , compact('createBook'));
    }
    public function register()
    {
        return view('auth.register');
    }

    public function inputRegister(Request $request)
    {
        // dd($request->all());
        // validasi atau aturan value column pada db
        $request->validate([
            'email' => 'required',
            'name' => 'required|min:4|max:50',
            'no_telp' => 'required|max:13',
            'address' => 'required',
            'password' => 'required',
        ]);
        // tambah data ke db bagian table users
        User::create([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        // apabila berhasil, bkl diarahin ke hlmn login dengan pesan success
        return redirect()->route('login')->with('success', 'berhasil membuat akun!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => "This email doesn't exists"
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            if(Auth::user()->role == 'user'){
                return redirect()->route('index')->with('success', "Welcome!");
            }else{
                return redirect()->route('adminDash');
            }
        } else {
            return redirect('/')->with('fail', "Email-Address And Password Are Wrong.");
        }
    }

    public function adminDash()
    {
         $regis = Registration::all();
         return view('admin.dashboard', compact('regis'))->with('i', (request()->input('page',1)-1));
    }

    public function adminUser()
    {
        $regis = Registration::all();
         return view('admin.user', compact('regis'));
    }

    public function logout()
    {
        Auth::logout();
        //mengarahkan ke halaman login
        return redirect('/login');
    }

    public function error(){
       return view('error');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Registration $registration)
    {
        //
    }

    public function edit($id)
    {
       $regis = Registration::where('id', $id)->first();
       return view('dashboard.edit', compact('regis'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|min:3',
        'address' => 'required',
        'email' => 'required',
        'no_telp' => 'required',
      ]);

      Registration::where('id', $id)->update([
        'name' => $request->name,
        'address' => $request->address,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
      ]);

      return redirect()->route('adminUser')->with('successUpdate', "Anda berhasil memperbaharui data!");
    }
    public function destroy($id)
    {
       Registration::where('id', $id)->delete();
       return redirect()->route('data')->with('delete', 'Berhasil menghapus data!');
    }

    public function book()
    {
        $book = CreateBook::all();
        return view('landing.book', compact('book'));
    }

    public function bookDetail($id)
    {
        $book = CreateBook::where('id', $id)->first();
        return view('landing.bookDetail', compact('book'));
    }

    public function bookDownload($id)
    {
        $book = CreateBook::where('id', $id)->first();
        $book->count_download = $book->count_download + 1;
        $book->save();
        return view('landing.bookDetail', compact('book'));
    }
}
