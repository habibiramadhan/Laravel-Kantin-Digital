@extends('layouts.admin')


@section('title', 'Kategori Makan')

@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="card">
        
          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">{{ __('Daftar Penjual Makanan') }}</h4>

             </div>
          <div class="header-action">
            <button class="btn btn-primary float-right shadow"
            data-toggle="modal" data-target="#modalTambah">
                 Tambah Penjual
            </button>  
                </div>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table id="datatable" class="table data-table table-striped table-bordered">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Penjual</th>
                        <th>Alamat</th>
                        <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($penjuals as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_penjual }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <form action="{{ route('admin.penjual.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.penjual.edit', $item->id) }}" class="btn btn-info">Edit</a>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Penjual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action={{ route('admin.penjual.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <label for="name" class="col-md-3 col-form-label">Nama Penjual</label>
                            <div class="col-md-9">
                                <input id="nama_penjual" type="text" class="form-control @error('nama_penjual') is-invalid @enderror" name="nama_penjual" value="{{ old('nama_penjual') }}" autocomplete="nama_penjual" autofocus>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>

                            <label for="exampleFormControlTextarea1">Alamat :</label>
                            <div class="col-md-9">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" autocomplete="alamat" autofocus>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
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


