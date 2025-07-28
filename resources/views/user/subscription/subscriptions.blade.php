@extends('admin.partial.app')
@push('title') Billing Plan @endpush

@section('css')

<style>

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
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
          <div class="col-md-6">
            
            @if(!$current)
            <div class="card mb-6">
                <h5 class="card-header">Subscribe Plan</h5>
                <div class="card-body">
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                     <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                     @if(session('error'))
                     <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form id="creditCardForm" method="post" action="{{url('/subscriptions_submit')}}" class="row g-6">
                        @csrf
                        <input type="hidden" name="payment_method" value="" />
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label w-100" for="paymentCard">Plan</label>
                                <select required class="form-control" name="plan_id" id="">
                                    <option value="">Select Plan</option>
                                    @foreach ($plans as $item)
                                        <option value="{{$item->id}}">{{$item->plan_name}} - £ {{$item->price}} / {{$item->duration_unit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span></span>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label w-100" for="paymentCard">Card Number</label>
                            <div class="pt-3 payment-card">
                                <div class="form-group">
                                    <div id="card-element"></div>
                                    <div id="card-errors" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-6 text-center">
                            <button type="submit" class="btn btn-primary me-3">Submit</button>
                        </div>

                    </form>
                </div>
             </div>
             @endif

          </div>

          <div class="col-md-12">
              <div class="card">
                 <h5 class="card-header text-md-start text-center">Billing History</h5>
                 <div class="card-datatable border-top">
                        <table class="invoice-list-table table border-top">
                            <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Plan Name</th>
                                    <th>Start</th>
                                    <th>Expiry</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                             <tbody>
                                @foreach ($membership as $key => $item)
                            
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->plan->plan_name}}</td>
                                        <td>{{date('d-M-Y',strtotime($item->membership_start_date))}}</td>
                                        <td>{{date('d-M-Y',strtotime($item->membership_expiry_date))}}</td>
                                        <td>{{$item->payment->amount}} {{$item->payment->currency}}</td>
                                        <td>
                                             @if($current && $current->id == $item->id)
                                                  <span class="badge bg-secondary">Active</span>
                                              @else
                                                 @if($item->membership_status == 'Active')
                                                    <span class="badge bg-danger">Expired </span>
                                                   @else
                                                    <span class="badge bg-danger">Disabled</span>
                                                 @endif
                                                 
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                             </tbody>
                          </table>
                       </div>
                    </div>
                </div>
        </div>
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

        $('select[name=plan_id]').change(function(e){ 
            if($(this).val() == 2){
                $('.payment-card').hide();
            }else{
                $('.payment-card').show();
            }
        }).trigger('change');


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

        
        $('#creditCardForm').on('submit', async function (e) {
            if($('select[name=plan_id]').val() == 2){
                return true; 
            }
            e.preventDefault();
            const success = await checkpayment();
            if(success){
                this.submit();
            }
        });

    });   
    </script>
@endsection