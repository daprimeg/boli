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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,500,0,0&icon_names=check_circle" />
    <link rel="icon" type="image/x-icon" href="{{ asset('public/theme/fav.png')}}" />
    <link href="{{asset('/public/theme/css/bootstrap.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('/public/theme/styles.css')}}" />

     @yield('css')
  </head>
  <body>
<div class="dropdown-backdrop-blur" id="dropdownBackdrop"></div>
     @include('web.partial.nav')
     @yield('content')
   
     
    <footer class=""
      style="background:var(--background-color);font-family: var(--font-family); border-top: 1px solid var(--items-border-colur)">
      {{-- <div style="border-top: 1px solid #263240; border-bottom: 1px solid #263240">
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
      </div> --}}

      <div class="container">
        <div class="" style="width: 60%; padding: 100px 0px; color: var(--white-text)" >
          <h4 class=" ">AUTOBOLI Ltd</h4>
          <p class="lead" style="font-size: var(--font-p2)">
            Helping dealers, exporters, and traders buy smarter with real-time
            auction data from across the UK & Japan.
          
            Save money, reduce risk, and grow your automotive business — all in
            one platform.
            </p>  
        </div>


          <div class="container ">
            <div class=" text-white">
              <!-- Section: Explore -->
              <div class="d-flex  align-items-center  " style="flex-wrap: wrap; gap: 50px; margin-bottom: 10px;">
                <h6  style="font-size: var(--font-p1)">AutoBoli</h6>
                <ul class="list-inline " style="display: flex; flex-wrap: wrap" >
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >about us</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >customer</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >community</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Affiliate & Referrals</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >News</a></li> 
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Brand</a></li> 
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Bidding </a></li> 
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Roadmap </a></li> 
                </ul>
              </div>

              <!-- Section: Learn -->
              <div class="d-flex  align-items-center mb-3 " style="flex-wrap: wrap; gap: 70px">
                <h6   style="font-size: var(--font-p1)">Learn</h6>
                <ul class="list-inline mb-0"  style="display: flex; flex-wrap: wrap">
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Actions</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Actions</a></li>
                </ul>
              </div>

                
              
              <div class="d-flex  align-items-center  mb-3   " style="flex-wrap: wrap; gap: 30px">
                <h6   style="font-size: var(--font-p1)">Resources </h6>   
                <ul class="list-inline mb-0" style="display: flex; flex-wrap: wrap">
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Guidance</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Explore</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >featuristic panels</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >blog</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >support</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >vin search </a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >find auc</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >vahicle value</a></li>
                </ul>
              </div>

              
                
             
              <div class="d-flex  align-items-center  mb-3   " style="flex-wrap: wrap; gap: 45px">
                <h6   style="font-size: var(--font-p1)">Connect </h6>
                <ul class="list-inline mb-0" style="display: flex; flex-wrap: wrap">
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Facbook</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >insta</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >tiktok</a></li>
                  <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >x</a></li>
                  {{-- <li class="list-inline-item me-3"><a href="#" class="text-white-50 text-decoration-none" style="font-size: var(--font-p2)" >Actions</a></li> --}}
                </ul>
              </div>
            </div>
          </div>

        <div style="padding: 50px 0px">
          <p class="mb-1 " style="font-size:var(--font-p3)">
            © AUTOBOLI Ltd 2025. All rights reserved.
          </p>
          <p class="mb-0 " style="font-size:var(--font-p3)">
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
    navbar.style.background = "rgba(15, 28, 44, 0.8)";
    navbar.style.backdropFilter = "blur(7px)"; // ✅ Correct camelCase
    navbar.style.borderBottom = "1px solid var( --items-border-colur)"; // ✅ border at bottom

  } else {
    navbar.style.background = "var(--background-color)";


    
  }
});

</script>
</html>
