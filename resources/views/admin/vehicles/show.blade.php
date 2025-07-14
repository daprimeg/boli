
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
</style>
@endsection

@section('content')
<div class="container-fluid  vehicle-detail-page">
    <div class="row ">
        {{-- Sidebar Filters --}}
        <div class="col-md-2 filters-sidebar border-end  text-white p-3">
           <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Filters</h5>
            <a href="{{URL::to('/admin/vehicles')}}" class="btn btn-outline-secondary">Clear All</a> 
    </div>
            {{-- Example: Platform Filter --}}
            <form method="GET" action="{{ URL::to('/vehicles/index')}}">
               <div class="row">
    <!-- Data Dropdown (left) -->
    <div class="col-md-5">
        <div class="form-group">
            <label for="data">Data</label>
            <div class="dropdown w-120">
                <button class="btn btn-secondary dropdown-toggle w-120 text-left" type="button"
                        id="dataDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Data
                </button>
                <div class="dropdown-menu w-100" aria-labelledby="dataDropdown">
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
    <div class="col-md-3">
        <div class="form-group">
            <label for="platform">Platform</label>
            <div class="dropdown w-50">
                <button class="btn btn-secondary dropdown-toggle w-120 text-left" type="button"
                        id="platformDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                     Platform
                </button>
                <div class="dropdown-menu w-100" aria-labelledby="platformDropdown">
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

                {{-- Add more filters here --}}
            </form>

            {{-- Vehicle List --}}
            <div class="vehicle-list mt-4 ">
               <div class="form-group mt-4">    
                    

    @foreach($vehicles as $v)
        <div class="vehicle-card">
            {{-- Toggle Button (Vehicle Title) --}}
            <button class="btn btn-secondary w-100 dropdown-toggle text-start mb-2"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#vehicle-{{ $v->id }}"
                    aria-controls="vehicle-{{ $v->id }}">
                <strong>{{ strtoupper($v->make->name) }}</strong><br>
                {{ $v->model->name }} {{ $v->year }}
            </button>

            {{-- Collapsible Details --}}
            <div class="collapse" id="vehicle-{{ $v->id }}">
                <div class="mt-2">
                    {{-- Pickup Info --}}
                    <div class="mb-2">
                        <span class="pickup-badge">BCA</span>
                        <span class="ms-2">{{ date('j/n/Y_H:i', strtotime($v->pickup_at ?? now())) }}</span>
                    </div>

                    {{-- Image --}}
              
                        <img src="{{ asset('public\images\tabs\dashboard.png') }}" alt="Vehicle Image" style=" width: 100%;height: 100%;object-fit: cover;" class="vehicle-image  mb-2">

                    {{-- Optional extra details --}}
                    
                    <p class="mb-0"><strong>Color:</strong> {{ $colors->name ?? 'N/A' }} </p>
                    <p><strong>Plate Number:</strong> {{ $v->plate_number ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>


            </div>
        </div>

        {{-- Main Content --}}
        <div class="col-md-9 p-4">
      <div class="col-md-12 p-4">
    <div class="row">
        {{-- Left Column: Image & Thumbnails --}}
        <div class="col-md-6">
           {{-- Main Image --}}
                        {{-- Main Image --}}
                        <img 
                            src="{{ asset('public\images\tabs\dashboard.png') }}" 
                            id="mainImage" 
                            class="img-fluid rounded border mb-3 w-100" 
                            style="height: 400px;  object-fit: cover; cursor: pointer;" 
                            alt="Vehicle Main Image"
                            data-bs-toggle="modal" 
                            data-bs-target="#imageModal"
                        >

                        {{-- Thumbnails --}}
                        <div class="d-flex flex-wrap justify-content-left gap-2">
                            <img 
                                src="{{ asset('public\images\tabs\dashboard.png') }}" 
                                class="img-thumbnail" 
                                style="cursor:pointer; width: 80px; border-radius: 20%; height: 80px; object-fit: cover;" 
                                onclick="changeMainImage(this.src)"
                            >
                            <img 
                                src="{{ asset('public\images\tabs\dashboard.png') }}" 
                                class="img-thumbnail" 
                                style="cursor:pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 20%;" 
                                onclick="changeMainImage(this.src)"
                            >
                            <img 
                                src="{{ asset('public\images\backgrounds\information.png') }}" 
                                class="img-thumbnail" 
                                style="cursor:pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 20%;" 
                                onclick="changeMainImage(this.src)"
                            >
                            <img 
                                src="{{ asset('public\images\backgrounds\information.png') }}" 
                                class="img-thumbnail" 
                                style="cursor:pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 20%;" 
                                onclick="changeMainImage(this.src)"
                            >
                            <img 
                                src="{{ asset('public\images\backgrounds\information.png') }}" 
                                class="img-thumbnail" 
                                style="cursor:pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 20%;" 
                                onclick="changeMainImage(this.src)"
                            >
                            <img 
                                src="{{ asset('public\images\backgrounds\information.png') }}" 
                                class="img-thumbnail" 
                                style="cursor:pointer; width: 80px; height: 80px; object-fit: cover; border-radius: 20%;" 
                                onclick="changeMainImage(this.src)"
                            >
                        </div>
                        
                        {{-- Modal --}}
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

                function changeMainImage(src) {
                    document.getElementById('mainImage').src = src;
                    document.getElementById('modalImage').src = src;
                }
            </script>

        {{-- Right Column: Info --}}
        
        <div class="col-md-6">
            <h3>{{ $vehicle->year }} {{ $vehicle->make->name }} {{ $vehicle->model->name }} – {{ $vehicle->variant->name }}</h3>
        <div class="row text-start">
           <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Make</strong><br>
                {{ $vehicle->make->name }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Model</strong><br>
                {{ $vehicle->model->name }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Vareient</strong><br>
                {{ $vehicle->grade }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>year</strong><br>
                {{ $vehicle->year  }}
            </li>
        </ul>
    </div>
  
    </div>
        <div class="row text-start mb-4">
           <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Platform</strong><br>
                {{ $vehicle->auction->platform->name }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Auction</strong><br>
                {{ $vehicle->auction->auction_date}}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Inspaction</strong><br>
                <button class="btn btn-info" onclick="btn">
                view report</button>
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Inspaction</strong><br>
               <button class="btn btn-info" onclick="btn">
                view report</button>
            </li>
        </ul>
    </div>
    </div>
            {{-- Disclaimer Accordion --}}
            <div class="accordion mt-3" id="disclaimerAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bg-danger collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            Disclaimer
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#disclaimerAccordion">
                        <div class="accordion-body">
                            This vehicle data source is from {{ $vehicle->data_source ?? 'Unknown' }}.
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion mt-3" id="disclaimerAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo">
                            Disclaimer
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
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree">
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
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
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



 





            {{-- Quick Stats --}}
    <div class="row text-start mb-4">
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Reg</strong><br>
                {{ $vehicle->reg }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>DOR</strong><br>
                {{ $vehicle->dor }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Mileage</strong><br>
                {{ $vehicle->mileage }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong>Grade</strong><br>
                {{ $vehicle->grade }}
            </li>
        </ul>
    </div>
    <div class="col">
        <ul style="list-style: square; padding-left: 1.2rem;">
            <li>
                <strong> Present V5</strong><br>
               {{ $vehicle->v5_status ? 'Present' : 'Not Present' }}
            </li>
        </ul>
    </div>
</div>

<div class="row">
    {{-- Left Column (Overview, Additional Info, Features) --}}
    <div class="col-md-8">
        {{-- Overview --}}
        <h4>Overview</h4>
        <hr style="border-color: #44485e;">
        <div class="row">
            <div class="col-md-3"><strong>Make:</strong> {{ $vehicle->vehicle_id }}</div>
            <div class="col-md-3"><strong>Make:</strong> {{ $vehicle->make->name }}</div>
            <div class="col-md-3"><strong>Model:</strong> {{ $vehicle->model->name }}</div>
            <div class="col-md-3"><strong>Variant:</strong> {{ $vehicle->variant->name }}</div>
            <div class="col-md-3"><strong>CC:</strong> {{ $vehicle->cc }}</div>
            <div class="col-md-3"><strong>Year:</strong> {{ $vehicle->year }}</div>
            <div class="col-md-3"><strong>Body Type:</strong> {{ $vehicle->body_id }}</div>
            <div class="col-md-3"><strong>Color:</strong> {{ $vehicle->color_id }}</div>
            <div class="col-md-3"><strong>Fuel Type:</strong> {{ $vehicle->fuel_type }}</div>
            <div class="col-md-3"><strong>Transmission:</strong> {{ $vehicle->transmission }}</div>
            <div class="col-md-3"><strong>Keys:</strong> {{ $vehicle->keys }}</div>
            <div class="col-md-3"><strong>Doors:</strong> {{ $vehicle->doors }}</div>
            <div class="col-md-3"><strong>Seats:</strong> {{ $vehicle->seats }}</div>
        </div>

        {{-- Additional Information --}}
        <h4 class="mt-4">Additional Information</h4>
        <hr style="border-color: #44485e;">
        <div class="row">
            <div class="col-md-3"><strong>Former Keepers:</strong> {{ $vehicle->former_keepers }}</div>
            <div class="col-md-3"><strong>Vendor:</strong> {{ $vehicle->vendor }}</div>
            <div class="col-md-3"><strong>Registration Date:</strong> {{ $vehicle->Registration }}</div>
            <div class="col-md-3"><strong>VAT Type:</strong> {{ $vehicle->vat_type }}</div>
            <div class="col-md-3"><strong>Euro Status:</strong> {{ $vehicle->euro_status }}</div>
            <div class="col-md-3"><strong>Engine Runs:</strong> {{ $vehicle->engine_runs }}</div>
        </div>

        {{-- Features / Equipment --}}
        <h4 class="mt-4">Features & Equipment</h4>
        <hr style="border-color: #44485e;">
        <div class="row">
            <div class="col-md-12"><strong>{{ $vehicle->features }}</strong></div>
        </div>
    </div>

    {{-- Right Column (Service History Box) --}}
    <div class="col-md-4">
        <div class="border rounded p-3 bg-light">
            <h4>Service History</h4>
            <hr style="border-color: #44485e;">

            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-6">
                    <ul style="list-style: none; padding-left: 0;">
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: blue; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->service_history }}
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: black; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->last_service }}
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: black; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->dvsa_mileage }}
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: black; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->mot_expiry_date }}
                        </li>
                    </ul>
                </div>

                <!-- Column 2 -->
                <div class="col-md-6">
                    <ul style="list-style: none; padding-left: 0;">
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: black; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->last_service }}
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: black; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->last_service_mileage }}
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: black; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->service_notes }}
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <div style="border-radius: 70%; background-color: black; margin-right:10px; border:2px solid white; height: 20px; width:20px;"></div>
                            {{ $vehicle->mot_due }}
                        </li>
                    </ul>
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
