@section('RekapActive', 'active')
@section('title', 'View Penjualan')
@section('ViewPenjualanActive', 'active')
@extends('dashboard/master')
@section('content')

<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

<div class="content-wrapper" style="min-height: 568px;">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0">View Penjualan</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('dash/input_penjualan') }}">Data Rekapitulasi</a></li>
	          <li class="breadcrumb-item active">View Data Pelanggan</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	    @if (Session::has('pesan'))
	        <div class="alert alert-danger">
	            <button type="button" class="exit btn text-white float-right" data-dismiss="alert" aria-label="Close" style="margin-top: -7px;">
	                <span aria-hidden="true">×</span>
	            </button>
	            {{ Session::get('pesan') }}
	        </div>
	    @endif
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->


	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
		              <div class="card-header">
		                <h3 class="card-title">Data Pelanggan</h3>
		              </div>
		              <!-- /.card-header -->
		              <div class="card-body">
		                <table id="example1" class="table table-striped table-hover">
		                  <thead>
		                  <tr>
		                    <th>No Customer</th>
		                    <th>Nama Lengkap</th>
		                    <th>Harga Pembelian</th>
		                    <th>Satuan</th>
		                    <th>Berat</th>
		                    <th>Total Harga</th>
		                    <th>Kontak</th>
		                    <th>Alamat</th>
		                    <th>Kwitansi</th>
		                  </tr>
		                  </thead>
		                  <tbody>
		                  	@forelse($rekapitulasi as $rekap)
		                  	<tr>
			                    <td>{{ $rekap->no_customer }}</td>
			                    <td>{{ $rekap->nama_lengkap }}</td>
			                    <td>{{ $rekap->harga_lama }}</td>
			                    <td>{{ $rekap->jumlah_satuan_pembelian }}</td>
			                    <td>{{ $rekap->berat_pembelian }}</td>
			                    <td>{{ $rekap->total_harga }}</td>
			                    <td>{{ $rekap->no_kontak }}</td>
			                    <td>{{ $rekap->alamat_customer }}</td>
			                    <td>{{ $rekap->kwitansi }}</td>
		                	</tr>
		                    @empty
		                    @endforelse
		                  </tbody>
		                  
		                </table>
		              </div>
		              <!-- /.card-body -->
		            </div>
		            <!-- /.card -->
				</div>
			</div>
		</div>
	</section>

</div>
@endsection

@section('script')

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- <script src="../plugins/jszip/jszip.min.js"></script> -->
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],

      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection