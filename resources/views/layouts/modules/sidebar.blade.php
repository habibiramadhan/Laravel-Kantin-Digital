<!-- strat sidebar -->
<div class="mm-sidebar  sidebar-default ">
    <div class="mm-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{route('admin.home')}}" class="header-logo">
            <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
            <img src="../assets/images/white-logo.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
        </a>
        <div class="side-menu-bt-sidebar">
            <i class="ri-menu-line wrapper-menu "></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="mm-sidebar-menu">
            {{-- add side-menu --}}
            <ul id="mm-sidebar-toggle" class="side-menu ">
                <li class="active">
                    <a href="{{route('admin.home')}}" class="svg-icon">
                        <i class="">
                            <svg class="svg-icon" id="mm-dash-1" width="20" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </i>
                        <span>Dashboard 1</span>
                    </a>
                </li>
            {{-- end-sidemenu --}}
            </ul>
        </nav>
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">
            <div class="card bg-primary rounded">
                <div class="card-body">
                    <div class="sidebarbottom-content">
                        <div class="image">
                            <img src="../assets/images/layouts/layout-1/side-bkg.png" class="img-fluid"
                                alt="side-bkg" />
                        </div>
                        <h5 class="mb-3 text-white mt-3">Tahukah kamu ?</h5>
                        <p class="mb-0 text-white">Anda dapat menambahkan pengguna tambahan di Pengaturan Akun Anda</p>
                        <button type="button" class="btn btn-dark mt-3">
                            Program Baru
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5 pb-2"></div>
    </div>
</div>
<!-- end-Sidebar -->
