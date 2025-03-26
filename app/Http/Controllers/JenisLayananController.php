<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class JenisLayananController extends Controller
{
    public function index(){
        $jenis = JenisLayanan::get();
        return view('admin.jenis-layanan.index', compact('jenis'));
    }

    public function create(){
        return view('admin.jenis-layanan.create');
    }

    public function store(Request $request){
        JenisLayanan::create([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect()->route('operator_cabang.jenis-layanan.index')->with('success', 'Jenis Layanan Berhasil Ditambahkan');
    }

    public function edit($id){
        $jenis = JenisLayanan::findOrFail($id);
        return view('admin.jenis-layanan.edit', compact('jenis'));
    }

    public function update(Request $request, $id){
        $request->validate([
           'nama_jenis' => 'required', 
        ]);
        $jenis = JenisLayanan::findOrFail($id);
        $jenis->update([
            'nama_jenis' => $request->nama_jenis,
        ]);
        return redirect()->route('operator_cabang.jenis-layanan.index')->with('success', 'Jenis Layanan Berhasil Diubah');
    }

    public function destroy($id){
        $jenis = JenisLayanan::findOrFail($id);
        $jenis->delete();
        return redirect()->route('operator_cabang.jenis-layanan.index')->with('success', 'Jenis Layanan Berhasil Dihapus');
    }
}
