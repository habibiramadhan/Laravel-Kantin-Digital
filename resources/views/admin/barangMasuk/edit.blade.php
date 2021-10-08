@extends('layouts.admin')


@section('title', 'Edit Barang Masuk')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ __('Edit Barang Masuk') }}</h4>

                </div>
                <div class="header-action">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form method="POST" action="{{ route('admin.barang-masuk.update', $barang_masuk->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_barang">Edit Nama Barang :</label>
                            <input id="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ $barang_masuk->nama_barang }}" autocomplete="nama_barang" autofocus>
                            @error('nama_barang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">Edit Tanggal :</label>
                            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ $barang_masuk->tanggal }}" autocomplete="tanggal" autofocus>
                            @error('tanggal')
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
</div>

@endsection
