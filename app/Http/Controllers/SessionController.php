<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{   
    // memunculkan form 
    function index(){
        return view('sesi.index');
    }
    
    function login(Request $request){

        Session::flash('email', $request->email);
        
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email waib diisi!!',
                'password.required' => 'Password wajib diisi!!'
            ]
            );

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            // jika otentikasi berhasil
            return redirect('/pesanan')->with('success','berhasil login');
        }else{
            // jika otentikasi tidak berhasil
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid'); 
             
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/sesi')->with('success','Berhasil Logout');
    }
    
    function form_register(){
        return view('sesi.register');
    }

    function register(Request $request){
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'Name wajib diisi',
                'email.required' => 'Email waib diisi!!',
                'email.email' => 'Silahkan Masukkan email yang valid',
                'email.unique' => 'email sudah digunakan',
                'password.required' => 'Password wajib diisi!!',
                'password.min' => "minimum password 6 karakter",
            ]
            );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            // jika otentikasi berhasil
            return redirect('/pesanan')->with('success',Auth::user()->name .'berhasil login');
        }else{
            // jika otentikasi tidak berhasil
            return redirect('/sesi/form_register')->withErrors('Username dan password yang dimasukkan tidak valid'); 
             
        }
    }
    
}