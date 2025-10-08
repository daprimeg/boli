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

<div class="text-white flex flex-col min-h-screen bg-gray-900">
  <div class="container mx-auto px-4">
    <div class="flex justify-center items-center my-12">
      <div class="w-full max-w-md">

        <!-- Header -->
        <div class="text-center mb-8">
          <h1 class="text-4xl font-bold mb-2">
            Sign in to <span class="text-blue-500">AUTOBILI</span>
          </h1>
          <p class="text-gray-400">Send, spend and save smarter</p>
        </div>

        <!-- Alerts -->
        @if(session('success'))
          <div class="bg-green-600 text-white text-sm p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        @if(session('error'))
          <div class="bg-red-600 text-white text-sm p-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        <!-- Social Logins -->
        <div class="flex gap-3 mb-6">
          <a href="{{ route('google.login') }}" 
             class="flex items-center justify-center w-1/2 py-3 bg-gray-800 hover:bg-gray-700 rounded-lg transition">
            <i class="fab fa-google mr-2"></i> Sign In with Google
          </a>
          <button class="flex items-center justify-center w-1/2 py-3 bg-gray-800 hover:bg-gray-700 rounded-lg transition">
            <i class="fab fa-apple mr-2"></i> Sign In with Apple
          </button>
        </div>

        <div class="text-center text-gray-400 mb-6">Or continue with</div>

        <!-- Login Form -->
        <form action="{{ url('/login_submit') }}" method="POST" class="space-y-5">
          @csrf

          <div>
            <input type="email" name="email" value="{{ old('email') }}"
              class="w-full py-3 px-3 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Username or email" />
            @error('email')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="relative">
            <input type="password" name="password" id="passwordField"
              class="w-full py-3 px-3 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none"
              placeholder="Password" />
            <button type="button"
              class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white"
              onclick="togglePassword()">
              <i class="fas fa-eye" id="eyeIcon"></i>
            </button>
            @error('password')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex justify-between items-center text-sm text-gray-300">
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" id="rememberMe" class="form-checkbox text-blue-500 rounded" />
              <span>Remember me</span>
            </label>
            <a href="{{ url('forgot-password') }}" class="text-blue-500 hover:underline">Forgot Password?</a>
          </div>

          <button type="submit"
            class="w-full py-3 rounded-lg font-semibold bg-gradient-to-r from-blue-500 to-blue-700 hover:opacity-90 transition">
            Sign In
          </button>
        </form>

        <!-- Footer -->
        <div class="text-center mt-8 text-gray-300 text-sm">
          <p>Don't have an account? 
            <a href="{{ url('/register') }}" class="text-white font-semibold hover:underline">Sign Up</a>
          </p>
        </div>

        
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
