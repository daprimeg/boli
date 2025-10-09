
        <script src="{{ asset('public/themeadmin/assets/js/jquery.js')}}"></script>
        {{-- <script src="{{asset('public/themeadmin/assets/vendor/js/template-customizer.js')}}"></script> --}}
        <script src="{{ asset('public/themeadmin/assets/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/js/config.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/pickr/pickr.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/hammer/hammer.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/i18n/i18n.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/js/menu.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/vendor/libs/plyr/plyr.js') }}"></script>
        <script src="{{ asset('public/themeadmin/assets/js/main.js') }}"></script>
        <script src="public/themeadmin/assets/js/toastr.min.js"></script>
        {{-- <script src="{{ asset('public/themeadmin/assets/js/app-academy-course-details.js') }}"></script> --}}
         <script src="{{asset('public/themeadmin/assets/js/select2.js')}}"></script>
         <script src="{{asset('public/themeadmin/assets/js/jquertdatatable.js')}}"></script>
         <script>

            $(document).ready(function () {

                $('.make').select2({
                    placeholder: 'Select Make',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/makes/getMakes')}}",
                        dataType: 'json'
                    }
                });

                $('.model').select2({
                    placeholder: 'Select Model',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/models/getModels')}}",
                        dataType: 'json',
                    }
                });
                $('.vehicleTtypes').select2({
                    placeholder: 'Select Vehicle Type',
                    ajax: {
                        url: "{{url('/admin/masters/vehicletypes/getVehicleTypes')}}",
                        dataType: 'json',
                    }
                });
                $('.variants').select2({
                    placeholder: 'Select Variant',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/variants/getVariants')}}",
                        dataType: 'json',
                    }
                });
                $('.bodyTypes').select2({
                    placeholder: 'Body Type',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/bodytypes/getBodyTypes')}}",
                        dataType: 'json',
                    }
                });
                
             $('.platformhouse').select2({
                    placeholder: 'Select Auction House',
                    allowClear: true,
                    multiple: true,
                    ajax: {
                        url: "{{ url('/admin/masters/platforms/getPlatforms') }}",
                        dataType: 'json',
                       
                    }
                });
                $('.color').select2({
                    placeholder: 'Select Color',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/colours/getColours')}}",
                        dataType: 'json',
                    }
                });
                $('.auctions').select2({
                    placeholder: 'Select Auction',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/auctions/getAuction')}}",
                        dataType: 'json',
                    }
                });

                $('.center').select2({
                    placeholder: 'Select Center',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/centers/getCenters')}}",
                        dataType: 'json',
                    }
                });

                $('.platform').select2({
                    placeholder: 'Select Plateform',
                    allowClear: true,
                    ajax: {
                        url: "{{url('/admin/masters/platforms/getPlatforms')}}",
                        dataType: 'json',
                    }
                });

                $(".menu-button").click(function (e) { 
                    
                    if(!$('html').hasClass('layout-menu-collapsed')) {
                      $('html').addClass('layout-menu-collapsed');

                        //   $('.menu-button').css({
                        //     'color': 'white',
                        //     'background-color': 'blue',
                        //     'font-size': '16px'
                        //   });

                    }else{
                      $('html').removeClass('layout-menu-collapsed');

                        //   $('.menu-button').css({
                        //     'color': 'white',
                        //     'background-color': 'blue',
                        //     'font-size': '16px'
                        //   });
                    }             
                });


                
                                
            });
        document.addEventListener('DOMContentLoaded', function() {
            const themeButtons = document.querySelectorAll('[data-bs-theme-value]');
            const savedTheme = localStorage.getItem('site-theme');
            if (savedTheme) {
                setTheme(savedTheme);
            }
            themeButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const theme = this.getAttribute('data-bs-theme-value');
                    setTheme(theme);
                    localStorage.setItem('site-theme', theme); 
                });
            });

            function setTheme(theme) {
                document.documentElement.setAttribute('data-bs-theme', theme);
                themeButtons.forEach(btn => {
                    btn.classList.remove('active');
                    if (btn.getAttribute('data-bs-theme-value') === theme) {
                        btn.classList.add('active');
                    }
                });
            }
        });

        </script>