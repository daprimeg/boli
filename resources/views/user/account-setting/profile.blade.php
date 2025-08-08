@extends('admin.partial.app')
@push('title')Account Setting @endpush
@section('content')
        @section('css')
    <style>
        .form-control{
            border-radius: var(--btn-border-radis);
            color:var(--dimtext);
        }
        .form-control:hover{
           border: 1px solid var(--bs-body-bg)!important; 
        }
        .form-control:focus{
          box-shadow: none;
        }
    </style>
@endsection
   
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
                           <h5 class="card-title">Personal Information</h5>
                    </div>
                    <div class="card-body pt-2">

                        <div class=" pb-5">
                            <div >
                                <img
                                    src="{{asset('/public/uploads/avatar/' . Auth::user()->avatar)}}"
                                    alt="user-avatar"
                                    class="d-block w-px-100 h-px-100 rounded"
                                    style="height: 100%; aspect-ratio: 1 / 1; border:1px solid var(--bs-b-color)!important "
                                    id="uploadedAvatar" />
                            </div>

                             <div class="">
                                <div class="button-wrapper pt-4">
                                    <label for="upload" class="btn  me-3 mb-4" tabindex="0"  style="background-color: var(--bs-body-bg)!important; border: 1px solid var(--bs-b-color);border-radius: var(--btn-border-radis)">
                                        <span class="d-none d-sm-block">Update new photo</span>
                                        <i class="icon-base ti tabler-upload d-block d-sm-none"></i>
                                        <input
                                            type="file"
                                            id="upload"
                                            name="avatar"
                                            class="account-file-input"
                                            hidden
                                            accept="image/png, image/jpeg" />
                                        <div></div>
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
                                <select  id="country" name="country" class="select2 form-select form-control">
                                    <option value="">Select</option>
                                    @foreach(['Australia','Bangladesh','Canada','France','Germany','India','United Kingdom','United States'] as $country)
                                    <option  value="{{ $country }}" {{ old('country', $user->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
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
                            <div class="col-12 pt-5">
                                <button type="submit" class="btn btn-primary me-3" style="border-radius: var(--btn-border-radis)">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary" style="border-radius: var(--btn-border-radis)">Cancel</button>
                            </div>
                        </div>
                         
                       </div>

                      </div>
                    </form>
                </div>
                


        </div>
    </div>
@endsection
