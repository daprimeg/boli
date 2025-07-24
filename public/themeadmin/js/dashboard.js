




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


const auctionChart = new Chart(document.getElementById('auctionChart').getContext('2d'), {
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


    function getTotalAuctions() {
    
        $.ajax({
            url:path+"/dashboard/getTotalAuctions",
            dataType: "json",
            success: function (response) {
                $('.getTotalAuctions').text(response.data);
                $('.getOnlineAuctions').text(response.online);
                $('.getTimeAuctions').text(response.time);
            }
        });
    }


    function onStart() {
 
        getTotalAuctions();
        

    }



   $(document).ready(function () {

         onStart();

                    $('#onlineAuctionsTable').DataTable({
                        paging: false,
                        searching: false,
                        processing: true,
                        serverSide: true,
                        ajax:{
                                url:path+"/dashboard/online",
                                data:function (d){

                                }
                            }
                        });
            
            
                    $('#timeAuctionsTable').DataTable({
                        paging: false,
                        searching: false,
                        processing: true,
                        serverSide: true,
                        ajax:{
                                url:path+"/dashboard/time",
                                data:function (d){

                                }
                            }
                        });

                    $('#favouriteTable').DataTable({
                        paging: false,
                        searching: false,
                        processing: true,
                        serverSide: true,
                        ajax:{
                                url:path+"/dashboard/favourite",
                                data:function (d){

                                }
                            }
                            
                    });



                    // Replace these with actual data
                const total = totalVehicles;
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

                new Chart(document.getElementById('ringChart').getContext('2d'), {
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
            // document.getElementById('ringChartValue').textContent = '1255'; 
        

  });