<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuMakanan;
use App\Models\Kategori;
use App\Models\NamaPenjual;

class MenuMakananController extends Controller
{
    public function index()
    {
        $menus = MenuMakanan::with('namaPenjual', 'kategoriMakanan')->latest()->get();
        $penjuals = NamaPenjual::orderBy('nama_penjual', 'ASC')->get();
        $kategoris = Kategori::orderBy('nama_kategori', 'ASC')->get();
        return view('admin.menuMakanan.index', compact('menus', 'penjuals', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::latest()->get();
        $penjuals = NamaPenjual::latest()->get();
        return view('admin.menuMakanan.index', compact('kategoris', 'penjuals'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nama_penjual_id' => 'required',
            'nama_kategori_id' => 'required',
            'nama_makanan' => 'required',
            'harga_penjual' => 'required',
            'harga_jual' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        MenuMakanan::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.menu-makanan.index')
                    ->with('success', 'Menu Makanan Berhasil Disimpan');
    }

    public function edit($id)
    {
        
        $menus = MenuMakanan::findOrFail($id);
        $hargaPenj = number_format($menus->harga_penjual, 0, ',', '.');
        $hargaJual = number_format($menus->harga_jual, 0,',', '.');
        $menus->harga_penjual = $hargaPenj;
        $menus->harga_jual = $hargaJual;
        
        $penjuals = NamaPenjual::orderBy('nama_penjual', 'ASC')->get();
        $kategoris = Kategori::orderBy('nama_kategori', 'ASC')->get();
        
        return view('admin.menuMakanan.edit', compact('menus', 'kategoris', 'penjuals'));
    }

    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'nama_penjual_id' => 'required',
            'nama_kategori_id' => 'required',
            'nama_makanan' => 'required',
            'harga_penjual' => 'required',
            'harga_jual' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        MenuMakanan::findOrFail($id)->update($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.menu-makanan.index')
                    ->with('success', 'Menu Makanan Berhasil Di update');
    }

    public function destroy($id)
    {
        $data = MenuMakanan::findOrFail($id);
        $data->delete();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.menu-makanan.index')
                    ->with('success', 'Menu Makanan Berhasil Dihapus');
    }
}
