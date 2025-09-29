<div class="card border-0 shadow-sm" style="background-color:#0d1b2a;">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap" 
         style="background-color:#0d1b2a; border-bottom:1px solid #1b263b;">
        <h5 class="mb-0 text-white"><strong>Recent review</strong></h5>
        <span class="badge bg-light text-primary">{{ $recentVehicles->count() }} View</span>
    </div>

    <div class="card-body text-white">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-white mt-5" style="background-color:#1b263b;">
                <thead style="background-color:#0d1b2a; color:#fff;">
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
                   @forelse($recentVehicles as $vehicle)
                        @php
                           
                            $image = null;
                            if (!empty($vehicle->images)) {
                                $imageArray = explode(',', $vehicle->images);
                                $image = trim($imageArray[0]); 
                            }
                        @endphp
                        <tr>
                            <td>
                                @if($image)
                                    <img src="{{ asset($image) }}" 
                                        class="rounded border border-primary" 
                                        width="60" height="40"
                                        alt="{{ $vehicle->title }}">
                                @else
                                    <span class="badge bg-secondary">{{ $vehicle->title ?? 'N/A' }}</span>
                                @endif
                            </td>
                            <td>{{ $vehicle->make->name ?? 'N/A' }} {{ $vehicle->model->name ?? 'N/A' }} {{ $vehicle->variant->name ?? 'N/A' }}</td>
                            <td>{{ $vehicle->make->name ?? 'N/A' }}</td>
                            <td>{{ $vehicle->model->name ?? 'N/A' }}</td>
                            <td>{{ $vehicle->variant->name ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ url('auction-finder/vehicle/'.$vehicle->id) }}" 
                                class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No recent views in last 2 days
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
