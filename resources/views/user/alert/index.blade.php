@extends('user.partial.app')
@push('title') View History @endpush
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
   
</style>
@endsection
@section('content')


<div class="py-5 container-fluid filter">

      <div class="d-flex flex-wrap justify-content-between">
         <div class="auction-tabs">
               <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
             <ul class="nav nav-pills flex-row">
                    <li class="nav-item me-2">
                        <a data-id="auction-table" class="display_type nav-link active" href="javascript:void(0);">My Alert</a>
                    </li>
                    <li class="nav-item">
                        <a data-id="recent-table" class="display_type nav-link" href="javascript:void(0);">Recent View</a>
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
                        @include('user.alert.sidebar')
                  </div>
            </div>
         </div>

         <!-- Right: 9col Table section -->
         <div class="col-lg-9">
            <div class="card">
              <div class="table-responsive text-nowrap mt-3">

                <!-- My Alert Table -->
                    <!-- My Alerts Table -->
                    <table id="auction-table" class="auction-table table table-hover table-switch">
                    <thead>
                        <tr>
                            <th>Vehicle</th>
                            <th>Year</th>
                            <th>CC</th>
                            <th>Image</th>
                            <th>Mileage</th>
                            <th>Transmission</th>
                            <th>Auction</th>
                            <th>Auction Time</th>
                            <th>Last Bid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Toyota Corolla</td>
                            <td>2021</td>
                            <td>1800</td>
                            <td><img src="https://via.placeholder.com/80" class="img-fluid rounded" width="80"></td>
                            <td>25,000 km</td>
                            <td>Automatic</td>
                            <td>USS Tokyo</td>
                            <td>2025-09-30 12:00 PM</td>
                            <td>$12,000</td>
                        </tr>
                        <tr>
                            <td>Honda Civic</td>
                            <td>2020</td>
                            <td>1500</td>
                            <td><img src="https://via.placeholder.com/80" class="img-fluid rounded" width="80"></td>
                            <td>30,000 km</td>
                            <td>Manual</td>
                            <td>CAA Nagoya</td>
                            <td>2025-10-01 10:30 AM</td>
                            <td>$10,500</td>
                        </tr>
                    </tbody>
                    </table>

                    <!-- Recent Views Table -->
                    <table id="recent-table" class="auction-table table table-hover table-switch d-none">
                    <thead>
                        <tr>
                            <th>Vehicle</th>
                            <th>Year</th>
                            <th>CC</th>
                            <th>Image</th>
                            <th>Mileage</th>
                            <th>Transmission</th>
                            <th>Auction</th>
                            <th>Auction Time</th>
                            <th>Last Bid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Suzuki Alto</td>
                            <td>2019</td>
                            <td>660</td>
                            <td><img src="https://via.placeholder.com/80" class="img-fluid rounded" width="80"></td>
                            <td>15,000 km</td>
                            <td>Automatic</td>
                            <td>JU Sapporo</td>
                            <td>2025-09-28 09:00 AM</td>
                            <td>$3,500</td>
                        </tr>
                        <tr>
                            <td>Nissan Note</td>
                            <td>2018</td>
                            <td>1200</td>
                            <td><img src="https://via.placeholder.com/80" class="img-fluid rounded" width="80"></td>
                            <td>40,000 km</td>
                            <td>CVT</td>
                            <td>HAA Kobe</td>
                            <td>2025-09-27 02:15 PM</td>
                            <td>$4,800</td>
                        </tr>
                    </tbody>
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
   document.querySelectorAll('.display_type').forEach(link => {
      link.addEventListener('click', function() {
         document.querySelectorAll('.display_type').forEach(el => el.classList.remove('active'));
         this.classList.add('active');
         document.querySelectorAll('.table-switch').forEach(tbl => tbl.classList.add('d-none'));
         let target = this.getAttribute('data-id');
         document.getElementById(target).classList.remove('d-none');
      });
   });
</script>




<script>
$(document).ready(function() {
    $.ajax({
        url: "{{ route('get.filters') }}",
        type: "GET",
        dataType: "json",
        success: function(data) {

            function createCheckboxList(items, className) {
                let html = '';
                $.each(items, function(i, item){
                    let id = item.id ?? item.name ?? item.year ?? item.fuel_type;
                    let name = item.name ?? item.year ?? item.fuel_type;
                    html += `<div class="form-check">
                                <input class="form-check-input ${className}" type="checkbox" value="${id}" id="${className}-${i}">
                                <label class="form-check-label" for="${className}-${i}">${name}</label>
                             </div>`;
                });
                return html;
            }

            $('.tags-make').html(createCheckboxList(data.makes, 'filter-make'));
            $('.tags-model').html(createCheckboxList(data.models, 'filter-model'));
            $('.tags-variant').html(createCheckboxList(data.variants, 'filter-variant'));
            $('.tags-year').html(createCheckboxList(data.years, 'filter-year'));
            $('.tags-fuel_type').html(createCheckboxList(data.fuel_types, 'filter-fuel'));
        }
    });
});

</script>



@endsection



