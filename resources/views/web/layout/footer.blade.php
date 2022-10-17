<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="widget">
                    <div class="footer-text text-left">
                        <a href="{{ route('web') }}"><img src="images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                        <p>ĐQT Blog is a blog sharing information ĐÀO QUỐC TRƯỢNG.</p>
                        <div class="social">
                            <a href="{{ route('web') }}" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                            <a href="{{ route('web') }}" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="{{ route('web') }}" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="{{ route('web') }}" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                            <a href="{{ route('web') }}" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-left">
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Category</h2>
                    <div class="link-widget">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('web.category',$category->id) }}">{{ $category->name }} <span>{{ $category->post->count() }}</span></a></li>
                            @endforeach
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <div class="copyright">&copy; ĐQT Blog. Design: <b> HTML Design</b>.</div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->