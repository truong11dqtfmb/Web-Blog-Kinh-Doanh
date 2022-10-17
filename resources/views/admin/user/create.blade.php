@extends('admin.layout.master')
@section('title','User Create')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Mới Tài Khoản</h1>
            </div>
            <hr>
            <div class="col-lg-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('ad.user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên Tài Khoản</label>
                        <input class="form-control" name="name" placeholder="Please Enter User Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Please Enter Email" />
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
                            <input type="radio" name="is_admin" value="0" checked> User
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_admin" value="1"> Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                <form>
            </div>
        </div> 
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection