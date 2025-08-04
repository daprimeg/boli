<div class="container-fluid" style="background-color: #000F21 ">

    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center header-section mt-5 ps-md-10 ps-0 text-center text-md-start">
            <div style="max-width:75px" class="w-100">
                <div class="stats-card">
                    <h2 style="font-size: 38px;" class="stats-number">56</h2>
                    <p class="stats-label">Today</p>
                </div>
            </div>
            <div class="">
                <div class="platform-info">
                    <div class="inner-tag" style="display: flex; gap:10px;align-items: center;">
                        <div >
                            <p style="font-size: 20px;font-weight: 600; margin-top: 0;margin-bottom: 0rem;" class="platform-title">Platform</p>
                        </div>
                        <div >
                        <div class="platform-badges" >
                            @foreach($auctionPlatform as $platform)
                                <span class="platform-badge {{ $loop->first ? 'active' : '' }}">{{ $platform }}</span>
                            @endforeach
                        </div>

                        </div>
                    </div>
                    <div class="inner-tag" style="display: flex; gap:10px;align-items: center;">
                        <div >
                            <p style="font-size: 20px;font-weight: 600; margin-top: 0;margin-bottom: 0rem;" class="platform-title">Center</p>
                        </div>
                        <div >
                            <div class="platform-badges platefrom_mar" >

                                @foreach($auctionCenter as $centerform)
                                    <span style="font-size: 10px;font-weight: 600;">{{ $centerform }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
</div>



<div class="tab-content mt-5" id="myTabContent">
    
 <div class="container-fluid">
     
        <div class="row mb-4">
            <div class="col-12">
             <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start gap-2 gap-md-4" style="padding: 0 15px;">


                    <h3 style="color: white; font-size: 1.2rem; font-weight: 600; margin: 0;">
                        Your interested vehicles in reduction
                    </h3>
                    <div class="d-flex gap-2">
                        <button class="btn" id="scrollLeft" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); border: none; border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background 0.3s ease; backdrop-filter: blur(10px);">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="btn" id="scrollRight" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); border: none; border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background 0.3s ease; backdrop-filter: blur(10px);">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="container mt-5">
                <div class="text-center">
                    <div class="row flex-nowrap overflow-hidden" id="scrollableRow" style="scroll-behavior: smooth;">
                    
                    </div>
                </div>
            </div>

    
</div>
</div>
</div>