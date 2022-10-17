@extends('web.layout.master')

@section('title')
    {{ $post->title }}
@endsection
@section('content')
<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="{{ route('web') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web.category',$post->category->id) }}">Blog</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('web.post',$post->id) }}">{{ $post->title }}</a></li>
                        </ol>

                        <span class="color-orange"><a href="{{ route('web.category',$post->category->id) }}" title="">{{ $post->category->name }}</a></span>

                        <h3>{{ $post->title }}</h3>

                        <div class="blog-meta big-meta">
                            <small>{{ $post->created_at }}</small>
                            <small>By <b>{{ $post->user->name }}</b> </small>
                            <small><i class="fa fa-eye"></i><b> {{ $post->view_counts }}</b> </small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="{{ route('web') }}" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="{{ route('web') }}" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="{{ route('web') }}" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="{{ $post->imageUrl() }}" alt="" width="500px" height="700px" >
                    </div><!-- end media -->

                    <div class="blog-content">  
                        <div class="pp">
                            {{-- <p>{{ $post->sumary }} </p> --}}

                            <i>{{ $post->sumary }}</i>


                            <p>{!! $post->content !!}</p>

                        </div><!-- end pp -->



                            
                        </div><!-- end pp -->
                    </div><!-- end content -->



                    <div class="custombox clearfix">
                        <h4 class="small-title">Bài Viết Liên Quan</h4>
                        <div class="row">
                            @foreach ($relate as $rela)
                                
                            <div class="col-lg-4">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{ route('web.post',$rela->id) }}" title="">
                                            <img src="{{ $rela->imageUrl() }}" alt="" width="200px" height="200px" >
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="{{ route('web.post',$rela->id) }}" title="">{{ $rela->title }}</a></h4>
                                        <small><a href="{{ route('web.post',$rela->id) }}" title=""> {{ $rela->created_at }}</a></small>
                                        <small><a href="" title="">by {{ $rela->user->name }}</a></small>
                                        <small><a href="" title=""><i class="fa fa-eye"></i>{{ $rela->view_counts }}</a></small>
                                            
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                            @endforeach

                        </div><!-- end row -->
                    </div><!-- end custom-box -->


                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">{{ $post->comment->count() }} Comment</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    @foreach ($comments as $comment)
                                    <div class="media">
                                        {{-- <a class="media-left" href="#">
                                            <img src="upload/author.jpg" alt="" class="rounded-circle">
                                        </a> --}}
                                        <div class="media-body">
                                            <h4 class="media-heading user_name">{{ $comment->user->name }}
                                            <small> {{ $comment->created_at }}</small>
                                        </h4>
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    @if (Auth::check())
                        <div class="custombox clearfix">
                            <h4 class="small-title">Comment Form</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-wrapper" action="{{ route('web.post.comment',$post->id) }}" method="post">
                                        @csrf
                                        <textarea class="form-control" name="content" placeholder="Your comment"></textarea>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif


                    <hr class="invis1">

                </div><!-- end page-wrapper -->
            </div><!-- end col -->


        </div><!-- end row -->
        
    </div><!-- end container -->
</section>
@endsection