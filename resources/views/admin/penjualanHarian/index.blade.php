@extends('layouts.admin')


@section('title', 'Penjualan Harian')

@section('content')
<div class="row">
      <div class="col-sm-12">
            <div class="card">
                  <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                              <h4 class="card-title">{{ __('Daftar Penjual Harian') }}</h4>
                        </div>
                        <div class="header-action">
                              <button class="btn btn-primary float-right shadow" data-toggle="modal" data-target="#modalTambah">
                                    Tambah Penjual Harian
                              </button>
                        </div>
                  </div>
                  <div class="card-body">
                        <div class="table-responsive">
                              <table id="datatable" class="table data-table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                          <th>No</th>
                                          <th>Nama Makanan</th>
                                          <th>Harga Jual</th>
                                          <th>Stock</th>
                                          <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($penjualanHarians as $item)
                                    <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $item->namaMakanan['nama_makanan'] }}</td>
                                          <td>Rp{{ number_format($item->hargaJual['harga_jual'], 0, ',', '.') }}</td>
                                          <td>{{ $item->stock }}</td>
                                          <td>
                                          <form action="{{ route('admin.penjualan-harian.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.penjualan-harian.edit', $item->id) }}" class="btn btn-info">Edit</a>
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

{{-- MODAL TAMBAH KATEGORI --}}
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Penjualan Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.penjualan-harian.store') }}">
                  @csrf
                  <div class="modal-body">
                        <div class="col-md-12 mt-2">
                              <div class="row">
                                    <label for="menu_makanan_id" class="col-md-3 col-form-label">Nama Makanan</label>
                                    <div class="col-md-9">
                                          <select name="menu_makanan_id" class="form-control @error('menu_makanan_id') is-invalid @enderror">
                                                <option disabled selected>PILIH</option>
                                                @foreach($menus as $item)
                                                      <option value="{{ $item->id }}">{{ $item->nama_makanan }}</option>
                                                @endforeach
                                          </select>
                                          <p class="text-danger">{{ $errors->first('menu_makanan_id') }}</p>
                                    </div>
                                    <label for="harga_jual" class="col-md-3 col-form-label">Harga Jual</label>
                                    <div class="col-md-9">
                                          <select name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror">
                                                <option disabled selected>PILIH</option>
                                                @foreach($menuss as $item)
                                                      <option value="{{ $item->id }}">Rp{{ number_format($item->harga_jual, 0, ',', '.') }}</option>
                                                @endforeach
                                          </select>
                                          <p class="text-danger">{{ $errors->first('harga_jual') }}</p>
                                    </div>
                                    <label for="stock" class="col-md-3 col-form-label">Stock</label>
                                    <div class="col-md-9">
                                          <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" autocomplete="stock" autofocus>

                                          <p class="text-danger">{{ $errors->first('stock') }}</p>
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

