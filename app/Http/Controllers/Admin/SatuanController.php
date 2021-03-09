<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuans = Satuan::latest()->get();
        return view('admin.satuan.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Satuan::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.satuan-barang.index')
                    ->with('success', 'Satuan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $satuans = Satuan::findOrFail($id);
        return view('admin.satuan.edit', compact('satuans')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan , $id)
    {
       //melakukan validasi data
       $request->validate([
        'name' => 'required',
    ]);
    //fungsi eloquent untuk menambah data
    Satuan::findOrFail($id)->update($request->all());
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('admin.satuan-barang.index')
                ->with('success', 'Satuan Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Satuan::findOrFail($id);
        $data->delete();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.satuan-barang.index')
                    ->with('success', 'Satuan Berhasil Dihapus');
    }
}
