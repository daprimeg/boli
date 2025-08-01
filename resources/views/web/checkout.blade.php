@extends('web.partial.layout')

@section('css')

<style>

         /* Custom CSS for dark theme and specific colors */
          body{
            color: white
          }
            .card {
                background-color: #000f21; /* Darker card background */
                border: none;
                color: #ffffff;
                border-radius: 0.5rem; /* Slightly rounded corners */
            }
            .nav-tabs {
                border-bottom: 1px solid #0f1c2c;
            }
            .nav-tabs .nav-link {
                color: #e0e0e0;
                border: none;
                border-bottom: 2px solid transparent;
                padding-bottom: 0.75rem;
                margin-bottom: -1px; /* Overlap border */
                transition: all 0.3s ease;
            }
            .nav-tabs .nav-link:hover {
                color: #007bff;
            }
            .nav-tabs .nav-link.active {
                color: #007bff; /* Blue active tab color */
                background-color: transparent;
                border-color: #007bff; /* Blue active tab underline */
                font-weight: 600;
            }
            
            
           
            .total-price {
                font-size: 1.25rem;
                font-weight: bold;
                color: #007bff;
            }
           
            /* Accordion specific styles */
            .accordion-item {
                background-color: #000f21 !important;
                margin-bottom: 1rem; 
                border-radius: 0.5rem;
                /* border: none; */
                border: 1px solid var(--items-border-colur)
            }
            .accordion-header {
                background-color: #0f1c2c;
                border: 1px solid var(--items-border-colur);
                border-radius: 4px;
                border-bottom: none
            } 
           
            

         .sign-input {
            display: flex;
            justify-content: center;
            margin: auto;
            width: 100%;
            color: var(--white-text) !important;
            background-color: var(--items-background) !important;
            outline: none !important;
            border: 1px solid var(--items-border-colur) !important;
            border-radius: 8px;
            padding: 14px 8px;
        }
       
      
       
        .card-content {
            padding: 1.5rem; /* p-6 */
        }

        .tabs-list {
            display: flex;
            justify-content: center;    
            width: 90%;
            /* background-color: #334155;  */
            color: #94a3b8;
            border-radius: 0.375rem; 
            overflow: hidden;
        }

        .tabs-trigger {
            padding: 0.75rem 1rem; 
            font-size: 0.875rem; 
            font-weight: 500; /* font-medium */
            text-align: center;
            cursor: pointer;
            background-color: transparent;
            border: none;
            color: inherit;
            transition: background-color 0.2s, color 0.2s;
            position: relative;
            outline: none;
        }

       

        .tabs-trigger.active {
            color: #fff;
            box-shadow: none;
        }

        .tabs-trigger.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 2rem); /* w-[calc(100%-2rem)] */
            height: 2px;
            background-color: #3b82f6; /* blue-500 */
        }

        .tabs-trigger[disabled] {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none; /* Prevents all mouse events */
        }

        /* Accordion Styling */
       

        .accordion-trigger {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 1rem 0; /* py-4 */
            font-size: 1.125rem; /* text-lg */
            font-weight: 600; /* font-semibold */
            color: #fff;
            background-color: transparent;
            border: none;
            cursor: pointer;
            text-align: left;
            outline: none;
        }       

        .accordion-trigger[disabled] {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none; 
        }

        .accordion-content {
        
            padding: 20px;
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
        }

        .accordion-content.open {
            display: block;
        }

        .codration-costome-btn{
            border: none;
            background-color: transparent;
            color: white;
            font-size: 16px;
        }
         
        .button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
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

 
       .plan-option {
          cursor: pointer;
          transition: .5;
          border: 1px solid var( --items-border-colur)
       }

        .actives {
          background-color: #007bff;
          color: white;
          border: 1px solid var(--text-color);
        }


     
        #card-element {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f8f9fa;
            margin-bottom: 15px;
        }

        .selectedPlan{
            background: linear-gradient(170deg, #0080ff, #08437e);
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: .7rem;
        }

</style>
@endsection

@section('content')

<section style="background-color: #0f1c2c;">
    <div class="py-5 container">
        <form class="register-form" enctype="multipart/form-data" action="{{ url('/checkout') }}" method="post">
            @csrf
        
        
            <div class="text-center mb-5 mt-5">
                <h1 class="text-white mb-3">Complete your order</h1>
                <p class="text-muted-custom mx-auto" style="max-width: 600px;">AUTOBOLI LTD is exclusively designed for use by independent dealers, motor dealers, traders, and individuals engaged in the motor business. By using our platform, you confirm that you meet this criterion.</p>
            </div>
    
            <div class="row">
                <div class="col-12 col-lg-8 mb-4">
                    <div class="card-content">
                    <div class="accordion" role="group">

                    <!-- User Information Accordion Item -->
                    <div class="accordion-item" id="item-2">
                        <h2 class="accordion-header d-flex px-3" role="heading" aria-level="2">
                            <button type="button" class="accordion-trigger" aria-expanded="true" data-target-tab="userinfo">
                             Billing Info
                            </button>
                        </h2>
                        <div id="content-userinfo" class="accordion-content" role="region" aria-hidden="false">
                            <div class="mb-5 ">
                               <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <span class="mb-2 text-white form-label fw-bold " style="font-size: 16px">User Details
                                                <div class="border-bottom border-primary" style="width: 100px; height: 3px; margin-bottom:5px"></div>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label" >First Name</label>
                                        <input name="first_name" class="sign-input" value="Owais" placeholder="First Name"  />
                                        <small class="error error-first_name text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label" >Last Name</label>
                                        <input name="last_name" class="sign-input" value="Azam" placeholder="Last Name"  />
                                        <small class="error error-last_name text-danger"></small>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label" >Phone No</label>
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
                                            <input name="phone" type="tel" value="03112239342" class="sign-input" style="border: none !important ; border-left: 1px solid var(--text-color) !important; border-radius: 0;" placeholder="Phone Number"  />
                                          </div>
                                            <small class="error error-phone text-danger"></small>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="" class="form-label">Country</label>
                                        <input name="country" class="sign-input" value="Pakistan" placeholder="Country" />
                                        <small class="error error-country text-danger"></small>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="State" class="form-label">Province / State</label>
                                        <input name="state" class="sign-input" value="Sindh" placeholder="State" />
                                        <small class="error error-state text-danger"></small>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="City"class="form-label">City</label>
                                        <input name="city" value="karachi" class="sign-input" placeholder="City"  />
                                        <small class="error error-city text-danger"></small>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="zip_code" class="form-label">Zip Code</label>
                                        <input name="zip_code" value="123" class="sign-input" placeholder="Zip Code"  />
                                        <small class="error error-zip_code text-danger"></small>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input name="address" class="sign-input" value="Address" placeholder="Address"  />
                                        <small class="error error-address text-danger"></small>
                                    </div>
                                    <div class="col-md-12 payment_div">
                                        <div class="mb-2">
                                            <span class="mb-2 text-white form-label fw-bold " style="font-size: 16px">Payment Info
                                                <div class="border-bottom border-primary" style="width: 100px; height: 3px; margin-bottom:5px"></div>
                                            </span>
                                        </div>
                                        <div class="mb-5">
                                            <div class="pt-3 payment-card " >
                                                <div class="form-group">
                                                        <label class="form-label text-white">Card Info</label> 
                                                        <div id="card-element" ></div>
                                                        <div id="card-errors" style="color: red;"></div>
                                                </div>
                                            </div>
                                            <small class="error error-payment_method text-danger"></small>
                                        </div>                                            
                                    </div>
                                    {{-- row --}}

                                    <input type="hidden" name="plan_id" value="" />

                                 </div>
                              </div>
                                <div class="mt-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>

    
                        </div>
                    </div>
                </div>

                <?php 
                  $id = 3;
                ?>

                <!-- Order Summary Card -->
                <div class="col-12 col-lg-4" style="background-color: #000f21 !important; padding: 25px 30px; border-radius: 18px;">
                    <div class="" style="background-color: #000f21">
                        <div class="">
                            <h5 class=" mb-0 mt-3">Order Summary</h5>
                        </div>
                        <div class="">
                            <h6 class="mb-3 text-white" style="background-color: #000f21 !important">Your Plan</h6>
                            <div class="list-group mb-4" >
                                    @foreach ($plans as $item)
                                        <label data-plan="{{$item->id}}" data-price="{{$item->price}}" class="plan-option active d-flex justify-content-between align-items-center" 
                                        style="background-color: #0f1c2c;  border-radius : 0.5rem; padding: 1rem; margin-top: .7rem;">
                                            <div class="d-flex align-items-center">
                                                <i class="fa-brands fa-kickstarter" style="margin-right: 10px;"></i>
                                                <div>
                                                    {{$item->plan_name}}
                                                    <div class="text-muted-custom small m-0 p-0">{{$item->short_desc}}</div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                £{{$item->price}}
                                                <div class="text-muted-custom small">Per Month</div>
                                            </div>
                                        </label>
                                    @endforeach

                                    
                                </div>
                                  <small class="error error-plan_id text-danger"></small>
                                <div style="border-top: 2px dashed grey; margin-bottom: 25px;"></div>
                                <h6 class="mb-3 text-white" >Billing</h6>
                                <ul class="list-group list-group-flush">
                                    <li class=" d-flex justify-content-between align-items-center pb-1">
                                        Base price
                                        <span class="base-price" >£0.00</span>
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center pb-1">
                                        Discount
                                        <span>£0.00</span>
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center pb-1">
                                        GST
                                        <span>£0.00</span>
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center pt-3 border-top border-secondary">
                                        <span class="total-price">Total</span>
                                        <span class="base-price total-price">£0.00</span>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
                {{-- Order --}}
            </div>

           </form>  
        </div>
    </section>
@endsection
@section('js')

   <script src="https://js.stripe.com/v3/"></script>
   <script>
        // // active class
        document.querySelectorAll('.plan-option').forEach(option => {
            option.addEventListener('click', () => {
            // Remove 'active' class from all
            document.querySelectorAll('.plan-option').forEach(o => o.classList.remove('actives'));
            
            // Add 'active' to clicked one
            option.classList.add('actives');
            });
        });

   </script>

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
                $('input[name=payment_method]').val('');
                $('#card-errors').text(response.error.message); 
                return false;
            }else{
                $('input[name=payment_method]').val(response.paymentMethod.id);
                return true;   
            }
        }

        function planCalculation(id){

                let element = $(`.plan-option[data-plan='${id}']`);
                let price = element.data('price');
                $(".plan-option").removeClass("selectedPlan");
                element.addClass("selectedPlan");
                $(".base-price").text('£'+price);
                $("input[name=plan_id]").val(id);
                $("input[name=plan_id]").trigger('change');

        }

     
        $('.plan-option').click(function (e){
        
                let id = $(this).data('plan');
                planCalculation(id);
        })

       
        $('.register-form').on('submit', async function (e) {

                e.preventDefault();

                $(`.error`).text('');
                $('button[type=submit]').prop('disabled', true);

                // if($('select[name=plan_id]').val() != 2){
                    // let res = await checkpayment();
                    // if(!res){
                    //     alert('Please Enter Card Details');
                    //     $('button[type=submit]').prop('disabled', false);
                    //     return false;
                        
                    // }
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

                        alert("Form submitted successfully!");
                        window.location.href = "{{url('/account-setting/billing')}}";
                        $('button[type=submit]').prop('disabled', false);

                    },
                    error: function (xhr) {

                        if(xhr?.responseJSON?.errors){
                            $.each(xhr.responseJSON.errors, function (key, messages) {
                                $(`.error-${key}`).text(messages);                    
                            });
                            // let firstKey = Object.keys(xhr.responseJSON.errors)[0];
                            // $(".messages").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            //     ${xhr.responseJSON.errors[firstKey][0]}
                            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            // </div>`);
                        }else{

                             alert(xhr?.responseJSON?.message);

                            // $(".messages").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            //     ${xhr?.responseJSON?.message}
                            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            // </div>`);
                        }

                        $('button[type=submit]').prop('disabled', false);
                    }
                });

            });

        });


        let planId = $("input[name=plan_id]").val();
        if(planId){
            planCalculation(planId);
        }

        $("input[name=plan_id]").change(function (e) { 

            if($(this).val() == 2){
                $(".payment_div").hide();
            }else{
                $(".payment_div").show();
            }
            
        }).trigger('change');

           
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
