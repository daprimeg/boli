@extends('admin.partial.app')
@push('title') Membership @endpush 
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

<div class="container-fluid container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Create Membership</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/memberships')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.memberships.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label class="form-label" >Email:</label>
                                        <input type="email" id="email" name="email" class="form-control" required />
                                        <button type="button" id="fetchUser" class="btn btn-info mt-2">Fetch User</button>
                                    </div>
                                </div>
                            </div>

                            <div id="userDetails" style="display:none;" class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" >Name:</label>
                                        <input type="text" id="name" class="form-control" disabled />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" >Company:</label>
                                        <input type="text" id="company" class="form-control" disabled />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Country:</label>
                                        <input type="text" id="country" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Plan:</label>
                                        <select name="plan_id" class="form-control" required>
                                            @foreach($plans as $plan)
                                                <option value="{{ $plan->id }}">{{ $plan->plan_name }} - £{{ $plan->price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Membership Type:</label>
                                        <select name="membership_type" id="membershipType" class="form-control" required>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Payment Method:</label>
                                        <select name="payment_method" class="form-control" required>
                                            <option value="paypal">PayPal</option>
                                            <option value="stripe">Stripe</option>
                                            <option value="manual">Manual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="customDates" style="display:none;" class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Start Date:</label>
                                            <input type="date" name="start_date" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">End Date:</label>
                                            <input type="date" name="end_date" class="form-control" />
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Transaction ID:</label>
                                        <input type="text" name="transaction_id" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Payer ID:</label>
                                        <input type="text" name="payer_id" class="form-control" />
                                    </div>
                                </div>

                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Charge ID:</label>
                                        <input type="text" name="charge_id" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Amount:</label>
                                        <input type="number" name="amount" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Currency:</label>
                                        <input type="text" name="currency" class="form-control" value="USD" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label class="form-label">Payment Status:</label>
                                        <select name="payment_status" class="form-control" required>
                                            <option value="Pending">Pending</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Failed">Failed</option>
                                            <option value="Refunded">Refunded</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center pt-5" >
                                <button type="submit" class="btn btn-primary">Create Membership</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
      </div>
</div>


@endsection
@section('js')

    <script>
            document.getElementById('fetchUser').addEventListener('click', function() {
                var email = document.getElementById('email').value;

                fetch("{{ route('admin.memberships.fetch-user') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ email: email })
                })
                .then(response => response.json())
                .then(data => {
                    if(data){
                        document.getElementById('userDetails').style.display = 'flex';
                        document.getElementById('name').value = data.firstName + ' ' + data.surname;
                        document.getElementById('company').value = data.companyName;
                        document.getElementById('country').value = data.country;
                    } else {
                        alert("User not found");
                    }
                });
            });

            document.getElementById('membershipType').addEventListener('change', function() {
                if(this.value === 'custom'){
                    document.getElementById('customDates').style.display = 'flex';
                } else {
                    document.getElementById('customDates').style.display = 'none';
                }
            });
    </script>
    
@endsection

