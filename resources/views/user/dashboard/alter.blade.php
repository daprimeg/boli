<div class="p-4 d-flex align-items-center justify-content-start gap-3 mb-5 mx-0 pl-4"
     style="" id="interest-buttons-container">



<div class="container mt-3">
    <!-- Tabs Nav -->
    <ul class="nav nav-tabs" id="interestTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="alerts-tab" data-bs-toggle="tab" data-bs-target="#alerts"
                type="button" role="tab" aria-controls="alerts" aria-selected="true">
                Your Alerts
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="recent-tab" data-bs-toggle="tab" data-bs-target="#recent"
                type="button" role="tab" aria-controls="recent" aria-selected="false">
                Recent Views
            </button>
        </li>
    </ul>

    <!-- Tabs Content -->
    <div class="tab-content p-3 border border-top-0 rounded-bottom" id="interestTabsContent">
        <div class="tab-pane fade show active" id="alerts" role="tabpanel" aria-labelledby="alerts-tab">
            @include('user.dashboard.clientalerts') 
        </div>
        <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
            @include('user.dashboard.recent') 
        </div>
    </div>
</div>
</div>
