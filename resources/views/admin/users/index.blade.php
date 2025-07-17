@extends('admin.partial.app')
@push('title') Users @endpush
@section('css')
<style>
    .dataTables_length{
        display:none!important;
    }

    .dataTables_info{
        
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

  <div class="container-fluid  container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">

                  @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                           <div class="col-md-6">
                                <h5 class="card-title" >Users</h5>
                           </div>
                            <div class="col-md-6 text-end">
                               <a href="{{ url('/admin/users/create') }}" class="btn btn-primary mb-3">Add New User</a>
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
                            <table  class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Company</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->companyName}}</td>
                                            <td>{{$item->firstName . ' ' . $item->surname}}</td>
                                            <td>{{$item->businessEmail}}</td>
                                            <td>
                                                @if($item->status == 1)
                                                    <a href="{{url('/admin/users/'.$item->id.'/status/0')}}" class="btn btn-success btn-sm">Active</a>
                                                @else
                                                    <a href="{{url('/admin/users/'.$item->id.'/status/1')}}" class="btn btn-danger btn-sm">Deactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/admin/users/'.$item->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="{{url('/admin/users/'.$item->id.'/delete')}}" class="btn btn-danger btn-sm" onclick="return confirm(\'Delete user?\')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
   <script>
      $(document).ready(function() {
         
         let table = $('.table').DataTable({
               paging: true,
               searching: true,
               ordering: true,
               responsive: true
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
         

      });
   </script>
@endsection

