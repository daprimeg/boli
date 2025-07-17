@extends('web.partial.layout')

@section('css')

<style>
     body {
            background: linear-gradient(to right,
                    var(--background-color) 40%,
                    var(--background-color) 30%,
                    rgba(0, 0, 0, 0) 110%),
                 url("{{asset('/public/theme/assets/CarGroup.png')}}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .sign-input {
            display: flex;
            justify-content: center;
            margin: auto;
            width: 95%;
            color: var(--white-text) !important;
            background-color: var(--items-background) !important;
            outline: none !important;
            border: 1px solid var(--items-border-colur) !important;
            border-radius: 8px;
            padding: 14px 8px;
        }

        custom-select-wrapper {
            position: relative;
            width: 80px;
        }

        .custom-select-selected {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 6px 8px;
            border-radius: 0.25rem;

        }

        .custom-select-selected img {
            width: 20px;
            height: 15px;
            margin-right: 5px;
        }

        .custom-select-options {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            border: 1px solid #ced4da;
            z-index: 1000;
            display: none;
        }

        .custom-select-option {
            display: flex;
            align-items: center;
            padding: 6px 8px;
            cursor: pointer;
        }

        .custom-select-option:hover {
            background-color: var(--items-background);
        }

        .custom-select-option img {
            width: 20px;
            height: 15px;
            margin-right: 5px;
        }
</style>
@endsection

@section('content')
<div class="container p-4">
           
            <div class=" mb-4 text-white p-3" style="background-color: rgba(255, 0, 0, 0.301); border-radius: 12px; border:1px solid red ;">
                <p class="mb-2">
                    <strong>AUTOBOLI LTD</strong> is exclusively designed for use by
                    independent dealers, motor dealers, traders, and individuals engaged
                    in the motor business. By using our platform, you confirm that you
                    meet this criterion.
                </p>
                <p class="mb-0 text-white">
                    <em>We reserve the right to terminate or suspend accounts if we
                        determine that a user does not meet these eligibility
                        requirements.</em>
                    <a href="#" class="text-primary">Read more</a>
                </p>
            </div>
            <div class="row justify-content-start">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="bg-black bg-opacity-50 p-4 p-md-5 rounded-4 shadow">
                        <form enctype="multipart/form-data" action="{{ url('/register_submit') }}" method="post" >
                            @csrf
                            
                            <div class="mb-5">
                                <h2 class="mb-3 text-white">
                                    Company Details
                                    <div class="border-bottom border-primary" style="width: 100px; margin-top: 5px"></div>
                                </h2>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input name="companyName" value="{{old('companyName')}}" type="text" class="sign-input" placeholder="Company / Trading or Business Name"  />
                                         @error('companyName')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="companyAddress1" value="{{old('companyAddress1')}}" type="text" class="sign-input" placeholder="Company Address 1"  />
                                        @error('companyAddress1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <select name="businessType" class="sign-input" >
                                            <option @if(old('businessType') == '') selected @endif value="" >Business Type</option>
                                            <option @if(old('businessType') == 'dealer') selected @endif value="dealer">Motor Dealer</option>
                                            <option @if(old('businessType') == 'trader') selected @endif value="trader">Motor Trader</option>
                                            <option @if(old('businessType') == 'independent') selected @endif value="independent">Independent Dealer</option>
                                            <option @if(old('businessType') == 'other') selected @endif value="other">Other</option>
                                        </select>
                                        @error('businessType')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="companyAddress2" value="{{old('companyAddress2')}}" type="text" class="sign-input" placeholder="Company Address 2 (Optional)" />
                                        @error('companyAddress2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="companyReg" value="{{old('companyReg')}}" type="text" class="sign-input" placeholder="Company Reg. Number (Optional)" />
                                        @error('companyReg')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="townCity" value="{{old('townCity')}}" type="text" class="sign-input" placeholder="Town / City"  />
                                        @error('townCity')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="website" value="{{old('website')}}"  type="url" class="sign-input" placeholder="Website (Optional)" />
                                        @error('website')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="country" value="{{old('country')}}" type="text" class="sign-input" placeholder="Country"  />
                                        @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="businessEmail" value="{{old('businessEmail')}}" type="email" class="sign-input" placeholder="Business Email (Optional)" />
                                        @error('businessEmail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="postcode" value="{{old('postcode')}}" type="text" class="sign-input" placeholder="Postcode / Zip code"  />
                                        @error('postcode')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <select name="motorTradeInsurance" class="sign-input">
                                            <option @if(old('motorTradeInsurance') == '') selected @endif value="" >Motor Trade Insurance? (Optional)</option>
                                            <option @if(old('motorTradeInsurance') == 'yes') selected @endif value="yes">Yes</option>
                                            <option @if(old('motorTradeInsurance') == 'no') selected @endif value="no">No</option>
                                            <option @if(old('motorTradeInsurance') == 'pending') selected @endif value="pending">Pending</option>
                                        </select>
                                        @error('motorTradeInsurance')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="telephone" value="{{old('telephone')}}" type="tel" class="sign-input" placeholder="Telephone"  />
                                         @error('telephone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input name="vatNumber" value="{{old('vatNumber')}}" type="text" class="sign-input" placeholder="VAT Number (if applicable)" />
                                        @error('vatNumber')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="mb-5">
                                <h2 class="mb-3 text-white">
                                    Personal Information
                                    <div class="border-bottom border-primary"
                                        style="width: 100px; height: 3px; margin-top: 5px"></div>
                                </h2>

                                <p class="text-muted mb-4">
                                    Provide the name and contact details of proprietors, partners,
                                    directors, and authorized buyer for AUTOBOLI LTD, along with
                                    proof of identity (driving license or passport in .jpg, .png,
                                    or .pdf format).
                                </p>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <input name="firstName" value="{{old('firstName')}}" type="text" class="sign-input" placeholder="First Name"  />
                                        @error('firstName')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input name="surname" type="text" value="{{old('surname')}}" class="sign-input" placeholder="Surname"  />
                                        @error('surname')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input name="title" type="text" value="{{old('title')}}" class="sign-input" placeholder="Title" />
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input name="jobTitle"  type="text" value="{{old('jobTitle')}}" class="sign-input" placeholder="Job Title"  />
                                        @error('jobTitle')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" position-relative sign-input d-flex align-items-center p-0">

                                            <div class="custom-select-wrapper " id="customSelect">

                                                <div class="custom-select-selected" id="selectedOption">
                                                    <img src="https://flagcdn.com/w40/gb.png" alt="GB">
                                                    <span>+44</span>
                                                </div>

                                                <div class="custom-select-options" id="optionList">
                                                    <div class="custom-select-option" data-code="+44" data-flag="gb">
                                                        <img src="https://flagcdn.com/w40/gb.png" alt="GB">
                                                        <span>+44 (GB)</span>
                                                    </div>
                                                    <div class="custom-select-option" data-code="+1" data-flag="us">
                                                        <img src="https://flagcdn.com/w40/us.png" alt="US">
                                                        <span>+1 (US)</span>
                                                    </div>
                                                    <div class="custom-select-option" data-code="+92" data-flag="pk">
                                                        <img src="https://flagcdn.com/w40/pk.png" alt="PK">
                                                        <span>+92 (PK)</span>
                                                    </div>
                                                    <div class="custom-select-option" data-code="+61" data-flag="au">
                                                        <img src="https://flagcdn.com/w40/au.png" alt="AU">
                                                        <span>+61 (AU)</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Phone Input -->
                                            <input name="phone" value="{{old('phone')}}" type="tel" class="sign-input"
                                                style="border: none !important ; border-left: 1px solid var(--text-color) !important; border-radius: 0;"
                                                placeholder="Phone Number"  />
                                        </div>

                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <input type="email" value="{{old('personalEmail')}}" name="personalEmail" class="sign-input" placeholder="Personal Email "  />
                                        @error('personalEmail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- File Upload Section -->
                            <div class="mb-4" style="width:400px;">
                                <label class="form-label fw-bold text-white">
                                    Upload ID <span class="text-danger">*</span>
                                </label>

                                <div class="d-flex align-items-center" >
                                    <label class="sign-input">
                                        Select file (Max. 4MB)
                                        <input name="uploadID" type="file" class="fileName" accept=".jpg,.jpeg,.png,.pdf" hidden  />
                                    </label>
                                    <div id="fileName" class="text-light w-75 ms-3 ">No file chosen.</div>
                                </div>
                                @error('uploadID')
                                    <small class="text-danger">{{ $message }}</small> </br>
                                @enderror

                                <small class="text-muted ">Upload must be in .jpg, .png or .pdf format.</small>

                              
                            </div>
                    

                    <!-- Proof Section -->
                    <div class="mb-5">
                        <h2 class="mb-4 text-white">
                            Proof
                            <div class="border-bottom border-primary" style="width: 100px; height: 3px; margin-top: 5px">
                            </div>
                        </h2>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label text-white">Proof of motor trade (Optional)</label>
                                <div class="d-flex align-items-center py-4" >
                                    <label class="sign-input">
                                        Select file (Max. 4MB)
                                        <input name="motorTradeProof" type="file" class="fileName" accept=".jpg,.jpeg,.png,.pdf" hidden  />
                                    </label>
                                    <div id="fileName" class="text-light w-75 ms-3 ">No file chosen.</div>
                                </div>
                                @error('motorTradeProof')
                                    <small class="text-danger">{{ $message }}</small> </br>
                                @enderror
                                <small class="text-muted">Upload must be in .jpg, .png or .pdf format.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white">
                                    Proof of address <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex align-items-center py-4" >
                                    <label class="sign-input">
                                        Select file (Max. 4MB)
                                        <input name="addressProof" type="file" class="fileName" accept=".jpg,.jpeg,.png,.pdf" hidden  />
                                    </label>
                                    <div id="fileName" class="text-light w-75 ms-3 ">No file chosen.</div>
                                </div>
                                @error('addressProof')
                                    <small class="text-danger">{{ $message }}</small> </br>
                                @enderror
                                <small class="text-muted">Upload must be in .jpg, .png or .pdf format.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Submit -->
                    <div class="mb-4">
                        <p class="text-muted">
                            By submitting this form, you are accepting the
                            <a href="#" class="text-white text-decoration-none">terms and conditions</a> and
                            <a href="#" class="text-white text-decoration-none">privacy policy</a> which
                            apply when buying with AutoBoli LTD.
                        </p>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="mx-5 py-2 text-white"
                            style=" background: linear-gradient(135deg, #007AFF 0%, #0051D5 100%); border-radius: 8px; outline: none; ">

                            Submit Application
                        </button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@section('js')

   <script>
            const selected = document.getElementById("selectedOption");
            const options = document.getElementById("optionList");

            selected.addEventListener("click", () => {
                options.style.display = options.style.display === "block" ? "none" : "block";
            });

            const optionItems = options.querySelectorAll(".custom-select-option");

            optionItems.forEach((item) => {
                item.addEventListener("click", () => {
                    const flag = item.getAttribute("data-flag");
                    const code = item.getAttribute("data-code");
                    selected.innerHTML = `<img src="https://flagcdn.com/w40/${flag}.png" alt="${flag}"> <span>${code}</span>`;
                    options.style.display = "none";
                });
            });

            document.addEventListener("click", (e) => {
                if (!document.getElementById("customSelect").contains(e.target)) {
                    options.style.display = "none";
                }
            });

            document.querySelectorAll('.fileName').forEach(function (input) {
                input.addEventListener('change', function () {
                    const fileName = this.closest('.d-flex').querySelector('.fileName');
                    fileName.textContent = this.files.length > 0 ? this.files[0].name : 'No file chosen.';
                });
            });

    </script>
@endsection
