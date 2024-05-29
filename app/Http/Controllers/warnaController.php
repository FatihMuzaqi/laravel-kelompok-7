<?php

namespace App\Http\Controllers;
use App\Models\warna;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\kategori;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class warnaController extends Controller
{
    
    public function index(Request $request)
    {
        $kat = kategori::all();
        $data = warna::with('kategorii');
        $idWarna = DB::table('kategori')->get();
        $katakunci = $request->katakunci;
        $jumlahbaris = 7;
        $data = warna::orderBy('kode_warna','desc')->paginate($jumlahbaris);
        if(strlen($katakunci)){
            $data = warna::where('kode_warna','like',"%$katakunci%")
                ->orWhere('nama_warna','like',"%$katakunci%")
                ->orWhere('nilai_rgb','like',"%$katakunci")
                ->orWhere('nilai_hex','like',"%$katakunci")
                ->paginate($jumlahbaris);
        }else{
            $data = warna::orderBy('kode_warna','desc')->paginate($jumlahbaris);
        }
        
        // // return view('index')->with('data', $data);
        return view('index', compact('data', 'idWarna','kat'));
    }
    
public function pencarian(Request $request){
    // $katakunci = $request->katakunci;
    //     $jumlahbaris = 6;
    //     if(strlen($katakunci)){
    //         $data = warna::where('kode_warna','like',"%$katakunci%")
    //             ->orWhere('nama_warna','like',"%$katakunci%")
    //             ->orWhere('nilai_rgb','like',"%$katakunci")
    //             ->orWhere('nilai_hex','like',"%$katakunci")
    //             ->paginate($jumlahbaris);
    //     }else{
    //         $data = warna::orderBy('kode_warna','desc')->paginate($jumlahbaris);
    //     }
        
        // return view('index')->with('data', $data);
        // return view('index', compact('data', 'idWarna','kat'));
}

function detail($id){
    return 123;
}

    
    public function create()
    {
        $kat = kategori::all();
        return view('create', compact('kat'));
    }

    public function store(Request $request)
    {
        FacadesSession::flash('kode_warna',$request->kode_warna);
        FacadesSession::flash('nama_warna',$request->nama_warna);
        FacadesSession::flash('deskripsi',$request->deskripsi);
        FacadesSession::flash('nilai_rgb',$request->nilai_rgb);
        FacadesSession::flash('nilai_hex',$request->nilai_hex);

        $request->validate([
            'kode_warna'=>'required|numeric|unique:warnas,kode_warna',
            'nama_warna'=>'required',
            'deskripsi'=>'required',
            'nilai_rgb'=>'required',
            'nilai_hex'=>'required',
        ],[
            'kode_warna.required'=>'kode warna wajib di isi',
            'kode_warna.numeric'=>'kode warna wajib dalam angka',
            'kode_warna.unique'=>'kode warna yang di isi sudah ada',
            'nama_warna.required'=>'Nama warna wajib di isi',
            'deskripsi.required'=>'Deskripsi wajib di isi',
            'nilai_rgb.required'=>'Nilai RGB wajib di isi',
            'nilai_hex.required'=>'Nilai HEX wajib di isi',
        ]);
        $data = [
            'kode_warna'=> $request-> kode_warna,
            'nama_warna'=> $request-> nama_warna,
            'id_kategori'=> $request-> id_kategori,
            'deskripsi'=> $request-> deskripsi,
            'nilai_rgb'=> $request-> nilai_rgb,
            'nilai_hex'=> $request-> nilai_hex,
        ];
        warna::create($data);
        return redirect()->to('warna')->with('success','Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $data = warna::where('kode_warna', $id)->first();
        return view('show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kat = kategori::all();
        $data = warna::where('kode_warna', $id)->with('kategorii')->first();
        
        
        // return view('edit')->with('data' , $data);
        return view('edit', compact( 'data','kat','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'nama_warna'=>'required',
            'deskripsi'=>'required',
            'nilai_rgb'=>'required',
            'nilai_hex'=>'required',
        ],[
            
            'nama_warna.required'=>'Nama warna wajib di isi',
            'deskripsi.required'=>'Deskripsi wajib di isi',
            'nilai_rgb.required'=>'Nilai RGB wajib di isi',
            'nilai_hex.required'=>'Nilai HEX wajib di isi',
        ]);
        $data = [
            
            'nama_warna'=> $request-> nama_warna,
            'id_kategori'=> $request-> id_kategori,
            'deskripsi'=> $request-> deskripsi,
            'nilai_rgb'=> $request-> nilai_rgb,
            'nilai_hex'=> $request-> nilai_hex,
        ];
        warna::where('kode_warna', $id)->update($data);
        return redirect()->to('warna')->with('success','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        warna::where('kode_warna', $id)->delete();
        return redirect()->to('warna')->with('success','Berhasil Melakukan Delete Data');
    }

    public function cetak_pdf()
    {
    	$kategori =warna::all();
    	$pdf = PDF::loadview('kategori_pdf',['kategori'=>$kategori]);
    	return $pdf->stream();
    }
}