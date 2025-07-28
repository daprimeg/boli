




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



  function toggleChart(button) {
    const chartSection = button.closest('.info-card').querySelector('.chart-section');
    const isVisible = chartSection.style.display !== 'none';

    chartSection.style.display = isVisible ? 'none' : 'block';
    button.textContent = isVisible ? '+' : '− ';
  }


// Chart.js - Line chart
  const priceChart = new Chart(document.getElementById('priceChart').getContext('2d'), {
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
  });



    // getTotalAuctions____________________________________________________________________________
    function getTotalAuctions() {

        $.ajax({
            url:path+"/dashboard/getTotalAuctions",
            dataType: "json",
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
    function getOnlineAuctions() {
        
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
        getOnlineAuctions();
    });




    // getTimeAuctions_______________________________________________________________________________________
    function getTimeAuctions() {
        
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
        getTimeAuctions();
    });



 
    // upComingVehicles___________________________________________________________________________
    function upComingVehicles() {
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
        upComingVehicles();
    });



    

    // vehicleStates_____________________________________________________________________
    function vehicleStates() {
    
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

                
                // $('.total_auctions').text(response.total_auctions);
                // $('.online_auctions').text(response.online_auctions);
                // $('.time_auctions').text(response.time_auctions);
                // $('.inprogress_auctions').text(response.inprogress_auctions);
                // $('.inprogress_vehicles').text(response.inprogress_vehicles);
                // $('.onsale_vehicles').text(response.onsale_vehicles);
                // $('.total_vehicles').text(response.total_vehicles);
                // $('.provisional_vehicles').text(response.provisional_vehicles);
                // $('.duplicate_vehicles').text(response.duplicate_vehicles);
                // $('.sold_vehicles').text(response.sold_vehicles);

            }
        });
    }


    // lookbestauction_________________________________________________________________________________________

      let lookbestchartInstance;

      function lookbestauction() {

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

                        console.log(response.data);
                        
                       lookbestauction.find('.labels-container').html('');
                       response.data.forEach(element => {
                              lookbestauction.find('.labels-container').append(`
                                 <div style="display:flex;align-items:center;margin-bottom:4px;">
                                    <div style="width:12px;height:12px;background:${element.color};margin-right:8px;"></div>
                                    <span>${element.label}</span>
                                    <span class="px-2" >(${element.total})</span>
                                </div>
                             `);
                       }); 
                       
             }
        });
    }

    $('#lookbestauction .platform').change(() => {
        lookbestauction();
    });

   

    

    // getPreviousLots_________________________________________________________________________________________
    function previousLots() {
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
        previousLots();
    });



    
    // upComingVehicles_________________________________________________________________________________________
    function upComingVehicles() {
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


      // upComingVehicles_________________________________________________________________________________________
    function getValuation() {
        $.ajax({
            url: path + "/dashboard/getValuation",
            dataType: "json",
            data: {
                platform_id: $('.getValuation .platform').val() 
            },
            success: function (response) {
           

                $('.getValuation .rows').html('');
                response.data.forEach(res => {

                    $('.getValuation .rows').append(`
                        <div class="info-card">
                            <div class="auction-item">
                                <div class="logo-text">
                                <img src="" alt="BCA ">
                                <div>
                                <div class="price">£22,600</div>
                                <small class="text-muted">${res.auction_platform_name}</small>
                                </div>
                            </div>
                            <div class="change down">
                                <button class="toggle-btn minus-icon" onclick="toggleChart(this)">+</button>
                            </div>
                            </div>
                            <div class="chart-section">
                                <h5><span class="badge rounded-circle bg-primary me-2">&nbsp;</span>Past 3 months</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="price me-2">£22,600</div>
                                    <small class="text-muted">Average</small>
                                </div>
                                <div class="change up">
                                    <span class="me-1">▲</span> 5.8&amp;
                                </div>
                                </div>
                                <div class="chart-placeholder">
                                <canvas id="priceChart" height="0" style="display: block; box-sizing: border-box; height: 0px; width: 0px;" width="0"></canvas>
                                </div>
                            </div>
                    </div>
                    `);
                });


                // $(".upComingVehicles .vehicles_count").text(response.total +" Vehicles");

            }
        });
    }


    
  



    


    function onStart() {
 
        getTotalAuctions();
        getOnlineAuctions();
        getTimeAuctions();
        vehicleStates();


        lookbestauction();
        previousLots();
        upComingVehicles();
        getValuation();
        

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