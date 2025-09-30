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

         

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row align-items-center">
                            <!-- Title -->
                            <div class="col-md-4">
                                <h5 class="card-title mb-0">Users</h5>
                            </div>


                    <div class="col-md-8">
                            <div class="d-flex flex-wrap justify-content-end align-items-center gap-2">

                           

                             
                                <div style="max-width:150px; min-height:28px;">
                                    <select id="filterRole" name="role" class="form-select form-select-sm role"></select>
                                </div>

                           
                                <select id="filterStatus" name="status" class="form-select form-select-sm" style="max-width: 150px;">
                                    <option value="">All Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>

                             
                                <a href="{{ url('/admin/users/0/edit') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i> Add New User
                                </a>
                            </div>
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
                           <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Full Name</th>
                                        <th>Personal Email</th>
                                        <th>Role</th>
                                        <th>Last login</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
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
   <script>
$(document).ready(function() {
        if (! $.fn.DataTable.isDataTable('.table')) {
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.users.index') }}",
            data: function(d) {
                d.role   = $('#filterRole').val();
                d.plan   = $('#filterPlan').val();
                d.status = $('#filterStatus').val();
            }
        },
        columns: [
            { data: 'id' },
            { data: 'avatar' },
            { data: 'name' },
            { data: 'email' },
            { data: 'role' },
            { data: 'last_login' },
            { data: 'status' },
            { data: 'action', orderable: false, searchable: false }
        ]
    });

    $('#filterRole, #filterPlan, #filterStatus').on('change', function() {
        table.draw();
    });


    $("input[name='search']").on('keyup change', function () {
        table.search(this.value).draw();
    });

  
    table.on('draw.dt', function () {
        var info = table.page.info();
        $('.pageinfo').html(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
    });
        }
});


   </script>
@endsection

