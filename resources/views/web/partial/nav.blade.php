<style>
    .dropdown-menu {
        background-color: var(--items-background) !important;
        backdrop-filter: blur(1px) !important;
        text-align: left;
    }

    .dropdown-item {
        color: var(--nave-text-color);
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
        color: var(--white-text);
        border-radius: 5px;
        width: 250px;
        transition: .5s
    }



    .expore-megemenu:hover {
        cursor: pointer;
        border: 1px solid var(--text-color) !important;
    }

    /* .explore-morebtn:hover {
        cursor: pointer;
        background: var(--background-color2);
    } */

    .explore-morebtn {
        border: 1px solid var(--items-border-colur) !important;
                background: var(--background-color2);
        cursor: pointer;

        border-radius: 4px;
        color: var(--white-text) !important;
        transition: .5s
    }

    .btn-hover-getstarted:hover {
        background: var(--text-color) !important;
    }
</style>
<nav class="navbar navbar-expand-lg custom-navbar  navbar-dark" style="font-family: var(--font-family);">
    <div id="navbar" class="container-fluid "
        style="position: fixed; top:0px; left: 0px; background: var(--background-color) !important; z-index: 400000; padding: 0px 50px;border-bottom: 1px solid var(--items-border-colur) !important;height: 60px;  display: flex;align-items: end;">
        <a style="    height: 60px;" class=" d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('/public/theme/assets/nave-icon.png') }}" alt="Logo" class="me-2"
                style="height: 35px;
" />
        </a>

        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link  {{ Request::is('autionshadule') ? 'active' : '' }}"href="{{ url('/autionshadule') }}"
                        style ="font-size: var(--font-p2); padding-bottom: 14px; ">Auction
                        Solutions</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link {{ Request::is('features') ? 'active' : '' }}" href="{{ url('/features') }}"
                        style ="font-size: var(--font-p2); padding-bottom: 14px; ">Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/pricing') ? 'active' : '' }}" href="{{ url('/pricing') }}"
                        style ="font-size: var(--font-p2); padding-bottom: 14px; ">Pricing</a>
                </li>


                <!-- Explore Dropdown -->
                <!-- Explore Mega Dropdown -->
                <li class="nav-item dropdown position-static">
                    <a class="nav-link  dropdown-toggle  Request::is('exploreedry') ||
                        Request::is('exploreevery') || Request::is('explore-tools') ? 'active' : '' }}"
                        href="#" id="exploreDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style ="font-size: var(--font-p2); padding-bottom: 14px; ">
                        Explore
                    </a>

                    <div class="dropdown-menu w-100 mt-0 border-0 shadow"
                        style="position: fixed; left:-19px; top: 60px; height: 100%; z-index: 21000; background: rgba(18, 18, 18, 0.57) !important;"
                        aria-labelledby="exploreDropdown">
                        <div class="container py-3"
                            style="background: var(--background-color); border: 1px solid var(--items-border-colur) !important; border-radius: 4px; width: 43% !important;">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <a href="" class="text-decoration-none">
                                        <div class="expore-megemenu">
                                            <div class="d-flex">
                                                <i class="fa-brands fa-medapps" style="padding-right: 10px"></i>
                                                <h6 class="  " style=" font-size: var(--font-p2) !important;">
                                                    Resorese</h6>
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
                                                <h6 class="  " style=" font-size: var(--font-p2) !important;">
                                                    Resorese</h6>
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
                                                <h6 class="  " style=" font-size: var(--font-p2) !important;">
                                                    Resorese</h6>
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
                                                <h6 class="  " style=" font-size: var(--font-p2) !important;">
                                                    Resorese</h6>
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
                                                <h6 class="  " style=" font-size: var(--font-p2) !important;">
                                                    Resorese</h6>
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
                                                <h6 class="  " style=" font-size: var(--font-p2) !important;">
                                                    Resorese</h6>
                                            </div>
                                            <p style="font-size: 12px; margin-bottom: 0px !important;">Lorem ipsum
                                                dolor
                                                sit, amet consectetur adipisicing elit. Molestiae, autem. Debitis,
                                                libero?</p>

                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class=" d-flex justify-content-center align-items-center explore-morebtn"
                                        style="">
                                        <a href="{{ url('/exploreevery') }} " class="btn w-75 text-white"
                                            style="font-size: var(--font-p2)">Explore
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
                        data-bs-toggle="dropdown" aria-expanded="false" style="padding-bottom: 10px; ">
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
                                    <h5 style="color: var(--white-text); font-size: var(--font-p1)">Learn</h5>
                                    <p style="color: var(--nave-text-color);">📘 <a href="#"
                                            style="color: var(--nave-text-color); text-decoration: none; font-size: var(--font-p2) ;    ">Guidance</a>
                                    </p>
                                    <p><span style="color: var(--nave-text-color);">📘</span> <a href="#"
                                            style="color: var(--nave-text-color); text-decoration: none; font-size: var(--font-p2) ;    ">how
                                            to use</a></p>
                                    <p><span style="color: var(--nave-text-color);">📘</span> <a href="#"
                                            style="color: var(--nave-text-color); text-decoration: none; font-size: var(--font-p2) ;    ">Best
                                            auction</a></p>
                                    <p><span style="color: var(--nave-text-color);">📘</span> <a href="#"
                                            style="color: var(--nave-text-color); text-decoration: none; font-size: var(--font-p2) ;    ">Find
                                            valuation</a></p>
                                </div>

                                <!-- Discover Section -->
                                <div class="col-md-4">
                                    <h5 style="color: var(--white-text); font-size: var(--font-p1)">Discover</h5>
                                    <p><span style="color: var(--nave-text-color);">📘</span> <a href="#"
                                            style="color: var(--nave-text-color); text-decoration: none; font-size: var(--font-p2) ;    ">Blog</a>
                                    </p>
                                    <p><span style="color: var(--nave-text-color);">📘</span> <a href="#"
                                            style=" color: var(--nave-text-color); text-decoration: none; font-size: var(--font-p2) ;   ">News</a>
                                    </p>
                                    <p><span style=" color: var(--nave-text-color);">📘</span> <a href="#"
                                            style=" color: var(--nave-text-color); text-decoration: none; font-size: var(--font-p2) ;   ">Trader
                                            Experience</a></p>
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
                                    <a href="#"
                                        style="color: var(--nave-text-color) ; text-decoration: none; "><span
                                            style="color: var(--nave-text-color) ;">📘</span> Download</a>
                                    <a href="#"
                                        style="color: var(--nave-text-color) ; text-decoration: none; padding-left: 18px;"><span
                                            style="color: var(--nave-text-color) ;">📘</span> About us</a>
                                    <a href="#"
                                        style="color: var(--nave-text-color) ; text-decoration: none; padding-left: 18px;"><span
                                            style="color: var(--nave-text-color) ;">📘</span> Contact us</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </li>


                <li class="nav-item">
                    <a class="nav-link" href="Find.html"
                        style ="font-size: var(--font-p2); padding-bottom: 14px; ">Find Here</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-3 mt-lg-0" style="height: 60px;">
            @if (Auth::check())
                <a class="btn me-2 " href="{{ url('/dashboard') }}"
                    style ="font-size: var(--font-p2); color:var(--nave-text-color)">My Account</a>
            @else
                <a class="btn me-2 " href="{{ url('/login') }}"
                    style ="font-size: var(--font-p2) ; color:var(--nave-text-color) ">Sign In</a>
                <a class="btn btn-get-started  btn-hover-getstarted"
                    style="border: none !important; background: var(--text-color) ; border-radius: 2px"
                    href="{{ url('/register') }}"
                    style ="font-size: var(--font-p2) ; color:var(--nave-text-color) ">Get Started</a>
            @endif
        </div>

    </div>
</nav>
