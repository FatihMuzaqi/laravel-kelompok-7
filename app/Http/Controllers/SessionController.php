<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\kategori;
use Illuminate\View\View;
use App\Models\Post;



class SessionController extends Controller
{
    function dasbord(){
        return view("sesi/dasbord");
    }

    function login(Request $request){
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi',
        ]);
        $infologin = [
            'email' =>$request->email,
            'password' =>$request->password
        ];

        if(Auth::attempt($infologin)){
            //Kalau otentifiikasi sukses
            return redirect('warna')->with('success', Auth::user()->name. ' Berhasil login');
        }else{
            return redirect('sesi')->withErrors('Email dan password tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil logout');
    }

    function register(){
        return view('sesi/register');
    }

    function create(Request $request){
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
        ],[
            'name.required'=>'Nama wajib di isi',
            'email.required'=>'Email wajib di isi',
            'email.email'=>'Silahkan masukan email yang valid',
            'email.unique'=>'Email sudah pernah di gunakan, silahkan pilih email yang lain',
            'password.required'=>'Password wajib di isi',
            'password.min'=>'Password minimal 8 karakter',
            'password.confirmed'=>'Password Tidak Sesuai',
        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password
        )];
        User::create($data);

        $infologin = [
            'email' =>$request->email,
            'password' =>$request->password
        ];

        if(Auth::attempt($infologin)){
            //Kalau otentifiikasi sukses
            return redirect('')->with('success', Auth::user()->name. ' Berhasil Register');
        }else{
            return redirect('sesi')->withErrors('Email dan password tidak valid');
        }
    }

public function pencarian_warna(Request $request){
    //  $kat = kategori::all();
     $pencarian_warna = $request->input('pencarian_warna');
     $kategori = DB::table('warnas')
         ->join('kategori', 'warnas.id_kategori', '=', 'kategori.id')
         ->select('kategori.kategori', 'kategori.id')
         ->where('warnas.id_kategori', '=', $pencarian_warna)
         ->get();

     return view('kategori', compact('kategori'));
 }
}
