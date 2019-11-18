@extends('layouts.app')
@section('content')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h4 class="center font-weight-bold mb-0">Nội dung bài giảng</h4>
					</div>
					<!-- <div>
						<button type="button" class="btn btn-primary btn-icon-text btn-rounded">
							<i class="ti-clipboard btn-icon-prepend"></i>Report
						</button>
					</div> -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="doc-title col-md-10">
								<h4>Môn học : {{ $subject->subjectname }}</h4>
								<p>Buổi: {{ $teaching->lesson_number }}</p>
								<p>Giáo viên: <span style="font-weight: bold; color: #248afd">{{ $teaching->teacher_id }}</span> | Ngày: <span style="color: #248afd">{{ $teaching->date }}</span></p>
							</div>
							<div class="col-md-2 doc-download">
								<div class="left">
									<span style="color: #ff4747">99</span>
									<br>
									<span>lượt xem</span>
								</div>
								<div class="right">
									<span style="color: #ff4747">99</span>
									<br>
									<span>Download</span>
								</div>
							</div>
							<div class="col-md-12">
								<h4 class ="lecture_name">
									{{ $teaching->lecture_name }}
								</h4>
							</div>
						</div>		
					</div>
						<div class=	"view-doc" style="text-align: center;">
							@if($file_type == "pdf")
								<embed class='document' src="{{asset('storage/teaching/' . $teaching->file_content)}}">
							@else
								<iframe class="document" src="https://view.officeapps.live.com/op/view.aspx?src={{asset('storage/teaching/' . $teaching->file_content)}}" frameborder="1">
								</iframe>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="view-note">
										<h4>Note</h4>
										{!! $teaching->note !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 comment">
									<div class="comment-form-container">
										<h3>Hỏi & Đáp</h3>
									</div>
									<div id="output">
										<div class="form-group">
											<label for="">Bình luận</label>
											<textarea class="form-control" rows="4"></textarea>
										</div>
										<button class="btn btn-primary">Gửi</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div >
								<h4 style="margin-bottom: 20px; ">Bài viết cùng môn học</h4>
								<div class="row">
									@foreach($teaching_relate as $teaching)
									<div class="col-md-12 box-teaching-together">
										<div class="box-img">
											<img class="img" src="https://tailieu.vn/image/document/thumbnail/2019/20191008/valhein/80x100/6861570505170.jpg" alt="">
										</div>
										<div class="box-title">
											<a style="color: #fff" href="/teaching-view?id={{$teaching->id}}">{{ $teaching->lecture_name }}</a>
										</div>
										<div class="box-desc">
											<p>Ngày đăng: {{ $teaching->date }}</p>
											<p>Người dạy: {{ $teaching->teacher_id }}
											</p>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection