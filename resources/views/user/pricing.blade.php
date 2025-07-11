@include('user.partial.layout')


<div class="content-wrapper">






<div class="flex-grow-1 container-p-y container-xxl">
    <div class="card">
        






<div class="row">




<div class="col-xxl-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <div class="card-title mb-0">
            <h5 class="m-0 me-2">Vehicles Overview</h5>
          </div>
          <div class="dropdown">
            <button class="btn btn-text-secondary rounded-pill p-2 border-0 me-n1 waves-effect" type="button" id="vehiclesOverview" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="vehiclesOverview">
              <a class="dropdown-item waves-effect" href="javascript:void(0);">Select All</a>
              <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-none d-lg-flex vehicles-progress-labels mb-6">
            <div class="vehicles-progress-label on-the-way-text" style="width: 39.7%;">On the way</div>
            <div class="vehicles-progress-label unloading-text" style="width: 28.3%;">Unloading</div>
            <div class="vehicles-progress-label loading-text" style="width: 17.4%;">Loading</div>
            <div class="vehicles-progress-label waiting-text text-nowrap" style="width: 14.6%;">Waiting</div>
          </div>
          <div class="vehicles-overview-progress progress rounded-3 mb-3 bg-transparent overflow-hidden" style="height: 46px;">
            <div class="progress-bar fw-medium text-start shadow-none bg-lighter text-heading px-4 rounded-0" role="progressbar" style="width: 39.7%" aria-valuenow="39.7" aria-valuemin="0" aria-valuemax="100">39.7%</div>
            <div class="progress-bar fw-medium text-start shadow-none bg-primary px-4" role="progressbar" style="width: 28.3%" aria-valuenow="28.3" aria-valuemin="0" aria-valuemax="100">28.3%</div>
            <div class="progress-bar fw-medium text-start shadow-none text-bg-info px-2 px-sm-4" role="progressbar" style="width: 17.4%" aria-valuenow="17.4" aria-valuemin="0" aria-valuemax="100">17.4%</div>
            <div class="progress-bar fw-medium text-start shadow-none snackbar text-paper px-1 px-sm-3 rounded-0 px-lg-4" role="progressbar" style="width: 14.6%" aria-valuenow="14.6" aria-valuemin="0" aria-valuemax="100">14.6%</div>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-border-top-0 table-border-bottom-0">
              <tbody>
                <tr>
                  <td class="w-50 ps-0">
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-2">
                        <i class="icon-base ti tabler-car icon-lg text-heading"></i>
                      </div>
                      <h6 class="mb-0 fw-normal">On the way</h6>
                    </div>
                  </td>
                  <td class="text-end pe-0 text-nowrap">
                    <h6 class="mb-0">2hr 10min</h6>
                  </td>
                  <td class="text-end pe-0">
                    <span>39.7%</span>
                  </td>
                </tr>
                <tr>
                  <td class="w-50 ps-0">
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-2">
                        <i class="icon-base ti tabler-circle-arrow-down icon-lg text-heading"></i>
                      </div>
                      <h6 class="mb-0 fw-normal">Unloading</h6>
                    </div>
                  </td>
                  <td class="text-end pe-0 text-nowrap">
                    <h6 class="mb-0">3hr 15min</h6>
                  </td>
                  <td class="text-end pe-0">
                    <span>28.3%</span>
                  </td>
                </tr>
                <tr>
                  <td class="w-50 ps-0">
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-2">
                        <i class="icon-base ti tabler-circle-arrow-up icon-lg text-heading"></i>
                      </div>
                      <h6 class="mb-0 fw-normal">Loading</h6>
                    </div>
                  </td>
                  <td class="text-end pe-0 text-nowrap">
                    <h6 class="mb-0">1hr 24min</h6>
                  </td>
                  <td class="text-end pe-0">
                    <span>17.4%</span>
                  </td>
                </tr>
                <tr>
                  <td class="w-50 ps-0">
                    <div class="d-flex justify-content-start align-items-center">
                      <div class="me-2">
                        <i class="icon-base ti tabler-clock icon-lg text-heading"></i>
                      </div>
                      <h6 class="mb-0 fw-normal">Waiting</h6>
                    </div>
                  </td>
                  <td class="text-end pe-0 text-nowrap">
                    <h6 class="mb-0">5hr 19min</h6>
                  </td>
                  <td class="text-end pe-0">
                    <span>14.6%</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
























<div class="col-12 col-md-6 col-xxl-4">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <h5 class="mb-0 card-title">Project Status</h5>
          <div class="dropdown">
            <button class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1 waves-effect" type="button" id="projectStatusId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectStatusId">
              <a class="dropdown-item waves-effect" href="javascript:void(0);">View More</a>
              <a class="dropdown-item waves-effect" href="javascript:void(0);">Delete</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="badge rounded bg-label-warning p-2 me-3 rounded"><i class="icon-base ti tabler-currency-dollar icon-lg"></i></div>
            <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
              <div class="me-2">
                <h6 class="mb-0">$4,3742</h6>
                <small class="text-body">Your Earnings</small>
              </div>
              <h6 class="mb-0 text-success">+10.2%</h6>
            </div>
          </div>
          <div id="projectStatusChart" style="min-height: 245px;"><div id="apexchartstvecee2b" class="apexcharts-canvas apexchartstvecee2b apexcharts-theme-" style="width: 400px; height: 230px;"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="400" height="230"><foreignObject x="0" y="0" width="400" height="230"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 115px;"></div><style type="text/css">
      .apexcharts-flip-y {
        transform: scaleY(-1) translateY(-100%);
        transform-origin: top;
        transform-box: fill-box;
      }
      .apexcharts-flip-x {
        transform: scaleX(-1);
        transform-origin: center;
        transform-box: fill-box;
      }
      .apexcharts-legend {
        display: flex;
        overflow: auto;
        padding: 0 10px;
      }
      .apexcharts-legend.apexcharts-legend-group-horizontal {
        flex-direction: column;
      }
      .apexcharts-legend-group {
        display: flex;
      }
      .apexcharts-legend-group-vertical {
        flex-direction: column-reverse;
      }
      .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
        flex-wrap: wrap
      }
      .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        flex-direction: column;
        bottom: 0;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
        justify-content: flex-start;
        align-items: flex-start;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
        justify-content: center;
        align-items: center;
      }
      .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
        justify-content: flex-end;
        align-items: flex-end;
      }
      .apexcharts-legend-series {
        cursor: pointer;
        line-height: normal;
        display: flex;
        align-items: center;
      }
      .apexcharts-legend-text {
        position: relative;
        font-size: 14px;
      }
      .apexcharts-legend-text *, .apexcharts-legend-marker * {
        pointer-events: none;
      }
      .apexcharts-legend-marker {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-right: 1px;
      }

      .apexcharts-legend-series.apexcharts-no-click {
        cursor: auto;
      }
      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
        display: none !important;
      }
      .apexcharts-inactive-legend {
        opacity: 0.45;
      }

    </style></foreignObject><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g><g class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)"><g class="apexcharts-yaxis-texts-g"></g></g><g class="apexcharts-inner apexcharts-graphical" transform="translate(0, 30)"><defs><clipPath id="gridRectMasktvecee2b"><rect width="404" height="185" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectBarMasktvecee2b"><rect width="411" height="192" x="-3.5" y="-3.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMasktvecee2b"><rect width="404" height="185" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMasktvecee2b"></clipPath><clipPath id="nonForecastMasktvecee2b"></clipPath><linearGradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1016"><stop stop-opacity="0.4" stop-color="var(--bs-warning)" offset="0"></stop><stop stop-opacity="0.1" stop-color="var(--bs-paper-bg)" offset="1"></stop><stop stop-opacity="0.1" stop-color="var(--bs-paper-bg)" offset="1"></stop></linearGradient></defs><line x1="0" y1="0" x2="0" y2="185" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="185" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g class="apexcharts-grid"><g class="apexcharts-gridlines-horizontal" style="display: none;"><line x1="0" y1="0" x2="404" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="37" x2="404" y2="37" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="74" x2="404" y2="74" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="111" x2="404" y2="111" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="148" x2="404" y2="148" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line x1="0" y1="185" x2="404" y2="185" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g class="apexcharts-gridlines-vertical" style="display: none;"></g><line x1="0" y1="185" x2="404" y2="185" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line x1="0" y1="1" x2="0" y2="185" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g class="apexcharts-grid-borders" style="display: none;"></g><g class="apexcharts-area-series apexcharts-plot-series"><g class="apexcharts-series" zIndex="0" seriesName="series-1" data:longestSeries="true" rel="1" data:realIndex="0"><path d="M 0 148 L 26.933333333333334 148 L 53.86666666666667 74 L 80.8 74 L 107.73333333333333 109.15 L 134.66666666666669 109.15 L 161.6 148 L 188.53333333333333 148 L 215.46666666666667 109.15 L 242.4 109.15 L 269.33333333333337 48.099999999999994 L 296.2666666666667 48.099999999999994 L 323.2 120.25 L 350.1333333333333 120.25 L 377.06666666666666 11.099999999999994 L 404 11.099999999999994 L 404 185 L 0 185z" fill="url(#SvgjsLinearGradient1016)" fill-opacity="1" stroke="none" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasktvecee2b)" pathTo="M 0 148 L 26.933333333333334 148 L 53.86666666666667 74 L 80.8 74 L 107.73333333333333 109.15 L 134.66666666666669 109.15 L 161.6 148 L 188.53333333333333 148 L 215.46666666666667 109.15 L 242.4 109.15 L 269.33333333333337 48.099999999999994 L 296.2666666666667 48.099999999999994 L 323.2 120.25 L 350.1333333333333 120.25 L 377.06666666666666 11.099999999999994 L 404 11.099999999999994 L 404 185 L 0 185z" pathFrom="M 0 185 L 0 185 L 26.933333333333334 185 L 53.86666666666667 185 L 80.8 185 L 107.73333333333333 185 L 134.66666666666669 185 L 161.6 185 L 188.53333333333333 185 L 215.46666666666667 185 L 242.4 185 L 269.33333333333337 185 L 296.2666666666667 185 L 323.2 185 L 350.1333333333333 185 L 377.06666666666666 185 L 404 185z"></path><path d="M 0 148 L 26.933333333333334 148 L 53.86666666666667 74 L 80.8 74 L 107.73333333333333 109.15 L 134.66666666666669 109.15 L 161.6 148 L 188.53333333333333 148 L 215.46666666666667 109.15 L 242.4 109.15 L 269.33333333333337 48.099999999999994 L 296.2666666666667 48.099999999999994 L 323.2 120.25 L 350.1333333333333 120.25 L 377.06666666666666 11.099999999999994 L 404 11.099999999999994" fill="none" fill-opacity="1" stroke="var(--bs-warning)" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMasktvecee2b)" pathTo="M 0 148 L 26.933333333333334 148 L 53.86666666666667 74 L 80.8 74 L 107.73333333333333 109.15 L 134.66666666666669 109.15 L 161.6 148 L 188.53333333333333 148 L 215.46666666666667 109.15 L 242.4 109.15 L 269.33333333333337 48.099999999999994 L 296.2666666666667 48.099999999999994 L 323.2 120.25 L 350.1333333333333 120.25 L 377.06666666666666 11.099999999999994 L 404 11.099999999999994" pathFrom="M 0 185 L 0 185 L 26.933333333333334 185 L 53.86666666666667 185 L 80.8 185 L 107.73333333333333 185 L 134.66666666666669 185 L 161.6 185 L 188.53333333333333 185 L 215.46666666666667 185 L 242.4 185 L 269.33333333333337 185 L 296.2666666666667 185 L 323.2 185 L 350.1333333333333 185 L 377.06666666666666 185 L 404 185" fill-rule="evenodd"></path><g class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"></g></g><g class="apexcharts-datalabels" data:realIndex="0"></g></g><line x1="0" y1="0" x2="404" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line x1="0" y1="0" x2="404" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g class="apexcharts-xaxis" transform="translate(0, 0)"><g class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g class="apexcharts-yaxis-annotations"></g><g class="apexcharts-xaxis-annotations"></g><g class="apexcharts-point-annotations"></g></g><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></svg></div></div>
          <div class="d-flex justify-content-between mb-4">
            <h6 class="mb-0">Donates</h6>
            <div class="d-flex">
              <p class="mb-0 me-4">$756.26</p>
              <p class="mb-0 text-danger">-139.34</p>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="mb-0">Podcasts</h6>
            <div class="d-flex">
              <p class="mb-0 me-4">$2,207.03</p>
              <p class="mb-0 text-success">+576.24</p>
            </div>
          </div>
        </div>
      </div>
    </div>












<div class="col-xxl-4 col-lg-5">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
          <div class="card-title mb-0">
            <h5 class="mb-1 me-2">Delivery Performance</h5>
            <p class="card-subtitle">12% increase in this month</p>
          </div>
          <div class="dropdown">
            <button class="btn btn-text-secondary rounded-pill p-2 me-n1 waves-effect" type="button" id="deliveryPerformance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-base ti tabler-dots-vertical icon-md"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryPerformance">
              <a class="dropdown-item waves-effect" href="javascript:void(0);">Select All</a>
              <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <li class="d-flex mb-6 align-items-center">
              <div class="avatar flex-shrink-0 me-4">
                <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-package icon-26px"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-1 fw-normal">Packages in transit</h6>
                  <small class="text-success mb-0">
                    <i class="icon-base ti tabler-chevron-up me-1"></i>
                    25.8%
                  </small>
                </div>
                <div class="user-progress">
                  <h6 class="text-body mb-0">10k</h6>
                </div>
              </div>
            </li>
            <li class="d-flex mb-6 align-items-center">
              <div class="avatar flex-shrink-0 me-4">
                <span class="avatar-initial rounded bg-label-info"><i class="icon-base ti tabler-truck icon-28px"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-1 fw-normal">Packages out for delivery</h6>
                  <small class="text-success mb-0">
                    <i class="icon-base ti tabler-chevron-up me-1"></i>
                    4.3%
                  </small>
                </div>
                <div class="user-progress">
                  <h6 class="text-body mb-0">5k</h6>
                </div>
              </div>
            </li>
            <li class="d-flex mb-6 align-items-center">
              <div class="avatar flex-shrink-0 me-4">
                <span class="avatar-initial rounded bg-label-success"><i class="icon-base ti tabler-circle-check icon-26px"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-1 fw-normal">Packages delivered</h6>
                  <small class="text-danger mb-0">
                    <i class="icon-base ti tabler-chevron-down me-1"></i>
                    12.5
                  </small>
                </div>
                <div class="user-progress">
                  <h6 class="text-body mb-0">15k</h6>
                </div>
              </div>
            </li>
            <li class="d-flex mb-6 align-items-center">
              <div class="avatar flex-shrink-0 me-4">
                <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-percentage icon-26px"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-1 fw-normal">Delivery success rate</h6>
                  <small class="text-success mb-0">
                    <i class="icon-base ti tabler-chevron-up me-1"></i>
                    35.6%
                  </small>
                </div>
                <div class="user-progress">
                  <h6 class="text-body mb-0">95%</h6>
                </div>
              </div>
            </li>
            <li class="d-flex mb-6 align-items-center">
              <div class="avatar flex-shrink-0 me-4">
                <span class="avatar-initial rounded bg-label-secondary"><i class="icon-base ti tabler-clock icon-26px"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-1 fw-normal">Average delivery time</h6>
                  <small class="text-danger mb-0">
                    <i class="icon-base ti tabler-chevron-down me-1"></i>
                    2.15
                  </small>
                </div>
                <div class="user-progress">
                  <h6 class="text-body mb-0">2.5 Days</h6>
                </div>
              </div>
            </li>
            <li class="d-flex align-items-center">
              <div class="avatar flex-shrink-0 me-4">
                <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-users icon-26px"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-1 fw-normal">Customer satisfaction</h6>
                  <small class="text-success mb-0">
                    <i class="icon-base ti tabler-chevron-up me-1"></i>
                    5.7%
                  </small>
                </div>
                <div class="user-progress">
                  <h6 class="text-body mb-0">4.5/5</h6>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>












</div>


















</div>



















    </br></br></br>




<div class="row">





<div class="col-xxl-12">
      <div class="card">
        <div class="card-datatable table-responsive">
          <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer"><div class="row mx-3 justify-content-between"><div class="align-items-center dt-layout-start col-md-auto col-12 d-flex justify-content-center justify-content-md-start gap-2"><div class="dt-length me-0 mb-md-6 mb-6"><label for="dt-length-0">Show</label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select" id="dt-length-0"><option value="6">6</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></div><div class="dt-buttons btn-group flex-wrap mb-0"><button class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="icon-base icon-16px ti tabler-plus me-md-2"></i><span class="d-md-inline-block d-none">Create Invoice</span></span></button> </div></div><div class="d-md-flex align-items-center dt-layout-end col-md-auto justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0"><div class="dt-search"><input type="search" class="form-control" id="dt-search-0" placeholder="Search Invoice" aria-controls="DataTables_Table_0"><label for="dt-search-0"></label></div><div class="invoice_status"><select id="UserRole" class="form-select"><option value=""> Invoice Status </option><option value="Downloaded" class="text-capitalize">Downloaded</option><option value="Draft" class="text-capitalize">Draft</option><option value="Paid" class="text-capitalize">Paid</option><option value="Partial Payment" class="text-capitalize">Partial Payment</option><option value="Past Due" class="text-capitalize">Past Due</option><option value="Sent" class="text-capitalize">Sent</option></select></div></div></div><div class="justify-content-between dt-layout-table"><div class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive"><table class="table table-sm datatable-invoice border-top dataTable dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;"><colgroup><col data-dt-column="1" style="width: 81.8906px;"><col data-dt-column="2" style="width: 131.516px;"><col data-dt-column="3" style="width: 137.109px;"><col data-dt-column="4" style="width: 130.969px;"><col data-dt-column="5" style="width: 204.812px;"><col data-dt-column="7" style="width: 233.703px;"></colgroup>
            <thead>
              <tr><th data-dt-column="0" class="control dt-orderable-asc dt-orderable-desc dtr-hidden" rowspan="1" colspan="1" aria-label=": Activate to sort" tabindex="0" style="display: none;"><span class="dt-column-title" role="button"></span><span class="dt-column-order"></span></th><th data-dt-column="1" rowspan="1" colspan="1" class="dt-select dt-orderable-none" aria-label=""><span class="dt-column-title"></span><span class="dt-column-order"></span><input class="form-check-input" type="checkbox" aria-label="Select all rows"></th><th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-desc" aria-sort="descending" aria-label="#: Activate to remove sorting" tabindex="0"><span class="dt-column-title" role="button">#</span><span class="dt-column-order"></span></th><th data-dt-column="3" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th><th data-dt-column="4" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-type-numeric" aria-label="Total: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Total</span><span class="dt-column-order"></span></th><th data-dt-column="5" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Issued Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Issued Date</span><span class="dt-column-order"></span></th><th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th></tr>
            </thead><tbody><tr><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td><td>
              <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
              Sent<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 05/09/2020
            " data-bs-original-title="<span>
              Sent<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 05/09/2020
            ">
                <span class="badge p-1_5 rounded-pill bg-label-secondary"><i class="icon-base icon-16px ti tabler-circle-check"></i></span>
</span>
              
            </td><td class="dt-type-numeric"><span class="d-none">3077</span>$3077</td><td>
              <span class="d-none">20200508</span>
              09 May 2020
            </td><td><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div></div></div></td></tr><tr><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5041</a></td><td>
              <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
              Sent<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 11/19/2020
            " data-bs-original-title="<span>
              Sent<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 11/19/2020
            ">
                <span class="badge p-1_5 rounded-pill bg-label-secondary"><i class="icon-base icon-16px ti tabler-circle-check"></i></span>
</span>
              
            </td><td class="dt-type-numeric"><span class="d-none">2230</span>$2230</td><td>
              <span class="d-none">20201118</span>
              19 Nov 2020
            </td><td><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div></div></div></td></tr><tr><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5027</a></td><td>
              <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
              Partial Payment<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 09/25/2020
            " data-bs-original-title="<span>
              Partial Payment<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 09/25/2020
            ">
                <span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>
</span>
              
            </td><td class="dt-type-numeric"><span class="d-none">2787</span>$2787</td><td>
              <span class="d-none">20200924</span>
              25 Sept 2020
            </td><td><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div></div></div></td></tr><tr><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5024</a></td><td>
              <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
              Partial Payment<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> -$202<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 08/02/2020
            " data-bs-original-title="<span>
              Partial Payment<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> -$202<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 08/02/2020
            ">
                <span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>
</span>
              
            </td><td class="dt-type-numeric"><span class="d-none">5285</span>$5285</td><td>
              <span class="d-none">20200801</span>
              02 Aug 2020
            </td><td><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div></div></div></td></tr><tr><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5020</a></td><td>
              <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
              Downloaded<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 12/15/2020
            " data-bs-original-title="<span>
              Downloaded<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 12/15/2020
            ">
                <span class="badge p-1_5 rounded-pill bg-label-info"><i class="icon-base icon-16px ti tabler-arrow-down-circle"></i></span>
</span>
              
            </td><td class="dt-type-numeric"><span class="d-none">5219</span>$5219</td><td>
              <span class="d-none">20201214</span>
              15 Dec 2020
            </td><td><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div></div></div></td></tr><tr><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td><td class="sorting_1"><a href="app-invoice-preview.html">#4995</a></td><td>
              <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>
              Partial Payment<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 06/09/2020
            " data-bs-original-title="<span>
              Partial Payment<br>
              <span class=&quot;fw-medium&quot;>Balance:</span> 0<br>
              <span class=&quot;fw-medium&quot;>Due Date:</span> 06/09/2020
            ">
                <span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>
</span>
              
            </td><td class="dt-type-numeric"><span class="d-none">3313</span>$3313</td><td>
              <span class="d-none">20200608</span>
              09 Jun 2020
            </td><td><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div></div></div></td></tr></tbody>
          <tfoot></tfoot></table></div></div><div class="row mx-3 justify-content-between"><div class="align-items-center dt-layout-start col-md-auto col-12 d-flex justify-content-center justify-content-md-start gap-2"><div class="dt-info" aria-live="polite" id="DataTables_Table_0_info" role="status">Showing 1 to 6 of 50 entries</div></div><div class="d-md-flex align-items-center dt-layout-end col-md-auto justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0"><div class="dt-paging"><nav aria-label="pagination"><ul class="pagination"><li class="dt-paging-button page-item disabled"><button class="page-link first" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1"><i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i></button></li><li class="dt-paging-button page-item disabled"><button class="page-link previous" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i></button></li><li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" aria-current="page" data-dt-idx="0">1</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="1">2</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="2">3</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="3">4</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="4">5</button></li><li class="dt-paging-button page-item disabled"><button class="page-link ellipsis" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" data-dt-idx="ellipsis" tabindex="-1">…</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="8">9</button></li><li class="dt-paging-button page-item"><button class="page-link next" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Next" data-dt-idx="next"><i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i></button></li><li class="dt-paging-button page-item"><button class="page-link last" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Last" data-dt-idx="last"><i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i></button></li></ul></nav></div></div></div></div>
        </div>
      </div>
    </div>


</div>





</br></br></br>





      <div class="card">
         <h5 class="card-header">Upcoming Auctions</h5>

         <!-- <div class="row mb-3 g-2">

            <div class="col mb-2">
               <select id="auctionFilter" class="form-control">
                  <option value="">All Auctions</option>
               </select>
            </div>

            <div class="col mb-2">
               <select id="makeFilter" class="form-control">
                  <option value="">All Makes</option>
               </select>
            </div>

            <div class="col mb-2">
               <select id="modelFilter" class="form-control">
                  <option value="">All Models</option>
               </select>
            </div>

            <div class="col mb-2">
               <select id="variantFilter" class="form-control">
                  <option value="">All Variants</option>
               </select>
            </div>

            <div class="col mb-2">
               <select id="fuelFilter" class="form-control">
                  <option value="">All Fuel Types</option>
               </select>
            </div>

            <div class="col mb-2">
               <select id="transmissionFilter" class="form-control">
                  <option value="">All Gearboxes</option>
               </select>
            </div>

            <div class="col mb-2">
               <select id="doorsFilter" class="form-control">
                  <option value="">All Doors</option>
               </select>
            </div>

            <div class="col mb-2">
               <select id="ccFilter" class="form-control">
                  <option value="">All CC</option>
               </select>
            </div>

         </div> -->

         <div class="table-responsive text-nowrap">
            <table id="auctionsTable" class="table table-hover">
               <thead>
                  <tr>
                     <th>Vehicle</th>
                     <th>Lot No</th>
                     <th>Auction Date</th>
                     <th>Year</th>
                     <th>CC</th>
                     <th>Mileage</th>
                     <th>Gearbox</th>
                  </tr>
               </thead>
               <tbody class="table-border-bottom-0">
                  <!-- Data loaded by AJAX -->
               </tbody>
            </table>
         </div>

      </div>

























<script>
   function loadFilters() {
       $.ajax({
           url: '{{ url("dashboard/filters") }}',
           data: {
               auction_name: $('#auctionFilter').val(),
               make: $('#makeFilter').val(),
               model: $('#modelFilter').val(),
               variant: $('#variantFilter').val(),
               fuel_type: $('#fuelFilter').val(),
               transmission: $('#transmissionFilter').val(),
               doors: $('#doorsFilter').val(),
               cc: $('#ccFilter').val()
           },
           success: function (data) {
               // Helper function for dropdowns
               const populate = (selector, items, field) => {
                   $(selector).empty().append(`<option value="">All ${field.charAt(0).toUpperCase() + field.slice(1)}</option>`);
                   $.each(items, function (index, item) {
                       $(selector).append(`<option value="${item[field]}">${item[field]} (${item.count})</option>`);
                   });
               };
   
               populate('#auctionFilter', data.auctions, 'auction_name');
               populate('#makeFilter', data.makes, 'make');
               populate('#fuelFilter', data.fuels, 'fuel_type');
               populate('#transmissionFilter', data.transmissions, 'transmission');
               populate('#doorsFilter', data.doors, 'doors');
               populate('#ccFilter', data.ccs, 'cc');
   
               // Populate model filter based on selected make
               updateModelFilter();
   
               // Populate variant filter based on selected model
               updateVariantFilter();
           }
       });
   }
   
   // Update model filter based on selected make
   function updateModelFilter() {
       $.ajax({
           url: '{{ url("dashboard/filters") }}',
           data: { make: $('#makeFilter').val() },
           success: function (data) {
               const models = data.models;
               const modelFilter = $('#modelFilter');
               modelFilter.empty().append('<option value="">All Models</option>');
               $.each(models, function (index, model) {
                   modelFilter.append(`<option value="${model.model}">${model.model} (${model.count})</option>`);
               });
           }
       });
   }
   
   // Update variant filter based on selected model
   function updateVariantFilter() {
       $.ajax({
           url: '{{ url("dashboard/filters") }}',
           data: { model: $('#modelFilter').val() },
           success: function (data) {
               const variants = data.variants;
               const variantFilter = $('#variantFilter');
               variantFilter.empty().append('<option value="">All Variants</option>');
               $.each(variants, function (index, variant) {
                   variantFilter.append(`<option value="${variant.variant}">${variant.variant} (${variant.count})</option>`);
               });
           }
       });
   }
   
   $(document).ready(function () {
       loadFilters();  // Initial load
   
       // Redraw table on filter change
       $('.form-control').on('change', function () {
           loadFilters();  // Load the filters again when changed
           $('#auctionsTable').DataTable().draw();
       });
   
       // Bind make change to update the model filter
       $('#makeFilter').on('change', function () {
           updateModelFilter();
       });
   
       // Bind model change to update the variant filter
       $('#modelFilter').on('change', function () {
           updateVariantFilter();
       });
   
       // DataTable setup
       $('#auctionsTable').DataTable({
           processing: true,
           serverSide: true,
           ajax: {
               url: '{{ url("dashboard/data") }}',
               type: 'GET',
               data: function (d) {
                   d.auction_name = $('#auctionFilter').val();
                   d.make = $('#makeFilter').val();
                   d.model = $('#modelFilter').val();
                   d.variant = $('#variantFilter').val();
                   d.fuel_type = $('#fuelFilter').val();
                   d.transmission = $('#transmissionFilter').val();
                   d.doors = $('#doorsFilter').val();
                   d.cc = $('#ccFilter').val();
               }
           },
           columns: [
               { data: 'title', name: 'title' },
               { data: 'lot', name: 'lot' },
               { data: 'date', name: 'date' },
               { data: 'year', name: 'year' },
               { data: 'cc', name: 'cc' },
               { data: 'mileage', name: 'mileage' },
               { data: 'transmission', name: 'transmission' }
           ]
       });
   });




</script>

@include('user.partial.footer')