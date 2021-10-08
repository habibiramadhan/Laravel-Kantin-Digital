@extends('layouts.admin')


@section('title', 'Edit Stock Barang')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ __('Edit Stock Barang') }}</h4>

                </div>
                <div class="header-action">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form method="POST" action="{{ route('admin.stok-barang.update', $stok_barang->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="stok">Edit Stok Barang :</label>
                            <input id="stok" type="number"
                                class="form-control @error('stok') is-invalid @enderror" name="stok"
                                value="{{ $stok_barang->stok }}" autocomplete="stok" autofocus>
                            @error('stok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="satuan_barang">Edit Satuan Barang :</label>
                            <select name="satuan_barang" class="form-control @error('satuan_barang') is-invalid @enderror">
                                <option disabled>PILIH</option>
                                <option value="kg">kg</option>
                                <option value="hg">hg</option>
                                <option value="dag">dag</option>
                                <option value="g">g</option>
                                <option value="dg">dg</option>
                                <option value="cg">cg</option>
                                <option value="mg">mg</option>
                            </select>
                            @error('satuan_barang')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
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
