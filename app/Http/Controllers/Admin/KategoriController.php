<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Kategori::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.category.index')
                    ->with('success', 'Kategori Berhasil Disimpan');
    }

    public function edit($id)
    {
        $kategoris = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategoris'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Kategori::findOrFail($id)->update($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.category.index')
                    ->with('success', 'Kategori Berhasil Di update');
    }

    public function destroy($id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.category.index')
                    ->with('success', 'Kategoris Berhasil Dihapus');
    }
}
