@extends('admin.partial.app')
@push('title') User Profile @endpush



@section('css')
    <style>
       .costomeul-color li {
            font-size: var(--font-p1)
    color: var(--bs-body-color);

       }
      .costomeul-color li span:first-of-type {
    font-weight: bold;
            color: var(--dimtext) !important;

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
                            <img src="{{asset('/public/uploads/avatar/'.Auth::user()->avatar)}}" alt="user image"  class=" user-profile-img" style="width: 120px;padding: 10px "  />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-lg-5 mb-3">
                            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="mb-2 mt-lg-6">{{ Auth::user()->firstName }} {{ Auth::user()->surname }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                                        
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="icon-base ti tabler-palette icon-lg"></i
                                                ><span class="">{{ Auth::user()->id }}</span>
                                        </li>

                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="icon-base ti tabler-palette icon-lg"></i
                                                ><span class="">{{ Auth::user()->jobTitle }}</span>
                                        </li>
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="icon-base ti tabler-map-pin icon-lg"></i
                                                ><span class="">{{ Auth::user()->country }} {{ Auth::user()->townCity }}</span>
                                        </li>
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="icon-base ti tabler-calendar icon-lg"></i
                                                ><span class=""> Joined {{ Auth::user()->created_at->format('d M Y') }}</span>
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
                        <p class="card-text text-uppercase text-body-secondary small mb-0">Company Details</p>
                        <ul class="list-unstyled costomeul-color my-3 py-1">
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-user icon-lg"></i>
                                <span class=" mx-2">Business Name:</span> 
                                <span>{{ Auth::user()->companyName }} </span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-check icon-lg"></i><span class=" mx-2">Business Type:</span>
                                <span>{{ Auth::user()->businessType }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-crown icon-lg"></i><span class=" mx-2">Website:</span>
                                <span>{{ Auth::user()->website }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-flag icon-lg"></i><span class=" mx-2">Business Email:</span>
                                <span>{{ Auth::user()->businessEmail }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">Motor Trade Insurance:</span> <span>{{ Auth::user()->motorTradeInsurance }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">VAT Number:</span> <span>{{ Auth::user()->vatNumber }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">Company Address 1:</span> <span>{{ Auth::user()->companyAddress1 }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">Company Address 1:</span> <span>{{ Auth::user()->companyAddress2 }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">Town City:</span> <span>{{ Auth::user()->townCity }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">Country:</span> <span>{{ Auth::user()->country }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">Postcode / Zip code :</span> <span>{{ Auth::user()->postcode }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-language icon-lg"></i>
                                <span class=" mx-2">Telephone:</span> <span>{{ Auth::user()->telephone }}</span>
                            </li>
                        </ul>
                        <p class="card-text text-uppercase text-body-secondary small mb-0">Personal Information</p>
                        <ul class="list-unstyled costomeul-color my-3 py-1">
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-user icon-lg"></i>
                                <span class=" mx-2">First Name:</span> 
                                <span>{{ Auth::user()->firstName }} </span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-check icon-lg"></i>
                                <span class=" mx-2">Sur Name:</span>
                                <span>{{ Auth::user()->surname }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-crown icon-lg"></i>
                                <span class=" mx-2">Title:</span>
                                <span>{{ Auth::user()->title }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon-base ti tabler-flag icon-lg"></i>
                                <span class=" mx-2">Job Title:</span>
                                <span>{{ Auth::user()->jobTitle }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-phone-call icon-lg"></i>
                                <span class=" mx-2">Number:</span>
                                <span>{{ Auth::user()->phone }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-mail icon-lg"></i>
                                <span class=" mx-2">Personal Email:</span> 
                                <span>{{ Auth::user()->personalEmail }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-mail icon-lg"></i>
                                <span class=" mx-2">Personal Email:</span> 
                                <span>{{ Auth::user()->personalEmail }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-mail icon-lg"></i>
                                <span class=" mx-2">Upload ID:</span>
                                @if(Auth::user()->uploadID)
                                  <a href="{{ asset('/public/uploads/uploadID/' . Auth::user()->uploadID) }}"  class="btn btn-sm btn-outline-primary ms-2" download> Download</a>
                                @else
                                  <span class="text-muted">No file uploaded</span>
                                @endif
                            </li>
                        </ul>
                        <p class="card-text text-uppercase text-body-secondary small mb-0">Personal Information</p>
                        <ul class="list-unstyled costomeul-color my-3 py-1">
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-mail icon-lg"></i>
                                    <span class=" mx-2">Motor Trade Proof:</span>
                                @if(Auth::user()->motorTradeProof)
                                <a href="{{ asset('/public/uploads/motorTradeProof/' . Auth::user()->motorTradeProof) }}" class="btn btn-sm btn-outline-primary ms-2" download >Download</a>
                                @else
                                  <span class="text-muted">No file uploaded</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-base ti tabler-mail icon-lg"></i>
                                <span class=" mx-2">Address Proof:</span>
                                @if(Auth::user()->addressProof)
                                  <a href="{{ asset('/public/uploads/addressProof/'. Auth::user()->addressProof) }}"  class="btn btn-sm btn-outline-primary ms-2"  download>Download</a>
                                @else
                                  <span class="text-muted">No file uploaded</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card card-action mb-6">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0">
                            <i class="icon-base ti tabler-chart-bar-popular icon-lg me-4"></i>User Alerts
                        </h5>
                        <div class="card-action-element">
                            <div class="dropdown">
                                <button
                                    type="button"
                                    class="btn dropdown-toggle hide-arrow p-0 text-body-secondary"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="javascript:void(0);">Share timeline</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                            <ul class="timeline mb-0">
                                @foreach($alerts as $alert)
                                    <li class="timeline-item timeline-item-transparent">
                                        <span class="timeline-point timeline-point-primary"></span>
                                            <div class="timeline-event">
                                                <div class="timeline-header mb-3">
                                                    <h6 class="mb-0">{{ $alert->subject }}</h6>
                                                    <small class="text-body-secondary">{{ $alert->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="mb-2">{{ $alert->message }}</p>

                                                @if($alert->file && file_exists(public_path('/public/uploads/alerts/' . $alert->file)))
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="badge bg-lighter rounded d-flex align-items-center">
                                                            <img src="{{ asset('assets/img/icons/misc/pdf.png') }}" alt="img" width="15" class="me-2" />
                                                            <a href="{{ asset('public/uploads/alerts/' . $alert->file) }}" download class="h6 mb-0 text-body">
                                                                {{ $alert->file }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="d-flex align-items-center mb-2">
                                                    @if($alert->user && $alert->user->avatar)
                                                        <img src="{{ asset('public/storage/' . $alert->user->avatar) }}" alt="Avatar" class="rounded-circle" width="40" height="40">
                                                    @else
                                                        <img src="{{ asset('assets/img/avatars/default.png') }}" alt="Default Avatar" class="rounded-circle" width="40" height="40">
                                                    @endif
                                                    <div class="ms-3">
                                                        <p class="mb-0 small ">{{ $alert->user ? $alert->user->firstName : 'Unknown' }} {{ $alert->user ? $alert->user->surname : '' }}</p>
                                                        <small>CEO OF {{ $alert->user && $alert->user->companyName ? $alert->user->companyName : 'No Company' }}</small>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
               </div>
          </div>
</div>
@endsection
