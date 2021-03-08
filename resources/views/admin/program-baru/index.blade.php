@extends('layouts.admin')


@section('title', 'Menu Makanan')

@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="card">
        
          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">{{ __('Daftar Menu Makanan') }}</h4>

             </div>
          <div class="header-action">
            <button class="btn btn-primary float-right shadow"
            data-toggle="modal" data-target="#modalTambah">
                 Tambah Pengguna Baru
            </button>  
                </div>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table id="datatable" class="table data-table table-striped table-bordered">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Pengguna</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->photo }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                              {{-- <form action="{{ route('admin.menu-makanan.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.menu-makanan.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                              </form> --}}
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


@endsection


