@extends('web.partial.layout')

@section('css')

 <style>
        .autionshadular {
        position: relative;
        width: 100%;
        background-image: url("./assets/Dots.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow-x: hidden;
        }


        .tabs-container {
            background-color: #1e293b;
            border-radius: 8px;
            padding: 4px;
        }
        
        .custom-tab {
            background-color: #475569;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 16px;
            margin: 0 2px;
            transition: all 0.2s ease;
            min-width: 120px;
            font-weight: 500;
        }
        
        .custom-tab:hover {
            background-color: #64748b;
            color: white;
        }
        
        .custom-tab.active {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        .tab-content-area {
            border-radius: 8px;
            margin-top: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .tab-numbers {
            font-size: 12px;
            margin-top: 4px;
        }


        .table-dark-custom {
            background-color: #1a1f2e;
            border-color: #2d3748;
            margin-bottom: 0px;
        }
        
        .table-dark-custom th,
        .table-dark-custom td {
            border-color: #2d3748;
            padding: 1rem;
            vertical-align: middle;
        }
        
        .table-dark-custom th {
            background-color: #1a1f2e;
            font-weight: 500;
            font-size: 1rem;
        }
        
        .platform-text {
            color: #3b82f6;
            font-weight: 500;
        }
        
        .status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
        }
        
        .status-in-progress {
            background-color: #dc2626;
            color: white;
        }
        
        .status-planned {
            background-color: #2563eb;
            color: white;
        }
        
        .status-cancel {
            background-color: #f59e0b;
            color: white;
        }
        
        .action-link {
            color: #9ca3af;
            text-decoration: none;
        }
        
        .action-link:hover {
            color: #ffffff;
        }
    </style>
@endsection

@section('content')

  <div class="autionshadular">
<div class="py-5">
    <h2 class="text-white mt-5 container">Auction Shadul</h2>


   
  <!-- Nav tabs -->
  <ul class="nav nav-tabs border-0 mt-4 container " id="customTabs">
    <li class="nav-item">
      <button class="nav-link active border-primary bg-transparent border-0 "  data-bs-toggle="tab" data-bs-target="#tab1">
        First Tab
      </button>
    </li>
    <li class="nav-item">
      <button class="nav-link  bg-transparent border-0" data-bs-toggle="tab" data-bs-target="#tab2">
        Second Tab
      </button>
    </li>
  </ul>

  <!-- Tab content -->
  <div class="tab-content my-4 ">
    <div class="tab-pane fade show active " id="tab1">
 <div class="d-flex gap-4 align-items-center text-white my-4 container">

      <!-- Platform Dropdown -->
      <div class="dropdown">
        <span style="color: #ccc; font-weight: 500;">Platform:</span>
        <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
          style="color: #0d6efd; background: transparent; border: none ; font-weight: 600; padding: 0;">
          BCA
        </button>
        <ul class="dropdown-menu" style="background-color: #1a2533;">
          <li><a class="dropdown-item text-white" href="#">BCA</a></li>
          <li><a class="dropdown-item text-white" href="#">BS</a></li>
          <li><a class="dropdown-item text-white" href="#">BSc</a></li>
        </ul>
      </div>

      <!-- Center Dropdown -->
      <div class="dropdown">
        <span style="color: #ccc; font-weight: 500;">Center:</span>
        <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
          style="color: #0d6efd; background: transparent; border: none ; font-weight: 600; padding: 0;">
          Center
        </button>
        <ul class="dropdown-menu" style="background-color: #1a2533;">
          <li><a class="dropdown-item text-white" href="#">Center A</a></li>
          <li><a class="dropdown-item text-white" href="#">Center B</a></li>
          <li><a class="dropdown-item text-white" href="#">Center C</a></li>
        </ul>
      </div>

    </div>



    <!-- days tabs -->

    <div class="row ">
            <div class=" ">
                <!-- Tabs Navigation -->
                <div class="tabs-container d-flex flex-wrap gap-1 container">
                    <button class="custom-tab active flex-fill" onclick="switchTab(this, 'daytab1')" style="display: flex; flex-direction: column; align-items: center;">
                        <span>Today</span>
                        <div class="tab-numbers d-flex justify-content-between w-100">
                            <span>6</span>
                            <span>6541</span>
                        </div>
                    </button>
                    
                    <button class="custom-tab flex-fill" onclick="switchTab(this, 'daytab2')" style="display: flex; flex-direction: column; align-items: center;">
                        <span>Today</span>
                        <div class="tab-numbers d-flex justify-content-between w-100">
                            <span>6</span>
                            <span>6541</span>
                        </div>
                    </button>
                    
                    <button class="custom-tab flex-fill" onclick="switchTab(this, 'daytab3')" style="display: flex; flex-direction: column; align-items: center;">
                        <span>Today</span>
                        <div class="tab-numbers d-flex justify-content-between w-100">
                            <span>6</span>
                            <span>6541</span>
                        </div>
                    </button>
                    
                    <button class="custom-tab flex-fill" onclick="switchTab(this, 'daytab4')" style="display: flex; flex-direction: column; align-items: center;">
                        <span>Today</span>
                        <div class="tab-numbers d-flex justify-content-between w-100">
                            <span>6</span>
                            <span>6541</span>
                        </div>
                    </button>
                    
                    <button class="custom-tab flex-fill" onclick="switchTab(this, 'daytab5')" style="display: flex; flex-direction: column; align-items: center;">
                        <span>Today</span>
                        <div class="tab-numbers d-flex justify-content-between w-100">
                            <span>6</span>
                            <span>6541</span>
                        </div>
                    </button>
                    
                    <button class="custom-tab flex-fill" onclick="switchTab(this, 'daytab6')" style="display: flex; flex-direction: column; align-items: center;">
                        <span>Today</span>
                        <div class="tab-numbers d-flex justify-content-between w-100">
                            <span>6</span>
                            <span>6541</span>
                        </div>
                    </button>
                    
                    <button class="custom-tab flex-fill" onclick="switchTab(this, 'daytab7')" style="display: flex; flex-direction: column; align-items: center;">
                        <span>Today</span>
                        <div class="tab-numbers d-flex justify-content-between w-100">
                            <span>6</span>
                            <span>6541</span>
                        </div>
                    </button>
                </div>
                
                <!-- Tab Content -->
                <div class="tab-content-area">
                    <div id="daytab1" class="day-tab-pane active" >
                       <div style="background-color: #1a2533; padding: 40px 0px; ">

  <div class="container" >
        <div class="table-responsive" style="border-radius: 10px !important;  border: 1px solid var(--items-border-colur);">
            <table class="table table-dark-custom text-white" style="background-color: var(--background-color) !important; " >
                <thead >
                    <tr style="background-color: var(--background-color) !important; ">
                        <th scope="col" style="background-color: var(--background-color) !important; border-bottom: 1px solid var(--items-border-colur);">Platform</th>
                        <th scope="col" style="background-color: var(--background-color) !important; border-bottom: 1px solid var(--items-border-colur);">Center</th>
                        <th scope="col" style="background-color: var(--background-color) !important; border-bottom: 1px solid var(--items-border-colur);">Total Vehicles</th>
                        <th scope="col" style="background-color: var(--background-color) !important; border-bottom: 1px solid var(--items-border-colur);">Time</th>
                        <th scope="col" style="background-color: var(--background-color) !important; border-bottom: 1px solid var(--items-border-colur);">Status</th>
                        <th scope="col" style="background-color: var(--background-color) !important; border-bottom: 1px solid var(--items-border-colur);">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham, Bristol, Thurleigh</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-in-progress">In Progress</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham, Bristol, Thurleigh</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-in-progress">In Progress</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham, Bristol, Thurleigh</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-in-progress">In Progress</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-in-progress">In Progress</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-planned">Planned</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">CCA</td>
                        <td>Birmingham</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-in-progress">In Progress</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-in-progress">In Progress</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-planned">Planned</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">CCA</td>
                        <td>Birmingham</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-in-progress">In Progress</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="platform-text">BCA</td>
                        <td>Birmingham</td>
                        <td>225</td>
                        <td>14/8/2025_10:00</td>
                        <td>
                            <span class="status-badge status-cancel">Cancel</span>
                        </td>
                        <td>
                            <a href="#" class="action-link">View/Alert/</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>
                    </div>
                    
                    <div id="daytab2" class="day-tab-pane" style="display: none;">
                        <h3 class="fw-semibold mb-3">Tab 2 - Today</h3>
                        <p class="text-muted mb-0">Content for the second tab. Each tab can have different content and functionality.</p>
                    </div>
                    
                    <div id="daytab3" class="day-tab-pane" style="display: none;">
                        <h3 class="fw-semibold mb-3">Tab 3 - Today</h3>
                        <p class="text-muted mb-0">Third tab content goes here. The gradient effect makes the active tab stand out beautifully.</p>
                    </div>
                    
                    <div id="daytab4" class="day-tab-pane" style="display: none;">
                        <h3 class="fw-semibold mb-3">Tab 4 - Today</h3>
                        <p class="text-muted mb-0">Fourth tab content with responsive design that works on all devices.</p>
                    </div>
                    
                    <div id="daytab5" class="day-tab-pane" style="display: none;">
                        <h3 class="fw-semibold mb-3">Tab 5 - Today</h3>
                        <p class="text-muted mb-0">Fifth tab content showcasing the smooth transition effects.</p>
                    </div>
                    
                    <div id="daytab6" class="day-tab-pane" style="display: none;">
                        <h3 class="fw-semibold mb-3">Tab 6 - Today</h3>
                        <p class="text-muted mb-0">Sixth tab content with Bootstrap styling and custom CSS.</p>
                    </div>
                    
                    <div id="daytab7" class="day-tab-pane" style="display: none;">
                        <h3 class="fw-semibold mb-3">Tab 7 - Today</h3>
                        <p class="text-muted mb-0">Seventh tab content completing the full set of tabs with gradient styling.</p>
                    </div>
                </div>

                
            </div>
        </div>
    </div>





    <div class="tab-pane fade" id="tab2">
      <h4>Second Tab Content</h4>
    </div>
  </div>




</div>
     </div>


       
@endsection

@section('js')

      <script>
  const tabs = document.querySelectorAll('#customTabs .nav-link');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('border-primary')); // Remove from all
      tab.classList.add('border-primary'); // Add to clicked one
    });
  });




        <!-- sdds -->
   
  function switchTab(clickedTab, tabId) {
    const allTabs = document.querySelectorAll('.custom-tab');
    allTabs.forEach(tab => tab.classList.remove('active'));
    clickedTab.classList.add('active');

    const allTabPanes = document.querySelectorAll('.day-tab-pane');
    allTabPanes.forEach(pane => {
      pane.style.display = 'none';
      pane.classList.remove('active');
    });

    const selectedTab = document.getElementById(tabId);
    selectedTab.style.display = 'block';
    selectedTab.classList.add('active');
  }


</script>

@endsection



