<div class=" p-4 d-flex align-items-center justify-content-start gap-3 mb-5 mx-0 pl-4"
    style="background-color: #006aee; margin-top: -60px;" id="interest-buttons-container">

<div class=" "style=" color: black; margin-left: 40px;">
    Select all Intrest
    </div>


    <div class="d-flex align-items-center gap-3 overflow-x-auto flex-nowrap" id="interest-buttons-wrapper"
        style="max-width: 620px; color: black;">
        <span class=" small fw-medium me-2 flex-shrink-0">Select Interest</span>
        <button class="btn btn-primary rounded-3 fw-medium border-solid interest-button active flex-shrink-0"
            style="color: rgb(236, 229, 229) !important;">Toyota Prius I </button>
    </div>


    <a href="{{ url('/interest/create') }}"
        class="btn  fw-medium  d-flex align-items-center interest-button "
        style= "border-left: 1px solid var(--bs-b-color); border-radius:0%"
        
        id="add-interest-button">
        <svg  class="text-secondary text-white" style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4
            
            ">
            </path>
        </svg>
        <span class="ms-1" style="border: none; color: white; ">Add</span>
    </a>
    <span
        class="ms-auto  fw-medium flex-shrink-0 btn rounded-3 fw-medium"
        style="
    border: 1px solid var(--bs-b-color); background-color: white; color: black;">
        Customize</span>
</div>


<div class="row g-6 " style="padding: 0rem 4rem">
    <div class="col-md-12">

        @include('user.dashboard.infocard')

        <br><br>
        <div class="row g-4" style="margin-top: -30px;">

            <div class="col-md-8 ">
                <div id="lookbestauction" style="padding: 30px;" class="card text-white  rounded-4 shadow-sm h-100">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <h5 class="mb-0 fw-semibold">Look Best Auction</h5>
                                <small class="text-secondary">Weekly</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control platform" name="paltform_id[]" multiple>
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="">
                                <canvas class="chart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="labels-container row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Valuation -->
            <div class="col-md-4">
                <div class="getValuation card text-white  rounded-4 shadow-sm h-100 valuesation"
                    style="margin-left: 8px">
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
                    <div class="card-body p-0">
                        <div class="container mt-4 p-0">

                            <div
                                class="valuation-header "style="background-color: #006aee !important; border-radius: 0px;">
                                <div class="d-flex">
                                    <div class="col-md-8 p-5 ">
                                        <small class="text-muted px-5" style="color: black; font-size: var(--font-p1)">Our price estim ates use
                                            historical auction data and market trends to suggest likely values. <a
                                                href="#" class=" text-decoration-none" style="color: black">Learn
                                                more</a></small>
                                    </div>
                                    <div class=" justify-content-between align-items-center pt-5"
                                        style="font-size: 25px">
                                        <img style="width: 35px; height:35px;"
                                            src="{{ asset('/public/themeadmin/autobolidp.png') }}" alt="" />
                                        <strong>£0</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="rows">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}



        </div>
        <!-- Left Side: Stats -->

        <br><br>
        <div class="row" style="margin-top: -20px;">


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
                                    <th style="font-size: var(--font-p2) !important;">Platform</th>
                                    <th style="font-size: var(--font-p2) !important;">Auction Type</th>
                                    <th style="font-size: var(--font-p2) !important;">Sold</th>
                                    <th style="font-size: var(--font-p2) !important;">Provisional</th>
                                    <th style="font-size: var(--font-p2) !important;">Not Sold</th>
                                </tr>
                            </thead>
                            <tbody class="rows tb-data-fonts">

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
                                <span class="vehicles_count">0 Vehicles</span>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ url('/auctionfinder') }}" target="_blank">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless border-top" id="">
                            <thead class="border-bottom">
                                <tr>
                                    <th style="font-size: var(--font-p2) !important;">Vehicle</th>
                                    <th style="font-size: var(--font-p2) !important;">Mileage</th>
                                    <th style="font-size: var(--font-p2) !important;">Report</th>
                                    <th style="font-size: var(--font-p2) !important;">Autoboli</th>
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
