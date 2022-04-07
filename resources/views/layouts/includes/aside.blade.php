<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ auth()->user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ url('dashboard/home') }}">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            @can(['list-gymManagers', 'create-gymManagers'], 'admin')
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Gym Managers</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>
            @endcan
            @can(['list-cityManagers', 'create-cityManagers'], 'admin')
                <li>
                    <a href="{{ route('dashboard.city-managers.index') }}">
                        <i class="fa fa-th"></i> <span>City Managers</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>
            @endcan
            @can(['list-users', 'create-users'], 'admin')
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Users</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>
            @endcan
            @can(['list-cities', 'create-cities'], 'admin')
                <li>
                    <a href="{{ route('dashboard.cities.index') }}">
                        <i class="fa fa-th"></i> <span>Cities</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>
            @endcan
            @can(['list-gyms', 'create-gyms'], 'admin')
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Gyms</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>
            @endcan
            @can(['list-trainingPackages', 'create-trainingPackages'], 'admin')
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Training Packages</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>
            @endcan
            @can(['list-coaches', 'create-coaches'], 'admin')
                <li>
                    <a href="{{route('dashboard.coaches.index')}}">
                        <i class="fa fa-th"></i> <span>Coaches</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>
            @endcan
            @can(['list-attendance', 'create-attendance'], 'admin')
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Attendance</span>
                        <span class="pull-right-container">
            </span>
                    </a>
                </li>
            @endcan
            @can(['list-buyPackage', 'create-buyPackage'], 'admin')
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Buy Package</span>
                        <span class="pull-right-container">
            </span>
                    </a>
                </li>
            @endcan
            @can(['list-revenue', 'create-revenue'], 'admin')
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Revenue</span>
                        <span class="pull-right-container">
            </span>
                    </a>
                </li>
            @endcan
    </ul>
</section>
