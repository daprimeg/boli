    @extends('web.partial.layout')
    @section('css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/fonts/iconify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/core.css') }}" />

        <!-- Page CSS -->
        <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/pages/page-auth.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <style>
            .layout-menu-fixed .layout-navbar-full .layout-menu,
            .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
                top: 0px !important;
            }

            .layout-page {
                padding-top: 0px !important;
            }

            .content-wrapper {
                padding-bottom: 0px !important;
            }

            .cover {
                background: linear-gradient(to right,
                        #010b16d8 40%,
                        #010b16 100%,
                        rgba(0, 0, 0, 0) 110%),
                      url("{{ asset('/public/theme/assets/largecar.jpg') }}");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

   

            .bgcolor {
                background-color: #000f21 !important;
                padding: 2rem;
                transition: background-color 0.3s ease;
            }

            .bgcolor h4,
            .bgcolor p,
            .bgcolor label,
            .bgcolor small {
                color: var(--dimtext) !important;
            }

            .bgcolor input.form-control {
                color: #ffffff;
                border: 1px solid var(--bs-b-color);
            }

            .bgcolor input.form-control::placeholder {
                color: #ffffff;
            }

            .bgcolor .btn-primary {
                border-color: var(--bs-primary);
                font-size: var(--font-p1)
            }

             .btn-primary:hover {
                /* background-color: #010b16ee; */
                /* border-color: #3569ad; */
                background-color: #0b5edbec!important;
            }



            .navbar {
                display: none;
            }

            footer {
                display: none;
            }
        </style>
    @endsection
    {{-- @section('images')
    <img src="{{ asset('/public/theme/assets/CarGroup.png') }}" alt="auth-forgot-password-cover" class="my-5 auth-illustration d-lg-block d-none" data-app-light-img="illustrations/auth-forgot-password-illustration-light.png" data-app-dark-img="illustrations/auth-forgot-password-illustration-dark.png" style="visibility: visible;">
    @endsection --}}

    @section('content')
        <div class="authentication-wrapper authentication-cover cover" style="height:100vh !important">
            <a href="index.html" class="app-brand auth-cover-brand">
                <span class="app-brand-logo demo mt-3">
                    <span class="text-primary">
                        <img src="{{ asset('public/themeadmin/images/logo/logo.png') }}" />
                    </span>
                </span>
            </a>



            <div class="authentication-inner row m-0">
                  <div class="d-none d-xl-flex col-xl-8 p-0">
                <div class="auth-cover-bg d-flex justify-content-center align-items-center">

                </div>
            </div>
                <div class="d-flex col-12 col-xl-4 align-items-center p-sm-12 p-6 bgcolor">
                    <div class="w-px-400 mx-auto mt-12 mt-5">
                        <h4 class="mb-1">Forgot Password?</h4>
                        <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
                        <form id="resetPasswordForm" class="mb-6 fv-plugins-bootstrap5 fv-plugins-framework">
                            @csrf
                            <div class="mb-6 form-control-validation fv-plugins-icon-container">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required autofocus>
                                <div class="invalid-feedback" id="emailError"></div>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100 waves-effect waves-light"
                                style=" box-shadow: none;">
                                Send Reset Link
                            </button>
                        </form>

                        <div class="text-center">
                            <a href="{{ url('login') }}" class="d-flex justify-content-center" style="color: #ffffff;">
                                <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>

            </div>
          </div>

        @endsection

        @section('js')
            <script>
                $(document).ready(function() {
                    $('#resetPasswordForm').on('submit', function(e) {
                        e.preventDefault();

                        let form = $(this);
                        let email = $('#email').val();
                        let token = $('input[name="_token"]').val();

                        // Clear old errors
                        $('#emailError').text('');
                        $('#email').removeClass('is-invalid');

                        $.ajax({
                            url: "{{ route('password.email') }}",
                            method: 'POST',
                            data: {
                                _token: token,
                                email: email
                            },
                            success: function(response) {
                                toastr.success("Reset link sent successfully!");
                                form.trigger('reset');
                            },
                            error: function(xhr) {
                                if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;
                                    if (errors.email) {
                                        $('#emailError').text(errors.email[0]);
                                        $('#email').addClass('is-invalid');
                                        toastr.error(errors.email[0]);
                                    }
                                } else {
                                    toastr.error("Something went wrong.");
                                }
                            }
                        });
                    });
                });
            </script>
        @endsection
