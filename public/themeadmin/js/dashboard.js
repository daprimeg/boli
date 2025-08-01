
const global = {
    intrest:{},
    tab:'overview'
};


// new Chart( document.getElementById('valuationChart').getContext('2d'), {
//   type: 'line',
//   data: {
//     labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
//     datasets: [{
//       label: 'Valuation',
//       data: [21000, 22000, 21500, 22500, 23000, 22600],
//       borderColor: '#00f5d4',
//       backgroundColor: 'rgba(0,245,212,0.1)',
//       tension: 0.4,
//       fill: true,
//       pointRadius: 0,
//     }]
//   },
//   options: {
//     plugins: { legend: { display: false } },
//     scales: {
//       x: { display: false },
//       y: { display: false }
//     }
//   }
// });



//   function toggleChart(button) {
//     const chartSection = button.closest('.info-card').querySelector('.chart-section');
//     const isVisible = chartSection.style.display !== 'none';

//     chartSection.style.display = isVisible ? 'none' : 'block';
//     button.textContent = isVisible ? '+' : '− ';
//   }


// Chart.js - Line chart




    //LoadIntrest________________________________________

        const Intrest = {
         intrest:{}
        };


        Intrest.setIntrest = function(id){

            $.ajax({
                url:path+"/interest/setintrest/"+id,
                dataType: "json",
                success: function (response) {
                    global.intrest = response.data;

                    Intrest.loadIntrest();
                    global.lookbestauction();
                    global.previousLots();
                    global.upComingVehicles();
                    global.getValuation();
                    global.getTotalAuctions();

                }
            });
            
        }

        Intrest.loadIntrest = function (){

            $("#interest-buttons-wrapper").html('');
            $.ajax({
                url:path+"/interest/myintrest",
                dataType: "json",
                success: function (response) {
                    response.data.forEach(element => {
                    
                        $("#interest-buttons-wrapper").append(`<button onClick="Intrest.setIntrest(${element.id})" class="text-black btn rounded-3 fw-medium border-solid interest-button flex-shrink-0 waves-effect waves-light ${element.status == '1' ? 'active' : ''}" 
                        style=" !important; border: 1px solid var(--bs-b-color); ">${element.title}</button>`);

                    });
                }
            });

        }



    // getTotalAuctions____________________________________________________________________________
    global.getTotalAuctions = function () {

        
        $.ajax({
            url:path+"/dashboard/getTotalAuctions",
            dataType: "json",
             data:{
               type: $('#myTab .nav-link.active').text(),
            },
            success: function (response) {

                $('.total_auctions').text(response.total_auctions);
                $('.online_auctions').text(response.online_auctions);
                $('.time_auctions').text(response.time_auctions);
                $('.inprogress_auctions').text(response.inprogress_auctions);
                $('.inprogress_vehicles').text(response.inprogress_vehicles);
                $('.onsale_vehicles').text(response.onsale_vehicles);
                $('.total_vehicles').text(response.total_vehicles);
                $('.provisional_vehicles').text(response.provisional_vehicles);
                $('.duplicate_vehicles').text(response.duplicate_vehicles);
                $('.sold_vehicles').text(response.sold_vehicles);

            }
        });

    }


    // getOnlineAuctions____________________________________________________________________________________
    global.getOnlineAuctions = function () {

   
        

        
        $.ajax({
            url:path+"/dashboard/getOnlineAuctions",
            dataType: "json",
            data:{
               platform_id: $('.getOnlineAuctions .platform').val(),
            },
            success: function (response) {

                $('.getOnlineAuctions .rows').html('');

                response.forEach(res => {
                    let lots = res.onsale_vehicles + res.provisional_vehicles;
                    $('.getOnlineAuctions .rows').append(`
                      <tr>
                        <td>${res.name}</td>
                        <td>${res.total_auctions}</td>
                        <td>${res.total_auctions - res.total_auctions}</td>
                        <td>${res.vehicles_total} / ${res.vehicles_total - lots}</td>
                      </tr>
                    `);

                });
            }
        });
    }
    $('.getOnlineAuctions .platform').change(() => {
        
        global.getOnlineAuctions();
    });




    // getTimeAuctions_______________________________________________________________________________________
    global.getTimeAuctions = function () {
    
        $.ajax({
            url:path+"/dashboard/getTimeAuctions",
            dataType: "json",
            data:{
               platform_id: $('.getTimeAuctions .platform').val(),
            },
            success: function (response) {

                $('.getTimeAuctions .rows').html('');

                response.forEach(res => {
                    let lots = res.onsale_vehicles + res.provisional_vehicles;
                    $('.getTimeAuctions .rows').append(`
                      <tr>
                        <td>${res.name}</td>
                        <td>${res.total_auctions}</td>
                        <td>${res.end_date}</td
                      </tr>
                    `);

                });
            }
        });
    }
    $('.getTimeAuctions .platform').change(() => {
        global.getTimeAuctions();
    });



 
    // upComingVehicles___________________________________________________________________________
    global.upComingVehicles = function () {

        $.ajax({
            url: path + "/dashboard/upComingVehicles",
            dataType: "json",
            data: {
                platform_ids: $('.upComingVehicles ').val() // collect platform IDs
            },
            success: function (response) {
                $('.upComingVehicles .rows').html('');

                response.forEach(res => {
                    $('.upComingVehicles .rows').append(`
                    <tr>
                        <td>${res.vehicle_id}</td>
                        <td>${res.mileage}</td>
                        <td>${res.report}</td>
                        <td>${res.autoboli}</td>
                    </tr>
                    `);
                });
            }
        });
    }

    $('.upComingVehicles .platform').change(() => {
        global.upComingVehicles();
    });



    

    // vehicleStates_____________________________________________________________________
    let vehicleStatesChart = "";
    global.vehicleStates = function () {
        $.ajax({
            url:path+"/dashboard/vehicleStates",
            dataType: "json",
            success: function (response) {
                
                let rows = response.onsale_vehicles +  response.provisional_vehicles;
                let remaining = response.total_vehicles - rows;

                $(".vehicleStates .sold").text(response.sold_vehicles);
                $(".vehicleStates .provisional").text(response.provisional_vehicles);
                $(".vehicleStates .not_sold").text(remaining);
                $(".vehicleStates .done").text(rows);
                $(".vehicleStates .total_vehicle").text(response.total_vehicles);

                    let chart = $(".vehicleStates #donutCharts")[0].getContext('2d');
                    if (vehicleStatesChart) {
                        vehicleStatesChart.destroy();
                    }

               vehicleStatesChart = new Chart(chart,{
                    type: 'doughnut',
                    data: {
                      labels: ['Sold','Not Sold'],
                        datasets: [{
                            data: [response.total_vehicles,remaining],
                            backgroundColor:["#007BFF","#3A3A3A",],
                            borderWidth: 2,
                            borderColor: '#0B1B2A',
                            hoverOffset: 2
                        }]
                    },
                    options: {
                    cutout: '75%',
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    }
                    }
                });




                

            }
        });
    }


    // lookbestauction_________________________________________________________________________________________

      let lookbestchartInstance;
      global.lookbestauction = function () {
      
        $.ajax({
        url: path + "/dashboard/lookbestauction",
        dataType: "json",
        data: {
            platform_id: $('#lookbestauction .platform').val() 
        },
        success: function (response) {

                    let lookbestauction = $("#lookbestauction");
                    let chart = lookbestauction.find(".chart")[0].getContext('2d');

                    if (lookbestchartInstance) {
                        lookbestchartInstance.destroy();
                    }

                    lookbestchartInstance = new Chart(chart, {
                                type: 'bar',
                                data: {
                                    labels: response.labels,
                                    datasets: [
                                            {
                                                label: 'Auction Progress',
                                                data: response.total,
                                                backgroundColor: response.colors,
                                                borderRadius: 10,
                                                barThickness: 18
                                            }
                                        ],
                                    borderRadius: 10,
                                    barThickness: 18
                                
                            },
                        options: {
                                indexAxis: 'y',
                                responsive: true,
                                // maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: context => `${context.label}: ${context.raw}%`
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

                        
                       lookbestauction.find('.labels-container').html('');
                       response.data.forEach(element => {
                              lookbestauction.find('.labels-container').append(`
                                 <div class = "col-6" style="display:flex;align-items:center;margin-bottom:50px; text-align:left; ">
                                 <div style="width:12px;height:12px;background:${element.color};margin-right:8px; border-radius: 50% "></div>
                                    <div class = "col-6" style="display:flex;flex-direction: column;">
                                    <span style ="width: 150px !important; font-size: var(--font-p1);color: gray;">${element.label}</span>
                                    <span class="px-2" style="font-size: var(--font-h5);" >(${element.total})</span>
                                    <div>
                                </div>
                             `);
                       }); 
                       
             }
        });
    }

    $('#lookbestauction .platform').change(() => {
        global.lookbestauction();
    });

   
    

    // getPreviousLots_________________________________________________________________________________________
    global.previousLots = function () {
    
        $.ajax({
            url: path + "/dashboard/previousLots",
            dataType: "json",
            data: {
                platform_id: $('.previousLots .platform').val() 
            },
            success: function (response) {
            
                $('.previousLots .rows').html('');
                response.data.forEach(res => {
                    $('.previousLots .rows').append(`
                    <tr>
                        <td>${res.auction_platform_name}</td>
                        <td>${res.auction_type}</td>
                        <td>${res.onSale ?? 0}</td>
                        <td>${res.onProvisional ?? 0}</td>
                        <td>${res.onReserve ?? 0}</td>
                    </tr>
                    `);
                });

            }
        });
    }

    $('.previousLots .platform').change(() => {
        global.previousLots();
    });



    
    // upComingVehicles_________________________________________________________________________________________
    global.upComingVehicles = function () {
    
        $.ajax({
            url: path + "/dashboard/upComingVehicles",
            dataType: "json",
            data: {
                platform_id: $('.upComingVehicles .platform').val() 
            },
            success: function (response) {
            
                $('.upComingVehicles .rows').html('');
                response.data.forEach(res => {
                    $('.upComingVehicles .rows').append(`
                    <tr>
                        <td>${res.make_name} ${res.model_name} ${res.variant_name}</td>
                        <td>${res.mileage}</td>
                        <td> <a target="_blank" href="${res.report}"/>View Report</a></td>
                        <td>0</td>
                    </tr>
                    `);
                });

                $(".upComingVehicles .vehicles_count").text(response.total +" Vehicles");

            }
        });
    }


      // getValuation_____________________________________________________________
    global.getValuation = function () {
        
         $('.getValuation .rows').html('');
        

        $.ajax({
            url: path + "/dashboard/getValuation",
            dataType: "json",
            data: {
                platform_id: $('.getValuation .platform').val() 
            },
            success: function (response) {
           
                $('.getValuation .rows').html('');
                response.data.forEach(res => {

                    $('.getValuation .rows').append(`<div class="info-card">
                            <div data-percent="${res.percent}" data-values="${res.price_month_1},${res.price_month_2},${res.price_month_3}" 
                            data-labels="${response.labels}" data-price="${res.avg_price}"  class="auction-item">
                                <div class="logo-text">
                                    <img src="${path+"/public/themeadmin/autobolidp.png"}" />
                                    <div>
                                    <div class="price">£${res.min_price} - £${res.max_price}</div>
                                    <small class="text-muted" style="font-size: var(--font-p1)">${res.platform_name}</small>
                                    </div>
                                </div>
                                <div style="color:${res.percent > 0 ? 'green' :'red'}" class="change">
                                    ${res.icon}
                                    <button class="toggle-btn minus-icon">+</button>
                                </div>
                            </div>
                            <div class="chart-containers"></div>
                    </div>`);

                });

            }
        });
    }

    $('.getValuation .platform').change(() => {
        global.getValuation();
    });

    $(document).on('click', '.getValuation .auction-item', function () {
      
        $('.getValuation .chart-containers').html('');

        let parent = $(this).parent();
        let price = $(this).data('price');
        let percent = $(this).data('percent');
        let labels = $(this).data('labels').split(",")
        let values = $(this).data('values').split(",").map((p) => parseFloat(p) || 0);
        
        let icon = "";
        if (percent > 0) {
        icon = `<span style="color: green;">&#9650; ${percent.toFixed(1)}%</span>`;
        } else if (percent < 0) {
            icon = `<span style="color: red;">&#9660; ${Math.abs(percent).toFixed(1)}%</span>`;
        } else {
            icon = `<span style="color: gray;">0%</span>`;
        }
        
        parent.find('.chart-containers').html(`
            <div class="chart-section">
                    <h5><span class="badge rounded-circle bg-primary me-2">&nbsp;</span>Past 3 months</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="price me-2">£${price}</div>
                        <small class="text-muted">Average</small>
                    </div>
                    <div class="change up">
                        ${icon}
                    </div>
                    </div>
                    <div class="chart-placeholder">
                    <canvas  height="0" style="display: block; box-sizing: border-box; height: 0px; width: 0px;" width="0"></canvas>
                    </div>
            </div>`);

                  const priceChart = new Chart(parent.find('.chart-containers canvas')[0].getContext('2d'), {
                        type: 'line',
                        data: {
                          labels: labels,
                          datasets: [{
                            label: 'Average Price',
                            data: values,
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
                    });
        
        // alert('clicked!');
    });

    



    
  
  $('#myTab .nav-link').click(function (e) { 
    
            global.getTotalAuctions();
            global.getOnlineAuctions();
            global.getTimeAuctions();
            global.vehicleStates();

            //Dashboard Intrest
            global.lookbestauction();
            global.previousLots();
            global.upComingVehicles();
            global.getValuation();
            Intrest.loadIntrest();

  });

    


    function onStart() {

            //Dashboard Overview
            global.getTotalAuctions();
            global.getOnlineAuctions();
            global.getTimeAuctions();
            global.vehicleStates();

            //Dashboard Intrest
            global.lookbestauction();
            global.previousLots();
            global.upComingVehicles();
            global.getValuation();

            Intrest.loadIntrest();
            // loadIntrest();
        
    }



   $(document).ready(function () {

         onStart();

                    // $('#onlineAuctionsTable').DataTable({
                    //     paging: false,
                    //     searching: false,
                    //     processing: true,
                    //     serverSide: true,
                    //     ajax:{
                    //             url:path+"/dashboard/online",
                    //             data:function (d){

                    //             }
                    //         }
                    //     });
            
            
                   



                

               

            // Optional: Set dynamic number in center
            // document.getElementById('ringChartValue').textContent = '1255'; 

              // How many segments should be marked as sold
            // Replace these with actual data
                // const total = totalVehicles;
                // const sold =605;
                // const segments = 50;

                // const soldSegments = Math.round((sold / total) * segments);
                // const data = [];
                // const colors = [];

                // for (let i = 0; i < segments; i++) {
                //     data.push(2); // constant width
                //     colors.push(i < soldSegments ? '#00c4ff' : '#2e3a4e'); // blue for sold, gray for unsold
                // }

                // new Chart(lookbestauction.querySelector(".chart") document.getElementById('ringChart').getContext('2d'), {
                //     type: 'doughnut',
                //     data: {
                //     datasets: [{
                //         data: data,
                //         backgroundColor: colors,
                //         borderColor: '#0f172a',
                //         borderWidth: 2,
                //         cutout: '70%',
                //         hoverOffset: 0
                //     }]
                //     },
                //     options: {
                //     responsive: false,
                //     plugins: {
                //         legend: { display: false },
                //         tooltip: { enabled: false }
                //     }
                //     }
                // });
        

  });