@extends('admin.layout.master')
@section('title','Category List')

@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Sách Danh Mục</h1>
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
                        <th>Tên Danh Mục</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="odd gradeX" align="center">
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('ad.category.delete',$category->id)}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('ad.category.edit',$category->id)}}"> Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>
        {{ $categories->appends(request()->all())->links() }}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection