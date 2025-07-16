@extends('admin.partial.app')
@push('title') Interest @endpush

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
 
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-md-12">

                @if (session('success'))
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

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Create Interest</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{url('/interest')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                 
                        <form class="pt-4" action="{{ url('/interest/store') }}" method="POST" enctype="multipart/form-data"  id="ticketForm" >
                            @csrf

                            <div class="row">

                                <div class="col-12 pt-3">
                                    <h4 class="card-title ">Primary</h4>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="make_id" class="form-label">Make</label>
                                    <select id="make_id" name="make_id" class="form-control">
                                        <option value="">Select Make</option>
                                        @foreach($makes as $make)
                                            <option value="{{ $make->id }}">{{ $make->name }}</option>
                                        @endforeach
                                    </select>
                                </div>          

                                <div class="mb-3 col-md-4">
                                    <label for="model_id" class="form-label">Model</label>
                                    <select id="model_id" name="model_id" class="form-control">
                                        <option value="">Select Model</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label for="model_variant_id" class="form-label">Model Variant</label>
                                    <select name="model_variant_id" class="form-select" required>
                                        <option value="">Select Variant</option>
                                        {{-- Will be dynamically populated --}}
                                    </select>
                                </div>


                                <div class="mb-3 col-md-3">
                                    <label for="year_from" class="form-label">Year From</label>
                                    <select name="year_from" class="form-select" required>
                                        <option value="">Select Year From</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="year_to" class="form-label">Year To</label>
                                    <select name="year_to" class="form-select" required>
                                        <option value="">Select Year To</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="transmission" class="form-label">Transmission</label>
                                    <select name="transmission" class="form-select" required>
                                        <option value="">Select Transmission</option>                    
                                            <option value="None">None</option>
                                            <option value="Auto Clutch">Auto Clutch</option> 
                                            <option value="Auto/Manual Mode">Auto/Manual Mode</option> 
                                            <option value="Automatic">Automatic</option> 
                                            <option value="CVT">CVT</option> 
                                            <option value="CVT/Manual Mode">CVT/Manual Mode</option>
                                            <option value="Manual Transmission">Manual Transmission</option>                     
                                    </select>
                                </div>

                            

                                <div class="col-12 pt-3">
                                    <h4 class="card-title ">Seceondry</h4>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="engine_size_min" class="form-label">Engine Size Min</label>
                                    <input type="number" name="engine_size_min" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="engine_size_max" class="form-label">Engine Size Max</label>
                                    <input type="number" name="engine_size_max" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="mileage_max" class="form-label">Mileage Max</label>
                                    <input type="number" name="mileage_max" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="auction_house_id" class="form-label">Auction House</label>
                                    <select name="auction_house_id" class="form-select" required>
                                        <option value="">Select Auction House</option>
                                        @foreach($auctionHouses as $auctionHouse)
                                            <option value="{{ $auctionHouse->id }}">{{ $auctionHouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="auction_grade_condition" class="form-label">Auction Grade Condition</label>
                                    <select name="auction_grade_condition" class="form-select" required>
                                        <option value="">Select Grade</option>                    
                                            <option value="1">1</option>
                                            <option value="2">2</option> 
                                            <option value="3">3</option> 
                                            <option value="4">4</option> 
                                            <option value="5">5</option>                    
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="previous_owners_max" class="form-label">Previous Owners Max</label>
                                    <input type="number" name="previous_owners_max" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="body_type_id" class="form-label">Body Type</label>
                                    <select name="body_type_id" class="form-select" required>
                                        <option value="">Select Body Type</option>
                                        @foreach($bodyTypes as $bodyType)
                                            <option value="{{ $bodyType->id }}">{{ $bodyType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="no_of_service_max" class="form-label">No. of Services Max</label>
                                    <input type="number" name="no_of_service_max" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="estimated_retail_value_min" class="form-label">Estimated Retail Value Min</label>
                                    <input type="number" name="estimated_retail_value_min" class="form-control">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="estimated_retail_value_max" class="form-label">Estimated Retail Value Max</label>
                                    <input type="number" name="estimated_retail_value_max" class="form-control">
                                </div>

                                <div class="col-12 text-center pt-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')


@endsection
