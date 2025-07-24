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
      margin-top: 20px;
      padding: 20px;
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
      display: none;
    }
    .chart-section h5 {
      color: #a0aec0; /* Lighter grey for subtitle */
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
      color: red;
    }

  
</style>
@endsection
@section('content')
   <div class="container-fluid card container-p-y" style="height: 300px; background-image: url({{asset('/public/themeadmin/images/backgrounds/Dots.png')}})">
       <div class="container-fluid text-white mb-6" >

      <!-- Top Section -->
      <div class="row g-4">
         <!-- Left: Welcome + Tabs -->
         <div class="col-lg-8">
               <h2 class="h4 fw-semibold">
                  Welcome back, <span class="text-primary fw-bold">Mr {{ auth()->user()->firstName ?? 'User' }}!</span>
               </h2>

               <div class="mt-2 bg-secondary bg-opacity-25 p-2 rounded text-white-50 w-75">
                  Choose the best plan for your needs.
               </div>

               <!-- Tabs -->
               <ul class="nav nav-tabs mt-4 border-bottom border-secondary">
                  <li class="nav-item">
                     <a class="nav-link active text-white border-bottom border-primary" href="#">Overview</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white-50" href="#">My Interest</a>
                  </li>
               </ul>
         </div>

         <!-- Right: Refer & Earn Card -->
         <div class="col-lg-4">
               <div class="  text-white  " style="background-color: #0d6efd">
                  <div class="card-body d-flex align-items-center">
                     <div class="col-md-10">
                           <h5 class="">Refer & Earn</h5>
                           <p class="">
                              Use Refer & Earn modal to encourage your exiting 
                              customers refer their friends & colleague.
                           </p>
                           <!-- Dots -->
                        
                     </div>
                  <div class="dotstats-box"><div class="dotstats"></div></div>
                  </div>
               </div>
         </div>
      </div>
    </div>
         @include('admin.dashboard.myIntrest')
    </div>
   
    
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    $(document).ready(function () {

             let table = $('#onlineAuctionsTable').DataTable({
                  paging: false,
                  searching: false,
                  processing: true,
                  serverSide: true,
                  ajax:{
                        url:"{{ URL::to('/admin/dashboard/online')}}",
                        data:function (d){

                        }
                    }
                });
      
      
             let table = $('#timeAuctionsTable').DataTable({
                  paging: false,
                  searching: false,
                  processing: true,
                  serverSide: true,
                  ajax:{
                        url:"{{ URL::to('/admin/dashboard/time')}}",
                        data:function (d){

                        }
                    }
                });

             let table = $('#favouriteTable').DataTable({
                  paging: false,
                  searching: false,
                  processing: true,
                  serverSide: true,
                  ajax:{
                        url:"{{ URL::to('/admin/dashboard/favourite')}}",
                        data:function (d){



                        }
                    }
                    
                });
  });


document.addEventListener('DOMContentLoaded', function () {

      // Replace these with actual data
        const total ={{ $totalVehicles }};
        const sold =605;
        const segments = 50;

        // How many segments should be marked as sold
        const soldSegments = Math.round((sold / total) * segments);
        const data = [];
        const colors = [];

        for (let i = 0; i < segments; i++) {
            data.push(2); // constant width
            colors.push(i < soldSegments ? '#00c4ff' : '#2e3a4e'); // blue for sold, gray for unsold
        }
      const ctx = document.getElementById('ringChart').getContext('2d');

      new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [{
            data: data,
            backgroundColor: colors,
            borderColor: '#0f172a',
            borderWidth: 2,
            cutout: '70%',
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

      // Optional: Set dynamic number in center
      document.getElementById('ringChartValue').textContent = '1255'; // Replace with real value
});


    </script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const interestButtonsWrapper = document.getElementById('interest-buttons-wrapper');
    const addInterestButton = document.getElementById('add-interest-button');

    let newInterestCount = 0;
    const maxTotalInterestButtons = 10;

    if (interestButtonsWrapper && addInterestButton) {
        addInterestButton.addEventListener('click', function () {
            const currentInterestButtons = Array.from(interestButtonsWrapper.querySelectorAll('.interest-button'));

            if (currentInterestButtons.length < maxTotalInterestButtons) {
                newInterestCount++;
                const newButton = document.createElement('button');
                newButton.className = 'btn  text-black rounded-3 fw-medium shadow-sm border-1 interest-button flex-shrink-0';
                newButton.textContent = `New Interest ${newInterestCount}`;

                interestButtonsWrapper.appendChild(newButton);
            }

            if (interestButtonsWrapper.querySelectorAll('.interest-button').length >= maxTotalInterestButtons) {
                addInterestButton.disabled = true;
                addInterestButton.classList.remove('btn-outline-secondary');
                addInterestButton.classList.add('btn-secondary', 'opacity-50');
            }
        });

        interestButtonsWrapper.addEventListener('click', function (event) {
            const clicked = event.target.closest('.interest-button');
            if (!clicked || clicked.id === 'add-interest-button') return;

            document.querySelectorAll('.interest-button').forEach(btn => {
                btn.classList.remove('active', 'btn-primary');
                if (!btn.classList.contains('btn-outline-secondary')) {
                    btn.classList.add('bg-dark-blue-3', 'text-secondary', 'border-0');
                }
            });

            clicked.classList.add('active', 'btn-primary');
            clicked.classList.remove('bg-dark-blue-3', 'text-secondary', 'border-0');
        });
    }
});
</script>

    
    <script>
const ctx2 = document.getElementById('valuationChart').getContext('2d');
new Chart(ctx2, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    datasets: [{
      label: 'Valuation',
      data: [21000, 22000, 21500, 22500, 23000, 22600],
      borderColor: '#00f5d4',
      backgroundColor: 'rgba(0,245,212,0.1)',
      tension: 0.4,
      fill: true,
      pointRadius: 0,
    }]
  },
  options: {
    plugins: { legend: { display: false } },
    scales: {
      x: { display: false },
      y: { display: false }
    }
  }
});
</script>
<script>
const ctx = document.getElementById('auctionChart').getContext('2d');

const auctionChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['BCA', 'CCA', 'MAG', '1Link', 'CAG'],
        datasets: [{
            data: [346, 290, 245, 200, 150],
            backgroundColor: [
                '#9b5de5', // BCA
                '#00bbf9', // CCA
                '#00f5d4', // MAG
                '#ef233c', // 1Link
                '#f4a261'  // CAG
            ],
            borderRadius: 20,
            barThickness: 20
        }]
    },
    options: {
        indexAxis: 'y',
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: context => `${context.raw}`
                }
            }
        },
        scales: {
            x: {
                grid: { color: '#2a2a2a' },
                ticks: { color: '#bbb' }
            },
            y: {
                grid: { display: false },
                ticks: { color: '#bbb' }
            }
        }
    }
});
</script>
<script>
  function toggleChart(button) {
    const chartSection = button.closest('.info-card').querySelector('.chart-section');
    const isVisible = chartSection.style.display !== 'none';

    chartSection.style.display = isVisible ? 'none' : 'block';
    button.textContent = isVisible ? '+' : '− ';
  }

</script>
<script> 
// Chart.js - Line chart
  const ctx = document.getElementById('priceChart').getContext('2d');
  const priceChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['May', 'June', 'July'],
      datasets: [{
        label: 'Average Price',
        data: [21000, 22000, 22600],
        backgroundColor: 'rgba(0, 123, 255, 0.2)',
        borderColor: '#007bff',
        borderWidth: 2,
        fill: true,
        tension: 0.3,
        pointRadius: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: false,
          ticks: {
            callback: value => `£${value}`
          }
        }
      },
      plugins: {
        legend: { display: true }
      }
    }
  });</script>
@endsection