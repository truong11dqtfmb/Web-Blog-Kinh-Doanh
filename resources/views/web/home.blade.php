@extends('web.layout.master')
@section('title','ĐQT BLOG')
          
        
@section('content')
<div class="container">
    <h2 class="text-center" style="margin: 70px 0 0 0 ">BÀI VIẾT NỔI BẬT</h2>
    <div class="container justify-center " style="margin: 10px 0 0 0 ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

                @foreach ($post_carousels as $carousel)
                
                    <div class="carousel-item active">
                        <a href="{{ route('web.post',$carousel->id) }}"><img src="{{ url('uploads') }}/{{ $carousel->image }}" class="d-block" width="1200px" height="500px" alt="Đào Quốc Trượng"></a>
                        <div class="carousel-caption d-none d-md-block">
                        <h5 style="margin-bottom: 0px"><a href="{{ route('web.post',$carousel->id) }}">{{ $carousel->title }}</a></h5>
                        <p><a href="{{ route('web.post',$carousel->id) }}">{{ $carousel->description }}</a></p>
                        <div style="margin-top: -35px">
                            <small><a href="" title="">{{ $carousel->created_at }}</a></small>
                            <small><a href="" title="">By <b>{{ $carousel->user->name }}</b> </a></small>
                            <small><a href="" title=""><i class="fa fa-eye"></i><b> {{ $carousel->view_counts }}</b> </a></small>
                        </div>
                        </div>
                    </div>

                @endforeach            
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
    <section class="section">
            <div class="container">
                <div class="container">
                    <h3 clall="text-center">BÀI VIẾT MỚI NHẤT</h3>
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
                                            <a href="{{ route('web.post',$post->id) }}" title=""><p>{{ $post->description }}</p></a>
                                            <b><a href="{{ route('web.category',$post->category->id) }}" title="">{{ $post->category->name }}</a></b><br>
                                            <small><a href="{{ route('web.post',$post->id) }}" title="">{{ $post->created_at }}</a></small>
                                            <small><a href="" title="">by {{ $post->user->name }}</a></small>
                                            <small><a href="" title=""><i class="fa fa-eye"></i>{{ $post->view_counts }}</a></small>
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
