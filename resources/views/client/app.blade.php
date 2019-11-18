<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản Lý Giảng Dạy</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/base/vendor.bundle.base.css')}}">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
          <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="{{ route('admin') }}"><img style="width: 60px; height: 50px;" src="https://cdn-01.dhcnhn.vn/img/logo-45x45.png" class="mr-2" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('admin') }}"><img src="https://cdn-01.dhcnhn.vn/img/logo-45x45.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-view-list"></span>
          </button>
          <h4 style="margin-left: 2.5em; margin-top: 5px;">Quản Lý Giảng Dạy Online</h4>
          <ul class="navbar-nav mr-lg-2" style="float: left;">
          <form action="" method="" class="navbar-form">
            @csrf
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">

                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                  <span class="input-group-text" id="search">
                    <i class="ti-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" value="{{request()->search }}" name="search">
              </div>

            </li>
          </form>
        </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="../images/avatar.jpg" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <p class="dropdown-item">Xin chào, Admin</p>
                <a class="dropdown-item">
                  <i class="ti-settings text-primary"></i>
                  Thông tin cá nhân
                </a>
                <form method="POST" action="{{ route('logout') }}" id="form-logout">
                  @csrf
                  <a class="dropdown-item" id="btn-form-logout">
                    {{-- <button type="submit" class="non-button"> --}}
                      <i class="ti-power-off text-primary"></i>
                      Đăng xuất
                    {{-- </button> --}}
                  </a>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="ti-view-list"></span>
          </button>
        </div>
      </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('teacher-index') }}" aria-expanded="false" aria-controls="auth">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Quản Lý Giáo Viên</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('client') }}">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title">Quản lý Môn Học</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('assets/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/template.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
  <script src="{{ asset('js/script.js') }}"></script>
  @stack("scripts")
</body>

</html>

