@extends('layouts.app')
@section('content')

<div style="width: 100% !important" class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<h4 class="font-weight-bold mb-0">Thông tin cá nhân</h4>
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
						<div class="base-info">
							<div class="row">
								<div class="col-md-2 img-user">
									<img src="" alt="">
								</div>
								<div class="col-md-2 username">
									<p>@if($role == 3)Tên Sinh Viên @else Tên Giáo Viên @endif</p>
									<p>{{$customuser->fullname}}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-md-offset-4 facu-class" style="margin-left:33.33%;">
									<p>KHOA</p>
									<p style="text-transform: uppercase;">{{ $faculty->name }}</p>
								</div>
								@if($role ==3)
								<div class="col-md-4 facu-class">
									<p>LỚP</p>
									<p style="text-transform: uppercase;">{{ $class->name }}</p>
								</div>
								@endif
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection