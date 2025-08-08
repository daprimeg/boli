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

   .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #444;
      line-height: 33px;
   }

   .select2-container {
      width: 236px;
      margin-right: 5px;
   }

   .select2-container--default .select2-selection--single {
      background-color: var(--bs-paper-bg) !important;
      border: 1px solid var(--bs-b-color) !important;
   }

   .filter .select2-container--default .select2-selection--single {
    background-color: var(--bs-body-bg)!important;
   
   }

   
</style>
@endsection
@section('content')


<div class="py-5 container-fluid filter">

      <div class="row ">
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
         <div class="col-md-9 text-right ">
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

                  <span class="params" ></span>
               </div>
               <div class="col-md-6">
                  <div class="d-flex justify-content-end">
                     <div class="invoice_status">
                        <select id="auction_name" name="auction_name" class="form-select">
                        </select>
                     </div>
                     <div class="invoice_status">
                        <select name="date" class="form-select">
                           {{-- <option value="">Select Range</option> --}}
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
      </div>

      <div class="row">
         <div class="col-md-3">
            <div class="card p-2">
                  <div class="d-flex justify-content-between align-items-center px-1 pt-1">
                     <h5 class="mb-0">Filters</h5>
                     <div>
                        {{-- <button class="btn btn-sm btn-outline-primary me-1">Hide Filters</button> --}}

                        <a href="{{url('/auctionfinder')}}" class="text-decoration-none">Clear all</a>
                     </div>
                  </div>
                  <hr>
                  <div class="accordion" id="filterAccordion">
                        @include('user.auctionfinder.sidebar')
                  </div>
            </div>
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
      let url = "{{url('/')}}";
   $(document).ready(function () {
         $('.menu-button').trigger('click');
         $('.menu-button').hide();    
      
   });
</script>
<script src="{{asset('/public/themeadmin/js/vehichle.js')}}"></script>


@endsection



