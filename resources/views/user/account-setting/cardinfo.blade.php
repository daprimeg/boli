<style>
    .payment-icon {
    width: 40px;   /* icon size */
    height: auto;  /* maintain aspect ratio */
    object-fit: contain;
}

</style>
<div class="col-md-12">
<div class="card mb-6 mt-4 ">
        <h5 class="card-header">Payment Methods</h5>
        <div class="card-body">
          <div class="row gx-6">
            <div class="col-md-6">
                <form method="POST" action="{{ route('user.payment-methods.store') }}" class="row g-6">
                    @csrf
                    <div class="col-12 mb-2">
                        <div class="form-check form-check-inline my-2 ms-2 me-6">
                        <input name="payment_type" class="form-check-input" type="radio" value="card" id="collapsible-payment-cc" checked>
                        <label class="form-check-label" for="collapsible-payment-cc">Credit/Debit/ATM Card</label>
                        </div>
                        <div class="form-check form-check-inline ms-2 my-2">
                        <input name="payment_type" class="form-check-input" type="radio" value="paypal" id="collapsible-payment-cash">
                        <label class="form-check-label" for="collapsible-payment-cash">Paypal account</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="paymentCard">Card Number</label>
                        <input id="paymentCard" name="account_number" class="form-control" type="text" placeholder="1356 3215 6548 7898">
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="paymentName">Name</label>
                        <input type="text" id="paymentName" name="account_name" class="form-control" placeholder="John Doe">
                    </div>

                    <div class="col-6 col-md-3">
                        <label class="form-label" for="paymentExpiryDate">Exp. Date</label>
                        <input type="text" id="paymentExpiryDate" name="expiry_date" class="form-control" placeholder="MM/YY">
                    </div>

                    <div class="col-6 col-md-3">
                        <label class="form-label" for="paymentCvv">CVV Code</label>
                        <input type="text" id="paymentCvv" name="cvv" class="form-control" maxlength="3" placeholder="654">
                    </div>

                    <div class="col-12 mt-6">
                        <button type="submit" class="btn btn-primary me-3">Save Changes</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </form>

                            </div>
                    <div class="col-md-6 mt-12 mt-md-0">
                        <div class="added-cards">
                                @forelse($paymentMethods as $method)
                                <div class="cardMaster p-6 bg-lighter rounded mb-6">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                    <div class="card-information me-2">
                                       @if($method->payment_type == 'card')
                                            <img class="mb-2 payment-icon" src="{{ asset('public/theme/assets/cards/master.png') }}" alt="Card">
                                        @elseif($method->payment_type == 'paypal')
                                            <img class="mb-2 payment-icon" src="{{ asset('public/theme/assets/cardss/paypal.png') }}" alt="Paypal">
                                        @else
                                            <img class="mb-2 payment-icon" src="{{ asset('public/theme/assets/cardss/visa.jpg') }}" alt="Visa">
                                        @endif


                                        <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                        <h6 class="mb-0 me-2">{{ $method->account_name }}</h6>
                                        @if($method->is_default)
                                            <span class="badge bg-label-primary">Primary</span>
                                        @endif
                                        </div>
                                        <span class="card-number">**** **** {{ substr($method->account_number, -4) }}</span>
                                    </div>

                                    <div class="d-flex flex-column text-start text-lg-end">
                                        <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-4">
                                        <form method="POST" action="{{ route('user.payment-methods.destroy', $method->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-label-danger">Delete</button>
                                        </form>
                                        </div>
                                        <small class="mt-sm-4 mt-2 order-sm-1 order-0">Card expires at {{ $method->expiry_date }}</small>
                                    </div>
                                    </div>
                                </div>
                                @empty
                                <p>No saved payment methods.</p>
                                @endforelse
                        </div>
                    </div>

            </div>
          </div>
        </div>
      
</div>