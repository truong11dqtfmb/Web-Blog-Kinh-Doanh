@extends('admin.layout.master')
@section('title','Post List')

@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Sách Bài Viết</h1>
            </div>
            <hr> 
            <div class="col-lg-12">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
            </div>
            <div>
                @if(session('error'))
                <div class="alert alert-danger">
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
                        <th>Tiêu Đề</th>
                        <th>Danh Mục</th>
                        <th>Hình Ảnh</th>
                        <th>Xem</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="odd gradeX" align="center">
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>
                        {{-- <td><img src="{{ $post->imageUrl() }}" alt="" width="100px" height="100px"></td> --}}
                        <td><img src="{{ url('uploads') }}/{{ $post->image }}" alt="" width="100px" height="100px"></td>
                        {{-- <td>{{ url('uploads') }}/{{ $post->image }}</td> --}}
                        <td class="center"><i class="fa fa-file-o  fa-fw"></i><a href="{{route('ad.post.show',$post->id)}}"> Xem</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('ad.post.delete',$post->id)}}"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('ad.post.edit',$post->id)}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            {{ $posts->appends(request()->all())->links() }}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection