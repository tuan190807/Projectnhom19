@extends('layouts.app')
@section('content')

<div style="width: 100% !important" class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h4 class="font-weight-bold mb-0">Quản Lý Bài Giảng</h4>
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
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Giáo Viên: {{ $teacher->fullname }}</h4>
						<p class="card-description">
							Khoa : {{ $khoa->name }}
						</p>
						<h3></h3>
						<div class="table-responsive pt-3">
							<table style="table-layout: fixed;" class="table table-bordered sortable-table table-striped">
								<legend style="color: #76838f">Danh Sách Bài Giảng</legend>
								<thead>
									<tr>
										<th class="numeric-sort" style="max-width: 60px;">
											STT
										</th>
										<th disable>
											Môn Học
										</th>
										<th disable>
											Bài học
										</th>
										<th>
											Buổi
										</th>
										<th>Ngày giảng dạy</th>
										<th>Tệp tải lên</th>
										<th>Giáo viên dạy thay</th>
										<th>Thay đổi gần nhất</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($teaching as $teach)
									<tr>
										<td>{{ $teach['stt'] }}</td>
										<td>{{ $teach->subject_id }}</td>
										<td>{{ $teach->lecture_name }}</td>
										<td>{{ $teach->lesson_number }}</td>
										<td>{{ $teach->date }}</td>
										<td>{{ $teach->file_content }}</td>
										<td>{{ $teach->substitute_teacher }}</td>
										<td>{{ $teach->updated_at }}</td>
										<td>
											<button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thao tác</button>
											<div class="dropdown-menu">
												<a class="dropdown-item fix-dropdown-item link-submit" href="/teaching-view?id={{$teach->id}}">Đến xem</a>
												<a class="dropdown-item fix-dropdown-item link-submit" href="/teaching-edit?id={{ $teach->id }}">Chỉnh sửa</a>
												{{-- <form action="{{ route('teaching-edit') }}" method="get">
													<a class="dropdown-item fix-dropdown-item link-submit">Chỉnh sửa</a>
													<input type="hidden" name="id" value="{{ $teach->id }}">
												</form> --}}
												<a class="dropdown-item fix-dropdown-item" data-toggle="modal" data-target="#modal-delete" onclick="appendid(
													{{$teach->id}},
													'{{$teach->subject_id}}',
													'{{$teach->lesson_number}}',
													'{{$teach->file_content}}');">Xóa bài</a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="paginate_table">
								{{ $teaching->appends(request()->all())->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
		<div id="modal-delete" class="modal fade" role="dialog" data-keyboard="true">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="display:inline;">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color: #ff4747">Xóa bài giảng</h4>
					</div>
					<div class="modal-body">
						<h4>Nội dung được chọn</h4>
						<p>Bài giảng môn :<span style="font-size: 16px; font-weight: bold;" id="modal-sj"></span></p>
						<p>Buổi :<span style="font-size: 16px; font-weight: bold;" id="modal-lesson"></span> </p>
						<p>Với tệp đính kèm : <span style="font-size: 16px; font-weight: bold;" id="modal-file"></span></p>
					</div>
					<div class="modal-footer">
						<form action="{{ route('teaching-delete') }}" method="POST">
							@csrf
							<button type="submit" class="btn btn-inverse-danger btn-fw" id="btn-delete">Xóa bài</button>
							<input type="hidden" id="id_delete" value="" name="id">
							<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
						</form>
					</div>
				</div>

			</div>
		</div>
		<!-- partial:partials/_footer.html -->
	</div>
	@if(Session::get('status') != null)
	<script>
		$(document).ready(function(){
			var title = "{{ Session::get('status') }}";
			alert(title);
		});
	</script>
	<?php Session::flash('status', null); ?>
@endif
 <script>
	$(document).ready(function(){
			$.ajax({
				type: 'POST',
				url: '/forgetSession',
				data: {
					_token: '{{ csrf_token() }}',
					key: 'status'
				}
			})
			.done(function(rs) {
				
			})
			.fail(function() {
				console.log("Lỗi");
			})
	});
</script>

@endsection