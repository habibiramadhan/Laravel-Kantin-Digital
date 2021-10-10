@extends('layouts.admin')


@section('title', 'Barang Keluar')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ __('Barang Keluar') }}</h4>

                </div>
                <div class="header-action">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form method="POST" action="{{ route('admin.stok-barang.update-stok', $barang->id, $barang_masuk->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang :</label>
                            <input type="text" class="form-control" value="{{ $barang_masuk->nama_barang }}" disabled>
                            @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok_barang">Stok Barang :</label>
                            <input type="text" class="form-control" value="{{ $barang->stok }} {{ $barang->satuan_barang }}" disabled>
                            @error('stok_barang')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="stok">Jumlah Barang Keluar :</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="stok" placeholder="Jumlah Barang Keluar" aria-label="Jumlah Barang Keluar" aria-describedby="jumlah-barang-keluar">
                            <div class="input-group-append">
                                <span class="input-group-text" id="jumlah-barang-keluar">{{ $barang->satuan_barang }}</span>
                            </div>
                            @error('stok')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" name="tanggal" required>
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
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
