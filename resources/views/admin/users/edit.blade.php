@extends('admin.partial.app')
@push('title') Users @endpush
@section('css')

<style>
   .form-label{
         padding-top: 18px;
         padding-bottom: 6px;
         font-size: 15px;
   }
</style>
@endsection
@section('content')

  <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">
                <form action="{{ route('admin.users.update', $user ? $user->id : 0 )}}" 
                     method="POST" enctype="multipart/form-data">
                  @csrf
                  @if($user)
                    <input type="hidden" name="user_type" value="{{ $user->user_type }}" />
                  @endif
              
                <div class="card">
                    <div class="card-header border-bottom">
                         <h5 class="card-title">{{$user ? 'Edit' : 'Create'}} User</h5>
                    </div>
                    <div class="card-body">

                        <div class="row pb-5">
                            <div class="col-12 pt-3">
                                <h4 class="card-title ">Company Details</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company / Trading or Business Name <span class="text-danger" >*</span></label>
                                    <input type="text" name="companyName" class="form-control" value="{{ $user ? $user->companyName : ''}}" required>
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Business Type <span class="text-danger" >*</span></label>
                                    <select name="businessType" class="form-control" required >
                                        <option {{$user && $user->businessType == 'Motor Trader' ? 'selected' : '' }} >Motor Trader</option>
                                        <option {{$user && $user->businessType == 'Car Supermarket' ? 'selected' : '' }} >Car Supermarket</option>
                                        <option {{$user && $user->businessType == 'Franchise Dealer' ? 'selected' : '' }}>Franchise Dealer</option>
                                        <option {{$user && $user->businessType == 'Fleet' ? 'selected' : '' }}>Fleet</option>
                                        <option {{$user && $user->businessType == 'Small Independent' ? 'selected' : '' }}>Small Independent</option>
                                        <option {{$user && $user->businessType == 'Large Independent' ? 'selected' : '' }}>Large Independent</option>
                                    </select>
                                </div>
                            </div>
                               <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Registration</label>
                                    <input type="text" name="companyReg" class="form-control" value="{{ $user ? $user->companyReg : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" name="website" class="form-control" value="{{ $user ? $user->website : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Business Email</label>
                                    <input type="email" name="businessEmail" class="form-control" value="{{ $user ? $user->businessEmail : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Motor Trade Insurance</label>
                                    <input type="text" name="motorTradeInsurance" class="form-control" value="{{$user ? $user->motorTradeInsurance : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">VAT Number</label>
                                    <input type="text" name="vatNumber" class="form-control" value="{{$user ? $user->vatNumber : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Address 1 <span class="text-danger" >*</span></label>
                                    <input type="text" name="companyAddress1" required class="form-control" value="{{$user ? $user->companyAddress1 : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Address 2</label>
                                    <input type="text" name="companyAddress2" class="form-control" value="{{$user ? $user->companyAddress2 : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Town/City <span class="text-danger" >*</span></label>
                                    <input type="text" name="townCity" required class="form-control" value="{{$user ? $user->townCity : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Country <span class="text-danger" >*</span></label>
                                    <input type="text" name="country" required class="form-control" value="{{$user ? $user->country : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Postcode <span class="text-danger" >*</span></label>
                                    <input type="text" name="postcode" required class="form-control" value="{{$user ? $user->postcode : ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Telephone <span class="text-danger" >*</span></label>
                                    <input type="text" name="telephone" required class="form-control" value="{{$user ? $user->telephone : ''}}">
                                </div>
                            </div> 
                        </div>

                        <div class="row py-5">
                            <div class="col-12">
                                <p style="border-bottom: 1px solid #44485e" ></p>
                            </div>
                        </div>
                
                        <div class="row pb-5">
                                    <div class="col-12 ">
                                        <h4 class="card-title ">Personal Information</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input type="text" name="firstName" required class="form-control" value="{{$user ? $user->firstName : ''}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Surname <span class="text-danger">*</span></label>
                                            <input type="text" name="surname" required class="form-control" value="{{$user ? $user->surname : ''}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" required class="form-control" value="{{$user ? $user->title : ''}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Job Title <span class="text-danger">*</span></label>
                                            <input type="text" name="jobTitle" required class="form-control" value="{{$user ? $user->jobTitle : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" required class="form-control" value="{{$user ? $user->phone : ''}}" />
                                            <span>ex: +923361234567</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Personal Email <span class="text-danger">*</span></label>
                                            <input type="email" name="personalEmail" required class="form-control" value="{{$user ? $user->personalEmail : ''}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Password @if(!$user) <span class="text-danger">*</span>@endif</label>
                                            <input type="password" name="password" @if(!$user) required @endif class="form-control" />
                                            @if($user) <p class="pt-2" >Leave It Blank For Default Password</p>  @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Upload ID <span class="text-danger">*</span></label>
                                            <input type="file" name="uploadID" @if(!$user) required @endif class="form-control" />
                                            @if($user && $user->uploadID)
                                                <a class="d-block pt-2" href="{{ asset('/public/uploads/uploadID/'.$user->uploadID) }}" target="_blank">View Current</a>
                                            @endif
                                        </div>
                                    </div>
                                 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Avatar</label>
                                            <input type="file" name="avatar" class="form-control">
                                            @if( $user && $user->avatar)
                                               <a class="d-block pt-2" href="{{ asset('/public/uploads/avatar/'.$user->avatar) }}" target="_blank">
                                                <img src="{{ asset('/public/uploads/avatar/'.$user->avatar) }}" width="80" class="mt-2" />
                                               </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Status <span class="text-danger">*</span></label>
                                            <select name="status" required class="form-control">
                                                <option value="1" {{$user && $user->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{$user && $user->status == 0 ? 'selected' : '' }}>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>

                            <div class="row py-5">
                                 <div class="col-12">
                                  <p style="border-bottom: 1px solid #44485e" ></p>
                                </div>
                            </div>
                           

                            <div class="row">
                                <div class="col-12 ">
                                    <h4 class="card-title">Proof</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Proof of Motor Trade</label>
                                        <input type="file" name="motorTradeProof" class="form-control">
                                        <p class="py-2">Upload must be in .jpg, .png or .pdf format.</p>
                                        @if($user && $user->motorTradeProof)
                                            <a class="d-block pt-2" href="{{ asset('/public/uploads/motorTradeProof/'.$user->motorTradeProof) }}" target="_blank">View Current</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Proof of Address <span class="text-danger">*</span></label>
                                        <input type="file" @if(!$user) required @endif name="addressProof" class="form-control">
                                        <p class="py-2" >Upload must be in .jpg, .png or .pdf format.</p>
                                        @if($user && $user->addressProof)
                                            <a class="d-block pt-2" href="{{ asset('/public/uploads/addressProof/'.$user->addressProof) }}" target="_blank">View Current</a>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer">
                                <div class="text-center pt-5" >
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                </div>
                            </div>
                        </div>    

                    </form>
                </div>
            </div>
        </div>
@endsection
@section('js')
   <script>
      $(document).ready(function() {
         
  
      });
   </script>
@endsection

