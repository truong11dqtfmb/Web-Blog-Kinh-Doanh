@extends('admin.layout.master')
@section('title','Post Create')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Mới Bài Viết</h1>
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
                <form action="{{route('ad.post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="category_id">
                            <option>--Vui Lòng Chọn Danh Mục--</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="title" placeholder="Please Enter Title" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input class="form-control" name="description" placeholder="Please Enter Decription" />
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="image" class="form-control" placeholder="Please Enter Image " />
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="content" name="content" placeholder="Please Enter Content" class="ckeditor"></textarea>
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