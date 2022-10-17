@extends('admin.layout.master')
@section('title','Post Show')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Xem Bài Viết</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <div class="form-group">
                    <label>Category:</label>
                        @foreach($categories as $category)
                            @if ($post->category_id == $category->id)
                                <p>{{$category->name}}</p>
                            @endif                            
                        @endforeach
                </div>
                <div class="form-group">
                    <label>Tiêu Đề</label>
                    <p>{{ $post->title }}</p>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <p>{{ $post->descripton }}</p>
                </div>
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    {{-- <img src="{{ $post->imageUrl() }}" alt="" width="200px" height="200px">                     --}}
                    <td><img src="{{ url('uploads') }}/{{ $post->image }}" alt="" width="100px" height="100px"></td>

                </div>
                <div class="form-group">
                    <label>Nội Dung</label>
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection