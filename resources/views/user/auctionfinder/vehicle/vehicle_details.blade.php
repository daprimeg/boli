<div class="p-4">
    <div class="row "
        style="padding: 28px 18px; border-radius: 10px; background-color: var(--bs-navbar-bg) !important; margin: 0px 40px">
        <div class="col-md-6">

            <!-- Main Image Swiper -->
            @if ($vehicle->getImages())
                <img src="{{ $vehicle->getImages()[0] }}" id="mainImage" class="  border mb-3 w-100"
                    style="height: 25rem;  object-fit: cover; cursor: pointer; border-radius: 10px"
                    alt="Vehicle Main Image" data-bs-toggle="modal" data-bs-target="#imageModal">
            @endif

            <div class="d-flex flex-wrap justify-content-left gap-2">
                <div class="swiper mySwiper" style="width: 100%; overflow: hidden;">
                    <div class="swiper-wrapper" style="display: flex;">
                        @foreach ($vehicle->getImages() as $index => $item)
                            <div class="swiper-slide" style="flex-shrink: 0; width: auto;">
                                <img src="{{ $item }}" class="img-thumbnail"
                                    style="cursor: pointer; width: 100px; height: 60px; border-radius: 10%; object-fit: cover;"
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
                                style="object-fit: contain; max-height: 90vh;">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Right Column: Info --}}
        <div class="col-md-6">
            <h3>{{ $vehicle->year }} {{ $vehicle->make->name }} {{ $vehicle->model->name }} –
                {{ $vehicle->variant->name }}</h3>
            <div class="row " style=" border: solid #004890; border-radius: 15px; margin-bottom: 20px;">
                <div class="row mt-2  align-self-center " style="border-radius: 5px; margin: 0px">
                    <div class="col-md-3">
                        <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                            <li>
                                <span style="color: #d4d4d4;">Make</span><br>
                                <span style="color: white;">{{ $vehicle->make->name }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul style="list-style: none; padding-left: 0px;  font-size: 15px;">
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
                        <ul style="list-style: none; padding-left: 0px;  font-size: 15px;">
                            <li>
                                <span style="color: #d4d4d4;">Year</span><br>
                                <span style="color: white;">{{ $vehicle->year }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row  p-2" style="background-color: #00264d;  margin: 0px; border-radius: 10px; ">
                    <div class="col-md-3">
                        <ul style="list-style: none; padding-left: 0px; font-size: 15px; padding-top: 6px !important;">
                            <li>
                                <span style="color: #d4d4d4;">Platform</span><br>
                                <span style="color: white;">{{ $vehicle->auction->platform->name }} </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul style="list-style: none;  padding-left: 0px; font-size: 15px; padding-top: 6px !important;">
                            <li>
                                <span style="color: #d4d4d4;">Auction Date</span><br>
                                <span
                                    style="color: white;">{{ \Carbon\Carbon::parse($vehicle->auction->auction_date)->format('Y-m-d') }}
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul style="list-style: none;  padding-left: 0px; font-size: 15px; padding-top: 6px !important;">
                            <li>
                                <span style="color: #d4d4d4;">Inspection</span><br>
                                <button class="btn btn-primary "
                                    style="padding: 3px 10px; border-radius: 5px !important;   font-size: 14px;   font-weight: 100;"
                                    onclick="btn">View Report</button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul style="list-style: none;  padding-left: 0px; font-size: 15px; padding-top: 6px !important;">
                            <li>
                                <span style="color: #d4d4d4;">Inspection</span><br>
                                <button class="btn btn-primary  "
                                    style="padding: 3px 10px;  border-radius: 5px !important;  font-size: 14px;   font-weight: 100;"
                                    onclick="btn">
                                    View Report </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Disclaimer Accordion --}}
            <div class="accordion mt-10" id="disclaimerAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header " id="headingOne">
                        <button class="accordion-button disc collapsed "
                            style="background-color: rgba(92, 3, 3, 0.829);" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne">
                            Disclaimer
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#disclaimerAccordion">
                        <div class="accordion-body">
                            <p style="color: white;"> The data for this vehicle is taken from</p>

                            AUTOBOLI LTD aggregates vehicle auction data from third-party sources providing it ‘as-is’
                            to help users make informed decisions, without guaranteeing data accuracy or completeness.
                            <p><a href="#"> Read More</a></p>
                        </div>
                    </div>
                </div>
                <div class="accordion mt-3" id="disclaimerAccordion">
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button disc collapsed " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsetwo"
                                style="
                                    color:#cecece">
                                The data for this vehicle is taken from
                            </button>
                        </h2>
                        <div id="collapsetwo" class="accordion-collapse collapse"
                            data-bs-parent="#disclaimerAccordion">
                            <div class="accordion-body">
                                This vehicle data source is from {{ $vehicle->data_source ?? 'Unknown' }}.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mt-3" id="disclaimerAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button disc collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsethree"
                                style="
                                    color:#cecece">
                                Disclaimer
                            </button>
                        </h2>
                        <div id="collapsethree" class="accordion-collapse collapse"
                            data-bs-parent="#disclaimerAccordion">
                            <div class="accordion-body">
                                This vehicle data source is from {{ $vehicle->data_source ?? 'Unknown' }}.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mt-3" id="disclaimerAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button disc collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse4"
                                style="
                                    color:#cecece">
                                Disclaimer
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse"
                            data-bs-parent="#disclaimerAccordion">
                            <div class="accordion-body">
                                This vehicle data source is from {{ $vehicle->data_source ?? 'Unknown' }}.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









{{-- Quick Stats --}}
<div class="row text-start mb-5"
    style="padding: 40px; background-color: #0c192a; border-top: 1px solid var(--bs-border-color); border-bottom: 1px solid var(--bs-border-color)">
    @php
        $fields = [
            ['label' => 'Reg', 'value' => $vehicle->reg],
            ['label' => 'DOR', 'value' => $vehicle->dor],
            ['label' => 'Mileage', 'value' => $vehicle->mileage],
            ['label' => 'Grade', 'value' => $vehicle->grade],
            ['label' => 'V5', 'value' => $vehicle->v5_status ? 'Present' : 'Not Present'],
        ];
    @endphp

    @foreach ($fields as $field)
        <div class="col">

            <div style="display: flex; align-items: center;">
                <div class="dotstats-box">
                    <div class="dotstats" style="  border: 8px solid #17293f !important;"></div>
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

<div class="row " style=" padding: 0px 70px; background: #0f1c2c; margin-bottom: 12px;">
    {{-- Left Column (Overview, Additional Info, Features) --}}
    <div class="col-md-8 sider">
        <h4 class="pt-4">Overview</h4>
        <hr style="border-color: #44485e;">
        <div class="row">

            <div class="col-md-2 sider1 ">
                <span>Vehicle Type</span>
                <br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type"
                        onclick="return false;">
                    <label class="form-check-label disc"
                        for="vehicle_type">{{ $vehicle->vehicle_type->name }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1  ">
                Make<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="make" id="make"
                        onclick="return false;">
                    <label class="form-check-label disc" for="make">{{ $vehicle->make->name }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1 ">
                Model<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="model" id="model"
                        onclick="return false;">
                    <label class="form-check-label disc" for="model">{{ $vehicle->model->name }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1 ">
                Variant<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="variant" id="variant"
                        onclick="return false;">
                    <label class="form-check-label disc" for="variant">{{ $vehicle->variant->name }}</label>
                </div>
            </div>

            <div class="col-md-2 sider1 ">
                CC<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="cc" id="cc"
                        onclick="return false;">
                    <label class="form-check-label disc" for="cc">{{ $vehicle->cc }}</label>
                </div>
            </div>

            <div class="col-md-2 sider1">
                Year<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="year" id="year"
                        onclick="return false;">
                    <label class="form-check-label disc" for="year">{{ $vehicle->year }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Color<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="color"
                        id="color"onclick="return false;">
                    <label class="form-check-label disc" for="color">{{ $vehicle->color->name }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Fuel Type<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="fuel_type" id="fuel_type"
                        onclick="return false;">
                    <label class="form-check-label disc" for="fuel_type">{{ $vehicle->fuel_type }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Transmission<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="transmission" id="transmission"
                        onclick="return false;">
                    <label class="form-check-label disc" for="transmission">{{ $vehicle->transmission }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Keys<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="keys" id="keys"
                        onclick="return false;">
                    <label class="form-check-label disc" for="keys">{{ $vehicle->keys }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Doors<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="doors" id="doors"
                        onclick="return false;">
                    <label class="form-check-label disc" for="doors">{{ $vehicle->doors }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Seats<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="seats" id="seats"
                        onclick="return false;">
                    <label class="form-check-label disc" for="seats">{{ $vehicle->seats }}</label>
                </div>
            </div>
        </div>



        {{-- @foreach ($fields as $id => $label)
                          <div class="col-md-3 mb-3">
                            <label class="field-label" for="{{ $id }}">{{ $label }}</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="{{ $id }}" name="{{ $id }}">
                                <label class="form-check-label" for="{{ $id }}">Toyota</label>
                            </div>
                        </div> --}}


        {{-- Additional Information --}}
        <h4 class="mt-4">Additional Information</h4>
        <hr style="border-color: #44485e;">
        <div class="row">
            <div class="col-md-2 sider1">
                Former Keepers<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="former_keepers" id="former_keepers"
                        onclick="return false;">
                    <label class="form-check-label disc" for="former_keepers">{{ $vehicle->former_keepers }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Vendors<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="vendor" id="vendor"
                        onclick="return false;">
                    <label class="form-check-label disc" for="vendor">{{ $vehicle->vendor }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Registration <br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="reg" id="reg"
                        onclick="return false;">
                    <label class="form-check-label disc" for="vendor">{{ $vehicle->reg }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                VAT Type <br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="vat_status" id="vat_status"
                        onclick="return false;">
                    <label class="form-check-label disc" for="vat_status">{{ $vehicle->vat_status }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Euro Status<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="euro_status" id="euro_status"
                        onclick="return false;">
                    <label class="form-check-label disc" for="euro_status">{{ $vehicle->euro_status }}</label>
                </div>
            </div>
            <div class="col-md-2 sider1">
                Engine Runs<br>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="engine_runs" id="engine_runs"
                        onclick="return false;">
                    <label class="form-check-label disc" for="engine_runs">{{ $vehicle->engine_runs }}</label>
                </div>
            </div>

        </div>
    </div>

    {{-- Right Column (Service History Box) --}}
    <div class="col-md-4">
        <div
            class="border rounded sider p-3 "style="background-color: var(--bs-navbar-bg) !important; margin-top:20px; padding:25px 35px !important">
            <h4>Service History</h4>
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">

                    <ul class="service-list">
                        <div class="service-title">Service Report</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box">
                                <div class="dot"></div>
                            </div>
                            <span class="disc">{{ $vehicle->service_history }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Last Service</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box">
                                <div class="dot"></div>
                            </div>
                            <span class="disc">{{ $vehicle->last_service }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">DVSA Mileage</div>
                        <li class="d-flex align-items-start ixed mb-2">
                            <div class="dot-box ">
                                <div class="dot p-2 m-2"></div>
                            </div>
                            <span class="disc">{{ $vehicle->dvsa_mileage }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">MOT Expiry Date</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box">
                                <div class="dot"></div>
                            </div>
                            <span class="disc">{{ $vehicle->mot_expiry_date }}</span>
                        </li>
                    </ul>

                </div>
                <!-- Column 2 -->
                <div class="col-md-6 ps-4">

                    <ul class="service-list">
                        <div class="service-title">No of Services</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box">
                                <div class="dot"></div>
                            </div>
                            <span class="disc">{{ $vehicle->no_of_services }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Last Service Mileage</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box">
                                <div class="dot"></div>
                            </div>
                            <span class="disc">{{ $vehicle->last_service_mileage }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Service Notes</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box">
                                <div class="dot"></div>
                            </div>
                            <span class="disc">{{ $vehicle->service_notes }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">MOT Due</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box">
                                <div class="dot"></div>
                            </div>
                            <span class="disc">{{ $vehicle->mot_due }}</span>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    {{-- Left Column (Overview, Additional Info, Features) --}}
    <div class="col-md-5" style=" margin: 0px 70px">
        <h4 class="mt-4">Features</h4>
        <hr style="border-color: #44485e;">
        <div class="row">
            <div>
                <ul class="row" style="list-style: none; padding-left: 0;">
                    {{-- <li class="col-4 mb-2">{{ $vehicle->features }}</li> --}}
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                </ul>
            </div>
        </div>
    </div>
    {{-- <div class="col-1"></div>row text-start mb-4 --}}
    <div class="col-md-5">
        <h4 class="mt-4">Equipment</h4>
        <hr style="border-color: #44485e;">
        <div class="row">
            <div class="col-md-12">
                <ul class="row" style="list-style: none; padding-left: 0;">
                    {{-- <li class="col-4 mb-2">{{ $vehicle->features }}</li> --}}
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                    <li class="col-4 mb-2">farmer keeper</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('mainImage')?.addEventListener('click', function() {
        document.getElementById('modalImage').src = this.src;
    });

    function changeMainImage(src) {
        document.getElementById('mainImage').src = src;
        document.getElementById('modalImage').src = src;

    }


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
