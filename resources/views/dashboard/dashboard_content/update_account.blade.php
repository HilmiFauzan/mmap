@section('title', 'Akun')
@section('updateActive', 'bg-primary')
@extends('dashboard/master')
@section('content')
  <div class="content-wrapper" style="min-height: 568px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Update Akun-mu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Update</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 @yield('bg-email')">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-envelope"></i></span>

                <a class="info-box-content text-light" href="/dashboard/update_account">
                  <span class="info-box-text">Update Email</span>
                  <span class="info-box-number">
                    Mengubah Email
                  </span>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 @yield('bg-data-diri')">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-address-card"></i></span>

                <a class="info-box-content text-light" href="/dashboard/update_account/data-diri">
                  <span class="info-box-text">Isi Data Diri</span>
                  <span class="info-box-number">
                    Mengisi Form Diri
                  </span>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 @yield('bg-isi-alamat')">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-map-marked-alt"></i></span>

                <a class="info-box-content text-light" href="/dashboard/update_account/alamat">
                  <span class="info-box-text">Isi Alamat</span>
                  <span class="info-box-number">
                    Mengisi Form Alamat
                  </span>
                </a>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Isi Gallery</span>
                  <span class="info-box-number">
                    
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">@yield('ubah-card-header')</h5>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                
                @yield('update-content')

                <!-- ./card-body -->
                <div class="card-footer">
                  <div class="row">
                    <div class="col-6">
                      <div class="description-block border-right border-left">
                        <h5 class="description-header text-success">{{ Auth::user()->created_at }}</h5>
                        <span class="description-text">Akun Ini Dibuat Pada Tanggal</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                      <div class="description-block border-right">
                        <h5 class="description-header text-warning">{{ Auth::user()->updated_at }}</h5>
                        <span class="description-text">Akun Ini Diubah Pada Tanggal</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
        </div>
          
      </section>
      <!-- /.content -->
    </div>
@endsection