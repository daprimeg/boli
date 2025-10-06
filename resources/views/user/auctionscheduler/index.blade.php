@extends('user.partial.app')
@push('title') Auction Finder @endpush
@section('css')
<style>

   .form-label{
      padding-top: 18px;
      padding-bottom: 6px;
      font-size: 15px;
   }

   .auction-tabs a{
      border: 1px solid #1b2737;
   }

   

   .auction-tabs .active{
      background: #0080ff;
   }

   .auction-tabs .active:hover{
      color: var(--bs-heading-color)!important;
   }

   .auction-tabs .active:focus{
      color: var(--bs-heading-color)!important;
   }
   .dataTables_length {
    display: none !important;
    }


    .select2-container--default .select2-selection--single {
        background: #1d2632 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 33px!important;
    }


    .centers{
        /* min-width: 400px; */
        display: flex;
        flex-wrap: wrap;
        overflow: hidden;
        height: 30px;
    }

     .centers:hover{
        min-width: auto;
        height: auto;
        overflow: inherit
    }

    
    .centers span{
        display: block;
        padding: 2px;
        color: var(--bs-heading-color);
        margin: 1px 2px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        background:var(--bs-primary) !important;
        border: none !important;
        opacity: 1 !important;
        color: var(--bs-heading-color) !important;
       font-size: var(--font-p1) !important;


     }

     .costome-slect .select2-selection__rendered{
        background: #0f1c2c !important;
     }
     .costome-slect .select2-selection__rendered{
        background: #0f1c2c !important;
     }

     .tb-data-fonts tr td{
          font-size: var(--font-p1) !important;
          color:  var(--bs-body-color) !important;


        }
     .tb-data-fonts .badge {
          font-size: var(--font-p2) !important;
          /* color:  var(--bs-body-color) !important; */
          color: black;
        }
        .bg-danger-red{
            background: red !important;
        }
        .centers span {
            color:var(--bs-body-color) !important;
        }
   
</style>
@endsection
@section('content')
    <div class="container-fluid" style="background: #0f1c2c; height: 100%;">
        <div class="row  container-fluid" style="padding-top: 20px" >
            <div class="col-md-12">
                 @if(session('success'))
                     <div class="alert alert-success">{{ session('success') }}</div>
                 @endif
            </div>
            <div class="col-12">
                <div class="row">
                       <div class="col-lg-12 col-xl-2 py-2">
                            <div class="form-group costome-slect">
                                <select name="platform_id" id="platform_id" class="form-control platform " >
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-2 py-2">
                            <div class="form-group costome-slect">
                                <select name="center_id" id="center_id" class="form-control center">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4 align-self-center py-2">
                                <div class="d-flex align-items-center">
                                    <select style="padding:3px; background:#0f1c2c;border:  1px solid var(--bs-b-color) !important;  border-radius: 4px;"  name="length" class="">
                                        <option value="10">10</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                    </select>
                                    <span class="pageinfo" style="font-size: 15px; padding-left: 6px; "></span>
                                </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4 py-2">
                            <div class="d-flex justify-content-end">
                                <div class="invoice_status">
                                    <select id="date_range" name="date_range" class="form-select">
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="last_week">Last Week</option>
                                        <option value="last_month">Last Month</option>
                                        <option selected value="past_3_months">Past 3 Months</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="padding: 10px ">
                        <div class="table-responsive text-nowrap" style="border-color: #1b2737 !important;">
                            <table class="table" style="border-color: #1b2737 !important;">
                                <thead>
                                    <tr >
                                        <th style="font-size: var(--font-p2) !important; ">Platform</th>
                                        <th style="font-size: var(--font-p2) !important; ">Center</th>
                                        <th style="font-size: var(--font-p2) !important; ">Total Vehicles</th>
                                        <th style="font-size: var(--font-p2) !important;">Time</th>
                                        <th style="font-size: var(--font-p2) !important; ;">Status</th>
                                        <th style="font-size: var(--font-p2) !important; ;">Interest</th>
                                        <th style="font-size: var(--font-p2) !important; ">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="table-border-bottom-0 tb-data-fonts" style="border-color: #1b2737"></tbody>
                            </table>
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
                <!-- dynamically fill -->
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

        let auctionId   = el.dataset.auctionId;
        let interestId  = el.dataset.interestId || el.dataset.interestIds; 
        let auctionName = el.dataset.platform;
        let platformId  = el.dataset.platformId; 

        // Title set karo
        $(".vehicleName").html(auctionName);

        // Loading row
        $("#vehicleModalTableBody").html("<tr><td colspan='5'>Loading...</td></tr>");

        // AJAX request
        $.ajax({
            url: "{{ url('auction/intrest') }}", 
            type: "POST",
            data: { 
                   auction_id: auctionId,
                interest_id: interestId,
                platform_id: platformId,   // 👈 yahan bhej do
                _token: "{{ csrf_token() }}" 
            },
            dataType: "json",
                success: function(data) {
                    let rows = "";
                    if (data.length > 0) {
                        data.forEach(function(item, index) {
                            let make    = item.make_id ?? "";
                            let model   = item.model_id ?? "";
                            let variant = item.variant_id ?? "";
                            let platform = item.platform_id ?? "";

                            let viewUrl = `/autoboli/auction-finder?make=${make}&model=${model}&variant=${variant}&platform=${platform}`;

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
                $("#vehicleModalTableBody").html("<tr><td colspan='5'>Error loading data</td></tr>");
            }
        });

        // Modal show
        let modal = new bootstrap.Modal(document.getElementById("vehicleModal"));
        modal.show();
    }
});
</script>




    <script>
        
        $(document).ready(function () {

             let table = $('.table').DataTable({
                    processing: true,
                    serverSide: true,
                     ordering: false,
                    ajax:{
                        url: "{{ url('auctionscheduler') }}",
                        data:function (d){

                            d.platform_id = $('#platform_id').val();
                            d.center_id = $('#center_id').val();
                            d.date_range = $('select[name=date_range]').val();

                        }
                    },
                });
                      
                  
                table.on('draw.dt', function () {
                    var info = table.page.info();
                    $('.pageinfo').html(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
                });

                 $('select[name=center_id]').change(function (e) { 
                       table.search(this.value).draw();
                 });

                 $('select[name=platform_id]').change(function (e) { 
                       table.search(this.value).draw();
                 });

                 $('select[name=date_range]').change(function (e) { 
                       table.search(this.value).draw();
                 });

                $("input[name='search']").on('keyup change', function () {
                    table.search(this.value).draw();
                });

                $("select[name='length']").on('change', function () {
                    const length = $(this).val();
                    table.page.len(length).draw();
                }).trigger('change');

                 $('#searchBtn').on('click', function() {
                   table.ajax.reload();
                });   


                $('select[name=platform_id]').select2({
                    placeholder: 'Select Platform',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/platforms/getPlatforms')}}",
                        dataType: 'json',
                    }
                }).on('change', function () {
                    // $('select[name=center_id]').val(null).trigger('change');
                });


                $('select[name=center_id]').select2({
                    placeholder: 'Select Center',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/centers/getCenters')}}",
                        dataType: 'json',
                        data: function (params) {
                            return {
                                q: params.term,
                                // platform_id: $('select[name=platform_id]').val()
                            };
                        }
                    }
                }).on('change', function () {
                 
                });

    });



$(document).on("click", ".alert-btn", function () {
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
        success: function (response) {
            if (response.success) {
                toastr.success(response.message);
            } else {
                toastr.warning(response.message);
            }
        },
        error: function () {
            toastr.error("Something went wrong, please try again.");
        }
    });
});


    

</script>



@endsection







