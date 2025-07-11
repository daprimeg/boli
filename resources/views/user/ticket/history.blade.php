@extends('admin.partial.app')
@push('title') Tickets @endpush
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
                                <h5 class="card-title "> My Submitted Tickets</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/createticket')}}" class="btn btn-primary">Add New</a>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Issue Topic</th>
                                        <th>Issue Type</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Attachment</th>
                                        <th>Submitted At</th>
                                        <th>View</th>
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
             let table = $('table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ URL::to('/tickethistory')}}",
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



