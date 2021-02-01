<!-- icon -->
<link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{asset('assets/javascript:void(0)')}}">
        <span class="nav-link text-blue">Kawal Covid</span> 
      </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{url('admin/provinsi')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/provinsi') }}">
                <i class="ni ni-pin-3 text-orange"></i>
                <span class="nav-link-text">Provinsi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/kota')}}">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Kota</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/kecamatan')}}">
                <i class="ni ni-pin-3 text-yellow"></i>
                <span class="nav-link-text">Kecamatan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/kelurahan')}}">
                <i class="ni ni-pin-3 text-default"></i>
                <span class="nav-link-text">Kelurahan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/rw')}}">
                <i class="ni ni-pin-3 text-green"></i>
                <span class="nav-link-text">RW</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/kasus')}}">
                <i class="ni ni-pin-3 text-red"></i>
                <span class="nav-link-text">Kasus</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{url{('login}}">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.html">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Register</span>
              </a>
            </li>
          </ul> 
          </ul>
        </div>
      </div>
    </div>
  </nav>