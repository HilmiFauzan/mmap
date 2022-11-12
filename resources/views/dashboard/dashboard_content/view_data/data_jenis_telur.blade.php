<!-- col produksi jenis telur -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Data Total Kualitas Telur</h5>

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
            <div class="col-md-12">
              <p class="text-center">
                <strong>Total Dari Form Kualitas Telur</strong>
              </p>

              	<table class="table table-dark table-striped table-hover">
              	  <thead>
              	    <tr>
              	      <th scope="col">No Kandang</th>
                      <th scope="col">No Kualitas Telur</th>
              	      <th scope="col">Banyak Telur</th>
              	      <th scope="col">Berat Telur</th>
              	      <th scope="col">Opsi</th>
              	    </tr>
              	  </thead>
              	  <tbody>
                    @php
                      $nomor = 1;
                    @endphp
              	  	@forelse($kualitas_telur as $kualitas)
                  	    <tr>
                  	      <th scope="row">{{ $nomor++ }}</th>
                          <td>
                            @if($kualitas->no_kualitas_tlr == "KLTS001")
                              Telur Kualitas Terbaik
                            @elseif($kualitas->no_kualitas_tlr == "KLTS002")
                              Telur Kualitas Sedang
                            @elseif($kualitas->no_kualitas_tlr == "KLTS003")
                              Telur Kualitas Rendah
                            @endif
                          </td>
                  	      <td>{{ $kualitas->kualitas_telur }}</td>
                  	      <td>{{ $kualitas->berat_kualitas_telur }}</td>
                  	      <td><a href="{{ route('dash/harga_telur') }}">Edit</a></td>
                  	    </tr>
              	    @empty
              	        <div class="alert alert-dark d-inline-block text-center col-md-8 offset-md-2">Data Kualitas Telur Belum diSeleksi. <a class="font-italic text-primary" href="{{ route('dash/form_jenis_telur') }}">(Seleksi Telur Sekarang!)</a></div>
              	    @endforelse
              	  </tbody>
              	</table>
              	<div class="row mb-2">
              		<div class="col">
              			Page Sekarang : {{ $kualitas_telur->currentPage() }}
              		</div>
              		<div class="col">
              			Jumlah Data : {{ $kualitas_telur->total() }}
              		</div>
              	</div>
              	{{ $kualitas_telur->links() }}
          	      <!-- Data perhalaman: {{ $produksis->perPage() }}<br> -->
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
          <div class="row">
            @forelse($harga_telur as $harga)
              <div class="col-sm-4 col-6">
                <div class="description-block border-right">
                  <h5 class="description-header">Rp.{{ $harga->harga_telur }}</h5>
                  <span class="description-text">Telur {{ $harga->jenis_kualitas_telur }}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            @empty
              <div class="container text-center">
                <h5 class="font-weight-bold text-warning">Anda Belum Memasukan Harga Telur</h5>
              </div>
            @endforelse
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
<!-- /.col -->