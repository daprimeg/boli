<div class="row g-6">  
     <div class="col-md-12">
        @include('user.dashboard.infocard')
         <br><br>


         <div class="row" style=" margin-top: -80px;">
             <div class="getOnlineAuctions col-md-6 col-12">
                 <div class="card h-100">
                     <div class="card-header">
                         <div class="row">
                             <div class="col-md-6">
                                 <h5 class="card-title m-0 me-2">Online Auction</h5>
                             </div>
                             <div class="col-md-6 ">
                                 <select   style="background-color:black !important;  color:white !important;  height: 40px !important;  overflow-x: auto !important;  overflow-y: hidden !important;   white-space: nowrap !important;   display: flex !important;  align-items: center;" class="form-control platform"  name="paltform_id[]" multiple>
                                     <option value="">Select </option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="table-responsive">
                         <table class="table table-borderless border-top" id="onlineAuctionsTable">
                             <thead class="border-bottom">
                                 <tr>
                                     <th>Platform</th>
                                     <th>Total Auction</th>
                                     <th>Remaining</th>
                                     <th>Lots</th>
                                 </tr>
                             </thead>
                             <tbody class="rows">

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <!-- Left Side: Stats -->
             <div class="col-md-6 vehicleStates"
                 style="background-color: #000f21; padding: 30px; border-radius: 10px; ">
                 <div style="margin-bottom: 60px; ">
                  <h4 class="pb-0 mb-0">Vehicle Statistics </h4>
                       <span class="mt-0 pt-0" style=" font-size: 16px; font-weight: normal; color: #ccc; padding-top: -4px;">Today</span>
                     </div>
                 
                 <div class="row">
                    <div class="col-6" style="">
                     <div style="margin-bottom: 60px">

                        <h2 class="mb-0">254</h2>
                        <span>Remaining</span>
                     </div>

                         <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
                              <div class="dot-box"
                                 style="width: 28px;height: 28px;background-color: #003164;border-radius: 8px;display: flex;align-items: center;justify-content: center;margin-right: 10px;">
                                 <div class="dot"
                                     style=" width: 20px;  height: 20px; background-color: #0d6efd;  border-radius: 50%;">
                                 </div>
                              </div>
                             <span >
                                 <span style="font-size: 25px; color: white;">Sold </span> <br>
                                 <span class="sold"></span>
                             </span>
                         </div>
                         <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
                             <div class="dot-box"
                                 style="width: 28px;height: 28px;background-color: #003164;border-radius: 8px;display: flex;align-items: center;justify-content: center;margin-right: 10px;">
                                 <div class="dot"
                                     style=" width: 20px;  height: 20px; background-color: #0d6efd;  border-radius: 50%;">
                                 </div>
                              </div>
                             <span>
                                 <span class="" style="font-size: 25px; color: white ; ">Provisional </span><br>
                                 <span class="provisional"></span>
                             </span>
                         </div>
                         <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
                            <div class="dot-box"
                                 style="width: 28px;height: 28px;background-color: #003164;border-radius: 8px;display: flex;align-items: center;justify-content: center;margin-right: 10px;">
                                 <div class="dot"
                                     style=" width: 20px;  height: 20px; background-color: #0d6efd;  border-radius: 50%;">
                                 </div>
                              </div>
                             <span>
                                 <span style="font-size: 25px; color: white ; ">Not Sold </span><br>
                                 <span class="not_sold"></span>
                             </span>
                         </div>
                     </div>

                     <div class="Ring-chart-container col-6">
                         <div class="progress-ring" id="progressRing">
                             <!-- Segments will be generated by JavaScript -->
                         </div>
                         <div class="center-content">
                             <p class="center-label">Done</p>
                             <h3 class="center-number text-white">1255</h3>
                         </div>
                     </div>

                 </div>
             </div>


         </div>
         <br><br>


         <div class="row" style=" margin-top: -20px;">
             <div class="col-md-4 col-8 getTimeAuctions">
                 <div class="card h-100">
                     <div class="card-header">
                         <div class="row">
                             <div class="col-md-6">
                                 <h5 class="card-title m-0 me-2">Time Auction</h5>
                             </div>
                             <div class="col-md-6">
                                 <select class="form-control platform"  name="paltform_id[]" multiple>
                                     <option value="">Select</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="table-responsive">
                         <table class="table table-borderless border-top">
                             <thead class="border-bottom">
                                 <tr>
                                     <th>Platform</th>
                                     <th>Total</th>
                                     <th>End Time</th>
                                 </tr>
                             </thead>
                             <tbody class="rows">
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
             <!-- Left Side: Stats -->
             <div class="d-none col-md-8 col-12">
                 <div class="card h-100">
                     <div class="card-header d-flex justify-content-between align-items-center">
                         <h5 class="card-title m-0 me-2">Your Favourite </h5>
                         <div class="dropdown">
                             <button class="btn btn-secondary   border-0 p-2 me-n1 waves-effect" type="button"
                                 id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">
                                 Select Auction
                             </button>

                         </div>
                     </div>
                     <div class="table-responsive">
                         <table class="table table-borderless border-top" id="favouriteTable">
                             <thead class="border-bottom">
                                 <tr>
                                     <th>Platform</th>
                                     <th>Auction Type</th>
                                     <th>Total Lots</th>
                                     <th>Value</th>
                                     <th>Reauction</th>
                                 </tr>
                             </thead>
                             <tbody>


                             </tbody>

                         </table>
                     </div>
                 </div>
             </div>

         </div>


     </div>
 </div>
