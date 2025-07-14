@extends('admin.partial.app')
@push('title') Auction Finder @endpush
@section('css')
<style>

   .form-label{
      padding-top: 18px;
      padding-bottom: 6px;
      font-size: 15px;
   }

   .auction-tabs a{
      border: 1px solid var(--bs-border-color);
      background-color: var(--bs-paper-bg);
   }

   

   .auction-tabs .active{
      background: #0080ff;
   }

   .auction-tabs .active:hover{
      color: white!important;
   }

   .auction-tabs .active:focus{
      color: white!important;
   }

   
</style>
@endsection
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">



   <div class="row">
      <div class="col-md-3 auction-tabs">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
               <ul class="nav flex-column flex-md-row gap-md-0 gap-2">
                  <li class="nav-item">
                     <a data-id="auction" class="display_type nav-link active" href="javascript:void(0);"> Auction Finder</a>
                  </li>
                  <li class="nav-item">
                     <a data-id="car" class="display_type nav-link" href="javascript:void(0);"> Vehicle Valuation</a>
                  </li>
               </ul>
            </div>
      </div>
      <div class="col-md-9 text-right">
         <div class="row">
            <div class="col-md-6 align-self-center">
               <span style="padding-right: 5px" >Show Entries</span>
               <select style="height: 38px;padding: 0px 10px;" name="length">
                  {{-- <option value="10">10</option> --}}
                  <option value="50">50</option>
                  <option value="100">100</option>
                  <option value="500">500</option>
               </select>
               <span class="show_pagging" style="padding-left: 5px"></span>
            </div>
            <div class="col-md-6">
               <div class="d-flex justify-content-end">
                  <div class="invoice_status">
                     <select id="auction_name" name="auction_name" class="form-select">
                        <option value="">Select Auction</option>
                        @foreach ($platforms as $platform)
                        <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="invoice_status">
                     <select id="date_range" name="date_range" class="form-select">
                        {{-- <option value="">Select Range</option> --}}
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="last_week">Last Week</option>
                        <option value="last_month">Last Month</option>
                        <option value="past_3_months">Past 3 Months</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="row">
      <div class="col-md-3">
         {{-- <div class="card p-2">
               <div class="d-flex justify-content-between align-items-center px-1 pt-1">
                  <h5 class="mb-0">Filters</h5>
                  <div>
                     <button class="btn btn-sm btn-outline-primary me-1">Hide Filters</button>
                     <a href="#" class="text-decoration-none">Clear all</a>
                  </div>
               </div>
               <hr>
               <div class="accordion" id="filterAccordion">
                     @include('user.auctionfinder.sidebar')
               </div>
         </div> --}}
      </div>

      <!-- Right: 9col Table section -->
      <div class="col-md-9">
         <div class="card">
            <div class="table-responsive text-nowrap">
               <table class="table table-hover" >
                  <thead>
                     <tr>
                        <th>Vehicle</th>
                        <th>Year</th>
                        <th>CC</th>
                        <th>Mileage</th>
                        <th>Transmission</th>
                        <th>Auction</th>
                        <th>Auction Time</th>
                        <th>Last Bid</th>
                     </tr>
                  </thead>
                  <tbody></tbody>
               </table>
            </div>

            <div class=" d-flex align-items-center justify-content-center gap-4 pt-4" >
                  <div class="dt-paging">
                        <nav aria-label="pagination">
                              <ul class="pagination">

                          

                              </ul>
                        </nav>
                  </div>
            </div>

         </div>
      </div>
   </div>


</div>
@endsection

@section('js')
   <script>
            $(document).ready(function () {

                    let filters = {};
                    filters.length = 50;
                    filters.page=1;
                    filters.date_range = 'today';
                    filters.display_type = 'auction';


                    function showHeadings () {  

                        
                        if(filters.display_type == 'auction'){
                           $('table thead').html(`<tr>
                              <th>Vehicle</th>
                              <th>Year</th>
                              <th>CC</th>
                              <th>Mileage</th>
                              <th>Transmission</th>
                              <th>Auction</th>
                              <th>Auction Time</th>
                              <th>Last Bid</th>
                           </tr>`);
                        }else{
                           $('table thead').html(`<tr>
                              <th>Vehicle</th>
                              <th>Clean</th>
                              <th>Average</th>
                              <th>Cap Below</th>
                              <th>Autotrader</th>
                              <th>Auction</th>
                              <th>Last Bid</th>
                              <th>Autoboli</th>
                           </tr>`);
                        }

                    }

                    function searchrecord () {  

                           $(`.table tbody`).html(`
                              <tr>
                                 <td colspan="8" class="text-center" >Loading..</td>
                              </tr>
                           `);
                           $(`.pagination`).html('');
               
                           $.ajax({
                                 url: "{{ URL::to('/auctionfinder/data') }}",
                                 method: "GET",
                                 data:filters,
                                 success: function (response) {

                                        let start = (response.current_page - 1) * response.per_page + 1;
                                        let end = Math.min(start + response.per_page - 1, response.total);

                                    $('.show_pagging').text(`${start}-${end} of ${response.total} Vehicles`);
                                    $('.table tbody').html('');

                                    response.data.forEach(element => {
                                          if(filters.display_type == 'auction')
                                          $(`.table tbody`).append(`
                                                <tr>
                                                   <td>${element.make_name} ${element.model_name} ${element.variant_name}</td>
                                                   <td>${element.year}</td>
                                                   <td>${element.cc}</td>
                                                   <td>${element.mileage}</td>
                                                   <td>${element.transmission}</td>
                                                   <td>${element.auction_name}</td>
                                                   <td>${element.auction_date} ${element.auction_time}</td>
                                                   <td>${element.last_bid}</td>
                                                </tr>
                                          `);
                                          else{
                                             $(`.table tbody`).append(`
                                                <tr>
                                                   <td>${element.make_name} ${element.model_name} ${element.variant_name}</td>
                                                   <td>${element.cap_clean}</td>
                                                   <td>${element.cap_average}</td>
                                                   <td>${element.cap_below}</td>
                                                   <td>${element.autotrader_retail_value}</td>
                                                   <td>${element.auction_name}</td>
                                                   <td>${element.last_bid}</td>
                                                   <td>${element.auto_boli}</td>
                                                </tr>
                                          `);
                                          }
                                    });

                                    for(let index = 1; index < response.last_page; index++){
                                        $(`.pagination`).append(`<li data-id="${index}" class="dt-paging-button page-item ${response.current_page == index ? 'active' : ''}">
                                             <button class="page-link" type="button">${index}</button>
                                        </li>`);
                                    }

                                 },
                                 error: function (xhr) {
                                    // alert('Something went wrong. Please try again.');
                                 }
                           });

                     }


                     $('select[name=auction_name]').change(function (e) { 
                         filters.plateform_id = $(this).val();
                         searchrecord();
                     });

                     $('select[name=auction_name]').change(function (e) { 
                         filters.plateform_id = $(this).val();
                         searchrecord();
                     });

                     $('select[name=length]').change(function (e) { 
                         filters.length = $(this).val();
                         searchrecord();
                     });

                     $('select[name=date_range]').change(function (e) { 
                         filters.date_range = $(this).val();
                         searchrecord();
                     });

                     $('select[name=date_range]').change(function (e) { 
                         filters.date_range = $(this).val();
                         searchrecord();
                         
                     });

                     $('.display_type').click(function (e) { 

                        $('.display_type').removeClass('active');
                        filters.display_type = $(this).data('id');
                        showHeadings();
                        searchrecord();
                        $(this).addClass('active');

                     });

                     $('.pagination').on('click', 'li', function() {
                          filters.page = $(this).data('id');
                          searchrecord();
                     });
                                          

                     searchrecord();

            });
         </script>


         <script>
         // $(document).ready(function () {

            
         //    $('input[type="checkbox"], select, input[type="number"], input[type="text"]').on('change', function () {
         //       applyFilters();
         //    });

         //    function applyFilters() {

         //       let vehicle_types = getCheckedValues('vehicle_types[]');
         //       let make_ids = getCheckedValues('make_ids[]');
         //       let model_ids = getCheckedValues('model_ids[]');
         //       let variant_ids = getCheckedValues('variant_ids[]');
         //       let year_ids = getCheckedValues('year_ids[]');

         //       let auction_name = $('#auction_name').val();
         //       let date_range = $('#date_range').val();

         //       let transmission = getCheckedValues('transmission[]');
         //       let fuel_type = getCheckedValues('fuel_type[]');
         //       let doors = getCheckedValues('doors[]');
         //       let seats = getCheckedValues('seats[]');
         //       let cc = getCheckedValues('cc[]');

         //       let color_ids = getCheckedValues('color_ids[]');
         //       let grades = getCheckedValues('grades[]');
         //       let v5 = getCheckedValues('v5[]');
         //       let former_keepers = getCheckedValues('former_keepers[]');
         //       let number_of_services = getCheckedValues('number_of_services[]');

         //       let mileage_from = $('#mileage_from').val();
         //       let mileage_to = $('#mileage_to').val();

         //       let vehicle_age_from = $('#vehicle_age_from').val();
         //       let vehicle_age_to = $('#vehicle_age_to').val();

         //       $.ajax({
         //             url: "{{ route('auction.filter') }}",
         //             method: "GET",
         //             data: {
         //                vehicle_types,
         //                make_ids,
         //                model_ids,
         //                variant_ids,
         //                year_ids,
         //                auction_name,
         //                date_range,
         //                transmission,
         //                fuel_type,
         //                doors,
         //                seats,
         //                cc,
         //                color_ids,
         //                grades,
         //                v5,
         //                former_keepers,
         //                mileage_from,
         //                mileage_to,
         //                vehicle_age_from,
         //                vehicle_age_to,
         //                number_of_services
         //             },
         //             success: function (response) {
         //                $('#vehicle-table-container').html(response.html);
         //             },
         //             error: function (xhr) {
         //                alert('Something went wrong. Please try again.');
         //             }
         //       });


         //    }

         //    function getCheckedValues(name) {
         //       return $('input[name="' + name + '"]:checked').map(function () {
         //             return this.value;
         //       }).get();
         //    }

         // });
      </script>

@endsection



