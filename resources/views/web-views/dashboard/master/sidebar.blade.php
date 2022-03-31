<aside>
    <div class="sidebar left ">
        <ul class="list-sidebar bg-defoult">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard </span>
                </a>
            </li>
            @can('schedule interview-list')
            <li>
                <a href="{{ route('book-interview') }}" class="{{ request()->is('book-interview') ? 'active' : '' }}">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-label">Book Interview</span></a>
            </li>
            @endcan
            @can('report-list')
            <li>
                <a href="{{ route('report') }}" class="{{ request()->is('report') ? 'active' : '' }}">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span>
                </a>
            </li>
            @endcan
            @can('test setup-list')
            <li>
                <a href="{{ route('test_setup') }}" class="{{ request()->is('test_setup') ? 'active' : '' }}">
                    <i class="fa fa-laptop"></i> <span class="nav-label">Test My setup</span>
                </a>
            </li>
            @endcan
            @can('notifications-list')
            <li>
                <a href="{{ route('notifications') }}" class="{{ request()->is('notifications') ? 'active' : '' }}">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="nav-label">Notifications</span>
                </a>
            </li>
            @endcan
            @can('booked interviews-list')
            <li> <a href="{{ route('booked-interviews') }}" class="{{ request()->is('booked-interviews') ? 'active' : '' }}">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-label">Booked Interviews </span></a>
            </li>
            @endcan
            @can('resources-list')
            <li>
                <a href="{{ route('blog-resources') }}" class="{{ request()->is('blog-resources') ? 'active' : '' }}">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Resources</span>
                </a>
            </li>
            @endcan
            @can('buy & credits-list')
            <li>
                <a href="{{ route('buy-credits') }}" class="{{ request()->is('buy-credits') ? 'active' : '' }}">
                    <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Buy Credits</span>
                </a>
            </li>
            @endcan
            @can('refer & earn-list')
            <li>
                <a href="{{ route('refer_and_earn') }}" class="{{ request()->is('refer_and_earn') ? 'active' : '' }}">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="nav-label">Refer and Earn</span>
                </a>
            </li>
            @endcan
            <li>
                <a href="{{ route('my_profile') }}" class="{{ request()->is('my_profile') ? 'active' : '' }}">
                    <i class="fa fa-user"></i>
                    </i> <span class="nav-label">My Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
