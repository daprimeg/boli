@extends('admin.partial.app')
@push('title') Members @endpush
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

<style>
    .stats-card {
        background-color: #1e293b;
        border: 1px solid #334155;
        border-radius: 12px;
        color: white;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .stats-card .card-body {
        padding: 1.5rem;
    }

    .stats-icon {
        background-color: #3b82f6;
        border-radius: 8px;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stats-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
    }

    .stats-change {
        color: #3b82f6;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .stats-label {
        color: #94a3b8;
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Highlighted Card */
    .highlight-card {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border: none;
        color: white;
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }

    .highlight-card .stats-change {
        color: rgba(255, 255, 255, 0.8);
    }

    .highlight-card .stats-label {
        color: rgba(255, 255, 255, 0.9);
    }

    .highlight-card .stats-icon {
        background-color: rgba(255, 255, 255, 0.2);
    }
</style>
@endsection
@section('content')

<div class="container-fluid py-5">
    <div class="row g-4">
        @foreach ($cards as $card)
            <div class="col-12 col-sm-6 col-md-4 " style="width: 20%;"> 
                <div class="card {{ $card['highlight'] ? 'highlight-card' : 'stats-card' }} h-100 w-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h2 class="stats-value">{{ $card['value'] }}</h2>
                                <span class="stats-change">{{ $card['change'] }}</span>
                            </div>
                            <div class="stats-icon">
                                <i class="{{ $card['icon'] }}" style="font-size: 1.2rem;"></i>
                            </div>
                        </div>
                        <p class="stats-label">{{ $card['label'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container-fluid container-p-y">
    <div class="card">

        <div class="card-header border-bottom">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <h5 class="card-title mb-0">Members Filter</h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row pt-5">
                <div class="row g-3 align-items-end">  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="status">Status</label>
                           <select name="status" class="form-control">
                                <option value="" selected>-- Select All --</option>   
                                <option value="1">Active</option>   
                                <option value="0">Deactive</option>   
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="plan">Plan</label>
                            <select name="plan" class="form-control memberships">
                               
                            </select>
                        </div>
                    </div>

              
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="search">Search</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                        </div>
                    </div>

                    
                    <div class="col-md-1">
                        <button type="button"  id="searchBtn" class="btn btn-primary w-100">
                            Search
                        </button>
                    </div>

                </div> 
            </div> 
        </div>

    </div> 
</div>


  <div class="container-fluid  container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">

           

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row align-items-center">
                            <!-- Title -->
                            <div class="col-md-4">
                                <h5 class="card-title mb-0">Members</h5>
                            </div>


                    <div class="col-md-8">
                            <div class="d-flex flex-wrap justify-content-end align-items-center gap-2">

                           

                             
                                {{-- <div style="max-width:150px; min-height:28px;">
                                    <select id="filterPlan" name="plan" class="form-select form-select-sm memberships"></select>
                                </div> --}}

                           
                                {{-- <select id="filterStatus" name="status" class="form-select form-select-sm" style="max-width: 150px;">
                                    <option value="">All Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select> --}}

                             
                                <a href="{{ url('/admin/members/0/edit') }}" class="btn btn-primary btn-sm">
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
                           
                         </div>

                         <div class="pt-5 table-responsive text-nowrap">
                           <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Full Name</th>
                                        <th>Company</th>
                                        <th>Mobile</th>
                                        <th>Personal Email</th>
                                        <th>Business Type</th>
                                        <th>Plan</th>
                                        <th>Plan Status</th>
                                        <th>Expiry Date</th>
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

    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('/admin/members') }}",
            data: function(d) {
                d.plan   = $('select[name="plan"]').val();
                d.status = $('select[name="status"]').val();
                d.search = $('#search').val();
            }
        },
        columns: [
            { data: 'id' },
            { data: 'avatar' },
            { data: 'name' },
            { data: 'companyName' },
            { data: 'phone' },
            { data: 'email' },
            { data: 'businessType' },
            { data: 'plan' },
            { data: 'planstatus' },
            { data: 'expirydate' },
            { data: 'status' },
            { data: 'action', orderable: false, searchable: false }
        ]
    });


    $('#searchBtn').on('click', function () {
        table.draw();
    });

    table.on('draw.dt', function () {
        var info = table.page.info();
        $('.pageinfo').html(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries`);
    });

});



   </script>
@endsection

