<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function tampil_pesanan() {
        $pesanan = Pesanan::with('paket')->get();
        return view('pesanan.tampil-page', compact('pesanan'));
    }

    public function form_tambah(Request $request ){
        $paket = Paket::all();        
        
        return view('pesanan.form-tambah',compact('paket'));
    }

    public function tambah (Request $request){

        // $paket = Paket::find($request->paket_id);
    
        
        $pesanan = new Pesanan();
        
        $pesanan->no_nota = $request->no_nota;
        $pesanan->pelanggan = $request->pelanggan;
        $pesanan->paket_id = $request->paket;
        $pesanan->berat = $request->berat;
        $pesanan->harga = $request->harga;
        $pesanan->total_harga = $request->total_harga;
        $pesanan->created_at = now();
        $pesanan->save();
        
        // dd("berhasil ditambahkan");
        return redirect()->route('pesanan.tampil');   
    }

    function hapus($id){
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        
        return redirect()->route('pesanan.tampil',compact('pesanan'));
    }

    function form_edit($id){
        $pesanan = Pesanan::find($id);
        $paket= Paket::all(); 
        
        return view('pesanan.form-edit',compact('pesanan','paket'));
        
    }

    function edit(Request $request, $id){
        $pesanan = Pesanan::find($id);
        
        $pesanan->no_nota = $request->no_nota;
        $pesanan->pelanggan = $request->pelanggan;
        $pesanan->paket_id = $request->paket;
        $pesanan->berat = $request->berat;
        $pesanan->harga = $request->harga;
        $pesanan->total_harga = $request->total_harga;
        $pesanan->created_at = now();
        $pesanan->update();

        return redirect()->route('pesanan.tampil');
    }

    function updateStatus (Request $request, $id){
        $status = Pesanan::find($id);
        
        $status->status = $request->status;
        $status->save();
        
        return redirect()->route('pesanan.tampil');
    }
}