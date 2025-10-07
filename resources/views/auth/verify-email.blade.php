<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000f21;
            color: white;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        .verification-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 2rem 1rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            text-align: center;
            margin-bottom: 3rem;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background-color: #0081fe;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            backdrop-filter: blur(10px);
        }

        .card h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
        }

        .card p {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 2rem;
        }

        .form-label {
            color: white;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            text-align: center;
            font-size: 1.1rem;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: #0081fe;
            color: white;
            box-shadow: 0 0 0 0.25rem rgba(0, 129, 254, 0.25);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
            letter-spacing: normal;
        }

        .btn-primary {
            background-color: #0081fe;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #0070dd;
            transform: translateY(-1px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-outline-secondary {
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            background-color: transparent;
            transition: all 0.2s;
        }

        .btn-outline-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .alert {
            border-radius: 8px;
            border: none;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background-color: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .alert-info {
            background-color: rgba(0, 129, 254, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(0, 129, 254, 0.3);
        }

        .spinner-border {
            width: 1rem;
            height: 1rem;
            border-width: 2px;
        }

        .resend-link {
            text-align: center;
            margin-top: 1.5rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .resend-link a {
            color: #0081fe;
            text-decoration: none;
            font-weight: 600;
        }

        .resend-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="logo">
            <div class="">
                <img src="{{asset('public/theme/assets/nave-icon.png')}}" alt="Logo" class="me-2" style="height: 35px;">
            </div>
            <div class="logo-text">VerifyApp</div>
        </div>

        <div class="card">
            <h1>Email Verification</h1>
            <p>Please enter the verification code sent to your email address.</p>

            <div id="alertContainer"></div>

            <form id="verificationForm">
                <div class="mb-3">
                    <label for="token" class="form-label">Verification Code</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="token" 
                        name="token"
                        placeholder="XXXXXX"
                        maxlength="6"
                        required
                        autocomplete="off"
                    >
                    <div class="form-text text-white-50 mt-2">
                        Enter the 6-character code from your email
                    </div>
                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-outline-secondary" id="pasteBtn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px; display: inline-block; vertical-align: middle;">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        Paste from Clipboard
                    </button>
                </div>

                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <span id="submitText">Verify Email</span>
                    <span id="submitSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                </button>
            </form>

            <div class="resend-link">
                Didn't receive the code? <a href="#" id="resendLink">Resend</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const form = document.getElementById('verificationForm');
const tokenInput = document.getElementById('token');
const pasteBtn = document.getElementById('pasteBtn');
const submitBtn = document.getElementById('submitBtn');
const submitText = document.getElementById('submitText');
const submitSpinner = document.getElementById('submitSpinner');
const alertContainer = document.getElementById('alertContainer');
const resendLink = document.getElementById('resendLink');


function showAlert(message, type) {
    alertContainer.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
}

window.addEventListener('load', async () => {
    try {
        const text = await navigator.clipboard.readText();
        const tokenPattern = /^[A-Z0-9]{6}$/i;
        if (tokenPattern.test(text.trim())) {
            tokenInput.value = text.trim();
            showAlert('Code automatically pasted from clipboard!', 'info');

            setTimeout(() => {
                form.dispatchEvent(new Event('submit'));
            }, 1000);
        }
    } catch (err) {
        console.log('Clipboard access not available or denied');
    }
});


pasteBtn.addEventListener('click', async () => {
    try {
        const text = await navigator.clipboard.readText();
        tokenInput.value = text.trim();
        showAlert('Code pasted successfully!', 'info');
    } catch (err) {
        showAlert('Unable to access clipboard. Please paste manually.', 'danger');
    }
});


tokenInput.addEventListener('input', (e) => {
    e.target.value = e.target.value.toUpperCase();
});


form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const token = tokenInput.value.trim();
    const tokenPattern = /^[A-Z0-9]{6}$/;

    if (!tokenPattern.test(token)) {
        showAlert('Please enter a valid 6-character verification code.', 'danger');
        return;
    }


    submitBtn.disabled = true;
    submitText.textContent = 'Verifying...';
    submitSpinner.classList.remove('d-none');

    try {

        const response = await fetch("{{ route('verify.email.submit') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                token: token,
                email: "{{ $email }}"
            })
        });

        const data = await response.json();

        if (data.success) {
            showAlert(data.message || 'Email verified successfully!', 'success');
            setTimeout(() => {
                window.location.href = data.redirect_url;
            }, 1500);
        } else {
            showAlert(data.message || 'Invalid verification code.', 'danger');
            submitBtn.disabled = false;
            submitText.textContent = 'Verify Email';
            submitSpinner.classList.add('d-none');
        }

    } catch (err) {
        console.log(err);
        showAlert('Something went wrong. Please try again.', 'danger');
        submitBtn.disabled = false;
        submitText.textContent = 'Verify Email';
        submitSpinner.classList.add('d-none');
    }
});


resendLink.addEventListener('click', async (e) => {
    e.preventDefault();

    submitBtn.disabled = true;
    submitText.textContent = 'Sending...';
    submitSpinner.classList.remove('d-none');

    try {
        const response = await fetch("{{ route('verify.email.resend') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                email: "{{ $email }}"
            })
        });

        const data = await response.json();

        if (data.success) {
            showAlert(data.message || 'A new verification code has been sent!', 'success');
        } else {
            showAlert(data.message || 'Failed to resend verification code.', 'danger');
        }

    } catch (err) {
        showAlert('Something went wrong. Please try again.', 'danger');
    }

    submitBtn.disabled = false;
    submitText.textContent = 'Verify Email';
    submitSpinner.classList.add('d-none');
});

</script>

</body>
</html>
