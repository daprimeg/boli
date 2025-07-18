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
                 
                        <form class="pt-4" action="{{ url('/interest') }}" method="POST" enctype="multipart/form-data"  id="ticketForm" >
                            @csrf

                            <div class="row">

                                <div class="col-12 pt-3">
                                    <h4 class="card-title ">Primary</h4>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="make_id" class="form-label">Make <span class="text-danger">*</span></label> <br>
                                    <select name="make_id" class="form-control form-select" required></select>
                                </div>          

                                <div class="mb-3 col-md-4">
                                    <label for="model_id" class="form-label">Model <span class="text-danger">*</span></label> <br>
                                    <select name="model_id" class="form-select form-control" required></select>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label for="model_variant_id" class="form-label">Model Variant <span class="text-danger">*</span></label> <br>
                                    <select name="variant_id" class="form-select form-control" required></select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="year_from" class="form-label">Year</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <select name="year_from" class="form-select" >
                                                <option value="">From</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="year_from" class="form-select" >
                                                <option value="">To</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Mileage</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <input name="mileage_from" step="any" placeholder="From" type="number" class="form-control"  />
                                        </div>
                                        <div class="box w-100">
                                            <input name="mileage_to" step="any" placeholder="To" type="number" class="form-control"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="platform_id" class="form-label">Auction House</label>
                                    <select name="platform_id" class="form-select" >
                                        <option value="">Select Auction House</option>
                                        @foreach($auctionHouses as $auctionHouse)
                                            <option value="{{ $auctionHouse->id }}">{{ $auctionHouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 pt-3">
                                    <h4 class="card-title ">Secondry</h4>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="Fuel Type" class="form-label">Fuel Type</label>
                                    <select name="fuel_type" class="form-select" >
                                        <option value="">Select Fuel Type</option>
                                        <option value="Petrol">Petrol</option> 
                                        <option value="Diesel">Diesel</option> 
                                        <option value="Electric">Electric</option>
                                        <option value="Petrol/Electric">Petrol/Electric</option>
                                        <option value="None">None</option> 
                                        <option value="Diesel/Electric">Diesel/Electric</option> 
                                        <option value="Bi-Fuel">Bi-Fuel</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">CC</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <select name="cc_from" class="form-select">
                                                <option value="">From</option>
                                                @foreach($cc as $c)
                                                    <option value="{{ $c }}">{{$c}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="cc_to" class="form-select">
                                                <option value="">To</option>
                                                @foreach($cc as $c)
                                                    <option value="{{$c}}">{{$c}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Price</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <input name="price_from" step="any" placeholder="From" type="number" class="form-control"  />
                                        </div>
                                        <div class="box w-100">
                                            <input name="price_to" step="any" placeholder="To" type="number" class="form-control"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="transmission" class="form-label">Transmission</label>
                                    <select name="transmission" class="form-select">
                                        <option value="">Select Transmission</option>
                                        @foreach ($transmission as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach                    
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="grade" class="form-label">Grade</label>
                                    <select name="grade" class="form-select">
                                        <option value="">Select Grade</option>
                                        @foreach ($grade as $item)
                                                 <option value="{{$item}}">{{$item}}</option>
                                        @endforeach                    
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Former Keepers</label>
                                    <input type="number" name="former_keeper" class="form-control">
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


<script>

     $('select[name=make_id]').select2({
        placeholder: 'Select Make',
        allowClear: true,
        ajax: {
            url: "{{url('/admin/masters/makes/getMakes')}}",
            dataType: 'json'
        }
    });

    $('select[name=model_id]').select2({
        placeholder: 'Select Model',
        allowClear: true,
        ajax: {
            url: "{{url('/admin/masters/models/getModels')}}",
            dataType: 'json',
        }
    });

    $('select[name=variant_id]').select2({
        placeholder: 'Select Variant',
        allowClear: true,
        ajax: {
            url: "{{url('/admin/masters/variants/getVariants')}}",
            dataType: 'json',
        }
    });

</script>


@endsection
