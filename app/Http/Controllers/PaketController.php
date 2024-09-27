<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    function tampil()  {
        $paket = Paket::get();
        return  view('home', compact('paket'));
    }

    function form_tambah(){
        return view('paket.form-tambah');
    } 

    function tambah(Request $request) {
        $request->validate(
            [
                'no_paket' => 'required',
                'nama_paket' => 'required',
                'harga_paket' => 'required',
            ],
            [
                'no_paket.required' => 'Silahkan isi no paket',
                'nama_paket.required' => 'Silahkan isi nama paket',
                'harga_paket.required' => 'Silahkan isi harga paket',
            ]
        );
        
        $paket = new Paket();
        $paket->no_paket = $request->no_paket;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga_paket = $request->harga_paket;
        $paket->save();

        return redirect()->route('paket.tampil');
    }

    function hapus ($id){
        $paket = Paket::find($id);
        $paket->delete();
        
        return redirect()->route('paket.tampil');         
    }

    function form_edit  ($id) {
        $paket = Paket::find($id);
        
        return view('paket.form-edit', compact('paket'));
        
    }
    
    function edit (Request $request, $id){
        $paket = Paket::find($id);
        
        $paket->no_paket = $request->no_paket;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga_paket = $request->harga_paket;
        $paket->update();

        return redirect()->route('paket.tampil');
        
    }

}