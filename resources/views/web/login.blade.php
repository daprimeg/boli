@extends('web.partial.layout')

@section('css')

<style>

      body {
      background: linear-gradient(
          to right,
          var(--background-color) 40%,
           var(--background-color) 30%,
          rgba(0, 0, 0, 0) 110%
        ),
        url("{{asset('/public/theme/assets/CarGroup.png')}}");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    .login-btn {
      color: var(--white-text) !important;
      background-color: var(--items-background) !important;
      outline: none !important;
      border: 1px solid var(--items-border-colur) !important;
      border-radius: 8px;
    }
    .form-wrapper {
      position: relative;
      padding-left: 1.5rem;
      padding-right: 1.5rem;
      text-align: center !important;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-wrapper::before,
    .form-wrapper::after {
      content: "";
      position: absolute;
      top: 12px;
      bottom: 0;
      height: 2px;
      width:calc(40% - 4rem);;

      background-color: var(--items-border-colur);
    }

    .form-wrapper::before {
      left: 40px;
    }

    .form-wrapper::after {
      right: 40px;
    }
    .login-input {
      display: flex;
      justify-content: center;
      margin: auto;
      width: 95%;
    }
    .form-check-input:checked {
      background-color: transparent;
      cursor: pointer;
      color: var(--text-color) !important;
      border-color: var(--text-color);
    }


</style>
@endsection

@section('content')

    <div class="text-white d-flex flex-column" >
        <div class="container">
            <div class="row my-5">
                <div class="col-12 col-md-8 col-lg-6">
                <div class="text-start mb-5 ps-4 text-center">
                    <h1 class="display-5 fw-bold mb-3">
                    Sign in to <span style="color: var(--text-color)">AUTOBILI</span>
                    </h1>
                    <p class="text-muted">Send, spend and save smarter</p>
                </div>

                  @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif

                <div class="px-4 mb-4 d-flex col-md-12">
                    <button class="w-100 py-3 mx-3 login-btn">
                    <i class="fab fa-google me-2"></i> Sign In with Google
                    </button>
                    <button class="w-100 py-3l login-btn">
                    <i class="fab fa-apple me-2"></i> Sign In with Apple
                    </button>
                </div>
                <div class="text-start px-4 mb-4 form-wrapper">Or continue with</div>

                <form class="px-4" action="{{ url('/login_submit') }}" method="POST">
                     @csrf
                    <div class="mb-3">
                    <input
                        type="email"
                        name="email"
                        value="{{old('email')}}"
                        class="login-btn text-white py-3 login-input px-2"
                        placeholder="Username or email"
                        style="border-radius: 8px"
                    />
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="mb-3 position-relative">
                    <input
                        type="password"
                        name="password"
                        value=""
                        class="login-btn text-white py-3 login-input px-2"
                        placeholder="Password"
                        id="passwordField"
                        style="border-radius: 8px"
                    />
                    
                    <button
                        type="button"
                        class="position-absolute top-50 translate-middle-y me-2 text-muted border-0 bg-transparent"
                        style="left: 92%"
                        onclick="togglePassword()"
                    >
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </button>

                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4 mx-3">
                    <div class="form-check">
                        <input class="form-check-input custom-checkbox" type="checkbox" id="rememberMe"/>
                        <label class="form-check-label text-white " for="rememberMe" style="cursor: pointer;">Remember me</label>
                    </div>
                    <a
                        href="{{ url("forgot-password") }}"
                        class="text-decoration-none"
                        style="color: var(--text-color)"
                        >Forgot Password?</a
                    >
                    </div>

                    <button
                    type="submit"
                    class=" login-input login-btn py-3 mb-4 fw-semibold"
                    style="  background: linear-gradient(135deg, #007AFF 0%, #0051D5 100%) !important; "
                    >
                    Sign In
                    </button>
                </form>

                <div class="text-center px-4 mb-5">
                    <span class="text-center">Don't have an account? </span>
                    <a href="{{url('/register')}}" class="text-white text-decoration-none fw-semibold">Sign Up</a>
                </div>

                <footer class="text-center py-4 mt-auto">
                        <div class="mb-3">
                        <a href="#" class=" text-white text-decoration-none me-4">Terms & Condition</a>
                        <a href="#" class=" text-white text-decoration-none me-4">Privacy Policy</a>
                        <a href="#" class=" text-white text-decoration-none me-4">Help</a>
                        <a href="#" class=" text-white text-decoration-none">English</a>
                        </div>
                        <p class=" text-white mb-0">© 2023 Bankco. All Right Reserved.</p>
                </footer>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

  <script>
        function togglePassword() {
        const passwordField = document.getElementById("passwordField");
        const eyeIcon = document.getElementById("eyeIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
        }
        }
  </script>

@endsection
