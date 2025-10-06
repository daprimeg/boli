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
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <input name="mileage_from" value="{{$model->mileage_from}}" step="any" placeholder="From" type="number" class="form-control"  />
                                        </div>
                                        <div class="box w-100">
                                            <input name="mileage_to" value="{{$model->mileage_to}}" step="any" placeholder="To" type="number" class="form-control"  />
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
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <input name="price_from" value="{{$model->price_from}}" step="any" placeholder="From" type="number" class="form-control"  />
                                        </div>
                                        <div class="box w-100">
                                            <input name="price_to" step="any" value="{{$model->price_to}}" placeholder="To" type="number" class="form-control"  />
                                        </div>
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




</script>

@endsection
