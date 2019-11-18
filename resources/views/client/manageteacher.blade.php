@extends('client.app')
@section('content')
       <!-- partial -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Quản lý giáo viên</h2>
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm mới</button>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Tên giáo viên</th>
                          <th>Ngày sinh</th>
                          <th>Địa chỉ</th>
                          <th>Email</th>
                          <th>Tùy chọn</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($teachers as $teacher)
                        <tr>
                          <td>
                            {{$teacher->fullname}}
                          </td>
                          <td>{{$teacher->birthday}}</td>
                          <td >{{$teacher->address}}</td>
                          <td>
                            {{$teacher->email}}
                          </td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn text-danger btn-link btn-sm px-2 btn-edit"  data-href="/client/update/{{$teacher->id}}"><i class="material-icons">edit</i></button>
                            <button type="button" class="btn  btn-link btn-sm px-2" data-toggle="modal" data-target="#modalDelete{{$teacher->id}}"><i class="material-icons">close</i></button>
                             <!-- Modal -->
<div id="modalDelete{{$teacher->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title">Xác nhận xóa</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thực sự muốn xóa?</p>
            </div>
            <div class="modal-footer">
                <form action="/client/delete/{{$teacher->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát
                    </button>
                    <button type="submit" class="btn btn-danger">Xóa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> 
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
            
                  </div>
                </div>
              </div>
         
 <!-- Modal edit -->
    <div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Category</h5>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                            <div class="card">
                <div class="card-body">
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Tên giáo viên</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Tên giáo viên">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày sinh</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="birthday" placeholder="Ngày sinh">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Địa chỉ</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" name="email" placeholder="Email">
                    </div>
                    
                  </form>
                </div>
              </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

  <!-- Modal create -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
        <form id="editForm" method="POST" action="/client/create" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                   
                    <div class="modal-body">

                        <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Tên giáo viên</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Tên giáo viên">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày sinh</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="birthday" placeholder="Ngày sinh">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Địa chỉ</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email</label>
                      <input type="email" class="form-control" id="exampleInputConfirmPassword1" name="email" placeholder="Email">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Tên người dùng</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" name="username" placeholder="tên người dùng">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputConfirmPassword1" name="password" placeholder="mật khẩu">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Xác nhận mật khẩu</label>
                      <input type="password" class="form-control" id="exampleInputConfirmPassword1" name="confirmation_password" placeholder="Nhập lại mật khẩu">
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
      
      </div>
      
    </div>
  </div>
@endsection
@push('scripts')
<script>
    // Click edit button
    $('.btn-edit').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });
</script>
@endpush
