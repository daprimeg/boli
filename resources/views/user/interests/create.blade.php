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
                                <h5 class="card-title">Edit Interest</h5>
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
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" value="{{old('title')}}" name="title" class="form-control" required>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="make_id" class="form-label">Make <span class="text-danger">*</span></label> <br>
                                    <select name="make_id" class="form-control form-select" required>
                                       
                                    </select>
                                </div>          

                                <div class="mb-3 col-md-4">
                                    <label for="model_id" class="form-label">Model <span class="text-danger">*</span></label> <br>
                                    <select name="model_id" class="form-select form-control" required>
                                        
                                    </select>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label for="model_variant_id" class="form-label">Model Variant <span class="text-danger">*</span></label> <br>
                                    <select name="variant_id" class="form-select form-control" required>
                                       
                                    </select>
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
                                            <input name="mileage_from" value="{{old('mileage_from')}}" step="any" placeholder="From" type="number" class="form-control"  />
                                        </div>
                                        <div class="box w-100">
                                            <input name="mileage_to" value="{{old('mileage_to')}}" step="any" placeholder="To" type="number" class="form-control"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="platform_id" class="form-label">Auction House</label>
                                    <select name="platform_id" class="form-select platform" >
                                      
                                    </select>
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
                                    <label class="form-label">Price</label>
                                    <div class="d-flex">
                                        <div class="box w-100">
                                            <input name="price_from" value="{{old('price_from')}}" step="any" placeholder="From" type="number" class="form-control"  />
                                        </div>
                                        <div class="box w-100">
                                            <input name="price_to" step="any" value="{{old('price_to')}}" placeholder="To" type="number" class="form-control"  />
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

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Former Keepers</label>
                                    <input type="number" value="{{old('former_keeper')}}" name="former_keeper" class="form-control">
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
            dataType: 'json',
            
        }
    }).on('change', function () {

        $('select[name=model_id]').val(null).trigger('change');
        $('select[name=variant_id]').val(null).trigger('change');
        
    });


    $('select[name=model_id]').select2({
        placeholder: 'Select Model',
        allowClear: true,
        ajax: {
            url: "{{url('/admin/masters/models/getModels')}}",
            dataType: 'json',
            data: function (params) {
                return {
                    q: params.term, // search term
                    make_id: $('select[name=make_id]').val()
                };
            }
        }
    }).on('change', function () {
        $('select[name=variant_id]').val(null).trigger('change');
    });
    
    $('select[name=variant_id]').select2({
        placeholder: 'Select Variant',
        allowClear: true,
        ajax: {
            url: "{{url('/admin/masters/variants/getVariants')}}",
            dataType: 'json',
            data: function (params) {
                return {
                    q: params.term, // search term
                    model_id: $('select[name=model_id]').val()
                };
            }
        }
    });


    $('select[name=fuel_type]').change(function (e) { 

        if($(this).val() == 'Electric'){   
            $('select[name=cc_from]').parent().parent().parent().hide();
            $('select[name=cc_from]').val('');
            $('select[name=cc_to]').val('');

        }else{
            $('select[name=cc_from]').parent().parent().parent().show();
        }
    }).trigger('change');

    



</script>

@endsection
