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
            @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
     <div class="row">
    <div class="col-md-6">
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-between align-items-start align-items-md-center mb-3 gap-3">
            
            {{-- Buttons Section --}}
            <div class="d-flex gap-3">
                {{-- Platform Dropdown --}}
                <div class="form-group">
                     <label class="form-label " for="platform_id">Platform</label>
                     <select name="platform_id" id="platform_id" class="form-control platform" select2 required>
                        <option value="">-- Select Platform --</option>
                           @foreach($auctionsPlatform as $id => $name)
                        <option value="{{ $id }}">
                     {{ $name }}
                     </option>
                           @endforeach
                     </select>
                     </div>

                {{-- Center Dropdown --}}
               <div class="form-group">
                                       <label class="form-label" for="center_id">Center</label>
                                            <select name="center_id" id="center_id" class="form-control center" select2 required>
                                                <option value="">-- Select Center --</option>
                                            @foreach($auctionCenter as $id => $name)
                                               <option value="{{ $id }}">   {{ $name }}  </option>
                                             @endforeach
                                            </select>
                                    </div>
                
                <form method="GET" id="lengthForm">
                <div class="d-flex align-items-center gap-2 " style="margin-left: 50px">
                    <span style="font-size: 20px;">Show Entries</span> 
                   <select style="max-width:200px;padding:5px;"  name="length" class="">
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="500">500</option>
                                </select>
                </div>
            </form>
            </div>

            {{-- Show Entries Dropdown --}}
            
        </div>
    </div>

    {{-- Count Boxes on Right --}}
    <div class="col-md-6">
        <div class="d-flex justify-content-end ">
            <div class="form-group">
                <span style="font-size: 20px;"> of 15,276</span>
            </div>
         
        </div>
    </div>
</div>


      <div class="row">
         

         <!-- Right: 9col Table section -->
         <div class="col-md-12">
            <div class="card">
               <div class="table-responsive text-nowrap">
                  <table id="vehicleTable" class="table table-borderless table-sm">
                     <thead>
                           <tr>
                              <th>Platform</th>
                              <th>Center</th>
                              <th>Total Vehicles</th>
                              <th>Time</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                     </thead>
                     <tbody class="table-border-bottom-0"></tbody>

                  </table>
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
             let table = $('#vehicleTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:{
                        url: "{{ url('auctionscheduler') }}",
                        data:function (d){
                            d.platform_id = $('#platform_id').val();
                            d.center_id = $('#center_id').val();
                            d.auction_type = $('#auction_type').val();
                            d.auction_id = $('#auction_id').val();
                            
                        }
                    }
                    
                });
                

                table.on('draw.dt', function () {
                    var info = table.page.info();
                    $('.pageinfo').html(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
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
    });
    </script>
@endsection







