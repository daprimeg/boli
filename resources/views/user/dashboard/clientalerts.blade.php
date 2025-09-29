<div class="card shadow-lg border-0" style="background-color:#0d1b2a;">
    
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap" 
         style="background-color:#0d1b2a; border-bottom:1px solid #1b263b;">
        
        <h5 class="mb-0 text-white"><strong>Your Alerts</strong></h5>
          <span class="badge bg-light text-primary">{{ $alertVehicles->count() }} Alerts</span>

    
        {{-- <div class="input-group input-group-sm mt-2 mt-md-0" style="width:220px;">
            <input type="text" id="alertsFilter" 
                   class="form-control rounded-0"
                   style="background-color:#1b263b; color:#ffffff; border:1px solid #415a77;"
                   placeholder="Search...">
            <button class="btn btn-primary rounded-0" type="button">Go</button>
        </div> --}}
    </div>

    <div class="card-body text-white">
       
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-white mt-5"  id="alertsTable"
                   style="background-color:#1b263b;">
                <thead style="background-color:#0d1b2a;; color:#fff;">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Make</th>
                        <th scope="col">Model</th>
                        <th scope="col">Variant</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                    <tbody>
                         @forelse($alertVehicles as $vehicle)
                        <tr>
                            <td>
                                @php
                                    $image = null;
                                    if (!empty($vehicle->images)) {
                                        $imagesArray = explode(',', $vehicle->images);
                                        $image = $imagesArray[0] ?? null;
                                    }
                                @endphp

                                @if($image)
                                    <img src="{{$image }}" class="rounded border border-primary" width="60" height="40">
                                @else
                                    <span class="text-muted">{{ $vehicle->title ?? 'N/A' }}</span>
                                @endif
                            </td>
                            <td>{{ $vehicle->title ?? 'N/A' }}</td>
                            <td>{{ $vehicle->make->name ?? 'N/A' }}</td>
                            <td>{{ $vehicle->model->name ?? 'N/A' }}</td>
                            <td>{{ $vehicle->variant->name ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ url('vehicles/'.$vehicle->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No alerts found</td>
                        </tr>
                    @endforelse
                    </tbody>

            </table>
        </div>
    </div>
</div>


