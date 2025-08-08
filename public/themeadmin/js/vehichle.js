 $(document).ready(function () {

    const auctions = {
        selected:[],
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

        if(auctions.filters.mileage_from){
           $('#mileage_from').val(auctions.filters.mileage_from);
        }

        if(auctions.filters.mileage_to){
           $('#mileage_to').val(auctions.filters.mileage_to);
        }

        $(".params").text('');
        Object.entries(auctions.filters).forEach(([key, value]) => {
            if(value){
               $('.params').append(`<span class="badge mx-2" >${key}:${value} X</span>`);
            }
        });

        auctions.searchrecord();
        auctions.renderActiveTags();

    }


    auctions.renderActiveTags = function(){  

        $(`.tags`).html('');
        auctions.selected.forEach(element => {
            $(`.tags-${element.key}`).append(`<span class="badge mx-2">${element.label} X</span>`);
        });

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


    auctions.getPlatforms = function  () {      

         $.ajax({
            url: url+"/admin/masters/platforms/getPlatforms?_type=query",
            method: "GET",
            success: function (response) {

                $("select[name=auction_name]").html('<option value="">Select</option>');
                response.results.forEach(element => {

                         $("select[name=auction_name]").append(`<option ${auctions.filters.platform == element.id ? 'selected' : ''} value="${element.id}">${element.text}</option>`);
                }); 
            },
            error: function (response) {

            },
         });

    }


    auctions.getVehicleTypes = function  () {      

        auctions.selected.forEach(car => delete car.type);

         $.ajax({
            url: url+"/auction-finder/data/getVehicleTypes",
            method: "GET",
            success: function (response) {

            
                $("#collapseVehicleType").html('');
                response.data.forEach(element => {
                    
                    let selected = '';
                    if(auctions.filters.type){
                        let types = auctions.filters.type.split(',');
                        if(types.includes(String(element.id))) {
                            selected = 'checked';

                            auctions.selected.push({
                                key:'type',
                                label:element.label,
                                value:element.id
                            });
                        }
                    }

                    $("#collapseVehicleType").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="type[]" value="${element.id}" id="type_${element.id}">
                                <label class="form-check-label" for="type_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);

                });

                auctions.renderActiveTags();

            },
            error: function (response) {
                $("#collapseVehicleType").html('');
            },
         });

    }



    auctions.getMakes = function  () {      

         auctions.selected.forEach(car => delete car.make);

         $.ajax({
            url: url+"/auction-finder/data/getMakes",
            method: "GET",
            success: function (response) {

                $("#collapseVehiclemake").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.make){
                        let make = auctions.filters.make.split(',');
                        if(make.includes(String(element.id))) {
                            selected = 'checked';

                            auctions.selected.push({
                                key:'make',
                                label:element.label,
                                value:element.id
                            });
                        }
                    }

                    $("#collapseVehiclemake").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="make[]" value="${element.id}" id="make_${element.id}">
                                <label class="form-check-label" for="make_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

             
                  auctions.renderActiveTags();
            },
            error: function (response) {
                $("#collapseVehiclemake").html('');
            },
         });

    }


     auctions.getModels = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getModels",
            method: "GET",
            success: function (response) {

                $("#collapseVehiclemodel").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.model){
                        let model = auctions.filters.model.split(',');
                        if(model.includes(String(element.id))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseVehiclemodel").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="model[]" value="${element.id}" id="model_${element.id}">
                                <label class="form-check-label" for="model_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseVehiclemodel").html('');
            },
         });

    }


    auctions.getVariants = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getVariants",
            method: "GET",
            success: function (response) {

                $("#collapseVehiclevariant").html('');
                response.data.forEach(element => {


                    let selected = '';
                    if(auctions.filters.variant){
                        let variant = auctions.filters.variant.split(',');
                        if(variant.includes(String(element.id))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseVehiclevariant").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="variant[]" value="${element.id}" id="variant_${element.id}">
                                <label class="form-check-label" for="variant_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseVehiclevariant").html('');
            },
         });

    }



    auctions.getYears = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getYears",
            method: "GET",
            success: function (response) {

                $("#collapseVehicleyear").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.year){
                        let year = auctions.filters.year.split(',');
                        if(year.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseVehicleyear").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="year[]" value="${element.label}" id="year_${element.label}">
                                <label class="form-check-label" for="year_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseVehicleyear").html('');
            },
         });

    }



    auctions.getTransmissions = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getTransmissions",
            method: "GET",
            success: function (response) {

                $("#collapseTransmission").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.transmission){
                        let transmission = auctions.filters.transmission.split(',');
                        if(transmission.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseTransmission").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="transmission[]" value="${element.label}" id="transmission_${element.label}">
                                <label class="form-check-label" for="transmission_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseTransmission").html('');
            },
         });

    }

    


    auctions.getFuelType = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getFuelType",
            method: "GET",
            success: function (response) {

                $("#collapsefuel").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.fuel_type){
                        let fuel_type = auctions.filters.fuel_type.split(',');
                        if(fuel_type.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapsefuel").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="fuel_type[]" value="${element.label}" id="fuel_type_${element.label}">
                                <label class="form-check-label" for="fuel_type_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapsefuel").html('');
            },
         });

    }



     auctions.getBodyType = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getBodyType",
            method: "GET",
            success: function (response) {

                $("#collapseVehiclebody").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.body){
                        let body = auctions.filters.body.split(',');
                        if(body.includes(String(element.id))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseVehiclebody").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="body[]" value="${element.id}" id="body_${element.id}">
                                <label class="form-check-label" for="body_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);

                });

            },
            error: function (response) {
                $("#collapseVehiclebody").html('');
            },
         });

    }



    auctions.getColors = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getColors",
            method: "GET",
            success: function (response) {

                $("#collapseVehiclecolor").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.color){
                        let color = auctions.filters.color.split(',');
                        if(color.includes(String(element.id))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseVehiclecolor").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="color[]" value="${element.id}" id="color_${element.id}">
                                <label class="form-check-label" for="color_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseVehiclecolor").html('');
            },
         });

    }



    auctions.getDoors = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getDoors",
            method: "GET",
            success: function (response) {

                $("#collapsedoor").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.door){
                        let door = auctions.filters.door.split(',');
                        if(door.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapsedoor").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="door[]" value="${element.label}" id="door_${element.label}">
                                <label class="form-check-label" for="door_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapsedoor").html('');
            },
         });

    }



     auctions.getSeats = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getSeats",
            method: "GET",
            success: function (response) {

                $("#collapseseats").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.seat){
                        let seat = auctions.filters.seat.split(',');
                        if(seat.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseseats").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="seat[]" value="${element.label}" id="seat_${element.label}">
                                <label class="form-check-label" for="seat_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseseats").html('');
            },
         });

    }



     auctions.getGrade = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getGrade",
            method: "GET",
            success: function (response) {

                $("#collapsegrade").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.grade){
                        let grade = auctions.filters.grade.split(',');
                        if(grade.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapsegrade").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="grade[]" value="${element.label}" id="grade_${element.label}">
                                <label class="form-check-label" for="grade_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });
            },
            error: function (response) {
                $("#collapsegrade").html('');
            },
         });

    }



     auctions.getV5 = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getV5",
            method: "GET",
            success: function (response) {

                $("#collapsev5").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.v5){
                        let v5 = auctions.filters.v5.split(',');
                        if(v5.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapsev5").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="v5[]" value="${element.label}" id="v5_${element.label}">
                                <label class="form-check-label" for="v5_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapsev5").html('');
            },
         });

    }




    auctions.getEngineSize = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getEngineSize",
            method: "GET",
            success: function (response) {

                $("#collapsecc").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.cc){
                        let cc = auctions.filters.cc.split(',');
                        if(cc.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapsecc").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="cc[]" value="${element.label}" id="cc_${element.label}">
                                <label class="form-check-label" for="cc_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapsecc").html('');
            },
         });

    }

    
    auctions.getFormerKeepers = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getFormerKeepers",
            method: "GET",
            success: function (response) {

                $("#collapseformer_keepers").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.former_keeper){
                        let former_keeper = auctions.filters.former_keeper.split(',');
                        if(former_keeper.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapseformer_keepers").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="former_keeper[]" value="${element.label}" id="former_keeper_${element.label}">
                                <label class="form-check-label" for="former_keeper_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseformer_keepers").html('');
            },
         });

    }


    auctions.getNoOfservices = function  () {      

         $.ajax({
            url: url+"/auction-finder/data/getNoOfservices",
            method: "GET",
            success: function (response) {

                $("#collapsenumber_of_services").html('');
                response.data.forEach(element => {

                    let selected = '';
                    if(auctions.filters.no_of_service){
                        let no_of_service = auctions.filters.no_of_service.split(',');
                        if(no_of_service.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                    $("#collapsenumber_of_services").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" type="checkbox" name="no_of_service[]" value="${element.label}" id="no_of_service_${element.label}">
                                <label class="form-check-label" for="no_of_service_${element.label}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapsenumber_of_services").html('');
            },
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


    $(document).on('change', 'input[name="type[]"]', function () {

        let selected = [];
        $('input[name="type[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('type', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();

    });


    $(document).on('change','input[name="body[]"]', function () {

           let selected = [];
            $('input[name="body[]"]:checked').each(function () {
                selected.push($(this).val());
            });
            const url = new URL(window.location.href);
            url.searchParams.set('body', selected.toString());
            history.pushState({}, '', url);
            auctions.onLoad();
    });



    $(document).on('change','input[name="make[]"]', function () {

        let selected = [];
        $('input[name="make[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('make', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();

    });

    $(document).on('change','input[name="model[]"]', function () {
            let selected = [];
            $('input[name="model[]"]:checked').each(function () {
                selected.push($(this).val());
            });

            const url = new URL(window.location.href);
            url.searchParams.set('model', selected.toString());
            history.pushState({}, '', url);
            auctions.onLoad();
    });

    
    $(document).on('change','input[name="variant[]"]', function () {
        let selected = [];
            $('input[name="variant[]"]:checked').each(function () {
                selected.push($(this).val());
            });

            const url = new URL(window.location.href);
            url.searchParams.set('variant', selected.toString());
            history.pushState({}, '', url);
            auctions.onLoad();
    });

    $(document).on('change','input[name="year[]"]', function () {
        let selected = [];
            $('input[name="year[]"]:checked').each(function () {
                selected.push($(this).val());
            });

            const url = new URL(window.location.href);
            url.searchParams.set('year', selected.toString());
            history.pushState({}, '', url);
            auctions.onLoad();
    });

    $(document).on('change','input[name="transmission[]"]', function () {
        let selected = [];
            $('input[name="transmission[]"]:checked').each(function () {
                selected.push($(this).val());
            });

            const url = new URL(window.location.href);
            url.searchParams.set('transmission', selected.toString());
            history.pushState({}, '', url);
            auctions.onLoad();
    });


     $(document).on('change','input[name="fuel_type[]"]', function () {
        let selected = [];
            $('input[name="fuel_type[]"]:checked').each(function () {
                selected.push($(this).val());
            });

            const url = new URL(window.location.href);
            url.searchParams.set('fuel_type', selected.toString());
            history.pushState({}, '', url);
            auctions.onLoad();
    });


     $(document).on('change','input[name="color[]"]', function () {
        let selected = [];
        $('input[name="color[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('color', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $(document).on('change','input[name="door[]"]', function () {
        let selected = [];
        $('input[name="door[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('door', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });

    $(document).on('change','input[name="seat[]"]', function () {
        let selected = [];
        $('input[name="seat[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('seat', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $(document).on('change','input[name="grade[]"]', function () {
        let selected = [];
        $('input[name="grade[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('grade', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });

    $(document).on('change','input[name="v5[]"]', function () {
        let selected = [];
        $('input[name="v5[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('v5', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $(document).on('change','input[name="cc[]"]', function () {
        let selected = [];
        $('input[name="cc[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('cc', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });

    $(document).on('change',`input[name="former_keeper[]"]`, function () {

        let selected = [];

        $('input[name="former_keeper[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('former_keeper', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $(document).on('change','input[name="no_of_service[]"]', function () {
        let selected = [];
        $('input[name="no_of_service[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('no_of_service', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $('#mileage_from, #mileage_to').change(function () {

        const url = new URL(window.location.href);
        url.searchParams.set('mileage_from', $('#mileage_from').val());
        url.searchParams.set('mileage_to', $('#mileage_to').val());
        history.pushState({}, '', url);
        auctions.onLoad();

    });


   
    auctions.getPlatforms();
    auctions.getVehicleTypes();
    auctions.getMakes();
    auctions.getModels();
    auctions.getVariants();
    auctions.getYears();
    auctions.getTransmissions();
    auctions.getFuelType();
    auctions.getBodyType();
    auctions.getColors();
    auctions.getDoors();
    auctions.getSeats();
    auctions.getGrade();
    auctions.getV5();
    auctions.getEngineSize();
    auctions.getFormerKeepers();
    auctions.getNoOfservices();
    // auctions.mileage();


    auctions.onLoad();

    
});
