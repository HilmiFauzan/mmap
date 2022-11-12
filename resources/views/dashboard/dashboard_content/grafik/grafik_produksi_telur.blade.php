@section('GrafikActive', 'active')
@section('title', 'Form Grafik Produksi')
@section('formGrafikProduksiActive', 'active')
	@php
		$modul = ($data);
		//foreach($sebelum as $data_sebelum){
			//dd($sebelum[0]->total_seluruh_telur);
		//}
	@endphp
@extends($modul)
@section('content')

<div class="content-wrapper" style="min-height: 568px;">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0">Grafik Produksi Telur</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('dash/grafik_produksi_telur') }}">Grafik</a></li>
	          <li class="breadcrumb-item active">Produksi Telur</li>
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
          	<h2 class="fs-3 text-center my-3">Pilih Nomor Kandang</h2>
                <div class="my-2 col-md-6 offset-md-3">
                    <form action="{{ route('dash/check_grafik_produksi_telur') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="kandang_produksi" required>
                            <button class="btn btn-primary" type="submit">GET</button>
                        </div>
                    </form>
                </div>
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Produksi Telur per Minggunya</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body bg-white">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Perbandingan Data Telur Sebelum Kualifikasi Kualitas dan Sesudah Kualifikasi Kualitas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body bg-white">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@section('script')
<script>
	$(function () {

			//-------------
	  	//- BAR CHART -
	  	//-------------
	  	@php
	  		$nomor = 1;
	  	@endphp

					var getRandomColor = function() {
					  var r = Math.floor(Math.random() * 255);
					  var g = Math.floor(Math.random() * 255);
					  var b = Math.floor(Math.random() * 255);
					  return "rgb(" + r + "," + g + "," + b + ")";
					};

		  	var areaChartData = {
	  	      labels  : [
	  	      @if(!empty($produksi_telurs))
	  	      	@forelse($produksi_telurs as $produk)
	  	      			{!! json_encode(date('l', strtotime($produk->created_at))) !!},
	  	      				//dd($tanggal);
	  	      			
	  	      	@empty
	  	      	@endforelse
	  	      @endif
	  	      ],
	  	      datasets: [
	  	        {
	  	          label               : "Kandang {{ (!empty($kandang)) ? $kandang : '' }}",
	  	          // backgroundColor     : getRandomColor(),
	  	          backgroundColor     : 'rgba(60,141,188)',
	  	          borderColor         : 'rgba(60,141,188,0.8)',
	  	          pointRadius          : false,
	  	          pointColor          : '#3b8bba',
	  	          pointStrokeColor    : 'rgba(60,141,188,1)',
	  	          pointHighlightFill  : '#fff',
	  	          pointHighlightStroke: 'rgba(60,141,188,1)',
	  	          data                : [
	  	          	@if(!empty($produksi_telurs))
		  	          	@foreach($produksi_telurs as $produk)
		  	          		{{ $produk->ttl_tiap_kdng }},
		  	          	@endforeach
		  	          @endif
	  	          ]
	  	        },
	  	      ]
	  	    }

	  	var barChartCanvas = $('#barChart').get(0).getContext('2d')
	  	var barChartData = $.extend(true, {}, areaChartData)
			var temp0 = areaChartData.datasets[0]
			barChartData.datasets[0] = temp0

	  	var barChartOptions = {
	    	responsive              : true,
	     	maintainAspectRatio     : false,
	     	datasetFill             : false,
	     	scales: {
	     	        yAxes: [{
	     	            ticks: {
	     	                beginAtZero: true
	     	            }
	     	        }]
	     	    },
	   	}

	   	new Chart(barChartCanvas, {
	   		// type: 'horizontalBar',
	    	type: 'bar',
	     	data: barChartData,
	     	options: barChartOptions
	   	})

	   	//-------------
	  	//- PIE CHART -
	  	//-------------
	   	var donutData        = {
	      labels: [
	          'Telur Sebelum Kualifikasi',
	          'Telur Sesudah Kualifikasi'
	      ],
	      datasets: [
	        {
	          data: [
	          @if(!$sebelum)
	          	{{ $sebelum[0]->total_seluruh_telur }},
	          	{{ $sesudah }}
	          @endif
	          ],
	          backgroundColor : ['#f56954', '#00a65a'],
	        }
	      ]
	    }
	  		//-------------
	      //- PIE CHART -
	      //-------------
	      // Get context with jQuery - using jQuery's .get() method.
	      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
	      var pieData        = donutData;
	      var pieOptions     = {
	        maintainAspectRatio : false,
	        responsive : true,
	      }
	      //Create pie or douhnut chart
	      // You can switch between pie and douhnut using the method below.
	      new Chart(pieChartCanvas, {
	        type: 'pie',
	        data: pieData,
	        options: pieOptions
	      })
	});
	</script>
@endsection