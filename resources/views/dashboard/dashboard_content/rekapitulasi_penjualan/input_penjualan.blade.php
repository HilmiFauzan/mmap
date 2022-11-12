@section('RekapActive', 'active')
@section('title', 'Input Penjualan')
@section('InputPenjualanActive', 'active')
@extends('dashboard/master')
@section('content')

<div class="content-wrapper" style="min-height: 568px;">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0">Input Penjualan</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('dash/input_penjualan') }}">Data Rekapitulasi</a></li>
	          <li class="breadcrumb-item active">Penjualan</li>
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
	    @if (Session::has('pesan'))
	        <div class="alert alert-danger">
	            <button type="button" class="exit btn text-white float-right" data-dismiss="alert" aria-label="Close" style="margin-top: -7px;">
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
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <!-- left column -->
	          <div class="col-md-8 offset-md-2">
	            <!-- general form elements -->
	            <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Masukan Form Penjualan</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form action="{{ route('dash/input_penjualan') }}" method="POST" enctype="multipart/form-data">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Nama Pembeli *</label>
	                    <input type="text" class="form-control" name="nama_lengkap" id="nama" placeholder="Nama Pembeli">
	                  </div>
	                  <!-- select -->
                      <div class="form-group">
                        <label>Pilih Kualitas Telur</label>
                        <select name="kualitas" id="kualitas" class="form-control"  onblur="calculate()">
                        	@forelse($kualitas_telur as $kualitas)
                          	<option value="{{ $kualitas->harga_telur }}">{{ $kualitas->jenis_kualitas_telur }} ({{ $kualitas->harga_telur }})</option>
                          @empty
                          @endforelse
                        </select>
                      </div>
                      <div class="row">
                      	<div class="col-sm-4">
                      		<div class="form-group">
                      		  <label>Satuan Pembelian</label>
                      		  <select name="jumlah_satuan_pembelian" id="satuan" onblur="calculate()" class="form-control">
                      		    <option value="1">Kg</option>
                      		    <!-- 1 Kg == 1000 gram -->
                      		    <option value="20">Peti</option>
                      		    <!-- 1 peti == 20 Kg -->
                      		  </select>
                      		</div>
                      	</div>
                      	<div class="col-sm-8">
                      		<div class="form-group">
			                    	<label>Berat Pembelian *</label>
			                    	<input type="number" class="form-control" name="berat_pembelian" placeholder="Berat Pembelian" id="berat" onblur="calculate()">
	                  			</div>
                      	</div>
                      </div>
                      <i>- Satuan: Kg = 1000 gram, 1 Peti = 20 Kg</i>
                      <!-- <span class="btn btn-success mb-2" id="kalkulasi">Kalkulasi Harga</span> -->
	                  <div class="form-group">
	                    <label>Total Harga Pembelian *</label>
	                    <input type="number" class="form-control" name="total_harga" id="total" readonly>
	                  </div>
	                  <div class="form-group">
	                    <label>Nomer Kontak Pembeli *</label>
	                    <input type="text" class="form-control" name="no_kontak" id="kontak" placeholder="Nomer Kontak" minlength="10">
	                  </div>
	                  <div class="form-group">
	                    <label>Alamat Pembeli *</label>
                        <textarea class="form-control" rows="3" placeholder="Masukan Alamat Pembeli" name="alamat_customer" id="alamat" style="resize: none;"></textarea>
	                  </div>
	                  <div class="form-group">
	                    <label>Masukan Bukti Kwitansi Pembayaran (<i class="small">Tidak Wajib</i>)</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" name="kwitansi" class="custom-file-input" id="exampleInputFile">
	                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	                      </div>
	                      <!-- <div class="input-group-append">
	                        <button class="input-group-text">Upload</button>
	                      </div> -->
	                    </div>
	                  </div>
	                  <div class="my-2"><i>* (Wajib Diisi)</i></div>
	                  <button class="btn btn-primary float-right">Kirim</button>
	                  <span class="btn btn-warning float-left" onclick="clear_text()">Bersihkan</span>
	                </div>
	                <!-- /.card-body -->
	              </form>
	           	</div>
	          </div>
	        </div>
	       </div>
	    </section>

</div>
<script type="text/javascript">
	calculate = function(){
		var kualitas = document.getElementById('kualitas').value;
    var satuan = document.getElementById('satuan').value;
    var berat = document.getElementById('berat').value;
    document.getElementById('total').value = (parseInt(kualitas)*parseInt(berat))*parseInt(satuan);
	}
	function clear_text(){
			document.getElementById('nama').value = '';
			document.getElementById('berat').value = '';
			document.getElementById('kontak').value = '';
			document.getElementById('alamat').value = '';
	}
</script>

@endsection