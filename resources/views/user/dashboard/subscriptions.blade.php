@extends('admin.partial.app')
@push('title') Billing Plan @endpush

@section('content')
   <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-md-12">
                <div class="card mb-6">
                    <h5 class="card-header">Purchase New Plan</h5>
                    <div class="card-body">
                            <form id="creditCardForm" class="row g-6" onsubmit="return false">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label w-100" for="paymentCard">Plan</label>
                                        <select class="form-control" name="plan_id" id="">
                                            @foreach ($plans as $item)
                                                    <option value="{{$item->id}}">{{$item->plan_name}} - £ {{$item->price}} / {{$item->duration_unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label w-100" for="paymentCard">Card Number</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            id="paymentCard"
                                            name="paymentCard"
                                            class="form-control credit-card-mask"
                                            type="text"
                                            placeholder="1356 3215 6548 7898"
                                            aria-describedby="paymentCard2" />
                                        <span class="input-group-text cursor-pointer" id="paymentCard2"
                                            ><span class="card-type"></span
                                            ></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="paymentName">Name</label>
                                    <input type="text" id="paymentName" class="form-control" placeholder="John Doe" />
                                </div>
                                <div class="col-6 col-md-3">
                                    <label class="form-label" for="paymentExpiryDate">Exp. Date</label>
                                    <input
                                        type="text"
                                        id="paymentExpiryDate"
                                        class="form-control expiry-date-mask"
                                        placeholder="MM/YY" />
                                </div>
                                <div class="col-6 col-md-3">
                                    <label class="form-label" for="paymentCvv">CVV Code</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="text"
                                            id="paymentCvv"
                                            class="form-control cvv-code-mask"
                                            maxlength="3"
                                            placeholder="654" />
                                        <span class="input-group-text cursor-pointer" id="paymentCvv2"
                                            ><i
                                            class="icon-base ti tabler-help-circle text-body-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Card Verification Value"></i
                                            ></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-6 text-center">
                                    <button type="submit" class="btn btn-primary me-3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                    <h5 class="card-header text-md-start text-center">Billing History</h5>
                    <div class="card-datatable border-top">
                        <table class="invoice-list-table table border-top">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Plan Name</th>
                                    <th>Type</th>
                                    <th>Start</th>
                                    <th>Expiry</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th class="cell-fit">Action</th>
                                </tr>
                            </thead>
                             <tbody>
                                @foreach ($membership as $key => $item)
                                @if(!$item->payment)
                                <?php continue; ?>
                                @endif
                                    <tr>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->plan->plan_name}}</td>
                                        <td>{{$item->membership_type}}</td>
                                        <td>{{$item->membership_start_date}}</td>
                                        <td>{{$item->membership_expiry_date}}</td>
                                        <td>{{$item->payment->amount}} {{$item->payment->currency}}</td>
                                        <td><span class="badge bg-secondary">{{$item->membership_status}}</span></td>
                                        <td class="cell-fit">
                                            <button class="btn btn-danger">Cancel</button>
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
     <script src="../../assets//js/pages-pricing.js"></script>
@endsection