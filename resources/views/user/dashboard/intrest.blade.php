<div class=" rounded-3 p-4 d-flex align-items-center justify-content-between gap-3 mb-5" style="background-color: #006aee" id="interest-buttons-container">
    <!-- Scrollable wrapper for interest buttons (up to 4 visible) -->
 
    <div class="d-flex align-items-center gap-3 overflow-x-auto flex-nowrap" id="interest-buttons-wrapper" style="max-width: 620px; color: black">
        <!-- Example existing button -->
           <span class=" small fw-medium me-2 flex-shrink-0">Select Interest</span>
        <button class="btn btn-primary rounded-3 fw-medium border-solid interest-button active flex-shrink-0" style="color: rgb(236, 229, 229) !important; ">
            Toyota Prius I
        </button>
        <!-- New buttons will be appended here -->
    </div>
    <!-- Add Button fixed at the end -->
    <a href="{{url('/interest/create')}}" class="btn btn-outline-secondary rounded-3 fw-medium shadow-sm d-flex align-items-center interest-button "
        id="add-interest-button">
        <svg class="text-secondary" style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v16m8-8H4">
            </path>
        </svg>
        <span class="ms-1">Add</span>
      </a>
</div>
      
<div class="row g-6"> 
    <div class="col-md-12">

      @include('user.dashboard.infocard')
     

       <br><br>
      <div class="row g-4">
        
        <div class="col-md-8 "  >
            <div id="lookbestauction" class="card text-white p-4 rounded-4 shadow-sm h-100">
              <div class="row">
                <div class="col-md-6">
                    <div>
                      <h5 class="mb-0 fw-semibold">Look Best Auction</h5>
                      <small class="text-secondary">Weekly</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-control platform" name="paltform_id[]" multiple >
                      <option value="">Select</option>
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7">
                      <div class="" > 
                        <canvas class="chart" ></canvas>
                      </div>
                </div>
                <div class="col-md-5">
                    <div class="labels-container">
                      
                    </div>
                </div>
              </div>
            </div>
        </div>

    <!-- Right Side: Valuation -->
           <div class="col-md-4">
              <div class="getValuation card text-white  rounded-4 shadow-sm h-100 valuesation">
                    <div class="card-header">
                          <div class="row">
                            <div class="col-md-6">
                                <h5 class="">Valuation</h5>
                            </div>
                            <div class="col-md-6">
                                  <select class="form-control platform" name="platform_ids[]" multiple>
                                    <option value="">Select</option>
                                  </select>
                            </div>
                          </div>
                    </div>
                    <div class="card-body">
                          <div class="container mt-4 p-0">

                                  <div class="valuation-header "style="background-color: #006aee !important; border-radius: 0px;">
                                      <div class="d-flex">
                                          <div class="col-md-8 p-4">
                                              <small class="text-muted" style="color: black">Our price estim ates use historical auction data and market trends to suggest likely values. <a href="#" class=" text-decoration-none" style="color: black">Learn more</a></small>
                                          </div>
                                          <div class=" justify-content-between align-items-center pt-5" style="font-size: 25px">
                                              <img src="" alt=" ">
                                              <strong>£22,600</strong>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="rows">


                                  </div>

                                 

                                  <div class="d-none info-card">
                                      <div class="auction-item">
                                        <div class="logo-text">
                                          <img src="" alt="BCA ">
                                          <div>
                                            <div class="price">£22,600</div>
                                            <small class="text-muted">BCA</small>
                                          </div>
                                        </div>
                                        <div class="change down">
                                          <button class="toggle-btn minus-icon" onclick="toggleChart(this)">+</button>
                                        </div>
                                      </div>

                                    <div class="chart-section">
                                      <h5><span class="badge rounded-circle bg-primary me-2">&nbsp;</span>Past 3 months</h5>
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                          <div class="price me-2">£22,600</div>
                                          <small class="text-muted">Average</small>
                                        </div>
                                        <div class="change up">
                                          <span class="me-1">▲</span> 5.8&amp;
                                        </div>
                                      </div>
                                      <div class="chart-placeholder">
                                        <canvas id="priceChart"></canvas>
                                      </div>
                                    </div>
                              </div>
                          </div>
                       </div>
               </div>
            </div>
            {{--  --}}



          </div>
          <!-- Left Side: Stats -->
         
            <br><br>
        <div class="row">


            <!-- Left Side: Stats -->
            <div class="col-md-7 previousLots">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0 me-2">Previous Lots</h5>
                        <div class="col-md-4">
                            <select class="form-control platform" name="platform_ids[]" multiple>
                                <option value="">Select</option>
                                <!-- Populate options dynamically via backend -->
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless border-top">
                            <thead class="border-bottom">
                                <tr>
                                    <th>Platform</th>
                                    <th>Auction Type</th>
                                    <th>Sold</th>
                                    <th>Provisional</th>
                                    <th>Not Sold</th>
                                </tr>
                            </thead>
                            <tbody class="rows">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5 upComingVehicles">
                    <div class="card h-100">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                              <h5 class="card-title m-0 me-2">Upcoming Vehicles</h5>
                              <span class="vehicles_count" >0 Vehicles</span>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{url('/auctionfinder')}}" target="_blank">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" >
                        <table class="table table-borderless border-top" id="">
                            <thead class="border-bottom">
                                <tr>
                                <th>Vehicle</th>
                                <th>Mileage</th>
                                <th>Report</th>
                                <th>Autoboli</th>
                                </tr>
                            </thead>
                            <tbody class="rows">
                            </tbody>
                        </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    

  

