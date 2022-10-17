@extends('admin.layout.master')
@section('title','Post Edit')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh Sửa Bài Viết</h1>
            </div>
            <br><br><br>

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
                <div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('ad.post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('Put')
                    <div class="form-group">
                        <label>Danh Mục </label>
                        <select class="form-control" name="category_id">
                            <option>--Vui Lòng Chọn Danh Mục--</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if ($post->category_id == $category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="title" value="{{ $post->title }}" placeholder="Please Enter Title" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input class="form-control" name="description" value="{{ $post->description }}" placeholder="Please Enter Sumary" />
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="image" class="form-control" value="{{ $post->image }}" placeholder="Please Enter Image " />
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="content" name="content" placeholder="Please Enter Content" class="ckeditor">{{ $post->content }}</textarea>
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