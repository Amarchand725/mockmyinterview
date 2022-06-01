<header class="header">
    <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 ">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        @if($home_page_data['header_logo'])
            <h1 class="logo">
                <a href="{{ route('dashboard') }}"> 
                    <img src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_logo'] }}" style="width: 80px" alt="logo" class="img-fluid">
                </a>
            </h1>
        @endif
        <div class="float-left" style="margin-left:140px !important"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                {{-- <li class="nav-item dropdown messages-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>Notifications </span>
                        <i class="fa fa-bell-o"></i>
                        
                        <span class="label label-success bg-success">{{ count(getNotifications()) }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <ul class="dropdown-menu-over list-unstyled">
                            <li>
                                <ul class="menu list-unstyled">
                                    @foreach (getNotifications() as $notification)
                                        <li>
                                            @php $route = $notification->notify_type.".index" @endphp 
                                            <a href="{{ route($route) }}">
                                                <div class="pull-left">
                                                    <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    {{ \Illuminate\Support\Str::limit(getNotify($notification->notify_id, $notification->notify_type)->title,20) }}<br />
                                                    
                                                </h4>
                                                <p>
                                                    {{ \Illuminate\Support\Str::limit($notification->message, 20) }}<br />
                                                    <small><i class="fa fa-clock-o"></i> {{ $notification->created_at->diffForHumans() }}</small>
                                                </p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="footer-ul text-center"><a href="#">See All Messages</a></li>
                        </ul>
                    </div>
                </li> --}}

                <li class="nav-item dropdown  user-menu">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        <img src="http://via.placeholder.com/160x160" class="user-image" alt="User Image">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('my_profile') }}">My profile</a>
                        <a class="dropdown-item border-top" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>