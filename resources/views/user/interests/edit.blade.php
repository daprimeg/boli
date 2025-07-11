@include('user.partial.layout')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please fix the following errors:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">
    <h2>Edit Interest</h2>
    <form action="{{ route('interests.update', $interest->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title', $interest->title) }}" class="form-control" required>
            </div>

            <div class="mb-3 col-md-6">
                <label for="make_id" class="form-label">Make</label>
                <select id="make_id" name="make_id" class="form-control" required>
                    <option value="">Select Make</option>
                    @foreach($makes as $make)
                        <option value="{{ $make->id }}" {{ $interest->make_id == $make->id ? 'selected' : '' }}>{{ $make->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="model_id" class="form-label">Model</label>
                <select id="model_id" name="model_id" class="form-control" required>
                    <option value="">Select Model</option>
                    @foreach($models->where('make_id', $interest->make_id) as $model)
                        <option value="{{ $model->id }}" {{ $interest->model_id == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="model_variant_id" class="form-label">Model Variant</label>
                <select name="model_variant_id" id="model_variant_id" class="form-select" required>
                    <option value="">Select Variant</option>
                    @foreach($modelVariants->where('model_id', $interest->model_id) as $variant)
                        <option value="{{ $variant->id }}" {{ $interest->model_variant_id == $variant->id ? 'selected' : '' }}>{{ $variant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-3">
                <label for="year_from" class="form-label">Year From</label>
                <select name="year_from" class="form-select">
                    <option value="">Select Year From</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{ $interest->year_from == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-3">
                <label for="year_to" class="form-label">Year To</label>
                <select name="year_to" class="form-select">
                    <option value="">Select Year To</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{ $interest->year_to == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="transmission" class="form-label">Transmission</label>
                <select name="transmission" class="form-select">
                    <option value="">Select Transmission</option>
                    @foreach(['None', 'Auto Clutch', 'Auto/Manual Mode', 'Automatic', 'CVT', 'CVT/Manual Mode', 'Manual Transmission'] as $option)
                        <option value="{{ $option }}" {{ $interest->transmission == $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="engine_size_min" class="form-label">Engine Size Min</label>
                <input type="number" name="engine_size_min" value="{{ old('engine_size_min', $interest->engine_size_min) }}" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="engine_size_max" class="form-label">Engine Size Max</label>
                <input type="number" name="engine_size_max" value="{{ old('engine_size_max', $interest->engine_size_max) }}" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="mileage_max" class="form-label">Mileage Max</label>
                <input type="number" name="mileage_max" value="{{ old('mileage_max', $interest->mileage_max) }}" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="auction_house_id" class="form-label">Auction House</label>
                <select name="auction_house_id" class="form-select">
                    <option value="">Select Auction House</option>
                    @foreach($auctionHouses as $auctionHouse)
                        <option value="{{ $auctionHouse->id }}" {{ $interest->auction_house_id == $auctionHouse->id ? 'selected' : '' }}>{{ $auctionHouse->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="auction_grade_condition" class="form-label">Auction Grade Condition</label>
                <select name="auction_grade_condition" class="form-select">
                    <option value="">Select Grade</option>
                    @foreach(['1','2','3','4','5'] as $grade)
                        <option value="{{ $grade }}" {{ $interest->auction_grade_condition == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="previous_owners_max" class="form-label">Previous Owners Max</label>
                <input type="number" name="previous_owners_max" value="{{ old('previous_owners_max', $interest->previous_owners_max) }}" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="body_type_id" class="form-label">Body Type</label>
                <select name="body_type_id" class="form-select">
                    <option value="">Select Body Type</option>
                    @foreach($bodyTypes as $bodyType)
                        <option value="{{ $bodyType->id }}" {{ $interest->body_type_id == $bodyType->id ? 'selected' : '' }}>{{ $bodyType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="no_of_service_max" class="form-label">No. of Services Max</label>
                <input type="number" name="no_of_service_max" value="{{ old('no_of_service_max', $interest->no_of_service_max) }}" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="estimated_retail_value_min" class="form-label">Estimated Retail Value Min</label>
                <input type="number" name="estimated_retail_value_min" value="{{ old('estimated_retail_value_min', $interest->estimated_retail_value_min) }}" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="estimated_retail_value_max" class="form-label">Estimated Retail Value Max</label>
                <input type="number" name="estimated_retail_value_max" value="{{ old('estimated_retail_value_max', $interest->estimated_retail_value_max) }}" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('interests.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

{{-- JS for dependent dropdowns --}}
<script>
    $(document).ready(function () {
        $('#make_id').on('change', function () {
            const makeId = $(this).val();
            $('#model_id').html('<option>Loading...</option>');
            $.get('/autoboli/get-models-by-make?make_id=' + makeId, function (data) {
                let options = '<option value="">Select Model</option>';
                data.forEach(model => {
                    options += `<option value="${model.id}">${model.name}</option>`;
                });
                $('#model_id').html(options);
            });
        });

        $('#model_id').on('change', function () {
            const modelId = $(this).val();
            $('#model_variant_id').html('<option>Loading...</option>');
            $.get('/autoboli/get-variants-by-model?model_id=' + modelId, function (data) {
                let options = '<option value="">Select Variant</option>';
                data.forEach(variant => {
                    options += `<option value="${variant.id}">${variant.name}</option>`;
                });
                $('#model_variant_id').html(options);
            });
        });
    });
</script>

@include('user.partial.footer')
