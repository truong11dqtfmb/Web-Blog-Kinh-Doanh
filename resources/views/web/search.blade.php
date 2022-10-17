@extends('web.layout.master')
@section('title')
Search: {{ $key }} 
@endsection    
@section('content')
    <section class="section mt-5">
        <h3 class="text-center">Từ khóa tìm kiếm: <strong><i><u>{{ $key }} </u></i></strong></h3>
        <div class="container   ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                @foreach ($posts as $post) 

                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="{{ route('web.post',$post->id) }}" title="">
                                                    <img src="{{ $post->imageUrl() }}" alt="" width="200px" height="200px" >
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->

                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="{{ route('web.post',$post->id) }}" title="">{{ $post->title }}</a></h4>
                                            <a href="{{ route('web.post',$post->id) }}" title=""><p>{{ $post->sumary }}</p></a>
                                            <b><a href="{{ route('web.category',$post->category->id) }}" title="">{{ $post->category->name }}</a></b><br>
                                            <small><a href="{{ route('web.post',$post->id) }}" title="">{{ $post->created_at }}</a></small>
                                            {{-- <small><a href="tech-single.html" title="">{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-y') }}</a></small> --}}

                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                    <hr class="invis">

                                @endforeach

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <hr>
                            {{ $posts->appends(request()->all())->links() }}
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
            </div><!-- end container -->
    </section>

@endsection
