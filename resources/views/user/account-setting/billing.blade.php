@extends('admin.partial.app')
@push('title')Account Setting @endpush
@section('content')

   
    <div class="container-fluid pt-5">
        <div class="row">

            <div class="col-md-10">
                @include('user.account-setting.ui')

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                         <h4 class="text-center mb-2">Pricing Plans</h4>
                        <p class="text-center mb-0">All plans include 40+ advanced tools and features to boost your product. Choose the best plan to fit your needs.</p>
                    </div>
                    <div class="card-body">
                       <div class="rounded-top">
                        <div class="row gy-6">
                            <!-- Basic -->
                            <div class="col-xl mb-md-0">
                            <div class="card border rounded shadow-none">
                                <div class="card-body pt-12 p-5">
                                <div class="mt-3 mb-5 text-center">
                                    <img src="../../assets/img/illustrations/page-pricing-basic.png" alt="Basic Image" height="120">
                                </div>
                                <h4 class="card-title text-center text-capitalize mb-1">Basic</h4>
                                <p class="text-center mb-5">A simple start for everyone</p>
                                <div class="text-center h-px-50">
                                    <div class="d-flex justify-content-center">
                                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                                    <h1 class="mb-0 text-primary">0</h1>
                                    <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>
                                    </div>
                                </div>

                            <ul class="list-group ps-6 my-5 pt-9">
                                <li class="mb-4">100 responses a month</li>
                                <li class="mb-4">Unlimited forms and surveys</li>
                                <li class="mb-4">Unlimited fields</li>
                                <li class="mb-4">Basic form creation tools</li>
                                <li class="mb-0">Up to 2 subdomains</li>
                            </ul>

                            <button type="button" class="btn btn-label-success d-grid w-100 waves-effect" data-bs-dismiss="modal">Your Current Plan</button>
                            </div>
                        </div>
                        </div>

                        <!-- Pro -->
                        <div class="col-xl mb-md-0">
                        <div class="card border-primary border shadow-none">
                            <div class="card-body position-relative pt-4 p-5">
                            <div class="position-absolute end-0 me-5 top-0 mt-4">
                                <span class="badge bg-label-primary rounded-1">Popular</span>
                            </div>
                            <div class="my-5 pt-6 text-center">
                                <img src="../../assets/img/illustrations/page-pricing-standard.png" alt="Standard Image" height="120">
                            </div>
                            <h4 class="card-title text-center text-capitalize mb-1">Standard</h4>
                            <p class="text-center mb-5">For small to medium businesses</p>
                            <div class="text-center h-px-50">
                                <div class="d-flex justify-content-center">
                                <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                                <h1 class="price-toggle price-yearly text-primary mb-0">7</h1>
                                <h1 class="price-toggle price-monthly text-primary mb-0 d-none">9</h1>
                                <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>
                                </div>
                                <small class="price-yearly price-yearly-toggle text-body-secondary">USD 480 / year</small>
                            </div>

                            <ul class="list-group ps-6 my-5 pt-9">
                                <li class="mb-4">Unlimited responses</li>
                                <li class="mb-4">Unlimited forms and surveys</li>
                                <li class="mb-4">Instagram profile page</li>
                                <li class="mb-4">Google Docs integration</li>
                                <li class="mb-0">Custom “Thank you” page</li>
                            </ul>

                            <button type="button" class="btn btn-primary d-grid w-100 waves-effect waves-light" data-bs-dismiss="modal">Upgrade</button>
                            </div>
                        </div>
                        </div>

                        <!-- Enterprise -->
                        <div class="col-xl">
                        <div class="card border rounded shadow-none">
                            <div class="card-body pt-12 p-5">
                            <div class="mt-3 mb-5 text-center">
                                <img src="../../assets/img/illustrations/page-pricing-enterprise.png" alt="Enterprise Image" height="120">
                            </div>
                            <h4 class="card-title text-center text-capitalize mb-1">Enterprise</h4>
                            <p class="text-center mb-5">Solution for big organizations</p>

                            <div class="text-center h-px-50">
                                <div class="d-flex justify-content-center">
                                <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                                <h1 class="price-toggle price-yearly text-primary mb-0">16</h1>
                                <h1 class="price-toggle price-monthly text-primary mb-0 d-none">19</h1>
                                <sub class="h6 text-body pricing-duration mt-auto mb-1">/month</sub>
                                </div>
                                <small class="price-yearly price-yearly-toggle text-body-secondary">USD 960 / year</small>
                            </div>

                            <ul class="list-group ps-6 my-5 pt-9">
                                <li class="mb-4">PayPal payments</li>
                                <li class="mb-4">Logic Jumps</li>
                                <li class="mb-4">File upload with 5GB storage</li>
                                <li class="mb-4">Custom domain support</li>
                                <li class="mb-0">Stripe integration</li>
                            </ul>

                            <button type="button" class="btn btn-label-primary d-grid w-100 waves-effect" data-bs-dismiss="modal">Upgrade</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>


                    </div>
                </div>
            </div>

            <div class="col-md-12 pt-5">

                <div class="card mb-6">
                    <!-- Current Plan -->
                    <h5 class="card-header">Current Plan</h5>
                    <div class="card-body">
                        <div class="row row-gap-6">
                            <div class="col-md-6 mb-1">
                                <div class="mb-6">
                                    <h6 class="mb-1">Your Current Plan is </h6>
                                    <p>A simple start for everyone</p>
                                </div>
                                <div class="mb-6">
                                    <h6 class="mb-1">Active until Dec 09, 2021</h6>
                                    <p>We will send you a notification upon Subscription expiration</p>
                                </div>
                                <div>
                                    <h6 class="mb-1"><span class="me-1">$199 Per Month</span> <span class="badge bg-label-primary rounded-pill">Popular</span></h6>
                                    <p class="mb-1">Standard plan for small to medium businesses</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-warning mb-6" role="alert">
                                    <h5 class="alert-heading mb-1 d-flex align-items-center">
                                    <span class="alert-icon rounded"><i class="icon-base ti tabler-alert-triangle icon-md"></i></span>
                                    <span>We need your attention!</span>
                                    </h5>
                                    <span class="ms-11 ps-1">Your plan requires update</span>
                                </div>
                                <div class="plan-statistics">
                                    <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">Days</h6>
                                    <h6 class="mb-1">12 of 30 Days</h6>
                                    </div>
                                    <div class="progress rounded mb-1">
                                    <div class="progress-bar w-25 rounded" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>18 days remaining until your plan requires update</small>
                                </div>
                            </div>
                            <div class="col-12 d-flex gap-2 flex-wrap">
                                <button class="btn btn-primary me-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#pricingModal">Upgrade Plan</button>
                                <button class="btn btn-label-danger cancel-subscription waves-effect">Cancel Subscription</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Current Plan -->
                </div>

            </div>

            <div class="col-md-12 pt-3">
              <div class="card">
                <div class="card-header">
                      <h5 class="card-title text-md-start text-center">Billing History</h5>
                </div>
                <div class="card-body">
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
                                <tbody class="py-5" >
                                    @if(count($membership) > 0)
                                        @foreach ($membership as $key => $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->plan->plan_name}}</td>
                                                <td>{{date('d-M-Y',strtotime($item->membership_start_date))}}</td>
                                                <td>{{date('d-M-Y',strtotime($item->membership_expiry_date))}}</td>
                                                <td>@if($item->payment) {{$item->payment->amount}} {{$item->payment->currency}} @endif</td>
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

                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center" >
                                                    <a class="btn btn-primary" href="{{url('check')}}">No Record</a>
                                                </td>
                                            </tr>
                                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
