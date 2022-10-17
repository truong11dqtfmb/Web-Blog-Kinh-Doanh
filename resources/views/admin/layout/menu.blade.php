<ul class="nav" id="side-menu">
    <li class="sidebar-search">
        <!-- /input-group -->
    </li>
    <li>
        <a href="{{ route('ad.post.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
    </li>
    <li>
        <a href="{{route('ad.category.index')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('ad.category.index')}}">List Category</a>
            </li>
            <li>
                <a href="{{route('ad.category.create')}}">Add Category</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="{{route('ad.post.index')}}"><i class="fa fa-cube fa-fw"></i> Post<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('ad.post.index')}}">List Post</a>
            </li>
            <li>
                <a href="{{route('ad.post.create')}}">Add Post</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>

    <li>
        <a href="{{route('ad.user.index')}}"><i class="fa fa-user fa-fw"></i> User<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('ad.user.index')}}">List User</a>
            </li>
            <li>
                <a href="{{route('ad.user.create')}}">Add User</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="{{route('ad.contact.index')}}"> Contact<span class="fa arrow"></span></a>
        <!-- /.nav-second-level -->
    </li>
</ul>