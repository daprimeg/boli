        {{-- Sidebar Filters --}}
        <div class="filters-sidebar  border-end  text-white p-3" style="background-color: #0f1c2c; width:500px ">
           <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Filters</h5>
                    <a href="{{URL::to('')}}" class="btn" style="text-decoration: underline; text-decoration-color: #07509a; margin-right: -12px;">Clear All</a> 
            </div>
            {{-- Example: Platform Filter --}}
            <form method="GET" action="{{ URL::to('/vehicles/index')}}">
               <div class="row">
                    <!-- Data Dropdown (left) -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="dropdown ">
                                <button class="btn border dropdown-toggle  text-left py-1 px-1" type="button"
                                        id="dataDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        id="platformDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <div class="col-md-5 d-flex justify-content-end align-items-center">
                                <div class="form-group mb-0">
                                    <span style="font-size:20px; margin-right: -20px">15,276</span>
                                </div>
                            </div>
                </div>
            </form>

            {{-- Vehicle List --}}
            <div class="vehicle-list mt-4 ">
               <div class="form-group mt-4">    
                                    

                    @foreach($vehicles as $v)
                        <div class="vehicle-card mb-4 border  " style="border-radius: 2px;  ">
                            {{-- Toggle Button (Vehicle Title) --}}
                        
                            <button class="btn btn1 btn-primary w-100 dropdown-toggle text-start  collapsed "
                                    type="button"
                                    style="justify-content: space-between; font-weight: 300; border-color:#44485e; box-shadow: none;"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#vehicle-{{ $v->id }}"
                                    aria-controls="vehicle-{{ $v->id }}">
                                    <div class="text-left" > 
                                        <p class="m-0" style="text-align: left; font-size: 15px; ">{{ strtoupper($v->make->name) }}</p>
                                        <p class="m-0" style="text-align: left; font-size: 15px;  "> {{ $v->model->name }} {{ $v->year }}</p>
                                </div>
                            </button>

                            {{-- Collapsible Details --}}
                                <div class="collapse" style="padding: 17px; padding-top: 0px;" id="vehicle-{{ $v->id }}">
                                <div class="">
                                    {{-- Pickup Info --}}
                                    <div class="mb-2">
                                                {{-- <a href="{{$v->id}}" > --}}
                                            <button class="pickup-badge btn border   pl-3" style="font-size: 12px; background-color: #0f1c2c ">{{ $vehicle->auction->platform->name }}</button>
                                                {{-- </a> --}}
                                        <span class="ms-2">{{ date('j/n/Y_H:i', strtotime($v->pickup_at ?? now())) }}</span>
                                    </div>

                                            {{-- Image --}}
                                            <img src="{{ $v->getImage() }}"
                                                alt="Vehicle Image"
                                                class="vehicle-image mb-2"
                                                style="border-radius: 20px; max-width: 85%; height: 100%; display: block; margin-left: auto; margin-right: auto;">
                                    </div>
                                </div>
                        
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
        
