<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="{{ asset('/public/uploads/avatar/' . Auth::user()->avatar) }}" alt="Avatar" class="rounded-circle" />
        </div>
    </a>

    <ul class="dropdown-menu dropdown-menu-end" style="border: 1px solid var(--bs-b-color);">
        <!-- User Info -->
        <li>
            <a class="dropdown-item mt-0" href="{{ URL::to('/userprofile') }}">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('/public/uploads/avatar/' . Auth::user()->avatar) }}" class="rounded-circle" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">{{ Auth::user()->firstName }} {{ Auth::user()->surname }}</h6>
                        <small class="text-body-secondary">
                            {{ Auth::user()->user_type == 1 ? 'Admin' : 'User' }}
                        </small>
                    </div>
                </div>
            </a>
        </li>
        @if (Auth::user()->user_type == 1)
            <li>
                <div class="d-grid px-3 py-2">
                    @if (Request::is('admin/dashboard*'))
                        {{-- Admin dashboard pe ho to Go to User Panel dikhaye --}}
                        <a href="{{ url('/dashboard') }}" 
                        class="btn btn-sm btn-primary d-flex align-items-center justify-content-center">
                            <i class="ti tabler-users me-2 icon-md"></i>
                            <span>Go to User Panel</span>
                        </a>
                    @else
                        {{-- User panel pe ho to Go to Admin Panel dikhaye --}}
                        <a href="{{ url('/admin/dashboard') }}" 
                        class="btn btn-sm btn-success d-flex align-items-center justify-content-center">
                            <i class="ti tabler-shield-check me-2 icon-md"></i>
                            <span>Go to Admin Panel</span>
                        </a>
                    @endif
                </div>
            </li>
        @endif



        <li><div class="dropdown-divider my-1 mx-n2"></div></li>

        <!-- Profile -->
        <li>
            <a class="dropdown-item" href="{{ URL::to('/userprofile') }}">
                <i class="icon-base ti tabler-user me-3 icon-md"></i>
                <span class="align-middle">My Profile</span>
            </a>
        </li>

        <!-- Settings & Billing (only for user) -->
        @if (Auth::user()->user_type != 1)
            <li>
                <a class="dropdown-item" href="{{ URL::to('/account-setting/profile') }}">
                    <i class="icon-base ti tabler-settings me-3 icon-md"></i>
                    <span class="align-middle">Settings</span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ url('/account-setting/billing') }}">
                    <span class="d-flex align-items-center">
                        <i class="flex-shrink-0 icon-base ti tabler-file-dollar me-3 icon-md"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                    </span>
                </a>
            </li>
        @endif

        <!-- ✅ Go to User Panel (only for Admin) -->


        <li><div class="dropdown-divider my-1 mx-n2"></div></li>

        <!-- Logout -->
        <li>
            <div class="d-grid px-2 pt-2 pb-1">
                <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center justify-content-center">
                        <small class="align-middle">Logout</small>
                        <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                    </button>
                </form>
            </div>
        </li>
    </ul>
</li>
