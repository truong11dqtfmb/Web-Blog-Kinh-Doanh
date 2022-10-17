@extends('admin.layout.master')
@section('title','User Edit')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh Sửa Tài Khoản</h1>
            </div>
            <hr>
            <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <div class="col-lg-12">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </div>
                    </ul>
                </div>
            @endif
            </div> 
            <div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('ad.user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('Put')
                    <div class="form-group">
                        <label>Tên Tài Khoản</label>
                        <input class="form-control" name="name" value="{{ $user->name }}" required placeholder="Please Enter User Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{ $user->email }}" required type="email" disabled />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" placeholder="Please Enter Password" type="password" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control" name="confirm" placeholder="Please Enter Confirm Password" type="password" />
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="0" @if (!$user->is_admin) checked @endif/> User
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="1" @if ($user->is_admin) checked @endif> Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Cập Nhật</button>
                <form>
            </div>
        </div> 
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection