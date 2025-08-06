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
    @section('images')
    <img src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/illustrations/auth-reset-password-illustration-light.png" alt="auth-reset-password-cover" class="my-5 auth-illustration" data-app-light-img="illustrations/auth-reset-password-illustration-light.png" data-app-dark-img="illustrations/auth-reset-password-illustration-dark.png" style="visibility: visible;">
    <img src="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/illustrations/bg-shape-image-light.png" alt="auth-reset-password-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png" style="visibility: visible;">
    @endsection

    @section('content')

<div class="d-flex col-12 col-xl-4 align-items-center p-sm-12 p-6 bgcolor">
     <div class="w-px-400 mx-auto mt-12 pt-5">
          <h4 class="mb-1">Reset Password 🔒</h4>
          <p class="mb-6"><span class="fw-medium">Your new password must be different from previously used passwords</span></p>
          <form class="mb-6 fv-plugins-bootstrap5 fv-plugins-framework" id="resetPasswordForm">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

           <div class="mb-4 form-password-toggle">
              <label class="form-label text-white" for="password">New Password</label>
              <div class="input-group input-group-merge">
                  <input 
                      type="password" 
                      id="password" 
                      name="password" 
                      class="form-control border-1" 
                      placeholder="············"
                      style="background-color: #000f21; color: white;"
                  >
                  <span class="input-group-text cursor-pointer toggle-password" data-target="password" style="background-color: #000f21; border-left: 0;">
                      <i class="icon-base ti tabler-eye-off text-white"></i>
                  </span>
              </div>
              <div class="invalid-feedback" id="passwordError" style="display: none;"></div>
          </div>

          <div class="mb-4 form-password-toggle">
              <label class="form-label text-white" for="password_confirmation">Confirm Password</label>
              <div class="input-group input-group-merge">
                  <input 
                      type="password" 
                      id="password_confirmation" 
                      name="password_confirmation" 
                      class="form-control border-1" 
                      placeholder="············"
                      style="background-color: #000f21; color: white;"
                  >
                  <span class="input-group-text cursor-pointer toggle-password" data-target="password_confirmation" style="background-color: #000f21; border-left: 0;">
                      <i class="icon-base ti tabler-eye-off text-white"></i>
                  </span>
              </div>
              <div class="invalid-feedback" id="confirmError" style="display: none;"></div>
          </div>

            <button type="submit" class="btn btn-primary d-grid w-100 waves-effect waves-light" style="background-color: #000f21ee">Set new password</button>
          </form>
            <div class="text-center">
            <a href="{{ url("login") }}" class="d-flex justify-content-center"  style="color: #ffffff;">
                <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                Back to login
            </a>
        </div>
          <input type="hidden"></form>
        </div>
</div>

     @endsection

     @section('js')
     <script>
   $(document).ready(function () {
    $('#resetPasswordForm').on('submit', function (e) {
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
            success: function (response) {
                toastr.success('Password has been reset successfully!');
                form.trigger('reset');
                setTimeout(() => {
                    window.location.href = "{{ url('/login') }}";
                }, 1500);
            },
            error: function (xhr) {
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


$(document).on('click', '.toggle-password', function () {
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


