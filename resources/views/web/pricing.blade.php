@extends('web.partial.layout')
@section('css')

<style>
    .pricing-card {
      background-color: var(--items-background) !important;
      border: 1px solid var(--items-border-colur) !important;
      height: 80vh !important;
      transition: .5s;
    }

    .pricing-card:hover {
      background: var(---background-color) !important;
      cursor: pointer;
    }

    .pricing-card-popular {
      background: linear-gradient(135deg,
          #0080ff28 80%,
          #222e3c98 100%) !important;
      border: 1px solid var(--text-color) !important;
      position: relative;
      border-radius: 10px;
      height: 85vh !important;
      padding: 20px 0px;
 transition: all 0.8s ease;     
  top: -20px;
    }


    .pricing-card-popular:hover{
      background: linear-gradient(45deg, #0080ff55 30%, #222e3ca5 96%) !important;
    backdrop-filter: blur(4px); /* Blur on hover */
    -webkit-backdrop-filter: blur(1px);
    }
    .popular-badge {
      position: absolute;
      top: -12px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(135deg, var(--items-border-colur), var(--text-color)) !important;
      border: none !important;
      padding: 6px 12px !important;
      font-size: 12px !important;
    }

    .price-original {
      color: #666 !important;
      text-decoration: line-through;
      font-size: 17px;
    }

    .price-current {
      color: white !important;
      font-size: 20px;
      font-weight: bold;
    }

    .price-period {
      color: #999 !important;
      font-size: 16px;
      font-weight: normal;
    }

    .billing-info {
      color: #999 !important;
      font-size: 12px;
    }

    .credits-info {
      color: var(--white-text) !important;
      font-size:17px;
    }

    .feature-text {
      color: #ccc !important;
      font-size: 14px;
    }

    .feature-subtext {
      color: #999 !important;
      font-size: 12px;
    }

    .btn-get-starteds {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      font-weight: 500;
    }

   

    

    .btn-light-custom {
      background: white !important;
      border: 1px solid white !important;
      color: black !important;
    }

    .btn-primary-custom {
      background: var(--text-color) !important;
      border: 1px solid var(--items-border-colur) !important;
      color: white !important;
    }



    .table-dark {
      background-color: var(--items-background) !important;
      border-collapse: separate;
      border-spacing: 0;
    }

    .table-dark th,
    .table-dark td {
      vertical-align: middle;
      padding: 15px 20px;
      text-align: center;
    }

    .table-dark th {
      color: #ccc;
    }

    .table-dark td:first-child,
    .table-dark th:first-child {
      text-align: left;
      color: #ccc;
    }

    .highlight {
      background-color: #2a2a3a !important;
    }
  </style>
@endsection

@section('content')

  <div class="d-flex p-0 p justify-content-center" style="height: 100vh; padding-top: 6rem !important;">

      <!-- Free Plan -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" >
        <div class="pricing-card h-100" 
        style="border-top-left-radius: 10px !important; border-bottom-left-radius: 12px; border-right: none !important;background-color: var(---background-color) !important;" >
          <div class="px-4 pt-4">
            <h5 class="text-white mb-3 fw-normal">Free</h5>

            <div class="mb-3">
              <div class="price-current">$0 <span class="price-period">/month</span></div>
            </div>
            <a href="{{url('/register?plan_id=2')}}" class="btn btn-get-starteds mb-4 " style="margin-top: 26px; border: 1px solid var(--items-border-colur) !important;color: #ccc !important;" >Get Started</a>
          </div>
          
          <div class="d-flex align-items-center mb-4 border-top border-bottom " style="border-color:var(--items-border-colur) !important ;">
            <i class="bi bi-lightning-charge text-warning py-2 ps-4 me-2"></i>
            <span class="credits-info">40 credits <span class="price-period">/day</span> </span>
            <i class="bi bi-info-circle ms-2 text-muted"></i>
          </div>
              <div class="p-4">
                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check-circle-fill text-primary me-2"></i>
                      <span class="feature-text">Image Generation</span>
                    </div>
                    <div class="feature-subtext ms-4 mb-2">2 AI models</div>

                  </div>

                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check-circle-fill text-primary me-2"></i>
                      <span class="feature-text">Image Editing</span>
                    </div>
                    <div class="feature-subtext ms-4 mb-2">1 project</div>
                  </div>
              </div>
         </div>
      </div>

      <!-- Entry Plan -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="card pricing-card h-100">
          <div class="px-4 pt-4">
            <h5 class="text-white mb-3 fw-normal">Entry</h5>

            <div class="d-flex align-items-center">

              <div class="mb-2 me-2">
                <span class="price-original">$40</span>
              </div>
              <div class="mb-2">
                <span class="price-current">$30 <span class="price-period">/month</span></span>
              </div>
            </div>
            <div class="billing-info mb-3">For small dealers.</div>
            
            <a href="{{url('/register?plan_id=5')}}" class="btn btn-light-custom btn-get-starteds mb-4" style="margin-top: 25 px;" >Get Started</a>
          </div>
           
            <div class="d-flex align-items-center mb-4  border-top border-bottom" style="border-color:var(--items-border-colur) !important ;">
              <i class="bi bi-lightning-charge text-warning py-2 ps-4 me-2"></i>
              <div class="credits-info">3k credit  <span class="price-period">/month</span></div>
            </div>
             <div class="px-4">
            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Image Generation</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">7 AI models</div>

            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Video Generation</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">15 AI models</div>

            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Image Editing</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">5 projects</div>

            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Parallel jobs</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">2 generations at a time</div>

            </div>
        </div>


        </div>
      </div>

 

      <!-- Plus Plan (Most Popular) -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="card pricing-card pricing-card-popular h-100">
          <span class="badge popular-badge">
            <i class="bi bi-lightning-fill me-1"></i>Most popular
          </span>
          <div class="px-4 pt-4">
            <h5 class="text-white mb-3 fw-normal">Plus</h5>

            <div class="d-flex align-items-center">

              <div class="mb-2 me-2">
                <span class="price-original">$60</span>
              </div>
              <div class="mb-2">
                <span class="price-current">$50 <span class="price-period">/month</span></span>
              </div>
            </div>
            <div class="billing-info" style="margin-bottom: 15px;">For medium-sized businesses.</div>

                <a href="{{url('/register?plan_id=4')}}" class="btn btn-primary-custom btn-get-starteds mb-4">Get Started</a>
       
            </div>
            <div class="d-flex align-items-center mb-4  border-top border-bottom" style="border-color:var(--items-border-colur) !important ;">
              <i class="bi bi-lightning-charge text-warning py-2 ps-4 me-2"></i>
              <span class="credits-info">35k credits <span class="price-period">/month</span> </span>
            </div>

            <div class="p-4">

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Image Generation</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">8 AI models</div>

            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Video Generation</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">20 AI models</div>

            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Image Editing</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">50 projects</div>

            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Parallel jobs</span>
              </div>
              <div class="feature-subtext ms-4 mb-2">8 generations at a time</div>

            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Model Training</span>
              </div>
            </div>

            <div class="mb-4">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="feature-text">Top-up Credits</span>
              </div>
            </div>
            </div>
          
        </div>
      </div>

      <!-- Ultra Plan -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
        <div class="card pricing-card h-100" style="border-top-right-radius: 10px !important; border-bottom-right-radius: 12px; ">
          <div class="px-4 pt-4">
            <h5 class="text-white mb-3 fw-normal">Ultra</h5>

            <div class="d-flex align-items-center">
              <div class="mb-2 me-2">
                <span class="price-original">$110</span>
              </div>
              <div class="mb-2">
                <span class="price-current">$100 <span class="price-period">/month</span></span>
              </div>
            </div>
            <div class="billing-info mb-3 ">For larger operations.</div>
            <a href="{{url('/register?plan_id=3')}}" class="btn btn-light-custom btn-get-starteds " style="margin-bottom: 24px;">Get Started</a>
          </div>

            <div class="d-flex align-items-center mb-4  border-top border-bottom" style="border-color:var(--items-border-colur) !important ;">
              <i class="bi bi-lightning-charge text-warning py-2 px-4 me-2 px-4 py-2"></i>
              <span class="credits-info">100k credits <span class="price-period">/month</span></span>
            </div>
            <div class="p-4">

                          <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                              <i class="bi bi-check-circle-fill text-primary me-2"></i>
                              <span class="feature-text">Image Generation</span>
                            </div>
                            <div class="feature-subtext ms-4 mb-2">8 AI models</div>

                          </div>

                          <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                              <i class="bi bi-check-circle-fill text-primary me-2"></i>
                              <span class="feature-text">Video Generation</span>
                            </div>
                            <div class="feature-subtext ms-4 mb-2">20 AI models</div>

                          </div>

                          <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                              <i class="bi bi-check-circle-fill text-primary me-2"></i>
                              <span class="feature-text">Image Editing</span>
                            </div>
                            <div class="feature-subtext ms-4 mb-2">Unlimited projects</div>

                          </div>

                          <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                              <i class="bi bi-check-circle-fill text-primary me-2"></i>
                              <span class="feature-text">Parallel jobs</span>
                            </div>
                            <div class="feature-subtext ms-4 mb-2">10 generations at a time</div>

                          </div>

                          <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                              <i class="bi bi-check-circle-fill text-primary me-2"></i>
                              <span class="feature-text">Model Training</span>
                            </div>
                          </div>

                          <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                              <i class="bi bi-check-circle-fill text-primary me-2"></i>
                              <span class="feature-text">Top-up Credits</span>
                            </div>
                          </div>
              </div>

        </div>
      </div>



    </div>
    <div class="d-flex p-0 pt-5 container">

      <!-- Free Plan -->
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mx-2">
        <div class=" h-100">
          <div class="p-4">

            <div class="mb-3">
              <div class="price-current pb-3">Usage</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content storage history</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster image generation</p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">image</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content storage history</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster image generation</p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Video Generator</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content storage history</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster image generation</p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">Image Editor</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content storage history</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster image generation</p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Model Trainer    </div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content storage history</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster image generation</p>
            </div>






          </div>
        </div>
      </div>

      <!-- Entry Plan -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6  mx-2">
        <div class=" h-100">
          <div class="p-4">

            <div class="mb-3">
              <div class="price-current mb-3">free</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> 1 img </p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"><i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">image</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Video Generator</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">Image Editor</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Model Trainer    </div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
            </div>






          </div>
        </div>
      </div>

      <!-- Core Plan -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6  mx-2">
        <div class=" h-100">
          <div class="p-4">

            <div class="mb-3">
              <div class="price-current mb-3">entery</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster </p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">image</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster </p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Video Generator</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster </p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">Image Editor</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster </p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Model Trainer    </div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster </p>
            </div>






          </div>
        </div>
      </div>

      <!-- Plus Plan (Most Popular) -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6  mx-2">
        <div  style="border-radius: 12px; border: none !important; background: linear-gradient(135deg,
          #0080ff28 80%,
          #222e3c98 100%) !important;">
         <div class="p-4">

            <div class="mb- 3">
              <div class="price-current pb-3">Plus</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content </p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">image</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Losslesst</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Video Generator</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">Image Editor</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Model Trainer    </div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
            </div>






          </div> <div class="p-4">

          





          </div>
        </div>
      </div>

      <!-- Ultra Plan -->
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6  mx-2">
        <div class=" h-100">
          <div class="p-4">

            <div class="mb-3">
              <div class="price-current pb-3">ultara</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-xmark text-danger"></i></p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">image</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content </p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> <i class="fa-solid fa-check text-primary"></i></p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Video Generator</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content </p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless image format</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster</p>
            </div>
            <div class="mb-5">
              <div class="price-current mt-5 mb-3">Image Editor</div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercial Rights</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Faster</p>
            </div>
          <div class="mb-5">
              <div class="price-current mt-5 mb-3">Model Trainer    </div>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Credits</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Batch size</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Content</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Commercials</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Lossless</p>
              <p class="text-white" style="border-bottom:1px solid var(--items-border-colur) ; padding-bottom: 10px;"> Fastern</p>
            </div>






          </div>
        </div>
      </div>


    </div>
       
@endsection

@section('js')

<script>
  

</script>

@endsection
