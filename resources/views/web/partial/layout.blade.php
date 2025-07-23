<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AUTOBILI LTD - Vehicle Auction Data</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('public/theme/fav.png')}}" />
    <link href="{{asset('/public/theme/css/bootstrap.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('/public/theme/styles.css')}}" />

     @yield('css')
  </head>
  <body>
<div class="dropdown-backdrop-blur" id="dropdownBackdrop"></div>
     @include('web.partial.nav')
     @yield('content')
   
     
    <footer class="bg-dark text-light py-5"
      style="background: linear-gradient(170deg, #000f21 50%, #0080ff4b 100%);font-family: var(--font-family);">
      <div style="border-top: 1px solid #263240; border-bottom: 1px solid #263240">
        <div class="container p-4 rounded-4 mb-5">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 me-5">
              <h2 class="fw-semibold display-5">
                Want to receive exclusive auction trends & pricing updates?
              </h2>
            </div>
            <div class="col-lg-4 ms-5">
              <form>
                <div class="input-group userinfu">
                  <input
                    type="email"
                    class="form-control text-white inpu"
                    style="
                      background-color: var(--items-background);
                      border: 2px solid var(--items-border-colur);
                    "
                    placeholder="Enter your email"
                  />
                  <button class="btn subcribe-btn fw-semibold" type="submit">
                    Subscribe
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="mb-5">
          <h1 class="fw-bold display-4 pt-5">AUTOBOLI Ltd</h1>
          <p class="lead text-secondary">
            Helping dealers, exporters, and traders buy smarter with real-time
            auction data from across the UK & Japan.
          </p>
          <p class="text-white-50 fw-semibold">
            Save money, reduce risk, and grow your automotive business — all in
            one platform.
          </p>
        </div>


          <div class="container py-5">
            <div class="row text-white">
              <!-- Section: Explore -->
              <div class="col-12 col-md-2 mb-3">
                <h6 class="fw-semibold">AutoBoli</h6>
              </div>
              <div class="col-12 col-md-10 mb-3">
                <ul class="list-inline mb-0">
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">about us</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">customer</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">community</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Affiliate & Referrals</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">News</a></li> 
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Brand</a></li> 
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Bidding </a></li> 
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Roadmap </a></li> 
                </ul>
              </div>

              <!-- Section: Learn -->
              <div class="col-12 col-md-2 mb-3">
                <h6 class="fw-semibold">Learn</h6>
              </div>
              <div class="col-12 col-md-10 mb-3">
                <ul class="list-inline mb-0">
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Actions</a></li>
                </ul>
              </div>

                <div class="col-12 col-md-2 mb-3">
                <h6 class="fw-semibold">Resources </h6>
              </div>
              <div class="col-12 col-md-10 mb-3">
                <ul class="list-inline mb-0">
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Guidance</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Explore</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">featuristic panels</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">blog</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">support</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">vin search </a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">find auc</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">vahicle value</a></li>
                </ul>
              </div>

              <div class="col-12 col-md-2 mb-3">
                <h6 class="fw-semibold">Connect </h6>
              </div>
              <div class="col-12 col-md-10 mb-3">
                <ul class="list-inline mb-0">
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Facbook</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">insta</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">tiktok</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">x</a></li>
                  {{-- <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none">Actions</a></li> --}}
                </ul>
              </div>
            </div>
          </div>
        <div class="pt-4">
          <p class="mb-1 text-white-50">
            © AUTOBOLI Ltd 2025. All rights reserved.
          </p>
          <p class="mb-0 text-white-50">
            Proudly built & hosted with secure infrastructure in the UK & EU.
          </p>
        </div>
      </div>
    </footer> 
  </body>

  <script src="{{asset('/public/themeadmin/assets/js/jquery.js')}}"></script>
  <script src="{{asset('/public/theme/js/bootstrap.js')}}"></script>
  <script src="{{asset('/public/theme/app.js')}}"></script>
  
   @yield('js')
  <script>
 window.addEventListener("scroll", function () {
  const navbar = document.getElementById("navbar");

  if (window.scrollY > 50) {
    navbar.style.background = "var(--items-background)";
    // navbar.style.border = "2px solid var(--items-background)";
  } else {
    navbar.style.background = "var(--background-color)";
    navbar.style.border = "none";
  }
});

</script>
</html>
