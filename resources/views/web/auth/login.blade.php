@extends('web.layout.master')
@section('title','Login')
          
        
@section('content')
<section class="section " style="margin: 132px 0 0 0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        @if(session('error'))
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12">
                            <form class="form-wrapper" action="{{ route('web.login_post') }}" method="post">
                                @csrf
                                <input type="text" name="email" class="form-control" placeholder="Your Email">
                                <input type="password" name="password" class="form-control" placeholder="Your password">
                                <button type="submit" class="btn btn-primary">Login </button>
                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
                <hr class="invis">

            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection