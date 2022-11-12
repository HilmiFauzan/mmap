@section('title', 'Home')
@section('dashboardActive', 'active')
@extends('dashboard/master_customer')
@section('content')
@php
  //dump($harga_telur);
@endphp

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Halaman Utama</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Produksi Telur Hari Ini</span>
                  <span class="info-box-number">
                    {{ $telurs }}
                    <small>Butir</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pager"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Kandang</span>
                  <span class="info-box-number">{{ $kandang }}
                    <small>Kandang</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-ol"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Jenis Telur</span>
                  <span class="info-box-number">{{ $total_telur }}
                    <small>Telur</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Harga Telur Terbaik</span>
                  <span class="info-box-number">
                    @if(!$harga_telur)
                      {{ $harga_telur[0]->harga_telur }}
                    @else
                      Harga Masih Kosong
                    @endif
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
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-title text-bold text-lg">Telur Kualitas 1</div>

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
                <div class="card-body">
                  <div class="row">
                    <img class="img-fluid" src="../img/telur-terbaik.jpg" alt="Photo" style="object-fit: fill;">
                    <div class="text-lg">
                      <p class="mt-3">
                        <strong class="description-header">
                          @if(!$harga_telur)
                            {{ $harga_telur[0]->jenis_kualitas_telur }}
                          @endif
                        </strong>
                      </p>
                    </div>
                    <div class="col-md-12">
                      Telur Ini merupakan telur dengan berat lebih dari 50 gram.
                    </div>
                  </div>
                </div>

                  <div class="card-footer">
                    <div class="row text-lg">
                      <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-success">Harga</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <div class="col-sm-8 col-6">
                        <div class="description-block">
                          <span class="description-percentage">
                            <strong>
                              @if(!$harga_telur)
                                {{ $harga_telur[0]->harga_telur }}
                              @endif
                            </strong>
                          </span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-footer -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-title text-bold text-lg">Telur Kualitas 2</div>

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
                <div class="card-body">
                  <div class="row">
                    <img class="img-fluid" src="../img/telur-sedang-750-500.jpg" alt="Photo">
                    <div class="text-lg" style="object-fit: fill;">
                      <p class="mt-3">
                        <strong class="description-header">
                          @if(!$harga_telur)
                            {{ $harga_telur[1]->jenis_kualitas_telur }}
                          @endif
                        </strong>
                      </p>
                    </div>
                    <div class="col-md-12">
                      Telur Ini merupakan telur yang memiliki rentang berat dari 45 sampai 50 gram.
                    </div>
                  </div>
                </div>

                  <div class="card-footer">
                    <div class="row text-lg">
                      <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-success">Harga</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <div class="col-sm-8 col-6">
                        <div class="description-block">
                          <span class="description-percentage">
                            <strong>
                              @if(!$harga_telur)
                                {{ $harga_telur[1]->harga_telur }}
                              @endif
                            </strong>
                          </span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-footer -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-title text-bold text-lg">Telur Kualitas 3</div>

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
                <div class="card-body">
                  <div class="row">
                    <img class="img-fluid" src="../img/telur-750-500.jpg" alt="Photo" style="object-fit: fill;">
                    <div class="text-lg">
                      <p class="mt-3">
                        <strong class="description-header">
                          @if(!$harga_telur)
                            {{ $harga_telur[2]->jenis_kualitas_telur }}
                          @endif
                        </strong>
                      </p>
                    </div>
                    <div class="col-md-12">
                      Telur Ini merupakan telur dengan berat kurang dari 45 gram.
                    </div>
                  </div>
                </div>

                  <div class="card-footer">
                    <div class="row text-lg">
                      <div class="col-sm-4 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-success">Harga</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <div class="col-sm-8 col-6">
                        <div class="description-block">
                          <span class="description-percentage">
                            <strong>
                              @if(!$harga_telur)
                                {{ $harga_telur[2]->harga_telur }}
                              @endif
                            </strong>
                          </span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-footer -->
              </div>
            </div>
          </div>
          
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
@endsection