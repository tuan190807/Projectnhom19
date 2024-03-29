<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản Lý Giảng Dạy</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/customstyle.css">
  <!-- endinject -->
  <!-- Summernote -->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <!-- Sort Table -->
  <link rel="stylesheet" href="css/sortable-tables.min.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
  <div id="app">
    <main>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="{{ route('home') }}"><img style="width: 60px; height: 50px;" src="https://cdn-01.dhcnhn.vn/img/logo-45x45.png" class="mr-2" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}"><img src="https://cdn-01.dhcnhn.vn/img/logo-45x45.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-view-list"></span>
          </button>
          <h4 style="margin-left: 2.5em; margin-top: 5px;">Quản Lý Giảng Dạy Online</h4>
          <!-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                  <span class="input-group-text" id="search">
                    <i class="ti-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
              </div>
            </li>
          </ul> -->
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="images/avatar.jpg" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <p class="dropdown-item">Xin chào, {{ $customuser->fullname }}</p>
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
              <a class="nav-link" href="{{ route('home') }}">
                <i class="ti-home menu-icon"></i>
                <span class="menu-title">Trang chủ</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#user-info" aria-expanded="false" aria-controls="user-info">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Thông tin cá nhân</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="user-info">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('user') }}">Cập nhật thông tin</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Đổi mật khẩu</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#noidungday" aria-expanded="false" aria-controls="noidungday">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Nội dung giảng dạy</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="noidungday">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('teachings') }}">Xem nội dung giảng dạy</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">abc</a></li> -->
                </ul>
              </div>
            </li>
            
            @if(Auth::user()->role == 2)
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#manager-content" aria-expanded="false" aria-controls="ui-basic">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Quản lý bài giảng</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="manager-content">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('teaching-manage') }}">Bài giảng của tôi</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('teaching-create') }}">Nội dung mới</a></li>
                </ul>
              </div>
            </li>
            @endif
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#question" aria-expanded="false" aria-controls="ui-basic">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Hỏi Đáp</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="question">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="">Quản Lý Hỏi Đáp</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="">Typography</a></li> -->
                </ul>
              </div>
            <!-- </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li> -->
          </ul>
        </nav>
        <!-- partial -->

        @yield('content')
        
      </main>
    </div>

    <footer class="footer">
      <div style="float: right;" class="d-sm-flex justify-content-center justify-content-sm-between">
        <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span> -->
        <span  class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">BTL phát triển phần mềm hướng dịch vụ N19 <i class="ti-heart text-danger ml-1"></i></span>
      </div>
    </footer>
    <!-- partial -->
    <!-- container-scroller -->

    <!-- Plugin js for this page-->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/todolist.js"></script>
    <script src="js/file-upload.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <!-- Summernote -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <!-- End of summernote -->
    <!-- Sort Table -->
    <script src="js/sortable-tables.min.js"></script>
    <!-- custom js by Ngoc Ky -->
    <script src="js/custom.js"></script>
    <!-- End custom js by Ngoc Ky -->
  </body>

  </html>

