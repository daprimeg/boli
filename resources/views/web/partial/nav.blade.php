<style>
    .dropdown-menu {
        background-color: var(--items-background) !important;
        backdrop-filter: blur(1px) !important;
        text-align: left;
    }

    .dropdown-item {
        color: white;
        padding: 10px 20px;
        text-align: left !important;
    }

    .dropdown-item:hover {
        background-color: var(--text-color) !important;
        /* hover effect */
    }

    .nav-link.dropdown-toggle {
        cursor: pointer;
    }



    .expore-megemenu {
        border: 1px solid var(--items-border-colur);
        padding: 11px 17px;
        color: white;
        border-radius: 5px;
        width: 250px;
        transition: .5s
    }

    .expore-megemenu:hover {
        cursor: pointer;
        border: 1px solid var(--text-color) !important;
    }

    .explore-morebtn:hover {
        cursor: pointer;
        border: 1px solid var(--text-color) !important;
    }

    .explore-morebtn {
        border: 1px solid var(--items-border-colur) !important;
        border-radius: 4px;
        transition: .5s
    }
    .btn-hover-getstarted:hover{
        background: var(--text-color) !important;
    }

    
</style>
<nav class="navbar navbar-expand-lg custom-navbar  navbar-dark" style="font-family: var(--font-family); ">
    <div id="navbar" class="container-fluid py-3"
        style="position: fixed; top:0px; left: 4px; background: var(--background-color) !important; z-index: 400000; padding: 0px 50px">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('/public/theme/assets/nave-icon.png') }}" alt="Logo" class="me-2" />
        </a>

        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a
                        class="nav-link  {{ Request::is('autionshadule') ? 'active' : '' }}"href="{{ url('/autionshadule') }}">Auction
                        Solutions</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link {{ Request::is('features') ? 'active' : '' }}"
                        href="{{ url('/features') }}">Features</a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link {{ Request::is('/pricing') ? 'active' : '' }}"
                        href="{{ url('/pricing') }}">Pricing</a>
                </li>


                <!-- Explore Dropdown -->
                <!-- Explore Mega Dropdown -->
                <li class="nav-item dropdown position-static">
                    <a class="nav-link  dropdown-toggle  Request::is('exploreedry') ||
                        Request::is('exploreevery') || Request::is('explore-tools') ? 'active' : '' }}" href="#"
                        id="exploreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Explore
                    </a>

                    <div class="dropdown-menu w-100 mt-0 border-0 shadow"
                        style="position: fixed; left:-19px; top: 60px; height: 100%; z-index: 21000; background: rgba(18, 18, 18, 0.57) !important; "
                        aria-labelledby="exploreDropdown">
                        <div class="container py-3"
                            style="background: var(--background-color); border: 1px solid var(--items-border-colur) !important; border-radius: 4px; width: 43% !important;">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <a href="" class="text-decoration-none">
                                        <div class="expore-megemenu">
                                            <div class="d-flex">
                                                <i class="fa-brands fa-medapps" style="padding-right: 10px"></i>
                                                <h6 class=" text-white ">Resorese</h6>
                                            </div>
                                            <p style="font-size: 12px; margin-bottom: 0px !important;">Lorem ipsum dolor
                                                sit, amet consectetur adipisicing elit. Molestiae, autem. Debitis,
                                                libero?</p>

                                        </div>
                                    </a>

                                    <a href="" class="text-decoration-none">
                                        <div class="expore-megemenu mt-3">
                                            <div class="d-flex">
                                                <i class="fa-brands fa-medapps" style="padding-right: 10px"></i>
                                                <h6 class=" text-white ">Resorese</h6>
                                            </div>
                                            <p style="font-size: 12px; margin-bottom: 0px !important;">Lorem ipsum dolor
                                                sit, amet consectetur adipisicing elit. Molestiae, autem. Debitis,
                                                libero?</p>

                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="" class="text-decoration-none">
                                        <div class="expore-megemenu">
                                            <div class="d-flex">
                                                <i class="fa-brands fa-medapps" style="padding-right: 10px"></i>
                                                <h6 class=" text-white ">Resorese</h6>
                                            </div>
                                            <p style="font-size: 12px; margin-bottom: 0px !important;">Lorem ipsum dolor
                                                sit, amet consectetur adipisicing elit. Molestiae, autem. Debitis,
                                                libero?</p>

                                        </div>
                                    </a>

                                    <a href="" class="text-decoration-none">
                                        <div class="expore-megemenu mt-3">
                                            <div class="d-flex">
                                                <i class="fa-brands fa-medapps" style="padding-right: 10px"></i>
                                                <h6 class=" text-white ">Resorese</h6>
                                            </div>
                                            <p style="font-size: 12px; margin-bottom: 0px !important;">Lorem ipsum dolor
                                                sit, amet consectetur adipisicing elit. Molestiae, autem. Debitis,
                                                libero?</p>

                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="" class="text-decoration-none">
                                        <div class="expore-megemenu">
                                            <div class="d-flex">
                                                <i class="fa-brands fa-medapps" style="padding-right: 10px"></i>
                                                <h6 class=" text-white ">Resorese</h6>
                                            </div>
                                            <p style="font-size: 12px; margin-bottom: 0px !important;">Lorem ipsum dolor
                                                sit, amet consectetur adipisicing elit. Molestiae, autem. Debitis,
                                                libero?</p>

                                        </div>
                                    </a>

                                    <a href="#" class="text-decoration-none">
                                        <div class="expore-megemenu mt-3">
                                            <div class="d-flex">
                                                <i class="fa-brands fa-medapps" style="padding-right: 10px"></i>
                                                <h6 class=" text-white ">Resorese</h6>
                                            </div>
                                            <p style="font-size: 12px; margin-bottom: 0px !important;">Lorem ipsum dolor
                                                sit, amet consectetur adipisicing elit. Molestiae, autem. Debitis,
                                                libero?</p>

                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class=" d-flex justify-content-center align-items-center explore-morebtn"
                                        style="">
                                        <a href="{{ url('/exploreevery') }} " class="btn  mt-2 w-75 text-white ">Explore
                                            More</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </li>

                <!-- Resources Mega Dropdown -->
                <li class="nav-item dropdown position-static">
                    <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Resources
                    </a>
                    <div class="dropdown-menu w-100 mt-0 border-0 shadow"
                        style="position: fixed; left:-19px; top: 60px; height: 100%; z-index: 21000; background: #000e2038 !important; "
                        aria-labelledby="exploreDropdown">
                        <div class="container py-3"
                            style="background: var(--background-color); border: 1px solid var(--items-border-colur) !important; border-radius: 4px; width: 40% !important;">
                            <div class="row mb-3">

                                <!-- Learn Section -->
                                <div class="col-md-4">
                                    <h5 style="color: white;">Learn</h5>
                                    <p><span style="color: white;">📘</span> <a href="#"
                                            style="color: white; text-decoration: none;">Guidance</a></p>
                                    <p><span style="color: white;">📘</span> <a href="#"
                                            style="color: white; text-decoration: none;">how to use</a></p>
                                    <p><span style="color: white;">📘</span> <a href="#"
                                            style="color: white; text-decoration: none;">Best auction</a></p>
                                    <p><span style="color: white;">📘</span> <a href="#"
                                            style="color: white; text-decoration: none;">Find valuation</a></p>
                                </div>

                                <!-- Discover Section -->
                                <div class="col-md-4">
                                    <h5 style="color: WHITE;">Discover</h5>
                                    <p><span style="color: white;">📘</span> <a href="#"
                                            style="color: white; text-decoration: none;">Blog</a></p>
                                    <p><span style="color: white;">📘</span> <a href="#"
                                            style="color: white; text-decoration: none;">News</a></p>
                                    <p><span style="color: white;">📘</span> <a href="#"
                                            style="color: white; text-decoration: none;">Trader Experience</a></p>
                                    {{-- <p><span style="color: white;">📘</span></p> --}}
                                </div>

                                <!-- Slider Placeholder -->
                                <div class="col-md-4">
                                    <div id="carouselExampleSlidesOnly" class="carousel slide"
                                        data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="public/theme/fav.png" class="d-block w-75" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="public/theme/fav.png" class="d-block w-75" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="public/theme/fav.png" class="d-block w-75" alt="...">
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="d-flex justify-content-end  py-2 "
                                    style="position: relative; top: 40px; border-radius: 8px; background-color: #0e1b2b !important; border-top: 1px solid grey; ">
                                    <a href="#" style="color: white; text-decoration: none; "><span
                                            style="color: white;">📘</span> Download</a>
                                    <a href="#"
                                        style="color: white; text-decoration: none; padding-left: 18px;"><span
                                            style="color: white;">📘</span> About us</a>
                                    <a href="#"
                                        style="color: white; text-decoration: none; padding-left: 18px;"><span
                                            style="color: white;">📘</span> Contact us</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </li>


                <li class="nav-item">
                    <a class="nav-link" href="Find.html">Find Here</a>
                </li>
            </ul>

            <div class="d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                @if(Auth::check())
                    <a class="btn me-2 text-light" href="{{url('/dashboard')}}">My Account</a>
                @else
                    <a class="btn me-2 text-light" href="{{url('/login')}}">Sign In</a>
                    <a class="btn btn-get-started text-white btn-hover-getstarted" href="{{url('/register')}}">Get Started</a>
                @endif
            </div>
        </div>
    </div>
</nav>