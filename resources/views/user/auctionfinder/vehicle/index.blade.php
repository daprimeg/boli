
@extends('admin.partial.app')
@push('title') Vehicle @endpush
@section('css')

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
 <style>

    .menu-button{
        display: none;
    }

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
        url('{{ asset('/public/theme/assets/autoboli.png') }}');
    background-size: contain;
    
    background-position: top center; /* 👈 Image upar center ho jayegi */
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


.circle-checkbox {
  display: flex;
  align-items: center;
  position: relative;
  padding-left: 28px;
  margin-bottom: 10px;
  font-size: 14px;
  color: white;
  cursor: pointer;
}

.circle-checkbox input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.circle-checkbox .circle {
  position: absolute;
  left: 0;
  top: 2px;
  width: 16px;
  height: 16px;
  background-color: transparent;
  border: 2px solid var(--bs-border-color) !important; /* default border */
  border-radius: 6px; /* lightly rounded box */
  box-sizing: border-box;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* inner dot when checked */
.circle-checkbox input:checked + .circle::after {
  content: "";
  width: 8px;
  height: 8px;
  background-color: #0d6efd;
  border-radius: 50%;
}

/* if checked, change outer border */
.circle-checkbox input:checked + .circle {
  border-color: #0d6efd;
}

/* disabled style */
.circle-checkbox.disabled {
  color: #6c757d;
  cursor: not-allowed;
}
     
</style>
@endsection

@section('content')
<div class="sider vehicle-detail-page" style="padding-left: 0px; padding-right: 14px">
        <div class="d-flex">
                @include('user.auctionfinder.vehicle.sidebar')
                <div class=" py-5 showblade-bg-img-dot " style="width: calc(100% - 281px); ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-left: 60px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Vehicle Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Vehicle Valuation</button>
                            </li>
                        </ul>
                        <div class="tab-content p-0" id="myTabContent" >
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div id="tabContent">
                                    @include('user.auctionfinder.vehicle.vehicle_details') 
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    @include('user.auctionfinder.vehicle.vehicle_valuation') 
                            </div>
                        </div>
                </div>
        </div>
</div>
@endsection
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

            $.ajax({
                type: "get",
                url: "{{url('/auctionfinder/data')}}",
                data: {
                    length:50,
                    page:1,
                    date_range:'past_3_months',
                    display_type:'auction',
                },
                dataType: "json",
                success: function (response) {
                    $('.total_count').text(response.total);
                    console.log(response);

                    response.data.forEach(element => {
            
                        $('.vehicle-list > div').append(`
                            <div class="vehicle-card mb-4 border-top" style="border-radius: 2px;">
                            <button class="btn btn1 btn-primary w-100 dropdown-toggle text-start  collapsed waves-effect waves-light" type="button" style="justify-content: space-between; font-weight: 300; border-color:#44485e; box-shadow: none;" data-bs-toggle="collapse" data-bs-target="#vehicle-3117" aria-controls="vehicle-3117">
                                <div class="text-left"> 
                                    <p class="m-0" style="text-align: left; font-size: 15px; ">${element.make_name}</p>
                                    <p class="m-0" style="text-align: left; font-size: 15px;  "> Astra 2013</p>
                                </div>
                            </button>
                         <a href="${element.id}">  
                             <div class="collapse" style="padding: 17px; padding-top: 0px;" id="vehicle-3117">
                               <div class="">
                                <div class="mb-2" style="  text-decoration: none;">
                                    <button class="pickup-badge btn border my-2 " style="font-size: 15px; background-color: var();border: 1px solid var(--bs-primary) !important; color: var(--bs-heading-color)">Manheim Auction</button>
                                    <span class="ms-2">1/8/2025_15:09</span>
                                </div>        
                                <img src="https://www1.bcaimage.com/Document?DocType=VehicleImage&amp;width=600&amp;docId=611866168" alt="Vehicle Image" class="vehicle-image mb-2" style="border-radius: 10px; max-width: 100%; height: 100%; display: block; margin-right: auto;">
                                </div> 
                           </div></a>
                        </div>`);

                    });

                    // $('.vehicle-list > div').html('');
                    
                }
            });


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
       }); 
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

    $(document).ready(function () {
         $('.menu-button').trigger('click');
    });

   


  </script>
@endsection



