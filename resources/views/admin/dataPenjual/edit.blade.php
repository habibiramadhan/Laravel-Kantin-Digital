@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Update Data Penjual') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.penjual.update', $penjuals->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nama_penjual" class="col-md-3 col-form-label text-md-right">{{ __('Nama Penjual') }}</label>
                            <div class="col-md-8">
                                <input id="nama_penjual" type="text" class="form-control @error('nama_penjual') is-invalid @enderror" name="nama_penjual" value="{{ $penjuals->nama_penjual }}" autocomplete="nama_penjual" autofocus>
                                @error('nama_penjual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-3 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-8">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $penjuals->alamat }}" autocomplete="alamat" autofocus>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
