@if(Auth::user()->user_type == 1)

            <li class="menu-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <a href="{{URL::to('/admin/dashboard')}}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-layout-dashboard"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/masters*') ? 'active' : '' }} {{ request()->is('admin/masters*') ? 'open' : '' }} ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-database-import"></i>
                <div data-i18n="Master">Master</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item {{ request()->is('admin/masters/bodytypes*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/bodytypes') }}" class="menu-link">
                    <div data-i18n="Body Type">Body Type</div>
                  </a>
                </li>

                <li class="menu-item {{ request()->is('admin/masters/vehicletypes*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/vehicletypes') }}" class="menu-link">
                    <div data-i18n="Vehicle Type">Vehicle Type</div>
                  </a>
                </li>

                <li class="menu-item {{ request()->is('admin/masters/platforms*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/platforms') }}" class="menu-link">
                    <div data-i18n="Platform">Platform</div>
                  </a>
                </li>

                <li class="menu-item {{ request()->is('admin/masters/centers*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/centers') }}" class="menu-link">
                    <div data-i18n="Center">Center</div>
                  </a>
                </li>

                 <li class="menu-item {{ request()->is('admin/masters/colours*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/colours') }}" class="menu-link">
                    <div data-i18n="Colour">Colour</div>
                  </a>
                </li>

                <li class="menu-item {{ request()->is('admin/masters/makes*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/makes') }}" class="menu-link">
                    <div data-i18n="Make">Make</div>
                  </a>
                </li>

                 <li class="menu-item {{ request()->is('admin/masters/models*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/models') }}" class="menu-link">
                    <div data-i18n="Model">Model</div>
                  </a>
                </li>

                <li class="menu-item {{ request()->is('admin/masters/variants*') ? 'active' : '' }}">
                  <a href="{{ url('/admin/masters/variants') }}" class="menu-link">
                    <div data-i18n="Variant">Variant</div>
                  </a>
                </li>

                {{-- <li class="menu-item">
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
                </li> --}}

              </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/auctions*') ? 'active' : '' }} {{ request()->is('admin/auctions*') ? 'open' : '' }} ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-database-import"></i>
                <div data-i18n="Data Management">Data Management</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item {{ request()->is('admin/auctions*') ? 'active' : '' }}">
                  <a href="{{ route('admin.auctions.index') }}" class="menu-link">
                    <div data-i18n="Import Data CSV">Import Data CSV</div>
                  </a>
                </li>

                <li class="menu-item {{ request()->is('admin/vehicle*') ? 'active' : '' }}">
                  <a href="{{ URL::to('/admin/vehicles') }}" class="menu-link">
                    <div data-i18n="Vehicles">Vehicles</div>
                  </a>
                </li>

                {{-- <li class="menu-item">
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
                </li> --}}

              </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }} {{ request()->is('admin/users*') ? 'open' : '' }} ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
                <div data-i18n="User Management">User Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                  <a href="{{ route('admin.users.index') }}" class="menu-link">
                    <div data-i18n="Manage Users">Manage Users</div>
                  </a>
                </li>
                
                 {{-- <li class="menu-item">
                  <a href="{{ route('staff') }}" class="menu-link">
                    <div data-i18n="Manage Staff">Manage Staff</div>
                  </a>
                </li>  --}}

              </ul>
            </li>
            
          {{-- 
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
            </li>  --}}

            <li class="menu-item {{ request()->is('admin/tickets*') ? 'active' : '' }} {{ request()->is('admin/tickets*') ? 'open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-message-report"></i>
                <div data-i18n="Support & Tickets">Support & Tickets</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item {{ request()->is('admin/tickets*') ? 'active' : '' }}">
                  <a href="{{ route('admin.tickets.index') }}" class="menu-link">
                    <div data-i18n="All Support Tickets">All Support Tickets
                    </div>
                  </a>
                </li>
              </ul>
            </li>
        
            <li class="menu-item {{ request()->is('admin/news*') || request()->is('admin/blogs*') || request()->is('admin/blogcategories*') ? 'active open' : '' }} ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-contract"></i>
                <div data-i18n="Content Management">Content Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/blogs*')  ? 'active' : '' }} ">
                  <a href="{{ route('blogs.index') }}" class="menu-link">
                    <div data-i18n="Blogs">Blogs</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('admin/blogcategories*')  ? 'active' : '' }}">
                  <a href="{{ route('blogcategories.index') }}" class="menu-link">
                    <div data-i18n="Blogs Categories">Blogs Categories</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('admin/news*')  ? 'active' : '' }}">
                  <a href="{{ route('admin.news.index') }}" class="menu-link">
                    <div data-i18n="News">News</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/memberships*') || request()->is('admin/plans*')  ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-calendar-user"></i>
                <div data-i18n="Members & Plans">Members & Plans</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/memberships*') ? 'active open' : '' }}">
                  <a href="{{ route('admin.memberships.index') }}" class="menu-link">
                    <div data-i18n="Members">Members</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('admin/plans*') ? 'active open' : '' }}">
                  <a href="{{ route('admin.plans.index') }}" class="menu-link">
                    <div data-i18n="Plans">Plans</div>
                  </a>
                </li>
              </ul>
            </li>

            {{-- <li class="menu-item">
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
            </li>  --}}
{{-- 
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
            </li> --}}

            <li class="menu-item {{ request()->is('admin/alerts*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-alarm-plus"></i>
                <div data-i18n="Notifications">Notifications</div>
              </a>
              <ul class="menu-sub">
                {{-- <li class="menu-item">
                  <a href="{{ route('customemailtemplate') }}" class="menu-link">
                    <div data-i18n="Custom Email Template">Custom Email Template</div>
                  </a>
                </li> --}}
                <li class="menu-item {{ request()->is('admin/alerts*') ? 'active' : '' }}">
                  <a href="{{ route('alerts.index') }}" class="menu-link">
                    <div data-i18n="Alerts">Alerts</div>
                  </a>
                </li>
              </ul>
            </li>

            @endif