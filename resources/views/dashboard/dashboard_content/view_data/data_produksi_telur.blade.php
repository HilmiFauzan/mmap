	<!-- col produksi telur -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Data Hasil Produksi Telur (Harian)</h5>

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
            <div class="col-md-8">
              <p class="text-center">
                <strong>{{ date('Y-F-l') }}</strong>
              </p>

              	<table id="example1" class="table table-dark table-striped table-hover">
              	  <thead>
              	    <tr>
              	      <th scope="col">No Kandang</th>
              	      <th scope="col" class="bg-primary">Total Produksi /Kandang</th>
              	      <th scope="col" class="bg-danger">Total Berat /Kandang</th>
              	      <th scope="col">Tanggal</th>
              	    </tr>
              	  </thead>
              	  <tbody>
              	  	@php
              	  		$nomor = 1;
              	  		$hasil_produksi = $total_telur * 100 / 1000;
              	  		$hasil_berat = $total_berat_telur / 100;
              	  	@endphp
              	  	@forelse($produksis as $produksi)
                  	    <tr class="text-center">
                  	      <th scope="row">{{ $nomor++ }}</th>
                  	      <td>{{ $produksi->ttl_tiap_kdng }}</td>
                  	      <td>{{ $produksi->ttl_berat_tiap_kdng }}</td>
                  	      <td>{{ date('d-m-Y', strtotime($produksi->created_at)) }}</td>
                  	    </tr>
              	    @empty
              	        <div class="alert alert-dark d-inline-block text-center col-md-8 offset-md-2">Data Produksi Telur Belum Ada. <a class="font-italic text-primary" href="{{ route('dash/produksi_telur') }}">(Tambah Data Produksi)</a></div>
              	    @endforelse
              	  </tbody>
              	</table>
              	<div class="row mb-2">
              		<div class="col">
              			Page Sekarang : {{ $produksis->currentPage() }}
              		</div>
              		<div class="col">
              			Jumlah Data : {{ $produksis->total() }}
              		</div>
              	</div>
              	{{ $produksis->links() }}
                
          	      <!-- Data perhalaman: {{ $produksis->perPage() }}<br> -->
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Target Pencapaian Hari Ini</strong>
              </p>

              <div class="progress-group">
              	<label class="form-label">Total Produksi Telur Hari Ini</label>
                <span class="float-right"><b>{{ $total_telur }}</b>/1000</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" 
                  style="width: {{ $hasil_produksi }}%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                <label class="form-label">Total Berat Telur Hari Ini</label>
                <span class="float-right"><b>{{ $total_berat_telur }}</b> Gram</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: {{ $hasil_berat }}%"></div>
                </div>
              </div>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->