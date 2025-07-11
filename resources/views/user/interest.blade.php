@include('user.partial.layout')
<div class="content-wrapper">
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Vehicles overview -->
   <div class="col-xxl-12">










    












      <div class="card">
         <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
               <div class="row mx-3 justify-content-between">




<div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-3 mt-3">
    <!-- Left: Show dropdown -->
    <div class="d-flex align-items-center">
        <label for="dt-length-0" class="me-2 mb-0">Show</label>
        <select name="DataTables_Table_0_length" id="dt-length-0" aria-controls="DataTables_Table_0" class="form-select w-auto">
            <option value="6">6</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>

    <!-- Right: Filter dropdowns -->
    <div class="d-flex flex-wrap gap-2 justify-content-end">
        <div class="invoice_status">
            <select id="AuctionSelect" class="form-select">
                <option value="">Select Auction</option>
                <option value="BCA">BCA</option>
                <option value="Aston Barclay">Aston Barclay</option>
                <option value="Manheim">Manheim</option>
                <option value="Central Car Auction">Central Car Auction</option>
                <option value="Fleet">Fleet</option>
                <option value="ProTruck">ProTruck</option>
            </select>
        </div>
        <div class="invoice_status">
            <select id="DateRange" class="form-select">
                <option value="">Select Range</option>
                <option value="Upcoming">Upcoming</option>
                <option value="Today">Today</option>
                <option value="Yesterday">Yesterday</option>
                <option value="Last Week">Last Week</option>
                <option value="Last Month">Last Month</option>
                <option value="Past 3 Months">Past 3 Months</option>
            </select>
        </div>
        <div class="invoice_status">
            <select id="Interest" class="form-select">
                <option value="">Primary</option>
                <option value="Toyota">Toyota</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Raksha">Raksha</option>
                <option value="CD 70">CD 70</option>
                <option value="Tri-Cycle">Tri-Cycle</option>
                <option value="Kia">Kia</option>
            </select>
        </div>
        <div class="invoice_status">
            <select id="Interest" class="form-select">
                <option value="">Secondary</option>
                <option value="Toyota">Toyota</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Raksha">Raksha</option>
                <option value="CD 70">CD 70</option>
                <option value="Tri-Cycle">Tri-Cycle</option>
                <option value="Kia">Kia</option>
            </select>
        </div>
        <div class="invoice_status">
            <select id="Interest" class="form-select">
                <option value="">Optional</option>
                <option value="Toyota">Toyota</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Raksha">Raksha</option>
                <option value="CD 70">CD 70</option>
                <option value="Tri-Cycle">Tri-Cycle</option>
                <option value="Kia">Kia</option>
            </select>
        </div>
    </div>
</div>



                  
                  
               </div>
               <div class="justify-content-between dt-layout-table">
                  <div class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">
                     <table class="table table-sm datatable-invoice border-top dataTable dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                        <colgroup>
                           <col data-dt-column="1" style="width: 81.8906px;">
                           <col data-dt-column="2" style="width: 131.516px;">
                           <col data-dt-column="3" style="width: 137.109px;">
                           <col data-dt-column="4" style="width: 130.969px;">
                           <col data-dt-column="5" style="width: 204.812px;">
                           <col data-dt-column="5" style="width: 204.812px;">
                           <col data-dt-column="7" style="width: 233.703px;">
                        </colgroup>
                        <thead>
                           <tr>
                              <th data-dt-column="0" class="control dt-orderable-asc dt-orderable-desc dtr-hidden" rowspan="1" colspan="1" aria-label=": Activate to sort" tabindex="0" style="display: none;"><span class="dt-column-title" role="button"></span><span class="dt-column-order"></span></th>
                              <th data-dt-column="1" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-desc" aria-sort="descending" aria-label="#: Activate to remove sorting" tabindex="0"><span class="dt-column-title" role="button">Vehicle</span><span class="dt-column-order"></span></th>
                              <th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-desc" aria-sort="descending" aria-label="#: Activate to remove sorting" tabindex="0"><span class="dt-column-title" role="button">CAP Clean</span><span class="dt-column-order"></span></th>
                              <th data-dt-column="3" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">CAP Below</span><span class="dt-column-order"></span></th>
                              <th data-dt-column="4" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-type-numeric" aria-label="Total: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">CAP Average</span><span class="dt-column-order"></span></th>
                              <th data-dt-column="5" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Issued Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">AutoBoli Prediction</span><span class="dt-column-order"></span></th>
                              <th data-dt-column="6" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Issued Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Value / Percentage</span><span class="dt-column-order"></span></th>
                              <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none" aria-label="Actions"><span class="dt-column-title">Auction Status</span><span class="dt-column-order"></span></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                              <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                              <td>
                                 <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
                                    Sent<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 05/09/2020
                                    " data-bs-original-title="<span>
                                    Sent<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 05/09/2020
                                    ">
                                 <span class="badge p-1_5 rounded-pill bg-label-secondary"><i class="icon-base icon-16px ti tabler-circle-check"></i></span>
                                 </span>
                              </td>
                              <td class="dt-type-numeric"><span class="d-none">3077</span>$3077</td>
                              <td>
                                 <span class="d-none">20200508</span>
                                 09 May 2020
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a>
                                    <div class="dropdown">
                                       <a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                              <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5041</a></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                              <td>
                                 <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
                                    Sent<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 11/19/2020
                                    " data-bs-original-title="<span>
                                    Sent<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 11/19/2020
                                    ">
                                 <span class="badge p-1_5 rounded-pill bg-label-secondary"><i class="icon-base icon-16px ti tabler-circle-check"></i></span>
                                 </span>
                              </td>
                              <td class="dt-type-numeric"><span class="d-none">2230</span>$2230</td>
                              <td>
                                 <span class="d-none">20201118</span>
                                 19 Nov 2020
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a>
                                    <div class="dropdown">
                                       <a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                              <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5027</a></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                              <td>
                                 <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
                                    Partial Payment<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 09/25/2020
                                    " data-bs-original-title="<span>
                                    Partial Payment<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 09/25/2020
                                    ">
                                 <span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>
                                 </span>
                              </td>
                              <td class="dt-type-numeric"><span class="d-none">2787</span>$2787</td>
                              <td>
                                 <span class="d-none">20200924</span>
                                 25 Sept 2020
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a>
                                    <div class="dropdown">
                                       <a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                              <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5024</a></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                              <td>
                                 <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
                                    Partial Payment<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> -$202<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 08/02/2020
                                    " data-bs-original-title="<span>
                                    Partial Payment<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> -$202<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 08/02/2020
                                    ">
                                 <span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>
                                 </span>
                              </td>
                              <td class="dt-type-numeric"><span class="d-none">5285</span>$5285</td>
                              <td>
                                 <span class="d-none">20200801</span>
                                 02 Aug 2020
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a>
                                    <div class="dropdown">
                                       <a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                              <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5020</a></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                              <td>
                                 <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
                                    Downloaded<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 12/15/2020
                                    " data-bs-original-title="<span>
                                    Downloaded<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 12/15/2020
                                    ">
                                 <span class="badge p-1_5 rounded-pill bg-label-info"><i class="icon-base icon-16px ti tabler-arrow-down-circle"></i></span>
                                 </span>
                              </td>
                              <td class="dt-type-numeric"><span class="d-none">5219</span>$5219</td>
                              <td>
                                 <span class="d-none">20201214</span>
                                 15 Dec 2020
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a>
                                    <div class="dropdown">
                                       <a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                              <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#4995</a></td>
                              <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                              <td>
                                 <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
                                    Partial Payment<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 06/09/2020
                                    " data-bs-original-title="<span>
                                    Partial Payment<br>
                                    <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
                                    <span class=&quot;fw-medium&quot;>Due Date:</span> 06/09/2020
                                    ">
                                 <span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>
                                 </span>
                              </td>
                              <td class="dt-type-numeric"><span class="d-none">3313</span>$3313</td>
                              <td>
                                 <span class="d-none">20200608</span>
                                 09 Jun 2020
                              </td>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a>
                                    <div class="dropdown">
                                       <a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                        <tfoot></tfoot>
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
                              <li class="dt-paging-button page-item disabled"><button class="page-link first" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1"><i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i></button></li>
                              <li class="dt-paging-button page-item disabled"><button class="page-link previous" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i></button></li>
                              <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" aria-current="page" data-dt-idx="0">1</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="1">2</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="2">3</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="3">4</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="4">5</button></li>
                              <li class="dt-paging-button page-item disabled"><button class="page-link ellipsis" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" data-dt-idx="ellipsis" tabindex="-1">…</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="8">9</button></li>
                              <li class="dt-paging-button page-item"><button class="page-link next" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Next" data-dt-idx="next"><i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i></button></li>
                              <li class="dt-paging-button page-item"><button class="page-link last" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Last" data-dt-idx="last"><i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i></button></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--/ Vehicles overview -->
</div>
@include('user.partial.footer')