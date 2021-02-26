{{-- @extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Update Category') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('admin.category.update', $kategoris->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="nama_kategori" class="col-md-3 col-form-label text-md-right">{{ __('Nama Kategori') }}</label>
            <div class="col-md-8">
                <input id="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                    name="nama_kategori" value="{{ $kategoris->nama_kategori }}" autocomplete="nama_kategori" autofocus>
                @error('nama_kategori')
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
</div> --}}

@extends('layouts.admin')


@section('title', 'Edit Kategori Makan')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ __('Edit Kategori Makanan') }}</h4>

                </div>
                <div class="header-action">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form method="POST" action="{{ route('admin.category.update', $kategoris->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Edit Kategori Makanan:</label>
                            <input id="nama_kategori" type="text"
                                class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori"
                                value="{{ $kategoris->nama_kategori }}" autocomplete="nama_kategori" autofocus>
                            @error('nama_kategori')
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


