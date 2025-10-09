@extends('user.partial.app')
@push('title')
    Auction Scheduler
@endpush
@section('css')
    @include('user.auctionscheduler.style')
@endsection
@section('content')
<div class="autionshadular">
        <div class="py-5">
            <div class="tab-content my-4">
                <div class="tab-pane fade show active" id="tab1">


                    <div class="d-flex gap-4 align-items-center text-white my-4 container">


                        <div class="me-3">
                            <label style="color: #ccc; font-weight: 500;">Platform:</label>
                            <select id="selectedPlatform"
                                style="color: #fff; background-color: #1a2533; border: 1px solid #2b3b4f; border-radius: 6px; padding: 5px 10px;">
                                <option value="">Select Platform</option>
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Center -->
                        <div>
                            <label style="color: #ccc; font-weight: 500;">Center:</label>
                            <select id="selectedCenter"
                                style="color: #fff; background-color: #1a2533; border: 1px solid #2b3b4f; border-radius: 6px; padding: 5px 10px;">
                                <option value="">Select Center</option>
                                @foreach ($centers as $center)
                                    <option value="{{ $center->id }}">{{ $center->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Status -->
                        <div class="form-check form-switch d-flex align-items-center gap-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="selectedStatus"
                                style="width: 2.3rem; height: 1.3rem; cursor: pointer;"
                            />
                            <label
                                class="form-check-label text-light"
                                for="selectedStatus"
                                style="font-weight: 500; color: #ccc;"
                            >
                                In Progress
                            </label>
                            </div>


                    </div>

                
                    <div class="row">
                        <div class="tabs-container container"
                            style="
                            display: flex;
                            flex-wrap: wrap;
                            gap: 10px;
                            overflow-x: auto;
                            overflow-y: hidden;
                            padding-bottom: 10px;
                            scrollbar-width: thin;
                            scrollbar-color: #0d6efd #1a2533;
                        ">

                            @foreach ($days as $index => $day)
                                <button class="custom-tab flex-fill {{ $index === 0 ? 'active' : '' }}"
                                    data-date="{{ $day['date'] }}"
                                    style="
                                    background-color: {{ $index === 0 ? '#1a2533' : '#1b2737' }};
                                    border: 1px solid {{ $index === 0 ? '#0d6efd' : '#2b3b4f' }};
                                    color: #fff;
                                    padding: 10px 15px;
                                    border-radius: 10px;
                                    min-width: 120px;
                                    text-align: center;
                                    transition: all 0.3s ease;
                                    white-space: nowrap;
                                    font-weight: {{ $index === 0 ? '600' : '400' }};
                                ">
                                    <span style="display: block;">{{ $day['label'] }}</span>

                                    <div class="tab-numbers d-flex gap-3 align-items-center text-white"
                                        style="margin-top: 4px; justify-content: space-between !important;">
                                        <small class="d-flex align-items-center gap-1"
                                            style="font-size: 12px; color: #ccc;">
                                            <i class="fas fa-gavel text-primary"></i>
                                            {{ $day['auctions'] }} Auctions


                                        </small>
                                        <small class="d-flex align-items-center gap-1"
                                            style="font-size: 12px; color: #ccc;">
                                            <i class="fas fa-car text-info"></i>
                                            {{ $day['vehicles'] }} Vehicles
                                        </small>
                                    </div>
                                </button>
                            @endforeach

                        </div>

                        <!-- ✅ Add this hidden input right after tabs -->
                        <input type="hidden" id="selectedDate" value="{{ $days[0]['date'] ?? '' }}">
                    </div>



                    <div class="container-fluid" style="background: #0f1c2c; height: 100%;">
                        <div class="row container-fluid" style="padding-top: 20px;">
                            <div class="col-md-12">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="padding: 10px;">
                                        <div class="table-responsive text-nowrap" style="border-color: #1b2737 !important;">
                                            <table class="table" style="border-color: #1b2737 !important;">
                                                <thead>
                                                    <tr>
                                                        <th style="font-size: var(--font-p2) !important;">Platform</th>
                                                        <th style="font-size: var(--font-p2) !important;">Center</th>
                                                        <th style="font-size: var(--font-p2) !important;">Total Vehicles
                                                        </th>
                                                        <th style="font-size: var(--font-p2) !important;">Time</th>
                                                        <th style="font-size: var(--font-p2) !important;">Status</th>
                                                        <th style="font-size: var(--font-p2) !important;">Interest</th>
                                                        <th style="font-size: var(--font-p2) !important;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="table-border-bottom-0 tb-data-fonts"
                                                    style="border-color: #1b2737;">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="modal fade" id="vehicleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h4 class="mb-2">Vehicle Auction History</h4>
                        <h5 class="vehicleName"></h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Interest Name</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Variant</th>
                                    <th>Total Vehicles</th>
                                    <th>Your Interest Vehicles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="vehicleModalTableBody">

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("open-vehicle-modal")) {
                let el = e.target;
                let auctionId = el.dataset.auctionId;
                let interestId = el.dataset.interestId || el.dataset.interestIds;
                let auctionName = el.dataset.platform;
                let platformId = el.dataset.platformId;
                $(".vehicleName").html(auctionName);
                $("#vehicleModalTableBody").html("<tr><td colspan='5'>Loading...</td></tr>");
                $.ajax({
                    url: "{{ url('auction/intrest') }}",
                    type: "POST",
                    data: {
                        auction_id: auctionId,
                        interest_id: interestId,
                        platform_id: platformId,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        let rows = "";
                        if (data.length > 0) {
                            data.forEach(function(item, index) {
                                let make = item.make_id ?? "";
                                let model = item.model_id ?? "";
                                let variant = item.variant_id ?? "";
                                let platform = item.platform_id ?? "";
                                let viewUrl =
                                    `/autoboli/auction-finder?make=${make}&model=${model}&variant=${variant}&platform=${platform}`;
                                rows += `
                        <tr>
                            <td>${item.interest_name ?? '-'}</td>
                            <td>${item.make_name ?? '-'}</td>
                            <td>${item.model_name ?? '-'}</td>
                            <td>${item.variant_name ?? '-'}</td>
                            <td>${item.total_vehicles ?? 0}</td>
                            <td>${item.interest_vehicles ?? 0}</td>
                            <td>
                                <a href="${viewUrl}" target="_blank" class="btn btn-sm btn-primary">
                                    View
                                </a>
                            </td>
                        </tr>
                            `;
                            });
                        } else {
                            rows = "<tr><td colspan='7'>No history found</td></tr>";
                        }
                        $("#vehicleModalTableBody").html(rows);
                    },

                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error, xhr.responseText);
                        $("#vehicleModalTableBody").html(
                            "<tr><td colspan='5'>Error loading data</td></tr>");
                    }
                });
                let modal = new bootstrap.Modal(document.getElementById("vehicleModal"));
                modal.show();
            }
        });
    </script>




    <script>
    $(document).ready(function() {

        let table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: "{{ url('auctionscheduler') }}",
                data: function(d) {
                    d.platform_id = $('#selectedPlatform').val();
                    d.center_id = $('#selectedCenter').val();
                    d.status = $('#selectedStatus').is(':checked') ? 'In Progress' : '';
                    d.date = $('#selectedDate').val();
                }
            }
        });

        function reloadTable() {
            table.ajax.reload();
        }
        $('#selectedStatus').on('change', function() {
            const isChecked = $(this).is(':checked');

            if (isChecked) {
                const todayTab = $('.custom-tab').filter(function() {
                    return $(this).text().trim().toLowerCase().includes('today');
                });

                if (todayTab.length) {
                    $('.custom-tab').removeClass('active').css({
                        'background-color': '#1b2737',
                        'border': '1px solid #2b3b4f',
                        'font-weight': '400'
                    });

                    todayTab.addClass('active').css({
                        'background-color': '#1a2533',
                        'border': '1px solid #0d6efd',
                        'font-weight': '600'
                    });
                    const todayDate = new Date().toISOString().split('T')[0];
                    $('#selectedDate').val(todayDate);
                }
            } else {
                $('#selectedDate').val('');
            }

            reloadTable();
        });
        $('#selectedPlatform, #selectedCenter').on('change', function() {
            reloadTable();
        });
        $('.custom-tab').on('click', function(e) {
            const isInProgress = $('#selectedStatus').is(':checked');
            const tabText = $(this).text().trim().toLowerCase();

            if (isInProgress && !tabText.includes('today')) {
                e.preventDefault();
                toastr.error("You can only view 'Today' while In Progress is active.", "Not Allowed");
                return;
            }

            $('.custom-tab').removeClass('active').css({
                'background-color': '#1b2737',
                'border': '1px solid #2b3b4f',
                'font-weight': '400'
            });
            $(this).addClass('active').css({
                'background-color': '#1a2533',
                'border': '1px solid #0d6efd',
                'font-weight': '600'
            });

            $('#selectedDate').val($(this).data('date'));
            reloadTable();
        });
    });



        $(document).on("click", ".alert-btn", function() {
            let auctionId = $(this).data("auction");
            let platformId = $(this).data("platform");

            $.ajax({
                url: "{{ url('alert-platefrom/store') }}",
                type: "POST",
                data: {
                    auction_id: auctionId,
                    platform_id: platformId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
                error: function() {
                    toastr.error("Something went wrong, please try again.");
                }
            });
        });
    </script>
@endsection
