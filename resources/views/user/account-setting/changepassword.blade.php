@extends('admin.partial.app')
@push('title')Account Setting @endpush
@section('content')

   
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                       @include('user.account-setting.ui')
            </div>


            <div class="col-md-12">

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
               
                  <div class="card mb-6">
                        <div class="card-header">
                            <h5 class="card-title">Change Password</h5>
                        </div>
                        <div class="card-body pt-2">

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

                             <div class="col-12 pt-5">
                                <button type="submit" class="btn btn-primary me-3" style="border-radius: var(--btn-border-radis)">Save changes</button>
                            </div>

                       </div>
                    </div>
                 </form>
            </div>
                


        </div>




         <div class="card mb-6">
        <h5 class="card-header">Recent Devices</h5>
        <div class="table-responsive">
       <table class="table">
    <thead>
    <tr>
        <th>Browser / Platform</th>
        <th>Device</th>
        <th>Location</th>
        <th>Recent Activities</th>
    </tr>
</thead>
<tbody>
    @forelse ($userDevices as $device)
        <tr>
            <td>
                {{-- Get platform icon --}}
                @php
                    $platform = strtolower($device->platform);
                    $browser = strtolower($device->browser);

                    $platformIcon = match(true) {
                        str_contains($platform, 'windows') => 'tabler-brand-windows text-info',
                        str_contains($platform, 'android') => 'tabler-brand-android text-success',
                        str_contains($platform, 'iphone'), str_contains($platform, 'ios') => 'tabler-device-mobile text-danger',
                        str_contains($platform, 'mac') => 'tabler-brand-apple text-secondary',
                        default => 'tabler-world text-muted',
                    };

                    $browserIcon = match(true) {
                        str_contains($browser, 'chrome') => 'tabler-brand-chrome text-warning',
                        str_contains($browser, 'firefox') => 'tabler-brand-firefox text-orange',
                        str_contains($browser, 'safari') => 'tabler-brand-safari text-primary',
                        str_contains($browser, 'opera') => 'tabler-brand-opera text-danger',
                        str_contains($browser, 'edge') => 'tabler-brand-edge text-info',
                        str_contains($browser, 'internet explorer') => 'tabler-brand-internet-explorer text-secondary',
                        default => 'tabler-device-desktop',
                    };
                @endphp

                <i class="ti {{ $platformIcon }} me-1"></i>
                <i class="ti {{ $browserIcon }} me-1"></i>
                {{ ucfirst($device->browser) }} on {{ ucfirst($device->platform) }}
            </td>

            <td>{{ $device->device ?? 'Unknown Device' }}</td>
            <td>{{ $device->location ?? 'Unknown Location' }}</td>
            <td>{{ \Carbon\Carbon::parse($device->logged_in_at)->format('d, F Y H:i') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">No device history available.</td>
        </tr>
    @endforelse
</tbody>

</table>

        </div>
      </div>
    </div>
@endsection