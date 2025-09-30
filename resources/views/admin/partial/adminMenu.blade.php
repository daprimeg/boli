
@if(Auth::user()->user_type != 0)
            
            <li class="menu-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                <a href="{{URL::to('/admin/dashboard')}}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-layout-dashboard"></i>
                    <div >Dashboard</div>
                </a>
            </li>
             @if(!empty($Permissions['masters']))
            <li class="menu-item {{ request()->is('admin/masters*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-database-import"></i>
                    <div >Master</div>
                </a>
                <ul class="menu-sub">

                    @if(!empty($Permissions['masters']['bodytypes']) && in_array('view', $Permissions['masters']['bodytypes']))
                        <li class="menu-item {{ request()->is('admin/masters/bodytypes*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/bodytypes') }}" class="menu-link">
                                <div >Body Type</div>
                            </a>
                        </li>
                    @endif

                    @if(!empty($Permissions['masters']['vehicletypes']) && in_array('view', $Permissions['masters']['vehicletypes']))
                        <li class="menu-item {{ request()->is('admin/masters/vehicletypes*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/vehicletypes') }}" class="menu-link">
                                <div >Vehicle Type</div>
                            </a>
                        </li>
                    @endif

                    @if(!empty($Permissions['masters']['platforms']) && in_array('view', $Permissions['masters']['platforms']))
                        <li class="menu-item {{ request()->is('admin/masters/platforms*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/platforms') }}" class="menu-link">
                                <div>Platform</div>
                            </a>
                        </li>
                    @endif

                    @if(!empty($Permissions['masters']['centers']) && in_array('view', $Permissions['masters']['centers']))
                        <li class="menu-item {{ request()->is('admin/masters/centers*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/centers') }}" class="menu-link">
                                <div >Center</div>
                            </a>
                        </li>
                    @endif

                    @if(!empty($Permissions['masters']['colours']) && in_array('view', $Permissions['masters']['colours']))
                        <li class="menu-item {{ request()->is('admin/masters/colours*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/colours') }}" class="menu-link">
                                <div >Colour</div>
                            </a>
                        </li>
                    @endif

                    @if(!empty($Permissions['masters']['makes']) && in_array('view', $Permissions['masters']['makes']))
                        <li class="menu-item {{ request()->is('admin/masters/makes*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/makes') }}" class="menu-link">
                                <div >Make</div>
                            </a>
                        </li>
                    @endif

                    @if(!empty($Permissions['masters']['models']) && in_array('view', $Permissions['masters']['models']))
                        <li class="menu-item {{ request()->is('admin/masters/models*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/models') }}" class="menu-link">
                                <div >Model</div>
                            </a>
                        </li>
                    @endif

                    @if(!empty($Permissions['masters']['variants']) && in_array('view', $Permissions['masters']['variants']))
                        <li class="menu-item {{ request()->is('admin/masters/variants*') ? 'active' : '' }}">
                            <a href="{{ url('/admin/masters/variants') }}" class="menu-link">
                                <div >Variant</div>
                            </a>
                        </li>
                    @endif

                </ul>
            </li>

            @endif
           @if(!empty($Permissions['datamanagement']))
            <li class="menu-item {{ request()->is('admin/auctions*') ? 'active' : '' }} {{ request()->is('admin/auctions*') ? 'open' : '' }} ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-database-import"></i>
                    <div >Data Management</div>
                </a>
                <ul class="menu-sub">

                    @if(!empty($Permissions['datamanagement']['auctions']) && in_array('view', $Permissions['datamanagement']['auctions']))
                    <li class="menu-item {{ request()->is('admin/auctions*') ? 'active' : '' }}">
                        <a href="{{ url('/admin/auctions') }}" class="menu-link">
                            <div >Import Data CSV</div>
                        </a>
                    </li>
                    @endif

                    @if(!empty($Permissions['datamanagement']['vehicles']) && in_array('view', $Permissions['datamanagement']['vehicles']))
                    <li class="menu-item {{ request()->is('admin/vehicle*') ? 'active' : '' }}">
                        <a href="{{ URL::to('/admin/vehicles') }}" class="menu-link">
                            <div >Vehicles</div>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

          @if(!empty($Permissions['staffpanel']))
          <li class="menu-item {{ request()->is('admin/users*') ? 'active open' : '' }} {{ request()->is('admin/role*') ? 'active open' : '' }}  {{ request()->is('admin/activity*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon icon-base ti tabler-users"></i>
                  <div >Staff Penal</div>
              </a>
              <ul class="menu-sub">
                  
                  @if(!empty($Permissions['staffpanel']['role']) && in_array('view', $Permissions['staffpanel']['role']))
                  <li class="menu-item {{ request()->is('admin/role*') ? 'active' : '' }}">
                      <a href="{{ url('/admin/role') }}" class="menu-link">
                          <div >Role</div>
                      </a>
                  </li>
                  @endif

                  @if(!empty($Permissions['staffpanel']['users']) && in_array('view', $Permissions['staffpanel']['users']))
                  <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                      <a href="{{ url('/admin/users') }}" class="menu-link">
                          <div >Users</div>
                      </a>
                  </li>
                  @endif

                  @if(!empty($Permissions['staffpanel']['activity']) && in_array('view', $Permissions['staffpanel']['activity']))
                  <li class="menu-item {{ request()->is('admin/activity*') ? 'active' : '' }}">
                      <a href="{{ url('/admin/activity') }}" class="menu-link">
                          <div >Activity</div>
                      </a>
                  </li>
                  @endif

              </ul>
          </li>
          @endif


        @if(!empty($Permissions['supporttickets']))
        <li class="menu-item {{ request()->is('admin/tickets*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-message-report"></i>
                <div >Support & Tickets</div>
            </a>
            <ul class="menu-sub">
                @if(!empty($Permissions['supporttickets']['tickets']) && in_array('view', $Permissions['supporttickets']['tickets']))
                <li class="menu-item {{ request()->is('admin/tickets*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/tickets') }}" class="menu-link">
                        <div >All Support Tickets</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if(!empty($Permissions['contentmanagement']))
        <li class="menu-item {{ request()->is('admin/news*') || request()->is('admin/blogs*') || request()->is('admin/blogcategories*') || request()->is('admin/ncategories*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-contract"></i>
                <div >Content Management</div>
            </a>
            <ul class="menu-sub">
                @if(!empty($Permissions['contentmanagement']['blogs']) && in_array('view', $Permissions['contentmanagement']['blogs']))
                <li class="menu-item {{ request()->is('admin/blogs*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/blogs') }}" class="menu-link">
                        <div >Blogs</div>
                    </a>
                </li>
                @endif

                @if(!empty($Permissions['contentmanagement']['blogcategories']) && in_array('view', $Permissions['contentmanagement']['blogcategories']))
                <li class="menu-item {{ request()->is('admin/blogcategories*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/blogcategories') }}" class="menu-link">
                        <div >Blogs Categories</div>
                    </a>
                </li>
                @endif

                @if(!empty($Permissions['contentmanagement']['news']) && in_array('view', $Permissions['contentmanagement']['news']))
                <li class="menu-item {{ request()->is('admin/news*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/news') }}" class="menu-link">
                        <div >News</div>
                    </a>
                </li>
                @endif

                @if(!empty($Permissions['contentmanagement']['ncategories']) && in_array('view', $Permissions['contentmanagement']['ncategories']))
                <li class="menu-item {{ request()->is('admin/ncategories*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/ncategories') }}" class="menu-link">
                        <div >News Categories</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if(!empty($Permissions['membersplans']))
        <li class="menu-item {{ request()->is('admin/memberShips*') || request()->is('admin/members*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-calendar-user"></i>
                <div >Members & Plans</div>
            </a>
            <ul class="menu-sub">
                @if(!empty($Permissions['membersplans']['members']) && in_array('view', $Permissions['membersplans']['members']))
                <li class="menu-item {{ request()->is('admin/members*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/members') }}" class="menu-link">
                        <div >Members</div>
                    </a>
                </li>
                @endif

                @if(!empty($Permissions['membersplans']['memberships']) && in_array('view', $Permissions['membersplans']['memberships']))
                <li class="menu-item {{ request()->is('admin/memberShips*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/memberShips') }}" class="menu-link">
                        <div >Membership</div>
                    </a>
                </li>
                @endif

                @if(!empty($Permissions['membersplans']['plans']) && in_array('view', $Permissions['membersplans']['plans']))
                <li class="menu-item {{ request()->is('admin/plans*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/plans') }}" class="menu-link">
                        <div >Plans</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        @if(!empty($Permissions['notifications']))
        <li class="menu-item {{ request()->is('admin/alerts*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-alarm-plus"></i>
                <div >Notifications</div>
            </a>
            <ul class="menu-sub">
                @if(!empty($Permissions['notifications']['alerts']) && in_array('view', $Permissions['notifications']['alerts']))
                <li class="menu-item {{ request()->is('admin/alerts*') ? 'active' : '' }}">
                    <a href="{{ url('/admin/alerts') }}" class="menu-link">
                        <div >Alerts</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif


  @endif