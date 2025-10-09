<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label" >Plan Name</label>
            <input type="text" name="plan_name" class="form-control" value="{{ old('plan_name', $plan->plan_name ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
             <label class="form-label">Short Description</label>
             <input type="text" name="short_desc" class="form-control" value="{{ old('short_desc', $plan->short_desc ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
             <label class="form-label">Price</label>
             <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $plan->price ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
             <label class="form-label">Duration Unit</label>
            <select name="duration_unit" class="form-control" required>
                <option value="">Select</option>
                <option value="day" {{ (old('duration_unit', $plan->duration_unit ?? '') == 'day') ? 'selected' : '' }}>Day</option>
                <option value="month" {{ (old('duration_unit', $plan->duration_unit ?? '') == 'month') ? 'selected' : '' }}>Month</option>
                <option value="year" {{ (old('duration_unit', $plan->duration_unit ?? '') == 'year') ? 'selected' : '' }}>Year</option>
            </select>
        </div>
    </div>
     <div class="col-md-4">
        <div class="form-group">
             <label class="form-label">Duration Value</label>
            <input type="number" name="duration_value" class="form-control" value="{{ old('duration_value', $plan->duration_value ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-4 mt-3">
        <div class="form-group">
            <label class="form-label">Plan Type</label>
            <select name="is_officer" class="form-control">
                <option value="0" {{ (old('is_officer', $plan->is_officer ?? 0) == 0) ? 'selected' : '' }}>Simple</option>
                <option value="1" {{ (old('is_officer', $plan->is_officer ?? 0) == 1) ? 'selected' : '' }}>Discount / Officer</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
             <label class="form-label">Description</label>
             <textarea name="description" class="form-control">{{ old('description', $plan->description ?? '') }}</textarea>
        </div>
    </div>
</div>


