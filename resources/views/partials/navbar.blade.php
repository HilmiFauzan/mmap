<!-- media sosial -->
<section class="container-fluid d-none d-lg-block bg-dark" style="--bs-bg-opacity: .4; position: relative;">
    <div class="row p-2">
      
      <div class="col-md-8" style="padding-top: 10px;">
          <div class="text-center text-white align-bottom me-5">
            <div class="fw-italic me-5">
              <i>-- Peternakan Telur Pak Danang. Kualitas Terbaik, Harga Terjangkau ---</i>
            </div>
          </div>
      </div>

      <div class="col-6 col-md-4 ps-2"><center>
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating rounded-circle" href="#!" role="button"><i class="fab fa-facebook-f" style="width: 15px;"></i></a>
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating rounded-circle" href="#!" role="button"><i class="fab fa-twitter"></i></a>
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating rounded-circle" href="#!" role="button"><i class="fab fa-google"></i></a>
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating rounded-circle" href="#!" role="button"><i class="fab fa-instagram"></i></a>
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating rounded-circle" href="#!" role="button"><i class="fab fa-youtube"></i></a>
        <!-- Github -->
        <!-- <a class="btn btn-outline-light btn-floating rounded-circle" href="#!" role="button"><i class="fab fa-github"></i></a> -->
    </center></div>
  </div>
</section>
<!-- media sosial -->

<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar bg-dark shadow sticky-top" style="--bs-bg-opacity: .4;" id="myNavbar">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold @yield('fsHome') ms-5" href="/">Management Telur</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item text-dark">
          <a class="nav-link text-white @yield('dataBold')" aria-current="page" href="/data">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white @yield('informasiBold')" href="/information">Informasi</a>
        </li>
      </ul>

      <div class="d-flex me-3">
        <!-- Button trigger modal -->
        <!-- <a class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Login</a> -->
        @if(empty(Auth::user()->hak_akses))
          <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>

          <div class="vr border border-white me-2"></div>
          <!-- Button trigger modal -->

          <input class="form-control me-2 bg-dark text-white w-75" type="search" placeholder="Search" aria-label="Search" id="myBtn" style="--bs-bg-opacity: .5; display: none;">
          <button class="btn btn-outline-light rounded-circle" type="submit" onclick="hideSearch();"><i class="fas fa-search"></i></button>
          @elseif(Auth::check())
            @if(Auth::user()->hak_akses != "member")
              <a href="{{ route('dashboard/master') }}">
                <img class="rounded-circle" src="{{ url('storage/'.Auth::user()->file) }}" id="blah" alt="User profile picture" style="height: 40px;">
              </a>
            @elseif(Auth::user()->hak_akses == "member")
              <a href="{{ route('dashboard/master/customer') }}">
                <img class="rounded-circle" src="{{ url('storage/'.Auth::user()->file) }}" id="blah" alt="User profile picture" style="height: 40px;">
              </a>
            @endif
        @endif
      </div>
    </div>
  </div>
</nav>
