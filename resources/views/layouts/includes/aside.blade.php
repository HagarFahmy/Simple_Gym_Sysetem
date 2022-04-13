<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            {{-- <img src="{{ auth()->user()->image }}" class="img-circle" alt="User Image"> --}}
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
                <i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        @can(['list-gymManagers', 'create-gymManagers'], 'admin')
            <li>
                <a href="../widgets.html">
                    <i class="fa-regular fa-address-card nav-icon"></i> <span>Gym Managers</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-cityManagers', 'create-cityManagers'], 'admin')
            <li>
                <a href="{{ route('dashboard.city-managers.index') }}">
                    <i class="fa-solid fa-address-card"></i> <span>City Managers</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-users', 'create-users'], 'admin')
            <li>
                <a href="{{ route('dashboard.users.index') }}">
                    <i class="fa-solid fa-user-group nav-icon"></i> <span>Users</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-cities', 'create-cities'], 'admin')
            <li>
                <a href="{{ route('dashboard.cities.index') }}">
                    <i class="fa-solid fa-building"></i> <span>Cities</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-gyms', 'create-gyms'], 'admin')
            <li>
                <a href="{{ route('dashboard.gyms.index') }}">
                    <i class="fa-solid fa-dumbbell nav-icon"></i> <span>Gyms</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-trainingPackages', 'create-trainingPackages'], 'admin')
            <li>
                <a href="../widgets.html">
                    <i class="fa-solid fa-box-archive"></i> <span>Training Packages</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-trainingSession', 'create-trainingSession'], 'admin')
            <li>
                <a href="{{ route('dashboard.training-sessions.index') }}">
                    <i class="fa-solid fa-person-running"></i> <span>Training Session</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-coaches', 'create-coaches'], 'admin')
            <li>
                <a href="{{ route('dashboard.coaches.index') }}">
                    <i class="fa-solid fa-hand-back-fist nav-icon"></i> <span>Coaches</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-attendance'], 'admin')
            <li>
                <a href="{{ route('dashboard.attendance.index') }}">
                    <i class="fa-solid fa-calendar-days"></i> <span>Attendance</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-buyPackage', 'create-buyPackage'], 'admin')
            <li>
                <a href="{{ route('dashboard.buy-package.create') }}">
                    <i class="fa-solid fa-money-check-dollar"></i> <span>Buy Package for user</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
        @endcan
        @can(['list-revenue'], 'admin')

            <li class="nav-item menu-open">
                <a href="#">
                    <i class="fa-solid fa-sack-dollar"></i> <span>Revenue</span>
                    <i class="right fas fa-angle-left"></i>
                    <span class="pull-right-container">
                    </span>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('dashboard.revenue.index') }}">
                            <i class="fa-solid fa-dollar-sign"></i> <span>Purchases History</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.revenue.total') }}">
                            <i class="fa-solid fa-money-check-dollar"></i> <span>Total Revenue</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
        
                </ul>
            </li>

            
        @endcan

    </ul>
</section>
