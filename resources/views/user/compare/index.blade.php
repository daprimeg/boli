@extends('admin.partial.app')
@push('title')
    Compare
@endpush
@section('css')
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
                                <label class="form-label" for="make_id">Make</label>
                                <select name="make_id" id="make_id" class="form-control make select2" required>
                                    <option value="">Select Make</option>
                                </select>
                            </div>
                        </div>




                        <!-- Model -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="model_id">Model</label>
                                <select name="model_id" id="model_id" class="form-control model select2">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="year">Year</label>
                                <select name="year" id="year" class="form-control select2">
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 1990; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Mileage -->
                        <div class="col-md-3 py-3">
                            <div class="form-group">
                                <label class="form-label" for="mileage">Mileage (km)</label>
                                <input type="number" name="mileage" id="mileage" class="form-control"
                                    placeholder="Enter Mileage">
                            </div>
                        </div>

                        <!-- Transmission -->
                        <div class="col-md-3 py-3">
                            <div class="form-group">
                                <label class="form-label" for="transmission">Transmission</label>
                                <select name="transmission" id="transmission" class="form-control select2">
                                    <option value="">Select Transmission</option>
                                    <option value="Automatic">Automatic</option>
                                    <option value="Auto/Manual Mode">Auto/Manual Mode</option>
                                    <option value="Manual Transmission">Manual Transmission</option>
                                    <option value="Auto Clutch">Auto Clutch</option>
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
                                <select name="grade" id="grade" class="form-control select2" required>
                                    <option value="">Select Grade</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <!-- Auction -->
                        <div class="col-md-3 py-3">
                            <div class="form-group">
                                <label class="form-label" for="auction_id">Auction</label>
                                <select name="auction_id" id="auction_id" class="form-control auctions select2" required>
                                    <option value="">Select Auction</option>
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
                                        <tr id="comparison-head">
                                            <th class="row-header">
                                                <p>Vehicle in Auctions</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="comparison-body">
                                    </tbody>
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
    <script>
        $(document).ready(function() {

            // Function to load data (all or filtered)
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

                        headRow.append(`
                    <th style="min-width: 180px; padding: 10px; text-align: left;"></th>
                `);


                        // response.data.forEach(vehicle => {
                        //     headRow.append(`
                    //         <th class="vehicle-header" style="min-width: 200px; padding: 10px; text-align: center;">
                    //             <div class="vehicle-card">
                    //                 <div class="card-content">
                    //                     <div class="vehicle-name" style="font-size:14px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:150px;">
                    //                         ${vehicle.title}
                    //                     </div>
                    //                     <span style="font-size: 10px; margin-top: 10px; margin-bottom: 2px;" class="badge">${vehicle.auction_name}</span>
                    //                     <hr style="border: none; height: 2px; background-color: skyblue; margin-top: 5px; width:50%;">
                    //                     <div class="card-actions" style="display: flex; gap: 5px; justify-content: center;">
                    //                         <button style="padding: 4px 10px; font-size: 13px; background-color: red; color: white; border: none; border-radius: 3px;">Report</button>
                    //                         <button style="padding: 4px 10px; font-size: 13px; background-color: #2563eb; color: white; border: none; border-radius: 3px;">View</button>
                    //                     </div>
                    //                 </div>
                    //             </div>
                    //         </th>
                    //     `);
                        // });

                        response.data.forEach(vehicle => {
                            headRow.append(`
                        <th class="vehicle-header" 
                            style="min-width: 200px; padding: 12px; text-align: center; vertical-align: top;">
                            <div class="vehicle-card" 
                                style="border: 1px solid #ddd; border-radius: 8px; padding: 10px; transition: transform 0.2s ease;">
                                <div class="card-content">
                                    <div class="vehicle-name" 
                                        style="font-size: 14px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 160px; margin-bottom: 6px;">
                                        ${vehicle.title}
                                    </div>
                                    <span style="display: inline-block; font-size: 11px; padding: 3px 8px; border: 1px solid #0ea5e9; color: #0ea5e9; border-radius: 4px; margin-bottom: 8px;">
                                        ${vehicle.auction_name}
                                    </span>
                                    <hr style="border: none; height: 2px; background-color: #0ea5e9; margin: 8px auto; width: 60%;">
                                    <div class="card-actions" 
                                        style="display: flex; gap: 6px; justify-content: center;">
                                        <button style="padding: 5px 12px; font-size: 12px; background-color: #dc2626; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                            Report
                                        </button>
                                        <button style="padding: 5px 12px; font-size: 12px; background-color: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </th>
                    `);
                        });




                        let attributes = [
                            // Auc Section
                            {
                                section: 'Auc',
                                label: 'Auction House',
                                key: 'platform_name'
                            },
                            {
                                section: 'Auc',
                                label: 'Center',
                                key: 'center_name'
                            },
                            {
                                section: 'Auc',
                                label: 'Auc Type',
                                key: 'auction_type'
                            },
                            {
                                section: 'Auc',
                                label: 'Date & Time',
                                key: 'auction_date'
                            },

                            // Valuation Section
                            {
                                section: 'Valuation',
                                label: 'Autoboli Suggested',
                                key: 'autoboli_suggested'
                            },
                            {
                                section: 'Valuation',
                                label: 'Cap Clean',
                                key: 'cap_clean'
                            },
                            {
                                section: 'Valuation',
                                label: 'Cap Avg',
                                key: 'cap_avg'
                            },
                            {
                                section: 'Valuation',
                                label: 'Cap Blue',
                                key: 'cap_blue'
                            },

                            // Auc Results Section
                            {
                                section: 'Auc Results',
                                label: 'Starting Bid',
                                key: 'start_bid'
                            },
                            {
                                section: 'Auc Results',
                                label: 'Last Bid',
                                key: 'last_bid'
                            },
                            {
                                section: 'Auc Results',
                                label: 'Auc Status',
                                key: 'bidding_status'
                            },

                            // Spec Section
                            {
                                section: 'Spec',
                                label: 'Mileage',
                                key: 'mileage'
                            },
                            {
                                section: 'Spec',
                                label: 'CC',
                                key: 'cc'
                            },
                            {
                                section: 'Spec',
                                label: 'V5',
                                key: 'v5'
                            },
                            {
                                section: 'Spec',
                                label: 'Last Service',
                                key: 'last_service'
                            },
                            {
                                section: 'Spec',
                                label: 'Former Keeper',
                                key: 'former_keepers'
                            },
                            {
                                section: 'Spec',
                                label: 'MOT Ex',
                                key: 'mot_expiry_date'
                            }
                        ];


                        if (response.data.length === 0) {
                            body.append(`
        <tr>
            <td colspan="100%" style="text-align:center; padding: 20px; font-size: 16px; color: red;">
                No Data Found
            </td>
        </tr>
    `);
                            return;
                        }

                        let lastSection = null;

                        attributes.forEach(attr => {
                            // If new section, insert a heading row
                            if (attr.section !== lastSection) {
                                lastSection = attr.section;
                                body.append(`
        <tr style="background-color: #003366; color: white;">
                <td colspan="${response.data.length + 1}" style="font-weight: bold; padding: 10px; font-size: 16px;">
                    ${lastSection}
                </td>
            </tr>
        `);
                            }

                            let row =
                                `<tr><td class="row-label" style="padding: 10px; font-weight: bold; min-width: 180px;">${attr.label}</td>`;

                            let priceKeys = ['cap_clean', 'last_bid', 'cap_avg', 'cap_blue',
                                'autoboli_suggested'
                            ];

                            if (priceKeys.includes(attr.key)) {
                                let values = response.data.map(v => parseFloat(v[attr.key]) ||
                                    0);
                                let minVal = Math.min(...values);
                                let maxVal = Math.max(...values);

                                response.data.forEach(vehicle => {
                                    let value = parseFloat(vehicle[attr.key]) || 0;
                                    let displayValue = vehicle[attr.key] ?? 'N/A';

                                    let bgColor = '';
                                    let labelText = '';

                                    if (value === 0 || value === null || isNaN(value)) {
                                        bgColor = '#87CEEB';
                                        labelText = 'Neutral';
                                    } else if (value === minVal) {
                                        bgColor = '#22c55e';
                                        labelText = 'Recommended';
                                    } else if (value === maxVal) {
                                        bgColor = '#ef4444';
                                        labelText = 'High Price';
                                    } else {
                                        bgColor = '#facc15';
                                        labelText = 'Average';
                                    }

                                    row += `
                <td class="cell-data" style="padding: 10px; min-width: 200px; text-align: center;">
                    <div style="display: inline-block; background-color: ${bgColor}; color: black; padding: 4px 10px; font-size: 12px; font-weight: 500; border-radius: 12px;">
                        ${displayValue} <small style="opacity: 0.8; color:black;">(${labelText})</small>
                    </div>
                </td>
            `;
                                });

                            } else {
                                response.data.forEach(vehicle => {
                                    let value = vehicle[attr.key] ?? 'N/A';
                                    row +=
                                        `<td class="cell-data" style="padding: 10px; min-width: 200px; text-align: center;">${value}</td>`;
                                });
                            }

                            row += `</tr>`;
                            body.append(row);
                        });


                    }
                });
            }



            loadComparisonData();

            $('#searchBtn').on('click', function() {
                let filters = {
                    vehicle: $('#vehicle').val(),
                    make_id: $('#make_id').val(),
                    model_id: $('#model_id').val(),
                    variant_id: $('#variant_id').val(),
                    year: $('#year').val(),
                    mileage: $('#mileage').val(),
                    transmission: $('#transmission').val(),
                    fuel: $('#fuel').val(),
                    grade: $('#grade').val(),
                    auction_id: $('#auction_id').val(),
                };


                let allEmpty = Object.values(filters).every(v => v === "" || v === null);
                if (allEmpty) {
                    loadComparisonData();
                } else {
                    loadComparisonData(filters);
                }
            });

        });





        $('#make_id').on('change', function() {
            var makeId = $(this).val();

            // Clear dropdowns before loading new data
            $('#model_id').empty().append('<option value="">Select Model</option>');
            $('#variant_id').empty().append('<option value="">Select Variant</option>');

            if (makeId) {
                $.ajax({
                    url: "{{ url('/get-models-variants') }}/" + makeId,
                    type: 'GET',
                    success: function(data) {
                        $.each(data.models, function(index, model) {
                            $('#model_id').append('<option value="' + model.id + '">' + model
                                .name + '</option>');
                        });
                        $.each(data.variants, function(index, variant) {
                            $('#variant_id').append('<option value="' + variant.id + '">' +
                                variant.name + '</option>');
                        });
                        $('#model_id').select2({
                            placeholder: 'Select Model',
                            allowClear: true
                        });

                        $('#variant_id').select2({
                            placeholder: 'Select Variant',
                            allowClear: true
                        });
                        if (data.models.length > 0) {
                            $('#model_id').val(data.models[0].id).trigger('change');
                        } else {
                            $('#model_id').val(null).trigger('change');
                        }
                        if (data.variants.length > 0) {
                            $('#variant_id').val(data.variants[0].id).trigger('change');
                        } else {
                            $('#variant_id').val(null).trigger('change');
                        }
                    }
                });
            } else {
                $('#model_id').val('').trigger('change');
                $('#variant_id').val('').trigger('change');
            }
        });
    </script>
@endsection
