@extends('user.partial.app')
@push('title')
    Compare
@endpush
@section('css')
<style>

#mileage_range_min::-webkit-slider-thumb,
#mileage_range_max::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 2px solid #fff;
    cursor: pointer;
    box-shadow: 0 0 2px rgba(0,0,0,0.5);
    transition: background 0.2s;
}


#mileage_range_min::-webkit-slider-thumb {
    background: #3b82f6;
}


#mileage_range_max::-webkit-slider-thumb {
    background: #f70000;
}


#mileage_range_min::-webkit-slider-thumb:hover {
    background: #60a5fa;
}
#mileage_range_max::-webkit-slider-thumb:hover {
    background: #ff4d4d;
}


#mileage_range_min::-moz-range-thumb {
    background: #3b82f6;
    border: none;
}
#mileage_range_max::-moz-range-thumb {
    background: #2563eb;
    border: none;
}
.select2-container--default .select2-selection--multiple {
    background-color: #1f2937;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    min-height: 40px; 
    padding: 5px 10px;
    color: #f3f4f6;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3b82f6; 
    color: white;
    border-radius: 0.4rem;
    padding: 2px 6px;
    margin-right: 4px;
    margin-top: 4px;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #fff;
    margin-right: 2px;
}

.select2-container--default .select2-selection--multiple .select2-search__field {
    color: #f3f4f6;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__display {

  padding-left: 15px !important;

}
.form-label.required::after {
    content: " *";
    color: red;
    font-weight: bold;
}



</style>
@endsection
@include('user.compare.customestyle')
@section('content')
    <div class="container-fluid container-p-y">
        <div class="row g-6">
            <div class="col-md-12">



                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card mb-10">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title ">Compare Filters</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row p-5">




                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label required" for="make_id">Make</label>
                            <select name="make_id" id="make_id" class="form-control make select2" required>
                                <option value="">Select Make</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label required" for="model_id">Model</label>
                            <select name="model_id" id="model_id" class="form-control model select2" required>
                                <option value="">Select Model</option>
                            </select>
                        </div>
                    </div>


                        <!-- Variant -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="variant_id">Variant</label>
                                <select name="variant_id" id="variant_id" class="form-control variants select2">
                                    <option value="">Select Variant</option>
                                </select>
                            </div>
                        </div>

                        <!-- Year -->
                        <div class="col-md-3 py-3">
                            <div class="form-group">
                                <label class="form-label" for="year">Year</label>
                                <select name="year" id="year" class="form-control select2">
                                    <option value="">Select Year</option>
                                    @foreach ($years as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <!-- Mileage -->
                    <div class="col-md-3 py-3">
                        <div class="form-group" style="position: relative;">
                            <label class="form-label" for="mileage_range" style="font-weight:600;color:#f3f4f6;">Mileage</label>
                            
            
                            <div style="display:flex;gap:0.5rem;align-items:center;margin-top:0.5rem;">
                                <input 
                                    type="number" 
                                    name="mileage_from" 
                                    id="mileage_from" 
                                    class="form-control" 
                                    placeholder="Min" 
                                    style="flex:1;padding:0.5rem 0.75rem;border-radius:0.5rem;border:1px solid #4b5563;background:#111827;color:#f3f4f6;font-weight:500;outline:none;"
                                >
                                <span style="color:#9ca3af;font-weight:600;">to</span>
                                <input 
                                    type="number" 
                                    name="mileage_to" 
                                    id="mileage_to" 
                                    class="form-control" 
                                    placeholder="Max" 
                                    style="flex:1;padding:0.5rem 0.75rem;border-radius:0.5rem;border:1px solid #4b5563;background:#111827;color:#f3f4f6;font-weight:500;outline:none;"
                                >
                            </div>

                        <div style="position:relative; height:40px;">
                    
                            <input 
                                type="range" 
                                id="mileage_range_max" 
                                min="0" max="500000" value="500000" step="1000"
                                style="position:absolute;top:14px;left:0;width:100%;-webkit-appearance:none;height:6px;border-radius:3px;background:#374151;cursor:pointer;z-index:2;"
                            >
                 
                            <input 
                                type="range" 
                                id="mileage_range_min" 
                                min="0" max="500000" value="0" step="1000"
                                style="position:absolute;top:14px;left:0;width:100%;-webkit-appearance:none;height:6px;border-radius:3px;background:#374151;cursor:pointer;z-index:1;"
                            >
                        </div>
                                <small style="color:#9ca3af;margin-top:0.25rem;display:block;">Select mileage range in kilometers</small>
                            </div>
                        </div>
                         <!-- Transmission -->
                        <div class="col-md-3 py-3">
                            <div class="form-group">
                                <label class="form-label" for="transmission">Transmission</label>
                                <select name="transmission" id="transmission" class="form-control select2">
                                    <option value="">Select Transmission</option>
                                    @foreach ($transmissions as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <!-- Fuel -->
                        <div class="col-md-3 py-3">
                            <div class="form-group">
                                <label class="form-label" for="fuel">Fuel</label>
                                <select name="fuel" id="fuel" class="form-control select2">
                                    <option value="">Select Fuel</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Electric">Electric</option>
                                </select>
                            </div>
                        </div>


                    <div class="col-md-3 py-3">
                        <div class="form-group">
                            <label class="form-label" for="grade">Grade</label>
                            <select name="grade" id="grade" class="form-control select2">
                                <option value="">Select Grade</option>
                                @foreach ($grades as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                        <!-- Auction -->
                    <div class="col-md-3 py-3">
                        <div class="form-group" style="position: relative;">
                            <label class="form-label" for="platform_id" style="">Auction House</label>
                            <select name="platform_id[]" 
                                    id="platform_id" 
                                    class="form-control platformhouse select2" 
                                    multiple="multiple" 
                                    style="width: 100%; padding: 0.4rem; border-radius: 0.5rem; border: 1px solid #d1d5db; background:#1f2937; color:#f3f4f6;" 
                                    required>
                            </select>
                            
                        </div>
                    </div>



                        <div class="col-md-3 py-3 align-self-end">
                            <button type="button" id="searchBtn"
                                class="btn btn-primary d-flex align-items-center justify-content-center"
                                style="font-size: 14px; padding: 6px 12px; border-radius: 6px; gap: 6px;">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>

                    </div>
                </div>


                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title ">Compare</h5>
                            </div>
                        </div>
                    </div>


                    <div class="container" style="width: 100%; max-width: 100%; padding: 0;">
                        <div class="table-section" style="width: 100%;">
                            <div class="table-container" style="width: 100%; overflow-x: auto;">
                                <table class="comparison-table" style="width: 100%; border-collapse: collapse;">
                                       <thead>
                                            <tr id="comparison-head"></tr>
                                        </thead>
                                     <tbody id="comparison-body"></tbody>
 
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    
@endsection

@section('js')
@include('user.compare.script')

@endsection
