 $(document).ready(function () {

    const auctions = {
        filters:{
            page:1,
            date:'past_3_months',
            display_type:'auction',
            length:50,
        },
       
    };


    auctions.onLoad = function(){  

        const params = new URLSearchParams(window.location.search);
        for (const [key, value] of params.entries()) {
            auctions.filters[key] = value;
        }

        if(auctions.filters.date){
           $('select[name=date]').val(auctions.filters.date);
        }

        if(auctions.filters.length){
           $('select[name=length]').val(auctions.filters.length);
        }

        console.log(auctions.filters);
        

        // if(auctions.filters.platform){
        //    $('select[name=auction_name]').val(auctions.filters.platform);
        //    $('select[name=auction_name]').trigger('change');
        // }

        

        auctions.searchrecord();

    }


    auctions.showHeadings = function(){  

            if(auctions.filters.display_type == 'auction'){
                $('table thead').html(`<tr>
                    <th>Vehicle</th>
                    <th>Year</th>
                    <th>CC</th>
                    <th>Mileage</th>
                    <th>Transmission</th>
                    <th>Auction</th>
                    <th>Auction Time</th>
                    <th>Last Bid</th>
                </tr>`);
            }else{
                $('table thead').html(`<tr>
                    <th>Vehicle</th>
                    <th>Clean</th>
                    <th>Average</th>
                    <th>Cap Below</th>
                    <th>Autotrader</th>
                    <th>Auction</th>
                    <th>Last Bid</th>
                    <th>Autoboli</th>
                </tr>`);
            }

    }


   auctions.searchrecord = function  () {  

                $(`.table tbody`).html(`
                    <tr>
                        <td colspan="8" class="text-center" >Loading..</td>
                    </tr>
                `);
                $(`.pagination`).html('');

                $.ajax({
                        url: url+"/auction-finder/data/auctionList",
                        method: "GET",
                        data: auctions.filters,
                        success: function (response) {

                            let start = (response.current_page - 1) * response.per_page + 1;
                            let end = Math.min(start + response.per_page - 1, response.total);

                            $('.show_pagging').text(`${start}-${end} of ${response.total} Vehicles`);
                            $('.table tbody').html('');

                        response.data.forEach(element => {
                                if(auctions.filters.display_type == 'auction')
                                $(`.table tbody`).append(`
                                    <tr>
                                        <td>${element.make_name} ${element.model_name} ${element.variant_name}</td>
                                        <td>${element.year}</td>
                                        <td>${element.cc}</td>
                                        <td>${element.mileage}</td>
                                        <td>${element.transmission}</td>
                                        <td>${element.auction_name}</td>
                                        <td>${element.auction_date} ${element.auction_time}</td>
                                        <td>${element.last_bid}</td>
                                    </tr>
                                `);
                                else{
                                    $(`.table tbody`).append(`
                                    <tr>
                                        <td>${element.make_name} ${element.model_name} ${element.variant_name}</td>
                                        <td>${element.cap_clean}</td>
                                        <td>${element.cap_average}</td>
                                        <td>${element.cap_below}</td>
                                        <td>${element.autotrader_retail_value}</td>
                                        <td>${element.auction_name}</td>
                                        <td>${element.last_bid}</td>
                                        <td>${element.auto_boli}</td>
                                    </tr>
                                `);
                                }
                        });

                        for(let index = 1; index < response.last_page; index++){
                            $(`.pagination`).append(`<li data-id="${index}" class="dt-paging-button page-item ${response.current_page == index ? 'active' : ''}">
                                    <button class="page-link" type="button">${index}</button>
                            </li>`);
                        }

                        },
                        error: function (xhr) {
                        // alert('Something went wrong. Please try again.');
                        }
                });

    }


    $('select[name=auction_name]').change(function (e) { 
        const url = new URL(window.location.href);
        url.searchParams.set('platform', $(this).val());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $('select[name=length]').change(function (e) { 
        const url = new URL(window.location.href);
        url.searchParams.set('length', $(this).val());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $('select[name=date]').change(function (e) { 
        const url = new URL(window.location.href);
        url.searchParams.set('date', $(this).val());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $('.display_type').click(function (e) { 

        const url = new URL(window.location.href);
        url.searchParams.set('display_type', $(this).val());
        history.pushState({}, '', url);

        $('.display_type').removeClass('active');
        $(this).addClass('active');
        auctions.showHeadings();
        auctions.onLoad();
    });



    $('.pagination').on('click', 'li', function() {
        const url = new URL(window.location.href);
        url.searchParams.set('page', $(this).data('id'));
        history.pushState({}, '', url);
        auctions.onLoad();
    });

    $('input[name="vehicle_types[]"]').change(function() {
        let selected = [];
        $('input[name="vehicle_types[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.vehicle_types = selected.toString();
        auctions.searchrecord();
    });


    $('input[name="makes[]"]').change(function() {

        let selected = [];
        $('input[name="makes[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.makes = selected.toString();

        
        auctions.searchrecord();
    });


    $('input[name="models[]"]').change(function() {
        let selected = [];
        $('input[name="models[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.models = selected.toString();
        auctions.searchrecord();
    });


    $('input[name="body_types[]"]').change(function() {
        let selected = [];
        $('input[name="body_types[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.body_types = selected.toString();
        auctions.searchrecord();
    });


    $('input[name="variants[]"]').change(function() {
        let selected = [];
        $('input[name="variants[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.variants = selected.toString();
        auctions.searchrecord();
    });

    $('input[name="transmission[]"]').change(function() {
        let selected = [];
        $('input[name="transmission[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.transmission = selected.toString();
        auctions.searchrecord();
    });

    $('input[name="fuel_type[]"]').change(function() {
        let selected = [];
        $('input[name="fuel_type[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.fuel_type = selected.toString();
        auctions.searchrecord();
    });


    $('input[name="colors[]"]').change(function() {
        let selected = [];
        $('input[name="colors[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.colors = selected.toString();
        auctions.searchrecord();
    });


    $('input[name="doors[]"]').change(function() {

        let selected = [];
        $('input[name="doors[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        auctions.filters.doors = selected.toString();
        auctions.searchrecord();
    });


    $('input[name="grades[]"]').change(function() {
        let selected = [];
        $('input[name="grades[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.grades = selected.toString();
        auctions.searchrecord();
    });

    $('input[name="v5[]"]').change(function() {
        let selected = [];
        $('input[name="v5[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.v5 = selected.toString();
        auctions.searchrecord();
    });


    $('input[name="cc[]"]').change(function() {
        let selected = [];
        $('input[name="cc[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.cc = selected.toString();
        auctions.searchrecord();
    });

    $('input[name="former_keepers[]"]').change(function() {
        let selected = [];
        $('input[name="former_keepers[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.former_keepers = selected.toString();
        auctions.searchrecord();
    });

    $('input[name="number_of_services[]"]').change(function() {
        let selected = [];
        $('input[name="number_of_services[]"]:checked').each(function () {
            selected.push($(this).val());
        });
        auctions.filters.number_of_services = selected.toString();
        auctions.searchrecord();
    });

    $('#mileage_from, #mileage_to').change(function () {
        auctions.filters.mileage = $('#mileage_from').val()+'-'+$('#mileage_to').val();
        auctions.searchrecord();
    });

   
 



    auctions.onLoad();
      

});