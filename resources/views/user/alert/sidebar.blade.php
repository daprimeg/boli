<!-- Make Filter -->
<div class="accordion-item border-bottom">
   <h2 class="accordion-header" id="headingMake">
      <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" 
              data-bs-target="#collapseVehiclemake" aria-expanded="false" aria-controls="collapseVehiclemake">
         Make
      </button>
   </h2>
   <div id="collapseVehiclemake" class="accordion-collapse collapse">
      <div class="accordion-body py-1 tags tags-make"></div>
   </div>
</div>

<!-- Model Filter -->
<div class="accordion-item border-bottom">
   <h2 class="accordion-header" id="headingModel">
      <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" 
              data-bs-target="#collapseVehiclemodel" aria-expanded="false" aria-controls="collapseVehiclemodel">
         Model
      </button>
   </h2>
   <div id="collapseVehiclemodel" class="accordion-collapse collapse">
      <div class="accordion-body py-1 tags tags-model"></div>
   </div>
</div>

<!-- Variant Filter -->
<div class="accordion-item border-bottom">
   <h2 class="accordion-header" id="headingVariant">
      <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" 
              data-bs-target="#collapseVehiclevariant" aria-expanded="false" aria-controls="collapseVehiclevariant">
         Variant
      </button>
   </h2>
   <div id="collapseVehiclevariant" class="accordion-collapse collapse">
      <div class="accordion-body py-1 tags tags-variant"></div>
   </div>
</div>

<!-- Year Filter -->
<div class="accordion-item border-bottom">
   <h2 class="accordion-header" id="headingYear">
      <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" 
              data-bs-target="#collapseVehicleYear" aria-expanded="false" aria-controls="collapseVehicleYear">
         Year
      </button>
   </h2>
   <div id="collapseVehicleYear" class="accordion-collapse collapse">
      <div class="accordion-body py-1 tags tags-year"></div>
   </div>
</div>

<!-- Fuel Type Filter -->
<div class="accordion-item border-bottom">
   <h2 class="accordion-header" id="headingFuel">
      <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" 
              data-bs-target="#collapseVehicleFuel" aria-expanded="false" aria-controls="collapseVehicleFuel">
         Fuel Type
      </button>
   </h2>
   <div id="collapseVehicleFuel" class="accordion-collapse collapse">
      <div class="accordion-body py-1 tags tags-fuel_type"></div>
   </div>
</div>



<!-- Mileage Filter -->
<div class="accordion-item">
   <h2 class="accordion-header" id="headingMileage">
      <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" 
              data-bs-target="#collapseMileage" aria-expanded="false" aria-controls="collapseMileage">
         Mileage
      </button>
   </h2>
   <div id="collapseMileage" class="accordion-collapse collapse">
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
   <div class="tags tags-mileage_range"></div>
</div>
