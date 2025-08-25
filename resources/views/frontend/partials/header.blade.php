@auth
@php
$currentUser = Auth::user()
@endphp
@endauth
<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                @if ($global_option != '0')
                <i class="bi bi-envelope d-flex align-items-center">
                    @if ($global_option->email)
                    <a href="mailto:{{$global_option->email}}" class="text-white ms-2"> {{$global_option->email}}</a>
                    @else
                    <a href="#" class="text-white ms-2"> Update Email</a>
                    @endif
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4 ">
                    @if ($global_option->phone)
                    <span class="ms-2">{{$global_option->phone}}</span>
                    @else
                    <span>+62-xxxx-xxxx</span>
                    @endif
                </i>
                @else
                <i class="bi bi-envelope d-flex align-items-center">
                    <a href="#" class="text-white ms-2"> Update Email</a>
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <span>+62-xxxx-xxxx</span>
                </i>
                @endif
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" >Staf</a>
                <a href="#" >Siswa</a>
                <a href="#" >Alumni</a>
                <a href="#" >Kunjungan</a>
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/@005ilir" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-end">
            @if ($global_option != '0')
            @if ($global_option->logo_menu)
            <a href="{{route('root')}}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('') }}uploads/images/logo/{{ $global_option->logo_menu }}" alt="SDN 005 Samarinda Ilir">
            </a>
            @else
            <a href="{{route('root')}}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('') }}assets/frontend/img/logo.png" alt="">
            </a>
            @endif
            @endif
            <nav id="navmenu" class="navmenu ">
                <ul>
                    <li><a href="{{route('root')}}" class="active">Home</a></li>

                    <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#recent-blog-postst">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @guest
            @if (Route::has('login'))
            <a class="cta-btn" href="{{ route('login') }}">{{ __('Sign In') }}</a>
            @endif
            @else
            <div class="dropdown ms-3 d-xl-block d-lg-block d-md-block d-none" >
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ ($currentUser->imageThumbUrl) ? $currentUser->imageThumbUrl : '/assets/images/avatar/avatar-4.png' }}" alt="mdo" width="32" height="32" class="rounded-circle">
                    <span class="mx-2">
                        {{ $currentUser->name }}
                    </span>
                </a>
                <ul class="mt-3 dropdown-menu text-small dropdown-menu-lg-end">
                    <li><a class="dropdown-item" href="{{ route('backend.dashboard')}}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="#">Password</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out me-2" aria-hidden="true"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endguest
        </div>

    </div>

</header>
