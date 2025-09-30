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
   .skyblue-badge {
    background-color: #0080ff;
    color: #ffffff; 
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
                        <a href="{{url('/viewhistory')}}" class="text-decoration-none">Clear all</a>
                     </div>
                  </div>
             
                  <hr>
                  <div class="accordion" id="filterAccordion">
                        @include('user.alert.sidebar')
                  </div>

         
            </div>
         </div>

      
         <div class="col-lg-9">
            <div class="card">
              <div class="table-responsive text-nowrap mt-3">

           
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
                        
                    </tbody>
                    </table>

                  
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
$(document).ready(function () {

  
function loadFilters(makeId = null, modelId = null) {
    $.ajax({
        url: "{{ route('get.filters') }}",
        type: "GET",
        data: { make_id: makeId, model_id: modelId },
        success: function (data) {
            let selected = getFilters();

       
            $('.tags-make').html(createCheckboxList(data.makes, 'filter-make'));

       
            if (makeId) {
                $('.tags-model').html(createCheckboxList(data.models, 'filter-model'));
            } else {
                $('.tags-model').html('');
            }

        
            if (modelId) {
                $('.tags-variant').html(createCheckboxList(data.variants, 'filter-variant'));
            } else {
                $('.tags-variant').html('');
            }

            $('.tags-year').html(createCheckboxList(data.years, 'filter-year'));
            $('.tags-fuel_type').html(createCheckboxList(data.fuel_types, 'filter-fuel'));

           
            updateCheckboxStates(selected);

            bindFilterEvents();
        }
    });
}



function updateCheckboxStates(selected) {
    $.each(selected, function (key, values) {
        values.forEach(function (val) {
            $(`.filter-${key}[value="${val}"]`).prop('checked', true);
        });
    });
}
function bindFilterEvents() {
  
    $(document).off('change', '.filter-make').on('change', '.filter-make', function () {
        let makeId = $(this).val();
        if ($(this).is(':checked')) {
            loadFilters(makeId, null);
        } else {
            loadFilters();
        }
        updateSelectedFilters();
        loadTables();
    });

 
    $(document).off('change', '.filter-model').on('change', '.filter-model', function () {
        let modelId = $(this).val();
        if ($(this).is(':checked')) {
            let makeId = $('.filter-make:checked').val();
            loadFilters(makeId, modelId);
        } else {
            let makeId = $('.filter-make:checked').val();
            loadFilters(makeId, null);
        }
        updateSelectedFilters();
        loadTables();
    });

  
    $(document).off('change', '.filter-variant, .filter-year, .filter-fuel')
        .on('change', '.filter-variant, .filter-year, .filter-fuel', function () {
            updateSelectedFilters();
            loadTables();
        });

   
    $(document).off('click', '.remove-filter').on('click', '.remove-filter', function () {
        let checkboxId = $(this).parent().data('checkbox');
        $('#' + checkboxId).prop('checked', false).trigger('change');
        loadTables();
    });
}



function createCheckboxList(items, className) {
    let html = '';
    $.each(items, function (i, item) {
        let id = item.id ?? item.year ?? item.fuel_type;
        let name = item.name ?? item.year ?? item.fuel_type;
        html += `<div class="form-check">
                    <input class="form-check-input ${className}" type="checkbox" value="${id}" id="${className}-${i}">
                    <label class="form-check-label" for="${className}-${i}">${name}</label>
                </div>`;
    });
    return html;
}

function updateSelectedFilters() {
  
    $('#selected-filters_make').html('');
    $('#selected-filters_model').html('');
    $('#selected-filters_variant').html('');
    $('#selected-filters_year').html('');
    $('#selected-filters_fuel_type').html('');

    $('input[type=checkbox]:checked').each(function () {
        let val = $(this).next('label').text();
        let id = $(this).attr('id');
        let className = $(this).attr('class').split(' ')[1]; 
        let key = className.replace('filter-', ''); 

        let badgeHtml = `<span class="badge skyblue-badge me-1 mb-1" data-checkbox="${id}">
                            ${val} <span class="remove-filter" style="cursor:pointer;">&times;</span>
                         </span>`;


        $(`#selected-filters_${key}`).append(badgeHtml);
    });
}


function getFilters() {
    let filters = {};

    $('input[type=checkbox]:checked').each(function () {
      
        let className = $(this).attr('class').split(' ')[1]; 
        let key = className.replace('filter-', ''); 

        if (!filters[key]) {
            filters[key] = [];
        }
        filters[key].push($(this).val());
    });

    return filters;
}

let currentPage = 1;

function loadTables() {
    let filters = getFilters();
    let length = $("select[name='length']").val(); 

    $.ajax({
        url: "{{ route('get.auction.data') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            filters: filters,
            page: currentPage,
            length: length
        },
        success: function (res) {
            
            let auctionHtml = '';
            $.each(res.auctionData, function (i, row) {
                if (row.vehicle) {
                    auctionHtml += `<tr>
                        <td>${row.vehicle.vehicle}</td>
                        <td>${row.vehicle.year}</td>
                        <td>${row.vehicle.cc}</td>
                        <td><img src="${row.vehicle.image}" width="50"></td>
                        <td>${row.vehicle.mileage}</td>
                        <td>${row.vehicle.transmission}</td>
                        <td>${row.vehicle.auction.name}</td>
                        <td>${row.vehicle.auction.auction_date}</td>
                        <td>${row.vehicle.last_bid}</td>
                    </tr>`;
                }
            });
            $('#auction-table tbody').html(auctionHtml);

      
            let recentHtml = '';
            $.each(res.recentData, function (i, row) {
                if (row.vehicle) {
                    recentHtml += `<tr>
                        <td>${row.vehicle.vehicle}</td>
                        <td>${row.vehicle.year}</td>
                        <td>${row.vehicle.cc}</td>
                        <td><img src="${row.vehicle.image}" width="50"></td>
                        <td>${row.vehicle.mileage}</td>
                        <td>${row.vehicle.transmission}</td>
                        <td>${row.vehicle.auction.name}</td>
                        <td>${row.vehicle.auction.auction_date}</td>
                        <td>${row.vehicle.last_bid}</td>
                    </tr>`;
                }
            });
            $('#recent-table tbody').html(recentHtml);

          
            renderPagination(res.page, res.length, res.auctionTotal);
        }
    });
}


    function renderPagination(page, length, total) {
        let totalPages = Math.ceil(total / length);
        let html = '';

        for (let i = 1; i <= totalPages; i++) {
            html += `<li class="page-item ${i === page ? 'active' : ''}">
                        <a class="page-link" href="#">${i}</a>
                    </li>`;
        }

        $('.pagination').html(html);


        $('.pagination .page-link').off('click').on('click', function (e) {
            e.preventDefault();
            currentPage = parseInt($(this).text());
            loadTables();
        });
    }


    $("select[name='length']").on('change', function () {
        currentPage = 1; 
        loadTables();
    });





    loadFilters();
    loadTables();
});



</script>



@endsection



