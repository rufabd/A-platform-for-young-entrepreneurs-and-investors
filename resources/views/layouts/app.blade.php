<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>eXStartup</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body >
    <div id="app">

        <nav
            class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3 whole-nav"
        >
            <div class="container">
                    <a class="nav-link" class="navbar-brand " style="font-size: 24px"><span style="color: white">eX</span><span class="logo-2">Startup</span></a>


                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white link-effect" href="{{ url('/') }}">Home</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white link-effect">About Us</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link text-white link-effect">Contact Us</a>
                        </li>

                        @if (Auth::user())
                            <li class="nav-item">
                                <a href="/founder/project-posts" class="nav-link text-white link-effect">Founder Posts</a>
                            </li>
                            <li class="nav-item">
                                <a href="/skilled/hiring-posts" class="nav-link text-white link-effect">Skilled People</a>
                            </li>
                        @endif

                        @if (Auth::user())
                            @if (Auth::user()->role == 'founder')
                                {{-- {{ dd(Auth::user()) }} --}}
                                {{-- @if (Auth::user()->founder()) --}}
                                @foreach ($founder_profiles as $profile)
                                    @if (Auth::user()->id == $profile->user_id)
                                    <li class="nav-item">
                                        <a href="/project/posts" class="nav-link text-white link-effect">My Posts</a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        @endif

                        @if (Auth::user())
                            @if (Auth::user()->role == 'skilled')
                                @foreach ($skilled_profiles as $profile)
                                    @if (Auth::user()->id == $profile->user_id)
                                    <li class="nav-item">
                                        <a href="/skilled/posts" class="nav-link text-white link-effect">My Posts</a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        @endif

                        {{-- Admin Here --}}
                        @if (Auth::user())
                            @if (Auth::user()->role == 'admin')
                                    
                                    {{-- <li class="nav-item">
                                        
                                    </li> --}}

                                <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link text-white link-effect dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- {{ Auth::user()->name }} --}}
                                    Admin Rights
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" style="background-color: black"  aria-labelledby="navbarDropdown">

                                    <a href="/users" class="dropdown-item" style="color: white"><i class='bx bxs-user-badge'></i> {{ __('Users') }}</a>

                                    <a href="/project/hiring-tags" class="dropdown-item" style="color: white">
                                    <i class='bx bxs-purchase-tag' ></i> {{ __('Project Hiring Tags') }}
                                    </a>

                                    <a href="/project/industry-tags" class="dropdown-item" style="color: white">
                                    <i class='bx bx-purchase-tag' ></i> {{ __('Project Industry Tags') }}
                                    </a>

                                    <a href="/admin/project-posts" class="dropdown-item" style="color: white">
                                    <i class='bx bxl-blogger'></i> {{ __('Project Posts') }}
                                    </a>

                                    <a href="/admin/comments" class="dropdown-item" style="color: white">
                                    <i class='bx bxl-blogger'></i> {{ __('Project Post Comments') }}
                                    </a>

                                </div>
                            </li>
                            @endif
                        @endif

                        <li class="nav-item">
                            <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white link-effect" href="{{ route('login') }}">{{ __('Login/Register') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white link-effect" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                        
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-white link-effect dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" style="background-color: black"  aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" style="color: white"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class='bx bx-log-out' ></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ url('/dashboard') }}" style="color: white">
                                    <i class='bx bxs-dashboard' ></i> {{ __('Dashboard') }}
                                    </a>
                                    @if (Auth::user()->role == 'founder')
                                        
                                        <a class="dropdown-item" href="{{ route('dashboard-profile') }}" style="color: white">
                                        <i class='bx bxs-user'></i> {{ __('My Profile') }}
                                        </a>
                                        @elseif (Auth::user()->role == 'skilled')
                                            <a class="dropdown-item" href="{{ route('dashboard-profile-skilled') }}" style="color: white">
                                                <i class='bx bxs-user'></i> {{ __('My Profile') }}
                                            </a>

                                        @elseif(Auth::user()->role == 'investor')
                                            @if (Auth::user()->paid == true)
                                            <a class="dropdown-item" href="{{ route('dashboard-profile-investor') }}" style="color: white">
                                                <i class='bx bxs-user'></i> {{ __('My Profile') }}
                                            </a>
                                            @endif
                                    @endif
                                </div>
                        </li>
                        @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <style>
        .whole-nav {
            transition: 0.3s;
            background-color: black;
        }

        .logo-2 {
            color: orange;
        }

        li .link-effect:hover {
            border-bottom: 1px solid orange;
            transition: 0.5s ease;
        }

        .special-link {
            border: 1px solid orange;
            border-radius: 15px 2px;
        }

        .special-link:hover {
            background-color: orange;
            color: black;
        }
        .nav-link{
            cursor: pointer;
        }

        .dropdown-item:hover{
            background-color: orange;
            transition: 0.5s all ease
        }
    </style>
</body>
</html>
