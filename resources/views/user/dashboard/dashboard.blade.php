@extends('admin.partial.app')
@push('title') Dashboard @endpush
@section('css')
<style>

    .dotstats-box {
      width: 50px;
      height: 50px;
      background-color: #75797a; /* Dark blue box */
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      opacity: 0.5;
        
    }
    .bg-primary-subtle {
      background-color: rgba(13, 110, 253, 0.1); /* Bootstrap blue with 10% opacity */
    }
    
    .dotstats {
      width: 30px;
      height: 30px;
      background-color: #000000;
      border-radius: 30%;
      box-shadow: 0 0 6px rgba(76, 77, 78, 0.6);
      box-shadow: 0 0 20px rgb(86, 89, 94), 0 0 30px rgba(96, 97, 100, 0.8);
    }
    .chart-container {
      width: 280px;
    }

    .center-label {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 28px;
      font-weight: bold;
      color: white;
    }
     /* Custom scrollbar for overall page if content overflows */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    ::-webkit-scrollbar-track {
      background: #161b22;
    }
    ::-webkit-scrollbar-thumb {
      background: #30363d;
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #444c56;
    }

    /* Custom style for the Refer & Earn card background pattern */
    .refer-earn-card-bg {
      background-image: radial-gradient(#3b82f6 1px, transparent 1px);
      background-size: 20px 20px;
      opacity: 0.2;
    }

        

    /* Styles for active interest button */
    .interest-button.active {
      background-color: #090a0c !important; /* Bootstrap primary blue */
      border-color: #000000 !important;
      color: white;
    }

    /* Ensure the scrollable wrapper has a defined height if needed, or relies on content */
    .interest-buttons-scroll-wrapper {
      white-space: nowrap; /* Prevent wrapping when overflow-x is auto */
      /* Add this if you want a fixed height for the scrollable area: */
      /* height: 50px; */
      /* line-height: 50px; */ /* Adjust if needed for vertical alignment */
      align-items: center; /* Vertically align items in the scrollable row */
    }
    .toggle-btn {
      background: none;
      border: none;
      font-size: 1.2rem;
      cursor: pointer;
      color: red;
    } 
    .info-card {
      border-radius: 8px;
      /* margin-top: 20px; */
      /* padding: 20px; */
      font-family: sans-serif;

    }
    .auction-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 0;
      border-bottom: 1px solid #2d3748; /* Slightly lighter border */
    }
    .auction-item:last-child {
      border-bottom: none;
    }
    .auction-item .logo-text {
      display: flex;
      align-items: center;
    }
    .auction-item .logo-text img {
      height: 30px; /* Adjust logo size */
      margin-right: 10px;
    }
    .auction-item .price {
      font-size: 1.2rem;
      font-weight: bold;
    }
    .auction-item .change {
      display: flex;
      align-items: center;
      font-size: 1.1rem;
      font-weight: bold;
    }
    .auction-item .change.up {
      color: #28a745; /* Green for up */
    }
    .auction-item .change.down {
      color: #dc3545; /* Red for down */
    }
    .chart-section {
      border-radius: 8px;
      margin-top: 20px;
      padding: 20px;
      background: #0074ff1f;
    }

    

    .chart-section h5 {
      color: #a0aec0; 
    }
    .chart-placeholder {
      background-color: #2d3748; /* Darker blue for chart area */
      height: 200px; /* Placeholder height */
      margin-top: 15px;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      color: #4a5568;
    }
    .plus-icon {
      font-size: 1.5rem;
      color: #ffffff;
      margin-left: 15px;
      cursor: pointer;
    }
    .minus-icon {
      font-size: 1.5rem;
      color: #ffffff;
      margin-left: 15px;
      cursor: pointer;
    }
    .toggle-btn {
      background: none;
      border: none;
      font-size: 1.2rem;
      cursor: pointer;
      color: inherit;
    }


      .dashboard-card {
            background-color: #252836;
            border-radius: 16px;
            border: none;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            margin: 0 auto;
        }

       
        /* Ring chart */
        
        .Ring-chart-container {
            position: relative;
            width: 300px;
            height: 300px;
        }
        
        .progress-ring {
            position: relative;
            width: 100%;
            height: 100%;
        }
        
        .segment {
            position: absolute;
            width: 20px;
            height: 35px;
            border-radius: 4px;
            transform-origin: 9px 140px;
        }
        
        .center-content {
            position: absolute;
            top: 0%;
            left: 35%;
            text-align: center;
        }
       
        
       .select2-selection{
          background: #0F1C2C !important;
          display: flex !important;
          border: 1px solid #1d2938 !important;
            overflow-y: hidden;
           height: 33px;
       }

       .select2-container--default .select2-results__option--selected{
        background: var(--bs-primary)
       }
      .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background-color: transparent !important;  
       }



        .vehicleStates #chart-container {
          position: relative;
          width: 300px;
          height: 300px;
        }

        .vehicleStates #center-text {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
        }
        
        .vehicleStates #center-text h2 {
          margin: 0;
          font-size: 2rem;
        }

        .vehicleStates #center-text p {
          margin: 0;
          font-size: 1rem;
          color: #aaa;
        }
  
</style>
@endsection
@section('content')

    <div style="background:var(--bs-navbar-bg);" class=""  >
      <div class="" style="padding: 60px 60px; background-image: url({{asset('/public/themeadmin/images/backgrounds/Dots.png')}})" >

           <div class=" text-white mb-6" >
                <div class="row g-4">
                  <!-- Left: Welcome + Tabs -->
                  <div class="col-lg-8 align-self-end">
                        <h2 class="h4 fw-semibold">
                            Welcome back, <span class="text-primary fw-bold">Mr {{ auth()->user()->firstName ?? 'User' }}!</span>
                        </h2>

                        <div class="mt-2 bg-secondary bg-opacity-25 p-2 rounded text-white-50 w-75">
                            Choose the best plan for your needs.
                        </div>

                        <!-- Tabs -->
                        {{-- <ul class="nav nav-tabs mt-4 border-bottom border-secondary">
                            <li class="nav-item">
                              <a class="nav-link active text-white border-bottom border-primary" href="#">Overview</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-white-50" href="#">My Interest</a>
                            </li>
                        </ul> --}}

                        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Intrest</button>
                            </li>
                        </ul>
                  </div>

                  <!-- Right: Refer & Earn Card -->
                  <div class="col-lg-4">
                        
                          <div class="text-white d-flex align-items-center"  
                             style="
                                  background-color:var(--bs-primary);
                                  padding: 36px 50px;
                                  border-radius: 16px !important;
                               ">
                              <div class="">
                                    <h5 class="mb-0 " style="font-weight: 700">Refer & Earn</h5>
                                    <p class="text-black" style="font-weight: 800">
                                        Use Refer & Earn modal to encourage your exiting 
                                        customers refer their friends & colleague.
                                    </p>
                              </div>
                              <div class="dot-box"
                                 style="width: 100px; height: 50px; background-color: rgba(0, 0, 0, 0.466); border-radius: 8px;display: flex;align-items: center;justify-content: center;margin-left: 10px; ">
                                 <div class="dot"
                                     style=" width: 30px;  height: 30px; background-color: black;  border-radius: 4px;">
                                 </div>
                              </div>
                        </div>

                  </div>
                </div>
            </div>

      </div>
    </div>


   <div class="container-fluid " style="background-color: #0F1C2C;">

      <div class="tab-content " id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
           @include('user.dashboard.overview')
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @include('user.dashboard.intrest')

       
          </div>
      </div>

    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      let path = "{{url('/')}}";
      let totalVehicles = "{{$totalVehicles}}";
    </script>
    <script src="{{asset('/public/themeadmin/js/dashboard.js')}}"></script>
    
  
@endsection