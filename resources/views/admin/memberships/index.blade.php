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
       .card_bor {
       border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.7); padding: 1rem 1.2rem; position: relative; cursor: pointer; transition: transform 0.2s ease-in-out;
    }
    .highlight-card {
        background: #800000 !important;
        border: none;
        color: white;
        /* box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3); */
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

      <div class="card-body">
    <div class="row g-5 justify-content-center" style="width: 100%;">
        @foreach ($cards as $card)
 <div class="col-md-4 col-sm-6" style="min-width: 200px; width: 20%;">
        <div class="card h-100 card_bor @if($card['highlight']) highlight-card @endif"
             
             onmouseover="this.style.transform='scale(1.03)'"
             onmouseout="this.style.transform='scale(1)'"
        >
             

                    <div style="display: flex; align-items: baseline; justify-content: space-between;">
                        <div style="font-size: 1.6rem; font-weight: 700; line-height: 1;">
                            {{ $card['value'] }}
                            <span  style="font-size: 1rem; color: #3EA7FF; margin-left: 6px; font-weight: 500;">
                                {{ $card['change'] }}
                            </span>
                        </div>

                        <div style="background: #1948FF; border-radius: 5px; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center;">
                            <i class="{{ $card['icon'] }}" style="font-size: 12px; color: #A0C4FF;"></i>
                        </div>
                    </div>

                    <p style="font-size: 0.85rem; margin-top: 8px; color: #8CA6B1; font-weight: 400;">
                        {{ $card['label'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</div>


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
                                 <a href="{{URL::to('/admin/memberShips/create')}}" class="btn btn-primary">Add New Membership</a>
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
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label class="form-label" for="role">Plan</label>
                                    <select id="filterPlan" name="plan" class="form-select form-select-sm memberships"></select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="month" class="form-label">Select Month:</label>
                                    <select id="month" name="month" class="form-control">
                                        <option value="">--Select Month--</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="year" class="form-label">Select Year:</label>
                                   <select id="year" name="year" class="form-control">
                                        <option value="">--Select Year--</option>
                                        <?php 
                                        $currentYear = date('Y');
                                        for ($y = $currentYear; $y >= $currentYear - 20; $y--) {
                                            $selected = ($y == $currentYear) ? 'selected' : '';
                                            echo "<option value='{$y}' {$selected}>{$y}</option>";
                                        }
                                        ?>
                                    </select>

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
                                        <th>Company</th>
                                        <th>Type</th>
                                        <th>Plan</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>Expiry Date</th>
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
        ordering: false,
        serverSide: true,
        ajax: {
            url: "{{ URL::to('/admin/memberShips') }}",
            data: function (d) {
                d.status = $('select[name=status]').val();
                d.plan = $('select[name=plan]').val();
                d.month = $('select[name=month]').val();
                d.year = $('select[name=year]').val();
                d.search = $('input[type="search"]').val();  
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
