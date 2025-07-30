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
        background: #000f21;
        color: #0073e5;
        margin: 1px 2px;
    }

   
</style>
@endsection
@section('content')
    <div class="container-fluid ">
        <div class="row" style="padding-top: 50px" >
            <div class="col-md-12">
                 @if(session('success'))
                     <div class="alert alert-success">{{ session('success') }}</div>
                 @endif
            </div>
            <div class="col-12 pb-2">
                <div class="row">
                       <div class="col-lg-12 col-xl-2 py-2">
                            <div class="form-group">
                                <select name="platform_id" id="platform_id" class="form-control platform " >
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-2 py-2">
                            <div class="form-group">
                                <select name="center_id" id="center_id" class="form-control center">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-4 align-self-center py-2">
                                <div class="d-flex align-items-center">
                                    <span class="pageinfo" style="font-size: 15px; padding-right: 6px; "></span>
                                    <select style="max-width:200px;padding:3px; "  name="length" class="">
                                        <option value="10">10</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                    </select>
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
            <div class="col-12 pt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
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

             let table = $('.table').DataTable({
                    processing: true,
                    serverSide: true,
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
                    $('select[name=center_id]').val(null).trigger('change');
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
                                platform_id: $('select[name=platform_id]').val()
                            };
                        }
                    }
                }).on('change', function () {
                 
                });

    });
    </script>
@endsection







