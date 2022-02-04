 <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('about')}}">About</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('contact')}}">Contact</a></li>

                        @if(Auth::check())

                         <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('dashboard')}}">Dashboard</a></li>
                         <li class="nav-item">
                           <form id="logout-form" action="{{route('logout')}}"  method="POST">@csrf</form>
                            <a class="nav-link px-lg-3 py-3 py-lg-4" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
                         </li>
                        @else

                         <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('login')}}">Login</a></li>
                    
                         <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('register')}}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>