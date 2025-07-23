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
                                <h5 class="card-title">Edit Membership</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/memberships')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                           <form action="{{ URL::to('/admin/memberships/'.$membership->id.'/update')}}" method="POST">
                                @csrf
                                

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" >Email</label>
                                            <input type="text" class="form-control" value="{{ $membership->user->personalEmail }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{ $membership->user->firstName }} {{ $membership->user->surname }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Plan</label>
                                            <select disabled name="plan_id" class="form-control" required>
                                                @foreach($plans as $plan)
                                                <option value="{{ $plan->id }}" {{ $plan->id == $membership->plan_id ? 'selected' : '' }}>
                                                    {{ $plan->plan_name }} (£{{ $plan->price }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="membership_status" class="form-control" required>
                                                <option value="Active" {{ $membership->membership_status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Inactive" {{ $membership->membership_status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                <option value="Pending" {{ $membership->membership_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Expired" {{ $membership->membership_status == 'Expired' ? 'selected' : '' }}>Expired</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Payment Method</label>
                                            <select disabled name="payment_method" class="form-control" required >
                                                @foreach($paymentMethods as $method)
                                                <option value="{{ $method }}" {{ $membership->payment_method == $method ? 'selected' : '' }}>{{ ucfirst($method) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4" >
                                        <div class="form-group">
                                            <label class="form-label">Membership Type</label>
                                            <select disabled name="membership_type" class="form-control" id="membership_type" required>
                                                <option value="weekly" {{ $membership->membership_type == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                                <option value="monthly" {{ $membership->membership_type == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                                <option value="yearly" {{ $membership->membership_type == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                                <option value="custom" {{ $membership->membership_type == 'custom' ? 'selected' : '' }}>Custom</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row custom-date-range"  style="{{ $membership->membership_type == 'custom' ? '' : 'display:none' }}" >
                                    <div class="col-md-4"  >
                                        <div class="form-group">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="membership_start_date" class="form-control" value="{{ \Carbon\Carbon::parse($membership->membership_start_date)->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4" >
                                        <div class="form-group">
                                            <label class="form-label" >End Date</label>
                                            <input type="date" name="membership_expiry_date" class="form-control" value="{{ \Carbon\Carbon::parse($membership->membership_expiry_date)->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-5">
                                     <div class="col-md-12 text-center" >
                                         <button type="submit" class="btn btn-primary">Update</button>
                                         <a href="{{URL::to('/admin/memberships')}}" class="btn btn-secondary">Cancel</a>
                                     </div>
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
        document.getElementById('membership_type').addEventListener('change', function() {
            const customRange = document.querySelector('.custom-date-range');
            if (this.value === 'custom') {
                customRange.style.display = 'flex';
            } else {
                customRange.style.display = 'none';
            }
        });
    </script>
    
@endsection