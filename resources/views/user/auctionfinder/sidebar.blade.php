  <!-- Vehicle Type Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingVehicleType">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehicleType" aria-expanded="false" aria-controls="collapseVehicleType">
                           Vehicle Type
                           </button>
                        </h2>
                        <div id="collapseVehicleType" class="accordion-collapse collapse show" aria-labelledby="headingVehicleType" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($vehicleTypes as $type)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="vehicle_types[]" value="{{ $type->id }}" id="vehicle_type_{{ $type->id }}">
                                    <label class="form-check-label" for="vehicle_type_{{ $type->id }}">
                                    {{ $type->name }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($type->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <!-- Make Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingVehicleType">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehiclemake" aria-expanded="false" aria-controls="collapseVehicleType">
                           Make
                           </button>
                        </h2>
                        <div id="collapseVehiclemake" class="accordion-collapse collapse" aria-labelledby="headingVehicleType" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($vehiclemakes as $type)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="makes[]" value="{{ $type->id }}" id="vehicle_type_{{ $type->id }}">
                                    <label class="form-check-label" for="vehicle_type_{{ $type->id }}">
                                    {{ $type->name }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($type->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <!-- Model Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingVehicleType">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehiclemodel" aria-expanded="false" aria-controls="collapseVehicleType">
                           Model
                           </button>
                        </h2>
                        <div id="collapseVehiclemodel" class="accordion-collapse collapse" aria-labelledby="headingVehicleType" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($vehiclemodels as $type)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="models[]" value="{{ $type->id }}" id="vehicle_type_{{ $type->id }}">
                                    <label class="form-check-label" for="vehicle_type_{{ $type->id }}">
                                    {{ $type->name }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($type->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <!-- Variant Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingVehicleType">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehiclevariant" aria-expanded="false" aria-controls="collapseVehicleType">
                           Model Variant
                           </button>
                        </h2>
                        <div id="collapseVehiclevariant" class="accordion-collapse collapse" aria-labelledby="headingVehicleType" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($vehiclevariants as $type)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="variants[]" value="{{ $type->id }}" id="vehicle_type_{{ $type->id }}">
                                    <label class="form-check-label" for="vehicle_type_{{ $type->id }}">
                                    {{ $type->name }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($type->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                     
                     <!-- Years Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingVehicleType">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehicleyear" aria-expanded="false" aria-controls="collapseVehicleType">Years
                           </button>
                        </h2>
                        <div id="collapseVehicleyear" class="accordion-collapse collapse" aria-labelledby="headingVehicleType" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($vehicleyears as $type)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="years[]" value="{{ $type->id }}" id="vehicle_type_{{ $type->id }}">
                                    <label class="form-check-label" for="vehicle_type_{{ $type->id }}">
                                    {{ $type->year}}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($type->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>


                     <!-- Transmission Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingTransmission">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTransmission" aria-expanded="false" aria-controls="collapseTransmission">
                           Transmission
                           </button>
                        </h2>
                        <div id="collapseTransmission" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($transmissions as $trans)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="transmission[]" value="{{ $trans->transmission }}" id="trans_{{ Str::slug($trans->transmission) }}">
                                    <label class="form-check-label" for="trans_{{ Str::slug($trans->transmission) }}">
                                    {{ ucfirst($trans->transmission) }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <!-- Fuel type Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingTransmission">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefuel" aria-expanded="false" aria-controls="collapsefuel">
                           Fuel Type
                           </button>
                        </h2>
                        <div id="collapsefuel" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($fuel_types as $trans)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="fuel_type[]" value="{{ $trans->fuel_type }}" id="trans_{{ Str::slug($trans->fuel_type) }}">
                                    <label class="form-check-label" for="trans_{{ Str::slug($trans->fuel_type) }}">
                                    {{ ucfirst($trans->fuel_type) }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <!-- Body type Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingVehicleType">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehiclebody" aria-expanded="false" aria-controls="collapseVehiclebody">
                           Body Type
                           </button>
                        </h2>
                        <div id="collapseVehiclebody" class="accordion-collapse collapse" aria-labelledby="headingVehicleType" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($vehiclebodys as $type)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="body_types[]" value="{{ $type->id }}" id="vehicle_type_{{ $type->id }}">
                                    <label class="form-check-label" for="vehicle_type_{{ $type->id }}">
                                    {{ $type->name }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($type->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <!-- Color Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingVehicleType">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehiclecolor" aria-expanded="false" aria-controls="collapseVehiclecolor">
                           Color
                           </button>
                        </h2>
                        <div id="collapseVehiclecolor" class="accordion-collapse collapse" aria-labelledby="headingVehicleType" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($vehiclecolors as $type)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="colors[]" value="{{ $type->id }}" id="vehicle_type_{{ $type->id }}">
                                    <label class="form-check-label" for="vehicle_type_{{ $type->id }}">
                                    {{ $type->name }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($type->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>


                     <!-- Doors Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingTransmission">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsedoor" aria-expanded="false" aria-controls="collapsedoor">
                           Door
                           </button>
                        </h2>
                        <div id="collapsedoor" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($doors as $trans)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="doors[]" value="{{ $trans->doors }}" id="trans_{{ Str::slug($trans->doors) }}">
                                    <label class="form-check-label" for="trans_{{ Str::slug($trans->doors) }}">
                                    {{ ucfirst($trans->doors) }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>



                     <!-- Seats Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingTransmission">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseats" aria-expanded="false" aria-controls="collapseseats">
                           Seats
                           </button>
                        </h2>
                        <div id="collapseseats" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($seats as $trans)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="seats[]" value="{{ $trans->seats }}" id="trans_{{ Str::slug($trans->seats) }}">
                                    <label class="form-check-label" for="trans_{{ Str::slug($trans->seats) }}">
                                    {{ ucfirst($trans->seats) }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>



                     <!-- Grade Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingTransmission">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsegrade" aria-expanded="false" aria-controls="collapsegrade">
                           Grade
                           </button>
                        </h2>
                        <div id="collapsegrade" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($grades as $trans)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="grades[]" value="{{ $trans->grade }}" id="trans_{{ Str::slug($trans->grade) }}">
                                    <label class="form-check-label" for="trans_{{ Str::slug($trans->grade) }}">
                                    {{ ucfirst($trans->grade) }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>



                     <!-- V5 Filter -->
                     <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingTransmission">
                           <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsev5" aria-expanded="false" aria-controls="collapsev5">
                           V5
                           </button>
                        </h2>
                        <div id="collapsev5" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                           <div class="accordion-body py-1">
                              @foreach ($v5 as $trans)
                              <div class="form-check d-flex justify-content-between align-items-center">
                                 <div>
                                    <input class="form-check-input me-1" type="checkbox" name="v5[]" value="{{ $trans->v5 }}" id="trans_{{ Str::slug($trans->v5) }}">
                                    <label class="form-check-label" for="trans_{{ Str::slug($trans->v5) }}">
                                    {{ ucfirst($trans->v5) }}
                                    </label>
                                 </div>
                                 <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <!-- Engine Size/CC Filter -->
                        <div class="accordion-item border-bottom">
                           <h2 class="accordion-header" id="headingTransmission">
                              <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecc" aria-expanded="false" aria-controls="collapsecc">
                              Engine Size
                              </button>
                           </h2>
                           <div id="collapsecc" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                              <div class="accordion-body py-1">
                                 @foreach ($cc as $trans)
                                 <div class="form-check d-flex justify-content-between align-items-center">
                                    <div>
                                       <input class="form-check-input me-1" type="checkbox" name="cc[]" value="{{ $trans->cc }}" id="trans_{{ Str::slug($trans->cc) }}">
                                       <label class="form-check-label" for="trans_{{ Str::slug($trans->cc) }}">
                                       {{ ucfirst($trans->cc) }}
                                       </label>
                                    </div>
                                    <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>


                        <!-- Former Keeper Filter -->
                        <div class="accordion-item border-bottom">
                           <h2 class="accordion-header" id="headingTransmission">
                              <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseformer_keepers" aria-expanded="false" aria-controls="collapseformer_keepers">
                              Former Keepers
                              </button>
                           </h2>
                           <div id="collapseformer_keepers" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                              <div class="accordion-body py-1">
                                 @foreach ($former_keepers as $trans)
                                 <div class="form-check d-flex justify-content-between align-items-center">
                                    <div>
                                       <input class="form-check-input me-1" type="checkbox" name="former_keepers[]" value="{{ $trans->former_keepers }}" id="trans_{{ Str::slug($trans->former_keepers) }}">
                                       <label class="form-check-label" for="trans_{{ Str::slug($trans->former_keepers) }}">
                                       {{ ucfirst($trans->former_keepers) }}
                                       </label>
                                    </div>
                                    <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>


                        <!-- No Of services Filter -->
                        <div class="accordion-item border-bottom">
                           <h2 class="accordion-header" id="headingTransmission">
                              <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenumber_of_services" aria-expanded="false" aria-controls="collapsenumber_of_services">
                              No. of Services
                              </button>
                           </h2>
                           <div id="collapsenumber_of_services" class="accordion-collapse collapse" aria-labelledby="headingTransmission" data-bs-parent="#filterAccordion">
                              <div class="accordion-body py-1">
                                 @foreach ($number_of_services as $trans)
                                 <div class="form-check d-flex justify-content-between align-items-center">
                                    <div>
                                       <input class="form-check-input me-1" type="checkbox" name="number_of_services[]" value="{{ $trans->no_of_services }}" id="trans_{{ Str::slug($trans->no_of_services) }}">
                                       <label class="form-check-label" for="trans_{{ Str::slug($trans->no_of_services) }}">
                                       {{ ucfirst($trans->no_of_services) }}
                                       </label>
                                    </div>
                                    <span class="badge bg-light text-muted">{{ number_format($trans->total) }}</span>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>

                        <div class="accordion-item ">
                           <h2 class="accordion-header" id="headingMileage">
                              <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMileage" aria-expanded="false" aria-controls="collapseMileage">
                                 Mileage
                              </button>
                           </h2>
                           <div id="collapseMileage" class="accordion-collapse collapse" aria-labelledby="headingMileage" data-bs-parent="#filterAccordion">
                              <div class="accordion-body py-1">
                                 <div class="row">
                                    <div class="col-6">
                                       <select class="form-select" id="mileage_from">
                                          <option value="">From</option>
                                          <option value="0">0</option>
                                          <option value="10000">10,000</option>
                                          <option value="20000">20,000</option>
                                          <option value="30000">30,000</option>
                                          <option value="40000">40,000</option>
                                          <option value="50000">50,000</option>
                                          <option value="60000">60,000</option>
                                          <option value="70000">70,000</option>
                                          <option value="80000">80,000</option>
                                          <option value="90000">90,000</option>
                                          <option value="100000">100,000</option>
                                       </select>
                                    </div>
                                    <div class="col-6">
                                       <select class="form-select" id="mileage_to">
                                          <option value="">To</option>
                                          <option value="10000">10,000</option>
                                          <option value="20000">20,000</option>
                                          <option value="30000">30,000</option>
                                          <option value="40000">40,000</option>
                                          <option value="50000">50,000</option>
                                          <option value="60000">60,000</option>
                                          <option value="70000">70,000</option>
                                          <option value="80000">80,000</option>
                                          <option value="90000">90,000</option>
                                          <option value="100000">100,000</option>
                                          <option value="150000">150,000</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>



                        <!-- Vehicle Age Filter -->
                        {{-- <div class="accordion-item border-bottom">
                           <h2 class="accordion-header" id="headingVehicleAge">
                              <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehicleAge" aria-expanded="false" aria-controls="collapseVehicleAge">
                                 Vehicle Age
                              </button>
                           </h2>
                           <div id="collapseVehicleAge" class="accordion-collapse collapse" aria-labelledby="headingVehicleAge" data-bs-parent="#filterAccordion">
                              <div class="accordion-body py-1">
                                 <div class="row">
                                    <div class="col-6">
                                       <select class="form-select" id="vehicle_age_from">
                                          <option value="">From</option>
                                          <option value="0">0 months</option>
                                          <option value="6">6 months</option>
                                          <option value="12">12 months</option>
                                          <option value="18">18 months</option>
                                          <option value="24">2 years</option>
                                          <option value="36">3 years</option>
                                          <option value="48">4 years</option>
                                          <option value="60">5 years</option>
                                          <option value="72">6 years</option>
                                          <option value="84">7 years</option>
                                          <option value="96">8 years</option>
                                          <option value="108">9 years</option>
                                          <option value="120">10 years</option>
                                       </select>
                                    </div>
                                    <div class="col-6">
                                       <select class="form-select" id="vehicle_age_to">
                                          <option value="">To</option>
                                          <option value="6">6 months</option>
                                          <option value="12">12 months</option>
                                          <option value="18">18 months</option>
                                          <option value="24">2 years</option>
                                          <option value="36">3 years</option>
                                          <option value="48">4 years</option>
                                          <option value="60">5 years</option>
                                          <option value="72">6 years</option>
                                          <option value="84">7 years</option>
                                          <option value="96">8 years</option>
                                          <option value="108">9 years</option>
                                          <option value="120">10 years</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> --}}
