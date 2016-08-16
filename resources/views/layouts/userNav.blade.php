<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="/">Engage</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="@if($viewData['page'] == 'publications') active @endif">
                    <a href="{{ url('/publications') }}">Publications</a>
                </li>
                <li class="@if($viewData['page'] == 'contacts') active @endif">
                    <a href="{{ url('/contacts') }}">Contacts</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative; padding-left: 50px">
                        <img src="{{ asset('/uploads/avatars/') }}{{ '/'.Auth::user()->avatar }}" alt="Profile Image" class="profile-image-mini">
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu menu-links" role="menu">
                        <li><a href="{{ url('/settings') }}"><i class="fa fa-btn fa-cog"></i>Settings</a></li>
                        <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                {{--<li>--}}
                {{--<a href="#services">Services</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#contact">Contact</a>--}}
                {{--</li>--}}
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
