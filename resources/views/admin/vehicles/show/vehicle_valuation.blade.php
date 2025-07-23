<style> 
.circle-checkbox {
  display: flex;
  align-items: center;
  position: relative;
  padding-left: 28px;
  margin-bottom: 10px;
  font-size: 14px;
  color: white;
  cursor: pointer;
}

.circle-checkbox input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.circle-checkbox .circle {
  position: absolute;
  left: 0;
  top: 2px;
  width: 16px;
  height: 16px;
  background-color: transparent;
  border: 2px solid var(--bs-border-color) !important; /* default border */
  border-radius: 6px; /* lightly rounded box */
  box-sizing: border-box;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* inner dot when checked */
.circle-checkbox input:checked + .circle::after {
  content: "";
  width: 8px;
  height: 8px;
  background-color: #0d6efd;
  border-radius: 50%;
}

/* if checked, change outer border */
.circle-checkbox input:checked + .circle {
  border-color: #0d6efd;
}

/* disabled style */
.circle-checkbox.disabled {
  color: #6c757d;
  cursor: not-allowed;
}


</style>
<div class="p-4">
    <div class="row"  style="padding: 2px 18px; border-radius: 10px;  !important; margin: 20px 10px">

        {{-- LEFT: Image Preview + Thumbnails --}}
        <div class="col-7"  style=" border-radius: 10px; background-color: var(--bs-navbar-bg) !important; border: 2px solid #192534">
            <div class="p-3  rounded" style="background-color: var(--bs-navbar-bg)">
                {{-- Main Image --}}
        <div  style="display: flex; justify-content:space-between; align-items: center">
            <div>

                <h2 class="text-xl font-bold">Trad history</h2>
            </div>
            
            <div class="flex gap-2 text-sm">
            <form method="GET" action="{{ URL::to('/vehicles/index')}}">


               <div class="row">
                    <!-- Data Dropdown (left) -->
                    <div class="col-5">
                        <div class="form-group">

                            <!-- Dropdown -->
                        <div class="dropdown">
                        <button class="btn dropdown-toggle px-2 py-1" type="button" id="auctionDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background:#0f1c2c; border: 1px solid var(--bs-border-color)">
                            Compare Auction
                        </button>

                        <ul class="dropdown-menu dropdown-menu-dark p-2" style="min-width: 200px; background-color: #0f1c2c ;border: 1px solid var(--bs-border-color); border-radius: 8px; 
                       border: 1px solid var(--bs-border-color) ;">
                        <li>
                            <label class="circle-checkbox">
                            <input type="checkbox" checked>
                            <span class="circle"></span>
                            BCA
                            </label>
                        </li>
                        <li>
                            <label class="circle-checkbox ">
                            <input type="checkbox" disabled>
                            <span class="circle"></span>
                            Manheim
                            </label>
                        </li>
                        <li>
                            <label class="circle-checkbox">
                            <input type="checkbox" checked>
                            <span class="circle"></span>
                            CCA
                            </label>
                        </li>
                        <li>
                            <label class="circle-checkbox">
                            <input type="checkbox">
                            <span class="circle"></span>
                            MAG
                            </label>
                        </li>
                        </ul>


                        </div>



                            {{-- <div class="dropdown ">
                                <button class="btn border dropdown-toggle  text-left py-1 px-1" type="button"
                                       style="font-size: 15px;" id="dataDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Data
                                </button>
                                <div class="dropdown-menu " aria-labelledby="dataDropdown">
                                    <a class="dropdown-item" href="#" data-value="">All</a>
                                    @foreach($auctionsPlatform as $platform)
                                        <a class="dropdown-item" href="#" data-value="{{ $platform->id }}">{{ $platform->name }}</a>
                                    @endforeach
                                </div>
                                <input type="hidden" name="data_id" id="data_id">
                            </div> --}}
                        </div>
                    </div>

                    <!-- Platform Dropdown (right) -->
                    <div class="col-2 ml-2 ">
                        <div class="form-group">

                               <div class="dropdown">
                        <button class="btn  dropdown-toggle px-2 py-1"  type="button" id="auctionDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: #0f1c2c; border: 1px solid var(--bs-border-color)">
                            Compare Auction
                        </button>

                        <ul class="dropdown-menu dropdown-menu-dark p-2" style="min-width: 200px; background-color: #0f1c2c; border-radius: 8px; border: 1px solid var(--bs-border-color)">
                        <li>
                            <label class="circle-checkbox">
                            <input type="checkbox" checked>
                            <span class="circle"></span>
                            BCA
                            </label>
                        </li>
                        <li>
                            <label class="circle-checkbox ">
                            <input type="checkbox" >
                            <span class="circle"></span>
                            Manheim
                            </label>
                        </li>
                        <li>
                            <label class="circle-checkbox">
                            <input type="checkbox" checked>
                            <span class="circle"></span>
                            CCA
                            </label>
                        </li>
                        <li>
                            <label class="circle-checkbox">
                            <input type="checkbox">
                            <span class="circle"></span>
                            MAG
                            </label>
                        </li>
                        </ul>


                        </div>
                            {{-- <div class="dropdown ms-2">
                                <button class="btn border dropdown-toggle  text-left py-1 px-1" type="button"
                                       style="font-size: 15px;" id="platformDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Platform
                                </button>
                                <div class="dropdown-menu " aria-labelledby="platformDropdown">
                                    <a class="dropdown-item" href="#" data-value="">All</a>
                                    @foreach($auctionsPlatform as $platform)
                                        <a class="dropdown-item" href="#" data-value="{{ $platform->id }}">{{ $platform->name }}</a>
                                    @endforeach
                                </div>
                                <input type="hidden" name="platform_id" id="platform_id">
                            </div> --}}
                        </div>
                    </div>
                            
                </div>
            </form>
            </div>
        </div>
        <hr style="border-color: #0f1c2c;">

        {{-- Graph area --}}
        <div>
            {{-- Replace with Chart.js --}}
            <div id="charts" class="my-0 mx-0 " style="width: 100% !important"></div>


        </div>

        {{-- Autoboli Prediction --}}
        <div class="row align-items-center" style="border-top: 1px solid #192534">
            <div class="col-md-4 d-flex align-items-center " style="margin-right: -20px">
                <!-- Left content -->
                        <div class="row align-items-center ">
                            {{-- Left: Header --}}
                            <div class="col-auto">
                                <h4 class="mb-0" style="font-weight: 600 ;margin-top: 20px;  margin-bottom: -13px !important;">Autoboli Prediction</h4>
                            </div>
                            <div class="d-flex mt-3 align-items-center">
                                {{-- Middle: Logo Image --}}
                                <div class="">
                                    <img src="{{ asset('public/themeadmin/images/logo/smalllogo.png') }}"  style="height: 40px; margin-right: 12px" alt="Logo">
                                </div>

                                {{-- Right: Price Box --}}
                                <div class="">
                                    <div class="bg-white rounded">
                                        <h5  style="color: black; padding: 6px 46px !important;  margin-top: 12px; ">£13,000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
            </div>  
            <!-- Vertical Line -->
    <div class="col-4 mt-3"  style="border-left: 1px solid #192534; margin-right: 20px">
        <!-- Right content -->
        <p class="text-sm text-gray-300 max-w-lg leading-snug pt-5" >
                Our price estimates use historical auction data and market trends to suggest likely values. These predictions are informational only and not guarantees of future sale prices.
                <a href="#" class="underline text-blue-300">learn more</a>
            </p>
    </div>
</div>
            </div>
            </div>

            {{-- RIGHT: Vehicle Details --}}
                <div class="col-5" style="padding: 3px 18px;">
                    <div class="p-3  rounded text-white"  style="background-color: var(--bs-navbar-bg)">
                    <div class="p-3 rounded text-white"  style="background-color: var(--bs-navbar-bg)">
                    <div style="width: 100%; height: 350px; background-color: #000; overflow: hidden; border-radius: 10px; margin-bottom: 30px;">
                        <img 
                            src="{{ $vehicle->getImages()[0] }}" 
                            id="mainImage" 
                            class="rounded" 
                             style="width: 100%; height: 100%; object-fit: cover !important; " 
                            alt="Vehicle Main Image"
                            data-bs-toggle="modal" 
                            data-bs-target="#imageModal"
                        >
                        </div>
                    {{-- Thumbnails --}}
                    
            
            
                    <div class="d-flex flex-wrap justify-content-left gap-2">                                
                    <!-- Thumbnail Slider -->
                    <div class="swiper mySwiper" style="width: 100%; overflow: hidden;">
                        <div class="swiper-wrapper" style="display: flex; margin-bottom: 33px;">
                        @foreach ($vehicle->getImages() as $index => $item)
                            <div class="swiper-slide" style="flex-shrink: 0; width: auto; ">
                            <img 
                                src="{{ $item }}" 
                                class="img-thumbnail"
                                style="cursor: pointer; width: 100px; height: 60px; border-radius: 20%; object-fit:cover !important;"
                                onclick="setMainImage('{{ $item }}')"
                            >
                            </div>
                        @endforeach
                        </div>
                    </div>
                    </div>
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content bg-white border-0 rounded">
                                    <div class="modal-body p-0">
                                        <img id="modalImage" src="" class="img-fluid rounded w-100" style="object-fit: contain !important; max-height: 90vh;">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <span style="font-size: 28px; font-weight: 600; margin: 10px 0px;">{{ $vehicle->year }} {{ $vehicle->make->name }} {{ $vehicle->model->name }} – {{ $vehicle->variant->name }}</span>
                            <div class="row mt-2  d-flex justify-content-center align-items-center" style="border-radius: 10px; margin-top: 30px !important; background: #00264d !important;padding-top: 10px">
                                <div class="col-md-4" >
                                    <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                        <li>
                                            <span style="color: #d4d4d4;">platform</span><br>
                                            <li class="d-flex align-items-center mb-2">
                                            <span style="font-size: 14px">{{ $vehicle->auction->platform->name }}</span>

                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4" >
                                    <ul style="list-style: none; padding-left: 0px; padding:px; font-size: 15px;">
                                        <li>
                                            <span style="color: #d4d4d4;">Autions</span><br>
                                        <span class="disc">{{ \Carbon\Carbon::parse($vehicle->auction->auction_date)->format('Y-m-d') }}</span>
                                            
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                        <li>
                                            <span style="color: #d4d4d4;">Inpaction</span><br>
                                            <button style="padding: 4px 10px; background: #0d6efd;  border-radius: 4px"> View Report</button>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="col-md-3">
                                    <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                        <li>
                                            <span style="color: #d4d4d4;">Year</span><br>
                                            <span style="color: white;">{{ $vehicle->year  }}</span>
                                        </li>
                                    </ul>
                                </div> --}}

                                </div>
                            </div>
                
            
                </div>
            </div>

    </div>

            {{-- Quick Stats --}}
    <div class="row text-start mb-4" style="padding: 40px; background-color: #0c192a">
    @php
        $fields = [
            ['label' => 'CAP New', 'value' => $vehicle->cap_new],
            ['label' => 'CAP Retail', 'value' => $vehicle->cap_ratail],
            ['label' => 'CAP Clean', 'value' => $vehicle->cap_clean],
            ['label' => 'CAP Average', 'value' => $vehicle->cap_average],
            ['label' => 'CAP Below', 'value' => $vehicle->cap_below ],
        ];
    @endphp

    @foreach($fields as $field)
        <div class="col">
            
            <div style="display: flex; align-items: center;">
                <div class="dotstats-box"><div class="dotstats" style="  border: 8px solid #0a2e55 !important;"></div></div>
                    <div>
                        <div style="color: white;">{{ $field['value'] }}</div>
                        <div style="color: #ccc; font-size: 15px;">{{ $field['label'] }}</div>
                    </div>
            </div>
        </div>
    @endforeach
</div>


{{-- End Quick Stat --}}
   


            {{-- Overview --}}

<div class="row" style=" margin: 0px 70px">
    {{-- Left Column (Overview, Additional Info, Features) --}}
    <div class="col-md-8 sider">
        <h4>Bidding History</h4>
        <hr style="border-color: #44485e;">
<div class="row">
    <div class="col-md-2 sider1">
        Last Bid<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="last_bid" id="last_bid" onclick="return false;">
            <label class="form-check-label disc" for="last_bid">{{ $vehicle->last_bid }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Bidding Status<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="bidding_status" id="bidding_status" onclick="return false;">
            <label class="form-check-label disc" for="bidding_status">{{ $vehicle->bidding_status}}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Bidding History<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="bidding_history" id="bidding_history" onclick="return false;">
@if (!empty($biddingHistoryArray))
    <ul class="list-disc ps-4">
        @foreach ($biddingHistoryArray as $item)
            <li class="text-white">{{ $item }}</li>
        @endforeach
    </ul>
@else
    <p class="text-muted">No bidding history available.</p>
@endif        </div>
    </div>
    
</div>

             

                    {{-- @foreach($fields as $id => $label)
                          <div class="col-md-3 mb-3">
                            <label class="field-label" for="{{ $id }}">{{ $label }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="{{ $id }}" name="{{ $id }}">
                                <label class="form-check-label" for="{{ $id }}">Toyota</label>
                            </div>
                        </div> --}}
            

        {{-- Additional Information --}}
        
    </div>

    {{-- Right Column (Service History Box) --}}
    <div class="col-md-4" >
        <div class="border rounded sider p-3" style="background-color: #3f1623 !important; margin-top: 20px">
            <h4>Reauction Track </h4>
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">

                    <ul class="service-list">
                        <div class="service-title">Previous Auction Date</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="s"><div class="dot"></div></div>4/5/205
                            <span class="disc">{{ $vehicle->service_history }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Bidding Status</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="s"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->bidding_status }}</span>
                        </li>
                    </ul>


                </div>
                <!-- Column 2 -->
                <div class="col-md-6">

                    <ul class="service-list">
                        <div class="service-title">Platform</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="s"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->auction->platform->name }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Last Bid</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="s"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->last_bid }}</span>
                        </li>
                    </ul>

                

                </div>

            </div>
        </div>
    </div>
</div>   
        <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    // Initialize Swiper
                    const swiper = new Swiper('.mySwiper', {
                        slidesPerView: 4,
                        spaceBetween: 10,
                        breakpoints: {
                            640: { slidesPerView: 5 },
                            768: { slidesPerView: 6 },
                        }
                    });

                    // Handle click on main image to open modal
                    const mainImage = document.getElementById('mainImage');
                    const modalImage = document.getElementById('modalImage');

                    if (mainImage) {
                        mainImage.addEventListener('click', function () {
                            if (modalImage) {
                                modalImage.src = this.src;
                            }
                        });
                    }

                    // Image array and index for cycling
                    const imageUrls = @json($vehicle->getImages());
                    let currentMainIndex = 0;

                    function cycleMainImage() {
                        currentMainIndex = (currentMainIndex + 1) % imageUrls.length;
                        if (mainImage && modalImage) {
                            mainImage.src = imageUrls[currentMainIndex];
                            modalImage.src = imageUrls[currentMainIndex];
                        }
                    }

                    // Set main image on thumbnail click
                    window.setMainImage = function (src) {
                        if (mainImage && modalImage) {
                            mainImage.src = src;
                            modalImage.src = src;
                        }
                    };
                    });
            </script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>