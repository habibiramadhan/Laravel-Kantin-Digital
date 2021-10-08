<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barang_masuk = BarangMasuk::latest()->get();
        return view('admin.barangMasuk.index', compact('barang_masuk'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required'
        ]);
        BarangMasuk::create($request->all());
        return redirect()->route('admin.barang-masuk.index')
                    ->with('success', 'Barang masuk berhasil disimpan');
    }

    public function edit($id)
    {
        $barang_masuk = BarangMasuk::findOrFail($id);
        return view('admin.barangMasuk.edit', compact('barang_masuk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required',
        ]);
        BarangMasuk::findOrFail($id)->update($request->all());
        return redirect()->route('admin.barang-masuk.index')
                    ->with('success', 'Barang masuk berhasil di update');
    }

    public function destroy($id)
    {
        $data = BarangMasuk::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.barang-masuk.index')
                    ->with('success', 'Barang masuk berhasil dihapus');
    }
}
