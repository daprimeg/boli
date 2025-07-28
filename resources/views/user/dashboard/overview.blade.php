 <!-- Stats Cards -->
    

      <div class="row g-6"> 
            <div class="col-md-12">

        <div class="row">
          <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0"><span class="total_auctions">0</span></h4>
                  </div>
                  <p class="mb-1">Total Auctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Live Auctions:</small>
                     <span class="text-heading fw-medium me-2 online_auctions">0</span>
                     <small class="text-body-secondary">Time Auctions: </small>
                     <span class="text-heading fw-medium me-0 time_auctions">0</span>
                  </p>
               </div>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0"> <span class="inprogress_auctions"></span></h4>
                  </div>
                  <p class="mb-1">Inprogress Auctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Vehicles: </small>
                     <span class="text-heading fw-medium me-2"> <span class="inprogress_vehicles"></span></span>
                      {{-- <a href=""> <span class="text-heading fw-medium me-0">view</span></a> --}}
                  </p>
               </div>
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0"> <span class="total_vehicles" ></span></h4>
                  </div>
                  <p class="mb-1">Total Vehicles</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Sold</small>
                     <span class="text-heading fw-medium me-2"><span class="sold_vehicles"></span></span>
                    {{-- <a href=""> <span class="text-heading fw-medium me-0">view</span></a> --}}
                  </p>
               </div>
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0"><span class="duplicate_vehicles"></span></h4>
                  </div>
                  <p class="mb-1">Vehicle in reauctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Vehicles </small>
                     <span class="text-heading fw-medium me-2"><span class="duplicate_vehicles"></span></span>
                    {{-- <a href=""> <span class="text-heading fw-medium me-0">view</span></a> --}}
                  </p>
               </div>
               </div>
            </div>
            </div>
        <br><br>


       <div class="row">
        <div class="getOnlineAuctions col-md-6 col-12">
            <div class="card h-100">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="card-title m-0 me-2">Online Auction</h5>
                     </div>
                     <div class="col-md-6">
                        <select class="form-control platform" name="paltform_id[]" multiple >
                           <option value="">Select</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="table-responsive" >
                  <table class="table table-borderless border-top" id="onlineAuctionsTable">
                     <thead class="border-bottom">
                        <tr>
                           <th>Platform</th>
                           <th>Total Auction</th>
                           <th>Remaining</th>
                           <th>Lots</th>
                        </tr>
                     </thead>
                      <tbody class="rows" >
                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>

            <!-- Left Side: Stats -->
         <div class="col-md-6 vehicleStates" style="background-color: #000f21; padding: 30px; border-radius: 10px; ">
            <h4 style="margin-bottom: 30px; ">
               Vehicle Statistics <br><span style="font-size: 16px; font-weight: normal; color: #ccc;">Today</span>
            </h4>
            <div style="display: flex; justify-content: space-between; ">
               <div class="chart-legend" style="">

                  <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
                        <div class="dot-box"><div class="dot"></div></div>
                        <span style="">           
                           <span  style="font-size: 25px; color: white;">Sold </span> <br>
                           <span class="sold"></span>
                        </span> 
                        </div>
                  <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
                        <div class="dot-box"><div class="dot"></div></div>   
                           <span>           
                           <span class="" style="font-size: 25px; color: white ; ">Provisional </span>
                           <span class="provisional"></span>
                           </span>
                  </div>
                  <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
                        <div class="dot-box"><div class="dot"></div></div>
                           <span>           
                           <span style="font-size: 25px; color: white ; ">Not Sold </span>
                            <span class="not_sold"></span>
                        </span>
                  </div>
               </div>
               <div style="flex: 1; position: relative; display: flex; justify-content: center; align-items: center;">
                  <canvas id="ringChart" width="350px" height="350px"></canvas>
                  <div class="done" style="position: absolute; font-size: 20px; font-weight: bold; color: white;"></div>
                  <div class="remaining" style="position: absolute; font-size: 20px; font-weight: bold; color: white;"></div>
               </div>
            </div>
         </div>


   </div>
  <br><br>
   

<div class="row">
        <div class="col-md-4 col-8 getTimeAuctions">
            <div class="card h-100">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="card-title m-0 me-2">Time Auction</h5>
                     </div>
                     <div class="col-md-6">
                        <select class="form-control platform" name="paltform_id[]" multiple >
                           <option value="">Select</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="table-responsive" >
                  <table class="table table-borderless border-top">
                     <thead class="border-bottom">
                        <tr>
                           <th>Platform</th>
                           <th>Total</th>
                           <th>End Time</th>
                        </tr>
                     </thead>
                      <tbody class="rows" >
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
                     <button class="btn btn-secondary   border-0 p-2 me-n1 waves-effect" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Auction
                     </button>
                  
                  </div>
               </div>
               <div class="table-responsive" >
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
                      <tbody >
                        

                     </tbody>
                  
                  </table>
               </div>
            </div>
         </div>
 
         </div>

            </div>
        </div>