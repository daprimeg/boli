 $(document).ready(function () {

    const filters = {
        length:50,
        page:1,
        date_range:'past_3_months',
        display_type:'auction',
    };
   

    filters.showHeadings = function(){  

            if(filters.display_type == 'auction'){
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


   filters.searchrecord = function  () {  

                $(`.table tbody`).html(`
                    <tr>
                        <td colspan="8" class="text-center" >Loading..</td>
                    </tr>
                `);
                $(`.pagination`).html('');

                $.ajax({
                        url: url+"/auctionfinder/data",
                        method: "GET",
                        data:filters,
                        success: function (response) {

                            let start = (response.current_page - 1) * response.per_page + 1;
                            let end = Math.min(start + response.per_page - 1, response.total);

                        $('.show_pagging').text(`${start}-${end} of ${response.total} Vehicles`);
                        $('.table tbody').html('');

                        response.data.forEach(element => {
                                if(filters.display_type == 'auction')
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
            filters.plateform_id = $(this).val();
            filters.searchrecord();
        });

        $('select[name=auction_name]').change(function (e) { 
            filters.platform_id = $(this).val();
            filters.searchrecord();
        });

        $('select[name=length]').change(function (e) { 
            filters.length = $(this).val();
            filters.searchrecord();
        });

        $('select[name=date_range]').change(function (e) { 
            filters.date_range = $(this).val();
            filters.searchrecord();
        });

        $('.display_type').click(function (e) { 
            $('.display_type').removeClass('active');
            filters.display_type = $(this).data('id');
            filters.showHeadings();
            filters.searchrecord();
            $(this).addClass('active');
        });


        $('.pagination').on('click', 'li', function() {
            filters.page = $(this).data('id');
            filters.searchrecord();
        });

        $('input[name="vehicle_types[]"]').change(function() {
            let selected = [];
            $('input[name="vehicle_types[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.vehicle_types = selected.toString();
            filters.searchrecord();
        });


        $('input[name="makes[]"]').change(function() {
            let selected = [];
            $('input[name="makes[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.makes = selected.toString();
            filters.searchrecord();
        });


        $('input[name="models[]"]').change(function() {
            let selected = [];
            $('input[name="models[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.models = selected.toString();
            filters.searchrecord();
        });

        $('input[name="body_types[]"]').change(function() {
            let selected = [];
            $('input[name="body_types[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.body_types = selected.toString();
            filters.searchrecord();
        });


        $('input[name="variants[]"]').change(function() {
            let selected = [];
            $('input[name="variants[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.variants = selected.toString();
            filters.searchrecord();
        });

        $('input[name="transmission[]"]').change(function() {
            let selected = [];
            $('input[name="transmission[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.transmission = selected.toString();
            filters.searchrecord();
        });

        $('input[name="fuel_type[]"]').change(function() {
            let selected = [];
            $('input[name="fuel_type[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.fuel_type = selected.toString();
            filters.searchrecord();
        });


        $('input[name="colors[]"]').change(function() {
            let selected = [];
            $('input[name="colors[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.colors = selected.toString();
            filters.searchrecord();
        });


        $('input[name="doors[]"]').change(function() {

            let selected = [];
            $('input[name="doors[]"]:checked').each(function () {
                selected.push($(this).val());
            });

            filters.doors = selected.toString();
            filters.searchrecord();
        });


        $('input[name="grades[]"]').change(function() {
            let selected = [];
            $('input[name="grades[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.grades = selected.toString();
            filters.searchrecord();
        });

        $('input[name="v5[]"]').change(function() {
            let selected = [];
            $('input[name="v5[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.v5 = selected.toString();
            filters.searchrecord();
        });


        $('input[name="cc[]"]').change(function() {
            let selected = [];
            $('input[name="cc[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.cc = selected.toString();
            filters.searchrecord();
        });

        $('input[name="former_keepers[]"]').change(function() {
            let selected = [];
            $('input[name="former_keepers[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.former_keepers = selected.toString();
            filters.searchrecord();
        });

        $('input[name="number_of_services[]"]').change(function() {
            let selected = [];
            $('input[name="number_of_services[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            filters.number_of_services = selected.toString();
            filters.searchrecord();
        });

        $('#mileage_from, #mileage_to').change(function () {
            filters.mileage = $('#mileage_from').val()+'-'+$('#mileage_to').val();
            filters.searchrecord();
        });

                  
        
        
        filters.searchrecord();

      

});