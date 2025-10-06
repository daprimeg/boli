<script>
$(document).ready(function() {

function loadComparisonData(filters = {}) {
    $.ajax({
        url: "{{ url('/compare') }}",
        type: "GET",
        data: filters,
        dataType: "json",
        success: function(response) {
            let headRow = $('#comparison-head');
            let body = $('#comparison-body');

            headRow.empty();
            body.empty();

            headRow.append(`<th style="min-width: 180px; padding: 10px; text-align: left;"></th>`);

            let auctionsShown = {};
            response.data.forEach(vehicle => {
                if (!auctionsShown[vehicle.auction_id]) {
                    auctionsShown[vehicle.auction_id] = true;

             
                    let vehicleName = `${vehicle.make_name ?? ''} ${vehicle.model_name ?? ''} ${vehicle.year ?? ''}`.trim();

              
                    let imageList = [];
                    if (vehicle.images && typeof vehicle.images === 'string') {
                        imageList = vehicle.images.split(',').map(img => img.trim());
                    }

                    let firstImage = imageList.length > 0 ? imageList[0] : 'no-image.jpg'; 

                    headRow.append(`
                        <th class="vehicle-header" style="min-width: 200px; padding: 12px; text-align: center; vertical-align: top;">
                            <div class="vehicle-card" style="border: 1px solid #ddd; border-radius: 8px; padding: 10px; transition: transform 0.2s ease;">
                                <div class="card-content">
                                    <img src="${firstImage}" 
                                         alt="${vehicleName}" 
                                         style="height: 150px; object-fit: cover; border-radius: 6px; margin-bottom: 10px;">
                                    <div class="vehicle-name" style="font-size: 14px; font-weight: 600; white-space: nowrap;  margin-bottom: 6px;">
                                        ${vehicleName}
                                    </div>
                                    <span style="display: inline-block; font-size: 11px; padding: 3px 8px; border: 1px solid #0ea5e9; color: #0ea5e9; border-radius: 4px; margin-bottom: 8px;">
                                        ${vehicle.platform_name ?? 'Unknown Auction'}
                                    </span>
                                    <hr style="border: none; height: 2px; background-color: #0ea5e9; margin: 8px auto; width: 60%;">
                                    <div class="card-actions" style="display: flex; gap: 6px; justify-content: center;">
                                        <a href="${vehicle.inspection_report }"  target="_blank" style="padding: 5px 12px; font-size: 12px; background-color: #dc2626; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                            Report
                                        </a>
                                        <a href="{{ url('/auction-finder/vehicle') }}/${vehicle.id}"  target="_blank"
                                           style="padding: 5px 12px; font-size: 12px; background-color: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </th>
                    `);
                }
            });

            let attributes = [
                { section: 'Auc', label: 'Auction House', key: 'platform_name' },
                { section: 'Auc', label: 'Center', key: 'center_name' },
                { section: 'Auc', label: 'Auc Type', key: 'auction_type' },
                { section: 'Auc', label: 'Date & Time', key: 'auction_date' },
                { section: 'Valuation', label: 'Autoboli Suggested', key: 'autoboli_suggested' },
                { section: 'Valuation', label: 'Cap Clean', key: 'cap_clean' },
                { section: 'Valuation', label: 'Cap Avg', key: 'cap_avg' },
                { section: 'Valuation', label: 'Cap Blue', key: 'cap_blue' },
                { section: 'Auc Results', label: 'Starting Bid', key: 'start_bid' },
                { section: 'Auc Results', label: 'Last Bid', key: 'last_bid' },
                { section: 'Auc Results', label: 'Auc Status', key: 'bidding_status' },
                { section: 'Spec', label: 'Mileage', key: 'mileage' },
                { section: 'Spec', label: 'CC', key: 'cc' },
                { section: 'Spec', label: 'V5', key: 'v5' },
                { section: 'Spec', label: 'Last Service', key: 'last_service' },
                { section: 'Spec', label: 'Former Keeper', key: 'former_keepers' },
                { section: 'Spec', label: 'MOT Ex', key: 'mot_expiry_date' }
            ];

            if (response.data.length === 0) {
                body.append(`<tr><td colspan="100%" style="text-align:center; padding: 20px; font-size: 16px; color: red;">No Data Found</td></tr>`);
                return;
            }

            let lastSection = null;

            attributes.forEach(attr => {
                if (attr.section !== lastSection) {
                    lastSection = attr.section;
                    body.append(`
                        <tr style="background-color: #003366; color: white;">
                            <td colspan="${Object.keys(auctionsShown).length + 1}" style="font-weight: bold; padding: 10px; font-size: 16px;">
                                ${lastSection}
                            </td>
                        </tr>
                    `);
                }

                let row = `<tr><td class="row-label" style="padding: 10px; font-weight: bold; min-width: 180px;">${attr.label}</td>`;

                Object.keys(auctionsShown).forEach(auctionId => {
                    let vehicle = response.data.find(v => v.auction_id == auctionId);
                    let value = vehicle[attr.key] ?? 'N/A';
                    row += `<td class="cell-data" style="padding: 10px; min-width: 200px; text-align: center;">${value}</td>`;
                });

                row += `</tr>`;
                body.append(row);
            });
        }
    });
}




    $('#searchBtn').on('click', function() {
        let filters = {
            vehicle: $('#vehicle').val(),
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
        };

        let allEmpty = Object.values(filters).every(v => v === "" || v === null);
        if (allEmpty) {
            loadComparisonData();
        } else {
            loadComparisonData(filters);
        }
    });

    // Make → Model → Variant cascading
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