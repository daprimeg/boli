 <div class="row">
    <div class="col-12 pt-3">
         <h4 class="card-title ">Vehicle</h4>
    </div>
     <div class="col-md-4">
        <div class="form-group">
            <label class="form-label" >Title <span class="text-danger" >*</span></label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', isset($vehicle) ? $vehicle->title : '') }}">
        </div>
    </div>
        <div class="col-md-4">
                            <label class="form-label">Vehicle Type <span class="text-danger" >*</span></label>
                                <select name="vehicle_type_id" class="form-control" required>
                            @foreach($vehicleTypes as $id => $name)
                             <option value="{{ $id }}"
                              {{ old('vehicle_type_id', $vehicle->vehicle_type_id ?? '') == $id ? 'selected' : '' }}>
                           {{ $name }}
                           </option>
                             @endforeach
                               </select>
                         </div>
                            <div class="col-md-4">
                                <label class="form-label">Make <span class="text-danger" >*</span></label>
                                <select name="make_id" class="form-control make" required>
                                    @foreach($makes as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('make_id', $vehicle->make_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="col-md-4">
                                <label class="form-label">Model <span class="text-danger" >*</span></label>
                                <select name="model_id" class="form-control model" required>
                                    @foreach($models as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('model_id', $vehicle->model_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Variant <span class="text-danger" >*</span></label>
                                <select name="variant_id" class="form-control" required>
                                    @foreach($variants as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('variant_id', $vehicle->variant_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Body Type <span class="text-danger" >*</span></label>
                                <select name="body_type_id" class="form-control" required>
                                    @foreach($bodyTypes as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('body_type_id', $vehicle->body_type_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                     <label class="form-label">yaer</label>
                                      <input type="text" name="year" class="form-control" value="{{ old('year', $vehicle->year ?? '') }}">
                            </div>
<div class="col-md-4">
        <label class="form-label">VIN</label>
        <input type="text" name="vin" class="form-control" value="{{ old('vin_no', $vehicle->vin ?? '') }}">
</div>
<div class="col-md-12">
     <label class="form-label">Images</label>
     <textarea name="imported" rows="6" class="form-control " >{{ old('images', $vehicle->images ?? '') }}</textarea>
</div>
</div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
</div>
<div class="row">
     <div class="col-12 pt-3">
         <h4 class="card-title ">Specification</h4>
    </div> 
    <div class="col-md-4">
         <label class="form-label">Doors</label>
         <input type="text" name="doors" class="form-control" value="{{ old('doors', $vehicle->doors ?? '') }}">
    </div>
<div class="col-md-4">
    <label class="form-label">Seats</label>
    <input type="text" name="seats" class="form-control" value="{{ old('seats   ', $vehicle->seats ?? '') }}">
</div>
    
<div class="col-md-4">
    <label class="form-label">Fuel Type</label>
    <input type="text" name="fuel_type" class="form-control" value="{{ old('fuel_type', $vehicle->fuel_type ?? '') }}">
</div>
 <div class="col-md-4">
    <label class="form-label">Transmission</label>
    <input type="text" name="transmission" class="form-control" value="{{ old('transmission', $vehicle->transmission ?? '') }}">
</div>
    <div class="col-md-4">
      <label class="form-label">CC</label>
       <input type="text" name="cc" class="form-control" value="{{ old('cc', $vehicle->cc ?? '') }}">
    </div>
        <div class="col-md-4">
                      <label class="form-label">Color</label>
                        <select name="color" class="form-control">
                             @foreach($colors as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ old('color', $vehicle->color ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                              @endforeach
                         </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Keys</label>
        <input type="text" name="keys" class="form-control" value="{{ old('keys', $vehicle->keys ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Euro Status</label>
        <input type="text" name="euro_status" class="form-control" value="{{ old('euro_status', $vehicle->euro_status ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">DOR (Date of Registration)</label>
        <input type="date" name="dor" class="form-control" value="{{ old('dor', $vehicle->dor ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Registration</label>
        <input type="text" name="reg" class="form-control" value="{{ old('reg', $vehicle->reg ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Former Keepers</label>
        <input type="number" name="former_keepers" class="form-control" value="{{ old('former_keepers', $vehicle->former_keepers ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Mileage</label>
        <input type="text" name="mileage" class="form-control" value="{{ old('mileage', $vehicle->mileage ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Mileage Warranted</label>
        <input type="text" name="mileage_warranted" class="form-control" value="{{ old('mileage_warranted', $vehicle->mileage_warranted ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">MOT Expiry Date</label>
        <input type="date" name="mot_expiry_date" class="form-control" value="{{ old('mot_expiry_date', $vehicle->mot_expiry_date ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">MOT Due</label>
        <input type="date" name="mot_due" class="form-control" value="{{ old('mot_due', $vehicle->mot_due ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">V5</label>
        <input type="text" name="v5" class="form-control" value="{{ old('v5', $vehicle->v5 ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Engine Runs</label>
        <input type="text" name="engine_runs" class="form-control" value="{{ old('engine_runs', $vehicle->engine_runs ?? '') }}">
    </div>
    </div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
    </div>
<div class="row">
     <div class="col-12 pt-3">
         <h4 class="card-title ">Service History</h4>
    </div>

    <div class="col-md-4">
        <label class="form-label">Service History</label>
        <input type="text" name="service_history" class="form-control" value="{{ old('service_history', $vehicle->service_history ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">No Of Service</label>
        <input type="text" name="no_of_services" class="form-control" value="{{ old('no_of_services', $vehicle->no_of_services ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Last Service</label>
        <input type="text" name="last_service" class="form-control" value="{{ old('last_service', $vehicle->last_service ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Last Service Mileage</label>
        <input type="text" name="last_service_mileage" class="form-control" value="{{ old('last_service_mileage', $vehicle->last_service_mileage ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">DVSA Mileage</label>
        <input type="text" name="dvsa_mileage" class="form-control" value="{{ old('dvsa_mileage', $vehicle->dvsa_mileage ?? '') }}">
    </div>
    <div class="col-md-12">
        <label class="form-label">Service Note</label>
        <textarea name="service_notes" class="form-control">{{ old('service_notes', $vehicle->service_notes ?? '') }}</textarea>
    </div>
</div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-3">
         <h4 class="card-title ">Condition</h4>
    </div>
    <div class="col-md-4">
        <label class="form-label">Grade</label>
        <input type="text" name="grade" class="form-control" value="{{ old('grade', $vehicle->grade ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Inspection Report</label>
        <input type="text" name="inspection_report" class="form-control" value="{{ old('inspection_report', $vehicle->inspection_report ?? '') }}">
    </div>
     <div class="col-md-4">
        <label class="form-label">Other Report</label>
        <input type="text" name="other_report" class="form-control" value="{{ old('other_report', $vehicle->other_report ?? '') }}">
    </div>   
    <div class="col-md-4">
        <label class="form-label">Inspection Date</label>
        <input type="date" name="inspection_date" class="form-control" value="{{ old('inspection_date', $vehicle->inspection_date ?? '') }}">
    </div>
</div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-3">
         <h4 class="card-title ">Pricing</h4>
    </div>
    <div class="col-md-4">
        <label class="form-label">Bidding History</label>
        <input type="text" name="bidding_history" class="form-control" value="{{ old('bidding_history', $vehicle->bidding_history ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Last Bid</label>
        <input type="text" name="last_bid" class="form-control" value="{{ old('last_bid', $vehicle->last_bid ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Bidding Status</label>
        <input type="text" name="bidding_status" class="form-control" value="{{ old('bidding_status', $vehicle->bidding_status ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">CAP New</label>
        <input type="text" name="cap_new" class="form-control" value="{{ old('cap_new', $vehicle->cap_new ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">CAP Retails</label>
        <input type="text" name="cap_new" class="form-control" value="{{ old('cap_new', $vehicle->cap_new ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">CAP Clean</label>
        <input type="text" name="cap_clean" class="form-control" value="{{ old('cap_clean', $vehicle->cap_clean ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">CAP Average</label>
        <input type="text" name="cap_average" class="form-control" value="{{ old('cap_average', $vehicle->cap_average ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">CAP Below</label>
        <input type="text" name="cap_below" class="form-control" value="{{ old('cap_below', $vehicle->cap_below ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Glass New</label>
        <input type="text" name="glass_new" class="form-control" value="{{ old('glass_new', $vehicle->glass_new ?? '') }}">
    </div>


    <div class="col-md-4">
        <label class="form-label">Glass Retail</label>
        <input type="text" name="glass_retail" class="form-control" value="{{ old('glass_retail', $vehicle->glass_retail ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Glass Trade</label>
        <input type="text" name="glass_trade" class="form-control" value="{{ old('glass_trade', $vehicle->glass_trade ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">AutoTrader Retail Value</label>
        <input type="text" name="autotrader_retail_value" class="form-control" value="{{ old('autotrader_retail_value', $vehicle->autotrader_retail_value ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">AutoTrader Trade Value</label>
        <input type="text" name="autotrader_trade_value" class="form-control" value="{{ old('autotrader_trade_value', $vehicle->autotrader_trade_value ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Buy Now Price</label>
        <input type="text" name="buy_now_price" class="form-control" value="{{ old('buy_now_price', $vehicle->buy_now_price ?? '') }}">
    </div>
</div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-3">
         <h4 class="card-title ">Tyres Condition</h4>
    </div>
    <div class="col-md-4">
        <label class="form-label">Tyres Condition</label>
        <input type="text" name="tyres_condition" class="form-control" value="{{ old('tyres_condition', $vehicle->tyres_condition ?? '') }}">
    </div>
</div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-3">
         <h4 class="card-title ">Features </h4>
    </div>
    <div class="col-md-12">
        <label class="form-label">Features</label>
        <textarea name="features" class="form-control">{{ old('features', $vehicle->features ?? '') }}</textarea>
    </div>
    <div class="col-md-12">
        <label class="form-label">Equipment</label>
        <textarea name="equipment" class="form-control">{{ old('equipment', $vehicle->equipment ?? '') }}</textarea>
    </div>
</div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-3">
         <h4 class="card-title ">More fields </h4>
    </div>
    <div class="col-md-12">
        <label class="form-label">Additional Information</label>
        <textarea name="additional_information" class="form-control">{{ old('additional_information', $vehicle->additional_information ?? '') }}</textarea>
    </div>
    <div class="col-md-4">
        <label class="form-label">Imported</label>
        <input type="text" name="imported" class="form-control" value="{{ old('imported', $vehicle->imported ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Declarations</label>
        <input type="text" name="declarations" class="form-control" value="{{ old('declarations', $vehicle->declarations ?? '') }}">
    </div>
</div>
<div class="row py-10">
    <div class="col-12">
        <p style="border-bottom: 1px solid #44485e" ></p>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-3">
         <h4 class="card-title ">DAMAGE REPORT </h4>
    </div>
 <div class="col-md-12">
        <label class="form-label">Damage  Images</label>
        <textarea name="damaged_images" class="form-control">{{ old('damaged_images', $vehicle->damaged_images ?? '') }}</textarea>
                           </div>
    <div class="col-md-12">
        <label class="form-label">Damage  Details</label>
        <textarea name="damage_details" class="form-control">{{ old('damage_details', $vehicle->damage_details ?? '') }}</textarea>
    </div>
    </div>



    {{-- <div class="col-md-4">
        <label class="form-label">Lot No</label>
        <input type="text" name="lot_no" class="form-control" value="{{ old('lot_no', $vehicle->lot_no ?? '') }}">
    </div>
     --}}




    {{-- <div class="col-md-4">
        <label class="form-label">Mileage Warranted</label>
        <input type="text" name="mileage_warranted" class="form-control" value="{{ old('mileage_warranted', $vehicle->mileage_warranted ?? '') }}">
    </div> --}}





    {{-- <div class="col-md-4">
        <label class="form-label">V5</label>
        <input type="text" name="v5" class="form-control" value="{{ old('v5', $vehicle->v5 ?? '') }}">
    </div> --}}

    {{-- <div class="col-md-4">
        <label class="form-label">VAT Status</label>
        <input type="text" name="vat_status" class="form-control" value="{{ old('vat_status', $vehicle->vat_status ?? '') }}">
    </div> --}}



    {{-- <div class="col-md-4">
        <label class="form-label">Number of Services</label>
        <input type="number" name="number_of_services" class="form-control" value="{{ old('number_of_services', $vehicle->number_of_services ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Number of Stamps</label>
        <input type="number" name="number_of_stamps" class="form-control" value="{{ old('number_of_stamps', $vehicle->number_of_stamps ?? '') }}">
    </div> --}}





    {{-- <div class="col-md-4">
        <label class="form-label">Other Report</label>
        <input type="text" name="other_report" class="form-control" value="{{ old('other_report', $vehicle->other_report ?? '') }}">
    </div> --}}



    {{-- <div class="col-md-4">
        <label class="form-label">Vendor</label>
        <input type="text" name="vendor" class="form-control" value="{{ old('vendor', $vehicle->vendor ?? '') }}">
    </div>

   


    <div class="col-md-4">
        <label class="form-label">Number of Services Details</label>
        <input type="text" name="number_of_services_details" class="form-control" value="{{ old('number_of_services_details', $vehicle->number_of_services_details ?? '') }}">
    </div> --}}











    {{-- <div class="col-md-4">
        <label class="form-label">Brakes</label>
        <input type="text" name="brakes" class="form-control" value="{{ old('brakes', $vehicle->brakes ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Hubs</label>
        <input type="text" name="hubs" class="form-control" value="{{ old('hubs', $vehicle->hubs ?? '') }}">
    </div> --}}








   


    {{-- <div class="col-md-4">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" value="{{ $vehicle->created_at ?? ''}}" disabled>
    </div>

    <div class="col-md-4">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" value="{{ $vehicle->updated_at ?? '' }}" disabled>
    </div> --}}

 
                      
