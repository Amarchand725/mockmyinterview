<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        @if($home_page_data['header_logo'])
            <h1 class="logo">
                <a href="{{ url('/') }}"> 
                    <img src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_logo'] }}" alt="logo" class="img-fluid">
                </a>
            </h1>
        @endif
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">LOG IN</a></li>
                <li><a class="nav-link scrollto {{ request()->is('signup') ? 'active' : '' }}" href="{{ route('signup') }}">SIGN-UP</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>