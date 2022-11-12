@section('title', 'Form Produksi')
@section('formActive', 'active')
@section('formProduksiactive', 'active')
@extends('dashboard/master')
@section('content')
  <div class="content-wrapper" style="min-height: 568px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Produksi Telur</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dash/produksi_telur') }}">Forms Telur</a></li>
                <li class="breadcrumb-item active">Produksi Telur</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          @if (Session::has('success'))
              <div class="alert alert-success col-md-6 offset-md-3">
                  <button type="button" class="exit btn btn-lg text-white" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
                  {{ Session::get('success') }}
              </div>
          @endif
          @if (Session::has('pesan'))
              <div class="alert alert-danger">
                  <button type="button" class="exit btn text-white float-right" data-dismiss="alert" aria-label="Close" style="margin-top: -7px;">
                      <span aria-hidden="true">×</span>
                  </button>
                  {{ Session::get('pesan') }}
              </div>
          @endif
          @if ($errors->any())
              <div class="alert alert-danger col-md-6 offset-md-3">
                <div class="row text-center">
                  <div class="col">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                  <div class="col">
                    <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                  </div>
                </div>
              </div>
          @endif
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      @php
          $nomor=1;
          $totaltelur=1;
          $berattelur=1;
      @endphp

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <form action="{{ route('dash/insert/produksi_telur') }}" method="POST">
            @csrf
            <div class="row">
              @forelse ( $kandangs as $kandang)
              <input type="hidden" class="mb-2" name="totaltelur" value="{{ $kandang->banyak_kandang }}">
                @for($banyak = $kandang->banyak_kandang; $banyak > 0; $banyak--)
                  <div class="col-md-4 col-xs-12">
                    <!-- SELECT2 EXAMPLE1 -->
                    <div class="card card-default">
                      <div class="card-header">
                        <h3 class="card-title">Kandang {{ $nomor++ }}</h3>

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
                          <div class="col-md-10 offset-md-1">
                            <div class="container align-center">
                              <div class="mb-3">
                                <label class="form-label">Total Telur Yang di Hasilkan</label>
                                <div class="input-group">
                                  <input type="number" class="form-control" name="telur{{ $totaltelur++ }}" aria-label="Username" aria-describedby="basic-addon1">
                                  <span class="input-group-text" id="basic-addon1">Butir</span>
                                </div>
                              </div>
                              <div class="mb-1">
                                <label class="form-label">Total Berat Telur</label>
                                <div class="input-group">
                                  <input type="number" class="form-control" name="berat{{ $berattelur++ }}" aria-label="Username" aria-describedby="basic-addon1">
                                  <span class="input-group-text" id="basic-addon1">Gram</span>
                                </div>
                              </div>
                              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                            </div>
                            <!-- /.chart-responsive -->
                          </div>
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.card-body -->
                      <!-- <div class="card-footer">
                        Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                        the plugin.
                      </div> -->
                    </div>
                    <!-- /.card -->
                  </div>
                @endfor
              @empty
                  <div class="alert alert-dark d-inline-block text-center col-md-6 offset-md-3">Data Kandang Belum Dibuat. <a class="font-italic text-primary" href="{{ route('kandang') }}">(Tambah Data Kandang)</a></div>
              @endforelse
              </div>
              @php
                if(!empty($kandang->banyak_kandang)){
              @endphp
              <div class="row mb-3">
                <div class="col-md-6 offset-md-3 text-center">
                  <button type="submit" class="btn btn-primary w-75">Submit Seluruh Kandang</button>
                </div>
              </div>
              @php
                }
              @endphp

          <hr class="border border-1 border-light mt-3">

          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Produksi Telur Hari Ini</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
            
            <div class="row mb-2">
              <div class="col-md-4">
                <label class="form-label">Total Telur Seluruh Kandang</label>
                <div class="input-group">
                  <input type="number" class="form-control" name="total_telur" value="{{ $total_telur }}" readonly>
                  <span class="input-group-text" id="basic-addon1">Butir</span>
                </div>
              </div>
              <div class="col-md-4">
                <label class="form-label">Berat Telur Seluruh Kandang</label>
                <div class="input-group">
                  <input type="number" class="form-control" name="berat_total_telur" value="{{ $total_berat_telur }}" readonly>
                  <span class="input-group-text" id="basic-addon1">Gram</span>
                </div>
              </div>
            </div>
          </form>

        </div>
      </section>
      <!-- /.content -->
    </div>
@endsection