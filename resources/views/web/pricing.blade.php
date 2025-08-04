@extends('web.partial.layout')
@section('css')
    <style>
        .pricing-card {
            background-color: #000f2170 !important;
            border: 1px solid var(--items-border-colur) !important;
            margin-top: 16px;
            transition: .5s;
        }

        .pricing-card:hover {
            background-color: #000f21 !important;
            cursor: pointer;
        }

        .pricing-card-popular {
            background: #0080ff40 !important;
            border: 1px solid var(--text-color) !important;
            position: relative;
            border-radius: 10px;
            transition: all 0.8s ease;
                        margin-top: 0px !important;

           
        }


        .pricing-card-popular:hover {
            background: #0080ff60 !important;
            backdrop-filter: blur(4px);
            /* Blur on hover */
            -webkit-backdrop-filter: blur(1px);
        }

        .popular-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--text-color) !important;
            border: none !important;
            padding: 6px 12px !important;
            font-size: var(--font-p2) !important;
        }

        .price-original {
            color: #666 !important;
            text-decoration: line-through;
            font-size: 17px;
        }

        .price-current style="font-size: var(--font-h6);color: var(--dimtext) " {
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

        }

        .credits-info {
            color: var(--white-text) !important;
            font-size: 17px;
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
            background: white  !important;
            border: 1px solid var(--items-border-colur) !important;
            color: black !important;
        }

        .inline-bottom-border {
            border-bottom: 1px solid var(--items-border-colur) !important;
            /* display: inline-block; */
            padding-bottom: 4px;
        }








        .pricing-table-container {
            background-color: #000f2170 !important
                /* Darker background for the table container */
                border-radius: 0.5rem;
            /* overflow: hidden; */
            /* Ensures rounded corners apply to table */
        }

        .table {
            --bs-table-bg: #000f2170 !important;
            --bs-table-color: #e0e0e0;
        }

        .table th,
        .table td {
            /* border-color: #333; */
            border: none !important;
            /* Ensure all borders are dark */
            padding: 0.75rem 1rem;

        }

        .table thead th {
            color: var(--dimtext)
            /* Header text color */
            font-weight: 400;

        }

        .table tbody th {
            text-align: left;
            color: var(--dimtext);
            /* Feature name color */
        }

        .table tbody td {
            text-align: left;
            color: white;
             font-size: var(--font-p1);

            /* Feature value color */
        }

        .category-header {
            background-color: #222;

            color:  var(--dimtext);
            text-align: left;
        }

        .highlight-column {
            background-color: #0080ff31 !important;

        }

        .check-icon {
            color: var(--text-color);
        }

        .x-icon {
            color: #ef4444;
            font-weight: bold;
        }

        .underline-dotted {
            text-decoration: underline dotted !important;
        }

        .table-position tr {
            position: sticky !important;
            top: 0;
            background-color: white;
            /* Ya apni background color rakhain */
            z-index: 10000 !important;
        }
        .cinoe{
            display: flex;
            margin: 10px !important;
            gap: 10px;
        }
        .chek{
            height: 20px ;
            border-radius: 50%;
            width: 20px;
            display: flex;
            justify-content: center !important;
            align-items: center !important;
            background: var(--text-color) !important;
            padding: 13px !important;

        }

        @media screen and (max-width: 560px) {
            .responsve-prisingcards {
                width: 110%;
            }

            .pricing-card-popular {
                position: relative;
                top: 0px;
            }

        }
    </style>
@endsection

@section('content')
    <div class="responsve-prisingcards"
        style="padding-top: 6rem !important; background-color: var(--items-background) !important;">


        <div class="pb-12 container text-white" style="margin: 60px auto">
            <h2 class="">Flexible plans
                for AI content creators</h2>
            <p>Choose
                the best plan for your needs.</p>
        </div>

        <div class="container">
            <div class="d-flex justify-content-center gx-3 gy-4">
                <!-- Free Plan -->
                <div class="" style="width: 25%;">
                    <div class="pricing-card h-100"
                        style="border-radius: 12px 0 0 12px; background-color: var(--item-background);  border-right: none !important;">
                        <div class="px-4 pt-4">
                            <h6 class="text-white mb-3 ">Free</h6>
                            <div class="mb-3">
                                <div class="price-current" style="font-size: var(--font-h6);color: var(--dimtext) ">$0 <span
                                        class="price-period">/month</span></div>
                            </div>
                            <a href="{{ url('/register?plan_id=2') }}" class="btn btn-get-starteds mb-4"
                                style="border: 1px solid white; color: #ccc;">Get
                                Started</a>
                        </div>
                      <div class="border-top border-bottom text-center py-3 px-4"
                            style="border-color:var(--items-border-colur) !important;">
                            <i class="bi bi-lightning-charge text-warning mb-2"></i>

                            <p class="billing-info mb-2">For small dealers.</p>
                        </div>
                        <ul class=" py-4 " style="color: white; text-decoration: none">
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- Entry Plan -->
                <div class="" style="width: 25%;">
                    <div class="card pricing-card h-100">
                        <div class="px-4 pt-4">
                            <h6 class="text-white mb-3 ">Entry</h6>
                            <div class="d-flex align-items-center">

                                <span class="price-current" style="font-size: var(--font-h6);color: var(--dimtext) ">$30
                                    <span class="price-period">/month</span></span>
                            </div>
                            <a href="{{ url('/register?plan_id=5') }}"
                                class="btn btn-light-custom btn-get-starteds mb-4 mt-3">Get Started</a>
                        </div>
                        <div class="border-top border-bottom text-center py-3 px-4"
                            style="border-color:var(--items-border-colur) !important;">
                            <i class="bi bi-lightning-charge text-warning mb-2"></i>

                            <p class="billing-info mb-2">For small dealers.</p>
                        </div>
                        <ul class=" py-4 " style="color: white">
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- Plus Plan -->
                <div class="" style="width: 25%;">
                    <div class="card pricing-card pricing-card-popular h-100">
                        <span class="badge popular-badge"><i class="bi bi-lightning-fill me-1"></i>Most popular</span>
                        <div class="px-4" style=" padding-top: 40px !important;">
                            <h6 class="text-white mb-3 ">Plus</h6>
                            <div class="d-flex align-items-center">

                                <span class="price-current" style="font-size: var(--font-h6);color: var(--dimtext) ">$50
                                    <span class="price-period">/month</span></span>
                            </div>
                            <a href="{{ url('/register?plan_id=4') }}"
                                class="btn btn-primary-custom btn-get-starteds mb-4 mt-3">Get Started</a>
                        </div>
                        <div class="border-top border-bottom text-center py-3 px-4"
                            style="border-color:#bcc4cb7d !important">
                            <i class="bi bi-lightning-charge text-warning mb-2"></i>

                            <p class="billing-info mb-2">For medium-sized businesses.</p>
                        </div>
                        <ul class=" py-4 " style="color: white">
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- Ultra Plan -->
                <div class="" style="width: 25%;">
                    <div class="card pricing-card h-100" style="border-radius: 0 12px 12px 0;">
                        <div class="px-4 pt-4">
                            <h6 class="text-white mb-3 ">Ultra</h6>
                            <div class="d-flex align-items-center">

                                <span class="price-current" style="font-size: var(--font-h6);color: var(--dimtext) ">$100
                                    <span class="price-period">/month</span></span>
                            </div>
                            <a href="{{ url('/register?plan_id=3') }}"
                                class="btn btn-light-custom btn-get-starteds mb-4 mt-3">Get Started</a>
                        </div>
                        <div class="border-top border-bottom text-center py-3 px-4"
                            style="border-color:var(--items-border-colur) !important;">
                            <i class="bi bi-lightning-charge text-warning mb-2"></i>

                            <p class="billing-info mb-2">For larger operations.</p>
                        </div>
                        <ul class=" py-4 " style="color: white">
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>
                            <li  class="cinoe" >
                                <span class="chek cione"><i class="fa-solid fa-check"></i></span>
                                ujasidjsaik
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="container py-5">
           <h5  style="color: white; margin-top: 80px; margin-bottom: 50px;">Compare features and model access across all plans

</h5>


            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="pricing-table-container">
                        <div class="">




                            <table class="table " style="background: #000f21">

                                <thead
                                    style="position:sticky!important; top: 28px; background:  #000f21; z-index: 51; border: 1px solid var(--items-border-colur) !imprtant">
                                    <tr>
                                        <td>
                                            <div class="px-2 pt-4">
                                                <h6 class="text-white " style="margin-bottom: 80px; width: 70%;">
                                                    Choose Your plane</h6>

                                            </div>
                                        </td>
                                        <th>
                                            <div class="px-4 pt-5">
                                                <h6 class="text-white mb-3 ">Free</h6>
                                                <div class="mb-3">
                                                    <div class="price-current"
                                                        style="font-size: var(--font-h6);color: var(--dimtext) ">$0 <span
                                                            class="price-period">/month</span>
                                                    </div>
                                                </div>
                                                <a href="{{ url('/register?plan_id=2') }}"
                                                    class="btn btn-get-starteds mb-4"
                                                    style=" border: 1px solid var(--items-border-colur); color: #ccc;">Get
                                                    Started</a>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="px-4 pt-4">
                                                <h6 class="text-white mb-3 ">Entry</h6>
                                                <div class="d-flex align-items-center">

                                                    <span class="price-current"
                                                        style="font-size: var(--font-h6);color: var(--dimtext) ">$30 <span
                                                            class="price-period">/month</span></span>
                                                </div>
                                                <a href="{{ url('/register?plan_id=5') }}"
                                                    class="btn btn-light-custom btn-get-starteds mb-4 mt-3">Get Started</a>
                                            </div>
                                        </th>

                                        <th class="highlight-column">
                                            <div class="px-2 pt-4">
                                                <h6 class="text-white mb-3 ">Plus</h6>
                                                <div class="d-flex align-items-center">
                                                    <span class="price-original me-2">$60</span>
                                                    <span class="price-current"
                                                        style="font-size: var(--font-h6);color: var(--dimtext) ">$50 <span
                                                            class="price-period">/month</span></span>
                                                </div>
                                                <a href="{{ url('/register?plan_id=4') }}"
                                                    class="btn btn-primary-custom btn-get-starteds mb-4 mt-3">Get
                                                    Started</a>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="px-2 pt-4">
                                                <h6 class="text-white mb-3 ">Ultra</h6>
                                                <div class="d-flex align-items-center">
                                                    <span class="price-original me-2">$110</span>
                                                    <span class="price-current"
                                                        style="font-size: var(--font-h6);color: var(--dimtext) ">$100 <span
                                                            class="price-period">/month</span></span>
                                                </div>
                                                <a href="{{ url('/register?plan_id=3') }}"
                                                    class="btn btn-light-custom btn-get-starteds mb-4 mt-3">Get Started</a>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">Credits</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border">40 /day</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">3 000 /month</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">35 000 /month</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">100 000 /month</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">Batch size</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border">1</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">2</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">8</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">10</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">Content storage history</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border">30 days</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">Unlimited</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">Unlimited</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">Unlimited</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">Commercial Rights</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">Lossless image format</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">Faster image generation</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Category -->
                                    <tr>
                                        <th  class="category-header">Image Generator</th>
                                        <td>
                                           
                                        </td>
                                        <td>
                                            
                                        </td>

                                        <td class="highlight-column">
                                            
                                        </td>
                                        <td>
                                           
                                        </td>
                                    </tr>
                                    </tr>

                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">FLUX.1 [schnell]</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border">40 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">3 000 images</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">35 000 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">100 000 images</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">FLUX.1 [dev]</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border">8 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">600 images</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">7 000 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">20 000 images</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">FLUX.1 Kontext [pro]</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">100 images</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">1 166 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">3 333 images</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border"><span class="underline-dotted">Seedream
                                                    3.0</span></div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">100 images</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">1 166 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">3 333 images</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">GPT Image</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">66 images</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">777 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">2 222 images</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">FLUX.1.1 [ultra]</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">60 images</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">700 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">2 000 images</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">GPT Image HD</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border">85 images</div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border">571 images</div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="inline-bottom-border">Legacy models</div>
                                        </th>
                                        <td>
                                            <div class="inline-bottom-border"><span class="x-icon">&#10006;</span></div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>

                                        <td class="highlight-column">
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline-bottom-border"><span class="material-symbols-outlined check-icon">check_circle</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script></script>
@endsection
