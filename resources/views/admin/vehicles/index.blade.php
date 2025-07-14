@extends('admin.partial.app')
@push('title') vehicles @endpush
@section('css')

<style>
   .dataTables_length{
      display:none!important;
   }

   .table{
    width: 100%!important;
   }

   .dataTables_info{
      /* display: inline!important; */
   }

   .datatables-products th {
      text-align: center;
   }
   .datatables-products td {
      text-align: center;
   }

   .table-responsive {
      overflow-x: auto!important;
      -webkit-overflow-scrolling: touch!important;
   }

   .ellipsis{
    display: none!important;
   }

</style>
@endsection
@section('content')
   <div class="container-fluid container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">

                 @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title ">Vehicles</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="#" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row pt-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label class="form-label " for="platform_id">Platform</label>
                                    <select name="platform_id" id="platform_id" class="form-control" select2 required>
                                      <option value="">-- Select Platform --</option>
                                         @foreach($auctionsPlatform as $id => $name)
                                       <option value="{{ $id }}">
                                    {{ $name }}
                                    </option>
                                         @endforeach
                                        </select>
                                      </div>
                                </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                       <label class="form-label" for="platform_id">Center</label>
                                            <select name="center_id" id="center_id" class="form-control" select2 required>
                                                <option value="">-- Select Center --</option>
                                            @foreach($auctionCenter as $id => $name)
                                               <option value="{{ $id }}">   {{ $name }}  </option>
                                             @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                      <div class="form-group ">
                                            <label class="form-label" for="auction_type">Auction Type</label>
                                            <select name="auction_type" id="auction_type"class="form-control" select2 required>
                                           <option value="">-- Select Auction Type --</option>
                                           <option value="Online Auction" >Online Auction </option>
                                           <option value="Time Auction" > Time Auction </option>
                                            </select>

                                        </div>
                                 </div>
                                  <div class="col-md-4 py-3">
                                        <div class="form-group">
                                        <label class="form-label" for="auction_id">Auction</label>
                                                <select name="auction_id" id="auction_id" class="form-control" required>
                                                    <option value="">-- Select Auctions --</option>
                                                @foreach($auctions as $id => $name)
                                                <option value="{{ $id }}">   {{ $name }}  </option>
                                                @endforeach
                                                </select>
                                        </div>
                                   </div>
                                   <div class="col-md-4 pt-8" > 
                                <button type="button" id="searchBtn" class="btn btn-primary">Search</button>
                            </div>
                            </div>
                          
                        
                        <div class="row pt-5">
                            <div class="col-md-8">
                                <select style="max-width:200px;padding:5px;"  name="length" class="">
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="500">500</option>
                                </select>
                                <span style="padding-left: 5px" class="pl-2 pageinfo">0</span>
                            </div>
                            <div class="col-md-4 text-end">
                           <form method="GET" action="{{ URL::to('/vehicles/index') }}">
                               {{-- <input style="max-width: 300px"  placeholder="Search.." type="text" class="d-inline form-control" name="search"  /> --}}
                               <input style="max-width: 300px" type="text" name="search" class="d-inline form-control" placeholder="Search vehicles..." value="{{ request('search') }}"> 
                               {{-- <button type="submit">Search</button> --}}
                            </form>
                        </div>

                        <div class="pt-5 table-responsive text-nowrap">
                            <table id="vehicleTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Auction ID</th>
                                        <th>Title</th>
                                        <th>Vehicle Type </th>
                                        <th>Make </th>
                                        <th>Model </th>
                                        <th>Varient</th>
                                        <th>Body Type</th>
                                        <th>Year</th>
                                        <th>Color</th>
                                        {{-- <th>Feul Type</th>
                                        <th>Transmission</th>
                                        <th>Milage</th>
                                        <th>CC</th> --}}
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
                        url:"{{ URL::to('/admin/vehicles')}}",
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