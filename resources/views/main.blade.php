<!DOCTYPE html>

<html lang="en">

@section('fsHome', 'fs-4')
@extends('layouts/header')
@section('container')

<link rel="stylesheet" type="text/css" href="../css/tester-carousel.css">

<!-- parallax -->
	<section id="#home">
		<div class="img-fluid parallax" style="width: 100%; height: 700px; margin-top: -228px;"></div>
	</section>
<!-- parallax -->

<!-- content -->
<div class="container-fluid border-top py-4 contentLanding">
    <div class="px-5 mb-5 rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">MMAP (Management & Monitoring Ayam Telur)</h1>
        <h4 class="text-muted">Sistem Management & Monitoring Ayam Petelur</h4>
        <p class="col-md-8 fs-4">Sistem Manajemen dan Monitoring Ayam Petelur (MMAP) merupakan sistem manajemen, monitoring berbasis website yang dapat diintegrasikan dengan IOT (Internet of Things) sehingga memberikan solusi dan kemudahan atas permasalahan teknologi dibidang peternakan.</p>
        <button class="btn btn-success btn-lg" type="button">Baca Lebih Lanjut</button>
      </div>
    </div>

</div>

<div class="container-fluid contentLanding-center">
  <div class="text-center">
    <div class="card-header fs-2 fw-bold">
      Tujuan
    </div>
    <div class="card-body">
      <h4 class="card-title">Tujuan Pembuatan Sistem MMAP</h4>
      <p class="card-text py-2 px-5">Pembuatan sistem MMAP (Manajemen dan Monitoring Ayam Petelur) bertujuan untuk memfasilitasi proses kegiatan input telur setiap harinya, sehingga dapat menilai hasil produksi dan berat telur tiap harinya apakah terjadi peningkatan produksi atau penurunan produksi. selain itu, sistem ini juga digunakan untuk mempermudah proses input data secara otomatis ke database system yang dapat dilakukan dimana saja.</p>
    </div>
    <div class="card-footer text-ligt">
      2 days ago
    </div>
  </div>
</div>

    <div class="container my-5 text-center rounded contentLanding">
      <div class="row py-3">
          <div class="col-lg-6 col-md-12 my-1">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title fw-bold">Belum Memiliki Akun ?</h5>
                  <p class="card-text text-muted">Registrasi Terlebih Dahulu Supaya Memudahkan Anda dalam Memilih Jenis Telur Ayam</p>
                  <a href="#" class="btn btn-lg btn-success">Registrasi</a>
                </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12 my-1">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title fw-bold">Sudah Memiliki Akun</h5>
                  <p class="card-text text-muted">Segeralah Untuk Mencari Telur Dengan Kualitas Terbaik dan Harga Yang Terjangkau</p>
                  <a href="#" class="btn btn-lg btn-success">Login</a>
                </div>
              </div>
          </div>
        </div>
    </div>

<div class="container-fluid pt-1 bg-light">
    <div class="row mt-5 mb-3 text-center">
      <h1 class="mb-5 fw-bold">Keuntungan Menggunakan MMAP</h1>
        <div class="col-lg-6 px-5 my-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex mb-2"><i class="bi-terminal m-auto text-black">
                  <i class="fas fa-laptop fa-3x"></i>
                  <i class="fas fa-mobile-alt fa-3x"></i>
                </i></div>
                <h3>Tampilan Responsive</h3>
                <!-- <p class="lead mb-0">Tampilan Telah Responsive Untuk Berbagai Macam Device Baik Laptop, Tablet Maupun Smartphone.</p> -->
                <p class="card-text">Tampilan Website Telah Responsive Untuk Berbagai Macam Device Baik Laptop, Tablet Maupun Smartphone, Sehingga Memudahkan Pengguna Dalam Mengekspresikan Sistem MMAP Ini.</p>
            </div>
        </div>
        <div class="col-lg-6 px-5 my-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                <div class="features-icons-icon d-flex mb-2"><i class="bi-terminal m-auto text-black">
                  <i class="fas fa-user-cog fa-3x"></i>
                </i></div>
                <h3>Mudah Digunakan</h3>
                <p class="card-text">Siap Digunakan Kapanpun, Dimanapun dan Kapan Saja Selama Terkoneksi Dengan Internet Sehingga Memudahkan Untuk Memonitoring Dan Memanagement Data Yang Dibutuhkan!</p>
            </div>
        </div>
    </div>

    <div class="row text-center">
      <div class="col-lg-6 mb-2 p-5">
        <div class="icon-stack icon-stack-xl bg-black-soft text-black mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <h3>Terintegrasi Dengan Customer</h3>
        <p class="card-text">Peternak Dapat Memperlihatkan Hasil Kualitas Produksi Kepada Customer Melalui Layanan Penyedia Fitur Yang Terintegrasi Dengan Sistem.</p>
      </div>
      <div class="col-lg-6 mb-5 p-5">
        <div class="icon-stack icon-stack-xl bg-black-soft text-black mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
            <polyline points="17 6 23 6 23 12"></polyline>
          </svg>
        </div>
        <h3>Mudah Untuk Melaporkan Data</h3>
        <p class="card-text">Memonitoring Kegiatan Sekaligus Mendatangkan Keuntungan Bagi Pembeli dan Peternak Sehingga Dapat Memajukan Peternak Ayam Di Indonesia Terkhusus Untuk Peternak Ayam Petelur.</p>
      </div>
    </div>
</div>

<section class="my-5">
  <div class="container px-5">
      <div class="story-item contentLanding-center">
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-7">
                          <img class="img-fluid" src="https://i.ytimg.com/vi/yjC37FW-tvM/maxresdefault.jpg" alt="">
                          <div class="figure-mask"></div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-5">
                          <div class="p-2">
                              <div class="logo"><img src="../assets/images/stories/client-logo-2.svg" alt=""></div>
                              <h4 class="heading fw-bold">Sejarah Singkat Peternakan Ayam Petelur</h4>
                              <div class="card-text" style="font-size: 18px;">
                                  Asal mula ayam petelur berasal dari ayam liar yang ditangkap dan dipelihara karena mampu menghasilkan telur yang banyak. Pada awal tahun 1900-an, ayam liar itu tetap pada tempatnya, akrab dengan pola kehidupan masyarakat di pedesaan.
                              </div><!--//desc-->
                              <a class="btn btn-success mt-2" href="story-single.html">Read Story</a>
                          </div><!--//inner-->
                      </div><!--//content-->
                  </div><!--//row-->
              </div>
  </div>
</section>


<!-- carousel tester page -->
<section class="container px-5 py-5">
  <h2 class="fw-bold text-center">Pengalaman Pengguna Yang Telah Menggunakan Sistem MMAP</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
          @foreach($feedbacks as $key => $feed)
            <li data-target="#myCarousel" data-slide-to="0" class="{{ $key == 0 ? 'active' : '' }}"></li>
          @endforeach
      </ol> <!-- Wrapper for carousel items -->
      <div class="carousel-inner">
        @forelse($feedbacks as $key => $feed)
          <div class="item carousel-item {{ $key == 0 ? 'active' : '' }}">
              <div class="img-box"><img src="{{ url($feed->file) }}" alt=""></div>
              <p class="testimonial">{{ $feed->feed }}</p>
              <p class="overview"><b>{{ $feed->name }}</b></p>
              <div class="star-rating mb-4">
                @for($i = 1; $i <= $feed->rating; $i++)
                  <span class="fa fa-star checked"></span>
                @endfor
              </div>
          </div>
        @empty
          <h4 class="fw-bold text-center mb-4">-- Maaf, Data Pengguna Masih Kosong --</h4>
        @endforelse
      </div> <!-- Carousel controls --> 
      <a class="carousel-control left carousel-control-prev text-decoration-none" href="#myCarousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control right carousel-control-next text-decoration-none" href="#myCarousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
  </div>
</section>
<!-- carousel tester page -->

<content>
  <div class="bg-light py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 p-2">
          <div class="row">
            <div class="col text-center">
              <i class="fa fa-users fa-5x"></i>
            </div>
            <div class="col">
              <h1 class="form-label fw-bold">3+</h1>
              <p>Cabang Pengelolaan</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-2">
          <div class="row">
            <div class="col text-center">
              <i class="fa fa-tractor fa-5x"></i>
            </div>
            <div class="col">
              <h1 class="form-label fw-bold">1,2 Ha</h1>
              <p>Lahan Pribadi</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-2">
          <div class="row">
            <div class="col text-center">
              <i class="fa fa-network-wired fa-5x"></i>
            </div>
            <div class="col">
              <h1 class="form-label fw-bold">Terintegrasi</h1>
              <p>Terintegrasi Dengan IoT</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</content>

@endsection