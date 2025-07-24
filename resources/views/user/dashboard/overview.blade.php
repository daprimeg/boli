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
                     <h4 class="mb-0"><span class="getTotalAuctions"></span></h4>
                  </div>
                  <p class="mb-1">Total Auctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Live Auctions: </small>
                     <span class="text-heading fw-medium me-2">{{ $onlineAuctions }}</span>
                     <small class="text-body-secondary">Time Auctions: </small>
                     <span class="text-heading fw-medium me-0">{{ $timeAuctions }} </span>
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
                     <h4 class="mb-0"> {{ $inProgressAuctions }}</h4>
                  </div>
                  <p class="mb-1">Inprogress Auctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Vehicles: </small>
                     <span class="text-heading fw-medium me-2">{{ $inProgressVehicles }}</span>
                    <a href=""> <span class="text-heading fw-medium me-0">view</span></a>
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
                     <h4 class="mb-0"> {{$totalVehicles }}</h4>
                  </div>
                  <p class="mb-1">Total Vehicles</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Sold</small>
                     <span class="text-heading fw-medium me-2">{{$totalSoldVehicles }}</span>
                    <a href=""> <span class="text-heading fw-medium me-0">view</span></a>
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
                     <h4 class="mb-0">42</h4>
                  </div>
                  <p class="mb-1">Vehicle in reauctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Vehicles </small>
                     <span class="text-heading fw-medium me-2">36</span>
                    <a href=""> <span class="text-heading fw-medium me-0">view</span></a>
                  </p>
               </div>
               </div>
            </div>
            </div>
<br><br>
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card h-100">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title m-0 me-2">Online Auction</h5>
                  <div class="dropdown">
                     <button class="btn btn-secondary   border-0 p-2 me-n1 waves-effect" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Auction
                     </button>
                  
                  </div>
               </div>
               <div class="table-responsive" >
                  <table class="table table-borderless border-top" id="onlineAuctionsTable">
                     <thead class="border-bottom">
                        <tr>
                           <th>Platform</th>
                           <th>Total</th>
                           <th>Remaining</th>
                           <th>Lots</th>
                        </tr>
                     </thead>
                      <tbody >
                        

                     </tbody>
                  
                  </table>
               </div>
            </div>
         </div>
    <!-- Left Side: Stats -->
 <div class="col-md-6" style="background-color: #000f21; padding: 30px; border-radius: 10px; ">
  
  <!-- Top Heading -->
  <h4 style="margin-bottom: 30px; ">
    Vehicle Statistics <br><span style="font-size: 16px; font-weight: normal; color: #ccc;">Today</span>
  </h4>
  
  <!-- Main Content: Flexbox for chart and stats -->
  <div style="display: flex; justify-content: space-between; ">
    
    <!-- Left Side: Stats -->
    <div class="chart-legend" style="">

        <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
            <div class="dot-box"><div class="dot"></div></div>
            <span style="">           
               <span style="font-size: 25px; color: white ; ">Sold </span> <br>{{$totalSoldVehicles }}</span> 
            </div>
        <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
             <div class="dot-box"><div class="dot"></div></div>   
               <span>           
               <span style="font-size: 25px; color: white ; ">Provisional </span> <br>{{$provisionalVehicles }}</span>
        </div>
        <div class="legend-item" style="display: flex; align-items: center; margin-bottom: 20px;">
            <div class="dot-box"><div class="dot"></div></div>
               <span>           
               <span style="font-size: 25px; color: white ; ">Not Sold </span> <br>{{$notSoldVehicles }}</span>
        </div>
    </div>

    <!-- Right Side: Chart -->
    <div style="flex: 1; position: relative; display: flex; justify-content: center; align-items: center;">
        <canvas id="ringChart" width="350px" height="350px"></canvas>
        <div style="position: absolute; font-size: 20px; font-weight: bold; color: white;"> done 
            1255
        </div>
        <div style="position: absolute; font-size: 20px; font-weight: bold; color: white;"><br><br><br> remaining({{$totalVehicles }})
            
        </div>
    </div>
  </div>
</div>
         </div>
<br><br>
    <div class="row">
        <div class="col-md-4 col-8">
            <div class="card h-100">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title m-0 me-2">Time Auction</h5>
                  <div class="dropdown">
                     <button class="btn btn-secondary   border-0 p-2 me-n1 waves-effect" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Auction
                     </button>
                  
                  </div>
               </div>
               <div class="table-responsive" >
                  <table class="table table-borderless border-top" id="timeAuctionsTable">
                     <thead class="border-bottom">
                        <tr>
                           <th>Platform</th>
                           <th>Total</th>
                           <th>End Time</th>
                        </tr>
                     </thead>
                      <tbody>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
    <!-- Left Side: Stats -->
     <div class="col-md-8 col-12">
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