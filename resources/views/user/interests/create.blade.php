@extends('user.partial.app')
@push('title') Interest @endpush

@section('css')

    <style>
   

        .form-label {
    font-weight: 600;
    margin-bottom: 6px;
    font-size: 14px;
}
.select2-container .select2-selection--single {
    height: 38px !important;
    padding: 6px 12px;
    border: 1px solid #ced4da;
    border-radius: 6px;
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
                 
                        <form class="pt-4" action="{{ url('/interest/') }}" method="POST" enctype="multipart/form-data"  >
                            @csrf
                    
                            <div class="row">

                                <div class="col-12 pt-3">
                                    <h4 class="card-title ">Primary</h4>
                                </div>

                             <div class="mb-3 col-md-4">
                                    <label for="title" class="form-label">Interest Title <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('title') }}" name="title" class="form-control" required>
                                </div>

                        
                                    <div class="mb-3 col-md-4">
                                        <label for="make_id" class="form-label">
                                            Make <span class="text-danger">*</span>
                                        </label>
                                        <select name="make_id" id="make_id" class="form-select select2" required></select>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="model_id" class="form-label">
                                            Model <span class="text-danger">*</span>
                                        </label>
                                        <select name="model_id" id="model_id" class="form-select select2" required disabled></select>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="variant_id" class="form-label">
                                            Model Variant
                                        </label>
                                        <select name="variant_id" id="variant_id" class="form-select select2" disabled></select>
                                    </div>
                        


                                <div class="mb-3 col-md-4">
                                    <label for="year_from" class="form-label">Year</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <select name="year_from" class="form-select" >
                                                <option value="">From</option>
                                                   @foreach($years as $year)
                                                    <option @if(old('year_from') == $year) selected @endif value="{{$year}}">{{$year}}</option>
                                                   @endforeach
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="year_to" class="form-select" >
                                                <option value="">To</option>
                                                   @foreach($years as $year)
                                                    <option @if(old('year_to') == $year) selected @endif value="{{$year}}">{{$year}}</option>
                                                   @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Mileage</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <select name="mileage_from" id="mileage_from" class="form-select">
                                                <option value="">From</option>
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="mileage_to" id="mileage_to" class="form-select">
                                                <option value="">To</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                     

                                <div class="col-12 pt-3">
                                    <h4 class="card-title ">Secondry</h4>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="Fuel Type" class="form-label">Fuel Type</label>
                                    <select name="fuel_type" class="form-select" >
                                        <option value="">Select Fuel Type</option>
                                        @foreach ($fuel_types as $item)
                                            <option @if($item == old('fuel_type')) selected @endif value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">CC</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <select name="cc_from" class="form-select">
                                                <option value="">From</option>
                                                @foreach($cc as $c)
                                                    <option @if(old('cc_from') == $c) selected @endif value="{{ $c }}">{{$c}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="cc_to" class="form-select">
                                                <option value="">To</option>
                                                @foreach($cc as $c)
                                                    <option @if(old('cc_to') == $c) selected @endif value="{{$c}}">{{$c}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Price (CAP Clean)</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <select name="price_from" id="price_from" class="form-select">
                                                <option value="">From</option>
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="price_to" id="price_to" class="form-select">
                                                <option value="">To</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="transmission" class="form-label">Transmission</label>
                                    <select name="transmission" class="form-select">
                                        <option value="">Select Transmission</option>
                                        @foreach ($transmission as $item)
                                            <option @if(old('transmission') == $item) selected @endif value="{{$item}}">{{$item}}</option>
                                        @endforeach                    
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="grade" class="form-label">Grade</label>
                                    <select name="grade" class="form-select">
                                        <option value="">Select Grade</option>
                                        @foreach ($grade as $item)
                                                 <option @if(old('grade') == $item) selected @endif value="{{$item}}">{{$item}}</option>
                                        @endforeach                    
                                    </select>
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

$(document).ready(function() {
    $('#model_id, #variant_id').prop('disabled', true);
    $('#make_id').select2({
        placeholder: 'Select Make',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/makes/getMakes') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return { results: data.results };
            }
        }
    }).on('change', function() {
        const hasMake = !!$(this).val();
        $('#model_id').val(null).trigger('change').prop('disabled', !hasMake);
        $('#variant_id').val(null).trigger('change').prop('disabled', true);
    });

    $('#model_id').select2({
        placeholder: 'Select Model',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/models/getModels') }}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    make_id: $('#make_id').val()
                };
            },
            processResults: function(data) {
                return { results: data.results };
            }
        }
    }).on('change', function() {
        const hasModel = !!$(this).val();
        $('#variant_id').val(null).trigger('change').prop('disabled', !hasModel);
    });

    $('#variant_id').select2({
        placeholder: 'Select Variant',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/variants/getVariants') }}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    model_id: $('#model_id').val()
                };
            },
            processResults: function(data) {
                return { results: data.results };
            }
        }
    });
});


   
document.addEventListener('DOMContentLoaded', function () {

    const priceFrom = document.getElementById('price_from');
    const priceTo = document.getElementById('price_to');

    // get price step & max from environment or default
    const priceStep = 500;
    const maxPrice = 100000;

    const priceSteps = [];
    for (let i = 0; i <= maxPrice; i += priceStep) {
        priceSteps.push(i);
    }

    // helper function for formatting with £ and commas
    function formatPrice(p) {
        return `£${p.toLocaleString()}`;
    }

    // populate both selects
    priceSteps.forEach((price, index) => {
        const nextVal = price + 1; // like 501, 1001...
        const label = index === 0 ? formatPrice(price) : formatPrice(nextVal);
        priceFrom.insertAdjacentHTML('beforeend', `<option value="${nextVal}">${label}</option>`);
        priceTo.insertAdjacentHTML('beforeend', `<option value="${nextVal}">${label}</option>`);
    });

    // when price_from changes, filter price_to
    priceFrom.addEventListener('change', function () {
        const fromVal = parseInt(this.value) || 0;
        priceTo.innerHTML = '<option value="">To</option>';
        priceSteps
            .filter(p => p > fromVal)
            .forEach(p => {
                const val = p + 1;
                priceTo.insertAdjacentHTML('beforeend', `<option value="${val}">£${val.toLocaleString()}</option>`);
            });
    });

    const mileageFrom = document.getElementById('mileage_from');
    const mileageTo = document.getElementById('mileage_to');

    const mileageSteps = [];
    for (let i = 100; i <= 990000; i += 5000) {
        mileageSteps.push(i);
    }

    mileageSteps.forEach(m => {
        mileageFrom.insertAdjacentHTML('beforeend', `<option value="${m}">${m.toLocaleString()} km</option>`);
        mileageTo.insertAdjacentHTML('beforeend', `<option value="${m}">${m.toLocaleString()} km</option>`);
    });

    mileageFrom.addEventListener('change', function () {
        const fromVal = parseInt(this.value) || 0;
        mileageTo.innerHTML = '<option value="">To</option>';
        mileageSteps
            .filter(m => m > fromVal)
            .forEach(m => {
                mileageTo.insertAdjacentHTML('beforeend', `<option value="${m}">${m.toLocaleString()} km</option>`);
            });
    });

});

</script>

@endsection
