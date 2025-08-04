    {{-- Sidebar Filters --}}
<div class="filters-sidebar border-end  text-white py-3" style="background-color: #0f1c2c; width: 281px; z-index: 1;">

    <div class="d-flex justify-content-between align-items-center pt-7 px-3">
        <span class="mb-0" style=" font-size: 15px">Filters</span>
        <a href="{{URL::to('/auction-finder/'.$vehicle->id)}}" class="btn" 
            style="text-decoration: underline; text-decoration-color: #07509a; font-size: 15px; margin-right: -20px;">Clear All</a> 
    </div>
    
    {{-- Example: Platform Filter --}}
    <div class="d-flex px-3">
        <div style="width: 100px;" class="">
                <select id="date_range" name="date_range" class="form-select">
                    <option selected value="">Date</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="last_week">Last Week</option>
                    <option value="last_month">Last Month</option>
                    <option  value="past_3_months">Past 3 Months</option>
                </select>
        </div>
        <div style="width: 100px;" class="">
                <select  class="form-control platform" name="platform_ids"></select>
        </div>
        <div style="width: 68px;text-align: center;align-self: center;" class="">
                <span class="total_count" style="font-size:15px; margin-right: -15px">0</span>
        </div>
    </div>

    {{-- Vehicle List --}}
    <div class="vehicle-list mt-4 ">
        <div class="form-group mt-4">    
                            
        </div>
    </div>
</div>
        
