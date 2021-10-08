@extends('layouts.admin')


@section('title', 'Edit Menu Makanan')

@section('content')
      <div class="row">
            <div class="col-sm-12">
                  <div class="card">
                        <div class="card-header d-flex justify-content-between">
                              <div class="header-title">
                                    <h4 class="card-title">{{ __('Edit Menu Makanan') }}</h4>
                              </div>
                              <div class="header-action">
                              </div>
                        </div>
                        <div class="card-body">
                              <div class="table-responsive">
                                    <form method="POST" action="{{ route('admin.menu-makanan.update', $menus->id, $penjuals, $menus) }}">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                                <label for="nama_penjual_id">Edit Nama Penjual :</label>
                                                <select name="nama_penjual_id" class="form-control @error('nama_penjual_id') is-invalid @enderror">
                                                      <option disabled>PILIH</option>
                                                @foreach($penjuals as $item)
                                                      <option value="{{ $item->id }}">{{ $item->nama_penjual }}</option>
                                                @endforeach
                                          </select>
                                                @error('nama_kategori')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                          <div class="form-group">
                                                <label for="nama_kategori_id">Edit Kategori Makanan :</label>
                                                <select name="nama_kategori_id" class="form-control @error('nama_kategori_id') is-invalid @enderror">
                                                      <option disabled>PILIH</option>
                                                @foreach($kategoris as $item)
                                                      <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                                @endforeach
                                          </select>
                                                @error('nama_kategori_id')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                          <div class="form-group">
                                                <label for="nama_makanan">Edit Nama Makanan :</label>
                                                <input id="nama_makanan" type="text" class="form-control @error('nama_makanan') is-invalid @enderror" name="nama_makanan" value="{{ $menus->nama_makanan }}" autocomplete="nama_makanan" autofocus>
                                                @error('nama_makanan')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                          <div class="form-group">
                                                <label for="harga_penjual">Edit Harga Penjual :</label>
                                                <input id="harga_penjual" type="number" class="form-control @error('harga_penjual') is-invalid @enderror" name="harga_penjual" value="{{ $menus->harga_penjual }}" autocomplete="harga_penjual" autofocus>
                                                @error('harga_penjual')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                          <div class="form-group">
                                                <label for="harga_jual">Edit Harga Jual :</label>
                                                <input id="harga_jual" type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" value="{{ $menus->harga_jual }}" autocomplete="harga_jual" autofocus>
                                                @error('harga_jual')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                          <button type="submit" class="btn btn-primary">
                                          {{ __('Update') }}
                                          </button>
                                          <button type="submit" class="btn bg-danger">Cancel</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

@endsection


