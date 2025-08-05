<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Demo: Forgot Password Cover - Pages | Vuexy - Bootstrap Dashboard PRO</title>
    
      <meta name="description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease.">
      <!-- Canonical SEO -->
      <meta name="keywords" content="Vuexy bootstrap dashboard, vuexy bootstrap 5 dashboard, themeselection, html dashboard, web dashboard, frontend dashboard, responsive bootstrap theme">
      <meta property="og:title" content="Vuexy bootstrap Dashboard by Pixinvent">
      <meta property="og:type" content="product">
      <meta property="og:url" content="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599">
      <meta property="og:image" content="https://pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png">
      <meta property="og:description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease.">
      <meta property="og:site_name" content="Pixinvent">
      <link rel="canonical" href="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599">
    
    
     
    
    <link rel="icon" type="image/x-icon" href="{{ asset('public/themeadmin/autobolidp.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/plyr/plyr.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<!-- Vendor -->
<link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/@form-validation/form-validation.css') }}">

<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/pages/page-auth.css') }}">


    <!-- Helpers -->
    <script src="{{asset('public/themeadmin/assets/vendor/js/helpers.js')}}"></script><style type="text/css">
.layout-menu-fixed .layout-navbar-full .layout-menu,
.layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
  top: 0px !important;
}
.layout-page {
  padding-top: 0px !important;
}
.content-wrapper {
  padding-bottom: 0px !important;
}

   
</style>
  @yield('css')
  </head>
<body style="--bs-scrollbar-width: 0px;">

   <div class="authentication-wrapper authentication-cover" style="background-color: #000f21ee">
    <a href="index.html" class="app-brand auth-cover-brand">
      <span class="app-brand-logo demo">
        <span class="text-primary">
            <img src="{{ asset('public/themeadmin/images/logo/logo.png') }}" />
        </span>
    </span>
    </a>
    <div class="authentication-inner row m-0">
   
      <div class="d-none d-xl-flex col-xl-8 p-0">
        <div class="auth-cover-bg d-flex justify-content-center align-items-center">
          @yield('images') 
          
        </div>
      </div>
   
  @yield('content') 
    
  
    </div>
  </div>
        <script src="{{ asset('public/themeadmin/assets/js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            @yield('js')
</body>
</html>
