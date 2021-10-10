@extends('layouts.admin')


@section('title', 'Barang Masuk')

@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="card">

          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">{{ __('Daftar Barang Masuk') }}</h4>

             </div>
          <div class="header-action">
            <button class="btn btn-primary float-right shadow"
            data-toggle="modal" data-target="#modalTambah">
                 Tambah Barang Masuk
            </button>
                </div>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table id="datatable" class="table data-table table-striped table-bordered">
                   <thead>
                      <tr>
                         <th>No</th>
                         <th>Nama Barang</th>
                         <th>Tanggal</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($barang_masuk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                        <td>
                            <form action="{{ route('admin.barang-masuk.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.barang-masuk.edit', $item->id) }}" class="btn btn-info">Edit</a>
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
                <h5 class="modal-title" id="modalTambahLabel">Tambah Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.barang-masuk.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="nama_barang" class="col-md-3 col-form-label">Nama Barang</label>
                            <div class="col-md-9">
                                <input id="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" autocomplete="nama_barang" autofocus>
                                <p class="text-danger">{{ $errors->first('nama_barang') }}</p>
                            </div>

                            <label for="tanggal" class="col-md-3 col-form-label">Tanggal</label>
                            <div class="col-md-9">
                                <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" autocomplete="tanggal" autofocus>
                                <p class="text-danger">{{ $errors->first('tanggal') }}</p>
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

