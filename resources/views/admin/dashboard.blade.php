@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
           <div class="header-title">
              <h4 class="card-title">Basic</h4>
           </div>

        </div>
        <div class="card-body">
           <div class="collapse" id="datepicker-1">
                 <div class="card"><kbd class="bg-dark"><pre id="datepicker-basic" class="text-white"><code>
&#x3C;div class=&#x22;form-group&#x22;&#x3E;
&#x3C;label for=&#x22;exampleInputdate&#x22;&#x3E;Date Input&#x3C;/label&#x3E;
&#x3C;input type=&#x22;date&#x22; class=&#x22;form-control&#x22; id=&#x22;exampleInputdate&#x22; value=&#x22;2019-12-18&#x22;&#x3E;
&#x3C;/div&#x3E;
</code></pre></kbd></div>
              </div>
           <div class="form-group">
              <label for="exampleInputdate">Date Input</label>
              <input type="date" class="form-control" id="exampleInputdate" value="2019-12-18">
           </div>
        </div>
     </div>
</div>
@endsection
