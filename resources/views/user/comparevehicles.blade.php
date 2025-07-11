@include('user.partial.layout')
<div class="content-wrapper">
<div class="flex-grow-1 container-p-y container-xxl">
   
      <!-- <h5 class="card-header">VinSearch</h5> -->
      <div class="col-xxl-12">
         <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
               <div class="card-title mb-0">
                  <h5 class="m-0 me-2">Compare Auction to Auction</h5>
               </div>
               <div class="dropdown">
                  <button class="btn btn-text-secondary rounded-pill  p-2 me-n1 waves-effect" type="button" id="routeVehicles" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-base ti tabler-dots-vertical icon-md"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="routeVehicles">
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">Select All</a>
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
                  </div>
               </div>
            </div>
            <div class="card-datatable border-top">
               <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                  <div class="row mt-2 justify-content-between">
                     <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto my-0"></div>
                     <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto my-0"></div>
                  </div>
                  <div class="justify-content-between dt-layout-table mt-n2">
                     <div class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">
                        <table class="dt-route-vehicles table dataTable dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                           <colgroup>
                              <col data-dt-column="1" style="width: 62.7188px;">
                              <col data-dt-column="2" style="width: 209.438px;">
                              <col data-dt-column="3" style="width: 297.562px;">
                              <col data-dt-column="4" style="width: 295px;">
                              <col data-dt-column="5" style="width: 248.891px;">
                              <col data-dt-column="6" style="width: 278.391px;">
                           </colgroup>
                           <thead>
                              <tr>
                                 <th data-dt-column="0" class="control dt-orderable-none dtr-hidden" rowspan="1" colspan="1" aria-label="" style="display: none;"><span class="dt-column-title"></span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="1" rowspan="1" colspan="1" class="dt-select dt-orderable-none" aria-label=""><span class="dt-column-title"></span><span class="dt-column-order"></span><input class="form-check-input" type="checkbox" aria-label="Select all rows"></th>
                                 <th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-asc" aria-sort="ascending" aria-label="location: Activate to invert sorting" tabindex="0"><span class="dt-column-title" role="button">location</span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="3" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="starting route: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">starting route</span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="4" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="ending route: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">ending route</span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="5" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="warnings: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">warnings</span><span class="dt-column-order"></span></th>
                                 <th class="w-20 dt-orderable-asc dt-orderable-desc dt-type-numeric" data-dt-column="6" rowspan="1" colspan="1" aria-label="progress: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">progress</span><span class="dt-column-order"></span></th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                 <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                                 <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                       <div class="avatar-wrapper">
                                          <div class="avatar me-4">
                                             <span class="avatar-initial rounded-circle bg-label-secondary">
                                             <i class="icon-base ti tabler-car icon-lg"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-column">
                                          <a class="text-heading text-nowrap fw-medium" href="app-logistics-fleet.html">VOL-159145</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Paris 19, France
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Dresden, Germany
                                    </div>
                                 </td>
                                 <td>
                                    <span class="badge rounded bg-label-success">
                                    No Warnings
                                    </span>
                                 </td>
                                 <td class="dt-type-numeric">
                                    <div class="d-flex align-items-center">
                                       <div class="progress w-100" style="height: 8px;">
                                          <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                          </div>
                                       </div>
                                       <div class="text-body ms-3">60%</div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                 <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                                 <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                       <div class="avatar-wrapper">
                                          <div class="avatar me-4">
                                             <span class="avatar-initial rounded-circle bg-label-secondary">
                                             <i class="icon-base ti tabler-car icon-lg"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-column">
                                          <a class="text-heading text-nowrap fw-medium" href="app-logistics-fleet.html">VOL-182964</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Saintes, France
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Roma, Italy
                                    </div>
                                 </td>
                                 <td>
                                    <span class="badge rounded bg-label-primary">
                                    Fuel Problems
                                    </span>
                                 </td>
                                 <td class="dt-type-numeric">
                                    <div class="d-flex align-items-center">
                                       <div class="progress w-100" style="height: 8px;">
                                          <div class="progress-bar" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                                          </div>
                                       </div>
                                       <div class="text-body ms-3">82%</div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                 <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                                 <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                       <div class="avatar-wrapper">
                                          <div class="avatar me-4">
                                             <span class="avatar-initial rounded-circle bg-label-secondary">
                                             <i class="icon-base ti tabler-car icon-lg"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-column">
                                          <a class="text-heading text-nowrap fw-medium" href="app-logistics-fleet.html">VOL-276904</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Aulnay-sous-Bois, France
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Torino, Italy
                                    </div>
                                 </td>
                                 <td>
                                    <span class="badge rounded bg-label-warning">
                                    Temperature Not Optimal
                                    </span>
                                 </td>
                                 <td class="dt-type-numeric">
                                    <div class="d-flex align-items-center">
                                       <div class="progress w-100" style="height: 8px;">
                                          <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                          </div>
                                       </div>
                                       <div class="text-body ms-3">30%</div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                 <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                                 <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                       <div class="avatar-wrapper">
                                          <div class="avatar me-4">
                                             <span class="avatar-initial rounded-circle bg-label-secondary">
                                             <i class="icon-base ti tabler-car icon-lg"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-column">
                                          <a class="text-heading text-nowrap fw-medium" href="app-logistics-fleet.html">VOL-300198</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       West Palm Beach, USA
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Dresden, Germany
                                    </div>
                                 </td>
                                 <td>
                                    <span class="badge rounded bg-label-danger">
                                    Ecu Not Responding
                                    </span>
                                 </td>
                                 <td class="dt-type-numeric">
                                    <div class="d-flex align-items-center">
                                       <div class="progress w-100" style="height: 8px;">
                                          <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                          </div>
                                       </div>
                                       <div class="text-body ms-3">90%</div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                 <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                                 <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                       <div class="avatar-wrapper">
                                          <div class="avatar me-4">
                                             <span class="avatar-initial rounded-circle bg-label-secondary">
                                             <i class="icon-base ti tabler-car icon-lg"></i>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="d-flex flex-column">
                                          <a class="text-heading text-nowrap fw-medium" href="app-logistics-fleet.html">VOL-302781</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Köln, Germany
                                    </div>
                                 </td>
                                 <td>
                                    <div class="text-body">
                                       Laspezia, Italy
                                    </div>
                                 </td>
                                 <td>
                                    <span class="badge rounded bg-label-info">
                                    Oil Leakage
                                    </span>
                                 </td>
                                 <td class="dt-type-numeric">
                                    <div class="d-flex align-items-center">
                                       <div class="progress w-100" style="height: 8px;">
                                          <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100">
                                          </div>
                                       </div>
                                       <div class="text-body ms-3">24%</div>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot></tfoot>
                        </table>
                     </div>
                  </div>
                  <div class="row mx-3 justify-content-between">
                     <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto my-0">
                        <div class="dt-info" aria-live="polite" id="DataTables_Table_0_info" role="status">Showing 1 to 5 of 25 entries</div>
                     </div>
                     <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto my-0">
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
      </br>




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
                        <div class="dt-buttons btn-group flex-wrap mb-0"><button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="icon-base icon-16px ti tabler-plus me-md-2"></i><span class="d-md-inline-block d-none">Create Invoice</span></span></button> </div>
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
                        <table class="table table-sm datatable-invoice border-top dataTable dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                           <colgroup>
                              <col data-dt-column="1" style="width: 81.8906px;">
                              <col data-dt-column="2" style="width: 131.516px;">
                              <col data-dt-column="3" style="width: 137.109px;">
                              <col data-dt-column="4" style="width: 130.969px;">
                              <col data-dt-column="5" style="width: 204.812px;">
                              <col data-dt-column="7" style="width: 233.703px;">
                           </colgroup>
                           <thead>
                              <tr>
                                 <th data-dt-column="0" class="control dt-orderable-asc dt-orderable-desc dtr-hidden" rowspan="1" colspan="1" aria-label=": Activate to sort" tabindex="0" style="display: none;"><span class="dt-column-title" role="button"></span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="1" rowspan="1" colspan="1" class="dt-select dt-orderable-none" aria-label=""><span class="dt-column-title"></span><span class="dt-column-order"></span><input class="form-check-input" type="checkbox" aria-label="Select all rows"></th>
                                 <th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-desc" aria-sort="descending" aria-label="#: Activate to remove sorting" tabindex="0"><span class="dt-column-title" role="button">#</span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="3" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="4" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-type-numeric" aria-label="Total: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Total</span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="5" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Issued Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Issued Date</span><span class="dt-column-order"></span></th>
                                 <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                 <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
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

@include('user.partial.footer')