@section('title', 'Form Kualitas Telur')
@section('formActive', 'active')
@section('formJenisactive', 'active')
@extends('dashboard/master')
@section('content')
  <div class="content-wrapper" style="min-height: 568px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-3">
              <h1 class="m-0">Kulitas Telur</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <div class="row">
                <div class="col">
                  <label class="form-label">Total Telur</label>
                  <input type="" class="form-control" value="{{ $total_telur }}" readonly>
                </div>
                <div class="col">
                  <label class="form-label">Total Berat Telur</label>
                  <input type="" class="form-control" value="{{ $total_berat_telur }}" readonly>
                </div>
              </div>
            </div>
            <div class="col-sm-3">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Forms Telur</a></li>
                <li class="breadcrumb-item active">Jenis Telur</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      @if (Session::has('success'))
          <div class="alert alert-success col-md-6 offset-md-3">
              <button type="button" class="exit btn btn-lg text-white" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              {{ Session::get('success') }}
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
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

            <div class="row">
              <div class="col">
                <!-- SELECT2 EXAMPLE 2 -->

                @if($total_telur != 0 && $total_berat_telur != 0)
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Telur Seluruh Kandang</h3>
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
                      <form action="{{ route('dash/insert/form_jenis_telur') }}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col">
                            <label class="form-label">Telur Terbaik (65 - 50 gram)</label>
                            <div class="input-group">
                              <input type="text" class="form-control" name="telur1" value="0" required>
                              <span class="input-group-text" id="basic-addon1">Butir</span>
                            </div>
                            <label class="form-label">Berat</label>
                            <div class="input-group">
                              <input type="text" class="form-control" name="berat1" value="0" required>
                              <span class="input-group-text" id="basic-addon1">Gram</span>
                            </div>
                          </div>
                          <div class="vr border"></div>
                          <div class="col">
                            <label class="form-label">Telur Sedang (50 - 45 gram)</label>
                            <div class="input-group">
                              <input type="text" class="form-control" name="telur2" value="0" required>
                              <span class="input-group-text" id="basic-addon1">Butir</span>
                            </div>
                            <label class="form-label">Berat</label>
                            <div class="input-group">
                              <input type="text" class="form-control" name="berat2" value="0" required>
                              <span class="input-group-text" id="basic-addon1">Gram</span>
                            </div>
                          </div>
                          <div class="vr border"></div>
                          <div class="col">
                            <label class="form-label">Telur Rendah (45 - 40 gram)</label>
                            <div class="input-group">
                              <input type="text" class="form-control" name="telur3" value="0" required>
                              <span class="input-group-text" id="basic-addon1">Butir</span>
                            </div>
                            <label class="form-label">Berat</label>
                            <div class="input-group">
                              <input type="text" class="form-control" name="berat3" value="0" required>
                              <span class="input-group-text" id="basic-addon1">Gram</span>
                            </div>
                          </div>
                        </div>
                        <div class="mt-1"><i>Bila Ada Data Yang Ingin Dikosongkan, Beri Nilai 0</i></div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                  </div>

                <!-- /.card -->
              </div>
              
            </div>
            <div class="row mb-3">
              <div class="col-md-4 offset-md-4 text-center">
                <button type="submit" class="btn btn-primary w-75">Submit Kualitas Telur</button>
              </div>
            </div>
          </form>
            @else
              <div class="alert alert-dark d-inline-block text-center col-md-8 offset-md-2">Data Produksi Telur Kosong. <a class="font-italic text-primary" href="{{ route('dash/produksi_telur') }}">(Tambah Data Produksi)</a></div>
            @endif

      </section>
      <!-- /.content -->
    </div>
@endsection