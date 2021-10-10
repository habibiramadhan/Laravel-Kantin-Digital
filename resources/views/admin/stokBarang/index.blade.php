@extends('layouts.admin')


@section('title', 'Stock Barang')

@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="card">

          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">{{ __('Daftar Stock Barang') }}</h4>

             </div>
          <div class="header-action">
            <button class="btn btn-primary float-right shadow"
            data-toggle="modal" data-target="#modalTambah">
                 Tambah Stock Barang
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
                            <th>Tanggal Barang Keluar</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    @php
                        $tanggal = \App\Models\Barang::select('id', 'tanggal')->first();
                    @endphp
                    <tbody>
                        @foreach ($barang_masuk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_barang  }}</td>
                            <td>
                                <ul class="list-group">
                                    @foreach ($item->barang as $row)
                                        @if ($row->tanggal != null)
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ date('d F Y', strtotime($row->tanggal)) }}</span>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul class="list-group">
                                    @foreach ($item->barang as $row)
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <span>{{ $row->stok }} {{ $row->satuan_barang }}</span>
                                                <form action="{{ route('admin.stok-barang.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('admin.stok-barang.show', $row->id) }}" class="btn btn-info">Barang Keluar</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
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
                <h5 class="modal-title" id="modalTambahLabel">Tambah Stok Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.stok-barang.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <div class="row">

                            <label for="nama_barang" class="col-md-3 col-form-label">Nama Barang</label>
                            <div class="col-md-9">
                                <select name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
                                        <option disabled selected>PILIH</option>
                                        @foreach($barang_masuk as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                        @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('nama_barang') }}</p>
                            </div>

                            <label for="stok" class="col-md-3 col-form-label">Stok Barang</label>
                            <div class="col-md-9">
                                <input id="stok" type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" autocomplete="stok" autofocus>
                                <p class="text-danger">{{ $errors->first('stok') }}</p>
                            </div>

                            <label for="satuan_barang" class="col-md-3 col-form-label">satuan Barang</label>
                            <div class="col-md-9">
                                <select name="satuan_barang" class="form-control @error('satuan_barang') is-invalid @enderror">
                                        <option disabled selected>PILIH</option>
                                        <option value="kg">kg</option>
                                        <option value="hg">hg</option>
                                        <option value="dag">dag</option>
                                        <option value="g">g</option>
                                        <option value="dg">dg</option>
                                        <option value="cg">cg</option>
                                        <option value="mg">mg</option>
                                </select>
                                <p class="text-danger">{{ $errors->first('satuan_barang') }}</p>
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

