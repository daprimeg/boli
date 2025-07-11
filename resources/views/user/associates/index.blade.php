@include('user.partial.layout')
<div class="content-wrapper">
<div class="flex-grow-1 container-p-y container-xxl">
<div class="card">
   <!-- <h5 class="card-header">VinSearch</h5> -->
   <div class="col-xxl-12">
      <div class="card">
         <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
               <div class="row mx-3 justify-content-between">
                  <div class="align-items-center dt-layout-start col-md-auto col-12 d-flex justify-content-center justify-content-md-start gap-2">
                     <div class="dt-length me-0 mb-md-6 mb-6">
                        <label for="dt-length-0">Show</label>
                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select" id="dt-length-0">
                           <option value="6">6</option>
                           <option value="10">10</option>
                           <option value="25">25</option>
                           <option value="50">50</option>
                           <option value="100">100</option>
                        </select>
                     </div>
                     
                     <div class="dt-buttons btn-group flex-wrap mb-0">
                        <a href="{{ route('associate-users.create') }}" class="btn btn-primary waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" role="button">
                          <span>
                            <i class="icon-base icon-16px ti tabler-plus me-md-2"></i>
                            <span class="d-md-inline-block d-none">Create Associate</span>
                          </span>
                        </a>
                     </div>

                  </div>
                  <div class="d-md-flex align-items-center dt-layout-end col-md-auto justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0">
                     <div class="dt-search"><input type="search" class="form-control" id="dt-search-0" placeholder="Search Invoice" aria-controls="DataTables_Table_0"><label for="dt-search-0"></label></div>
                     <div class="invoice_status">
                        <select id="UserRole" class="form-select">
                           <option value=""> Invoice Status </option>
                           <option value="Downloaded" class="text-capitalize">Downloaded</option>
                           <option value="Draft" class="text-capitalize">Draft</option>
                           <option value="Paid" class="text-capitalize">Paid</option>
                           <option value="Partial Payment" class="text-capitalize">Partial Payment</option>
                           <option value="Past Due" class="text-capitalize">Past Due</option>
                           <option value="Sent" class="text-capitalize">Sent</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="justify-content-between dt-layout-table">
                  <div class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">
    <table class="table table-sm datatable-invoice border-top dataTable" id="interestsTable" style="width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($associates as $associate)
        <tr>
            <td>{{ $associate->first_name }} {{ $associate->last_name }}</td>
            <td>{{ $associate->email }}</td>
            <td>{{ $associate->phone }}</td>
<td class="d-flex gap-2">
    <a href="{{ route('associate-users.edit', $associate) }}" class="btn btn-sm btn-primary">
        <i class="fas fa-edit"></i> Edit
    </a>

    <form method="POST" action="{{ route('associate-users.destroy', $associate) }}" onsubmit="return confirm('Are you sure you want to delete this associate?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">
            <i class="fas fa-trash-alt"></i> Delete
        </button>
    </form>
</td>

        </tr>
        @endforeach
        </tbody>
    </table>
                  </div>
               </div>
               <div class="row mx-3 justify-content-between">
                  <div class="align-items-center dt-layout-start col-md-auto col-12 d-flex justify-content-center justify-content-md-start gap-2">
                     <div class="dt-info" aria-live="polite" id="DataTables_Table_0_info" role="status">Showing 1 to 6 of 50 entries</div>
                  </div>
                  <div class="d-md-flex align-items-center dt-layout-end col-md-auto justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0">
                     <div class="dt-paging">
                        <nav aria-label="pagination">
                           <ul class="pagination">
                              <li class="dt-paging-button page-item disabled"><button class="page-link first waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1"><i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i></button></li>
                              <li class="dt-paging-button page-item disabled"><button class="page-link previous waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i></button></li>
                              <li class="dt-paging-button page-item active"><button class="page-link waves-effect waves-light" role="link" type="button" aria-controls="DataTables_Table_0" aria-current="page" data-dt-idx="0">1</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="1">2</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="2">3</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="3">4</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="4">5</button></li>
                              <li class="dt-paging-button page-item disabled"><button class="page-link ellipsis waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" data-dt-idx="ellipsis" tabindex="-1">…</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="8">9</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link next waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Next" data-dt-idx="next"><i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i></button></li>
                              <li class="dt-paging-button page-item"><button class="page-link last waves-effect" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Last" data-dt-idx="last"><i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i></button></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('user.partial.footer')