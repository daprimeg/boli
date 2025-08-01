@extends('admin.partial.app')
@push('title')Account Setting @endpush
@section('content')

   
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                @include('user.account-setting.ui')
                <div class="card mb-6">
                    <div class="card-body pt-4">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form id="formAccountSettings" method="POST" action="{{url('/account-setting/profile')}}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-header">Personal Information</h5>
                            <div class="card-body">

                                 <div class="row mb-sm-6 mb-2">
                                    <div class="col-md-6 form-password-toggle form-control-validation">
                                        <label class="form-label" for="currentPassword">Current Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                            <span class="input-group-text cursor-pointer"
                                                ><i class="icon-base ti tabler-eye-off icon-xs"></i
                                                ></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-sm-6 gy-2 mb-sm-0 mb-2">
                                    <div class="mb-6 col-md-6 form-password-toggle form-control-validation">
                                        <label class="form-label" for="newPassword">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"  required />
                                            <span class="input-group-text cursor-pointer"
                                                ><i class="icon-base ti tabler-eye-off icon-xs"></i
                                                ></span>
                                        </div>
                                    </div>
                                    <div class="mb-6 col-md-6 form-password-toggle form-control-validation">
                                        <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="password" name="newPassword_confirmation" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                            <span class="input-group-text cursor-pointer"
                                                ><i class="icon-base ti tabler-eye-off icon-xs"></i
                                                ></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-body">Password Requirements:</h6>
                                <ul class="ps-4 mb-0">
                                    <li class="mb-4">Minimum 8 characters long - the more, the better</li>
                                    <li class="mb-4">At least one lowercase character</li>
                                    <li>At least one number, symbol, or whitespace character</li>
                                </ul>
                          
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection






@extends('admin.partial.app')

@push('title') Change Password @endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-md-0 gap-2">
                        <li class="nav-item">
                            <a class="nav-link " href="{{URL::to('profilesetting')}}">
                                <i class="icon-base ti tabler-users icon-sm me-1_5"></i> 
                                Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{URL::to('changepassword')}}">
                                <i class="icon-base ti tabler-lock icon-sm me-1_5"></i> 
                                Security
                            </a>
                        </li>
                    </ul>
                </div>
                
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <!-- Change Password -->
                <div class="card mb-6">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body pt-1">
                        <form id="formChangePassword" method="POST" action="{{url('account-setting/changePassword')}}">
                            @csrf
                           
                            <div class="mt-6">
                                <button type="submit" class="btn btn-primary me-3">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/ Change Password -->
                
                <!-- Recent Devices -->
                @php
                    function getBrowserIcon($browser) {
                        $browser = strtolower($browser);
                        if (str_contains($browser, 'chrome')) return 'tabler-brand-chrome text-info';
                        if (str_contains($browser, 'firefox')) return 'tabler-brand-firefox text-warning';
                        if (str_contains($browser, 'safari')) return 'tabler-brand-apple text-muted';
                        if (str_contains($browser, 'edge')) return 'tabler-brand-edge text-primary';
                        if (str_contains($browser, 'opera')) return 'tabler-brand-opera text-danger';
                        if (str_contains($browser, 'android')) return 'tabler-brand-android text-success';
                        if (str_contains($browser, 'iphone') || str_contains($browser, 'ios')) return 'tabler-device-mobile text-danger';
                        if (str_contains($browser, 'windows')) return 'tabler-brand-windows text-warning';
                        return 'tabler-device-laptop text-secondary';
                    }
                @endphp

                <div class="card mb-6">
                    <h5 class="card-header">Last Login Details</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-truncate">Browser</th>
                                    <th class="text-truncate">Device</th>
                                    <th class="text-truncate">Location</th>
                                    <th class="text-truncate">Login Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($userLoginLogs as $log)
                                    <tr>
                                        <td class="text-truncate text-heading fw-medium">
                                            <i class="icon-base ti tabler {{ getBrowserIcon($log->browser) }} icon-md align-top me-2"></i>
                                            {{ $log->browser }}
                                        </td>
                                        <td class="text-truncate">{{ $log->device ?? 'Unknown Device' }}</td>
                                        <td class="text-truncate">{{ $log->location ?? 'Unknown' }}</td>
                                        <td class="text-truncate">{{ \Carbon\Carbon::parse($log->login_at)->format('d, M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No login logs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Recent Devices -->
            </div>
        </div>
    </div>    
@endsection

