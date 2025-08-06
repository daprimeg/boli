@extends('admin.partial.app')
@push('title')
    User Profile
@endpush



@section('css')
    <style>
        .costomeul-color li {
            font-size: var(--font-p2);
            color: var(--bs-body-color);

        }

        .costomeul-color li span:first-of-type {
            color: var(--bs-emphasis-color) !important;

        }
    </style>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6">
                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center ">
                        <div class="" style="width: 130px; background-color: var(--bs-body-bg);margin: 20px">
                            <img src="{{ asset('/public/uploads/avatar/' . Auth::user()->avatar) }}" alt="user image"
                                class=" user-profile-img" style="width: 120px;padding: 10px " />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-lg-5 mb-3">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="mb-2 mt-lg-6">{{ Auth::user()->firstName }} {{ Auth::user()->surname }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
{{-- 
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                          <span
                                                class="">{{ Auth::user()->id }}</span>
                                        </li> --}}

                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                          <i class="fas fa-id-card"></i>
                                            <span
                                                class="">{{ Auth::user()->jobTitle }}</span>
                                        </li>
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                           <i class="fas fa-map-marker-alt"></i><span
                                                class="">{{ Auth::user()->country }}
                                                {{ Auth::user()->townCity }}</span>
                                        </li>
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="fas fa-calendar-alt"></i><span class=""> Joined
                                                {{ Auth::user()->created_at->format('d M Y') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="card mb-6">
                    <div class="card-body">
                        <h5 class="card-text text-uppercase   mb-0">Company Details</h5>
                        <ul class="list-unstyled costomeul-color my-3 py-1">
                            <li class="d-flex align-items-center mb-4">
                                <i class="fas fa-building"></i>

                                <span class=" mx-2">Business Name:</span>
                                <span>{{ Auth::user()->companyName }} </span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="fas fa-briefcase"></i>
                                <span class=" mx-2">Business Type:</span>
                                <span>{{ Auth::user()->businessType }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="fas fa-globe"></i>
                                <span class=" mx-2">Website:</span>
                                <span>{{ Auth::user()->website }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="fas fa-envelope"></i>

                                <span class=" mx-2">Business Email:</span>
                                <span>{{ Auth::user()->businessEmail }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="fas fa-car"></i>

                                <span class=" mx-2">Motor Trade Insurance:</span>
                                <span>{{ Auth::user()->motorTradeInsurance }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="fas fa-receipt"></i>

                                <span class=" mx-2">VAT Number:</span> <span>{{ Auth::user()->vatNumber }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                               <i class="fas fa-map-marker-alt"></i>

                                <span class=" mx-2">Company Address 1:</span>
                                <span>{{ Auth::user()->companyAddress1 }}</span>
                            </li>

                            <li class="d-flex align-items-center mb-4">
                                <i class="fa-regular fa-building"></i>
                                <span class=" mx-2">Company Address 1:</span>
                                <span>{{ Auth::user()->companyAddress2 }}</span>
                            </li>
                            
                            <li class="d-flex align-items-center mb-4">
                               <i class="fas fa-city"></i>
                                <span class=" mx-2">Town City:</span> <span>{{ Auth::user()->townCity }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="fa-solid fa-flag"></i>
                                <span class=" mx-2">Country:</span> <span>{{ Auth::user()->country }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                               <i class="fas fa-mail-bulk"></i>

                                <span class=" mx-2">Postcode / Zip code :</span> <span>{{ Auth::user()->postcode }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="fa-solid fa-phone"></i>
                                <span class=" mx-2">Telephone:</span> <span>{{ Auth::user()->telephone }}</span>
                            </li>
                        </ul>
                        <h5 class="card-text text-uppercase   mb-0">Personal Information</h5>
                        <ul class="list-unstyled costomeul-color my-3 py-1">
                            <li class="d-flex align-items-center mb-4">
                               <i class="fas fa-user"></i>
                                <span class=" mx-2">Full Name:</span>
                                <span>{{ Auth::user()->firstName }} {{ Auth::user()->surname }}</span>
                            </li>
                            
                            <li class="d-flex align-items-center mb-4">
                              <i class="fas fa-id-card"></i>

                                <span class=" mx-2">Title:</span>
                                <span>{{ Auth::user()->title }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                               <i class="fas fa-briefcase"></i>

                                <span class=" mx-2">Job Title:</span>
                                <span>{{ Auth::user()->jobTitle }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                               <i class="fa-solid fa-phone-volume"></i>
                                <span class=" mx-2">Number:</span>
                                <span>{{ Auth::user()->phone }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                               <i class="fas fa-envelope"></i>

                                <span class=" mx-2">Personal Email:</span>
                                <span>{{ Auth::user()->personalEmail }}</span>
                            </li>
                            
                            <li class="d-flex align-items-center mb-4">
                              <i class="fas fa-id-card"></i>

                                <span class=" mx-2">Upload ID:</span>
                                @if (Auth::user()->uploadID)
                                    <a href="{{ asset('/public/uploads/uploadID/' . Auth::user()->uploadID) }}"
                                        class="btn btn-sm btn-outline-primary ms-2" download> Download</a>
                                @else
                                    <span class="text-muted">No file uploaded</span>
                                @endif
                            </li>


                             <li class="d-flex align-items-center mb-4">
                                    <i class="fas fa-file-alt"></i>
                                <span class=" mx-2">Motor Trade Proof:</span>
                                @if (Auth::user()->motorTradeProof)
                                    <a href="{{ asset('/public/uploads/motorTradeProof/' . Auth::user()->motorTradeProof) }}"
                                        class="btn btn-sm btn-outline-primary ms-2" download>Download</a>
                                @else
                                    <span class="text-muted">No file uploaded</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="fas fa-file-alt"></i>
                                <span class=" mx-2">Address Proof:</span>
                                @if (Auth::user()->addressProof)
                                    <a href="{{ asset('/public/uploads/addressProof/' . Auth::user()->addressProof) }}"
                                        class="btn btn-sm btn-outline-primary ms-5" download>Download</a>
                                @else
                                    <span class="text-muted">No file uploaded</span>
                                @endif
                            </li>
                        </ul>
                        {{-- <h2 class="card-text text-uppercase   mb-0">Personal Information</h2> --}}
                        <ul class="list-unstyled costomeul-color my-3 py-1">
                           
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card card-action mb-6">

                    <div class="card-body pt-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
