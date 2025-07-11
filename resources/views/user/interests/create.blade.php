@include('user.partial.layout')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-4">
    <h2>Create Interest</h2>
    <form action="{{ route('interests.store') }}" method="POST">
        @csrf













            <div class="row">
            <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3 col-md-6">
                <label for="make_id" class="form-label">Make</label>
                <select id="make_id" name="make_id" class="form-control">
                    <option value="">Select Make</option>
                    @foreach($makes as $make)
                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                    @endforeach
                </select>
            </div>          

            <div class="mb-3 col-md-6">
                <label for="model_id" class="form-label">Model</label>
                <select id="model_id" name="model_id" class="form-control">
                    <option value="">Select Model</option>
                </select>
            </div> 

            <div class="mb-3 col-md-3">
                <label for="year_from" class="form-label">Year From</label>
                <select name="year_from" class="form-select" required>
                    <option value="">Select Year From</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-3">
                <label for="year_to" class="form-label">Year To</label>
                <select name="year_to" class="form-select" required>
                    <option value="">Select Year To</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="transmission" class="form-label">Transmission</label>
                <select name="transmission" class="form-select" required>
                    <option value="">Select Transmission</option>                    
                        <option value="None">None</option>
                        <option value="Auto Clutch">Auto Clutch</option> 
                        <option value="Auto/Manual Mode">Auto/Manual Mode</option> 
                        <option value="Automatic">Automatic</option> 
                        <option value="CVT">CVT</option> 
                        <option value="CVT/Manual Mode">CVT/Manual Mode</option>
                        <option value="Manual Transmission">Manual Transmission</option>                     
                </select>
            </div>

            

            <div class="mb-3 col-md-6">
                <label for="model_variant_id" class="form-label">Model Variant</label>
                <select name="model_variant_id" class="form-select" required>
                    <option value="">Select Variant</option>
                    {{-- Will be dynamically populated --}}
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="engine_size_min" class="form-label">Engine Size Min</label>
                <input type="number" name="engine_size_min" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="engine_size_max" class="form-label">Engine Size Max</label>
                <input type="number" name="engine_size_max" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="mileage_max" class="form-label">Mileage Max</label>
                <input type="number" name="mileage_max" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="auction_house_id" class="form-label">Auction House</label>
                <select name="auction_house_id" class="form-select" required>
                    <option value="">Select Auction House</option>
                    @foreach($auctionHouses as $auctionHouse)
                        <option value="{{ $auctionHouse->id }}">{{ $auctionHouse->name }}</option>
                    @endforeach
                </select>
            </div>



            <div class="mb-3 col-md-6">
                <label for="auction_grade_condition" class="form-label">Auction Grade Condition</label>
                <select name="auction_grade_condition" class="form-select" required>
                    <option value="">Select Grade</option>                    
                        <option value="1">1</option>
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                        <option value="4">4</option> 
                        <option value="5">5</option>                    
                </select>
            </div>






            <div class="mb-3 col-md-6">
                <label for="previous_owners_max" class="form-label">Previous Owners Max</label>
                <input type="number" name="previous_owners_max" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="body_type_id" class="form-label">Body Type</label>
                <select name="body_type_id" class="form-select" required>
                    <option value="">Select Body Type</option>
                    @foreach($bodyTypes as $bodyType)
                        <option value="{{ $bodyType->id }}">{{ $bodyType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="no_of_service_max" class="form-label">No. of Services Max</label>
                <input type="number" name="no_of_service_max" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="estimated_retail_value_min" class="form-label">Estimated Retail Value Min</label>
                <input type="number" name="estimated_retail_value_min" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="estimated_retail_value_max" class="form-label">Estimated Retail Value Max</label>
                <input type="number" name="estimated_retail_value_max" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('interests.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script>
$(document).ready(function () {
    $('#make_id').on('change', function () {
        let makeId = $(this).val();

        if (makeId) {
            $.ajax({
                url: '{{ route("get.models.by.make") }}',
                type: 'GET',
                data: { make_id: makeId },
                success: function (data) {
                    $('#model_id').empty().append('<option value="">Select Model</option>');
                    $.each(data, function (key, value) {
                        $('#model_id').append(`<option value="${value.id}">${value.name}</option>`);
                    });
                },
                error: function(xhr) {
                    console.log("AJAX Error: ", xhr.responseText);
                }
            });
        } else {
            $('#model_id').empty().append('<option value="">Select Model</option>');
        }
    });
});


$('#model_id').on('change', function () {
    var modelId = $(this).val();
    if (modelId) {
        $.ajax({
            url: '{{ route("get.variants.by.model") }}', // define this route
            type: 'GET',
            data: { model_id: modelId },
            success: function (data) {
                $('select[name="model_variant_id"]').empty().append('<option value="">Select Variant</option>');
                $.each(data, function (key, value) {
                    $('select[name="model_variant_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    } else {
        $('select[name="model_variant_id"]').empty().append('<option value="">Select Variant</option>');
    }
});
</script>


@include('user.partial.footer')
