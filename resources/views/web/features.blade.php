@extends('web.partial.layout')

@section('css')
    <style>
        body {
            background-color: var(--background-color) !important;
            font-family: var(--font-family) !important;
            overflow-x: hidden;
        }

        .hero-bg {
            position: relative;
            height: 100vh;
            width: 100%;
            background-image: url({{asset('/public/theme/assets/Dots.png')}});
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .feature-list {
            z-index: 2 !important;
            position: relative;
            z-index: 2 !important;
            color: white !important;
            padding: 4rem;
        }

        .feature-list i {
            color: var(--text-color);
            height: 24px;
            width: 24px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            font-weight: 900 !important;
            align-items: center;
            border: 2px solid var(--text-color);
            margin-right: 10px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }

        .btn-started {
            background-color: var(--text-color) !important;
            color: white !important;
            border: none !important;
            padding: 10px 25px !important;
            border-radius: 5px !important;
            font-weight: 500 !important;
        }

        .img-wrapper {
            background-color: var(--items-background) !important;
            border: 1px solid rgba(255, 255, 255, 0.301);
            border-radius: 12px;
            padding: 15px !important;
            height: 35vw !important;
            transform: translate(20%) !important;
            width: 45vw !important;
            object-fit: cover !important;

            box-shadow: -100px -82px 180px -145px var(--text-color);
            -webkit-box-shadow: -100px -93px 180px -122px var(--text-color);
            -moz-box-shadow: -100px -93px 180px -145px var(--text-color);
        }

        .over {
            width: 100%;
            height: 100%;
            border-radius: 12px;
        }



        @media (max-width: 785px) {




            .hero-bg {
                display: flex;
                align-items: center;
                justify-content: flex-start;
            }

            .feature-list p {
                text-align: center;

            }

            .feature-list h1 {
                font-size: 2.3rem !important;
                line-height: 1.2;
                text-align: center;
            }

            .img-wrapper {
                width: 100% !important;
                height: 25vh !important;
                padding: .5rem !important;
                transform: translate(0%) !important;
                margin-bottom: 9rem !important;

            }

            .over {
                width: 100%;
                height: 100% !important;
                object-fit: cover;
                border-radius: 12px;
            }

            .btn-started {
                padding: 8px 20px !important;
                font-size: 1rem;
                width: 100%;
                display: flex !important;
                justify-content: center !important;
            }


        }

        .boli-list i {
            height: 30px !important;
            width: 30px !important;
            display: flex !important;
            justify-content: center !important;
            border-radius: 50%;
            font-weight: 900 !important;
            align-items: center !important;
            background-color: var(--background-color);
        }

        .boli-box {
            border: 1px solid #222e3c !important;
            border-radius: 20px;
            padding: 4rem 2rem !important;
        }

        .gradient-button {
            background: linear-gradient(135deg, #007AFF 0%, #0051D5 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 122, 255, 0.3);
        }

        .feature-section {
            background: linear-gradient(135deg, #0a1628 0%, #1a2332 50%, #0f1419 100%) !;
            min-height: 100vh;
            padding: 80px 0;
        }

        .content-wrapper {
            padding-right: 2rem;
        }

        .feature-badge {
            border: 2px solid var(--text-color);
            color: var(--text-color);
            padding: 8px 16px;
            border-radius: 16px;
            font-size: 14px;
        }

        .feature-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: white;
        }

        .feature-description {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: white;
            font-size: 1rem;
        }

        .object-fit-cover {
            object-fit: cover;
            width: 41vw;
            height: 25vw;
            transform: translate(-5rem);
        }

        .image-container {
            background: linear-gradient(135deg, #007AFF 0%, #0051D5 100%);
            border-radius: 20px;
            padding: 18rem 0rem !important;
            height: 30rem;
            width: 45rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        @media (max-width: 994px) {
            .feature-title {
                font-size: 2rem;
            }

            .feature-description {
                font-size: .5rem;
                text-align: center !important;
            }

            li {
                text-align: center !important;
            }

            .content-wrapper {
                padding-right: 0;
                text-align: center !important;
            }

            .image-container {
                padding: .5rem !important;
                width: 100%;
                height: auto;
                flex-direction: column;
            }

            .object-fit-cover {
                width: 100%;
                height: auto;
                transform: none;
                border-radius: 12px;
            }
        }

        .card-btn {
            background: none;
            border: none;
            padding: 0;
            width: 100%;
            text-align: left;
        }

        .card-btn:focus {
            outline: none;
        }

        .explore-section {
            padding: 80px 0;
        }

        .nav-arrows {
            background: var(--items-background);
            border: 1px solid var(--items-border-colur);
            color: #222e3c;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bolder !important;
            font-size: 1.5rem;
        }

        .nav-arrows:hover {
            color: var(--white-text);
            border: 2px solid var(--white-text);
        }

        .carousel-row {
            overflow-x: auto;
            display: flex;
            gap: 1.5rem;
            scroll-behavior: smooth;
            padding-bottom: 1rem;
        }

        .carousel-row::-webkit-scrollbar {
            display: none;
        }

        .dashboard-card {
            width: 400px;
            flex-shrink: 0;
            padding: .5rem !important;
            transition: transform 0.3s ease;
            border: 1px solid var(--items-border-colur) !important;
            border-radius: 15px;
            background: var(--items-background);
        }

        .dashboard-mockup {
            height: 200px;
        }

        .dashboard-mockup img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
@endsection

@section('content')
<section style="height: 100vh;" class="hero-bg adient">
    <div class="container d-flex  h-100 text-white">
        <div class="row align-items-center d-flex flex-wrap-reverse">

            <div class="col-12 col-md-6 feature-list order-2  text-start">
                <p class="mb-1" style="opacity: 0.6;">Guide &gt; ABCD</p>
                <h1 class="display-4 fw-bold" style="font-size: 5rem;">Agency<br>Management</h1>
                <ul class="list-unstyled mt-4 ">
                    <li class="mb-3 d-flex justify-content-center justify-content-md-start">
                        <i class="fa-solid fa-check"></i>Compare listings side-by-side
                    </li>
                    <li class="mb-3 d-flex justify-content-center justify-content-md-start">
                        <i class="fa-solid fa-check"></i>Filter by make, model, year, mileage
                    </li>
                    <li class="d-flex justify-content-center justify-content-md-start">
                        <i class="fa-solid fa-check"></i>Instantly see which auction has the best deals
                    </li>
                </ul>
                <button class="btn-started mt-4">Get Started</button>
            </div>

            <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                <div class="img-wrapper mx-auto">
                    <img src="{{asset('/public/theme/assets/Screenshot.png')}}" alt="Dashboard Preview" class="over">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- boli section  -->
<section class="text-white"
    style="height: 100vh; background-color: var(--items-background); display: flex; align-items: center;">
    <div class="container text-center w-100">

        <div class="mb-5">
            <h1 class="fw-bold mb-3">The secret to your team's success</h1>
            <p class="text-secondary">
                Gain insights into thousands of vehicle auctions and make smarter bidding decisions.<br>
                Subscribe to access full auction data across the nation.
            </p>
        </div>

        <div class="row justify-content-center mb-4 g-4">

            <div class="col-12 col-md-12 col-lg-6 d-flex">
                <div class="d-flex flex-column justify-content-between boli-box w-100"
                    style="background-color: var(--items-background);">
                    <div>
                        <h5 class="pb-5" style="font-size:2rem;"><strong>Without <span
                                    style="color: var(--text-color)">AutoBoli</span></strong></h5>
                        <ul class="list-unstyled mt-3 text-start boli-list">
                            <li class="mb-3 d-flex">
                                <i class="fa-solid fa-check text-danger me-2"
                                    style="border: 2px solid var(--red-colur);"></i>
                                Compare listings side-by-side
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="fa-solid fa-check text-danger me-2"
                                    style="border: 2px solid var(--red-colur);"></i>
                                Filter by make, model, year, mileage
                            </li>
                            <li class="d-flex">
                                <i class="fa-solid fa-check text-danger me-2"
                                    style="border: 2px solid var(--red-colur);"></i>
                                Instantly see which auction has the best deals
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-6 d-flex">
                <div class="d-flex flex-column justify-content-between boli-box w-100"
                    style="background-color: var(--background-color);">
                    <div>
                        <h5 class="pb-5" style="font-size:2rem;"><strong>With <span
                                    style="color: var(--text-color);">AutoBoli</span></strong></h5>
                        <ul class="list-unstyled mt-3 text-start boli-list">
                            <li class="mb-3 d-flex">
                                <i class="fa-solid fa-check text-primary me-2"
                                    style="border: 2px solid var(--text-color);"></i>
                                Compare listings side-by-side
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="fa-solid fa-check text-primary me-2"
                                    style="border: 2px solid var(--text-color);"></i>
                                Filter by make, model, year, mileage
                            </li>
                            <li class="d-flex">
                                <i class="fa-solid fa-check text-primary me-2"
                                    style="border: 2px solid var(--text-color);"></i>
                                Instantly see which auction has the best deals
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <button class="gradient-button">Get Started</button>

    </div>
</section>

<section class="feature-section text-white d-flex justify-content-center align-items-center"
    style="background-color: var(--items-background)">
    <div class="container px-4">
        <div class="row align-items-center g-5 flex-column flex-lg-row">
            <div class="col-lg-6 col-md-12">
                <div class="content-wrapper">
                    <span class="feature-badge">Feature Name</span>
                    <h2 class="feature-title mt-3">Find the Best Auction for<br>Your Next Buy</h2>
                    <p class="feature-description">
                        Stop bouncing between dozens of websites.<br>
                        AUTOBOLU brings together UK auctions into a single, streamlined platform.
                    </p>
                    <ul class="feature-list">
                        <li class="feature-item">
                            <i class="fa-solid fa-check feature-icon"></i>
                            Compare listings side-by-side
                        </li>
                        <li class="feature-item">
                            <i class="fa-solid fa-check feature-icon"></i>
                            Filter by make, model, year, mileage
                        </li>
                        <li class="feature-item">
                            <i class="fa-solid fa-check feature-icon"></i>
                            Instantly see which auction has the best deals
                        </li>
                    </ul>
                    <a href="#" class="btn btn-light feature-btn">Use this feature</a>
                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="image-container ">
                    <div class="car-grid rounded-4">
                        <img src="{{asset('/public/theme/assets/Screenshot.png')}}" alt="Car 24" class=" object-fit-cover ">
                    </div>
                </div>
            </div>

        </div>
</section>

<section class="feature-section text-white d-flex justify-content-center align-items-center"
    style="background-color: var(--items-background)">
    <div class="container">
        <div class="row align-items-center g-5 flex-column-reverse flex-lg-row">

            <div class="col-lg-7 col-md-12">
                <div class="image-container ">
                    <div class="car-grid rounded-4">
                        <img src="{{asset('/public/theme/assets/Screenshot.png')}}" alt="Car 24" class=" object-fit-cover ">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="content-wrapper">
                    <span class="feature-badge">Feature Name</span>
                    <h2 class="feature-title mt-3">Find the Best Auction for<br>Your Next Buy</h2>
                    <p class="feature-description">
                        Stop bouncing between dozens of websites.<br>
                        AUTOBOLU brings together UK auctions into a single, streamlined platform.
                    </p>
                    <ul class="feature-list">
                        <li class="feature-item">
                            <i class="fa-solid fa-check feature-icon"></i>
                            Compare listings side-by-side
                        </li>
                        <li class="feature-item">
                            <i class="fa-solid fa-check feature-icon"></i>
                            Filter by make, model, year, mileage
                        </li>
                        <li class="feature-item">
                            <i class="fas  fa-chevron-right"></i>
                            Instantly see which auction has the best deals
                        </li>
                    </ul>
                    <a href="#" class="btn btn-light feature-btn">Use this feature</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- last section -->

<section class="py-5">
    <div class="container">
        <div class="col-auto">
            <h2 class="text-white fw-bold mb-3">Explore more</h2>
        </div>
        <div class="row align-items-center">

            <div class="col">
                <div class="row g-3">

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <button type="button" class="card-btn">
                            <div class="card  border border-secondary h-100"
                                style="background-color: var(--background-color);">
                                <div class="card-body py-4">
                                    <i class="fas fa-asterisk text-primary fs-2 mb-3"></i>
                                    <p class="card-text text-white fw-semibold mb-0">Use this feature</p>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <button type="button" class="card-btn">
                            <div class="card  border border-secondary h-100"
                                style="background-color: var(--background-color);">
                                <div class="card-body py-4">
                                    <i class="fas fa-asterisk text-primary fs-2 mb-3"></i>
                                    <p class="card-text text-white fw-semibold mb-0">Use this feature</p>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <button type="button" class="card-btn">
                            <div class="card  border border-secondary h-100"
                                style="background-color: var(--background-color);">
                                <div class="card-body py-4">
                                    <i class="fas fa-asterisk text-primary fs-2 mb-3"></i>
                                    <p class="card-text text-white fw-semibold mb-0">Use this feature</p>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <button type="button" class="card-btn">
                            <div class="card  border border-secondary h-100"
                                style="background-color: var(--background-color);">
                                <div class="card-body py-4">
                                    <i class="fas fa-asterisk text-primary fs-2 mb-3"></i>
                                    <p class="card-text text-white fw-semibold mb-0">Use this feature</p>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <button type="button" class="card-btn">
                            <div class="card  border border-secondary h-100"
                                style="background-color: var(--background-color);">
                                <div class="card-body py-4">
                                    <i class="fas fa-asterisk text-primary fs-2 mb-3"></i>
                                    <p class="card-text text-white fw-semibold mb-0">Use this feature</p>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <button type="button" class="card-btn"
                            style="border: 1px solid var(--items-border-colur);  border-radius: 10px;">
                            <div class="card  h-100 text-center text-white "
                                style="background-color: var(--items-background);">
                                <div class="card-body py-5 d-flex justify-content-center align-items-center">

                                    <p class="card-text fw-semibold mb-0  ">View all</p>
                                    <i class="fas  fa-chevron-right ps-3"></i>
                                </div>
                            </div>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="explore-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0 text-white">Explore more pages</h2>
            <div class="d-flex gap-3">
                <button class="nav-arrows" onclick="previousSlide()">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="nav-arrows" onclick="nextSlide()">
                    <i class="fas  fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div id="cardCarousel" class="carousel-row">


            <div class="dashboard-card">
                <div class="dashboard-mockup ">
                    <img src="{{asset('/public/theme/assets/bg-cars.png')}}" alt="Cars" />
                </div>
                <div class=" pt-4">
                    <h5 class=" fs-5 text-white">Explore more pages</h5>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="dashboard-mockup ">
                    <img src="{{asset('/public/theme/assets/bg-cars.png')}}" alt="Cars" />
                </div>
                <div class=" pt-4">
                    <h5 class=" fs-5 text-white">Explore more pages</h5>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-mockup ">
                    <img src="{{asset('/public/theme/assets/bg-cars.png')}}" alt="Cars" />
                </div>
                <div class=" pt-4">
                    <h5 class=" fs-5 text-white">Explore more pages</h5>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-mockup ">
                    <img src="{{asset('/public/theme/assets/bg-cars.png')}}" alt="Cars" />
                </div>
                <div class=" pt-4">
                    <h5 class=" fs-5 text-white">Explore more pages</h5>
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-mockup ">
                    <img src="{{asset('/public/theme/assets/bg-cars.png')}}" alt="Cars" />
                </div>
                <div class=" pt-4">
                    <h5 class=" fs-5 text-white">Explore more pages</h5>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('js')
    <script></script>
@endsection
