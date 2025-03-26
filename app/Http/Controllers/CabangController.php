<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index(){
        $cabangs = Cabang::whereHas('operator', function ($query) {
            $query->where('role', 'operator_cabang');
        })->with('operator')->get();
        
        return view('admin.cabang.index' , compact('cabangs'));
    }

    public function create(){
        $OP = User::where('role', 'operator_cabang')->get();
        return view('admin.cabang.create' , compact('OP'));
    }

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'nama_cabang' => 'required', 
            'alamat' => 'required',
            'id_operator_cabang' => 'required',
        ]);

        Cabang::create([
            'nama_cabang' => $request->nama_cabang,
            'alamat' => $request->alamat,
            'id_operator_cabang' => $request->id_operator_cabang,
        ]);

        return redirect()->route('direktur.cabang.index')->with('success', 'Cabang berhasil ditambahkan');
    }

    public function edit($id){
        $cabang = Cabang::findOrFail($id);    
        $OP = User::where('role', 'operator_cabang')->get();
        return view('admin.cabang.edit' , compact('cabang' , 'OP'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_cabang' => 'required', 
            'alamat' => 'required',
            'id_operator_cabang' => 'required',
        ]);

        $cabang = Cabang::findOrFail($id);
        $cabang->update([
            'nama_cabang' => $request->nama_cabang,
            'alamat' => $request->alamat,
            'id_operator_cabang' => $request->id_operator_cabang,
        ]);

        return redirect()->route('direktur.cabang.index')->with('success', 'Cabang berhasil diupdate');
    }

    public function destroy($id){
        $cabang = Cabang::findOrFail($id);
        $cabang->delete();
        return redirect()->route('direktur.cabang.index')->with('success', 'Cabang berhasil dihapus');
    }
}
