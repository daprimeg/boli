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
   .dataTables_length {
    display: none !important;
    }


   
</style>
@endsection
@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
                @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
            <div class="row pb-2">
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="platform_id" id="platform_id" class="form-control platform " >
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="center_id" id="center_id" class="form-control center">
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <form method="GET" id="lengthForm">
                        <div class="d-flex align-items-center " style="margin-left: 50px">
                            <span class="pageinfo" style="font-size: 15px; padding-right: 6px; "></span>
                            <select style="max-width:200px;padding:3px; "  name="length" class="">
                                <option value="10">10</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
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
            <div class="row">
                <!-- Right: 9col Table section -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <table id="vehicleTable" class="table  table-sm">
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
                            d.date_range = $('select[name=date_range]').val();
                           
                            
                        }
                    },
                });
                      
                  
            
                table.on('draw.dt', function () {
                    var info = table.page.info();
                    $('.pageinfo').html(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
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
    });
    </script>
@endsection







