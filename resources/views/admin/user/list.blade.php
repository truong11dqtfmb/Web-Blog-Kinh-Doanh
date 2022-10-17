@extends('admin.layout.master')
@section('title','User List')

@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Sách Tài Khoản</h1>
            </div>
            <hr>
            <div class="col-lg-12">
                @if(session('success'))
                <div class="alert alert-success ">
                    {{session('success')}}
                </div>
                @endif
            </div>
            <div>
                @if(session('error'))
                <div class="alert alert-danger ">
                    {{session('error')}}
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <form action="" class="form-inline">
                {{-- @csrf --}}
                <div class="form-group">
                    <input type="text" name="key" class="form-control">
                    <button type="submit" name="" class="form-control">Search</button>
                </div>
            </form>
            <table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Tài Khoản</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="odd gradeX" align="center">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                            @if ($user->is_admin == 1)
                                Admin
                            @else
                                User
                            @endif</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('ad.user.delete',$user->id)}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('ad.user.edit',$user->id)}}"> Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>
        {{ $users->appends(request()->all())->links() }}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection