@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('admin.penjual.create') }}" class="btn btn-primary">Tambah Nama Penjual</a>
            <div class="card mt-3">
                <div class="card-header">{{ __('Data Penjual') }}</div>
                
                <div class="card-body">
                    <table class="table table-hover">
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
@endsection
