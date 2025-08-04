<div class="p-4">
    <div class="row" style="padding: 2px 18px; border-radius: 10px;  !important; margin: 20px 10px">
      
        <div class="trade_history_graph col-7" style=" border-radius: 10px; background-color: var(--bs-navbar-bg) !important; border: 2px solid #192534">
            <div class="p-3  rounded" style="background-color: var(--bs-navbar-bg)">
                <div style="display: flex; justify-content:space-between; align-items: center">
                    <div>
                        <h2 class="text-xl font-bold">Trad history</h2>
                    </div>
                    <div class="text-sm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control platform" name="platform_ids[]" multiple>

                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <hr style="border-color: #0f1c2c;">

                {{-- Graph area --}}
                <div>
                    <div id="charts" class="my-0 mx-0 " style="width: 100% !important"></div>
                </div>

                {{-- Autoboli Prediction --}}
                <div class="row align-items-center" style="border-top: 1px solid #192534">
                    <div class="col-md-4 d-flex align-items-center " style="margin-right: -20px">
                        <div class="row align-items-center ">
                            <div class="col-auto">
                                <h4 class="mb-0" style="font-weight: 600 ;margin-top: 20px;  margin-bottom: -13px !important;"> Autoboli Prediction</h4>
                            </div>
                            <div class="d-flex mt-3 align-items-center">
                                <div class="">
                                    <img src="{{ asset('public/themeadmin/images/logo/smalllogo.png') }}"
                                        style="height: 40px; margin-right: 12px" alt="Logo">
                                </div>
                                <div class="">
                                    <div class="bg-white rounded">
                                        <h5 style="color: black; padding: 6px 46px !important;  margin-top: 12px; ">
                                            £13,000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-3" style="border-left: 1px solid #192534; margin-right: 20px">
                        <p class="text-sm text-gray-300 max-w-lg leading-snug pt-5">
                            Our price estimates use historical auction data and market trends to suggest likely values.
                            These predictions are informational only and not guarantees of future sale prices.
                            <a href="#" class="underline text-blue-300">learn more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>



        {{-- RIGHT: Vehicle Details --}}
        <div class="col-5" style="padding: 3px 18px;">
            <div class="p-3  rounded text-white" style="background-color: var(--bs-navbar-bg)">
                <div class="p-3 rounded text-white" style="background-color: var(--bs-navbar-bg)">
                    <div
                        style="width: 100%; height: 350px; background-color: #000; overflow: hidden; border-radius: 10px; margin-bottom: 30px;">
                        @if ($vehicle->getImages())
                            <img src="{{ $vehicle->getImages()[0] }}" id="mainImage" class="rounded"
                                style="width: 100%; height: 100%; object-fit: cover !important; "
                                alt="Vehicle Main Image" data-bs-toggle="modal" data-bs-target="#imageModal">
                        @endif
                      </div>
                
                    {{-- Thumbnails --}}



                    <div class="d-flex flex-wrap justify-content-left gap-2">
                        <!-- Thumbnail Slider -->
                        <div class="swiper mySwiper" style="width: 100%; overflow: hidden;">
                            <div class="swiper-wrapper" style="display: flex; margin-bottom: 33px;">
                                @foreach ($vehicle->getImages() as $index => $item)
                                    <div class="swiper-slide" style="flex-shrink: 0; width: auto; ">
                                        <img src="{{ $item }}" class="img-thumbnail"
                                            style="cursor: pointer; width: 100px; height: 60px; border-radius: 20%; object-fit:cover !important;"
                                            onclick="setMainImage('{{ $item }}')">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content bg-white border-0 rounded">
                                <div class="modal-body p-0">
                                    <img id="modalImage" src="" class="img-fluid rounded w-100"
                                        style="object-fit: contain !important; max-height: 90vh;">
                                </div>
                            </div>
                        </div>
                    </div>


                    <span style="font-size: 28px; font-weight: 600; margin: 10px 0px;">{{ $vehicle->year }}
                        {{ $vehicle->make->name }} {{ $vehicle->model->name }} – {{ $vehicle->variant->name }}</span>
                    <div class="row mt-2  d-flex justify-content-center align-items-center"
                        style="border-radius: 10px; margin-top: 30px !important; background: #00264d !important;padding-top: 10px">
                        <div class="col-md-4">
                            <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                <li>
                                    <span style="color: #d4d4d4;">Platform</span><br>
                                <li class="d-flex align-items-center mb-2">
                                    <span style="font-size: 14px">{{ $vehicle->auction->platform->name }}</span>

                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul style="list-style: none; padding-left: 0px; padding:px; font-size: 15px;">
                                <li>
                                    <span style="color: #d4d4d4;">Autions</span><br>
                                    <span
                                        class="disc">{{ \Carbon\Carbon::parse($vehicle->auction->auction_date)->format('Y-m-d') }}</span>

                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                                <li>
                                    <span style="color: #d4d4d4;">Inpaction</span><br>
                                    <a target="_blank" href="{{$vehicle->inspection_report}}" style="padding: 4px 10px; background: #0d6efd;  border-radius: 4px"> 
                                      View Report</a>
                                </li>
                            </ul>
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
                ['label' => 'CAP Below', 'value' => $vehicle->cap_below],
            ];
        @endphp

        @foreach ($fields as $field)
            <div class="col">

                <div style="display: flex; align-items: center;">
                    <div class="dotstats-box">
                        <div class="dotstats" style="  border: 8px solid #0a2e55 !important;"></div>
                    </div>
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
                        <input class="form-check-input" type="checkbox" name="last_bid" id="last_bid"
                            onclick="return false;">
                        <label class="form-check-label disc" for="last_bid">{{ $vehicle->last_bid }}</label>
                    </div>
                </div>
                <div class="col-md-2 sider1">
                    Bidding Status<br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="bidding_status" id="bidding_status"
                            onclick="return false;">
                        <label class="form-check-label disc"
                            for="bidding_status">{{ $vehicle->bidding_status }}</label>
                    </div>
                </div>
                <div class="col-md-2 sider1">
                    Bidding History<br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="bidding_history" id="bidding_history"
                            onclick="return false;">
                        @if (!empty($biddingHistoryArray))
                            <ul class="list-disc ps-4">
                                @foreach ($biddingHistoryArray as $item)
                                    <li class="text-white">{{ $item }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No bidding history available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <?php 
        
          $previousAuction =  $vehicle->previousAuction(); 
   
        ?>

        {{-- Right Column (Service History Box) --}}
      
        <div class="col-md-4">
            <div class="border rounded sider p-3" style="background-color: #3f1623 !important; margin-top: 20px">
                <h4>Reauction Track </h4>
                <div class="row">
                    
                    <!-- Column 1 -->
                    <div class="col-md-6">
                        <ul class="service-list">
                            <div class="service-title">Previous Auction Date</div>
                            <li class="d-flex align-items-center mb-2">
                                <div class="s">
                                    <div class="dot"></div>
                                </div>{{$previousAuction ? $previousAuction->start_date : ''}}
                                <span class="disc">{{$previousAuction ? $previousAuction->service_history : ''}}</span>
                            </li>
                        </ul>
                        <ul class="service-list">
                            <div class="service-title">Bidding Status</div>
                            <li class="d-flex align-items-center mb-2">
                                <div class="s">
                                    <div class="dot"></div>
                                </div>
                                <span class="disc">{{$previousAuction ? $previousAuction->bidding_status : ''}}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-md-6">
                        <ul class="service-list">
                            <div class="service-title">Platform</div>
                            <li class="d-flex align-items-center mb-2">
                                <div class="s">
                                    <div class="dot"></div>
                                </div>
                                <span class="disc">{{$previousAuction ? $previousAuction->auction->platform->name : ''}}</span>
                            </li>
                        </ul>
                        <ul class="service-list">
                            <div class="service-title">Last Bid</div>
                            <li class="d-flex align-items-center mb-2">
                                <div class="s">
                                    <div class="dot"></div>
                                </div>
                                <span class="disc">{{$previousAuction ? $previousAuction->last_bid : ''}}</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>