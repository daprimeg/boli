    @extends('user.forgetPassword.layout')
    @section('css')
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
    color: #f8f9fa;
}

.bgcolor input.form-control {
    background-color: #2c2c3a;
    color: #ffffff;
    border: 1px solid #444;
}

.bgcolor input.form-control::placeholder {
    color: #ffffff;
}

.bgcolor .btn-primary {
    border-color: #082546;
}

.bgcolor .btn-primary:hover {
    background-color: #010b16ee;
    border-color: #3569ad;
    color: #3569ad;
}

</style>
    @endsection
    {{-- @section('images')
    <img src="{{ asset('/public/theme/assets/CarGroup.png') }}" alt="auth-forgot-password-cover" class="my-5 auth-illustration d-lg-block d-none" data-app-light-img="illustrations/auth-forgot-password-illustration-light.png" data-app-dark-img="illustrations/auth-forgot-password-illustration-dark.png" style="visibility: visible;">
    @endsection --}}

      @section('content')

<div class="d-flex col-12 col-xl-4 align-items-center p-sm-12 p-6 bgcolor">
    <div class="w-px-400 mx-auto mt-12 mt-5">
        <h4 class="mb-1">Forgot Password?</h4>
        <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
        <form id="resetPasswordForm" class="mb-6 fv-plugins-bootstrap5 fv-plugins-framework">
            @csrf
            <div class="mb-6 form-control-validation fv-plugins-icon-container">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email" 
                    required 
                    autofocus
                >
                <div class="invalid-feedback" id="emailError"></div>
            </div>
            <button type="submit" class="btn btn-primary d-grid w-100 waves-effect waves-light" style="background-color: #000f21ee">
                Send Reset Link
            </button>
        </form>

        <div class="text-center">
            <a href="{{ url("login") }}" class="d-flex justify-content-center"  style="color: #ffffff;">
                <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                Back to login
            </a>
        </div>
    </div>
</div>

     @endsection

     @section('js')
     <script>
    $(document).ready(function () {
        $('#resetPasswordForm').on('submit', function (e) {
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
                success: function (response) {
                    toastr.success("Reset link sent successfully!");
                    form.trigger('reset');
                },
                error: function (xhr) {
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