@extends('layouts.admin.app')

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
                 Tambah Menu Makanan
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
                        <th>Kategori Makanan</th>
                        <th>Nama Makanan</th>
                        <th>Harga Penjual</th>
                        <th>Harga Jual</th>
                        <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                  
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                    </tr>    
               
                   </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>

@endsection