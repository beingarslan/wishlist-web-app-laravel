<!-- Navbar -->
@php
    if (Auth::check()) {
        $userName = rawurldecode(Auth::user()->name);
        $userName = str_replace(' ', '-', $userName);
    } else {
        $userName = 'login';
    }
    
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand ms-2 ms-md-4" href="{{ url('/') }}">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-0 px-md-2">
                    <a class="nav-link active" aria-current="page" href="{{ url('/faq') }}">
                        <img src="{{ asset('front-end/img/nav-icons/2.png') }}"  alt="">
                    </a>
                </li>
                <li class="nav-item px-0 px-md-2">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('front-end/img/nav-icons/1.png') }}"  alt="">
                    </a>
                </li>
                <li class="nav-item px-0 px-md-2">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('front-end/img/nav-icons/4.png') }}"  alt="">
                    </a>
                </li>
                <li class="nav-item px-0 px-md-2">
                    {{-- {{ dd(auth()->user()->name) }} --}}
                    <a class="nav-link" href="/{{ $userName }}">
                        <img src="{{ asset('front-end/img/nav-icons/3.png') }}"  alt="">
                    </a>
                </li>
                <li class="nav-item px-0 px-md-2">
                    @if (Auth::check())
                        <a class="nav-link navbar-brand" style="color:#80368f" aria-current="page"
                            href="{{ url('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    @else
                        <a class="nav-link navbar-brand" style="color:#80368f" aria-current="page"
                            href="{{ url('/login') }}">
                            login
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
