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


        #card-element {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f8f9fa;
            margin-bottom: 15px;
        }
</style>
@endsection

@section('content')
<div class="container p-4">
     <form class="register-form" enctype="multipart/form-data" action="{{ url('/register_submit') }}" method="post" >
       @csrf
           
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
                            <div class="mb-5">
                                <h2 class="mb-3 text-white">Company Details
                                    <div class="border-bottom border-primary" style="width: 100px; margin-top: 5px"></div>
                                </h2>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                         <input name="companyName"  type="text" class="sign-input" placeholder="Company / Trading or Business Name"  />
                                         <small class="error error-companyName text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="companyAddress1"  type="text" class="sign-input" placeholder="Company Address 1"  />
                                            <small class="error error-companyAddress1 text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="businessType" class="sign-input" >
                                            <option @if(old('businessType') == '') selected @endif value="" >Business Type</option>
                                            <option @if(old('businessType') == 'dealer') selected @endif value="dealer">Motor Dealer</option>
                                            <option @if(old('businessType') == 'trader') selected @endif value="trader">Motor Trader</option>
                                            <option @if(old('businessType') == 'independent') selected @endif value="independent">Independent Dealer</option>
                                            <option @if(old('businessType') == 'other') selected @endif value="other">Other</option>
                                        </select>
                                            <small class="error error-businessType text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="companyAddress2"  type="text" class="sign-input" placeholder="Company Address 2 (Optional)" />
                                            <small class="error error-companyAddress2 text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="companyReg"  type="text" class="sign-input" placeholder="Company Reg. Number (Optional)" />
                                            <small class="error error-companyReg text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="townCity"  type="text" class="sign-input" placeholder="Town / City"  />
                                            <small class="error error-townCity text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="website"   type="url" class="sign-input" placeholder="Website (Optional)" />
                                            <small class="error error-website text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="country" type="text" class="sign-input" placeholder="Country"  />
                                            <small class="error error-country text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="businessEmail" type="email" class="sign-input" placeholder="Business Email (Optional)" />
                                            <small class="error error-businessEmail text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="postcode"  type="text" class="sign-input" placeholder="Postcode / Zip code"  />
                                            <small class="error error-postcode text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="motorTradeInsurance" class="sign-input">
                                            <option @if(old('motorTradeInsurance') == '') selected @endif value="" >Motor Trade Insurance? (Optional)</option>
                                            <option @if(old('motorTradeInsurance') == 'yes') selected @endif value="yes">Yes</option>
                                            <option @if(old('motorTradeInsurance') == 'no') selected @endif value="no">No</option>
                                            <option @if(old('motorTradeInsurance') == 'pending') selected @endif value="pending">Pending</option>
                                        </select>
                                            <small class="error error-postcode text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="telephone" type="tel" class="sign-input" placeholder="Telephone"  />
                                            <small class="error error-telephone text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="vatNumber" type="text" class="sign-input" placeholder="VAT Number (if applicable)" />
                                            <small class="error error-vatNumber text-danger"></small>
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
                                        <input name="firstName" class="sign-input" placeholder="First Name"  />
                                            <small class="error error-firstName text-danger"></small>
                                    </div>
                                    <div class="col-md-4">
                                        <input name="surname" class="sign-input" placeholder="Surname"  />
                                            <small class="error error-surname text-danger"></small>
                                    </div>
                                    <div class="col-md-4">
                                        <input name="title" class="sign-input" placeholder="Title" />
                                            <small class="error error-title text-danger"></small>
                                    </div>
                                    <div class="col-md-4">
                                        <input name="jobTitle" class="sign-input" placeholder="Job Title"  />
                                            <small class="error error-jobTitle text-danger"></small>
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

                                            <input name="phone" type="tel" class="sign-input" style="border: none !important ; border-left: 1px solid var(--text-color) !important; border-radius: 0;" placeholder="Phone Number"  />
                                        </div>
                                            <small class="error error-phone text-danger"></small>
                                    </div>

                                    <div class="col-md-4">
                                         <input type="email" name="personalEmail" class="sign-input" placeholder="Personal Email" />
                                         <small class="error error-personalEmail text-danger"></small>
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
                                    <small class="error error-uploadID text-danger"></small> </br>
                                <small class="text-muted ">Upload must be in .jpg, .png or .pdf format.</small>
                            </div>

                            <div class="mb-5">
                                <h2 class="mb-4 text-white">Proof
                                    <div class="border-bottom border-primary" style="width: 100px; height: 3px; margin-top: 5px"></div>
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
                                            <small class="error error-motorTradeProof text-danger"></small> </br>
                                        <small class="text-muted">Upload must be in .jpg, .png or .pdf format.</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-white">
                                            Proof of address <span class="text-danger">*</span>
                                        </label>
                                        <div class="d-flex align-items-center py-4" >
                                            <label class="sign-input"> Select file (Max. 4MB)
                                                <input name="addressProof" type="file" class="fileName" accept=".jpg,.jpeg,.png,.pdf" hidden  />
                                            </label>
                                            <div id="fileName" class="text-light w-75 ms-3 ">No file chosen.</div>
                                        </div>
                                        <small class="error error-addressProof text-danger"></small></br>
                                        <small class="text-muted">Upload must be in .jpg, .png or .pdf format.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <h2 class="mb-4 text-white">Plan Details
                                    <div class="border-bottom border-primary" style="width: 100px; height: 3px; margin-top: 5px"></div>
                                </h2>

                            </div>

                            <!-- Stripe Card Element -->
                            <div> 
                                <div id="card-element"></div>
                                <div id="card-errors" style="color: red;"></div>
                            </div>

                            <div class="mb-4">
                                <p class="text-muted">
                                    By submitting this form, you are accepting the
                                    <a href="#" class="text-white text-decoration-none">terms and conditions</a> and
                                    <a href="#" class="text-white text-decoration-none">privacy policy</a> which
                                    apply when buying with AutoBoli LTD.
                                </p>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="mx-5 py-2 text-white" style=" background: linear-gradient(135deg, #007AFF 0%, #0051D5 100%); border-radius: 8px; outline: none; ">Submit Application</button>
                            </div>
                  
                    </div>
                </div>
            </div>
        
        </form>
    </div>

@endsection
@section('js')

   <script src="https://js.stripe.com/v3/"></script>
   <script>


    $(document).ready(function () {

        let stripe = Stripe("{{ env('STRIPE_PUBLISHABLE_KEY') }}");
        let elements = stripe.elements();
        let card = elements.create('card');
        card.mount('#card-element');


        async function checkpayment(){
             $('#card-errors').text('');
               let response = await stripe.createPaymentMethod({
                    type: 'card',
                    card: card,
                });

               if(response.error){

                   $('#card-errors').text(response.error.message); 
                   return false;
               }else{
                return true;
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'payment_method',
                        value: response.paymentMethod.id
                    }).appendTo('.register-form');
               }

        }

            
    
        $('.register-form').on('submit', async function (e) {

                e.preventDefault();

                $(`.error`).text('');
                $('button[type=submit]').prop('disabled', true);

                // let res = await checkpayment();

                // if(!res){
                //     alert('Please Enter Card Details');
                //     return false;
                // }

    

                let form = $(this)[0];
                let formData = new FormData(form);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        
                        console.log(response);
                        alert("Form submitted successfully!");
                        $('button[type=submit]').prop('disabled', false);

                    },
                    error: function (xhr) {

                        if(xhr?.responseJSON?.errors){

                            $.each(xhr.responseJSON.errors, function (key, messages) {
                                $(`.error-${key}`).text(messages);
                                
                            });
                        }else{

                            alert("Something went wrong.");
                        }   


                        $('button[type=submit]').prop('disabled', false);
                        
                        
                    }
                });



            });

        });

           
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
