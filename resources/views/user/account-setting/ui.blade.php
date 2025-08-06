<div class="nav-align-top">
    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-md-0 gap-2">
        <li class="nav-item">
            <a style="border-radius: var(--btn-border-radis) !important;" class="nav-link {{ request()->is('account-setting/profile') ? 'active' : '' }}" 
                 href="{{URL::to('/account-setting/profile')}}">
                <i class="icon-base ti tabler-users icon-sm me-1_5"></i> 
                Account
            </a>
        </li>
        <li class="nav-item">
            <a style="border-radius: var(--btn-border-radis) !important;" class="nav-link {{ request()->is('account-setting/changePassword') ? 'active' : '' }}" href="{{URL::to('/account-setting/changePassword')}}">
                <i class="icon-base ti tabler-lock icon-sm me-1_5"></i> 
                Security
            </a>
        </li>
        <li class="nav-item">
            <a style="border-radius: var(--btn-border-radis) !important;" class="nav-link {{ request()->is('account-setting/billing') ? 'active' : '' }}" href="{{URL::to('/account-setting/billing')}}">
                <i class="icon-base ti tabler-lock icon-sm me-1_5"></i> 
                Billing & Plans
            </a>
        </li>

    
        {{-- <li class="nav-item">
            <a class="nav-link" href="#"
                ><i class="icon-base ti tabler-bell icon-sm me-1_5"></i> Notifications</a
                >
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"
                ><i class="icon-base ti tabler-link icon-sm me-1_5"></i> Connections</a
                >
        </li> --}}
    </ul>
</div>