@extends('layouts.admin')


@section('title', 'Edit Penjualan Harian')

@section('content')
      <div class="row">
            <div class="col-sm-12">
                  <div class="card">
                        <div class="card-header d-flex justify-content-between">
                              <div class="header-title">
                                    <h4 class="card-title">{{ __('Edit Penjualan Harian') }}</h4>
                              </div>
                              <div class="header-action">
                              </div>
                        </div>
                        <div class="card-body">
                              <div class="table-responsive">
                                    <form method="POST" action="{{ route('admin.penjualan-harian.update', $penjualanHarians->id, $menus) }}">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                                <label for="menu_makanan_id">Edit Nama Makanan :</label>
                                                <select name="menu_makanan_id" class="form-control @error('menu_makanan_id') is-invalid @enderror">
                                                            <option disabled>PILIH</option>
                                                      @foreach($menus as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_makanan }}</option>
                                                      @endforeach
                                                </select>
                                                @error('menu_makanan_id')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                          <div class="form-group">
                                                <label for="harga_jual">Edit Harga Jual :</label>
                                                <select name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror">
                                                            <option disabled>PILIH</option>
                                                      @foreach($menuss as $item)
                                                            <option value="{{ $item->id }}">{{ $item->harga_jual }}</option>
                                                      @endforeach
                                                </select>
                                                @error('harga_jual')
                                                      <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                          </div>
                                          <div class="form-group">
                                                <label for="stock">Edit Stock :</label>
                                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $penjualanHarians->stock }}" autocomplete="stock" autofocus>
                                                @error('stock')
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


