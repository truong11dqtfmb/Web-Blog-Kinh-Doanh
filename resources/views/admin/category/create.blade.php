@extends('admin.layout.master')
@section('title','Category Create')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Mới Danh Mục</h1>
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
                <form action="{{route('ad.category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
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