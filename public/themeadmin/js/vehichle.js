
    const auctions = {
        selected:{
            type:[],
            body:[],
            color:[],
            make:[],
            model:[],
            vairant:[],
        },
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
        
        // $(".params").text('');
        // Object.entries(auctions.filters).forEach(([key, value]) => {
        //     if(value){
        //        $('.params').append(`<span class="badge mx-2" >${key}:${value} X</span>`);
        //     }
        // });

        auctions.searchrecord();
        auctions.renderActiveTags();

    }


    auctions.renderActiveTags = function(){  

            $(`.tags`).html('');

            $(`.tags-make`).html('');
            Object.entries(auctions.selected.make).forEach(([key, value]) => {
                 $(`.tags-make`).append(`<span data-key="make" data-value="${value.id}" class="badge mx-2">${value.title}X</span>`);   
            });

            $(`.tags-model`).html('');
            if(auctions.selected.model){
                Object.entries(auctions.selected.model).forEach(([key, value]) => {         
                    $(`.tags-model`).append(`<span data-key="model" data-value="${value.id}" class="badge mx-2">${value.title}X</span>`);   
                });
            }

            $(`.tags-variant`).html('');
            if(auctions.selected.variant){
                Object.entries(auctions.selected.variant).forEach(([key, value]) => {           
                    $(`.tags-variant`).append(`<span data-key="variant" data-value="${value.id}" class="badge mx-2">${value.title}X</span>`);   
                });
            }

            $(`.tags-body`).html('');
            Object.entries(auctions.selected.body).forEach(([key, value]) => {
                 $(`.tags-body`).append(`<span data-key="body" data-value="${value.id}" class="badge mx-2">${value.title}X</span>`);   
            });

            $(`.tags-type`).html('');
            Object.entries(auctions.selected.type).forEach(([key, value]) => {
                 $(`.tags-type`).append(`<span data-key="type" data-value="${value.id}" class="badge mx-2">${value.title}X</span>`);   
            });

            $(`.tags-color`).html('');
            Object.entries(auctions.selected.color).forEach(([key, value]) => {
                 $(`.tags-color`).append(`<span data-key="color" data-value="${value.id}" class="badge mx-2">${value.title}X</span>`);   
            });


            //Filters

            $(`.tags-year`).html('');
            if(auctions.filters.year){
                auctions.filters.year.split(',').forEach((value) => {
                    $(`.tags-year`).append(`<span data-key="year" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            $(`.tags-fuel_type`).html('');
            if(auctions.filters.fuel_type){
                auctions.filters.fuel_type.split(',').forEach((value) => {
                    $(`.tags-fuel_type`).append(`<span data-key="fuel_type" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            $(`.tags-transmission`).html('');
            if(auctions.filters.transmission){
                auctions.filters.transmission.split(',').forEach((value) => {
                    $(`.tags-transmission`).append(`<span data-key="transmission" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            $(`.tags-door`).html('');
            if(auctions.filters.door){
                auctions.filters.door.split(',').forEach((value) => {
                    $(`.tags-door`).append(`<span data-key="door" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            $(`.tags-seat`).html('');
            if(auctions.filters.seat){
                auctions.filters.seat.split(',').forEach((value) => {
                    $(`.tags-seat`).append(`<span data-key="seat" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            $(`.tags-grade`).html('');
            if(auctions.filters.grade){
                auctions.filters.grade.split(',').forEach((value) => {
                    $(`.tags-grade`).append(`<span data-key="grade" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            $(`.tags-v5`).html('');
            if(auctions.filters.v5){
                auctions.filters.v5.split(',').forEach((value) => {
                    $(`.tags-v5`).append(`<span data-key="v5" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            $(`.tags-cc`).html('');
            if(auctions.filters.cc){
                auctions.filters.cc.split(',').forEach((value) => {
                    $(`.tags-cc`).append(`<span data-key="cc" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }


            $(`.tags-former_keeper`).html('');
            if(auctions.filters.former_keeper){
                auctions.filters.former_keeper.split(',').forEach((value) => {
                    $(`.tags-former_keeper`).append(`<span data-key="former_keeper" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }


            $(`.tags-no_of_service`).html('');
            if(auctions.filters.no_of_service){
                auctions.filters.no_of_service.split(',').forEach((value) => {
                    $(`.tags-no_of_service`).append(`<span data-key="no_of_service" data-value="${value}" class="badge mx-2">${value}X</span>`);
                });
            }

            if(auctions.filters.mileage_from){
              $('.tags-mileage_range').html(`<span class="badge mx-2">${auctions.filters.mileage_from} - ${auctions.filters.mileage_to}</span>`);
            }

            if(auctions.filters.mileage_to){
              $('.tags-mileage_range').html(`<span class="badge mx-2">${auctions.filters.mileage_from} - ${auctions.filters.mileage_to}</span>`);
            }

        $(`.tags-auction_house`).html('');
        console.log(auctions.filters);
        if (auctions.selected.auction_house && auctions.selected.auction_house.length) {
            auctions.selected.auction_house.forEach((item) => {
                $(`.tags-auction_house`).append(
                    `<span data-key="auction_house" data-value="${item.id}" class="badge mx-2">${item.label}X</span>`
                );
            });
        }

 

    }

    


    auctions.showHeadings = function(){  

    if (auctions.filters.display_type == 'auction') {
            $('table thead').html(`
                <tr>
                    <th>Vehicle</th>
                    <th>Year / CC</th>
                    <th>Mileage</th>
                    <th>Transmission</th>
                    <th>Grade</th>
                    <th>Date Time</th>
                    <th>Auction House</th>
                </tr>
            `);
        } else if (auctions.filters.display_type == 'car') {
            $('table thead').html(`
                <tr>
                    <th>Vehicle</th>
                    <th>Grade</th>
                    <th>CAP</th>
                    <th>Autotrader</th>
                    <th>Retail</th>
 
                    <th>Date Time</th>
                    <th>Autoboli</th>
                </tr>
            `);
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

                                    let image1 = element.image1 ? `<span><img class="lightbox-img" src="${element.image1}" /> </span>` : '';
                                    let image2 = element.image2 ? `<span><img class="lightbox-img" src="${element.image2}" /> </span>` : '';
                                    let image3 = element.image2 ? `<span><img class="lightbox-img" src="${element.image3}" /> </span>` : '';
                                    // let platformIcon = element.platefrom_image ? `<img src="https://localhost/autoboli/public/uploads/platforms/${element.platefrom_image}" class="platform-icon" />` : '';


                                if(auctions.filters.display_type == 'auction'){

                            

                                    $(`.table tbody`).append(`<tr>
                                         
                                            <td>
                                                <a href="${baseUrl}/${element.id}" target="_blank">
                                                    ${element.make_name} ${element.model_name} ${element.variant_name}
                                                    </a>
                                                    <div class="extra">
                                                    ${image1} ${image2} ${image3}
                                                    </div>
                                                </td>

                                            <td>${element.year} / ${element.cc}
                                            <div class="extra">
                                                Color
                                                    <span class="color-box" style="background-color: ${element.color};" title="${element.color}"></span>
                                                </div>
                                            </td>
                                         
                                            <td>${element.mileage}</td>
                                            <td>${element.transmission}</td>
                                           <td>
                                            <div class="grade-box" style="background-color: ${getGradeColor(element.grade)};color:black;">
                                                ${element.grade}
                                            </div>
                                            </td>
                                           <td> ${element.auction_date} </br> ${element.auction_time}

                                               ${element.previousdate 
                                                    ? `<div class="extra">
                                                        <span class="prev-icon">⏮️</span> ${element.previousdate}
                                                    </div>` 
                                                    : ''
                                                }

                                           
                                           </td>
                                            <td> <span class="auction-badge"> ${element.auction_name}</span>
                                            <div class="extra">
                                                <a class="btn btn-primary report-link mt-2" target="_blank" href="${element.inspection_report}">View Report</a>
                                            </div>
                                            </td>
                                          
                                        </tr>`);

                                }else{

                                    $(`.table tbody`).append(`
                                    <tr>
                                   
                                        <td> <a href="${baseUrl}/${element.id}" target="_blank">
                                                    ${element.make_name} ${element.model_name} ${element.variant_name}
                                                    </a>
                                                    <div class="extra">
                                                    ${image1} ${image2} ${image3}
                                                    </div>
                                        </td>
                                         <td>
                                            <div class="grade-box" style="background-color: ${getGradeColor(element.grade)};color:black;">
                                                ${element.grade}
                                               
                                            </div>
                                              <div class="extra">
                                                ${element.auction_name}
                                                    </div>
                                            </td>
                                        <td>${element.cap_clean}</td>
                                        <td>${element.autotrader_trade_value}</td>
                                        <td>${element.autotrader_retail_value}</td>
                                      
                                      
                                      <td> ${element.auction_date} </br> ${element.auction_time}

                                               ${element.previousdate 
                                                    ? `<div class="extra">
                                                        <span class="prev-icon">⏮️</span> ${element.previousdate}
                                                    </div>` 
                                                    : ''
                                                }

                                           
                                           </td>
                                          <td> <span class="auction-badge"> ${element.auto_boli}</span>
                                            <div class="extra">
                                                <a class="btn btn-primary report-link mt-2" target="_blank" href="${element.inspection_report}">View Report</a>
                                            </div>
                                            </td>
                                    </tr>`);

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

        auctions.selected.type = [];

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
                            auctions.selected.type.push({id:element.id,title:element.label}); 
                        }
                    }

                    $("#collapseVehicleType").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} data-name="${element.label}" class="form-check-input me-1" type="checkbox" name="type[]" value="${element.id}" id="type_${element.id}">
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
                auctions.selected.type = []
            },
         });

    }




    auctions.getMakes = function  () {      

         auctions.selected.make = [];

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
                            auctions.selected.make.push({id:element.id,title:element.label});                           
                        }
                    }

                    $("#collapseVehiclemake").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} data-name="${element.label}" class="form-check-input me-1" type="checkbox" name="make[]" value="${element.id}" id="make_${element.id}">
                                <label class="form-check-label" for="make_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            
                   auctions.getModels();
            },
            error: function (response) {
                $("#collapseVehiclemake").html('');
                  auctions.selected.make = [];
            },
         });

    }




    auctions.getModels = function () {      
        
        auctions.selected.model = []; 
         $.ajax({
            url: url+"/auction-finder/data/getModels?make_id="+auctions.filters.make,
            method: "GET",
            success: function (response) {
                
                $("#collapseVehiclemodel").html('');

              

                for(const key in response.data) {
                    if(Object.prototype.hasOwnProperty.call(response.data, key)) {
                        const data = response.data[key];

                            $("#collapseVehiclemodel").append(`
                                <div class="accordion-body" style="border-bottom: 1px solid #323232;padding: 5px 10px;margin-bottom: 8px;">
                                    <div class="text-left">
                                    ${key}
                                    </div>
                                </div>
                            `);


                          data.forEach(element => {

                                let selected = '';
                                if(auctions.filters.model){
                                    let model = auctions.filters.model.split(',');
                                    if(model.includes(String(element.id))) {
                                        selected = 'checked';
                                        auctions.selected.model.push({id:element.id,title:element.label}); 
                                    }
                                }

                                $("#collapseVehiclemodel").append(`
                                <div class="accordion-body py-1">
                                    <div class="form-check d-flex justify-content-between align-items-center">
                                        <div>
                                            <input ${selected} data-name="${element.label}" class="form-check-input me-1" type="checkbox" name="model[]" value="${element.id}" id="model_${element.id}">
                                            <label class="form-check-label" for="model_${element.id}">${element.label}</label>
                                        </div>
                                        <span class="badge bg-light text-muted">${element.count}</span>
                                    </div>
                                </div>`);
                          });

                    }

                }
                
                auctions.getVariants();

            },
            error: function (response) {
                $("#collapseVehiclemodel").html('');
                auctions.selected.model = []; 
            },
         });

    }



    auctions.getVariants = function  () {      

        auctions.selected.variant = [];

         $.ajax({
            url: url+"/auction-finder/data/getVariants?model_id="+auctions.filters.model,
            method: "GET",
            success: function (response) {
                

                $("#collapseVehiclevariant").html('');

                    for(const key in response.data) {
                    if(Object.prototype.hasOwnProperty.call(response.data, key)) {
                        const data = response.data[key];

                             $("#collapseVehiclevariant").append(`
                                <div class="accordion-body" style="border-bottom: 1px solid #323232;padding: 5px 10px;margin-bottom: 8px;">
                                    <div class="text-left">
                                    ${key}
                                    </div>
                                </div>
                            `);

                            data.forEach(element => {


                                let selected = '';
                                if(auctions.filters.variant){
                                    let variant = auctions.filters.variant.split(',');
                                    if(variant.includes(String(element.id))) {
                                        selected = 'checked';
                                        auctions.selected.variant.push({id:element.id,title:element.label}); 
                                        
                                    }
                                }

                                $("#collapseVehiclevariant").append(`
                                <div class="accordion-body py-1">
                                    <div class="form-check d-flex justify-content-between align-items-center">
                                        <div>
                                            <input ${selected} data-name="${element.label}" class="form-check-input me-1" type="checkbox" name="variant[]" value="${element.id}" id="variant_${element.id}">
                                            <label class="form-check-label" for="variant_${element.id}">${element.label}</label>
                                        </div>
                                        <span class="badge bg-light text-muted">${element.count}</span>
                                    </div>
                                </div>`);
                            });
                            
                    }
                }

                auctions.onLoad();

            },
            error: function (response) {
                $("#collapseVehiclevariant").html('');
                auctions.selected.variant = [];
            },
         });

    }



    auctions.getYears = function () {      

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

    


    auctions.getFuelType = function () {      

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
                                <input ${selected}  class="form-check-input me-1" type="checkbox" name="fuel_type[]" value="${element.label}" id="fuel_type_${element.label}">
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

        auctions.selected.body = []; 

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
                            auctions.selected.body.push({id:element.id,title:element.label}); 

                        }
                    }

                    $("#collapseVehiclebody").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} data-name="${element.label}" class="form-check-input me-1" type="checkbox" name="body[]" value="${element.id}" id="body_${element.id}">
                                <label class="form-check-label" for="body_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);

                });

            },
            error: function (response) {
                $("#collapseVehiclebody").html('');
                auctions.selected.body = [];

            },
         });

    }



    auctions.getColors = function  () {      

        auctions.selected.color = [];

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
                            auctions.selected.color.push({id:element.id,title:element.label}); 
                        }
                    }

                    $("#collapseVehiclecolor").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} data-name="${element.label}" class="form-check-input me-1" type="checkbox" name="color[]" value="${element.id}" id="color_${element.id}">
                                <label class="form-check-label" for="color_${element.id}">${element.label}</label>
                            </div>
                            <span class="badge bg-light text-muted">${element.count}</span>
                        </div>
                    </div>`);
                });

            },
            error: function (response) {
                $("#collapseVehiclecolor").html('');
                auctions.selected.color = [];
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




    auctions.getEngineSize = function () {      

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


    auctions.getFormerKeepers = function () {      

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


    auctions.getNoOfservices = function () {      

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

auctions.getAuctionHouse = function () {      
    $.ajax({
        url: url + "/auction-finder/data/getAuctionHouse",
        method: "GET",
        success: function (response) {
            $("#collapseAuctionHouse").html('');
            response.data.forEach(element => {
                 let selected = '';
                    if(auctions.filters.no_of_service){
                        let no_of_service = auctions.filters.no_of_service.split(',');
                        if(no_of_service.includes(String(element.label))) {
                            selected = 'checked';
                        }
                    }

                $("#collapseAuctionHouse").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" 
                                    type="checkbox" 
                                    name="auction_house[]" 
                                    value="${element.id}" 
                                    id="auction_house_${element.id}">
                                <label class="form-check-label" for="auction_house_${element.id}">
                                    ${element.label}
                                </label>
                            </div>
                            <span class="badge bg-light text-muted">${element.vehicle_count}</span>
                        </div>
                    </div>
                `);
            });
        },
        error: function () {
            $("#collapseAuctionHouse").html('');
        },
    });
}

auctions.getAuctionCenter = function () {      
    $.ajax({
        url: url + "/auction-finder/data/getAuctionCenter",
        method: "GET",
        success: function (response) {
            $("#collapseAuctionCenter").html('');
            response.data.forEach(element => {
                let selected = '';
                if (Array.isArray(auctions.filters.auction_center) && auctions.filters.auction_center.includes(String(element.id))) {
                    selected = 'checked';
                }

                $("#collapseAuctionCenter").append(`
                    <div class="accordion-body py-1">
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <div>
                                <input ${selected} class="form-check-input me-1" 
                                    type="checkbox" 
                                    name="auction_center[]" 
                                    value="${element.id}" 
                                    id="auction_center_${element.id}">
                                <label class="form-check-label" for="auction_center_${element.id}">
                                    ${element.label}
                                </label>
                            </div>
                            <span class="badge bg-light text-muted">${element.vehicle_count}</span>
                        </div>
                    </div>
                `);
            });
        },
        error: function () {
            $("#collapseAuctionCenter").html('');
        },
    });
}


    
    $(document).on('click','.my_btn', function () {

        let element = $(this).parent().parent();
        
        if(element.hasClass('showing')) {
                
              element.removeClass('showing');
        }else{
              element.addClass('showing');
        }   
        
        // alert('asd');
        // $('.extra').hide();
    });


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


    // $('.display_type').click(function (e) { 

    //     const url = new URL(window.location.href);
    //     url.searchParams.set('display_type', $(this).data('id'));
    //     history.pushState({}, '', url);
    //     $('.display_type').removeClass('active');
    //     $(this).addClass('active');

    //     auctions.showHeadings();
    //     auctions.onLoad();
    // });

// ✅ Click pe handle karna
$('.display_type').click(function (e) { 
    const type = $(this).data('id');
    const url = new URL(window.location.href);
    url.searchParams.set('display_type', type);
    history.pushState({}, '', url);
    $('.display_type').removeClass('active');
    $(this).addClass('active');
    auctions.filters.display_type = type;
    auctions.showHeadings();
    auctions.onLoad();
});


$(document).ready(function() {
    const url = new URL(window.location.href);
    const currentType = url.searchParams.get('display_type') || 'auction'; 
    $('.display_type').removeClass('active');
    $(`.display_type[data-id="${currentType}"]`).addClass('active');
    auctions.filters = auctions.filters || {};
    auctions.filters.display_type = currentType;
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

        auctions.selected.type = [];
        let selected = [];
        $('input[name="type[]"]:checked').each(function () {
            selected.push($(this).val());
            auctions.selected.type.push({
                id:$(this).val(),
                title:$(this).data('name')
            })
        });

        const url = new URL(window.location.href);
        url.searchParams.set('type', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();

    });


    $(document).on('change','input[name="body[]"]', function () {

           auctions.selected.body = [];
           let selected = [];
            $('input[name="body[]"]:checked').each(function () {
                selected.push($(this).val());
                auctions.selected.body.push({
                    id:$(this).val(),
                    title:$(this).data('name')
                })
            });
            const url = new URL(window.location.href);
            url.searchParams.set('body', selected.toString());
            history.pushState({}, '', url);
            auctions.onLoad();
    });



    $(document).on('change','input[name="make[]"]', function () {


            auctions.selected.make = [];
            let selected = [];
            $('input[name="make[]"]:checked').each(function () {
                selected.push($(this).val());
                auctions.selected.make.push({
                    id:$(this).val(),
                    title:$(this).data('name')
                });
            });

            const url = new URL(window.location.href);
            url.searchParams.set('make', selected.toString());

            url.searchParams.set('model','');
            auctions.selected.model = [];
            url.searchParams.set('variant','');
            auctions.selected.variant = [];
            history.pushState({}, '', url);
            auctions.onLoad();
    
            auctions.getModels();

    });


    $(document).on('change','input[name="model[]"]', function () {
            
            auctions.selected.model = [];
            let selected = [];
            $('input[name="model[]"]:checked').each(function () {
                 selected.push($(this).val());
                 auctions.selected.model.push({
                    id:$(this).val(),
                    title:$(this).data('name')
                 })
            });

            const url = new URL(window.location.href);
            url.searchParams.set('model',selected.toString());
            
            url.searchParams.set('variant','');
            auctions.selected.variant = [];

            history.pushState({},'',url);
            auctions.onLoad();

            auctions.getVariants();
    });

    
    $(document).on('change','input[name="variant[]"]', function () {
            let selected = [];
             auctions.selected.variant = [];
            $('input[name="variant[]"]:checked').each(function () {
                selected.push($(this).val());
                 auctions.selected.variant.push({
                    id:$(this).val(),
                    title:$(this).data('name')
                 });
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

    $(document).on('change', 'input[name="auction_house[]"]', function () {
        let selected = [];
        $('input[name="auction_house[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('auction_house', selected.toString());
        history.pushState({}, '', url);
        auctions.onLoad();
    });


    $(document).on('change', 'input[name="auction_center[]"]', function () {
        let selected = [];
        $('input[name="auction_center[]"]:checked').each(function () {
            selected.push($(this).val());
        });

        const url = new URL(window.location.href);
        url.searchParams.set('auction_center', selected.toString());
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
        auctions.selected.color = [];
        $('input[name="color[]"]:checked').each(function () {
            selected.push($(this).val());
            auctions.selected.color.push({
              id:$(this).val(),
              title:$(this).data('name'),
            });
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


     $(document).on('click','.tags span', function () {

            let key = $(this).data('key');
            let value = $(this).data('value');

            switch (key) {

                case 'type':
                    $("#collapseVehicleType").find(`input[value="${value}"]`).trigger('click');
                    break;
                case 'make':
                   $("#collapseVehiclemake").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'model':
                   $("#collapseVehiclemodel").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'variant':
                   $("#collapseVehiclevariant").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'year':
                   $("#collapseVehicleyear").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'transmission':
                   $("#collapseTransmission").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'fuel_type':
                   $("#collapsefuel").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'body':
                   $("#collapseVehiclebody").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'color':
                   $("#collapseVehiclecolor").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'door':
                   $("#collapsedoor").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'seat':
                   $("#collapseseats").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'grade':
                   $("#collapsegrade").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'v5':
                   $("#collapsev5").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'cc':
                    
                   $("#collapsecc").find(`input[value="${value}"]`).trigger('click');
                break;
                case 'former_keeper':
                    
                   $("#collapseformer_keepers").find(`input[value="${value}"]`).trigger('click');
                break;

                case 'no_of_service':
                   $("#collapsenumber_of_services").find(`input[value="${value}"]`).trigger('click');
                break;

                case 'auction_house':
                    $("#collapseAuctionHouse").find(`input[value="${value}"]`).trigger('click');
                    break;
                case 'auction_center':
                    $("#collapseAuctionCenter").find(`input[value="${value}"]`).trigger('click');
                    break;
            
                default:

                break;

            }


         


            // let current = auctions.filters[key];
            // if (current) {
            //     let valuesArray = current.split(',').filter(v => v != value);
            //     if (valuesArray.length) {
            //         auctions.filters[key] = valuesArray.join(',');
            //     } else {
            //         delete auctions.filters[key]; // remove whole key if empty
            //     }
            // }

            // // Optionally update the URL
            // const url = new URL(window.location.href);
            // if (auctions.filters[key]) {
            //     url.searchParams.set(key, auctions.filters[key]);
            // } else {
            //     url.searchParams.delete(key);
            // }
            // history.pushState({}, '', url);

            // // Reload data
            // auctions.onLoad();

       
    });



    $('#mileage_from, #mileage_to').change(function () {

        const url = new URL(window.location.href);
        url.searchParams.set('mileage_from', $('#mileage_from').val());
        url.searchParams.set('mileage_to', $('#mileage_to').val());
        history.pushState({}, '', url);
        auctions.onLoad();

    });



 $(document).ready(function () {
   
    auctions.getPlatforms();
    auctions.getVehicleTypes();   
    auctions.getMakes();
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
    auctions.getAuctionHouse();
    auctions.getAuctionCenter();
    // auctions.mileage();


    auctions.onLoad();
    auctions.showHeadings();

    
});

function getGradeColor(grade) {
  switch (parseInt(grade)) {
    case 1: return '#4CAF50'; 
    case 2: return '#8BC34A'; 
    case 3: return '#CDDC39'; 
    case 4: return '#FFC107';
    case 5: return '#FF5722'; 
    default: return '#cccccc';
  }
}




