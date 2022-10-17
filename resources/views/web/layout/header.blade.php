<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('web') }}"><img src="images/version/tech-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link btn" href="{{ route('web') }}"> <b style="font-size: 18px;"> ĐQT BLOG HOME </b></a>
                    </li>

                    @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.category',$category->id) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.contact') }}">Contact Us</a>
                    </li>
                </ul>

                
                
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('web.search')}}" style="margin-right: 50px">
                    <input class="form-control mr-sm-2" type="text" required name="key" placeholder="Search">
                    <button class="btn btn-danger " type="submit">Search</button>
                </form>
                @if (Auth::check())

                    <ul class="nav navbar-top-links navbar-right" style="margin-right: 100px">
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('web.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->
                @else
                    <ul class="nav navbar-top-links navbar-right" style="margin-right: 100px">
                        <!-- /.dropdown -->
                        <li>
                            <a href="{{ route('web.login') }}"><i class="fa fa-cube fa-fw"></i></a>
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->
                @endif
                
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
 


