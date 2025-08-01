@if(Auth::user()->user_type == 0)

            <li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                <a href="{{URL::to('/dashboard')}}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-layout-dashboard"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>

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
                        <a href="{{ url('/interest') }}" class="menu-link">
                            <div data-i18n="My Interest">My Interest</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/interest/create') }}" class="menu-link">
                            <div data-i18n="Create Interest">Create Interest</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
              <a href="{{ URL::to('/auctionscheduler') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-gavel"></i>
                <div data-i18n="Auction Scheduler">Auction Schduler</div>
              </a>
            </li>

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

            <li class="menu-item {{ request()->is('subscriptions*') ? 'active' : '' }}">
              <a href="{{url('/subscriptions')}}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-id"></i>
                <div data-i18n="Billing Plan">Billing Plan</div>
              </a>
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
            
            <li class="menu-item {{ request()->is('profilesetting*') || request()->is('changepassword*')  ? 'active' : '' }}">
              <a href="{{url('/account-setting/profile')}}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-settings"></i>
                <div data-i18n="Setting">Setting</div>
              </a>
            </li>

  @endif