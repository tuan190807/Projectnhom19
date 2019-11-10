@extends('layouts.app')

@section('content')
<div style="width: 100% !important" class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
          </div>
        </div>
      </div>
    </div>
    <div class="row list-category">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 main-title first">
                <h4>Bải giảng mới</h4>
              </div>
              @foreach($teaching_new as $teaching)
              <div class="col-md-3">
                <div class="list-item">
                  <a style="color: #fff" href="/teaching-view?id={{  $teaching->id }}">
                    <div class="box-img" style="height:180px;">
                      <img style=" height: 160px" class="img" src="https://tailieu.vn/image/document/thumbnail/2019/20191008/valhein/80x100/6861570505170.jpg" alt="">
                    </div>
                    <div class="box-title">
                      <span>{{ $teaching->lecture_name }}</span>
                    </div>
                    <div class="box-desc">
                      <p><i class="ti-calendar" style="padding-right: 8px;"></i>{{ $teaching->date }}</p>
                      <p><i class="ti-user" style="padding-right: 8px;"></i>{{ $teaching->teacher_id }}</p>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row list-category">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 main-title first">
                <h4>Bài giảng theo môn học</h4>
              </div>
              
              @foreach($teaching_subject as $key => $teachings)

              <div class="col-md-12">
                <h5 class="subject-name">
                  Môn : <span style="color: #ff4747">{{ $subjects[$key]->subjectname }}</span> <a href="">
                  <i class="ti-plus" style="float: right;"> Xem thêm</i></a>
                </h5>
              </div>
              @foreach($teachings as $teaching)
              <div class="col-md-3">
                <div class="list-item">
                  <a style="color: #fff" href="/teaching-view?id={{  $teaching->id }}">
                    <div class="box-img" style="height:180px;">
                      <img style=" height: 160px" class="img" src="https://tailieu.vn/image/document/thumbnail/2019/20191008/valhein/80x100/6861570505170.jpg" alt="">
                    </div>
                    <div class="box-title">
                      <span>{{ $teaching->lecture_name }}</span>
                    </div>
                    <div class="box-desc">
                      <p><i class="ti-calendar" style="padding-right: 8px;"></i> {{ $teaching->date }}</p>
                      <p><i class="ti-user" style="padding-right: 8px;"></i> {{ $teaching->teacher_id }}</p>
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row list-category">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 main-title first">
                <h4>Danh sách xem sau</h4>
              </div>
              <div class="col-md-3">
                <div class="list-item">
                  <a style="color: #fff" href="/teaching-view?id=">
                    <div class="box-img" style="height:180px;">
                      <img style=" height: 160px" class="img" src="https://tailieu.vn/image/document/thumbnail/2019/20191008/valhein/80x100/6861570505170.jpg" alt="">
                    </div>
                    <div class="box-title">
                      <span>Tên bài giảng</span>
                    </div>
                    <div class="box-desc">
                      <p><i class="ti-calendar"></i></p>
                      <p><i class="ti-user"></i>
                      </p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="list-item">
                  <a style="color: #fff" href="/teaching-view?id=">
                    <div class="box-img" style="height:180px;">
                      <img style=" height: 160px" class="img" src="https://tailieu.vn/image/document/thumbnail/2019/20191008/valhein/80x100/6861570505170.jpg" alt="">
                    </div>
                    <div class="box-title">
                      <span>Tên bài giảng</span>
                    </div>
                    <div class="box-desc">
                      <p><i class="ti-calendar"></i></p>
                      <p><i class="ti-user"></i>
                      </p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="list-item">
                  <a style="color: #fff" href="/teaching-view?id=">
                    <div class="box-img" style="height:180px;">
                      <img style=" height: 160px" class="img" src="https://tailieu.vn/image/document/thumbnail/2019/20191008/valhein/80x100/6861570505170.jpg" alt="">
                    </div>
                    <div class="box-title">
                      <span>Tên bài giảng</span>
                    </div>
                    <div class="box-desc">
                      <p><i class="ti-calendar"></i></p>
                      <p><i class="ti-user"></i>
                      </p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="list-item">
                  <a style="color: #fff" href="/teaching-view?id=">
                    <div class="box-img" style="height:180px;">
                      <img style=" height: 160px" class="img" src="https://tailieu.vn/image/document/thumbnail/2019/20191008/valhein/80x100/6861570505170.jpg" alt="">
                    </div>
                    <div class="box-title">
                      <span>Tên bài giảng</span>
                    </div>
                    <div class="box-desc">
                      <p><i class="ti-calendar"></i></p>
                      <p><i class="ti-user"></i>
                      </p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
</div>
<!-- main-panel ends -->
<!-- page-body-wrapper ends -->
@endsection
