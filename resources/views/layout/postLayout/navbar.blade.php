<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h1><span style="color: cornflowerblue">B</span>loggy</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.index')}}">All Posts</a>
                </li>
                @yield('userNav')


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Account
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">View Profile</a></li>
                        <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                    </ul>
                </li>
            @if(Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a class="nav-link" style="color: red; font-weight: bold" href="{{route('logout')}}">Log Out</a>
                    </li>
                    <li class="nav-item">
                           {{Auth::user()->name}}
                    </li>
                        @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Log In</a>
                    </li>
                @endauth
            @endif
                </ul>
        </div>

    </div>
    <form class="d-flex me-2" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

</nav>
