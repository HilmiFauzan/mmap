@section('GrafikActive', 'active')
@section('title', 'Form Grafik Produksi')
@section('formGrafikPelangganActive', 'active')
@extends('dashboard/master')
@section('content')

<div class="content-wrapper" style="min-height: 568px;">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0">Grafik Pendataan</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('dash/grafik_produksi_telur') }}">Grafik</a></li>
	          <li class="breadcrumb-item active">Pendataan</li>
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
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pembelian Selama per Bulan</h3>

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
          <!-- /.col (LEFT) -->

          <div class="col-md-12">
          	<!-- BAR CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Data Pendapatan per Bulan</h3>

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
                <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
	  	//- BAR CHART -
	  	//-------------
	  	@php
	  		$nomor = 1;
	  	@endphp

		  	var areaChartData = {
	  	      labels  : [
	  	      @if(!empty($pembelian_pelanggan))
	  	      	@forelse($pembelian_pelanggan as $pelanggan)
	  	      		{!! json_encode(date('l - F', strtotime($pelanggan->date))) !!},
	  	      		//dd($tanggal);
	  	      	@empty
	  	      	@endforelse
	  	      @endif
	  	      ],
	  	      datasets: [
	  	        {
	  	          label               : "Data Pembelian",
	  	          backgroundColor     : 'rgb(50,188,120)',
	  	          borderColor         : 'rgba(60,141,188,0.8)',
	  	          pointRadius          : false,
	  	          pointColor          : '#3b8bba',
	  	          pointStrokeColor    : 'rgba(60,141,188,1)',
	  	          pointHighlightFill  : '#fff',
	  	          pointHighlightStroke: 'rgba(60,141,188,1)',
	  	          data                : [
	  	          	@if(!empty($pembelian_pelanggan))
		  	          	@foreach($pembelian_pelanggan as $pelanggan)
		  	          		{{ $pelanggan->data }},
		  	          	@endforeach
		  	          @endif
	  	          ]
	  	        },
	  	      ]
	  	    }

	  	    var areaChartData2 = {
	  	      labels  : [
	  	      @if(!empty($pendapatan))
	  	      	@forelse($pembelian_pelanggan as $pelanggan)
	  	      		{!! json_encode(date('d-m-Y', strtotime($pelanggan->date))) !!},
	  	      		//dd($tanggal);
	  	      	@empty
	  	      	@endforelse
	  	      @endif

	  	      ],
	  	      datasets: [
	  	        {
	  	          label               : "Data Pembelian",
	  	          backgroundColor     : 'rgb(242,105,75)',
	  	          borderColor         : 'rgba(60,141,188,0.8)',
	  	          pointRadius          : false,
	  	          pointColor          : '#3b8bba',
	  	          pointStrokeColor    : 'rgba(60,141,188,1)',
	  	          pointHighlightFill  : '#fff',
	  	          pointHighlightStroke: 'rgba(60,141,188,1)',
	  	          data                : [
	  	          	@if(!empty($pendapatan))
		  	          	@foreach($pendapatan as $pendapatan)
		  	          		{{ $pendapatan->harga }},
		  	          	@endforeach
		  	          @endif
	  	          ],
	  	        },
	  	      ]
	  	    }

	  	var barChartCanvas = $('#barChart').get(0).getContext('2d')
	  	var barChartData = $.extend(true, {}, areaChartData)
			var temp0 = areaChartData.datasets[0]
			barChartData.datasets[0] = temp0

			var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
	  	var barChartData2 = $.extend(true, {}, areaChartData2)
			var temp2 = areaChartData2.datasets[0]
			barChartData2.datasets[0] = temp2

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

	   	var barChartOptions2 = {
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

	   	new Chart(barChartCanvas2, {
	   		// type: 'horizontalBar',
	    	type: 'bar',
	     	data: barChartData2,
	     	options: barChartOptions2
	   	})

	});
	</script>
@endsection