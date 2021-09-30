@extends('layouts.admin')


@section('title', 'Barang Keluar')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ __('Jumlah Barang Keluar') }}</h4>

                </div>
                <div class="header-action">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form method="POST" action="{{ route('admin.stok-barang.update-stok', $barang->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            {{-- <div class="form-group">
                                <label for="nama_barang">Nama Barang :</label>
                                <input type="text" class="form-control" value="{{ $barang->stok }} {{ $barang->satuan_barang }}" readonly>
                                    @error('nama_barang')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div> --}}
                            <label for="stok_barang">Stok Barang :</label>
                            <input type="text" class="form-control" value="{{ $barang->stok }} {{ $barang->satuan_barang }}" disabled>
                                @error('stok_barang')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                              <label for="">Jumlah Barang Keluar :</label>
                              <input type="number" name="stok" id="stok" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Simpan') }}
                        </button>
                        <a href="{{ route('admin.stok-barang.index') }}" class="btn bg-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection