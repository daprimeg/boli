<!doctype html>

<html
    lang="en"
    class="layout-navbar-fixed layout-menu-fixed layout-compact"
    dir="ltr"
    data-skin="default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template"
    data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard</title>

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

    </style>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/fonts/iconify-icons.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/pickr/pickr-themes.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/libs/plyr/plyr.css') }}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('public/assets/vendor/css/pages/app-academy-details.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('public/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('public/assets/js/config.js') }}"></script>
  </head>
  

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu">
          <div class="app-brand demo">
            <a href="{{URL::to('/admin/dashboard')}}">
              <img src="{{ asset('public/images/logo/logo.png') }}" />
            </a>
          </div>
          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item">
              <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-dashboard"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-database-import"></i>
                <div data-i18n="Data Management">Data Management</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item">
                  <a href="{{ route('admin.auctions.index') }}" class="menu-link">
                    <div data-i18n="Import Data CSV">Import Data CSV</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="{{ route('upcomingauction') }}" class="menu-link">
                    <div data-i18n="Upcoming Auction">Upcoming Auction</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="{{ route('updatingfields') }}" class="menu-link">
                    <div data-i18n="Updating Field">Updating Field</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="{{ route('managelisting') }}" class="menu-link">
                    <div data-i18n="Manage Listings">Manage Listings</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
                <div data-i18n="User Management">User Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('admin.users.index') }}" class="menu-link">
                    <div data-i18n="Manage Users">Manage Users</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('staff') }}" class="menu-link">
                    <div data-i18n="Manage Staff">Manage Staff</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-calendar-time"></i>
                <div data-i18n="Scrapping Schedule">Scrapping Schedule</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('scrappinglogs') }}" class="menu-link">
                    <div data-i18n="Scraper Logs & Setting">Scraper Logs & Setting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('datascrapereview') }}" class="menu-link">
                    <div data-i18n="Scrape Data Review">Scrape Data Review</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-message-report"></i>
                <div data-i18n="Support & Tickets">Support & Tickets</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item">
                  <a href="{{ route('admin.tickets.index') }}" class="menu-link">
                    <div data-i18n="All Support Tickets">All Support Tickets
                    </div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-contract"></i>
                <div data-i18n="Content Management">Content Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('blogs.index') }}" class="menu-link">
                    <div data-i18n="Blogs">Blogs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('blogcategories.index') }}" class="menu-link">
                    <div data-i18n="Blogs Categories">Blogs Categories</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="{{ route('admin.news.index') }}" class="menu-link">
                    <div data-i18n="News">News</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-calendar-user"></i>
                <div data-i18n="Members & Plans">Members & Plans</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('admin.memberships.index') }}" class="menu-link">
                    <div data-i18n="Members">Members</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('admin.plans.index') }}" class="menu-link">
                    <div data-i18n="Plans">Plans</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-shield-cog"></i>
                <div data-i18n="Security Setting">Security Setting</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('rolepermission') }}" class="menu-link">
                    <div data-i18n="User Role and & Permission">User Role and & Permission</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('backuprestore') }}" class="menu-link">
                    <div data-i18n="Backup & Restore">Backup & Restore</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('activitylog') }}" class="menu-link">
                    <div data-i18n="Activity Log">Activity Log</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-presentation-analytics"></i>
                <div data-i18n="Reports & Analytics">Reports & Analytics</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('mostsearch') }}" class="menu-link">
                    <div data-i18n="Most Searched">Most Searched</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('auctionperformancereport') }}" class="menu-link">
                    <div data-i18n="Auction Performance Report">Auction Performance Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('realtimeuseractivity') }}" class="menu-link">
                    <div data-i18n="Real Time User Activity">Real Time User Activity Tracking</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-alarm-plus"></i>
                <div data-i18n="Notifications">Notifications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('customemailtemplate') }}" class="menu-link">
                    <div data-i18n="Custom Email Template">Custom Email Template</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('alerts.index') }}" class="menu-link">
                    <div data-i18n="Alerts">Alerts</div>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </aside>


        <div class="menu-mobile-toggler d-xl-none rounded-1">
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
            <i class="ti tabler-menu icon-base"></i>
            <i class="ti tabler-chevron-right icon-base"></i>
          </a>
        </div>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <nav
            class="layout-navbar container-fluid navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="icon-base ti tabler-menu-2 icon-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper px-md-0 px-2 mb-0">
                  <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                    {{-- <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span> --}}
                  </a>
                </div>
              </div>

              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-md-auto">

                <!-- Quick links  -->
                <li class=" nav-item dropdown-shortcuts navbar-dropdown dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-expanded="false">
                    <i class="icon-base ti tabler-layout-grid-add icon-22px text-heading"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end p-0">
                    <div class="dropdown-menu-header border-bottom">
                      <div class="dropdown-header d-flex align-items-center py-3">
                        <h6 class="mb-0 me-auto">Shortcuts</h6>
                        <a
                          href="javascript:void(0)"
                          class="dropdown-shortcuts-add py-2 btn btn-text-secondary rounded-pill btn-icon"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          title="Add shortcuts"
                          ><i class="icon-base ti tabler-plus icon-20px text-heading"></i
                        ></a>
                      </div>
                    </div>
                    <div class="dropdown-shortcuts-list scrollable-container">
                      <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-calendar icon-26px text-heading"></i>
                          </span>
                          <a href="app-calendar.html" class="stretched-link">Calendar</a>
                          <small>Appointments</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-file-dollar icon-26px text-heading"></i>
                          </span>
                          <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                          <small>Manage Accounts</small>
                        </div>
                      </div>
                      <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-user icon-26px text-heading"></i>
                          </span>
                          <a href="app-user-list.html" class="stretched-link">User App</a>
                          <small>Manage Users</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-users icon-26px text-heading"></i>
                          </span>
                          <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                          <small>Permission</small>
                        </div>
                      </div>
                      <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-device-desktop-analytics icon-26px text-heading"></i>
                          </span>
                          <a href="index.html" class="stretched-link">Dashboard</a>
                          <small>User Dashboard</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-settings icon-26px text-heading"></i>
                          </span>
                          <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                          <small>Account Settings</small>
                        </div>
                      </div>
                      <div class="row row-bordered overflow-visible g-0">
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-help-circle icon-26px text-heading"></i>
                          </span>
                          <a href="pages-faq.html" class="stretched-link">FAQs</a>
                          <small>FAQs & Articles</small>
                        </div>
                        <div class="dropdown-shortcuts-item col">
                          <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                            <i class="icon-base ti tabler-square icon-26px text-heading"></i>
                          </span>
                          <a href="modal-examples.html" class="stretched-link">Modals</a>
                          <small>Useful Popups</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- Quick links -->

                <!-- Style Switcher -->
                <li style="padding-right:10px" class=" nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                    id="nav-theme"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <i class="icon-base ti tabler-sun icon-22px theme-icon-active text-heading"></i>
                    <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center active"
                        data-bs-theme-value="light"
                        aria-pressed="false">
                        <span><i class="icon-base ti tabler-sun icon-22px me-3" data-icon="sun"></i>Light</span>
                      </button>
                    </li>
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center"
                        data-bs-theme-value="dark"
                        aria-pressed="true">
                        <span
                          ><i class="icon-base ti tabler-moon-stars icon-22px me-3" data-icon="moon-stars"></i
                          >Dark</span
                        >
                      </button>
                    </li>

                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center"
                        data-bs-theme-value="system"
                        aria-pressed="false">
                        <span
                          ><i
                            class="icon-base ti tabler-device-desktop-analytics icon-22px me-3"
                            data-icon="device-desktop-analytics"></i
                          >System</span
                        >
                      </button>
                    </li>
                  </ul>
                </li>
                <!-- / Style Switcher-->

                

                <!-- Notification -->
                <li class="d-none nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                  <a
                    class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                    data-bs-auto-close="outside"
                    aria-expanded="false">
                    <span class="position-relative">
                      <i class="icon-base ti tabler-bell icon-22px text-heading"></i>
                      <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li class="dropdown-menu-header border-bottom">
                      <div class="dropdown-header d-flex align-items-center py-3">
                        <h6 class="mb-0 me-auto">Notification</h6>
                        <div class="d-flex align-items-center h6 mb-0">
                          <span class="badge bg-label-primary me-2">8 New</span>
                          <a
                            href="javascript:void(0)"
                            class="dropdown-notifications-all p-2 btn btn-icon"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Mark all as read"
                            ><i class="icon-base ti tabler-mail-opened text-heading"></i
                          ></a>
                        </div>
                      </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <img src="{{ asset('public/assets/img/avatars/1.png') }}"   alt class="rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                              <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                              <small class="text-body-secondary">1h ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">Charles Franklin</h6>
                              <small class="mb-1 d-block text-body">Accepted your connection</small>
                              <small class="text-body-secondary">12hr ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <img src="{{ asset('public/assets/img/avatars/2.png') }}"" alt class="rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">New Message ✉️</h6>
                              <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                              <small class="text-body-secondary">1h ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <span class="avatar-initial rounded-circle bg-label-success"
                                  ><i class="icon-base ti tabler-shopping-cart"></i
                                ></span>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">Whoo! You have new order 🛒</h6>
                              <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                              <small class="text-body-secondary">1 day ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <img src="{{ asset('public/assets/img/avatars/9.png') }}" alt class="rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">Application has been approved 🚀</h6>
                              <small class="mb-1 d-block text-body"
                                >Your ABC project application has been approved.</small
                              >
                              <small class="text-body-secondary">2 days ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <span class="avatar-initial rounded-circle bg-label-success"
                                  ><i class="icon-base ti tabler-chart-pie"></i
                                ></span>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">Monthly report is generated</h6>
                              <small class="mb-1 d-block text-body">July monthly financial report is generated </small>
                              <small class="text-body-secondary">3 days ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <img src="{{ asset('public/assets/img/avatars/5.png') }}" alt class="rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">Send connection request</h6>
                              <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                              <small class="text-body-secondary">4 days ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <img src="{{ asset('public/assets/img/avatars/6.png') }}"" alt class="rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">New message from Jane</h6>
                              <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                              <small class="text-body-secondary">5 days ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar">
                                <span class="avatar-initial rounded-circle bg-label-warning"
                                  ><i class="icon-base ti tabler-alert-triangle"></i
                                ></span>
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <h6 class="mb-1 small">CPU is running high</h6>
                              <small class="mb-1 d-block text-body"
                                >CPU Utilization Percent is currently at 88.63%,</small
                              >
                              <small class="text-body-secondary">5 days ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                              <a href="javascript:void(0)" class="dropdown-notifications-read"
                                ><span class="badge badge-dot"></span
                              ></a>
                              <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                ><span class="icon-base ti tabler-x"></span
                              ></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>
                    <li class="border-top">
                      <div class="d-grid p-4">
                        <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                          <small class="align-middle">View all notifications</small>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                       <img src="{{ optional(Auth::user())->avatar ? asset('public/storage/' . Auth::user()->avatar) : asset('assets/img/avatars/default.png') }}" alt class="rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item mt-0" href="javascript:void(0);">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-2">
                            <div class="avatar avatar-online">
                            <img src="{{ optional(Auth::user())->avatar ? asset('public/storage/' . Auth::user()->avatar) : asset('assets/img/avatars/default.png') }}" 
                                alt class="rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">{{ Auth::user()->firstName }} {{ Auth::user()->surname }}</h6>
                            <small class="text-body-secondary">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    {{-- <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="pages-profile-user.html">
                        <i class="icon-base ti tabler-user me-3 icon-md"></i
                        ><span class="align-middle">My Profile</span>
                      </a>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="pages-account-settings-account.html">
                        <i class="icon-base ti tabler-settings me-3 icon-md"></i
                        ><span class="align-middle">Settings</span>
                      </a>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="pages-account-settings-billing.html">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 icon-base ti tabler-file-dollar me-3 icon-md"></i
                          ><span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge bg-danger d-flex align-items-center justify-content-center"
                            >4</span
                          >
                        </span>
                      </a>
                    </li> --}}

                    {{-- <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li> --}}
                    {{-- <li>
                      <a class="dropdown-item" href="pages-pricing.html">
                        <i class="icon-base ti tabler-currency-dollar me-3 icon-md"></i
                        ><span class="align-middle">Pricing</span>
                      </a>
                    </li> --}}
                    
                    {{-- <li>
                      <a class="dropdown-item" href="pages-faq.html">
                        <i class="icon-base ti tabler-question-mark me-3 icon-md"></i
                        ><span class="align-middle">FAQ</span>
                      </a>
                    </li> --}}

                    <li>
                      <div class="d-grid px-2 pt-2 pb-1">
                      <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger d-flex">
                                <small class="align-middle">Logout</small>
                                <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                            </button>
                        </form>

                      </div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->







