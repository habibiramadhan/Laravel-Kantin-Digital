@extends('layouts.admin')


@section('title', 'Menu Makanan')

@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">{{ __('Daftar Menu Makanan') }}</h4>
             </div>
            <div class="header-action">
                <button class="btn btn-primary float-right shadow" data-toggle="modal" data-target="#modalTambah">
                    Tambah Menu Makanan
                </button>
            </div>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table id="datatable" class="table data-table table-striped table-bordered">
                    <thead>
                       <tr>
                         <th>No</th>
                         <th>Nama Penjual</th>
                         <th>Kategori Makanan</th>
                         <th>Nama Makanan</th>
                         <th>Harga Penjual</th>
                         <th>Harga Jual</th>
                         <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                     @foreach ($menus as $item)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $item->namaPenjual['nama_penjual'] }}</td>
                         <td>{{ $item->kategoriMakanan['nama_kategori'] }}</td>
                         <td>{{ $item->nama_makanan }}</td>
                         <td>Rp{{ number_format($item->harga_penjual, 0, ',', '.') }}</td>
                         <td>Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                         <td>
                               <form action="{{ route('admin.menu-makanan.destroy', $item->id) }}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <a href="{{ route('admin.menu-makanan.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                     <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                         </td>
                     </tr>
                 @endforeach
                    </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>

{{-- MODAL TAMBAH MENU MAKANAN --}}
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Menu Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.menu-makanan.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="nama_penjual_id" class="col-md-3 col-form-label">Nama Penjual</label>
                            <div class="col-md-9">
                                <select name="nama_penjual_id" class="form-control @error('nama_penjual_id') is-invalid @enderror">
                                        <option disabled selected>PILIH</option>
                                    @foreach($penjuals as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_penjual }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('nama_penjual_id') }}</p>
                            </div>

                            <label for="nama_kategori_id" class="col-md-3 col-form-label">Kategori Makanan</label>
                            <div class="col-md-9">
                                <select name="nama_kategori_id" class="form-control @error('nama_kategori_id') is-invalid @enderror">
                                        <option disabled selected>PILIH</option>
                                    @foreach($kategoris as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('nama_penjual_id') }}</p>
                            </div>

                            <label for="nama_makanan" class="col-md-3 col-form-label">Nama Makanan</label>
                            <div class="col-md-9">
                                <input id="nama_makanan" type="text" class="form-control @error('nama_makanan') is-invalid @enderror" name="nama_makanan" value="{{ old('nama_makanan') }}" autocomplete="nama_makanan" autofocus>

                                <p class="text-danger">{{ $errors->first('nama_makanan') }}</p>
                            </div>

                            <label for="harga_penjual" class="col-md-3 col-form-label">Harga Penjual</label>
                            <div class="col-md-9">
                                <input id="harga_penjual" type="number" class="form-control @error('harga_penjual') is-invalid @enderror" name="harga_penjual" value="{{ old('harga_penjual') }}" autocomplete="harga_penjual" autofocus>

                                <p class="text-danger">{{ $errors->first('harga_penjual') }}</p>
                            </div>

                            <label for="harga_jual" class="col-md-3 col-form-label">Harga Jual</label>
                            <div class="col-md-9">
                                <input id="harga_jual" type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" value="{{ old('harga_jual') }}" autocomplete="harga_jual" autofocus>

                                <p class="text-danger">{{ $errors->first('harga_jual') }}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Simpan') }}
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


