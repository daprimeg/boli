<nav class="navbar navbar-expand-lg custom-navbar  navbar-dark" style="font-family: var(--font-family)">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{url('/')}}">
          <img src="{{asset('/public/theme/assets/nave-icon.png')}}" alt="Logo" class="me-2" />
        </a>
        
        <button
          class="navbar-toggler text-white"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item">
              <a class="nav-link " href="index.html">Traders Need</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Features.html">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Pricing.html">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Explore.html">Explore</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="TodayAuc.html">Today's Auc</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Find.html">Find Here</a>
            </li>
          </ul>

          <div class="d-flex align-items-center justify-content-center mt-3 mt-lg-0">
            <img src="{{asset('/public/theme/assets/Screenshot.png')}}" class="rounded-circle me-2" height="30" width="30"/>
            <a class="btn me-2 text-light" href="{{url('/login')}}">Sign In</a>
            <a class="btn btn-get-started text-white" href="{{url('/register')}}">Get Started</a>
        </div>
      </div>
   </div>
</nav> 