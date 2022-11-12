@section('title', 'Form Feedback')
@section('formFeedBackJenisActive', 'active')
@extends('dashboard/master_customer')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/start.css">

<div class="content-wrapper" style="min-height: 568px;">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0">Feedback</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('dash/feedback') }}">Feedback</a></li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	    @if (Session::has('success'))
	        <div class="alert alert-success">
	            <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close" style="margin-top: -10px;">
	                <span aria-hidden="true">×</span>
	            </button>
	            {{ Session::get('success') }}
	        </div>
	    @endif
	    @if(session('errors'))
	        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	            Something it's wrong:
	            <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">×</span>
	            </button>
	            <ul class="nav nav-pills">
	            @foreach ($errors->all() as $error)
	                <li class="nav-item">{{ $error }}</li>
	            @endforeach
	            </ul>
	        </div>
	    @endif
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid text-center">
    <form action="{{ route('dash/tambah/feedback') }}" method="POST">
    	@csrf
      <div class="row">
        <div class="col-md-12">
          <!-- SELECT2 EXAMPLE 2 -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form FeedBack (Komentar)</h3>
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
                <div class="row row-cols-1 px-5">
                	<label class="form-label text-muted">Berikan Kami Masukan dari Pengalaman Anda Menggunakan Sistem Kami</label>

                	<div class="container d-flex justify-content-center mt-200">
                	    <div class="row">
                	        <div class="col-md-12">
                	            <div class="stars">
                	                <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                	                <label class="star star-5" for="star-5"></label>
                	                <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                	                <label class="star star-4" for="star-4"></label>
                	                <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                	                <label class="star star-3" for="star-3"></label>
                	                <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                	                <label class="star star-2" for="star-2"></label>
                	                <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                	                <label class="star star-1" for="star-1"></label> 
                	            </div>
                	        </div>
                	    </div>
                	</div>

                  <div class="col-md-8 offset-md-2">
                        <div class="input-group">
                          <textarea type="number" class="form-control large" name="feed" placeholder="penilaian" style="height: 100px; resize: none;"></textarea>
                        </div>
                    <!-- /.chart-responsive -->
                  </div>
                </div>
              <!-- /.row -->
              <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                  <button type="submit" class="btn btn-primary w-75">Submit</button>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->

</div>

@endsection