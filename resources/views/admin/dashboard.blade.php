@extends('layouts.admin')


@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
           <div class="header-title">
              <h4 class="card-title">{{ $greeting }} !</h4>
           </div>

        </div>
        <div class="card-body">
           <div class="form-group">
              <p class="card-text">Segala aktivitas yang Anda lakukan di area ini menjadi tanggung jawab anda sepenuhnya. Silahkan lakukan dengan teliti dan benar.</p>
           </div>
        </div>
     </div>
</div>
@endsection
