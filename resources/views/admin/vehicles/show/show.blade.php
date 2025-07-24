
@extends('admin.partial.app')
@push('title') vehicle @endpush
@section('css')
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   
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
        background-color: #0f1c2c !important;
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
        /* background-color: #0A2E55; Dark blue box */
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
        width: 44px;
        height: 44px;
        background-color: #0d6efd;
        border-radius: 30%;
      
      /* box-shadow: 0px 0px 5px 12px #0a2e55;
-webkit-box-shadow: 0px 0px 5px 12px #0a2e55;
-moz-box-shadow: 0px 0px 5px 12px #0a2e55; */
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
        .vehicle-detail-page{

       
       
        }   
    .showblade-bg-img-dot {
    background: 
        linear-gradient(to top, 
            /* rgba(15, 28, 44, 1) 0%,  */
            rgba(15, 28, 44, 1) 48%, 
            /* rgba(15, 28, 44, 0) 20%,  */
            rgba(15, 28, 44, 0) 100%
        ),
        url('{{ asset('/public/theme/assets/Dots.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}


  .nav-tabs .nav-link {
    background-color: transparent;
    border: none;
    color: var(--bs-heading-color);
    border-radius: 8px;
    box-shadow: none;
    margin-right: 5px;
    transition: 0.3s ease;
  }

  /* Your custom active style */
  .nav-tabs .nav-link.active {
    background-color: var(--bs-primary);
    color: var(--bs-heading-color) !important;
    border-radius: 8px;
    box-shadow: none;
  }

  /* Optional: Hover effect */
  .nav-tabs .nav-link:hover {
    background-color: rgba(0, 0, 0, 0.05);
  }

  /* Optional: Remove tab bottom border */
  .nav-tabs {
    border-bottom: none;
  }

        #chart{
        max-width: 700px;
        margin: 30px auto;
        }
     
</style>
@endsection

@section('content')
<div class=" sider vehicle-detail-page" style="padding-left: 0px; padding-right: 14px ">
     <div class="d-flex">
      @include('admin.vehicles.show.sidebar')

        {{-- Main contaent --}}


            <div class=" py-5 showblade-bg-img-dot " style="width: calc(100% - 281px); ">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-left: 60px;">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"  >vehicle Details</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"  >vehicle valuation</button>
                </li>
                
            </ul>

            <div class="tab-content p-0" id="myTabContent" >
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div id="tabContent">
                @include('admin.vehicles.show.vehicle_details') 
            
            </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @include('admin.vehicles.show.vehicle_valuation') 
                </div>
                
            </div>


            </div>
</div>


        {{-- <div class="p-4 bg-white" > --}}
            {{-- <div class="mb-4" > --}}
             {{-- <div class="flex space-x-4"> --}}
    {{-- <button 
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
    </button> --}}
{{-- </div> --}}
{{-- </div> --}}
    {{-- <div id="tabContent">
   @include('admin.vehicles.show.vehicle_valuation') 
   </div> --}}
            
{{-- </div> --}}

</div>



@endsection


@section('js')

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



 <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    // Initialize Swiper
                    const swiper = new Swiper('.mySwiper', {
                        slidesPerView: 4,
                        spaceBetween: 10,
                        breakpoints: {
                            640: { slidesPerView: 5 },
                            768: { slidesPerView: 6 },
                        }
                    });

                    // Handle click on main image to open modal
                    const mainImage = document.getElementById('mainImage');
                    const modalImage = document.getElementById('modalImage');

                    if (mainImage) {
                        mainImage.addEventListener('click', function () {
                            if (modalImage) {
                                modalImage.src = this.src;
                            }
                        });
                    }

                    // Image array and index for cycling
                    const imageUrls = @json($vehicle->getImages());
                    let currentMainIndex = 0;

                    function cycleMainImage() {
                        currentMainIndex = (currentMainIndex + 1) % imageUrls.length;
                        if (mainImage && modalImage) {
                            mainImage.src = imageUrls[currentMainIndex];
                            modalImage.src = imageUrls[currentMainIndex];
                        }
                    }

                    // Set main image on thumbnail click
                    window.setMainImage = function (src) {
                        if (mainImage && modalImage) {
                            mainImage.src = src;
                            modalImage.src = src;
                        }
                    };
                    });
            </script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    $(function() {
 const options = {
                chart: {
                    type: 'area',
                    height: 350,
                    background: '#0b1d2a',
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#00E396', '#008FFB'], // green & blue
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                series: [
                    {
                        name: "CCA",
                        data: [12000, 13500, 13000, 14000]
                    },
                    {
                        name: "BCA",
                        data: [12300, 12800, 12500, 13200]
                    }
                ],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'April'],
                    labels: {
                        style: {
                          colors: '#ccc'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: val => `£${val.toLocaleString()}`,
                        style: {
                            colors: '#ccc'
                        }
                    }
                },
                tooltip: {
                  theme: 'dark'
                },
                legend: {
                    position: 'top',
                    labels: {
                        colors: '#fff'
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        opacityFrom: 0.5,
                        opacityTo: 0.2,
                    }
                },
                grid: {
                  borderColor: '#333'
                }
            };

            const chart = new ApexCharts(document.querySelector("#charts"), options);
            chart.render();
    })
           
</script>
@endsection



