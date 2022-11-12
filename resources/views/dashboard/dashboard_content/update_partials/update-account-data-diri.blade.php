@section('bg-data-diri', 'bg-light')
@section('ubah-card-header', 'Ubah Data Diri')
@extends('dashboard/dashboard_content/update_account')
@section('update-content')
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <form>
          <div class="row mb-3">
            <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
              <input type="email" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" value="{{ Auth::user()->name }}">
            </div>
            <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
              <input type="email" name="name_end" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->name_end }}">
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">Golongan Darah</label>
              <input type="email" name="golongan_darah" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp">
            </div>
            <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">Umur</label>
              <input type="email" name="umur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pekerjaan Sekarang</label>
            <input type="password" name="pekerjaan" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">Nomer Handphone</label>
              <input type="email" name="handphone" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp">
            </div>
            <div class="col-6">
              <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
              <input type="password" name="kelamin" class="form-control" id="exampleInputPassword1">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- /.chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <p class="text-center">
          <strong>Goal Completion</strong>
        </p>

        <div class="progress-group">
          Add Products to Cart
          <span class="float-right"><b>160</b>/200</span>
          <div class="progress progress-sm">
            <div class="progress-bar bg-primary" style="width: 80%"></div>
          </div>
        </div>
        <!-- /.progress-group -->

        <div class="progress-group">
          Complete Purchase
          <span class="float-right"><b>310</b>/400</span>
          <div class="progress progress-sm">
            <div class="progress-bar bg-danger" style="width: 75%"></div>
          </div>
        </div>

        <!-- /.progress-group -->
        <div class="progress-group">
          <span class="progress-text">Visit Premium Page</span>
          <span class="float-right"><b>480</b>/800</span>
          <div class="progress progress-sm">
            <div class="progress-bar bg-success" style="width: 60%"></div>
          </div>
        </div>

        <!-- /.progress-group -->
        <div class="progress-group">
          Send Inquiries
          <span class="float-right"><b>250</b>/500</span>
          <div class="progress progress-sm">
            <div class="progress-bar bg-warning" style="width: 50%"></div>
          </div>
        </div>
        <!-- /.progress-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection