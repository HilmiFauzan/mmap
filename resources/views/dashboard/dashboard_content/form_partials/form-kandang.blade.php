@section('kandang&hargaActive', 'active')
@section('title', 'Form Tambah Kandang')
@section('formKandangActive', 'active')
@extends('dashboard/master')
@section('content')
	<div class="content-wrapper" style="min-height: 568px;">
		<div class="content-header">
			<div class="container-fluid">
			  <div class="row mb-2">
			    <div class="col-sm-6">
			      <h1 class="m-0">Tambah Kandang</h1>
			    </div><!-- /.col -->
			    <div class="col-sm-6">
			      <ol class="breadcrumb float-sm-right">
			      	<li class="breadcrumb-item"><a href="#">Kandang & Harga</a></li>
			        <li class="breadcrumb-item active">Tambah Kandang</li>
			      </ol>
			    </div><!-- /.col -->
			  </div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="container-fluid text-center">
		    <form action="{{ route('tambah/kandang') }}" method="POST">
		    	@csrf
		      <div class="row">
		        <div class="col-md-8 offset-md-2">
		          <!-- SELECT2 EXAMPLE 2 -->
		          <div class="card">
		          	@if (Session::has('success'))
		          	    <div class="alert alert-success">
		          	        <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close">
		          	            <span aria-hidden="true">×</span>
		          	        </button>
		          	        {{ Session::get('success') }}. Silahkan Untuk Mengisi Pada Link Berikut <a class="text-bold text-primary" href="{{ route('dash/produksi_telur') }}">(Form Produksi Telur)</a>
		          	    </div>
		          	@endif
		          	@if (Session::has('pesan'))
		          	    <div class="alert alert-danger">
		          	        <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close">
		          	            <span aria-hidden="true">×</span>
		          	        </button>
		          	        {{ Session::get('pesan') }}
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
		            <div class="card-header">
		              <h3 class="card-title">Tambah Kandang</h3>
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
		                	<label class="form-label text-muted">Input Angka Untuk Mengubah Kandang</label>
		                  <div class="col-md-8 offset-md-2">
		                        <div class="input-group">
		                          <input type="number" class="form-control large" name="tambah_kandang" aria-label="Username" aria-describedby="basic-addon1">
		                        </div>
		                        <input type="hidden" class="form-control large" name="mengubah" value="{{ Auth::user()->name }} {{ Auth::user()->name_end }}">
		                    <!-- /.chart-responsive -->
		                  </div>
		                </div>
		              <!-- /.row -->
		            </div>
		            <!-- /.card-body -->
		          </div>
		          <!-- /.card -->
		        </div>
		      </div>
		      <div class="row">
		        <div class="col-md-6 offset-md-3">
		          <button type="submit" class="btn btn-primary w-75">Submit Seluruh Kandang</button>
		        </div>
		      </div>
		    </form>

		</section>
		<!-- /.content -->
	</div>
@endsection