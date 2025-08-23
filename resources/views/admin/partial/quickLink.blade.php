 <li class="d-none nav-item dropdown-shortcuts navbar-dropdown dropdown">
     <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
         href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
         <i class="icon-base ti tabler-layout-grid-add icon-22px text-heading"></i>
     </a>
     <div class="dropdown-menu dropdown-menu-end p-0">
         <div class="dropdown-menu-header border-bottom">
             <div class="dropdown-header d-flex align-items-center py-3">
                 <h6 class="mb-0 me-auto">Shortcuts</h6>
                 <a href="javascript:void(0)"
                     class="dropdown-shortcuts-add py-2 btn btn-text-secondary rounded-pill btn-icon"
                     data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i
                         class="icon-base ti tabler-plus icon-20px text-heading"></i></a>
             </div>
         </div>
         <div class="dropdown-shortcuts-list scrollable-container">
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-device-desktop-analytics icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/dashboard') }}" class="stretched-link">Dashboard</a>
                     {{-- <small>Appointments</small> --}}
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-alarm-plus icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/alerts') }}" class="stretched-link">Alerts</a>
                     {{-- <small>Manage Accounts</small> --}}
                 </div>
             </div>
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-database-import icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/auctions') }}" class="stretched-link">Data
                         Management</a>
                     {{-- <small>Appointments</small> --}}
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-users icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/users') }}" class="stretched-link">User
                         Management</a>
                     {{-- <small>Manage Accounts</small> --}}
                 </div>
             </div>
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-message-report icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/tickets') }}" class="stretched-link">Support
                         Tickets</a>
                     {{-- <small>Manage Users</small> --}}
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-contract icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/blogs') }}" class="stretched-link">Blogs
                         Management</a>
                     {{-- <small>Permission</small> --}}
                 </div>
             </div>
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-contract icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/blogcategory') }}" class="stretched-link">Blog Category</a>
                     {{-- <small>User Dashboard</small> --}}
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-contract icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/news') }}" class="stretched-link">News
                         Management</a>
                     {{-- <small>Account Settings</small> --}}
                 </div>
             </div>
             <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-calendar-user icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/memberships') }}" class="stretched-link">Members</a>
                     {{-- <small>FAQs & Articles</small> --}}
                 </div>
                 <div class="dropdown-shortcuts-item col">
                     <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                         <i class="icon-base ti tabler-calendar-user icon-26px text-heading"></i>
                     </span>
                     <a href="{{ URL::to('/admin/plans') }}" class="stretched-link">Plans</a>
                     {{-- <small>Useful Popups</small> --}}
                 </div>
             </div>
         </div>
     </div>
 </li>
