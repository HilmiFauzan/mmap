<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="http://web_ayam_petelur.test/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;">
      <span class="brand-text font-weight-white">MMAP</span>
    </a>

    <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 mb-2 d-flex @yield('updateActive') rounded">
        <div class="image pt-2">
          <a href="{{ route('update_account_form') }}">
            <img src="{{ url('storage/'.Auth::user()->file) }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}" style="height: 35px;">
          </a>
        </div>
        <div class="info">
          <a href="{{ route('update_account_form') }}">
            <b class="d-block">{{ Auth::user()->name }} {{ Auth::user()->name_end }}</b>
          </a>
          <div class="text-muted">{{ Auth::user()->hak_akses }}</div>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
        <div class="sidebar-search-results">
          <div class="list-group"><a href="#" class="list-group-item">
            <div class="search-title">
              <strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong>
            </div>
            <div class="search-path"></div>
          </a>
        </div>
      </div>
      </div>

      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard/master') }}" class="nav-link @yield('dashboardActive')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link @yield('GrafikActive')">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Grafik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dash/grafik_produksi_telur') }}" class="nav-link @yield('formGrafikProduksiActive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produksi Telur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dash/grafik_harga_telur') }}" class="nav-link @yield('formGrafikHargaActive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kualitas Telur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dash/grafik_pelanggan') }}" class="nav-link @yield('formGrafikPelangganActive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendataan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link @yield('formActive')">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms Telur
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dash/produksi_telur') }}" class="nav-link @yield('formProduksiactive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produksi Telur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dash/form_jenis_telur') }}" class="nav-link @yield('formJenisactive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kualitas Telur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dash/view_total_berat_telur') }}" class="nav-link @yield('formViewTotalBeratactive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Total Data Telur</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link @yield('RekapActive')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Rekapitulasi Penjualan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dash/penjualan') }}" class="nav-link @yield('InputPenjualanActive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dash/view_penjualan') }}" class="nav-link @yield('ViewPenjualanActive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Penjualan (Edit)</p>
                </a>
              </li>
            </ul>


          </li>

          <li class="nav-item">
            <a href="#" class="nav-link @yield('kandang&hargaActive')">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Kandang & Harga
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kandang') }}" class="nav-link @yield('formKandangActive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Form Tambah Kandang
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dash/harga_telur') }}" class="nav-link @yield('formHargaActive')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Harga Telur
                  </p>
                </a>
              </li>
            </ul>
          </li>
        
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
  </div>
    <!-- /.sidebar -->
</aside>
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
<!-- /.control-sidebar -->