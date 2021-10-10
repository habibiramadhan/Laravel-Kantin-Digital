<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang_masuk = BarangMasuk::orderBy('nama_barang', 'ASC')->get();
        return view('admin.stokBarang.index', compact('barang_masuk'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'stok' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Barang::create($request->all());

        \Session::flash('sukses', 'Stok Barang Berhasil Disimpan');
        return redirect()->route('admin.stok-barang.index');
    }

    public function edit($id)
    {
        $stok_barang = Barang::findOrFail($id);
        return view('admin.stokBarang.edit', compact('stok_barang'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'satuan_barang' => 'required',
            'stok' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Barang::findOrFail($id)->update($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.stok-barang.index')
                    ->with('success', 'Stok Barang Berhasil Di update');
    }

    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.stok-barang.index')
                    ->with('success', 'Stok Barang Berhasil Dihapus');
    }

    public function show($id)
    {
        return view('admin.stokBarang.show', [
            'barang' => Barang::findOrFail($id),
            'barang_masuk' => BarangMasuk::findOrFail($id)
        ]);
    }

    public function updateStok(Request $request, $id)
    {
        $request->validate([
            // 'nama_barang' => 'required',
            'stok' => 'required',
            'tanggal' => 'required',
        ]);

        $barang = Barang::where('id', $request->id)->first();
        $barang->stok = $barang->stok - $request->stok;
        $barang->tanggal = $request->tanggal;
        $barang->update();
        return redirect()->route('admin.stok-barang.index')->with('success', 'Barang berhasil keluar');
    }
}
