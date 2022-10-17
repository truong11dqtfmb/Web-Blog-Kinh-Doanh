@extends('web.layout.master')
@section('title')
{{ $cate->name }}
    {{-- {{ $cate_posts->category->name }} --}}
@endsection
@section('content')
    
<section class="section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-custom-build">
                        @foreach ($cate_posts as $cat_post)
                            <div class="blog-box mb-5" style="margin-top:50px">
                                <div class="post-media">
                                    <a href="{{ route('web.post',$cat_post->id) }}" title="">
                                        <img src="{{ $cat_post->imageUrl() }}" alt="" width="200px" height="400px" >
                                        <div class="hovereffect">
                                            <span class="videohover"></span>
                                        </div>
                                        <!-- end hover -->
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="blog-meta big-meta text-center">

                                    <h4><a href="{{ route('web.post',$cat_post->id) }}" title="">{{ $cat_post->title }}</a></h4>
                                    <p><a href="{{ route('web.post',$cat_post->id) }}" title="">{{ $cat_post->description }}</a></p>
                                    <small>{{ $cat_post->created_at }}</small>
                                    <small>By <b>{{ $cat_post->user->name }}</b> </small>
                                    <small><i class="fa fa-eye"></i><b> {{ $cat_post->view_counts }}</b> </small>
                               
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                        @endforeach

                    </div><!-- end blog-custom-build -->
                </div><!-- end page-wrapper -->

            </div><!-- end col -->
            <hr>
            {{ $cate_posts->appends(request()->all())->links() }}
        </div>
    </div><!-- end container -->
</section>
@endsection
