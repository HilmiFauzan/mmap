<!DOCTYPE html>

<html lang="en">
@section('informasiBold', 'fw-bold')
@extends('layouts/header')
@section('container')
	<div class="bg-light" style="margin-top: -110px;">
		<div class="row m-0">
			<div class="col-lg-6 pt-5 mt-4">
				<div class="ms-4 mt-4">
			      <div class="container-fluid py-5">
			        <h1 class="display-5 fw-bold">Telur</h1>
			        <h4 class="text-muted">Ayam Petelur Peternakan Pak Danang</h4>
			        <p class="col-md-11 fs-4">Hasil produksi telur peternakan pak danang tidak dapat diragukan lagi, banyak dari pembeli merasa puas melalui pelayanan dan keramahannya, segera pesan telur tersebut sekarang juga!!</p>
			      </div>
			    </div>
			</div>
			<div class="col-lg-6"> 
				<img src="img/pngwing.com.png" class="img-fluid" style="margin-top: 120px;">
			</div>
		</div>
		<svg style="margin-top: -90px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFE887" fill-opacity="1" d="M0,32L80,53.3C160,75,320,117,480,149.3C640,181,800,203,960,192C1120,181,1280,139,1360,117.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
	</div>
	<div class="container-fluid pb-1" id="myData" style="background-color: #FFE887;">
	    <div class="p-5">
	      <div class="container-fluid pb-5">
	        <h1 class="display-5 fw-bold">Apakah Ayam Petelur Itu ?</h1>
	        <p class="col-md-10 fs-4">ayam petelur itu merupakan, ayam yang dibudidayakan dari ayam betina dewasa yang dipelihara khusus dan dijadikan sebagai ayam petelur untuk diambil telurnya. Asal mula ayam petelur tersebut berasal dari ayam liar yang berada di hutan, kemudian oleh beberapa pakar ayam tersebut diseleksi secara ketat.</p>
	        <button class="btn btn-success btn-lg" data-bs-toggle="tooltip" type="button" data-bs-html="true" data-bs-placement="right" title="lanjutkan membaca" onmouseover="myTooltip();">Sejarah Ayam Petelur</button>
	      </div>
	    </div>
	</div>
		<div class="container-fluid" style="background-color: #DDE887;">
		    <div class="container pt-5">
		      		<div class="row py-5 align-items-center">
			      		<div class="col-md-5 px-2">
				      		<center><img src="img/kisspng-chicken-or-the-egg.png" class="img-fluid" width="250" height="300">
				      	</div>
				      	<div class="col-md-7 px-2">
				      		<div class="container-fluid text-light p-3 rounded-end" style="background-color: rgba(0, 0, 0, 0.4);">
						        <h1 class="display-5 text-light fw-bold">lama masa produksi ayam petelur</h1>
						        <p class="fs-4">Lama masa produksi ayam petelur yaitu 80 ‒ 90 minggu. Produksi akan meningkat pada saat ayam berumur 22 minggu dan mencapai puncaknya pada umur 28-30 minggu, kemudian produksi telur menurun dengan perlahan sampai 55% setelah umur 82 minggu (Maharani et al., 2013).</p>
						        <button class="btn btn-success btn-lg" type="button">Baca jurnal</button>
						      </div>
				      	</div>
			      	</div>
		    </div>
		</div>

	<div class="container-fluid my-5">
		<div class="row align-items-md-stretch mb-4 contentLanding-center">
		  <div class="col-md-6">
		    <div class="h-100 p-5 text-dark rounded-3">
		      <h2>Change the background</h2>
		      <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
		      <button class="btn btn-outline-success" type="button">Example button</button>
		    </div>
		  </div>
		  <div class="col-md-6">
		    <div class="h-100 p-5 bg-light">
		      <h2>Add borders</h2>
		      <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
		      <button class="btn btn-outline-success" type="button">Example button</button>
		    </div>
		  </div>
		</div>
	</div>

@endsection

	<script type="text/javascript"> 
		function myTooltip(){
			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		      return new bootstrap.Tooltip(tooltipTriggerEl)
		    })
		}
	</script>