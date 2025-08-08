<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
background: 
    linear-gradient(to right, #1D2632, #1D2632, #1D2632
);
  background-blend-mode: overlay;
  background-size: cover;
  background-attachment: fixed;
  background-repeat: repeat;

      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      max-width: 900px;
      width: 100%;
      background-color: #1D2632;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      display: flex;
      flex-wrap: wrap;
    }

    .login-image {
      flex: 1;
      min-height: 100%;
      background: url("{{asset('/public/theme/assets/CarGroup.png')}}") center center/cover no-repeat;
    }

    .login-form {
      flex: 1;
      padding: 3rem;
      color: #ffffff;
    }

    .login-form h3 {
      margin-bottom: 2rem;
      text-align: center;
    }

    .form-label {
      color: #ffffff;
    }

    .form-control {
      background-color: #1D2632;
      border: 1px solid #444;
      color: #ffffff;
    }

    .form-control:focus {
      border-color: #ffffff;
      background-color: #1D2632;
      color: #ffffff;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #ffffff;
      color: #152337;
      font-weight: bold;
      border: none;
    }

    .btn-primary:hover {
      background-color: #e0e0e0;
      color: #1D2632;
    }

    .alert {
      font-size: 0.9rem;
    }

    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
      }

      .login-image {
        height: 200px;
      }
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="login-image"></div>

        <div class="login-form text-center">
        <img src="{{ asset('public/themeadmin/images/logo/logo.png') }}" alt="Logo" class="mb-3" style="max-width: 120px;">
        <h3>Admin Login</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf

            <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="personalEmail" required autofocus>
            </div>

            <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
            </div>

            <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        </div>

  </div>

</body>
</html>
