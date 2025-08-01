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
                                <button type="submit" class="btn btn-primary me-3">Save changes</button>
                            </div>

                       </div>
                    </div>
                 </form>
            </div>
                


        </div>
    </div>
@endsection