@section('title', 'Akun')
@section('updateActive', 'bg-primary')
@extends('dashboard/master_customer')
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


      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Ubah Email</h5>

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
                @if ($errors->any())
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                          <div class="card-body box-profile">
                            <div class="text-center">
                              <img class="profile-user-img img-fluid img-circle" src="{{ url('storage/'.Auth::user()->file) }}" id="blah" alt="User profile picture" style="height: 100px;">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name }} {{ Auth::user()->name_end }}</h3>

                            @if(Auth::user()->hak_akses != 'member')
                              <p class="text-muted text-center">Software Engineer</p>
                            @endif

                            <form action="{{ route('dash/update_account_image') }}" method="POST" enctype="multipart/form-data">
                              @method('PUT')
                              @csrf
                              <ul class="list-group list-group-unbordered mb-1">
                                <li class="list-group-item p-2">
                                  <div class="form-group">
                                    <label for="exampleInputFile" class=" ml-1"><i class="fa fa-user"></i> File input</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="imgInp" accept="image/*">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div>
                                      <div class="input-group-append">
                                        <button class="input-group-text">Upload</button>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                @if(Auth::user()->hak_akses != 'member')
                                  <li class="list-group-item p-2">
                                    <b>Tinggal</b> <a class="float-right">Bekasi</a>
                                  </li>
                                  <li class="list-group-item p-2">
                                    <b>Daerah</b> <a class="float-right">Jawa Barat, Indonesia</a>
                                  </li>
                                @endif
                              </ul>
                            </form>

                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <div class="col-md-6">
                        <form class="container align-center" action="{{ route('dash/update_account') }}" method="POST">
                          @method('PUT')
                          @csrf
                          <div class="mb-3 row">
                            <div class="col">
                              <i class="fa fa-user"></i>
                              <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                              <input type="text" name="nama_awal" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col">
                              <i class="fas fa-address-card"></i>
                              <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                              <input type="text" name="nama_akhir" class="form-control" value="{{ Auth::user()->name_end }}">
                            </div>
                          </div>
                          <div class="mb-3">
                            <i class="fa fa-at"></i>
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                          </div>
                          <div class="mb-3">
                            <i class="fa fa-unlock"></i>
                            <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="8">
                          </div>
                          <div class="mb-3">
                            <i class="fa fa-unlock-alt"></i>
                            <label for="exampleInputPassword1" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" minlength="8">
                          </div>
                          <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div> -->
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- /.chart-responsive -->
                      </div>
                    </div>
                    <!-- /.row -->
                  </div>

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

    <script type="text/javascript">
      imgInp.onchange = evt => {
          const [file] = imgInp.files
          if (file) {
            blah.src = URL.createObjectURL(file)
          }
        }
    </script>
@endsection