@extends('admin.layout.master')
@section('title','Category Edit')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh Sửa Danh Mục</h1>
            </div>
            <br><br><br>
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
                <form action="{{route('ad.category.update',$cat->id)}}" method="POST">
                    @csrf
                    @method('Put')
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input class="form-control" name="name" value="{{ $cat->name }}" required placeholder="Please Enter Category Name" />
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
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