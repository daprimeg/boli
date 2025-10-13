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

   .my_btn{
      background: transparent;
       border: none;
   }

   .auction-table tr{
      vertical-align: baseline;
   }

   .auction-table .extra{
      display: none;
   }

   .auction-table .showing .extra{
      display: block;
      margin-top: 10px;
   }

   .auction-table .report-link{
      padding: 2px 7px;
      font-size: 10px;      
   }


   .auction-table img{
      width:60px;
   }

   .show_entries_div{

   }
   .auction-badge {
      display: inline-block;
      padding: 4px 10px;
      font-size: 0.65rem;
      color: #ffffffd6;
 
      border:1px solid #0080ff;
      border-radius: 5px;
      box-shadow: 2px 0px 6px #0080ff;
      font-weight: 500;
      text-align: center;
      }
      .lightbox-overlay {
         display: none;
         position: fixed;
         z-index: 9999;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0,0,0,0.9);
         justify-content: center;
         align-items: center;
         display: flex;
      }

      .lightbox-overlay img {
         max-width: 80%;
         max-height: 80%;
         border-radius: 8px;
      }

      .lightbox-prev,
      .lightbox-next {
         position: absolute;
         top: 50%;
         transform: translateY(-50%);
         font-size: 2rem;
         color: #fff;
         background: rgba(0,0,0,0.5);
         border: none;
         padding: 10px;
         cursor: pointer;
         border-radius: 50%;
      }

      .lightbox-prev { left: 20px; }
      .lightbox-next { right: 20px; }


      .color-box {
      display: inline-block;
      width: 18px;
      height: 18px;
      border-radius: 4px;
      border: 1px solid #ccc;
      vertical-align: middle;
      cursor: pointer;
      margin-left: 5px;
      transition: transform 0.2s ease;
      }

      .color-box:hover {
      transform: scale(1.2);
      }
   .prev-icon {
      margin-right: 4px;
      color: #555;
      font-size: 14px;
      vertical-align: middle;
   }

   tr:hover {
   cursor: pointer;
   }

   .grade-box {
  display: inline-block;
  width: 25px;
  height: 25px;
  border-radius: 4px;
  color: white;
  font-weight: bold;
  text-align: center;
  line-height: 25px;
  font-size: 14px;
}


</style>
@endsection
@section('content')


<div class="py-5 container-fluid filter">

      <div class="d-flex flex-wrap justify-content-between">
         <div class="auction-tabs">
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
         <div  class="text-right ">
            <div class="d-flex justify-content-between">
               <div class=" align-self-center show_entries_div">
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
               <div class="">
                  <div class="d-flex flex-wrap justify-content-end">
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
         <div class="col-lg-3">
            <div class="card p-2">
                  <div class="d-flex justify-content-between align-items-center px-1 pt-1">
                     <h5 class="mb-0">Filters</h5>
                     <div>
                        {{-- <button class="btn btn-sm btn-outline-primary me-1">Hide Filters</button> --}}

                        <a href="{{url('/auction-finder')}}" class="text-decoration-none">Clear all</a>
                     </div>
                  </div>
                  <hr>
                  <div class="accordion" id="filterAccordion">
                        @include('user.auctionfinder.sidebar')
                  </div>
            </div>
         </div>

         <!-- Right: 9col Table section -->
         <div class="col-lg-9">
            <div class="card">
               <div class="table-responsive text-nowrap">
                  <table class="auction-table table table-hover" >
                     <thead>
             
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

<div class="lightbox-overlay" style="display:none;">
    <button class="lightbox-prev">&#10094;</button>
    <img src="" alt="Preview">
    <button class="lightbox-next">&#10095;</button>
</div>
@endsection
@section('js')

<script>
      $(document).on('mouseenter', '.table tbody tr', function() {
         $(this).find('.extra').fadeIn(150);
      });

      $(document).on('mouseleave', '.table tbody tr', function() {
         $(this).find('.extra').fadeOut(150);
      });

         let images = []; // store current row images
         let currentIndex = 0;

         // Open lightbox
         $(document).on('click', '.lightbox-img', function() {
            let row = $(this).closest('tr');
            images = row.find('.lightbox-img').map(function(){ return $(this).attr('src'); }).get();
            currentIndex = images.indexOf($(this).attr('src'));
            $('.lightbox-overlay img').attr('src', images[currentIndex]);
            $('.lightbox-overlay').fadeIn(200);
         });

         // Close on clicking overlay (outside image)
         $('.lightbox-overlay').on('click', function(e){
            if(!$(e.target).is('img') && !$(e.target).is('button')) $(this).fadeOut(200);
         });

         // Prev button
         $('.lightbox-prev').on('click', function(e){
            e.stopPropagation();
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            $('.lightbox-overlay img').attr('src', images[currentIndex]);
         });

         // Next button
         $('.lightbox-next').on('click', function(e){
            e.stopPropagation();
            currentIndex = (currentIndex + 1) % images.length;
            $('.lightbox-overlay img').attr('src', images[currentIndex]);
         });


      let url = "{{url('/')}}";
      const baseUrl = "{{ url('/auction-finder/vehicle') }}";
   $(document).ready(function () {
         $('.menu-button').trigger('click');
         $('.menu-button').hide();    
      
   });
</script>
<script src="{{asset('/public/themeadmin/js/vehichle.js')}}"></script>


@endsection



