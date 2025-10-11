@extends('user.partial.app')
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
                               <h5 class="card-title">{{ isset($model) ? 'Edit' : 'Create' }} Interest</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{url('/interest')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                 
                        <form class="pt-4" action="{{ url('/interest/'.$model->id) }}" method="POST" enctype="multipart/form-data"  >
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-12 pt-3">
                                    <h4 class="card-title ">Primary</h4>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="title" class="form-label">Interest Title <span class="text-danger">*</span></label>
                                    <input type="text" value="{{$model->title}}" name="title" class="form-control" required>
                                </div>

                               <div class="mb-3 col-md-4">
                                    <label for="make_id" class="form-label">Make <span class="text-danger">*</span></label> <br>
                                    <select id="make_id" name="make_id" class="form-control form-select" required>
                                        @if($model->make)
                                            <option value="{{ $model->make_id }}" selected>{{ $model->make->name }}</option>
                                        @endif
                                    </select>
                                </div>          

                                <div class="mb-3 col-md-4">
                                    <label for="model_id" class="form-label">Model <span class="text-danger">*</span></label> <br>
                                    <select id="model_id" name="model_id" class="form-select form-control" required>
                                        @if($model->model)
                                            <option value="{{ $model->model_id }}" selected>{{ $model->model->name }}</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="variant_id" class="form-label">Model Variant <span class="text-danger">*</span></label> <br>
                                    <select id="variant_id" name="variant_id" class="form-select form-control">
                                        @if($model->variant)
                                            <option value="{{ $model->variant_id }}" selected>{{ $model->variant->name }}</option>
                                        @endif
                                    </select>
                                </div>


                                <div class="mb-3 col-md-4">
                                    <label for="year_from" class="form-label">Year</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <select name="year_from" class="form-select" >
                                                <option value="">From</option>
                                                @foreach($years as $year)
                                                    <option @if($model->year_from == $year) selected @endif value="{{$year}}">{{$year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="year_to" class="form-select" >
                                                <option value="">To</option>
                                                @foreach($years as $year)
                                                    <option @if($model->year_to == $year) selected @endif value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Mileage</label>
                                    <div class="d-flex gap-2">
                                        <select name="mileage_from" id="mileage_from" class="form-select">
                                            <option value="">From</option>
                                        </select>
                                        <select name="mileage_to" id="mileage_to" class="form-select">
                                            <option value="">To</option>
                                        </select>
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
                                            <option @if($item == $model->fuel_type) selected @endif value="{{$item}}">{{$item}}</option>
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
                                                    <option @if($model->cc_from == $c) selected @endif value="{{ $c }}">{{$c}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="box w-100">
                                            <select name="cc_to" class="form-select">
                                                <option value="">To</option>
                                                @foreach($cc as $c)
                                                    <option @if($model->cc_to == $c) selected @endif value="{{$c}}">{{$c}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Price (CAP Clean)</label>
                                    <div class="d-flex gap-2">
                                        <select name="price_from" id="price_from" class="form-select">
                                            <option value="">From</option>
                                        </select>
                                        <select name="price_to" id="price_to" class="form-select">
                                            <option value="">To</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="transmission" class="form-label">Transmission</label>
                                    <select name="transmission" class="form-select">
                                        <option value="">Select Transmission</option>
                                        @foreach ($transmission as $item)
                                            <option @if($model->transmission == $item) selected @endif value="{{$item}}">{{$item}}</option>
                                        @endforeach                    
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="grade" class="form-label">Grade</label>
                                    <select name="grade" class="form-select">
                                        <option value="">Select Grade</option>
                                        @foreach ($grade as $item)
                                                 <option @if($model->grade == $item) selected @endif value="{{$item}}">{{$item}}</option>
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

$(document).ready(function () {
    // Make
    $('#make_id').select2({
        placeholder: 'Select Make',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/makes/getMakes') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return { results: data.results };
            }
        }
    }).on('change', function () {
        $('#model_id').val(null).trigger('change');
        $('#variant_id').val(null).trigger('change');
    });

    // Model
    $('#model_id').select2({
        placeholder: 'Select Model',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/models/getModels') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                    make_id: $('#make_id').val()
                };
            },
            processResults: function (data) {
                return { results: data.results };
            }
        }
    }).on('change', function () {
        $('#variant_id').val(null).trigger('change');
    });

    // Variant
    $('#variant_id').select2({
        placeholder: 'Select Variant',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/variants/getVariants') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                    model_id: $('#model_id').val()
                };
            },
            processResults: function (data) {
                return { results: data.results };
            }
        }
    });

    // 👇 Already selected values ko Select2 initialize karne ke liye
    if ($('#make_id').find('option[selected]').length) {
        $('#make_id').trigger('change.select2');
    }
    if ($('#model_id').find('option[selected]').length) {
        $('#model_id').trigger('change.select2');
    }
    if ($('#variant_id').find('option[selected]').length) {
        $('#variant_id').trigger('change.select2');
    }
});



document.addEventListener('DOMContentLoaded', function () {

    /** --------------------------
     *  PRICE (CAP CLEAN)
     *  -------------------------- */
    const priceSteps = [];
    for (let i = 0; i <= 10000000; i += 
        i < 1000 ? 100 : 
        i < 10000 ? 500 : 
        i < 100000 ? 2000 : 
        i < 500000 ? 10000 : 50000
    ) {
        priceSteps.push(i);
    }

    const priceFrom = document.getElementById('price_from');
    const priceTo   = document.getElementById('price_to');

    const selectedPriceFrom = "{{ $model->price_from ?? '' }}";
    const selectedPriceTo   = "{{ $model->price_to ?? '' }}";

    priceFrom.innerHTML = '<option value="">From</option>';
    priceSteps.forEach(val => {
        priceFrom.insertAdjacentHTML('beforeend',
            `<option value="${val}" ${val == selectedPriceFrom ? 'selected' : ''}>${val.toLocaleString()}</option>`
        );
    });

    function updatePriceTo() {
        const fromVal = parseFloat(priceFrom.value) || 0;
        priceTo.innerHTML = '<option value="">To</option>';
        priceSteps.forEach(val => {
            if (val > fromVal) {
                priceTo.insertAdjacentHTML('beforeend',
                    `<option value="${val}" ${val == selectedPriceTo ? 'selected' : ''}>${val.toLocaleString()}</option>`
                );
            }
        });
    }

    priceFrom.addEventListener('change', updatePriceTo);
    updatePriceTo();


    /** --------------------------
     *  MILEAGE
     *  -------------------------- */
    const mileageSteps = [];
    for (let i = 0; i <= 990000; i += 
        i < 20000 ? 5000 : 
        i < 100000 ? 10000 : 50000
    ) {
        mileageSteps.push(i);
    }

    const mileageFrom = document.getElementById('mileage_from');
    const mileageTo   = document.getElementById('mileage_to');

    const selectedMileageFrom = "{{ $model->mileage_from ?? '' }}";
    const selectedMileageTo   = "{{ $model->mileage_to ?? '' }}";

    mileageFrom.innerHTML = '<option value="">From</option>';
    mileageSteps.forEach(val => {
        mileageFrom.insertAdjacentHTML('beforeend',
            `<option value="${val}" ${val == selectedMileageFrom ? 'selected' : ''}>${val.toLocaleString()} km</option>`
        );
    });

    function updateMileageTo() {
        const fromVal = parseFloat(mileageFrom.value) || 0;
        mileageTo.innerHTML = '<option value="">To</option>';
        mileageSteps.forEach(val => {
            if (val > fromVal) {
                mileageTo.insertAdjacentHTML('beforeend',
                    `<option value="${val}" ${val == selectedMileageTo ? 'selected' : ''}>${val.toLocaleString()} km</option>`
                );
            }
        });
    }

    mileageFrom.addEventListener('change', updateMileageTo);
    updateMileageTo();

});




</script>

@endsection
