@extends('layouts.app')
@section('content')
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h4 class="center font-weight-bold mb-0">Bài Giảng Mới</h4>
					</div>
					<div>
						<button type="button" class="btn btn-primary btn-icon-text btn-rounded">
							<i class="ti-clipboard btn-icon-prepend"></i>Report
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Thông tin bài giảng</h4>
							{{-- <p class="card-description">
								Basic form elements
							</p> --}}
							<form enctype="multipart/form-data" class="forms-sample" method="POST" action="{{ route('teaching-store') }}">
								@csrf
								<div class="form-group">
									<label for="subject">Môn học</label>
									<select class="form-control" id="subject" name="subject">
										@foreach($subjects as $subject)
										<option value="{{ $subject->id }}">{{ $subject->subjectname }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="lecture_name">Tên bài giảng</label>
									<input type="text" name="lecture_name" value="{{ old('lecture_name') }}" class="form-control" id="lecture_name" placeholder="Tên bài giảng">
									@error('lecture_name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="lesson_number">Buổi học</label>
									<input type="text" class="form-control" value="{{ old('lesson_number') }}" name="lesson_number" id="lesson_number" placeholder="Thứ tự buổi học">
									@error('lesson_number')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="date">Ngày giảng dạy</label>
									<input type="date" name="date" class="form-control" value="{{ old('date') }}" id="date" placeholder="Ngày dạy trên lớp">
									@error('date')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label>File nội dung</label>
									<input type="file" name="files_content" class="form-control"> 
									<div class="input-group col-xs-12">
										<input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
										<span class="input-group-append">
											<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
										</span>
									</div>
									@error('files_content')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="note">Ghi Chú</label>
									<textarea class="form-control summernote" name="note">{{ old('note') }}</textarea>
									@error('note')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="substitute_teacher">Người dạy thay (nếu có)</label>
									<select class="form-control" id="substitute_teacher" name="substitute_teacher">
										<option value="0">Không</option>
										@foreach($substitute_teacher as $teacher)
										<option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
										@endforeach
									</select>
								</div>
								<div style="float: right;">
									<button type="submit" class="btn btn-primary mr-2">Đăng bài</button>
									<a href="javascript:history.back()"><button class="btn btn-light">Hủy</button></a>
								</div>		
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection