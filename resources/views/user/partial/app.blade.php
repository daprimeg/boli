<!doctype html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-wide" dir="ltr" data-skin="default" data-assets-path="../assets/" data-template="vertical-menu-template" data-bs-theme="dark">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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
                    @include('user.partial.menu')
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
    @include('admin.partial.notifiction_script')
    @yield('js')
</body>
</html>
