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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
