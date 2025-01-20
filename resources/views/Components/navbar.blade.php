<nav>
    <!-- LineUp -->
    <div class="container-fluid" id="NavbarLineUp">
        <div class="row h-100">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img src="./media/LogoBarberWB.png" alt="Logo" width="100px" height="100px">
            </div>
            <div class="col-12 col-md-6 container-fluid d-flex align-items-center justify-content-center">
                <div class="row align-items-center justify-content-evenly w-100">
                    <div class="col-4">
                        <div class="d-flex flex-row align-items-center justify-content-center w-100 h-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16" style="color: white; margin-right: 10px;">
                                <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5" />
                            </svg>
                            <div>
                                <p class="m-0 text-light" style="font-size: 1rem;">Call Us</p>
                                <p class="m-0 text-light" style="font-size: 1rem;">33-333-333-15</p>
                            </div>
                        </div>
                    </div>
                    @guest
                    <div class="col-4">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16" style="color: white; margin-right: 10px;">
                                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z" />
                            </svg>
                            <a href="{{route('login')}}" class="text-decoration-none mt-2">
                                Accedi
                            </a>
                        </div>
                    </div>
                    @endguest
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <div class="col-4">
                        <div class="dropdown">
                            <!-- Avatar (che apre il dropdown quando cliccato) -->
                            <div class="circle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <p class="fs-4 text-light">Ciao, {{Auth::user()->name}}</p>
                            </div>

                            <!-- Menu a discesa -->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#formLogOut').submit();">LogOut</a>
                                    <!-- Form di logout -->
                                    <form action="{{ route('logout') }}" method="POST" id="formLogOut" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @else
                    <!-- admin -->
                    <div class="col-4">
                        <div class="dropdown">
                            <!-- Avatar (che apre il dropdown quando cliccato) -->
                            <div class="circle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <p class="fs-3 text-light">Ciao, {{Auth::user()->name}}</p>
                            </div>
                            <!-- Menu a discesa -->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="#">Area Personale</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#formLogOut').submit();">LogOut</a>
                                    <!-- Form di logout -->
                                    <form action="{{ route('logout') }}" method="POST" id="formLogOut" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- LineDown -->
    @auth
    @if(Auth::user()->role == 'admin')
    <div class="container-fluid d-flex align-items-center" id="NavbarLineDown">
        <div class="row w-100 h-100 d-flex justify-content-around">
            <!-- links -->
            <div class="col-12 col-md-6 container-fluid d-flex align-items-center justify-content-around">
                <div class="row h-100 w-100">
                    <div class="col-3 d-flex align-items-center justify-content-around">
                        <a href="{{route('HomePage')}}">
                            Home
                        </a>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-around">
                        <a href="{{route('admin_reservation')}}">
                            Reservation
                        </a>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-around">
                        <a href="{{route('admin_employee')}}">
                            Employee
                        </a>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-around">
                        <a href="{{route('admin_panoramic')}}">
                            Panoramica
                        </a>
                    </div>
                </div>
            </div>
            <!-- searchBar -->
            <div class="col-12 col-md-4 h-100 d-flex align-items-center justify-content-center">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    @elseif (Auth::user()->role == "user")
    <div class="container-fluid d-flex align-items-center" id="NavbarLineDown">
        <div class="row w-100 h-100 d-flex justify-content-around">
            <!-- links -->
            <div class="col-12 col-md-6 container-fluid d-flex align-items-center justify-content-around">
                <div class="row h-100 w-100">
                    <div class="col-3 d-flex align-items-center justify-content-around">
                        <a href="{{route('HomePage')}}">
                            Home
                        </a>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-around">
                        <a href="#">
                            Our Staff
                        </a>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-around">
                        <a href="#">
                            Contacts
                        </a>
                    </div>
                </div>
            </div>
            <!-- searchBar -->
            <div class="col-12 col-md-4 h-100 d-flex align-items-center justify-content-center">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endauth

</nav>

