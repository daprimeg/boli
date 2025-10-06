    <li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a href="{{URL::to('/dashboard')}}" class="menu-link">
            <i class="menu-icon icon-base ti tabler-layout-dashboard"></i>
            {{-- <div data-i18n="Dashboard">Dashboard</div> --}}
            <div >Dashboard</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('auction-finder*') ? 'active' : '' }}">
        <a href="{{ url('/auction-finder') }}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-gavel"></i>
        {{-- <div data-i18n="Auction Finder">Auction Finder</div> --}}
        <div >Auction Finder</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('interest*') ? 'active' : '' }}">
        <a href="{{ url('/interest') }}" class="menu-link">    
        <i class="menu-icon icon-base ti tabler-pointer-heart"></i>         
        {{-- <div data-i18n="My Interest">My Interest</div> --}}
        <div >My Interest</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('viewhistory*') ? 'active' : '' }}">
            <a href="{{ url('/viewhistory') }}" class="menu-link">    
                <i class="menu-icon ti tabler-history"></i>         
                <div>Watchlist</div>
            </a>
    </li>


    <li class="menu-item {{ request()->is('reauction*') ? 'active open' : '' }}">
        <a href="{{ URL::to('/reauction') }}" class="menu-link" >
        <i class="menu-icon icon-base ti tabler-calendar-repeat"></i>
        {{-- <div data-i18n="Reauction">Reauction</div> --}}
        <div >Reauction</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('compare*') ? 'active open' : '' }}">
        <a href="{{ URL::to('/compare') }}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-arrows-diff"></i>
        {{-- <div data-i18n="Compare">Compare</div> --}}
        <div >Compare</div>
        </a>
    </li>


    <li class="menu-item {{ request()->is('auctionscheduler*') ? 'active' : '' }}">
        <a href="{{ URL::to('/auctionscheduler') }}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-gavel"></i>
        {{-- <div data-i18n="Auction Scheduler">Auction Scheduler</div> --}}
        <div >Auction Scheduler</div>
        </a>
    </li>

    <li  class="menu-item">
        <div style="margin: 0px 15px;border-bottom: 1px solid var(--bs-border-color);padding-bottom: 9px;padding-top: 16px; font-size: var(--font-p2)"  data-i18n="Profile">Profile </div>
    </li>

    <li class="menu-item {{ request()->is('tickethistory*') || request()->is('createticket*') || request()->is('ticket*') ? 'active' : '' }}">
        <a href="{{ route('ticket.history') }}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-news"></i>
        <div >Support</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('news*') ? 'active' : '' }}">
        <a href="{{ route('news.index') }}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-news"></i>
        <div >News</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('blog*') ? 'active' : '' }}">
        <a href="{{ route('blog.index') }}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-news"></i>
        <div >Blog</div>
        </a>
    </li>

    <!-- Cards -->
    <li class="menu-item {{ request()->is('userprofile*') ? 'active' : '' }}">
        <a href="{{ url('userprofile') }}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-id"></i>
        <div >Your Profile</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('account-setting/profile*')  ? 'active' : '' }}">
        <a href="{{url('/account-setting/profile')}}" class="menu-link">
        <i class="menu-icon icon-base ti tabler-settings"></i>
        <div >Setting</div>
        </a>
    </li>