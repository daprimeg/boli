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
      /* border-color: #000000 !important; */
      color: white !important;
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
      font-family: sans-serif;

    }
   .info-card .toggle-btn {
  transition: transform 0.4s ease;
}

.info-card.active .toggle-btn {
  transform: rotate(180deg);
}
.info-card.active {
margin-top: 20px;
background: #0f1c2c;
 padding-bottom: 20px;
 

}

.toggle-btn.minus-icon::before {
  content: '+';
  font-size: var(--font-h5);

  display: inline-block;
}

.info-card.active .toggle-btn.minus-icon::before {
  content: '-';
  color: #ffffff !important;
}


    .auction-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
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
      font-size: var(--font-h6);
      font-weight: bold;
    }
    .auction-item .change {
      display: flex;
      align-items: center;
      font-size: 1.1rem;
      font-weight: bold;
    }
    .auction-item .change span{
     color: var(--bs-primary) !important; /* Green for up */

    }
    
    .auction-item .change.down {
      color: #dc3545; /* Red for down */
    }
    .chart-section {
      border-radius: 8px;
      margin: 10px;
      margin-top: 20px;
      padding: 20px;
      background: rgba(0, 140, 255, 0.226);
    }

    

    .chart-section h5 {
      color: #a0aec0; 
    }
    .chart-placeholder {
      background-color:transparent !important; /* Darker blue for chart area */
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
          width: 360px;
          height: 360px;
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
        .tab-content:not(.doc-example-content){
          padding: 0;
        }
      
        .dashbord .nav-tabs .active{

          /* border-bottom: 4px solid var(--bs-primary); */
          padding-bottom: 10px;
          color: white !important;
           box-shadow: none !important;
           border: none!important;

        }
      
        .dashbord .nav-link:hover{

      
          color: white !important;

        }
         
        .dashbord .nav-tabs:hover .active:hover{

          /* border-bottom: 4px solid var(--bs-primary); */
          /* padding-bottom: 0px; */
          color: white !important;
          box-shadow: none !important;


        }
        .nav-tabs .active .borders{

          border-bottom: 3px solid var(--bs-primary)!important;
            padding-top: 0px !important;
    display: block;
    width: 53px;
    /* padding: 0px 0px; */
    margin: auto;
    padding-top: 5px !important;
}
        
        .tb-data-fonts tr td{
          font-size: var(--font-p1) !important;
        }


</style>
@endsection
@section('content')

    <div style="background:var(--bs-navbar-bg);" class="dashbord"  >
      <div class="" style="padding: 60px 60px; background-image: url({{asset('/public/themeadmin/images/backgrounds/Dots.png')}})" >

           <div class=" text-white mb-6" >
                <div class="row g-4" style="margin-bottom:50px ;">
                  <!-- Left: Welcome + Tabs -->
                  <div class="col-lg-8 align-self-end">
                    <div class="d-flex align-items-center ">

                      <h6 class=" fw-semibold ">
                        Welcome back, <h5 class="text-primary fw-bold ms-3 mt-1">Mr {{ auth()->user()->firstName ?? 'User' }}!</h5>
                      </h6>
                    </div>

                        <p class="mt-2 p-3 rounded text-white-50 w-75" style="backdrop-filter: blur(5px); background-color: var(--tra-primary-colr)!important; ">
                            Choose the best plan for your needs.
                            <i class="hgi hgi-stroke hgi-sharp hgi-arrow-up-01"></i>
                        </p>

                        <!-- Tabs -->
                        {{-- <ul class="nav nav-tabs mt-4 border-bottom border-secondary">
                            <li class="nav-item">
                              <a class="nav-link active text-white border-bottom border-primary" href="#">Overview</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-white-50" href="#">My Interest</a>
                            </li>
                        </ul> --}}

                        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist"  style="border-bottom: 1px solid var(--bs-border-color)!important ; padding-top: 10px ">

                            <li class="nav-item" role="presentation">
                              <button class="d-block nav-link active" style="font-size: var(--font-p1); font-weight: var(--font-weight-semibold); margin-bottom: -10px !important" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                 <span class="d-block " >Overview</span> 
                                 <span class="borders mt-0" ></span>
                              </button>
                             
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="d-block nav-link" style="font-size: var(--font-p1); font-weight: var(--font-weight-semibold)  ; margin-bottom: -10px !important"  id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                  <span class="d-block" >Intrest</span> 
                                 <span class="borders mt-0" style="" ></span>
                                </button>
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


   <div class=" " style="background-color: #0F1C2C; ">

      <div class="tab-content " id="myTabContent">
          <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab" style="padding: 0rem 4rem; ">
            @include('user.dashboard.overview')
          </div>
          <div class="tab-pane fade" id="profile"  role="tabpanel" aria-labelledby="profile-tab">
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