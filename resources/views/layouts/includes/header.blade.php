<!-- Logo -->
<a href="{{ url('dashboard/home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>GOL</b>DEN</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>GOLDEN</b>GYM</span>

</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ auth()->user()->image_path }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">

                        <p>
                            {{ auth()->user()->name }}
                            <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                   
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <form action="{{ route('dashboard.logout') }}">
                                <input type="submit" class="btn btn-default btn-flat" value="Sign out">
                            </form>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
