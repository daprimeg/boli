@if(Auth::user()->user_type == 0)

            <li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                <a href="{{URL::to('/dashboard')}}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-layout-dashboard"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>

            <li class="menu-item {{ request()->is('auctionfinder*') ? 'active' : '' }}">
              <a href="{{ route('auctionfinder') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-gavel"></i>
                <div data-i18n="Auction Finder">Auction Finder</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('reauction*') ? 'active open' : '' }}">
              <a href="{{ URL::to('/reauction') }}" class="menu-link" >
                <i class="menu-icon icon-base ti tabler-calendar-repeat"></i>
                <div data-i18n="Reauction">Reauction</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('interest*') ? 'active' : '' }}">
              <a href="{{ url('/interest') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-pointer-heart"></i>
                <div data-i18n="Interest">My Interest</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('auctionscheduler*') ? 'active' : '' }}">
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

            <li class="menu-item {{ request()->is('account-setting/billing*') ? 'active' : '' }}">
              <a href="{{url('/account-setting/billing')}}" class="menu-link">
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
              <a href="{{ url('userprofile') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-id"></i>
                <div data-i18n="Your Profile">Your Profile</div>
              </a>
            </li>
            
            <li class="menu-item {{ request()->is('account-setting/profile*')  ? 'active' : '' }}">
              <a href="{{url('/account-setting/profile')}}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-settings"></i>
                <div data-i18n="Setting">Setting</div>
              </a>
            </li>

  @endif