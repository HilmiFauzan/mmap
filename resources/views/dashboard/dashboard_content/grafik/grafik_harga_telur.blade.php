@section('GrafikActive', 'active')
@section('title', 'Form Grafik Produksi')
@section('formGrafikHargaActive', 'active')
	@php
		$modul = ($data);
	@endphp
@extends($modul)
@section('content')

<div class="content-wrapper" style="min-height: 568px;">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0">Grafik Kualitas Telur</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('dash/grafik_produksi_telur') }}">Grafik</a></li>
	          <li class="breadcrumb-item active">Harga Telur</li>
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
          <div class="col-md-6">

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Total Kualitas Telur /butir</h3>

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
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->

          <div class="col-md-6">

            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Kualitas Berat Telur /kg</h3>

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

          </div>
          <!-- /.col (RIGHT) -->
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
	    //- DONUT CHART -
	    //-------------
	    // Get context with jQuery - using jQuery's .get() method.
	    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
	    var donutData        = {
	      labels: [
	          'Tinggi',
	          'Sedang',
	          'Rendah',
	      ],
	      datasets: [
	        {
	          data: [
	          	@foreach($donut_kualitas_telurs as $donut_kualitas)
	          		{{ $donut_kualitas->kualitas_telur }},
	          	@endforeach
	          ],
	          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
	        }
	      ]
	    }
	    var donutOptions     = {
	      maintainAspectRatio : false,
	      responsive : true,
	    }
	    //Create pie or douhnut chart
	    // You can switch between pie and douhnut using the method below.
	    new Chart(donutChartCanvas, {
	      type: 'doughnut',
	      data: donutData,
	      options: donutOptions
	    })

		//-------------
	  	//- BAR CHART -
	  	//-------------
	  	var areaChartData = {
  	      labels  : ['Kualitas Terbaik', 'Kualitas Sedang', 'Kualitas Rendah'],
  	      datasets: [
  	        {
  	          // label               : 'Kualitas Telur Terbaik',
  	          backgroundColor     : ['#f56954', '#00a65a', '#f39c12'],
  	          borderColor         : 'rgba(60,141,188,0.8)',
  	          pointRadius          : false,
  	          pointColor          : '#3b8bba',
  	          pointStrokeColor    : 'rgba(60,141,188,1)',
  	          pointHighlightFill  : '#fff',
  	          pointHighlightStroke: 'rgba(60,141,188,1)',
  	          data                : [
  	          	@foreach($bar_kualitas_telurs as $bar_kualitas)
  	          		{{ $bar_kualitas->berat_kualitas_telur }},
  	          	@endforeach
  	          ]
  	        },
  	      ]
  	    }

	  	var barChartCanvas = $('#barChart').get(0).getContext('2d')
	  	var barChartData = $.extend(true, {}, areaChartData)
	   	var temp0 = areaChartData.datasets[0]
	   	var temp1 = areaChartData.datasets[1]
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
   	    legend: {
            display: false
         },
				// tooltips: {
				//   enabled: false
				// },
	   	}

	   	new Chart(barChartCanvas, {
	    	type: 'bar',
	     	data: barChartData,
	     	options: barChartOptions,
	   	})
	})
	</script>
@endsection