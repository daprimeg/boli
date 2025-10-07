<script>
$(document).ready(function() {

function loadComparisonHead(extraFilters = {}) {
    let filters = {
        make_id: $('#make_id').val(),
        model_id: $('#model_id').val(),
        variant_id: $('#variant_id').val(),
        year: $('#year').val(),
        mileage_from: $('#mileage_from').val(),
        mileage_to: $('#mileage_to').val(),
        transmission: $('#transmission').val(),
        fuel: $('#fuel').val(),
        grade: $('#grade').val(),
        platform_id: $('#platform_id').val(),
        ...extraFilters 
    };

    $.ajax({
        url: "{{ url('/compare/head') }}",
        type: "GET",
        data: filters,
        dataType: "json",
        success: function(response) {
            if (response.status === "error") {
                toastr.error(response.message);
                return;
            }

            let headRow = $('#comparison-head');
            headRow.empty();

            headRow.append(`<th style="min-width: 180px; padding: 10px; text-align: left;"></th>`);
            let vehicleIds = [];

            response.data.forEach(vehicle => {
                vehicleIds.push(vehicle.id); 
                let vehicleName = `${vehicle.make_name ?? ''} ${vehicle.model_name ?? ''} ${vehicle.variant_name ?? ''} ${vehicle.year ?? ''}`.trim();
                let firstImage = (vehicle.images?.split(',')[0] || 'no-image.jpg').trim();
                const baseUrl = "{{ asset('public/uploads/platforms/') }}/";
                const platformImage = vehicle.platform_image
                    ? `${baseUrl}${vehicle.platform_image}`
                    : "{{ asset('images/default-platform.png') }}";

                let selectorOptions = `<option value="">-- Select Other Vehicle --</option>`;
                if (vehicle.other_vehicles && vehicle.other_vehicles.length > 0) {
                    vehicle.other_vehicles.forEach(v => {
                        let img = v.images ? v.images.split(',')[0].trim() : '';
                        let text = `${v.make_name} ${v.model_name} ${v.variant_name ?? ''} (${v.year ?? ''})`;
                        selectorOptions += `<option value="${v.id}" data-auction="${vehicle.auction_id}" data-image="${img}">${text}</option>`;
                    });
                } else {
                    selectorOptions += `<option disabled>No other vehicles</option>`;
                }

                headRow.append(`
                    <th class="vehicle-header" style="min-width: 240px; padding: 12px; text-align: center; vertical-align: top;">
                        <div class="vehicle-card"
                            style="background: #03326a; color: #fff; border: 1px solid #1e293b; border-radius: 12px; padding: 14px;
                                    transition: all 0.25s ease; box-shadow: 0 2px 8px rgba(255,255,255,0.05); cursor: pointer;">
                            <div class="platform-info" style="display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 6px;">
                                <img src="${platformImage}" alt="Platform"
                                    style="width: 60px; height: 30px; object-fit: contain; border-radius: 6px; background-color: #fff; border: 1px solid #0ea5e9; padding: 4px;">
                                <span style="font-size: 13px; font-weight: 600;">${vehicle.platform_name ?? 'Unknown Platform'}</span>
                            </div>
                            <hr style="border: none; height: 1px; background-color: #0ea5e9; width: 70%; margin: 6px auto; opacity: 0.7;">
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px; margin: 12px 0; padding: 8px 10px; background: #03326a; border-radius: 1px; border: 1px solid ##03326a;">
                                <img src="${firstImage}" alt="${vehicleName}" style="width: 90px; height: 65px; object-fit: cover; border-radius: 6px; border: 1px solid #334155; background: #111827;">
                                <div style="flex: 1; text-align: left; color: #fff; font-size: 14px; font-weight: 600; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    ${vehicleName}
                                </div>
                            </div>
                            <div style="margin: 10px 0; text-align: left;">
                                <label style="display: block; font-size: 12px; font-weight: 500; color: #94a3b8; margin-bottom: 4px;">Other Similar Cars</label>
                                <select class="vehicle-selector"
                                    style="width: 100%; background-color: #0f172a; color: #e2e8f0; border: 1px solid #1e293b; border-radius: 6px; padding: 6px 8px; font-size: 12px; cursor: pointer;">
                                    ${selectorOptions}
                                </select>
                            </div>
                            <div style="display: flex; gap: 8px; justify-content: center; margin-top: 8px;">
                                <a href="${vehicle.inspection_report}" target="_blank"
                                    style="padding: 5px 12px; font-size: 12px; background-color: #dc2626; color: white; border: none; border-radius: 5px;">Report</a>
                                <a href="{{ url('/auction-finder/vehicle') }}/${vehicle.id}" target="_blank"
                                    style="padding: 5px 12px; font-size: 12px; background-color: #2563eb; color: white; border: none; border-radius: 5px;">View</a>
                            </div>
                        </div>
                    </th>
                `);
            });

          
            if (vehicleIds.length > 0) {
                loadComparisonBody(vehicleIds);
            }

         
            $('.vehicle-selector').each(function() {
                $(this).select2({
                    width: '100%',
                    templateResult: function(state) {
                        if (!state.id) return state.text; 
                        let img = $(state.element).data('image');
                        if (img) {
                            return $(`<span style="display:flex; align-items:center;"><img src="${img}" style="width:50px; height:auto; margin-right:8px; border-radius:4px;"> ${state.text}</span>`);
                        }
                        return state.text;
                    },
                    templateSelection: function(state) {
                        return state.text;
                    }
                });
            });

            
            $('.vehicle-selector').off('change').on('change', function() {
                const vehicleId = $(this).val();
                const auctionId = $(this).find(':selected').data('auction');
                if (vehicleId && auctionId) {
                    loadComparisonHead({
                        auction_id: auctionId,
                        vehicle_id: vehicleId
                    });
                }
            });
        },
        error: function(xhr) {
            let msg = xhr.responseJSON?.message || "Something went wrong";
            toastr.error(msg);
        }
    });
}





function loadComparisonBody(vehicleIds = []) {
    let body = $('#comparison-body');
    body.empty();

    if (vehicleIds.length === 0) {
        body.append('<tr><td colspan="100%" style="text-align:center; padding:20px; font-size:16px; color:red;">No Vehicles Selected</td></tr>');
        return;
    }

    $.ajax({
        url: "{{ url('/compare/body') }}",
        type: "POST",
        data: { vehicle_ids: vehicleIds, _token: "{{ csrf_token() }}" },
        success: function(response) {
            body.html(response.html);
        },
        error: function(xhr) {
            let msg = xhr.responseJSON?.message || "Something went wrong";
            toastr.error(msg);
        }
    });
}



$('#searchBtn').on('click', function() {
    let makeId = $('#make_id').val();
    let modelId = $('#model_id').val();

 
    if (!makeId || !modelId) {
        toastr.error('Please select both Make and Model before searching.');
        return; 
    }

    let filters = {
        make_id: makeId,
        model_id: modelId,
        variant_id: $('#variant_id').val(),
        year: $('#year').val(),
        mileage_from: $('#mileage_from').val(),
        mileage_to: $('#mileage_to').val(),
        transmission: $('#transmission').val(),
        fuel: $('#fuel').val(),
        grade: $('#grade').val(),
        platform_id: $('#platform_id').val(),
    };

    // 🔹 Load only head if make + model provided
    loadComparisonHead(filters);
});



 
    $('#make_id').on('change', function() {
        var makeId = $(this).val();
        $('#model_id').empty().append('<option value="">Select Model</option>');
        $('#variant_id').empty().append('<option value="">Select Variant</option>');

        if (makeId) {
            $.ajax({
                url: "{{ url('/get-models-variants') }}/" + makeId,
                type: 'GET',
                success: function(data) {
                    $.each(data.models, function(index, model) {
                        $('#model_id').append('<option value="' + model.id + '">' + model.name + '</option>');
                    });
                    $.each(data.variants, function(index, variant) {
                        $('#variant_id').append('<option value="' + variant.id + '">' + variant.name + '</option>');
                    });
                    $('#model_id').select2({ placeholder: 'Select Model', allowClear: true });
                    $('#variant_id').select2({ placeholder: 'Select Variant', allowClear: true });
                }
            });
        }
    });

});
</script>



<script>
const minInput = document.getElementById('mileage_from');
const maxInput = document.getElementById('mileage_to');
const rangeMin = document.getElementById('mileage_range_min');
const rangeMax = document.getElementById('mileage_range_max');


rangeMin.addEventListener('input', () => {
    minInput.value = rangeMin.value;
});

rangeMax.addEventListener('input', () => {
    maxInput.value = rangeMax.value;
});


minInput.addEventListener('input', () => {
    let val = parseInt(minInput.value) || 0;
    rangeMin.value = val;
});

maxInput.addEventListener('input', () => {
    let val = parseInt(maxInput.value) || 0;
    rangeMax.value = val;
});


</script>