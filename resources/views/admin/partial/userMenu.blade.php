@if(Auth::user()->user_type == 0)

            <!-- Layouts -->
            <li class="menu-item">
              <a href="{{ route('auctionfinder') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-gavel"></i>
                <div data-i18n="Auction Finder">Auction Finder</div>
              </a>
            </li>

            <li class="menu-item">              
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-pointer-heart"></i>
                <div data-i18n="Interest">Interest</div>
              </a>
              <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('interest') }}" class="menu-link">
                            <div data-i18n="My Interest">My Interest</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('interests.index') }}" class="menu-link">
                            <div data-i18n="Create Interest">Create Interest</div>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <li class="menu-item">              
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-calendar-stats"></i>
                <div data-i18n="Auctions">Auctions</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('auctioncalender') }}" class="menu-link">
                    <div data-i18n="Schedule">Schedule</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('auctiondetail') }}" class="menu-link">
                    <div data-i18n="Auction Detail">Auction Detail</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('timeauction') }}" class="menu-link">
                    <div data-i18n="Time Auction">Time Auction</div>
                  </a>
                </li>
                </ul>
            </li> --}}
{{-- 
            <li class="menu-item">
              <a href="{{ route('pricing') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-clock-dollar"></i>
                <div data-i18n="Pricing">Pricing</div>
              </a>
            </li> --}}
{{-- 
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-calendar-repeat"></i>
                <div data-i18n="Reauction ">Reauction</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('reauctiontracker') }}" class="menu-link">
                    <div data-i18n="Tracker">Tracker</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('platformwise') }}" class="menu-link">
                    <div data-i18n="Platform Wise">Platform Wise</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('search') }}" class="menu-link">
                    <div data-i18n="Search">Search</div>
                  </a>
                </li>
              </ul>
            </li> --}}

            {{-- <li class="menu-item">
              <a href="{{ route('comparevehicles') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-compass"></i>
                <div data-i18n="Compare Vehicles">Compare Vehicles</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('vinsearch') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-clipboard-search"></i>
                <div data-i18n="Vin Search">Vin Search</div>
              </a>
            </li>

              <li class="menu-item">
                <a href="{{ route('gellery') }}" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-library-photo"></i>
                  <div data-i18n="Gallery">Gallery</div>
                </a>
              </li> --}}

                <!-- Front Pages -->
                <!-- <li class="menu-item">
                  <a href="pinsearch" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-files"></i>
                    <div data-i18n="Pin Search">Pin Search</div>
                  </a>
                </li> -->

                <!-- Apps & Pages -->

                <!-- <li class="menu-item">
                  <a href="todayplan" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-mail"></i>
                    <div data-i18n="Today's Plan">Today's Plan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="closesearch" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-messages"></i>
                    <div data-i18n="Close Search">Close Search</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="budgetfinder" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-calendar"></i>
                    <div data-i18n="Budget Finder">Budget Finder</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="reselltracker" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-layout-kanban"></i>
                    <div data-i18n="Resell Tracker">Resell Tracker</div>
                  </a>
                </li> -->

  
                <!-- Components -->
                {{-- <li class="menu-header small">
                  <span class="menu-header-text" data-i18n="Profile">Profile</span>
                </li> --}}

                <li  class="menu-item">
                  <div style="margin: 0px 15px;border-bottom: 1px solid var(--bs-border-color);padding-bottom: 9px;padding-top: 16px;" data-i18n="Profile">Profile </div>
                </li>

                <li class="menu-item {{ request()->is('tickethistory*') || request()->is('createticket*') || request()->is('ticket*') ? 'open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-info-hexagon"></i>
                    <div data-i18n="Support">Support</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('createticket*')  ? 'active' : '' }}">
                      <a href="{{ route('ticket.create') }}" class="menu-link ">
                        <div data-i18n="Create Ticket">Create Ticket</div>
                      </a>
                    </li>
                    <li class="menu-item {{ request()->is('tickethistory*') || request()->is('ticket*') ? 'active' : '' }}">
                      <a href="{{ route('ticket.history') }}" class="menu-link">
                        <div data-i18n="Ticket History">Ticket History</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item {{ request()->is('news*') ? 'active' : '' }}">
                  <a href="{{ route('news.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-news"></i>
                    <div data-i18n="News">News</div>
                  </a>
                </li>

                <!-- Cards -->
                <li class="menu-item {{ request()->is('userprofile*') ? 'active' : '' }}">
                  <a href="{{ route('profile.userprofile') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-id"></i>
                    <div data-i18n="Your Profile">Your Profile</div>
                  </a>
                </li>

                {{-- <li class="menu-item">
                  <a href="{{ route('profile.billingplans') }}"  class="menu-link">
                    <i class="menu-icon icon-base ti tabler-progress-check"></i>
                    <div data-i18n="Plan Details">Plan Details</div>
                  </a>
                </li> --}}

                <li class="menu-item {{ request()->is('profilesetting*') || request()->is('changepassword*')  ? 'active' : '' }}">
                  <a href="{{ route('profile.edit') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-settings"></i>
                    <div data-i18n="Setting">Setting</div>
                  </a>
                </li>

    @endif