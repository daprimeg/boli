@extends('admin.partial.app')
@push('title') Activity Log @endpush
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

           

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title ">Activity Log</h5>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-body">

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
                              <input style="max-width: 300px"  placeholder="Search.." type="text" class="d-inline form-control" name="search"  />
                            </div>
                        </div>

                        <div class="pt-5 table-responsive text-nowrap">
                            <table id="activityLogTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Activity</th>
                                        <th>Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Admin</td>
                                        <td>Created a new blog post: <strong>Laravel Tips</strong></td>
                                        <td>2025-08-13 03:15 PM</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>John Doe</td>
                                        <td>Updated profile picture</td>
                                        <td>2025-08-12 10:42 AM</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>System</td>
                                        <td>Backup completed successfully</td>
                                        <td>2025-08-11 11:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Jane Smith</td>
                                        <td>Deleted blog post: <em>Old News</em></td>
                                        <td>2025-08-10 09:30 AM</td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>  
                </div>
        </div>
    </div>
</div>
@endsection

@section('js')
         @if(session('success'))
            <script>
                toastr.success('{{Session::get('success')}}')
            </script>
        @endif

    
@endsection