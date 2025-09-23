    @extends('web.partial.layout')
    @section('css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/fonts/iconify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/core.css') }}" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/themeadmin/assets/vendor/css/pages/page-auth.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <style>
            .bgcolor {
                background-color: #000f21 !important;
                color: #f1f1f1;
                padding: 2rem;
                transition: background-color 0.3s ease;
            }

            .bgcolor h4,
            .bgcolor p,
            .bgcolor label,
            .bgcolor small {
                color: var(--dimtext);
            }



            .bgcolor input.form-control::placeholder {
                color: #ffffff;
            }

            .bgcolor .btn-primary {
                border-color: var(--bs-primary);
                 font-size: var(--font-p1);
            }

             .btn-primary:hover {
                /* background-color: #010b16ee; */
                /* border-color: #3569ad; */
                background-color: #0b5edbec!important;
            }



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

            #toast-container>.toast-success {
                background-color: #53a6ff !important;
                color: #000000 !important;
            }

            .navbar {
                display: none;
            }

            footer {
                display: none;
            }
        </style>
    @endsection




    <div class="authentication-wrapper authentication-cover cover">
        <a href="index.html" class="app-brand auth-cover-brand">
            <span class="app-brand-logo demo">
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
                <div class="w-px-400 mx-auto mt-12 pt-5">
                    <h4 class="mb-1">Reset Password </h4>
                    <p class="mb-6"><span>Your new password must be different from previously used
                            passwords</span></p>
                    <form class="mb-6 fv-plugins-bootstrap5 fv-plugins-framework" id="resetPasswordForm">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4 form-password-toggle">
                            <label style="font-size:var(--font-p1)" class="form-label " for="password">New
                                Password</label>
                            <div class="input-group input-group-merge" style="border: 1px solid var(--bs-b-color)">
                                <input  type="password" id="password" name="password" class="form-control"
                                    placeholder="············" style="background-color: #000f21; color: white;border: none">
                                <span class="input-group-text cursor-pointer toggle-password" data-target="password"
                                    style="border: none">
                                    <i style="color: var(--dimtext)" class="icon-base ti tabler-eye-off "></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" id="passwordError" style="display: none;"></div>
                        </div>

                        <div class="mb-4 form-password-toggle">
                            <label style="font-size:var(--font-p1)" class="form-label "
                                for="password_confirmation">Confirm Password</label>
                            <div class="input-group input-group-merge" style="border: 1px solid var(--bs-b-color)">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control border-1" placeholder="············"
                                    style=" color: white;border: none">
                                <span class="input-group-text cursor-pointer toggle-password"
                                    data-target="password_confirmation"
                                    style="border-left: 0;border: none">
                                    <i style="color: var(--dimtext)" class="icon-base ti tabler-eye-off "></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" id="confirmError" style="display: none;"></div>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100 waves-effect waves-light">Set new password</button>
                    </form>
                    <div class="text-center">
                        <a href="{{ url('login') }}" class="d-flex justify-content-center" style="color: #ffffff;">
                            <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                            Back to login
                        </a>
                    </div>
                    <input type="hidden"></form>
                </div>
            </div>

        </div>
    </div>



    @section('content')
    @endsection

    @section('js')
        <script>
            $(document).ready(function() {
                $('#resetPasswordForm').on('submit', function(e) {
                    e.preventDefault();

                    let form = $(this);
                    let token = $('input[name="token"]').val();
                    let email = $('input[name="email"]').val();
                    let password = $('#password').val();
                    let confirmPassword = $('#password_confirmation').val();
                    let csrf = $('input[name="_token"]').val();

                    $('#passwordError, #confirmError').text('').hide();
                    $('#password, #password_confirmation').removeClass('is-invalid');

                    $.ajax({
                        url: "{{ route('reset.password.submit') }}",
                        type: 'POST',
                        data: {
                            _token: csrf,
                            token: token,
                            email: email,
                            password: password,
                            password_confirmation: confirmPassword
                        },
                        success: function(response) {
                            toastr.success('Password has been reset successfully!');
                            form.trigger('reset');
                            setTimeout(() => {
                                window.location.href = "{{ url('/login') }}";
                            }, 1500);
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                if (errors.password) {
                                    $('#password').addClass('is-invalid');
                                    $('#passwordError').text(errors.password[0]).show();
                                    toastr.error(errors.password[0]);
                                }
                                if (errors.password_confirmation) {
                                    $('#password_confirmation').addClass('is-invalid');
                                    $('#confirmError').text(errors.password_confirmation[0]).show();
                                    toastr.error(errors.password_confirmation[0]);
                                }
                            } else {
                                toastr.error('Something went wrong. Please try again.');
                            }
                        }
                    });
                });
            });


            $(document).on('click', '.toggle-password', function() {
                let targetId = $(this).data('target');
                let input = $('#' + targetId);
                let icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('tabler-eye-off').addClass('tabler-eye');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('tabler-eye').addClass('tabler-eye-off');
                }
            });
        </script>
    @endsection
