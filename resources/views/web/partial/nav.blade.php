<style>
  .dropdown-menu {
    background-color: var( --items-background) !important;
    backdrop-filter: blur(1px) !important; 
    text-align: left;
  }

  .dropdown-item {
    color: white; 
    padding: 10px 20px;
    text-align: left !important;
  }

  .dropdown-item:hover {
    background-color: var(--text-color) !important; /* hover effect */
  }

  .nav-link.dropdown-toggle {
    cursor: pointer;
  }
/* Add inside your existing <style> tag */
/* .dropdown-menu {
  background-color: var(--items-background) !important;
  backdrop-filter: blur(4px) !important;
  border-radius: 0 !important;
  padding: 0 !important;
}

.dropdown-item {
  color: white;
  padding: 8px 16px;
} */



/* .dropdown-menu h6 {
  color: #ffffff;
  font-weight: 600;
  margin-bottom: 10px;
} */

</style>
<nav  class="navbar navbar-expand-lg custom-navbar  navbar-dark" style="font-family: var(--font-family); ">
      <div id="navbar" class="container-fluid py-3" style="position: fixed; top:0px; left: 4px; background: var(--background-color) !important; z-index: 400000">
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
      <a class="nav-link" href="index.html">Auction Solutions</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('/features')}}">Features</a>
    </li>

    <!-- Explore Dropdown -->
    <!-- Explore Mega Dropdown -->
<li class="nav-item dropdown position-static">
  <a class="nav-link dropdown-toggle" href="#" id="exploreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Explore
  </a>
 <div class="dropdown-menu w-100 mt-0 border-0 shadow"
     style="position: fixed; left:-19px; top: 60px; height: 100%; z-index: 21000; background: rgba(18, 18, 18, 0.57) !important; "
     aria-labelledby="exploreDropdown">
 <div class="container py-4" 
     style="background: var(--items-background); border: 1px solid var(--items-border-colur) !important; border-radius: 4px; width: 40% !important;">
      <div class="row">
        <div class="col-md-4">
          <h6 class=" text-white ps-2">Resorese</h6>
          <a class="dropdown-item" href="#">Blcoge</a>
          <a class="dropdown-item" href="#">Analytics</a>
          <a class="dropdown-item" href="#">Integrations</a>
        </div>
        <div class="col-md-4">
          <h6 class=" text-white ps-2">Community</h6>
          <a class="dropdown-item" href="#">Events</a>
          <a class="dropdown-item" href="#">Forums</a>
          <a class="dropdown-item" href="#">Partnerships</a>
        </div>
        <div class="col-md-4">
          <h6 class=" text-white ps-2">Company</h6>
          <a class="dropdown-item" href="#">About Us</a>
          <a class="dropdown-item" href="#">Careers</a>
          <a class="dropdown-item" href="#">Contact</a>
        </div>
      </div>
    </div>
  </div>

</li>

<!-- Resources Mega Dropdown -->
<li class="nav-item dropdown position-static">
  <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Resources
  </a>
    <div class="dropdown-menu w-100 mt-0 border-0 shadow"
     style="position: fixed; left:-19px; top: 60px; height: 100%; z-index: 21000; background: rgba(18, 18, 18, 0.57) !important; "
     aria-labelledby="exploreDropdown">
 <div class="container py-4" 
     style="background: var(--items-background); border: 1px solid var(--items-border-colur) !important; border-radius: 4px; width: 40% !important;">
      <div class="row">
        <div class="col-md-4">
          <h6 class=" text-white ps-2">Explore</h6>
          <a class="dropdown-item" href="#">Bloge</a>
          <a class="dropdown-item" href="#">Analytics</a>
          <a class="dropdown-item" href="#">Integrations</a>
        </div>
        <div class="col-md-4">
          <h6 class=" text-white ps-2">Community</h6>
          <a class="dropdown-item" href="#">Events</a>
          <a class="dropdown-item" href="#">Forums</a>
          <a class="dropdown-item" href="#">Partnerships</a>
        </div>
        <div class="col-md-4">
          <h6 class=" text-white ps-2">Company</h6>
          <a class="dropdown-item" href="#">About Us</a>
          <a class="dropdown-item" href="#">Careers</a>
          <a class="dropdown-item" href="#">Contact</a>
        </div>
      </div>
    </div>
  </div>

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

