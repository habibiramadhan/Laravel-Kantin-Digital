<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuMakanan;
use App\Models\NamaPenjual;
use App\Models\PenjualanHarian;
use Illuminate\Http\Request;

class PenjualanHarianController extends Controller
{
    public function index()
    {
        $penjualanHarians = PenjualanHarian::with('menuMakanan')->latest()->get();
        $menus = MenuMakanan::orderBy('nama_makanan', 'ASC')->get();
        return view('admin.penjualanHarian.index', compact('penjualanHarians', 'menus'));
    }

    public function create()
    {
        $menus = MenuMakanan::latest()->get();
        return view('admin.penjualanHarian.index', compact('penjualanHarians', 'menus'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
