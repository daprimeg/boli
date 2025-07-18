<div class="p-4">
    <div class="row" style="padding: 20px; border-radius: 10px; ;">

        {{-- LEFT: Image Preview + Thumbnails --}}
        <div class="col-md-8">
            <div class="p-3  rounded" style="background-color: var(--bs-navbar-bg)">
                {{-- Main Image --}}
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-xl font-bold">Trad history</h2>
            <div class="flex gap-2 text-sm">
            <form method="GET" action="{{ URL::to('/vehicles/index')}}">
               <div class="row">
                    <!-- Data Dropdown (left) -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="dropdown ">
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
                            </div>
                        </div>
                    </div>

                    <!-- Platform Dropdown (right) -->
                    <div class="col-md-3 ml-2">
                        <div class="form-group">
                            <div class="dropdown ">
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
                            </div>
                        </div>
                    </div>
                            
                </div>
            </form>
            </div>
        </div>
        <hr style="border-color: #44485e;">

        {{-- Graph area --}}
        <div class="relative h-64 bg-gradient-to-r from-blue-900 to-blue-600 rounded-md flex items-center justify-center">
            {{-- Replace with Chart.js --}}
            <p class="text-sm opacity-50">Graph Placeholder</p>
        </div>

        {{-- Autoboli Prediction --}}
        <div class="row align-items-center">
            <div class="col-md-5">
                <!-- Left content -->
                        <div class="row align-items-center">
                            {{-- Left: Header --}}
                            <div class="col-auto">
                                <h2 class="mb-0">Autoboli</h2>
                            </div>
                            <div class="d-flex ">
                                {{-- Middle: Logo Image --}}
                                <div class="">
                                    <img src="{{ asset('public/images/logo/smalllogo.png') }}" class="img-fluid" style="height: 30px;" alt="Logo">
                                </div>

                                {{-- Right: Price Box --}}
                                <div class="">
                                    <div class="bg-white   rounded">
                                        <span class="h5 mb-0" style="color: black">£13,000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
            </div>

    <!-- Vertical Line -->
    <div class="col-auto  d-md-block">
        <div style="width: 5px; height: 100%; background-color: #000000;"></div>
    </div>

    <div class="col-md-5">
        <!-- Right content -->
        <p class="text-sm text-gray-300 max-w-lg leading-snug">
                Our price estimates use historical auction data and market trends to suggest likely values. These predictions are informational only and not guarantees of future sale prices.
                <a href="#" class="underline text-blue-300">learn more</a>
            </p>
    </div>
</div>

       
                    
                </div>
            </div>

            {{-- RIGHT: Vehicle Details --}}
            <div class="col-md-4">
                <div class="p-3  rounded text-white"  style="background-color: var(--bs-navbar-bg)">
                    <img 
                    src="{{ $vehicle->getImages()[0] }}" 
                    id="mainImage" 
                    class="img-fluid rounded border mb-3 w-90" 
                    style="height: 300px;  object-fit: cover; cursor: pointer;" 
                    alt="Vehicle Main Image"
                    data-bs-toggle="modal" 
                    data-bs-target="#imageModal"
                >
                {{-- Thumbnails --}}
                <div class="d-flex flex-wrap justify-content-left gap-2">
                    <!-- Thumbnail Slider -->
                    <div class="swiper mySwiper w-full max-w-md">
                        <div class="swiper-wrapper">
                            @foreach ($vehicle->getImages() as $index => $item)
                                <div class="swiper-slide">
                                    <img 
                                        src="{{ $item }}" 
                                        class="img-thumbnail"
                                        style="cursor: pointer; width: 80px; height: 60px; border-radius: 20%; object-fit: cover;"
                                        onclick="setMainImage('{{ $item }}')"
                                    >
                                </div>
                            @endforeach
                        </div>
                    </div>     
                </div>
                
                
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content bg-white border-0 rounded">
                                <div class="modal-body p-0">
                                    <img id="modalImage" src="" class="img-fluid rounded w-100" style="object-fit: contain; max-height: 90vh;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>{{ $vehicle->year }} {{ $vehicle->make->name }} {{ $vehicle->model->name }} – {{ $vehicle->variant->name }}</h3>
                        <div class="row mt-2  align-self-center " style="border-radius: 10px; margin: 0px">
                            <div class="col-md-3">
                                <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                    <li>
                                        <span style="color: #d4d4d4;">Make</span><br>
                                        <span style="color: white;">{{ $vehicle->make->name }}</span>

                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul style="list-style: none; padding-left: 0px; padding:px; font-size: 15px;">
                                    <li>
                                        <span style="color: #d4d4d4;">Model</span><br>
                                        <span style="color: white;">{{ $vehicle->model->name }}</span>
                                        
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                    <li>
                                        <span style="color: #d4d4d4;">Variant</span><br>
                                        <span style="color: white;"> {{ $vehicle->variant->name }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                    <li>
                                        <span style="color: #d4d4d4;">Year</span><br>
                                        <span style="color: white;">{{ $vehicle->year  }}</span>
                                    </li>
                                </ul>
                            </div>

                            </div>
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
                <div class="dotstats-box"><div class="dotstats"></div></div>
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

<div class="row">
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
        <div class="border rounded sider p-3 "style="background-color: var(--bs-navbar-bg) !important;">
            <h4>Reauction Track </h4>
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">

                    <ul class="service-list">
                        <div class="service-title">Previous Auction Date</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->service_history }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Bidding Status</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->bidding_status }}</span>
                        </li>
                    </ul>


                </div>
                <!-- Column 2 -->
                <div class="col-md-6">

                    <ul class="service-list">
                        <div class="service-title">Platform</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->auction->platform->name }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Last Bid</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->last_bid }}</span>
                        </li>
                    </ul>

                

                </div>

            </div>
        </div>
    </div>
</div>   
            <div class="row">
    {{-- Left Column (Overview, Additional Info, Features) --}}
    <div class="col-md-6">
                <h4 class="mt-4">Features</h4>
                <hr style="border-color: #44485e;">
                <div class="row">
                    <div class="col-md-12">
                       <ul style="list-style: none; padding-left: 0;">
                          <li>{{ $vehicle->features }}</li>
                        </ul>
                   </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="mt-4">Equipment</h4>
                <hr style="border-color: #44485e;">
                <div class="row">
                    <div class="col-md-12">
                      <ul style="list-style: none; padding-left: 0;">
                        <li>{{ $vehicle->equipment }}</li>
                      </ul>
                    </div>
                </div>
            </div>
            </div>
             <script>
            document.getElementById('mainImage')?.addEventListener('click', function () {
                            document.getElementById('modalImage').src = this.src;
                        });
            const swiper = new Swiper('.mySwiper', {
            slidesPerView: 4,
            spaceBetween: 10,
            breakpoints: {
                640: { slidesPerView: 5 },
                768: { slidesPerView: 6 },
            },
            });
            function changeMainImage(src) {
                            document.getElementById('mainImage').src = src;
                            document.getElementById('modalImage').src = src;

            }
            let mainSwiper = new Swiper(".mainImageSwiper", {
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                loop: false,
            });

            let currentMainIndex = 0;
            const mainImage = document.getElementById('mainImage');
            const imageUrls = @json($vehicle->getImages());

            function cycleMainImage() {
                currentMainIndex = (currentMainIndex + 1) % imageUrls.length;
                mainImage.src = imageUrls[currentMainIndex];

                // Also open modal at this index
                openModalSwiper(currentMainIndex);
            }

           
                function setMainImage(imageUrl) {
                const mainImage = document.getElementById('mainImage');
                mainImage.src = imageUrl;
            }


            </script>