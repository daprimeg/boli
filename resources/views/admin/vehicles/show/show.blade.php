
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
    .active-tab {
        background-color: #1e3a8a !important; /* Tailwind blue-800 */
        border: 2px solid #3b82f6;
    }
     
</style>
@endsection

@section('content')
<div class="container-fluid sider vehicle-detail-page" >
     <div class="d-flex" style="margin-left: -20px; background-image: url('{{ asset('/public/images/backgrounds/Dots.png') }}') ">
      @include('admin.vehicles.show.sidebar')

        {{-- Main Content --}}
        <div class="p-4" >
            <div class="mb-4" >
             <div class="flex space-x-4">
    <button 
        class="tab-button py-2 bg-blue-600 btn btn-primary m-4 mb-0 ml-0 text-white rounded-lg hover:bg-blue-700 transition"
        data-url="{{ url::to('/admin/vehicles/show/' . $vehicle->id . '/vehicle_details') }}"
        onclick="loadTabFromButton(this)">
        Vehicle Details
    </button>

    <button 
        class="tab-button py-2 bg-gray-700 btn btn-primary m-4 mb-0 text-white rounded-lg hover:bg-gray-800 transition"
        data-url="{{ url::to('/admin/vehicles/show/' . $vehicle->id . '/vehicle_valuation') }}"
        onclick="loadTabFromButton(this)">
        Vehicle Valuation
    </button>
</div>
                </div>
                    <div id="tabContent">
                        @include('admin.vehicles.show.vehicle_valuation') {{-- Load default tab --}}
                    </div>
            
</div>
</div>
</div>


@endsection


@push('scripts')
<script>
    function loadTabFromButton(button) {
        const url = button.getAttribute('data-url');

        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                return response.text();
            })
            .then(html => {
                document.getElementById('tabContent').innerHTML = html;

                // Optional: toggle button styling
                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active-tab'));
                button.classList.add('active-tab');
            })
            .catch(error => {
                document.getElementById('tabContent').innerHTML = `<p class="text-danger">Failed to load: ${error.message}</p>`;
            });
    }
</script>
@endpush



