
@extends('admin.partial.app')
@push('title') vehicle @endpush
@section('css')
<style>

   .form-label{
         padding-top: 18px;
         padding-bottom: 6px;
         font-size: 15px;
   }

   .ck-editor__editable {
        min-height: 300px !important;
    
    }
    .filter-sidebar{
        
    }
    .sider1{
        margin: 10px;

    }
    .vehicle-list   .show{
        background-color: var(--bs-navbar-bg);
    }

    .vehicle-list .btn1{
        background-color: var(--bs-navbar-bg);
        border: none;
    }

    .vehicle-list .collapsed{
      background: #0f1c2c
    }
    .disc{
        color: white;
    }

    .sider{
        background-color: #0f1c2c;
    }
        .form-check-input {
        border: 2px solid #0d6efd; /* Bootstrap primary blue */
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
        .dot-box {
        width: 28px;
        height: 28px;
        background-color: #0f1c2c; /* Dark blue box */
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }

        .dotstats-box {
        width: 50px;
        height: 50px;
        background-color: #0f1c2c; /* Dark blue box */
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }

    .dot {
        width: 14px;
        height: 14px;
        background-color: #0d6efd; /* Blue dot */
        border-radius: 50%;
        box-shadow: 0 0 6px rgba(13, 110, 253, 0.6); /* Optional glow */
    }
    .dotstats {
        width: 30px;
        height: 30px;
        background-color: #0d6efd;
        border-radius: 30%;
        box-shadow: 0 0 6px rgba(13, 110, 253, 0.6);
        box-shadow: 0 0 6px rgba(13, 110, 253, 0.6); /* Optional glow */
    }

    .disc {
        color: #ffffff; /* Optional white text */
    }

    .service-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 1rem;
    }

    .service-title {
        font-weight: 600;
        color: #cccccc;
        margin-bottom: 0.3rem;
    }
</style>
@endsection

@section('content')

<div class="container-fluid sider vehicle-detail-page" >
     <div class="d-flex" style="margin-left: -20px">
      @include('admin.vehicles.show.sidebar')

        {{-- Main Content --}}
        <div class=" p-4" >
            <div class=" p-4" style="background-image: url('{{ asset('/public/images/backgrounds/Dots.png') }}') " >
                <div class="mb-4" >
                    <div class="flex space-x-4">
                        <button class=" py-2 bg-blue-600 btn btn-primary  m-4 mb-0 ml-0 text-white rounded-lg  hover:bg-blue-700 transition">
                            Vehicle Details
                        </button>
                        <button class=" py-2 bg-gray-700 btn btn1 btn-primary  m-4 mb-0 text-white rounded-lg  hover:bg-gray-800 transition">
                            Vehicle Valuation
                        </button>
                    </div>
                </div>
            <div class="row " style="padding: 30px; border-radius: 10px; background-color: var(--bs-navbar-bg) !important;">
                {{-- Left Column: Image & Thumbnails --}}
                <div class="col-md-6">
                    <!-- Main Image Swiper -->

                                <img 
                                    src="{{ $vehicle->getImages()[0] }}" 
                                    id="mainImage" 
                                    class="img-fluid rounded border mb-3 w-100" 
                                    style="height: 400px;  object-fit: cover; cursor: pointer;" 
                                    alt="Vehicle Main Image"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#imageModal"
                                >



                            <!-- Arrows -->
                            

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

            // Modal Swiper setup from earlier
            // let modalSwiper;

            // function openModalSwiper(startIndex) {
            //     const modal = document.getElementById('imageModal');

            //     const handler = () => {
            //         if (modalSwiper) {
            //             modalSwiper.slideToLoop(startIndex, 0);
            //         } else {
            //             modalSwiper = new Swiper('.modalSwiper', {
            //                 loop: true,
            //                 initialSlide: startIndex,
            //                 navigation: {
            //                     nextEl: '.swiper-button-next',
            //                     prevEl: '.swiper-button-prev',
            //                 },
            //                 spaceBetween: 10,
            //             });
            //         }
            //         modal.removeEventListener('shown.bs.modal', handler);
            //     };

            //     modal.addEventListener('shown.bs.modal', handler);
            // }
                function setMainImage(imageUrl) {
                const mainImage = document.getElementById('mainImage');
                mainImage.src = imageUrl;
            }


            </script>

                {{-- Right Column: Info --}}
                

                <div class="col-md-6">
                    <h3>{{ $vehicle->year }} {{ $vehicle->make->name }} {{ $vehicle->model->name }} – {{ $vehicle->variant->name }}</h3>
                <div class="row " style=" border: solid rgb(0, 127, 254); border-radius: 15px; margin-bottom: 20px; height: 143px">
                <div class="row   align-self-center " style="  border-radius: 10px; ">
            <div class="col-md-3">
                <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Make</span><br>
                        <span style="color: white;">{{ $vehicle->make->name }}</span>

                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul style="list-style: none; padding-left: 0px; padding:px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Model</span><br>
                        <span style="color: white;">{{ $vehicle->model->name }}</span>
                        
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Variant</span><br>
                        <span style="color: white;"> {{ $vehicle->variant->name }}</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Year</span><br>
                        <span style="color: white;">{{ $vehicle->year  }}</span>
                    </li>
                </ul>
            </div>

            </div>
                <div class="row  pb-0 p-2" style="background-color: hsl(209, 52%, 16%); padding-right: 0px; margin: 0px; border-radius: 10px; padding-right: 25px; height: 80px;">
                    <div class="col-md-3">
                <ul style="list-style: none; padding-left: 0px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Platform</span><br>
                        <span style="color: white;">{{ $vehicle->auction->platform->name }} </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul style="list-style: none;  padding-left: 0px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Auction Date</span><br>
                        <span style="color: white;"> {{ $vehicle->auction->auction_date}} </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul style="list-style: none;  padding-left: 0px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Inspection</span><br>
                        <button class="btn btn-primary " style="padding: 0px 8px;   font-size: 14px;   font-weight: 100;" onclick="btn">View Report</button>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul style="list-style: none;  padding-left: 0px; font-size: 15px;">
                    <li>
                        <span style="color: darkgrey;">Inspection</span><br>
                        <button class="btn btn-primary  " style="padding: 0px 8px;   font-size: 14px;   font-weight: 100;" onclick="btn">
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
                                <button class="accordion-button disc collapsed " style="background-color: rgba(92, 3, 3, 0.829);" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Disclaimer 
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#disclaimerAccordion">
                                <div class="accordion-body">
                                    <p style="color: white;"> The data for this vehicle is taken from</p>

            AUTOBOLI LTD aggregates vehicle auction data from third-party sources providing it ‘as-is’ to help users make informed decisions, without guaranteeing data accuracy or completeness. <p><a href="#"> Read More</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion mt-3" id="disclaimerAccordion">
                        <div class="accordion-item ">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button disc collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo">
                                    The data for this vehicle is taken from
                                </button>
                            </h2>
                            <div id="collapsetwo" class="accordion-collapse collapse" data-bs-parent="#disclaimerAccordion">
                                <div class="accordion-body">
                                    This vehicle data source is from {{ $vehicle->data_source ?? 'Unknown' }}.
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="accordion mt-3" id="disclaimerAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button disc collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree">
                                    Disclaimer
                                </button>
                            </h2>
                            <div id="collapsethree" class="accordion-collapse collapse" data-bs-parent="#disclaimerAccordion">
                                <div class="accordion-body">
                                    This vehicle data source is from {{ $vehicle->data_source ?? 'Unknown' }}.
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="accordion mt-3" id="disclaimerAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button disc collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                    Disclaimer
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#disclaimerAccordion">
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
    <div class="row text-start mb-4" style="padding: 40px; background-color: #0c192a">
    @php
        $fields = [
            ['label' => 'Reg', 'value' => $vehicle->reg],
            ['label' => 'DOR', 'value' => $vehicle->dor],
            ['label' => 'Mileage', 'value' => $vehicle->mileage],
            ['label' => 'Grade', 'value' => $vehicle->grade],
            ['label' => 'V5', 'value' => $vehicle->v5_status ? 'Present' : 'Not Present'],
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
        <h4>Overview</h4>
        <hr style="border-color: #44485e;">
<div class="row">
    <div class="col-md-2 sider1">
        Vehicle Type<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type">
            <label class="form-check-label disc" for="vehicle_type">{{ $vehicle->vehicle_id }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Make<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="make" id="make">
            <label class="form-check-label disc" for="make">{{ $vehicle->make->name }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Model<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="model" id="model">
            <label class="form-check-label disc" for="model">{{ $vehicle->model->name }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Variant<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="variant" id="variant">
            <label class="form-check-label disc" for="variant">{{ $vehicle->variant->name }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        CC<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cc" id="cc">
            <label class="form-check-label disc" for="cc">{{ $vehicle->cc }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Year<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="year" id="year">
            <label class="form-check-label disc" for="year">{{ $vehicle->year }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Color<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="color" id="color">
            <label class="form-check-label disc" for="color">{{ $vehicle->color_id }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Fuel Type<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="fuel_type" id="fuel_type">
            <label class="form-check-label disc" for="fuel_type">{{ $vehicle->fuel_type }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Transmission<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="transmission" id="transmission">
            <label class="form-check-label disc" for="transmission">{{ $vehicle->transmission }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Keys<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="keys" id="keys">
            <label class="form-check-label disc" for="keys">{{ $vehicle->keys }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Doors<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="doors" id="doors">
            <label class="form-check-label disc" for="doors">{{ $vehicle->doors }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Seats<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="seats" id="seats">
            <label class="form-check-label disc" for="seats">{{ $vehicle->seats }}</label>
        </div>
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
        <h4 class="mt-4">Additional Information</h4>
        <hr style="border-color: #44485e;">
        <div class="row">
            <div class="col-md-2 sider1">
        Former Keepers<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type">
            <label class="form-check-label disc" for="vehicle_type">{{ $vehicle->former_keepers }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Vendors<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type">
            <label class="form-check-label disc" for="vehicle_type">{{ $vehicle->vendor }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Registration <br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type">
            <label class="form-check-label disc" for="vehicle_type">{{ $vehicle->reg }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
       VAT Type <br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type">
            <label class="form-check-label disc" for="vehicle_type">{{ $vehicle->vat_status }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
        Euro Status<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type">
            <label class="form-check-label disc" for="vehicle_type">{{ $vehicle->euro_status }}</label>
        </div>
    </div>
    <div class="col-md-2 sider1">
       Engine Runs<br>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="vehicle_type" id="vehicle_type">
            <label class="form-check-label disc" for="vehicle_type">{{ $vehicle->engine_runs }}</label>
        </div>
    </div>
         
            <div class="col-md-2 sider1"><br> <span class="disc"></span></div>
            <div class="col-md-2 sider1"><br> <span class="disc"></span></div>
            
        </div>
    </div>

    {{-- Right Column (Service History Box) --}}
    <div class="col-md-4" >
        <div class="border rounded sider p-3 "style="background-color: var(--bs-navbar-bg) !important;">
            <h4>Service History</h4>
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">

                    <ul class="service-list">
                        <div class="service-title">Service Report</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->service_history }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Last Service</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->last_service }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">DVSA Mileage</div>
                            <li class="d-flex align-items-start ixed mb-2">
                            <div class="dot-box "><div class="dot p-2 m-2"></div></div>
                            <span class="disc">{{ $vehicle->dvsa_mileage }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">MOT Expiry Date</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->mot_expiry_date }}</span>
                        </li>
                    </ul>

                </div>
                <!-- Column 2 -->
                <div class="col-md-6">

                    <ul class="service-list">
                        <div class="service-title">No of Services</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->no_of_services }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Last Service Mileage</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->last_service_mileage }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">Service Notes</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
                            <span class="disc">{{ $vehicle->service_notes }}</span>
                        </li>
                    </ul>

                    <ul class="service-list">
                        <div class="service-title">MOT Due</div>
                        <li class="d-flex align-items-center mb-2">
                            <div class="dot-box"><div class="dot"></div></div>
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
</div>
</div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.querySelectorAll('.dropdown-item').forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            let value = this.getAttribute('data-value');
            let text = this.textContent;
            document.getElementById('platform_id').value = value;
            document.getElementById('platformDropdown').textContent = text;
        });
    });
</script>

@endpush

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

    @section('js')
        <script>
            document.querySelectorAll('oembed[url]').forEach(element => {
                const url = element.getAttribute('url');
                if (url.includes('youtube.com')) {
                    const videoId = new URL(url).searchParams.get('v');
                    if (videoId) {
                        const iframe = document.createElement('iframe');
                        iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId);
                        iframe.setAttribute('frameborder', '0');
                        iframe.setAttribute('allowfullscreen', '1');
                        iframe.style.width = '100%';
                        iframe.style.height = '400px';
                        element.parentNode.replaceChild(iframe, element);
                    }
                }
            });
        </script>
    @endsection
