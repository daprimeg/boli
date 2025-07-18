<!doctype html>
 <html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-wide" dir="ltr" data-skin="default" data-assets-path="../assets/" data-template="vertical-menu-template" data-bs-theme="dark">
   <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
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
                overflow-x: hidden;
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

        /* Active (current) page */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: var(--bs-primary) !important;
            color: #ffffff !important;
            border-color: var(--bs-primary);
        }

        /* Disabled buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background-color: #e9ecef;
            color: #b9b9c3 !important;
            border-color: #d8d6de;
            cursor: not-allowed;
            opacity: 0.65;
        }

        .table-responsive {
            overflow-x: hidden !important;
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

        .select2-dropdown{
                background-color:var(--bs-paper-bg)!important;
        }

        .select2-container .select2-selection--single {
            height: 36px!important;
        }

    </style>

    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/img/favicon/favicon.ico') }}" />
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

    {{-- Lib --}}
    <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/css/select2.css') }}" />


    @yield('css')

  </head>
  <body>
      <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">

                <aside id="layout-menu" class="layout-menu menu-vertical menu">
                    <span class="menu-button">
                        {{-- <img style="width: 24px;" src="{{ asset('public/images/logo/6742024.png')}}" alt="" /> --}}
                        <i class="icon-base ti tabler-chevron-right"></i>
                    </span>
                    <div class="app-brand demo">
                        {{-- <a href="{{URL::to('/admin/dashboard')}}"> --}}
                        <img src="{{ asset('public/themeadmin/images/logo/logo.png') }}" />
                        {{-- </a> --}}
                    </div>
                    <div class="menu-inner-shadow"></div>
                    <ul class="menu-inner py-1">
                        <li class="menu-item">
                            <div style="margin: 0px 15px;border-bottom: 1px solid var(--bs-border-color);padding-bottom: 9px;padding-top: 16px;" data-i18n="Menu">Menu </div>
                        </li>
                     
                        @include('admin.partial.adminMenu')
                        @include('admin.partial.userMenu')
                    </ul>
                </aside>
                
                <div class="menu-mobile-toggler d-xl-none rounded-1">
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
                        <i class="ti tabler-menu icon-base"></i>
                        <i class="ti tabler-chevron-right icon-base"></i>
                    </a>
                </div>

                <div class="layout-page">                    
                    @include('admin.partial.topbar')
                    <div class="content-wrapper"> 
                        @yield('content')    
                        <footer class="content-footer footer bg-footer-theme">
                          <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                              <div class="text-body">© <script> document.write(new Date().getFullYear());</script>
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


        <script src="{{ asset('public/themeadmin/assets/js/jquery.js')}}"></script>
        <script src="{{asset('public/themeadmin/assets/vendor/js/template-customizer.js')}}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/js/config.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/pickr/pickr.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/hammer/hammer.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/i18n/i18n.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/js/menu.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/plyr/plyr.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/js/main.js') }}"></script>

        {{-- <script src="{{ asset('public/themeadmin/assets/js/app-academy-course-details.js') }}"></script> --}}

        {{-- Libs --}}
         <script src="{{asset('public/themeadmin/assets/js/select2.js')}}"></script>
         <script src="{{asset('public/themeadmin/assets/js/jquertdatatable.js')}}"></script>
         <script>

            $(document).ready(function () {

                $('.make').select2({
                    placeholder: 'Select Make',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/makes/getMakes')}}",
                        dataType: 'json'
                    }
                });

                $('.model').select2({
                    placeholder: 'Select Model',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/models/getModels')}}",
                        dataType: 'json',
                    }
                });
                $('.vehicleTtypes').select2({
                    placeholder: 'Select Vehicle Type',
                    ajax: {
                        url: "{{url('/admin/masters/vehicletypes/getVehicleTypes')}}",
                        dataType: 'json',
                    }
                });
                $('.variants').select2({
                    placeholder: 'Select Variant',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/variants/getVariants')}}",
                        dataType: 'json',
                    }
                });
                $('.bodyTypes').select2({
                    placeholder: 'Body Type',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/bodytypes/getBodyTypes')}}",
                        dataType: 'json',
                    }
                });
                $('.color').select2({
                    placeholder: 'Select Color',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/colours/getColours')}}",
                        dataType: 'json',
                    }
                });
                $('.auctions').select2({
                    placeholder: 'Select Auction',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/auctions/getAuction')}}",
                        dataType: 'json',
                    }
                });

                $('.center').select2({
                    placeholder: 'Select Center',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/centers/getCenters')}}",
                        dataType: 'json',
                    }
                });

                $('.platform').select2({
                    placeholder: 'Select Plateform',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/platforms/getPlatforms')}}",
                        dataType: 'json',
                    }
                });

                $(".menu-button").click(function (e) { 
                    
                    if(!$('html').hasClass('layout-menu-collapsed')) {
                      $('html').addClass('layout-menu-collapsed');

                        //   $('.menu-button').css({
                        //     'color': 'white',
                        //     'background-color': 'blue',
                        //     'font-size': '16px'
                        //   });

                    }else{
                      $('html').removeClass('layout-menu-collapsed');

                        //   $('.menu-button').css({
                        //     'color': 'white',
                        //     'background-color': 'blue',
                        //     'font-size': '16px'
                        //   });
                    }             
                });


                
                                
            });

        </script>

        @yield('js')
</body>
</html>






