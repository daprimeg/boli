@extends('admin.partial.app')
@push('title') Auctions @endpush 
@section('css')

<style>
   .dataTables_length{
      display:none!important;
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
                               <h5 class="card-title">All Auctions</h5>
                           </div>
                            <div class="col-md-6 text-end">
                               <a href="{{ route('admin.auctions.create') }}" class="btn btn-primary mb-2">Create Auction</a>
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
                           <div class="pt-5 table-responsive">
                                 <table class="datatables-products table table-bordered">
                                       <thead class="border-top">
                                          <tr>
                                             <th>Name</th>
                                             <th>Date</th>
                                             <th>End Date</th>
                                             <th>Platform</th>
                                             <th>status</th>
                                             <th>Actions</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($auctions as $auction)
                                          <tr>
                                             <td>{{ $auction->name }}</td>
                                             <td>{{ date('d-M-Y H:i', strtotime($auction->auction_date))}}</td>
                                             <td>@if($auction->end_date){{ date('d-M-Y H:i', strtotime($auction->end_date))}}@endif</td>
                                             <td>{{ $auction->platform->name ?? '' }}</td>
                                             <td>{{ $auction->status ?? '' }}</td>
                                             <td>
                                                <a href="{{ route('admin.auctions.edit', $auction->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{URL::to('/admin/auctions/viewCsv/'.$auction->id)}}" class="btn btn-sm btn-warning">View</a>
                                                <form action="{{ route('admin.auctions.destroy', $auction->id) }}" method="POST" style="display:inline;">
                                                   @csrf @method('DELETE')
                                                   <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
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

