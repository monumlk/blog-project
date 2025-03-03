 <div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            {{-- <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href=""{{ url('http://blogproject.test') }}"">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""{{ url('http://blogproject.test/aboutus') }}"">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('http://blogproject.test/login') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        {{-- <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div> --}}
        <div class="menu_main">
            <ul>
                <li ><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('http://blogproject.test/aboutus') }}">About</a></li>
                <li><a href="{{ url('http://blogproject.test/login') }}">Blog</a></li>
                <li><a href="{{url('http://blogproject.test/services')}}">Services</a></li>
                <li><a href="{{url('http://blogproject.test/contect')}}">Contact</a></li>
                {{-- @auth
                    <li>
                        <x-app-layout />
                    </li>
                @else
                    <li><a  href="{{ route('login') }}">Login</a></li>
                    <li><a  href="{{ route('register') }}">Register</a></li>
                @endauth --}}
            </ul>
        </div>
    </div>
</div> 

