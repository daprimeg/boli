@extends('admin.partial.app')

@push('title')Setting @endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-md-0 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{URL::to('profilesetting')}}">
                                <i class="icon-base ti tabler-users icon-sm me-1_5"></i> 
                                Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::to('changepassword')}}">
                                <i class="icon-base ti tabler-lock icon-sm me-1_5"></i> 
                                Security
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
                        <form id="formAccountSettings" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-header">Personal Information
                            </h5>
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-6">
                                    <img
                                        src="{{ optional(Auth::user())->avatar ? asset('/public/uploads/avatar/' . Auth::user()->avatar) : asset('assets/img/avatars/default.png') }}"
                                        alt="user-avatar"
                                        class="d-block w-px-100 h-px-100 rounded"
                                        id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="icon-base ti tabler-upload d-block d-sm-none"></i>
                                            <input
                                                type="file"
                                                id="upload"
                                                name="avatar"
                                                class="account-file-input"
                                                hidden
                                                accept="image/png, image/jpeg" />
                                            <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 gx-6 mb-6">
                            <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstName" name="firstName" value="{{ old('firstName', $user->firstName) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="lastName" class="form-label">Sur Name</label>
                            <input class="form-control" type="text" name="lastName" id="lastName" value="{{ old('lastName', $user->surname) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title', $user->title) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="organization" class="form-label">Job Title</label>
                            <input class="form-control" type="text" name="organization" value="{{ old('organization', $user->jobTitle) }}">
                            </div>
                            <h5 class="card-header">Company Details</h5>
                            <div class="col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <input type="text" name="phoneNumber" class="form-control" value="{{ old('phoneNumber', $user->phone) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="companyAddress1" class="form-label">Company Address 1</label>
                            <input class="form-control" type="text" name="companyAddress1" value="{{ old('companyAddress1', $user->companyAddress1) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="companyAddress2" class="form-label">Company Address 2</label>
                            <input class="form-control" type="text" name="companyAddress2" value="{{ old('companyAddress2', $user->companyAddress2) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="townCity" class="form-label">City / Town</label>
                            <input class="form-control" type="text" name="townCity" value="{{ old('townCity', $user->townCity) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" name="country" class="select2 form-select">
                            <option value="">Select</option>
                            @foreach(['Australia','Bangladesh','Canada','France','Germany','India','United Kingdom','United States'] as $country)
                            <option value="{{ $country }}" {{ old('country', $user->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                            @endforeach
                            </select>
                            </div>
                            <div class="col-md-6">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input class="form-control" type="text" name="zipCode" value="{{ old('zipCode', $user->postcode) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input class="form-control" type="text" name="telephone" value="{{ old('telephone', $user->telephone) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="website" class="form-label">Website</label>
                            <input class="form-control" type="text" name="website" value="{{ old('website', $user->website) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="businessEmail" class="form-label">Business Email</label>
                            <input class="form-control" type="email" name="businessEmail" value="{{ old('businessEmail', $user->businessEmail) }}">
                            </div>
                            <div class="col-md-6">
                            <label for="motorTradeInsurance" class="form-label">Motor Trade Insurance?</label>
                            <input class="form-control" type="text" name="motorTradeInsurance" value="{{ old('motorTradeInsurance', $user->motorTradeInsurance) }}">
                            </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
