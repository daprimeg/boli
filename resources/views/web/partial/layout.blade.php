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
    
    <link href="{{asset('/public/theme/css/bootstrap.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('/public/theme/styles.css')}}" />

     @yield('css')
  </head>
  <body>

     @include('web.nav')
    

     @yield('content')
   
     
       <footer
      class="bg-dark text-light py-5"
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
                <h6 class="fw-semibold">Explore</h6>
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
                <h6 class="fw-semibold">conste</h6>
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
                <h6 class="fw-semibold">Resporse</h6>
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

  <script src="{{asset('/public/theme/js/bootstrap.js')}}"></script>
  <script src="{{asset('/public/theme/app.js')}}"></script>
   @yield('js')

</html>
