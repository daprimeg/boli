@extends('admin.partial.app')
@push('title') Dashboard @endpush
@section('css')
<style>
.dot-box {
        width: 35px;
        height: 35px;
        background-color: #0f1c2c; /* Dark blue box */
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
    }

    .dot {
        width: 20px;
        height: 20px;
        background-color: #0d6efd; /* Blue dot */
        border-radius: 50%;
        box-shadow: 0 0 20px rgba(13, 110, 253, 1), 0 0 30px rgba(13, 110, 253, 0.8), 0 0 40px rgba(13, 110, 253, 0.6);

    }
        .chart-container {
      position: relative;
      width: 280px;
      margin: 100px auto;
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

  
</style>
@endsection
@section('content')
   <div class="container-fluid container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">

        <div class="row">
          <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0">{{$totalAuctions}}</h4>
                  </div>
                  <p class="mb-1">Total Auctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Live Auctions: </small>
                     <span class="text-heading fw-medium me-2">{{ $liveAuctions }}</span>
                     <small class="text-body-secondary">Time Auctions: </small>
                     <span class="text-heading fw-medium me-0"></span>
                  </p>
               </div>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0"> {{ $inProgressAuctions }}</h4>
                  </div>
                  <p class="mb-1">Inprogress Auctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Vehicles: </small>
                     <span class="text-heading fw-medium me-2">{{ $inProgressVehicles }}</span>
                    <a href=""> <span class="text-heading fw-medium me-0">view</span></a>
                  </p>
               </div>
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0"> {{$totalVehicles }}</h4>
                  </div>
                  <p class="mb-1">Total Vehicles</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Sold</small>
                     <span class="text-heading fw-medium me-2">36</span>
                    <a href=""> <span class="text-heading fw-medium me-0">view</span></a>
                  </p>
               </div>
               </div>
            </div>

            <div class="col-lg-3 col-sm-6">
               <div class="card card-border-shadow-primary h-100">
               <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                     <div class="avatar me-4">
                     <div class="dot-box"><div class="dot"></div></div>
                     </div>
                     <h4 class="mb-0">42</h4>
                  </div>
                  <p class="mb-1">Vehicle in reauctions</p>
                  <p class="mb-0">
                     <small class="text-body-secondary">Vehicles </small>
                     <span class="text-heading fw-medium me-2">36</span>
                    <a href=""> <span class="text-heading fw-medium me-0">view</span></a>
                  </p>
               </div>
               </div>
            </div>
            </div>
<br><br>
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card h-100">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title m-0 me-2">Your Favourite vehicles</h5>
                  <div class="dropdown">
                     <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1 waves-effect" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Auc
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList" style="">
                       
                     </div>
                  </div>
               </div>
               <div class="table-responsive" id="platformStatsTable">
                  <table class="table table-borderless border-top">
                     <thead class="border-bottom">
                        <tr>
                           <th>Platform</th>
                           <th>Total</th>
                           <th>Remaining</th>
                           <th>Lots</th>
                        </tr>
                     </thead>
                  
                  </table>
               </div>
            </div>
         </div>
        <div class="col-md-6 ">
            <div class="" style="display: flex; background-color: #000f21 ;  padding: 30px; border-radius: 10px;">
            <!-- Left Side: Stats -->
            <div class="chart-legend">
                <h3>Vehicle Statistics</h3>
                <p><strong>254</strong><br>Remaining</p>

                <div class="legend-item">
                    <div class="legend-color" style="background-color: #00c4ff;"></div>
                    <span>Sold (654)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #00aaff;"></div>
                    <span>Provisional (654)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background-color: #007acc;"></div>
                    <span>Not Sold (654)</span>
                </div>
            </div>

            <div class="col-2">
            <canvas id="ringChart" width="400" height="400"></canvas>
            <div style="position: absolute; top: 110px; left: 110px; transform: translate(-50%, -50%); font-size: 20px; font-weight: bold; color: white;">
            1255
            </div>
            </div>
        </div>

         
         </div>
         </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('js')

    <script>
         document.addEventListener('DOMContentLoaded', function () {
            const totalSegments = 40;
            const data = [];
            const colors = [];

            for (let i = 0; i < totalSegments; i++) {
            data.push(2);
            colors.push(i % 1 === 0 ? '#00c4ff' : '#0f172a'); // alternate colors
            }

            const ctx = document.getElementById('ringChart').getContext('2d');

            new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                data: data,
                backgroundColor: colors,
                borderColor: '#0f172a',
                borderWidth: 3,
                cutout: '75%',
                hoverOffset: 0
                }]
            },
            options: {
                responsive: false,
                plugins: {
                legend: { display: false },
                tooltip: { enabled: false }
                }
            }
            });
        });
    </script>
@endsection