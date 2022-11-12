@section('kandang&hargaActive', 'active')
@section('title', 'Form Tambah Kandang')
@section('formHargaActive', 'active')
@extends('dashboard/master')
@section('content')
<div class="content-wrapper" style="min-height: 568px;">
	<div class="content-header">
		<div class="container-fluid">
		  <div class="row mb-2">
		    <div class="col-sm-6">
		      <h1 class="m-0">Tambah Harga Telur</h1>
		    </div><!-- /.col -->
		    <div class="col-sm-6">
		      <ol class="breadcrumb float-sm-right">
		      	<li class="breadcrumb-item"><a href="#">Kandang & Harga</a></li>
		        <li class="breadcrumb-item active">Tambah Harga</li>
		      </ol>
		    </div><!-- /.col -->
		  </div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	@if (Session::has('success'))
	    <div class="alert alert-success col-md-6 offset-md-3">
	        <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close" style="margin-top: -13px;">
	            <span aria-hidden="true">×</span>
	        </button>
	        {{ Session::get('success') }}
	    </div>
	@endif
	@if (Session::has('pesan'))
	    <div class="alert alert-danger">
	        <button type="button" class="exit btn btn-lg text-white float-right" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">×</span>
	        </button>
	        <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
	          <i class="fas fa-times"></i>
	        </button> -->
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

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid text-center">
	      <div class="row">
	        <div class="col-md-6">
	        	<form action="{{ route('dash/insert/form_harga_telur') }}" method="POST">
		            @csrf
	          	<!-- SELECT2 EXAMPLE 2 -->
		        <div class="card">
		            <div class="card-header">
		              <h3 class="card-title">Tambah Harga</h3>
		              <div class="card-tools">
		                <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                  <i class="fas fa-minus"></i>
		                </button>
		              </div>
		            </div>
		            
		            <!-- /.card-header -->
		            <div class="card-body">
		                <div class="row row-cols-1 px-1">
	                		<div class="form-group mb-4">
	    	                <label>Tentukan Harga Telur<code> Sesuai Kualitas</code></label>
	    	                	<select class="custom-select form-control-border border-width-2 text-center" name="jenis_kualitas">
	    	                  		<option value="">Silahkan Pilih Kualitas</option>
		    	                    <option value="Kualitas Terbaik">Kualitas Terbaik (50-65 Gram)</option>
		    	                    <option value="Kualitas Medium">Kualitas Medium (40-49 Gram)</option>
		    	                    <option value="Kualitas Rendah">Kualitas Rendah (35-39 Gram)</option>
	    	                  	</select>
		                	</div>

		                		<label class="form-label text-muted">Input Angka Untuk Mengubah Harga</label>
		                  	<div class="col-md-10 offset-md-1">
		                        <div class="input-group">
		                          <input type="number" class="form-control large" name="harga" aria-label="Username" aria-describedby="basic-addon1">
		                        </div>
		                    <!-- /.chart-responsive -->
		                  	</div>
		                </div>
		              <!-- /.row -->
		              <div class="col-md-6 offset-md-3 mt-4">
		                <button type="submit" class="btn btn-primary w-75">Submit</button>
		              </div>
		            </div>
		            <!-- /.card-body -->
		        </div>
	          	<!-- /.card -->
	          	</form>
	        </div>

	        <div class="col-md-6">
	          <!-- SELECT2 EXAMPLE 2 -->
	          <div class="card">
	            <div class="card-header">
	              <h3 class="card-title">Harga Telur Hari Ini</h3>
	              <div class="card-tools">
	                <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                  <i class="fas fa-minus"></i>
	                </button>
	              </div>
	            </div>
	            <!-- /.card-header -->
	            <div class="card-body">
	                <div class="row row-cols-1 px-1">
                		<p class="text-center">
                		  <strong>Data Ini Dapat Berubah Sewaktu-waktu</strong>
                		</p>
                		<div class="row">
                			@forelse ($hargatelurs as $harga_telur)
                				<div class="col-4">
                					<div class="progress-group">
                						<span class="float-right">Jenis :</span>
                					  <input type="" class="form-control" value="{{ $harga_telur->jenis_kualitas_telur }}" readonly>
                					</div>
                					<!-- /.progress-group -->

                					<div class="progress-group">
                					  <span class="float-right">Rupiah</span>
                					  <input type="" class="form-control" value="{{ $harga_telur->harga_telur }}" readonly>
                					</div>
                				</div>
	                		@empty
	                		@endforelse
                		</div>
	                </div>
	              <!-- /.row -->
	            </div>
	            <!-- /.card-body -->
	          </div>
	          <!-- /.card -->
	        </div>
	      </div>
		</div>
	</section>
	<!-- /.content -->
</div>

@endsection