<!doctype html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-wide" dir="ltr" data-skin="default" data-assets-path="../assets/" data-template="vertical-menu-template" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,500,0,0&icon_names=check_circle" />

    <!-- Font Awesome Free CDN (CSS only) -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>
    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>@stack('title')</title>
    <meta name="description" content="" />
    <style>

        table.dataTable tbody th, table.dataTable tbody td {
            padding: .782rem 1.25rem;
        }

        .dataTables_length {
            padding: 10px 15px;
        }

        /* Add padding around "Showing 1 to 10 of X entries" */
        .dataTables_info {
            padding: 10px 15px;
            display: none;
        }

        /* Add padding around pagination controls */
        .dataTables_paginate {
            padding: 10px 15px;
            justify-content: right !important;
        }

        /* Make search box have padding too */
        .dataTables_filter {
            padding: 10px 15px;
            display: none;
        }
        .table-responsive {
            /* overflow-x: hidden; */
        }

        /* Center the pagination */
        .dataTables_paginate {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        /* Style each pagination button */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #f8f9fa; /* light grey */
            color: #5e5873 !important; /* Vuexy's default text color */
            border: 1px solid #d8d6de;
            border-radius: 0.375rem; /* rounded like Vuexy buttons */
            padding: 0.5rem 1rem;
            margin: 0 2px;
            font-size: 0.9375rem; /* small button */
            transition: all 0.3s ease;
        }

        /* Hover effect */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: var(--bs-primary); /* Vuexy primary color */
            color: #ffffff !important;
            border-color: var(--bs-primary);
            box-shadow: 0 4px 12px rgba(115, 103, 240, 0.4); /* soft primary shadow */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: var(--bs-primary) !important;
            color: #ffffff !important;
            border-color: var(--bs-primary);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background-color: #e9ecef;
            color: #b9b9c3 !important;
            border-color: #d8d6de;
            cursor: not-allowed;
            opacity: 0.65;
        }

        .table{
            width: 100%!important;
        }

        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: !important;
        }

        .template-customizer-open-btn{
            display: none!important;
        }

        .select2-container--default .select2-selection--single {
            background-color:var(--bs-paper-bg)!important;
            border: 1px solid var(--bs-b-color)!important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: var(--bs-card-title-color)!important;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: var(--bs-body-color)!important;
        }

        .select2-dropdown{
                background-color:var(--bs-paper-bg)!important;
        }

        .select2-container .select2-selection--single {
            height: 36px!important;
        }

        .select2{
            width: 100%!important;
        }


    .dropdown-menu-end .dropdown-item:hover{
            border-radius: var(--btn-border-radis);
      background-color: var(--new-bs-bg) !important;
    }

    .dropdown-item span{
        color: var(--dimtext);
        }
    .dropdown-item .icon-base{
        color: var(--dimtext);
        }
     .dropdown-menu-end .dropdown-item:hover span{
        color: var(--bs-card-cap-color);
        }
    .dropdown-menu-end .dropdown-item:hover .icon-base{
        color: var(--bs-primary);
        }

       .layout-menu .menu-item .menu-link{
            border-radius: var(--btn-border-radis) !important;
        }
       
        .menu-item a div {
            font-size: var(--font-p1);
            color: var(--dimtext);

        }
        .menu-item a i {
            font-size: var(--font-p1);
            color:  var(--bs-card-cap-color);
        }
        .menu-item a:hover div {
            color:  var(--bs-heading-color);


        }
        .menu-item a:hover i {
                    color: var(--bs-primary);

        }

        select option{
            background: var(--bs-paper-bg)!important;
            border: 1px solid black;
            border-radius: 1px;
        }
        select{
             background: var(--bs-paper-bg)!important
        }
    </style>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('public/themeadmin/autobolidp.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" 
    rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/libs/plyr/plyr.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/pages/app-academy-details.css') }}" /> --}}
<link rel="stylesheet" href="{{asset('public/theme/css/toastr.min.css')}}">
    {{-- Lib --}}
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/css/select2.css') }}" />


    @include('admin.partial.head')
    @yield('css')
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu">
                <span class="menu-button">
                    <i class="icon-base ti tabler-chevron-right"></i>
                </span>
                <div class="app-brand demo">
                    <img src="{{ asset('public/themeadmin/images/logo/logo.png') }}" />
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item">
                        <div style="margin: 0px 15px;border-bottom: 1px solid var(--bs-border-color);padding-bottom: 9px;padding-top: 16px; font-size: var(--font-p2)" data-i18n="Menu">Menu </div>
                    </li>
                    @include('admin.partial.menu')
                </ul>
            </aside>

            <div class="menu-mobile-toggler d-xl-none rounded-1">
                <a href="javascript:void(0);"
                    class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
                    <i class="ti tabler-menu icon-base"></i>
                    <i class="ti tabler-chevron-right icon-base"></i>
                </a>
            </div>

            <div class="layout-page">
                <nav class="layout-navbar navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme container-fluid" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base ti tabler-menu-2 icon-md"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="">
                                <a class="page-title" class="">@stack('title')</a>
                            </div>
                        </div>
                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            @include('admin.partial.quickLink')
                            @include('admin.partial.mode')
                            @include('admin.partial.notification')
                            @include('admin.partial.profile')
                        </ul>
                    </div>
                </nav>
                <div class="content-wrapper">
                    @yield('content')
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="text-body">© <script> document.write(new Date().getFullYear()); </script>
                                    Design & Develop By <a href="https://daprimeproductions.com" target="_blank" class="footer-link">DaPrimeProductions</a>
                                </div>
                                <div class="d-none d-lg-inline-block">
                                    {{-- <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a> --}}
                                    {{-- <a href="https://themeforest.net/user/pixinvent/portfolio" target="_blank" class="footer-link me-4">More Themes</a> --}}
                                    {{-- <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a> --}}
                                    {{-- <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a> --}}
                                </div>
                            </div>
                        </div>
                    </footer>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
            <div class="drag-target"></div>
        </div>
    </div>
    @include('admin.partial.footer')
    @yield('js')
</body>
</html>
