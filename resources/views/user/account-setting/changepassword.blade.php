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
                <th class="">Browser</th>
                <th class="">Device</th>
                <th class="">Location</th>
                <th class="">Recent Activities</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class=" "><i class="icon-base ti tabler-brand-windows icon-md align-top text-info me-2"></i>Chrome on Windows</td>
                <td class="">HP Spectre 360</td>
                <td class="">Switzerland</td>
                <td class="">10, July 2021 20:07</td>
              </tr>
              <tr>
                <td class=" "><i class="icon-base ti tabler-device-mobile icon-md  align-top text-danger me-2"></i>Chrome on iPhone</td>
                <td class="">iPhone 12x</td>
                <td class="">Australia</td>
                <td class="">13, July 2021 10:10</td>
              </tr>
              <tr>
                <td class=" "><i class="icon-base ti tabler-brand-android icon-md align-top text-success me-2"></i>Chrome on Android</td>
                <td class="">Oneplus 9 Pro</td>
                <td class="">Dubai</td>
                <td class="">14, July 2021 15:15</td>
              </tr>
              <tr>
                <td class=" "><i class="icon-base ti tabler-brand-apple icon-md align-top me-2"></i>Chrome on MacOS</td>
                <td class="">Apple iMac</td>
                <td class="">India</td>
                <td class="">16, July 2021 16:17</td>
              </tr>
              <tr>
                <td class=" "><i class="icon-base ti tabler-brand-windows icon-md align-top text-warning me-2"></i>Chrome on Windows</td>
                <td class="">HP Spectre 360</td>
                <td class="">Switzerland</td>
                <td class="">20, July 2021 21:01</td>
              </tr>
              <tr class="border-transparent">
                <td class=" "><i class="icon-base ti tabler-brand-android icon-md align-top text-success me-2"></i>Chrome on Android</td>
                <td class="">Oneplus 9 Pro</td>
                <td class="">Dubai</td>
                <td class="">21, July 2021 12:22</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection