<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuMakanan;
use App\Models\PenjualanHarian;
use Illuminate\Http\Request;

class PenjualanHarianController extends Controller
{
    public function index()
    {
        $penjualanHarians = PenjualanHarian::with('namaMakanan', 'hargaJual')->latest()->get();
        $menus = MenuMakanan::orderBy('nama_makanan', 'ASC')->get();
        $menuss = MenuMakanan::orderBy('harga_jual', 'ASC')->get();
        return view('admin.penjualanHarian.index', compact('penjualanHarians', 'menus', 'menuss'));
    }

    public function create()
    {
        $menus = MenuMakanan::latest()->get();
        return view('admin.penjualanHarian.index', compact('penjualanHarians', 'menus'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'menu_makanan_id' => 'required',
            'harga_jual' => 'required',
            'stock' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        PenjualanHarian::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.penjualan-harian.index')->with('success', 'Penjualan Harian Berhasil Disimpan');
    }

    public function edit($id)
    {
        $penjualanHarians = PenjualanHarian::findOrFail($id);
        $menus = MenuMakanan::orderBy('nama_makanan', 'ASC')->get();
        $menuss = MenuMakanan::orderBy('harga_jual', 'ASC')->get();
        return view('admin.penjualanHarian.edit', compact('penjualanHarians', 'menus', 'menuss'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_makanan_id' => 'required',
            'harga_jual' => 'required',
            'stock' => 'required',
        ]);
        PenjualanHarian::findOrFail($id)->update($request->all());
        return redirect()->route('admin.penjualan-harian.index')->with('success', 'Penjualan Harian Berhasil Di update');
    }

    public function destroy($id)
    {
        $data = PenjualanHarian::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.penjualan-harian.index')->with('success', 'Data Berhasil Dihapus');
    }
}
