@extends('admin.partial.app')
@push('title') Membership @endpush 
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
                                <h5 class="card-title ">Membership</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/memberships/create')}}" class="btn btn-primary">Add New Membership</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="row pt-5">
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label class="form-label" for="status">Status</label>
                                         <select name="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Expired">Expired</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <label class="form-label">Type</label>
                                         <select name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                            <option value="custom">Custom</option>  
                                         </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Start Date:</label>
                                                <input type="date" name="start_date" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">End Date:</label>
                                                <input type="date" name="end_date" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 pt-3">
                                    <div class="form-group">
                                        <label class="form-label">Search</label>
                                        <input placeholder="Search.." type="text" class="form-control" name="search"  />
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
                             
                            </div>
                        </div>

                        <div class="pt-5 table-responsive text-nowrap">
                            <table id="blogTable" class="table table-bordered">
                                <thead>
                                     <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Type</th>
                                        <th>Plan</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>Expiry Date</th>
                                        <th>Payment Date</th>
                                        <th>Actions</th>
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
                    ordering:false,
                    serverSide: true,
                    ajax:{
                        url:"{{ URL::to('/admin/memberships')}}",
                        data:function (d){

                            d.status = $('select[name=status]').val();
                            d.type = $('select[name=type]').val();
                            d.start_date = $('input[name=start_date]').val();
                            d.end_date = $('input[name=end_date]').val();
                            d.search = $('input[name=search]').val();
                            
                        }
                    }
                });

                table.on('draw.dt', function () {
                    var info = table.page.info();
                    $('.pageinfo').html(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
                });

                $("#searchBtn").click(function () {
                    table.draw();
                });

                $("select[name='length']").on('change', function () {
                    const length = $(this).val();
                    table.page.len(length).draw();
                }).trigger('change');

            });
    </script>
@endsection
