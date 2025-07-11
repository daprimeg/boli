@include('user.partial.layout')
<div class="content-wrapper">
<div class="flex-grow-1 container-p-y container-xxl">
<div class="card">




   <div class="row">
      <div class="col-12 col-xl-8">
         <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
               <h5 class="card-title m-0 me-2">Topic you are interested in</h5>
               <div class="dropdown">
                  <button class="btn p-0" type="button" id="topic" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-base ti tabler-dots-vertical icon-22px text-body-secondary"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="topic">
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">Highest Views</a>
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">See All</a>
                  </div>
               </div>
            </div>
            <div class="card-body row g-3">
               <div class="col-md-8">
                  <div id="horizontalBarChart" style="min-height: 315px;" class="">
                     <div id="apexchartsybpwbjrv" class="apexcharts-canvas apexchartsybpwbjrv apexcharts-theme-" style="width: 577px; height: 300px;">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" width="577" height="300">
                           <foreignObject x="0" y="0" width="577" height="300">
                              <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 150px;"></div>
                              <style type="text/css">
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
                              </style>
                           </foreignObject>
                           <g class="apexcharts-inner apexcharts-graphical" transform="translate(32.296875, -5)">
                              <defs>
                                 <linearGradient x1="0" y1="0" x2="0" y2="1" id="SvgjsLinearGradient1050">
                                    <stop stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                    <stop stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                    <stop stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                 </linearGradient>
                                 <clipPath id="gridRectMaskybpwbjrv">
                                    <rect width="520.47314453125" height="277.73" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                 </clipPath>
                                 <clipPath id="gridRectBarMaskybpwbjrv">
                                    <rect width="524.47314453125" height="281.73" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                 </clipPath>
                                 <clipPath id="gridRectMarkerMaskybpwbjrv">
                                    <rect width="520.47314453125" height="277.73" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                 </clipPath>
                                 <clipPath id="forecastMaskybpwbjrv"></clipPath>
                                 <clipPath id="nonForecastMaskybpwbjrv"></clipPath>
                                 <filter id="SvgjsFilter1052" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                    <feColorMatrix id="SvgjsFeColorMatrix1051" result="brightness" in="SourceGraphic" type="matrix" values="
                                       2 0 0 0 0
                                       0 2 0 0 0
                                       0 0 2 0 0
                                       0 0 0 1 0
                                       "></feColorMatrix>
                                 </filter>
                                 <filter id="SvgjsFilter1054" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                    <feColorMatrix id="SvgjsFeColorMatrix1053" result="brightness" in="SourceGraphic" type="matrix" values="
                                       2 0 0 0 0
                                       0 2 0 0 0
                                       0 0 2 0 0
                                       0 0 0 1 0
                                       "></feColorMatrix>
                                 </filter>
                                 <filter id="SvgjsFilter1056" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                    <feColorMatrix id="SvgjsFeColorMatrix1055" result="brightness" in="SourceGraphic" type="matrix" values="
                                       2 0 0 0 0
                                       0 2 0 0 0
                                       0 0 2 0 0
                                       0 0 0 1 0
                                       "></feColorMatrix>
                                 </filter>
                                 <filter id="SvgjsFilter1058" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                    <feColorMatrix id="SvgjsFeColorMatrix1057" result="brightness" in="SourceGraphic" type="matrix" values="
                                       2 0 0 0 0
                                       0 2 0 0 0
                                       0 0 2 0 0
                                       0 0 0 1 0
                                       "></feColorMatrix>
                                 </filter>
                                 <filter id="SvgjsFilter1060" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                    <feColorMatrix id="SvgjsFeColorMatrix1059" result="brightness" in="SourceGraphic" type="matrix" values="
                                       2 0 0 0 0
                                       0 2 0 0 0
                                       0 0 2 0 0
                                       0 0 0 1 0
                                       "></feColorMatrix>
                                 </filter>
                                 <filter id="SvgjsFilter1062" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                    <feColorMatrix id="SvgjsFeColorMatrix1061" result="brightness" in="SourceGraphic" type="matrix" values="
                                       2 0 0 0 0
                                       0 2 0 0 0
                                       0 0 2 0 0
                                       0 0 0 1 0
                                       "></feColorMatrix>
                                 </filter>
                              </defs>
                              <rect width="0" height="277.73" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="#b6b6b6" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1050)" class="apexcharts-xcrosshairs" y2="277.73" filter="none" fill-opacity="0.9"></rect>
                              <g class="apexcharts-grid">
                                 <g class="apexcharts-gridlines-horizontal"></g>
                                 <g class="apexcharts-gridlines-vertical">
                                    <line x1="130.1182861328125" y1="0" x2="130.1182861328125" y2="277.73" stroke="var(--bs-border-color)" stroke-dasharray="10" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line x1="260.236572265625" y1="0" x2="260.236572265625" y2="277.73" stroke="var(--bs-border-color)" stroke-dasharray="10" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    <line x1="390.3548583984375" y1="0" x2="390.3548583984375" y2="277.73" stroke="var(--bs-border-color)" stroke-dasharray="10" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                 </g>
                                 <line x1="0" y1="277.73" x2="520.47314453125" y2="277.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                 <line x1="0" y1="1" x2="0" y2="277.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                              </g>
                              <g class="apexcharts-grid-borders">
                                 <line x1="0" y1="0" x2="0" y2="277.73" stroke="var(--bs-border-color)" stroke-dasharray="10" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                 <line x1="520.47314453125" y1="0" x2="520.47314453125" y2="277.73" stroke="var(--bs-border-color)" stroke-dasharray="10" stroke-linecap="butt" class="apexcharts-gridline"></line>
                              </g>
                              <g class="apexcharts-bar-series apexcharts-plot-series">
                                 <g class="apexcharts-series" rel="1" seriesName="series-1" data:realIndex="0">
                                    <path d="M 0.101 9.257666666666665 L 448.51500146484375 9.257666666666665 C 452.01500146484375 9.257666666666665 455.51500146484375 12.757666666666665 455.51500146484375 16.257666666666665 L 455.51500146484375 30.03066666666667 C 455.51500146484375 33.53066666666667 452.01500146484375 37.03066666666667 448.51500146484375 37.03066666666667 L 0.101 37.03066666666667 z " fill="var(--bs-primary)" fill-opacity="1" stroke="var(--bs-primary)" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskybpwbjrv)" pathTo="M 0.101 9.257666666666665 L 448.51500146484375 9.257666666666665 C 452.01500146484375 9.257666666666665 455.51500146484375 12.757666666666665 455.51500146484375 16.257666666666665 L 455.51500146484375 30.03066666666667 C 455.51500146484375 33.53066666666667 452.01500146484375 37.03066666666667 448.51500146484375 37.03066666666667 L 0.101 37.03066666666667 z " pathFrom="M 0.101 9.257666666666665 L 0.101 9.257666666666665 L 0.101 37.03066666666667 L 0.101 37.03066666666667 L 0.101 37.03066666666667 L 0.101 37.03066666666667 L 0.101 37.03066666666667 L 0.101 9.257666666666665 z" cy="55.546" cx="455.5140014648438" j="0" val="35" barHeight="27.773000000000003" barWidth="455.41400146484375"></path>
                                    <path d="M 0.101 55.546 L 253.337572265625 55.546 C 256.837572265625 55.546 260.337572265625 59.046 260.337572265625 62.546 L 260.337572265625 76.319 C 260.337572265625 79.819 256.837572265625 83.319 253.337572265625 83.319 L 0.101 83.319 z " fill="var(--bs-info)" fill-opacity="1" stroke="var(--bs-info)" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskybpwbjrv)" pathTo="M 0.101 55.546 L 253.337572265625 55.546 C 256.837572265625 55.546 260.337572265625 59.046 260.337572265625 62.546 L 260.337572265625 76.319 C 260.337572265625 79.819 256.837572265625 83.319 253.337572265625 83.319 L 0.101 83.319 z " pathFrom="M 0.101 55.546 L 0.101 55.546 L 0.101 83.319 L 0.101 83.319 L 0.101 83.319 L 0.101 83.319 L 0.101 83.319 L 0.101 55.546 z" cy="101.83433333333333" cx="260.336572265625" j="1" val="20" barHeight="27.773000000000003" barWidth="260.236572265625"></path>
                                    <path d="M 0.101 101.83433333333333 L 175.26660058593748 101.83433333333333 C 178.76660058593748 101.83433333333333 182.26660058593748 105.33433333333333 182.26660058593748 108.83433333333333 L 182.26660058593748 122.60733333333334 C 182.26660058593748 126.10733333333334 178.76660058593748 129.60733333333334 175.26660058593748 129.60733333333334 L 0.101 129.60733333333334 z " fill="var(--bs-success)" fill-opacity="1" stroke="var(--bs-success)" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskybpwbjrv)" pathTo="M 0.101 101.83433333333333 L 175.26660058593748 101.83433333333333 C 178.76660058593748 101.83433333333333 182.26660058593748 105.33433333333333 182.26660058593748 108.83433333333333 L 182.26660058593748 122.60733333333334 C 182.26660058593748 126.10733333333334 178.76660058593748 129.60733333333334 175.26660058593748 129.60733333333334 L 0.101 129.60733333333334 z " pathFrom="M 0.101 101.83433333333333 L 0.101 101.83433333333333 L 0.101 129.60733333333334 L 0.101 129.60733333333334 L 0.101 129.60733333333334 L 0.101 129.60733333333334 L 0.101 129.60733333333334 L 0.101 101.83433333333333 z" cy="148.12266666666667" cx="182.26560058593748" j="2" val="14" barHeight="27.773000000000003" barWidth="182.16560058593748"></path>
                                    <path d="M 0.101 148.12266666666667 L 149.242943359375 148.12266666666667 C 152.742943359375 148.12266666666667 156.242943359375 151.62266666666667 156.242943359375 155.12266666666667 L 156.242943359375 168.89566666666667 C 156.242943359375 172.39566666666667 152.742943359375 175.89566666666667 149.242943359375 175.89566666666667 L 0.101 175.89566666666667 z " fill="var(--bs-secondary)" fill-opacity="1" stroke="var(--bs-secondary)" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskybpwbjrv)" pathTo="M 0.101 148.12266666666667 L 149.242943359375 148.12266666666667 C 152.742943359375 148.12266666666667 156.242943359375 151.62266666666667 156.242943359375 155.12266666666667 L 156.242943359375 168.89566666666667 C 156.242943359375 172.39566666666667 152.742943359375 175.89566666666667 149.242943359375 175.89566666666667 L 0.101 175.89566666666667 z " pathFrom="M 0.101 148.12266666666667 L 0.101 148.12266666666667 L 0.101 175.89566666666667 L 0.101 175.89566666666667 L 0.101 175.89566666666667 L 0.101 175.89566666666667 L 0.101 175.89566666666667 L 0.101 148.12266666666667 z" cy="194.411" cx="156.241943359375" j="3" val="12" barHeight="27.773000000000003" barWidth="156.141943359375"></path>
                                    <path d="M 0.101 194.411 L 123.2192861328125 194.411 C 126.7192861328125 194.411 130.2192861328125 197.911 130.2192861328125 201.411 L 130.2192861328125 215.184 C 130.2192861328125 218.684 126.7192861328125 222.184 123.2192861328125 222.184 L 0.101 222.184 z " fill="var(--bs-danger)" fill-opacity="1" stroke="var(--bs-danger)" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskybpwbjrv)" pathTo="M 0.101 194.411 L 123.2192861328125 194.411 C 126.7192861328125 194.411 130.2192861328125 197.911 130.2192861328125 201.411 L 130.2192861328125 215.184 C 130.2192861328125 218.684 126.7192861328125 222.184 123.2192861328125 222.184 L 0.101 222.184 z " pathFrom="M 0.101 194.411 L 0.101 194.411 L 0.101 222.184 L 0.101 222.184 L 0.101 222.184 L 0.101 222.184 L 0.101 222.184 L 0.101 194.411 z" cy="240.69933333333333" cx="130.2182861328125" j="4" val="10" barHeight="27.773000000000003" barWidth="130.1182861328125"></path>
                                    <path d="M 0.101 240.69933333333333 L 110.20745751953125 240.69933333333333 C 113.70745751953125 240.69933333333333 117.20745751953125 244.19933333333333 117.20745751953125 247.69933333333333 L 117.20745751953125 261.4723333333333 C 117.20745751953125 264.9723333333333 113.70745751953125 268.4723333333333 110.20745751953125 268.4723333333333 L 0.101 268.4723333333333 z " fill="var(--bs-warning)" fill-opacity="1" stroke="var(--bs-warning)" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area undefined" index="0" clip-path="url(#gridRectBarMaskybpwbjrv)" pathTo="M 0.101 240.69933333333333 L 110.20745751953125 240.69933333333333 C 113.70745751953125 240.69933333333333 117.20745751953125 244.19933333333333 117.20745751953125 247.69933333333333 L 117.20745751953125 261.4723333333333 C 117.20745751953125 264.9723333333333 113.70745751953125 268.4723333333333 110.20745751953125 268.4723333333333 L 0.101 268.4723333333333 z " pathFrom="M 0.101 240.69933333333333 L 0.101 240.69933333333333 L 0.101 268.4723333333333 L 0.101 268.4723333333333 L 0.101 268.4723333333333 L 0.101 268.4723333333333 L 0.101 268.4723333333333 L 0.101 240.69933333333333 z" cy="286.98766666666666" cx="117.20645751953124" j="5" val="9" barHeight="27.773000000000003" barWidth="117.10645751953125"></path>
                                    <g class="apexcharts-bar-goals-markers">
                                       <g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskybpwbjrv)"></g>
                                       <g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskybpwbjrv)"></g>
                                       <g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskybpwbjrv)"></g>
                                       <g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskybpwbjrv)"></g>
                                       <g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskybpwbjrv)"></g>
                                       <g className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskybpwbjrv)"></g>
                                    </g>
                                    <g class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                 </g>
                                 <g class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0">
                                    <g class="apexcharts-data-labels" transform="rotate(0)">
                                       <text x="227.8070007324219" y="27.644166666666667" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-white)" class="apexcharts-datalabel" cx="227.8070007324219" cy="27.644166666666667" style="font-family: var(--bs-font-family-base);">UI Design</text>
                                    </g>
                                    <g class="apexcharts-data-labels" transform="rotate(0)">
                                       <text x="130.21828613281252" y="73.9325" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-white)" class="apexcharts-datalabel" cx="130.21828613281252" cy="73.9325" style="font-family: var(--bs-font-family-base);">UX Design</text>
                                    </g>
                                    <g class="apexcharts-data-labels" transform="rotate(0)">
                                       <text x="91.18280029296874" y="120.22083333333335" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-white)" class="apexcharts-datalabel" cx="91.18280029296874" cy="120.22083333333335" style="font-family: var(--bs-font-family-base);">Music</text>
                                    </g>
                                    <g class="apexcharts-data-labels" transform="rotate(0)">
                                       <text x="78.1709716796875" y="166.5091666666667" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-white)" class="apexcharts-datalabel" cx="78.1709716796875" cy="166.5091666666667" style="font-family: var(--bs-font-family-base);">Animation</text>
                                    </g>
                                    <g class="apexcharts-data-labels" transform="rotate(0)">
                                       <text x="65.15914306640624" y="212.7975" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-white)" class="apexcharts-datalabel" cx="65.15914306640624" cy="212.7975" style="font-family: var(--bs-font-family-base);">React</text>
                                    </g>
                                    <g class="apexcharts-data-labels" transform="rotate(0)">
                                       <text x="58.65322875976562" y="259.0858333333333" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-white)" class="apexcharts-datalabel" cx="58.65322875976562" cy="259.0858333333333" style="font-family: var(--bs-font-family-base);">SEO</text>
                                    </g>
                                 </g>
                              </g>
                              <line x1="0" y1="0" x2="520.47314453125" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                              <line x1="0" y1="0" x2="520.47314453125" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                              <g class="apexcharts-yaxis apexcharts-xaxis-inversed" rel="0">
                                 <g class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g" transform="translate(0, 0)">
                                    <text x="-15" y="25.24818181818182" text-anchor="end" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-yaxis-label " style="font-family: var(--bs-font-family-base);">
                                       <tspan>6</tspan>
                                       <title>6</title>
                                    </text>
                                    <text x="-15" y="71.53651515151515" text-anchor="end" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-yaxis-label " style="font-family: var(--bs-font-family-base);">
                                       <tspan>5</tspan>
                                       <title>5</title>
                                    </text>
                                    <text x="-15" y="117.82484848484847" text-anchor="end" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-yaxis-label " style="font-family: var(--bs-font-family-base);">
                                       <tspan>4</tspan>
                                       <title>4</title>
                                    </text>
                                    <text x="-15" y="164.1131818181818" text-anchor="end" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-yaxis-label " style="font-family: var(--bs-font-family-base);">
                                       <tspan>3</tspan>
                                       <title>3</title>
                                    </text>
                                    <text x="-15" y="210.40151515151513" text-anchor="end" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-yaxis-label " style="font-family: var(--bs-font-family-base);">
                                       <tspan>2</tspan>
                                       <title>2</title>
                                    </text>
                                    <text x="-15" y="256.6898484848485" text-anchor="end" dominant-baseline="auto" font-size="13px" font-family="var(--bs-font-family-base)" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: var(--bs-font-family-base);">
                                       <tspan>1</tspan>
                                       <title>1</title>
                                    </text>
                                 </g>
                              </g>
                              <g class="apexcharts-xaxis apexcharts-yaxis-inversed">
                                 <g class="apexcharts-xaxis-texts-g" transform="translate(0, -8.666666666666666)">
                                    <text x="520.47314453125" y="307.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                       <tspan>40%</tspan>
                                       <title>40%</title>
                                    </text>
                                    <text x="390.2548583984375" y="307.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                       <tspan>30%</tspan>
                                       <title>30%</title>
                                    </text>
                                    <text x="260.03657226562507" y="307.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                       <tspan>20%</tspan>
                                       <title>20%</title>
                                    </text>
                                    <text x="129.81828613281255" y="307.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                       <tspan>10%</tspan>
                                       <title>10%</title>
                                    </text>
                                    <text x="-0.39999999999997726" y="307.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-family="Helvetica, Arial, sans-serif" font-weight="400" fill="var(--bs-secondary-color)" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                       <tspan>0%</tspan>
                                       <title>0%</title>
                                    </text>
                                 </g>
                              </g>
                              <g class="apexcharts-yaxis-annotations"></g>
                              <g class="apexcharts-xaxis-annotations"></g>
                              <g class="apexcharts-point-annotations"></g>
                           </g>
                           <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                           <g class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                        </svg>
                        <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 149.297px; top: 211.348px;">
                           <div class="px-3 py-2"><span>9%</span></div>
                        </div>
                        <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                           <div class="apexcharts-yaxistooltip-text"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 d-flex justify-content-around align-items-center">
                  <div>
                     <div class="d-flex align-items-baseline">
                        <span class="text-primary me-2"><i class="icon-base ti tabler-circle-filled icon-12px"></i></span>
                        <div>
                           <p class="mb-0">UI Design</p>
                           <h5>35%</h5>
                        </div>
                     </div>
                     <div class="d-flex align-items-baseline my-12">
                        <span class="text-success me-2"><i class="icon-base ti tabler-circle-filled icon-12px"></i></span>
                        <div>
                           <p class="mb-0">Music</p>
                           <h5>14%</h5>
                        </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                        <span class="text-danger me-2"><i class="icon-base ti tabler-circle-filled icon-12px"></i></span>
                        <div>
                           <p class="mb-0">React</p>
                           <h5>10%</h5>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="d-flex align-items-baseline">
                        <span class="text-info me-2"><i class="icon-base ti tabler-circle-filled icon-12px"></i></span>
                        <div>
                           <p class="mb-0">UX Design</p>
                           <h5>20%</h5>
                        </div>
                     </div>
                     <div class="d-flex align-items-baseline my-12">
                        <span class="text-secondary me-2"><i class="icon-base ti tabler-circle-filled icon-12px"></i></span>
                        <div>
                           <p class="mb-0">Animation</p>
                           <h5>12%</h5>
                        </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                        <span class="text-warning me-2"><i class="icon-base ti tabler-circle-filled icon-12px"></i></span>
                        <div>
                           <p class="mb-0">SEO</p>
                           <h5>9%</h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-xl-4 col-md-6">
         <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
               <div class="card-title mb-0">
                  <h5 class="m-0 me-2">Popular Instructors</h5>
               </div>
               <div class="dropdown">
                  <button class="btn text-body-secondary p-0" type="button" id="popularInstructors" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularInstructors" style="">
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">Select All</a>
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                     <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
                  </div>
               </div>
            </div>
            <div class="px-5 py-4 border border-start-0 border-end-0">
               <div class="d-flex justify-content-between align-items-center">
                  <p class="mb-0 text-uppercase">Instructors</p>
                  <p class="mb-0 text-uppercase">courses</p>
               </div>
            </div>
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center mb-6">
                  <div class="d-flex align-items-center">
                     <div class="avatar avatar me-4">
                        <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                     </div>
                     <div>
                        <div>
                           <h6 class="mb-0 text-truncate">Maven Analytics</h6>
                           <small class="text-truncate text-body">Business Intelligence</small>
                        </div>
                     </div>
                  </div>
                  <div class="text-end">
                     <h6 class="mb-0">33</h6>
                  </div>
               </div>
               <div class="d-flex justify-content-between align-items-center mb-6">
                  <div class="d-flex align-items-center">
                     <div class="avatar avatar me-4">
                        <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                     </div>
                     <div>
                        <div>
                           <h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
                           <small class="text-truncate text-body">Digital Marketing</small>
                        </div>
                     </div>
                  </div>
                  <div class="text-end">
                     <h6 class="mb-0">52</h6>
                  </div>
               </div>
               <div class="d-flex justify-content-between align-items-center mb-6">
                  <div class="d-flex align-items-center">
                     <div class="avatar avatar me-4">
                        <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">
                     </div>
                     <div>
                        <div>
                           <h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
                           <small class="text-truncate text-body">UI/UX Design</small>
                        </div>
                     </div>
                  </div>
                  <div class="text-end">
                     <h6 class="mb-0">12</h6>
                  </div>
               </div>
               <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                     <div class="avatar avatar me-4">
                        <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle">
                     </div>
                     <div>
                        <div>
                           <h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
                           <small class="text-truncate text-body">React Native</small>
                        </div>
                     </div>
                  </div>
                  <div class="text-end">
                     <h6 class="mb-0">8</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
                                </br></br></br>
   <div class="row">
   <div class="col-xxl-12">
    <div class="card">
      <div class="mb-4">
         <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
            <div class="row card-header border-bottom mx-0 px-3 py-0">
               <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto">
                  <h5 class="card-title mb-0 text-nowrap text-md-start text-center">Course you are taking</h5>
               </div>
               <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto">
                  <div class="dt-search"><input type="search" class="form-control" id="dt-search-0" placeholder="Search Course" aria-controls="DataTables_Table_0"><label for="dt-search-0"></label></div>
               </div>
            </div>
            <div class="justify-content-between dt-layout-table">
               <div class="d-md-flex justify-content-between align-items-center dt-layout-full table-responsive">
                  <table class="table datatables-academy-course dataTable dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                     <colgroup>
                        <col data-dt-column="1" style="width: 71.7812px;">
                        <col data-dt-column="2" style="width: 496.219px;">
                        <col data-dt-column="3" style="width: 128px;">
                        <col data-dt-column="4" style="width: 348px;">
                        <col data-dt-column="5" style="width: 348px;">
                     </colgroup>
                     <thead>
                        <tr>
                           <th data-dt-column="0" class="control dt-orderable-none dtr-hidden" rowspan="1" colspan="1" aria-label="" style="display: none;"><span class="dt-column-title"></span><span class="dt-column-order"></span></th>
                           <th data-dt-column="1" rowspan="1" colspan="1" class="dt-select dt-orderable-none" aria-label=""><span class="dt-column-title"></span><span class="dt-column-order"></span><input class="form-check-input" type="checkbox" aria-label="Select all rows"></th>
                           <th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc dt-ordering-desc" aria-sort="descending" aria-label="Course Name: Activate to remove sorting" tabindex="0"><span class="dt-column-title" role="button">Course Name</span><span class="dt-column-order"></span></th>
                           <th data-dt-column="3" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Time: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Time</span><span class="dt-column-order"></span></th>
                           <th class="w-25 dt-orderable-asc dt-orderable-desc" data-dt-column="4" rowspan="1" colspan="1" aria-label="Progress: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Progress</span><span class="dt-column-order"></span></th>
                           <th class="w-25 dt-orderable-asc dt-orderable-desc" data-dt-column="5" rowspan="1" colspan="1" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                           <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                           <td class="sorting_1">
                              <div class="d-flex align-items-center">
                                 <span class="me-4"><span class="badge bg-label-warning rounded p-1_5"><i class="icon-base ti tabler-brand-figma icon-28px"></i></span></span>
                                 <div>
                                    <a class="text-heading text-truncate fw-medium mb-2 text-wrap" href="app-academy-course-details.html">
                                    UI/UX Design
                                    </a>
                                    <div class="d-flex align-items-center mt-1">
                                       <div class="avatar-wrapper me-2">
                                          <div class="avatar avatar-xs">
                                             <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                          </div>
                                       </div>
                                       <small class="text-nowrap text-heading">Maybelle Zmitrovich</small>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td><span class="fw-medium text-nowrap text-heading">19h 17m</span></td>
                           <td>
                              <div class="d-flex align-items-center gap-3">
                                 <p class="fw-medium mb-0 text-heading">89%</p>
                                 <div class="progress w-100" style="height: 8px;">
                                    <div class="progress-bar" style="width: 89%" aria-valuenow="89%" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                 </div>
                                 <small>89/100</small>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-users icon-lg me-1_5 text-primary"></i>
                                    <span>14</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-book icon-lg me-1_5 text-info"></i>
                                    <span>48</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-video icon-lg me-1_5 text-danger"></i>
                                    <span>43</span>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                           <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                           <td class="sorting_1">
                              <div class="d-flex align-items-center">
                                 <span class="me-4"><span class="badge bg-label-warning rounded p-1_5"><i class="icon-base ti tabler-brand-figma icon-28px"></i></span></span>
                                 <div>
                                    <a class="text-heading text-truncate fw-medium mb-2 text-wrap" href="app-academy-course-details.html">
                                    Typography Theory
                                    </a>
                                    <div class="d-flex align-items-center mt-1">
                                       <div class="avatar-wrapper me-2">
                                          <div class="avatar avatar-xs">
                                             <img src="../../assets/img/avatars/13.png" alt="Avatar" class="rounded-circle">
                                          </div>
                                       </div>
                                       <small class="text-nowrap text-heading">Rollie Parsons</small>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td><span class="fw-medium text-nowrap text-heading">16h 15m</span></td>
                           <td>
                              <div class="d-flex align-items-center gap-3">
                                 <p class="fw-medium mb-0 text-heading">22%</p>
                                 <div class="progress w-100" style="height: 8px;">
                                    <div class="progress-bar" style="width: 22%" aria-valuenow="22%" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                 </div>
                                 <small>11/50</small>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-users icon-lg me-1_5 text-primary"></i>
                                    <span>209</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-book icon-lg me-1_5 text-info"></i>
                                    <span>20</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-video icon-lg me-1_5 text-danger"></i>
                                    <span>98</span>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                           <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                           <td class="sorting_1">
                              <div class="d-flex align-items-center">
                                 <span class="me-4"><span class="badge bg-label-success rounded p-1_5"><i class="icon-base ti tabler-color-swatch icon-28px"></i></span></span>
                                 <div>
                                    <a class="text-heading text-truncate fw-medium mb-2 text-wrap" href="app-academy-course-details.html">
                                    The Ultimate Drawing Course
                                    </a>
                                    <div class="d-flex align-items-center mt-1">
                                       <div class="avatar-wrapper me-2">
                                          <div class="avatar avatar-xs">
                                             <img src="../../assets/img/avatars/12.png" alt="Avatar" class="rounded-circle">
                                          </div>
                                       </div>
                                       <small class="text-nowrap text-heading">Bernarr Markie</small>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td><span class="fw-medium text-nowrap text-heading">16h 24m</span></td>
                           <td>
                              <div class="d-flex align-items-center gap-3">
                                 <p class="fw-medium mb-0 text-heading">10%</p>
                                 <div class="progress w-100" style="height: 8px;">
                                    <div class="progress-bar" style="width: 10%" aria-valuenow="10%" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                 </div>
                                 <small>1/10</small>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-users icon-lg me-1_5 text-primary"></i>
                                    <span>116</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-book icon-lg me-1_5 text-info"></i>
                                    <span>33</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-video icon-lg me-1_5 text-danger"></i>
                                    <span>53</span>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                           <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                           <td class="sorting_1">
                              <div class="d-flex align-items-center">
                                 <span class="me-4"><span class="badge bg-label-primary rounded p-1_5"><i class="icon-base ti tabler-diamond icon-28px"></i></span></span>
                                 <div>
                                    <a class="text-heading text-truncate fw-medium mb-2 text-wrap" href="app-academy-course-details.html">
                                    The Science of Everyday Thinking
                                    </a>
                                    <div class="d-flex align-items-center mt-1">
                                       <div class="avatar-wrapper me-2">
                                          <div class="avatar avatar-xs">
                                             <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                          </div>
                                       </div>
                                       <small class="text-nowrap text-heading">Freda Garham</small>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td><span class="fw-medium text-nowrap text-heading">8h 44m</span></td>
                           <td>
                              <div class="d-flex align-items-center gap-3">
                                 <p class="fw-medium mb-0 text-heading">81%</p>
                                 <div class="progress w-100" style="height: 8px;">
                                    <div class="progress-bar" style="width: 81%" aria-valuenow="81%" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                 </div>
                                 <small>81/100</small>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-users icon-lg me-1_5 text-primary"></i>
                                    <span>79</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-book icon-lg me-1_5 text-info"></i>
                                    <span>46</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-video icon-lg me-1_5 text-danger"></i>
                                    <span>27</span>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                           <td class="dt-select"><input aria-label="Select row" class="form-check-input" type="checkbox"></td>
                           <td class="sorting_1">
                              <div class="d-flex align-items-center">
                                 <span class="me-4"><span class="badge bg-label-primary rounded p-1_5"><i class="icon-base ti tabler-diamond icon-28px"></i></span></span>
                                 <div>
                                    <a class="text-heading text-truncate fw-medium mb-2 text-wrap" href="app-academy-course-details.html">
                                    The Science of Critical Thinking
                                    </a>
                                    <div class="d-flex align-items-center mt-1">
                                       <div class="avatar-wrapper me-2">
                                          <div class="avatar avatar-xs">
                                             <img src="../../assets/img/avatars/14.png" alt="Avatar" class="rounded-circle">
                                          </div>
                                       </div>
                                       <small class="text-nowrap text-heading">Papageno Sloy</small>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td><span class="fw-medium text-nowrap text-heading">4h 59m</span></td>
                           <td>
                              <div class="d-flex align-items-center gap-3">
                                 <p class="fw-medium mb-0 text-heading">55%</p>
                                 <div class="progress w-100" style="height: 8px;">
                                    <div class="progress-bar" style="width: 55%" aria-valuenow="55%" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                 </div>
                                 <small>11/20</small>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-users icon-lg me-1_5 text-primary"></i>
                                    <span>274</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-book icon-lg me-1_5 text-info"></i>
                                    <span>21</span>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <i class="icon-base ti tabler-video icon-lg me-1_5 text-danger"></i>
                                    <span>60</span>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                     <tfoot></tfoot>
                  </table>
               </div>
            </div>
            <div class="row mx-3 justify-content-between">
               <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto">
                  <div class="dt-info" aria-live="polite" id="DataTables_Table_0_info" role="status">Showing 1 to 5 of 25 entries</div>
               </div>
               <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto">
                  <div class="dt-paging">
                     <nav aria-label="pagination">
                        <ul class="pagination">
                           <li class="dt-paging-button page-item disabled"><button class="page-link first" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="First" data-dt-idx="first" tabindex="-1"><i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i></button></li>
                           <li class="dt-paging-button page-item disabled"><button class="page-link previous" role="link" type="button" aria-controls="DataTables_Table_0" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i></button></li>
                           <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" aria-current="page" data-dt-idx="0">1</button></li>
                           <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="1">2</button></li>
                           <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="2">3</button></li>
                           <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="3">4</button></li>
                           <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="DataTables_Table_0" data-dt-idx="4">5</button></li>
                           <li class="dt-paging-button page-item"><button class="page-link next" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Next" data-dt-idx="next"><i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i></button></li>
                           <li class="dt-paging-button page-item"><button class="page-link last" role="link" type="button" aria-controls="DataTables_Table_0" aria-label="Last" data-dt-idx="last"><i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i></button></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div></div>











@include('user.partial.footer')