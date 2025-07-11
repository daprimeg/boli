<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoBoli Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <style type="text/css">
        body{
            background:#eee;
        }
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }
        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }
        /* Custom styling for Stripe Element containers */
        .stripe-element {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.75rem 0.75rem; /* Adjusted padding for better appearance */
            height: calc(1.5em + 0.75rem + 2px); /* Match Bootstrap input height */
            background-color: white;
        }

        /* Style for error messages */
        .error {
            color: #dc3545; /* Bootstrap danger color */
            margin-top: 0.5rem;
            font-size: 0.875em;
        }

        /* Ensure labels have some bottom margin */
        .form-label {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>


@if(session('success'))
    <script>
        window.onload = function () {
            alert(@json(session('success')));
            console.log("Success:", @json(session('success')));
        };
    </script>
@endif

@if(session('error'))
    <script>
        window.onload = function () {
            alert(@json(session('error')));
            console.error("Error:", @json(session('error')));
        };
    </script>
@endif

@if ($errors->any())
    <script>
        window.onload = function () {
            let messages = @json($errors->all());
            alert(messages.join("\n"));
            console.error("Validation Errors:", messages);
        };
    </script>
@endif



    <div style="display: none">
        <strong>Price: £<span id="plan_price_display">
            @if(isset($selectedPlan))
                {{ number_format($selectedPlan->price, 2) }}
            @else
                0.00
            @endif
        </span></strong>
    </div>

    <div class="container">
        <h1 class="h3 mb-5">Choose Your Payment Method</h1>
        <div class="row">
            <div class="col-lg-9">
                <div class="accordion" id="accordionPayment">
                    <div class="accordion-item mb-3 border">
                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                            <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePP" aria-expanded="false">
                                <input class="form-check-input" type="radio" name="payment_method_radio" id="payment_method_paypal" value="paypal">
                                <label class="form-check-label pt-1" for="payment_method_paypal">
                                PayPal
                                </label>
                            </div>
                            <span>
                                <svg width="103" height="25" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M8.962 5.857h7.018c3.768 0 5.187 1.907 4.967 4.71-.362 4.627-3.159 7.187-6.87 7.187h-1.872c-.51 0-.852.337-.99 1.25l-.795 5.308c-.052.344-.233.543-.505.57h-4.41c-.414 0-.561-.317-.452-1.003L7.74 6.862c.105-.68.478-1.005 1.221-1.005Z" fill="#009EE3"></path>
                                        <path d="M39.431 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.81c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.416 0-.561-.267-.469-.863l2.158-13.846c.106-.68.362-.934.827-.934h6.263Zm-4.257 7.413h2.129c1.331-.051 2.215-.973 2.304-2.636.054-1.027-.64-1.763-1.743-1.757l-2.003.009-.687 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.043.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.432-8.982c.072-.451-.039-.672-.38-.672H53.05c-.23 0-.343.128-.402.48l-.095.552c-.049.288-.18.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.581.074-5.996 2.793-6.255 6.279-.2 2.696 1.732 4.813 4.279 4.813 1.848 0 2.674-.543 3.605-1.395l-.007-.005Zm-1.946-1.382c-1.542 0-2.616-1.23-2.393-2.738.223-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.394 2.737-.223 1.508-1.664 2.738-3.207 2.738Zm11.685-7.971h-2.355c-.486 0-.683.362-.53.808l2.925 8.561-2.868 4.075c-.241.34-.054.65.284.65h2.647a.81.81 0 0 0 .786-.386l8.993-12.898c.277-.397.147-.814-.308-.814H67.6c-.43 0-.602.17-.848.527l-3.75 5.435-1.676-5.447c-.098-.33-.342-.511-.793-.511h-.002Z" fill="#113984"></path>
                                        <path d="M79.768 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.808c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.417 0-.562-.267-.47-.863l2.162-13.85c.107-.68.362-.934.828-.934h6.257v.004Zm-4.257 7.413h2.128c1.332-.051 2.216-.973 2.305-2.636.054-1.027-.64-1.763-1.743-1.757l-2.004.009-.686 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.044.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.431-8.982c.073-.451-.038-.672-.38-.672h-2.55c-.23 0-.343.128-.403.48l-.094.552c-.049.288-.181.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.582.074-5.997 2.793-6.256 6.279-.199 2.696 1.732 4.813 4.28 4.813 1.847 0 2.673-.543 3.604-1.395l-.01-.005Zm-1.944-1.382c-1.542 0-2.616-1.23-2.393-2.738.222-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.393 2.737-.223 1.508-1.665 2.738-3.206 2.738Zm10.712 2.489h-2.681a.317.317 0 0 1-.328-.362l2.355-14.92a.462.462 0 0 1 .445-.363h2.682a.317.317 0 0 1 .327.362l-2.355 14.92a.462.462 0 0 1-.445.367v-.004Z" fill="#009EE3"></path>
                                        <path d="M4.572 0h7.026c1.978 0 4.326.063 5.895 1.45 1.049.925 1.6 2.398 1.473 3.985-.432 5.364-3.64 8.37-7.944 8.37H7.558c-.59 0-.98.39-1.147 1.449l-.967 6.159c-.064.399-.236.634-.544.663H.565c-.48 0-.65-.362-.525-1.163L3.156 1.17C3.28.377 3.717 0 4.572 0Z" fill="#113984"></path>
                                        <path d="m6.513 14.629 1.226-7.767c.107-.68.48-1.007 1.223-1.007h7.018c1.161 0 2.102.181 2.837.516-.705 4.776-3.793 7.428-7.837 7.428H7.522c-.464.002-.805.234-1.01.83Z" fill="#172C70"></path>
                                    </g>
                                </svg>
                            </span>
                        </h2>
                        <div id="collapsePP" class="accordion-collapse collapse" data-bs-parent="#accordionPayment">
                            <div class="accordion-body">
                                <div class="px-2 col-lg-6 mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" placeholder="Enter your PayPal email">
                                    <button type="button" class="btn btn-primary mt-3" id="paypal-checkout-button">Checkout with PayPal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                            <div class="form-check w-100" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="true">
                                <input class="form-check-input" type="radio" name="payment_method_radio" id="payment_method_stripe" value="stripe" checked>
                                <label class="form-check-label pt-1" for="payment_method_stripe">
                                Credit Card
                                </label>
                            </div>
                            <span>
                                <img src="http://localhost/autoboli/public/storage/stripe.png" style="width: 150px;" alt="Stripe Logo">
                            </span>
                        </h2>
                        <p class="px-4 py-3 accordion-header d-flex justify-content-between align-items-center" style="font-size: 0.9em; color: #6c757d;">
                            Safe Money Transfer using your bank Account<br>
                            Visa, Master, Discover, American Express, JCB, UnionPay
                        </p>
                        <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment">
                            <div class="accordion-body">
                                <form action="{{ route('user.checkout.store') }}" method="POST" id="payment-form">
                                    @csrf
                                    <input type="hidden" name="plan_id" id="form_plan_id" value="{{ $selectedPlan ? $selectedPlan->id : '' }}">
                                    <input type="hidden" name="payment_method" id="form_payment_method" value="stripe">

                                    <div class="mb-3">
                                        <label for="card-number-element" class="form-label">
                                        Card Number
                                        </label>
                                        <div id="card-number-element" class="stripe-element">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="card-expiry-element" class="form-label">
                                        Expiration Date (MM/YY)
                                        </label>
                                        <div id="card-expiry-element" class="stripe-element">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="card-cvc-element" class="form-label">
                                        CVC
                                        </label>
                                        <div id="card-cvc-element" class="stripe-element">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="postal-code-element" class="form-label">
                                        Postal Code
                                        </label>
                                        <div id="postal-code-element" class="stripe-element">
                                        </div>
                                    </div>
                                    <div id="card-errors" class="error" role="alert"></div>
                                    <button type="submit" class="btn btn-success w-100 mt-3">Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card position-sticky top-0">
                    <div class="p-3 bg-light bg-opacity-10">
                        <h6 class="card-title mb-3">Summary</h6>
                        @if(isset($selectedPlan) && $selectedPlan)
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Plan Name</span> <span id="summary_plan_name">{{ $selectedPlan->plan_name }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Duration</span> <span id="summary_duration">{{ $selectedPlan->duration_value }}{{ $selectedPlan->duration_unit }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Subtotal</span> £<span id="summary_subtotal">{{ number_format($selectedPlan->price, 2) }}</span>
                        </div>
                        @else
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Plan Name</span> <span id="summary_plan_name">N/A</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Duration</span> <span id="summary_duration">N/A</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Subtotal</span> £<span id="summary_subtotal">0.00</span>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Discount</span> <span>£0.00</span> </div>
                        <div class="d-flex justify-content-between mb-1 small">
                            <span>Coupon Discount</span> <span class="text-danger" id="summary_coupon_discount">£0.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4 small">
                            <span>TOTAL</span> <strong class="text-dark">£<span id="summary_total">
                                @if(isset($selectedPlan))
                                    {{ number_format($selectedPlan->price, 2) }}
                                @else
                                    0.00
                                @endif
                            </span></strong>
                        </div>
                        <div class="form-check mb-1 small">
                            <input class="form-check-input" type="checkbox" value="" id="tnc" required> <label class="form-check-label" for="tnc">
                            I agree to the <a href="#">terms and conditions</a>
                            </label>
                        </div>
                        <div class="form-check mb-3 small">
                            <input class="form-check-input" type="checkbox" value="" id="subscribe">
                            <label class="form-check-label" for="subscribe">
                            Get emails about product updates and events... <a href="#">Privacy Policy</a>
                            </label>
                        </div>
                        <button type="button" id="place-order-summary-button" class="btn btn-primary w-100 mt-2">Place order</button>
                    </div>
                    <p class="p-3">
                        <a href="#" id="show_coupon" style="cursor:pointer; color:blue; text-decoration:underline;">
                        Have a coupon code?
                        </a>
                    </p>
                    <div id="coupon_container" style="display:none; margin-top:10px; padding: 0 1.5rem 1.5rem;">
                        <input type="text" id="coupon_code" placeholder="Enter coupon code" class="form-control mb-2">
                        <button id="apply_coupon" class="btn btn-sm btn-secondary me-2">Apply</button>
                        <button id="cancel_coupon" class="btn btn-sm btn-light">Cancel</button>
                        <div id="coupon_message" style="color: red; margin-top: 5px;"></div>
                    </div>
                    <p class="p-3 pt-0">
                        <a href="#" id="show_package_select" style="cursor:pointer; color:blue; text-decoration:underline;">
                        Do you want to change your package?
                        </a>
                    </p>
                    <div id="package_container" style="display:none; margin-top:10px; padding: 0 1.5rem 1.5rem;">
                        <div class="mb-3">
                            <label for="plan_ids" class="form-label">Select Package</label>
                            <select name="plan_ids_select" id="plan_ids" class="form-select" style="max-width: 320px;">
                                <option value="">-- Select a Package --</option>
                                @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}" data-price="{{ $plan->price }}" data-name="{{ $plan->plan_name }}" data-duration="{{ $plan->duration_value }}{{ $plan->duration_unit }}"
                                {{ (isset($selectedPlan) && $selectedPlan->id == $plan->id) ? 'selected' : '' }}>
                                {{ $plan->plan_name }} - £{{ number_format($plan->price, 2) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button id="cancel_package" class="btn btn-sm btn-light">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Stripe Elements Initialization
            var stripe = Stripe('{{ env('STRIPE_PUBLISHABLE_KEY') }}');
            var elements = stripe.elements();
            var style = {
                base: { color: '#32325d', fontFamily: '"Helvetica Neue", Helvetica, sans-serif', fontSmoothing: 'antialiased', fontSize: '16px', '::placeholder': { color: '#aab7c4'}},
                invalid: { color: '#fa755a', iconColor: '#fa755a' }
            };
            var cardNumberElement = elements.create('cardNumber', {style: style});
            cardNumberElement.mount('#card-number-element');
            var cardExpiryElement = elements.create('cardExpiry', {style: style});
            cardExpiryElement.mount('#card-expiry-element');
            var cardCvcElement = elements.create('cardCvc', {style: style});
            cardCvcElement.mount('#card-cvc-element');
            var postalCodeElement = elements.create('postalCode', { style: style, placeholder: 'e.g. SW1A 1AA'});
            postalCodeElement.mount('#postal-code-element');

            var cardErrors = document.getElementById('card-errors');
            function displayError(event) {
                if (event.error) {
                    cardErrors.textContent = event.error.message;
                } else {
                    cardErrors.textContent = '';
                }
            }
            cardNumberElement.on('change', displayError);
            cardExpiryElement.on('change', displayError);
            cardCvcElement.on('change', displayError);
            postalCodeElement.on('change', displayError);

            // DOM Element References
            var form = document.getElementById('payment-form'); // Stripe payment form
            var hiddenPlanIdInput = document.getElementById('form_plan_id'); // Hidden input for plan_id in Stripe form
            var hiddenPaymentMethodInput = document.getElementById('form_payment_method'); // Hidden input for payment_method in Stripe form
            var planSelectDropdown = document.getElementById('plan_ids'); // Dropdown for changing package

    form.addEventListener('submit', function(event) {
    event.preventDefault();
    var submitButton = form.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.textContent = 'Processing...';

    // Ensure plan_id is set
    if (!hiddenPlanIdInput.value) {
        cardErrors.textContent = 'Please select a plan before paying.';
        submitButton.disabled = false;
        submitButton.textContent = 'Pay';
        if (packageContainer.style.display === 'none') {
            showPackageLink.click();
        }
        return;
    }

    stripe.createToken(cardNumberElement).then(function(result) {
        if (result.error) {
            cardErrors.textContent = result.error.message;
            submitButton.disabled = false;
            submitButton.textContent = 'Pay';
        } else {
            stripeTokenHandler(result.token);
        }
    });


            function stripeTokenHandler(token) {
                var hiddenTokenInput = document.createElement('input');
                hiddenTokenInput.setAttribute('type', 'hidden');
                hiddenTokenInput.setAttribute('name', 'stripeToken');
                hiddenTokenInput.setAttribute('value', token.id);
                form.appendChild(hiddenTokenInput);
                form.submit(); // Submit the form to the server
            }

   });         // UI Interaction Logic (Coupon, Package Change, Summary Update)
            const showCouponLink = document.getElementById('show_coupon');
            const couponContainer = document.getElementById('coupon_container');
            const couponInput = document.getElementById('coupon_code');
            const couponMessage = document.getElementById('coupon_message');
            const applyBtn = document.getElementById('apply_coupon');
            const cancelBtn = document.getElementById('cancel_coupon');
            
            const showPackageLink = document.getElementById('show_package_select');
            const packageContainer = document.getElementById('package_container');
            const cancelPackageBtn = document.getElementById('cancel_package');
            
            const summaryPlanName = document.getElementById('summary_plan_name');
            const summaryDuration = document.getElementById('summary_duration');
            const summarySubtotal = document.getElementById('summary_subtotal');
            const summaryCouponDiscount = document.getElementById('summary_coupon_discount');
            const summaryTotal = document.getElementById('summary_total');
            const planPriceDisplay = document.getElementById('plan_price_display'); // Hidden span holding current price

            let currentPlanPrice = parseFloat(planPriceDisplay.textContent) || 0;
            let currentCouponDiscountValue = 0;

            // Function to update the order summary display
            function updateSummaryDisplay() {
                const selectedOption = planSelectDropdown.options[planSelectDropdown.selectedIndex];
                // Update currentPlanPrice and summary details if a plan is selected from dropdown
                if (selectedOption && selectedOption.value) {
                    currentPlanPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                    summaryPlanName.textContent = selectedOption.getAttribute('data-name') || 'N/A';
                    summaryDuration.textContent = selectedOption.getAttribute('data-duration') || 'N/A';
                } else { // Otherwise, use initially loaded $selectedPlan data (if available)
                    currentPlanPrice = parseFloat('{{ $selectedPlan ? $selectedPlan->price : 0 }}');
                    summaryPlanName.textContent = '{{ $selectedPlan ? $selectedPlan->plan_name : "N/A" }}';
                    summaryDuration.textContent = '{{ $selectedPlan ? ($selectedPlan->duration_value . $selectedPlan->duration_unit) : "N/A" }}';
                }

                summarySubtotal.textContent = currentPlanPrice.toFixed(2);
                planPriceDisplay.textContent = currentPlanPrice.toFixed(2); // Keep hidden span updated
                
                const totalAfterCoupon = currentPlanPrice - currentCouponDiscountValue;
                summaryTotal.textContent = totalAfterCoupon.toFixed(2);
                summaryCouponDiscount.textContent = `£${currentCouponDiscountValue.toFixed(2)}`; // Display applied coupon discount

                // Update the hidden plan_id in the Stripe payment form
                if (hiddenPlanIdInput) {
                    if (planSelectDropdown.value) {
                        hiddenPlanIdInput.value = planSelectDropdown.value;
                    } else {
                        // Fallback to initial selected plan's ID if it exists
                        hiddenPlanIdInput.value = '{{ $selectedPlan ? $selectedPlan->id : "" }}';
                    }
                }
            }

            // Event Listeners for UI elements
            showCouponLink.addEventListener('click', function(e) {
                e.preventDefault();
                couponContainer.style.display = 'block';
                couponInput.focus();
                showCouponLink.style.display = 'none';
                couponMessage.textContent = '';
            });

            cancelBtn.addEventListener('click', function() {
                couponContainer.style.display = 'none';
                showCouponLink.style.display = 'inline';
                couponMessage.textContent = '';
                couponInput.value = '';
                currentCouponDiscountValue = 0; // Reset coupon discount
                updateSummaryDisplay(); // Update summary
            });

            applyBtn.addEventListener('click', function() {
                const code = couponInput.value.trim().toUpperCase();
                if (code === '') {
                    couponMessage.style.color = 'red';
                    couponMessage.textContent = 'Please enter a coupon code.';
                    return;
                }
                // Dummy coupon logic - replace with AJAX call to server for validation
                const coupons = { 'SAVE10': 0.10, 'SAVE20': 0.20 }; 
                if (coupons.hasOwnProperty(code)) {
                    const discountPercentage = coupons[code];
                    currentCouponDiscountValue = currentPlanPrice * discountPercentage;
                    couponMessage.style.color = 'green';
                    couponMessage.textContent = `Coupon applied! You saved £${currentCouponDiscountValue.toFixed(2)}.`;
                } else {
                    currentCouponDiscountValue = 0;
                    couponMessage.style.color = 'red';
                    couponMessage.textContent = 'Invalid coupon code.';
                }
                updateSummaryDisplay(); // Update summary with new total
            });

            showPackageLink.addEventListener('click', function(e) {
                e.preventDefault();
                packageContainer.style.display = 'block';
                showPackageLink.style.display = 'none';
            });

            cancelPackageBtn.addEventListener('click', function() {
                packageContainer.style.display = 'none';
                showPackageLink.style.display = 'inline';
            });

            planSelectDropdown.addEventListener('change', function() {
                currentCouponDiscountValue = 0; // Reset coupon when plan changes
                couponMessage.textContent = '';
                couponInput.value = '';
                updateSummaryDisplay(); // Update summary for new plan
                // Auto-select credit card and show its accordion when package changes
                document.getElementById('payment_method_stripe').checked = true;
                var ccCollapseInstance = bootstrap.Collapse.getInstance(document.getElementById('collapseCC')) || new bootstrap.Collapse(document.getElementById('collapseCC'));
                ccCollapseInstance.show();
                var ppCollapseInstance = bootstrap.Collapse.getInstance(document.getElementById('collapsePP')) || new bootstrap.Collapse(document.getElementById('collapsePP'));
                ppCollapseInstance.hide();
            });
            
            // Initial call to set up summary based on loaded data
            updateSummaryDisplay();

            // Main "Place order" button handler (in summary)
            const placeOrderSummaryButton = document.getElementById('place-order-summary-button');
            if (placeOrderSummaryButton) {
                placeOrderSummaryButton.addEventListener('click', function() {
                    // Check if T&C is agreed
                    if (!document.getElementById('tnc').checked) {
                        alert('Please agree to the terms and conditions.'); // Replace with a non-blocking message
                        document.getElementById('tnc').focus();
                        return;
                    }

                    const selectedPaymentMethodRadio = document.querySelector('input[name="payment_method_radio"]:checked');
                    if (selectedPaymentMethodRadio) {
                        const paymentMethodValue = selectedPaymentMethodRadio.value;
                        // Update plan_id in the Stripe form one last time before any submission
                        if (planSelectDropdown.value) {
                            hiddenPlanIdInput.value = planSelectDropdown.value;
                        } else {
                            hiddenPlanIdInput.value = '{{ $selectedPlan ? $selectedPlan->id : "" }}';
                        }

                        if (!hiddenPlanIdInput.value) {
                            alert('Please select a plan first.'); // Replace with non-blocking
                            if (packageContainer.style.display === 'none') showPackageLink.click();
                            planSelectDropdown.focus();
                            return;
                        }

                        if (paymentMethodValue === 'stripe') {
                            form.requestSubmit(); // Programmatically submit the Stripe form
                        } else if (paymentMethodValue === 'paypal') {
                            // Construct and submit a form for PayPal
                            const planIdForPaypal = hiddenPlanIdInput.value; // Use the determined plan ID
                            // console.log("Initiating PayPal checkout for plan ID: ", planIdForPaypal);
                            // alert('PayPal checkout for plan ID: ' + planIdForPaypal + ' needs to be implemented via server-side redirection.');
                            
                            const paypalForm = document.createElement('form');
                            paypalForm.method = 'POST';
                            paypalForm.action = '{{ route("user.checkout.store") }}'; // Submits to the same controller action

                            const csrfTokenInput = document.createElement('input');
                            csrfTokenInput.type = 'hidden';
                            csrfTokenInput.name = '_token';
                            csrfTokenInput.value = '{{ csrf_token() }}';
                            paypalForm.appendChild(csrfTokenInput);

                            const planIdInputPaypal = document.createElement('input');
                            planIdInputPaypal.type = 'hidden';
                            planIdInputPaypal.name = 'plan_id';
                            planIdInputPaypal.value = planIdForPaypal;
                            paypalForm.appendChild(planIdInputPaypal);

                            const paymentMethodInputPaypal = document.createElement('input');
                            paymentMethodInputPaypal.type = 'hidden';
                            paymentMethodInputPaypal.name = 'payment_method';
                            paymentMethodInputPaypal.value = 'paypal'; // Set payment method to paypal
                            paypalForm.appendChild(paymentMethodInputPaypal);
                            
                            document.body.appendChild(paypalForm);
                            paypalForm.submit();
                        }
                    } else {
                        alert('Please select a payment method.'); // Replace with non-blocking
                    }
                });
            }

            // Accordion control based on radio button selection
            document.querySelectorAll('input[name="payment_method_radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    var ccCollapseEl = document.getElementById('collapseCC');
                    var ppCollapseEl = document.getElementById('collapsePP');
                    var ccCollapseInstance = bootstrap.Collapse.getInstance(ccCollapseEl) || new bootstrap.Collapse(ccCollapseEl, {toggle: false});
                    var ppCollapseInstance = bootstrap.Collapse.getInstance(ppCollapseEl) || new bootstrap.Collapse(ppCollapseEl, {toggle: false});

                    if (this.value === 'stripe' && this.checked) {
                        ccCollapseInstance.show();
                        ppCollapseInstance.hide();
                    } else if (this.value === 'paypal' && this.checked) {
                        ppCollapseInstance.show();
                        ccCollapseInstance.hide();
                    }
                });
            });
            // Ensure initially checked radio's accordion is open
            const initiallyCheckedRadio = document.querySelector('input[name="payment_method_radio"]:checked');
            if (initiallyCheckedRadio) {
                initiallyCheckedRadio.dispatchEvent(new Event('change')); // Trigger change to open accordion
            }
        });
    </script>
</body>
</html>
