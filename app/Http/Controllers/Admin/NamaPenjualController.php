<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\NamaPenjual;
use App\Http\Controllers\Controller;

class NamaPenjualController extends Controller
{
    public function index()
    {
        $penjuals = NamaPenjual::latest()->get();
        return view('admin.dataPenjual.index', compact('penjuals'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nama_penjual' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        //fungsi eloquent untuk menambah data
        NamaPenjual::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.penjual.index')
                    ->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $penjuals = NamaPenjual::findOrFail($id);
        return view('admin.dataPenjual.edit', compact('penjuals'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'nama_penjual' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        //fungsi eloquent untuk menambah data
        NamaPenjual::findOrFail($id)->update($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.penjual.index')
                    ->with('success', 'Data Berhasil Di update');
    }

    public function destroy($id)
    {
        $data = NamaPenjual::findOrFail($id);
        $data->delete();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.penjual.index')
                    ->with('success', 'Data Berhasil Dihapus');
    }
}
