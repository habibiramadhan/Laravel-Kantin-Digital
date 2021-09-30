@extends('layouts.login-layout')

@section('content')
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->

<div class="wrapper">
<section class="login-content">
   <div class="container h-100">
      <div class="row align-items-center justify-content-center h-100">
         <div class="col-md-5">
            <div class="card">
               <div class="card-body">
                  <div class="auth-logo">
                     <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid rounded-normal" alt="logo">
                  </div>
                  {{-- <h2 class="mb-2 text-center">Login Katin Digital</h2> --}}
                  <p class="text-center">Agar tetap terhubung dengan kami, harap masuk dengan info pribadi Anda.</p>
                  <form method="POST" action="{{ route('login') }}">
                @csrf
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email"  placeholder="Email Address">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label>Password</label>
                              <input class="form-control" name="password" type="password" autocomplete="current-password" placeholder="Password">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="custom-control custom-checkbox mb-3">
                              <input type="checkbox" class="custom-control-input" id="customCheck1">
                              <label class="custom-control-label" for="customCheck1">Ingat saya</label>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <a href="{{ route('password.request') }}" class="text-primary float-right">Lupa Password?</a>
                        </div>
                     </div>
                     <div class="d-flex justify-content-between align-items-center">
                        <span><a href="auth-sign-up.html" class="text-primary">Daftar Akun</a></span>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>

@endsection
