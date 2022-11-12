@section('bg-isi-alamat', 'bg-light')
@section('ubah-card-header', 'Isi Alamat')
@extends('dashboard/dashboard_content/update_account')
@section('update-content')
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat</label>
            <input type="email" name="alamat" class="form-control">
          </div>

          <div class="row mb-3 pl-4">
            <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">RT</label>
              <input type="email" name="rt" class="form-control">
            </div>
            <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">/ RW</label>
              <input type="email" name="rw" class="form-control">
            </div>
          </div>

          <div class="mb-3 pl-4">
            <label for="exampleInputEmail1" class="form-label">Kelurahan/ Desa</label>
            <input type="email" name="kelurahan" class="form-control">
          </div>

          <div class="row mb-3 pl-4">
            <div class="col-7">
              <label for="exampleInputEmail1" class="form-label">Kecamatan</label>
              <input type="email" name="kecamatan" class="form-control">
            </div>
            <div class="col-5">
              <label for="exampleInputEmail1" class="form-label">Kode Pos</label>
              <input type="email" name="kecamatan" class="form-control">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- /.chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <p class="text-center">
          <strong>Lokasi Rumah</strong>
        </p>

        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6454.569578315141!2d107.017976!3d-6.30472!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1632666075061!5m2!1sid!2sid" height="450" style="height: 320px;" allowfullscreen="" class="container border border-info" loading="lazy"></iframe>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection