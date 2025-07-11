@extends('admin.partial.app')

@push('title') Dashboard @endPush

@section('content')
 
   <div class="container-fluid container-p-y">

         <div class="row">
            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-truck icon-28px"></i></span>
                     </div>
                     <h4 class="mb-0">42</h4>
                  </div>
                  <p class="mb-1">Live Auctions</p>
                  <p class="mb-0">
                     <span class="text-heading fw-medium me-2">+18.2%</span>
                     <small class="text-body-secondary">Total Vehicles: </small>
                     <span class="text-heading fw-medium me-0">100/20</span>
                  </p>
               </div>
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-warning h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-alert-triangle icon-28px"></i></span>
                     </div>
                     <h4 class="mb-0">8</h4>
                  </div>
                  <p class="mb-1">Timed Auction</p>
                  <p class="mb-0">
                     <span class="text-heading fw-medium me-2">-8.7%</span>
                     <small class="text-body-secondary">Total vehicles</small>
                  </p>
               </div>
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-danger h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-git-fork icon-28px"></i></span>
                     </div>
                     <h4 class="mb-0">27</h4>
                  </div>
                  <p class="mb-1">Running Auctions</p>
                  <p class="mb-0">
                     <span class="text-heading fw-medium me-2">+4.3%</span>
                     <small class="text-body-secondary">Total vehicles</small>
                  </p>
               </div>
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-info h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <span class="avatar-initial rounded bg-label-info"><i class="icon-base ti tabler-clock icon-28px"></i></span>
                     </div>
                     <h4 class="mb-0">13</h4>
                  </div>
                  <p class="mb-1">Reauctions</p>
                  <p class="mb-0">
                     <span class="text-heading fw-medium me-2">-2.5%</span>
                     <small class="text-body-secondary">Total vehicles</small>
                  </p>
               </div>
               </div>
            </div>

         </div>



         </br></br>



         <div class="row">
            <div class="col-xl-4">
               <div class="card">
                  <div class="d-flex align-items-end row">
                     <div class="col-7">
                        <div class="card-body text-nowrap">
                           <h5 class="card-title mb-0">Congratulations John! 🎉</h5>
                           <p class="mb-2">Best seller of the month</p>
                           <h4 class="text-primary mb-1">$48.9k</h4>
                           <a href="javascript:;" class="btn btn-primary waves-effect waves-light">View Sales</a>
                        </div>
                     </div>
                     <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                           <img src="../../assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-8 col-md-12">
               <div class="card h-100">
                  <div class="card-header d-flex justify-content-between">
                     <h5 class="card-title mb-0">Today's Auction</h5>
                     <small class="text-body-secondary">Updated 1 month ago</small>
                  </div>
                  <div class="card-body d-flex align-items-end">
                     <div class="w-100">
                        <div class="row gy-3">
                           <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                 <div class="badge rounded bg-label-primary me-4 p-2"><i class="icon-base ti tabler-chart-pie-2 icon-lg"></i></div>
                                 <div class="card-info">
                                    <h5 class="mb-0">230k</h5>
                                    <small>Sales</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                 <div class="badge rounded bg-label-info me-4 p-2"><i class="icon-base ti tabler-users icon-lg"></i></div>
                                 <div class="card-info">
                                    <h5 class="mb-0">8.549k</h5>
                                    <small>Customers</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                 <div class="badge rounded bg-label-danger me-4 p-2"><i class="icon-base ti tabler-shopping-cart icon-lg"></i></div>
                                 <div class="card-info">
                                    <h5 class="mb-0">1.423k</h5>
                                    <small>Products</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 col-6">
                              <div class="d-flex align-items-center">
                                 <div class="badge rounded bg-label-success me-4 p-2"><i class="icon-base ti tabler-currency-dollar icon-lg"></i></div>
                                 <div class="card-info">
                                    <h5 class="mb-0">$9745</h5>
                                    <small>Revenue</small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         </br></br>

         <div class="row">
         <div class="col-md-8 col-12">
            <div class="card h-100">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title m-0 me-2">Your Favourite vehicles</h5>
                  <div class="dropdown">
                     <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1 waves-effect" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList" style="">
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Download</a>
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-borderless border-top">
                     <thead class="border-bottom">
                        <tr>
                           <th>Vehicles</th>
                           <th>Total</th>
                           <th>Sold</th>
                           <th>Remaining</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="pt-5">
                              <div class="d-flex justify-content-start align-items-center">
                                 <div class="me-4">
                                    <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30">
                                 </div>
                                 <div class="d-flex flex-column">
                                    <p class="mb-0 text-heading">*4230</p>
                                    <small class="text-body">Credit</small>
                                 </div>
                              </div>
                           </td>
                           <td class="pt-5">
                              <div class="d-flex flex-column">
                                 <p class="mb-0 text-heading">Sent</p>
                                 <small class="text-body text-nowrap">17 Mar 2022</small>
                              </div>
                           </td>
                           <td class="pt-5"><span class="badge bg-label-success">Verified</span></td>
                           <td class="pt-5">
                              <p class="mb-0 text-heading">+$1,678</p>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center">
                                 <div class="me-4">
                                    <img src="../../assets/img/icons/payments/master-card-img.png" alt="Visa" height="30">
                                 </div>
                                 <div class="d-flex flex-column">
                                    <p class="mb-0 text-heading">*5578</p>
                                    <small class="text-body">Credit</small>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex flex-column">
                                 <p class="mb-0 text-heading">Sent</p>
                                 <small class="text-body text-nowrap">12 Feb 2022</small>
                              </div>
                           </td>
                           <td><span class="badge bg-label-danger">Rejected</span></td>
                           <td>
                              <p class="mb-0 text-heading">-$839</p>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center">
                                 <div class="me-4">
                                    <img src="../../assets/img/icons/payments/american-express-img.png" alt="Visa" height="30">
                                 </div>
                                 <div class="d-flex flex-column">
                                    <p class="mb-0 text-heading">*4567</p>
                                    <small class="text-body">ATM</small>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex flex-column">
                                 <p class="mb-0 text-heading">Sent</p>
                                 <small class="text-body text-nowrap">28 Feb 2022</small>
                              </div>
                           </td>
                           <td><span class="badge bg-label-success">Verified</span></td>
                           <td>
                              <p class="mb-0 text-heading">+$435</p>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center">
                                 <div class="me-4">
                                    <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30">
                                 </div>
                                 <div class="d-flex flex-column">
                                    <p class="mb-0 text-heading">*5699</p>
                                    <small class="text-body">Credit</small>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex flex-column">
                                 <p class="mb-0 text-heading">Sent</p>
                                 <small class="text-body text-nowrap">8 Jan 2022</small>
                              </div>
                           </td>
                           <td><span class="badge bg-label-secondary">Pending</span></td>
                           <td>
                              <p class="mb-0 text-heading">+$2,345</p>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="d-flex justify-content-start align-items-center">
                                 <div class="me-4">
                                    <img src="../../assets/img/icons/payments/visa-img.png" alt="Visa" height="30">
                                 </div>
                                 <div class="d-flex flex-column">
                                    <p class="mb-0 text-heading">*5699</p>
                                    <small class="text-body">Credit</small>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex flex-column">
                                 <p class="mb-0 text-heading">Sent</p>
                                 <small class="text-body text-nowrap">8 Jan 2022</small>
                              </div>
                           </td>
                           <td><span class="badge bg-label-danger">Rejected</span></td>
                           <td>
                              <p class="mb-0 text-heading">-$234</p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-xxl-4 col-md-6 col-12">
            <div class="card h-100">
               <div class="card-header d-flex justify-content-between">
                  <div class="card-title mb-0">
                     <h5 class="mb-1">Previous Auction Statistics</h5>
                     <p class="card-subtitle">38.4k Visitors</p>
                  </div>
                  <div class="dropdown">
                     <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1 waves-effect" type="button" id="sourceVisits" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sourceVisits" style="">
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Download</a>
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">View All</a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <ul class="list-unstyled mb-0">
                     <li class="mb-6">
                        <div class="d-flex align-items-center">
                           <div class="badge bg-label-secondary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-shadow icon-md"></i></div>
                           <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                 <h6 class="mb-0">Direct Source</h6>
                                 <small class="text-body">Direct link click</small>
                              </div>
                              <div class="d-flex align-items-center">
                                 <p class="mb-0">1.2k</p>
                                 <div class="ms-4 badge bg-label-success">+4.2%</div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="mb-6">
                        <div class="d-flex align-items-center">
                           <div class="badge bg-label-secondary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-globe icon-md"></i></div>
                           <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                 <h6 class="mb-0">Social Network</h6>
                                 <small class="text-body">Social Channels</small>
                              </div>
                              <div class="d-flex align-items-center">
                                 <p class="mb-0">31.5k</p>
                                 <div class="ms-4 badge bg-label-success">+8.2%</div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="mb-6">
                        <div class="d-flex align-items-center">
                           <div class="badge bg-label-secondary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-mail icon-md"></i></div>
                           <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                 <h6 class="mb-0">Email Newsletter</h6>
                                 <small class="text-body">Mail Campaigns</small>
                              </div>
                              <div class="d-flex align-items-center">
                                 <p class="mb-0">893</p>
                                 <div class="ms-4 badge bg-label-success">+2.4%</div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="mb-6">
                        <div class="d-flex align-items-center">
                           <div class="badge bg-label-secondary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-external-link icon-md"></i></div>
                           <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                 <h6 class="mb-0">Referrals</h6>
                                 <small class="text-body">Impact Radius Visits</small>
                              </div>
                              <div class="d-flex align-items-center">
                                 <p class="mb-0">342</p>
                                 <div class="ms-4 badge bg-label-danger">-0.4%</div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="mb-6">
                        <div class="d-flex align-items-center">
                           <div class="badge bg-label-secondary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-ad icon-md"></i></div>
                           <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                 <h6 class="mb-0">ADVT</h6>
                                 <small class="text-body">Google ADVT</small>
                              </div>
                              <div class="d-flex align-items-center">
                                 <p class="mb-0">2.15k</p>
                                 <div class="ms-4 badge bg-label-success">+9.1%</div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="d-flex align-items-center">
                           <div class="badge bg-label-secondary text-body p-2 me-4 rounded"><i class="icon-base ti tabler-star icon-md"></i></div>
                           <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                 <h6 class="mb-0">Other</h6>
                                 <small class="text-body">Many Sources</small>
                              </div>
                              <div class="d-flex align-items-center">
                                 <p class="mb-0">12.5k</p>
                                 <div class="ms-4 badge bg-label-success">+6.2%</div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         </div>

         </br></br>



            <div class="row">
               <div class="col-xxl-12">
                  <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title m-0 me-2">Your Favourite Vehicle at Reauction</h5>
                  <div class="dropdown">
                     <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1 waves-effect" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList" style="">
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Download</a>
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
                     </div>
                  </div>
               </div>            <div class="card-datatable table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                  
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
            </div>
      </div>
@endsection