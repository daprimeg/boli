@extends('web.partial.layout')
@section('hideNavbar', true)
@section('hideFooter', true)

@section('css')
    <style>
        @keyframes slideUpFade {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slideUp {
            animation: slideUpFade .9s ease-out forwards;
        }

        html {
            transition: background-color .3s, color .3s;
        }

        /* smooth theme */
    </style>
@endsection

@section('content')
    <!-- Minimal header (logo + theme toggle) -->
    <header class="absolute inset-x-0 top-0 z-20">
        <div class="mx-auto px-8 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <img src="{{ asset('public/theme/assets/web/images/nave-icon.png') }}" alt="AutoBoli" class="h-8 w-auto block">
            </a>

            <div class="flex items-center gap-3">
                <button data-theme-toggle
                    class="flex items-center justify-center p-2 rounded-full text-sm font-medium text-white dark:text-gray-900 bg-transparent transition"
                    aria-label="Toggle theme">
                    <span class="material-symbols-outlined text-xl" data-theme-icon>flare</span>
                </button>
                <a href="{{ url('/') }}"
                    class="text-white dark:text-gray-900 rounded-md px-3 py-2 text-sm font-medium border
                  border-[#353F4C] dark:border-gray-300 hover:bg-[#0080ff] hover:border-[#0080ff] transition">
                    Back to Home
                </a>
            </div>
        </div>
    </header>

    <!-- Page -->
    <div
        class="relative min-h-screen flex items-center justify-center bg-[#000f21] dark:bg-gray-100 overflow-hidden pt-20 transition-colors">
        <!-- Decorative diagonal brand band + dotted texture -->
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-[42%]">
            <div class="absolute right-0 bottom-0 w-[120%] h-full -skew-y-3 origin-bottom-right bg-[#0080ff]"></div>
            <div
                class="absolute right-0 bottom-0 w-[120%] h-full -skew-y-3 origin-bottom-right
                  bg-[radial-gradient(#7b3fe6_1.2px,transparent_1.2px)]
                  [background-size:16px_16px] opacity-30">
            </div>
        </div>

        <!-- Card -->
        <div class="container mx-auto px-4 py-12">
            <div class="mx-auto w-full max-w-lg">
                <div
                    class="rounded bg-[#0f1c2c] dark:bg-white shadow-2xl px-6 sm:px-12 py-10 relative z-10 animate-slideUp transition-colors">
                    <h1 class="text-3xl font-extrabold mb-2 text-white dark:text-gray-900">Reset Password</h1>
                    <p class="text-sm text-slate-300 dark:text-slate-600 mb-6">
                        Your new password must be different from previously used passwords.
                    </p>

                    <!-- Form (ids & names unchanged) -->
                    <form class="space-y-5 fv-plugins-bootstrap5 fv-plugins-framework" id="resetPasswordForm">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <!-- New Password -->
                        <div class="space-y-2">
                            <label for="password" class="block text-xs font-semibold text-slate-200 dark:text-gray-700">
                                New Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100
                              pr-12 py-3 px-3 text-white dark:text-gray-900 placeholder:text-slate-400"
                                    placeholder="•••••••••••">
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 toggle-password"
                                    data-target="password" aria-label="Toggle password">
                                    <i class="fas fa-eye text-slate-400 hover:text-slate-600"></i>
                                </button>
                            </div>
                            <div class="text-red-500 text-sm" id="passwordError" style="display:none;"></div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2">
                            <label for="password_confirmation"
                                class="block text-xs font-semibold text-slate-200 dark:text-gray-700">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100
                              pr-12 py-3 px-3 text-white dark:text-gray-900 placeholder:text-slate-400"
                                    placeholder="•••••••••••">
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 toggle-password"
                                    data-target="password_confirmation" aria-label="Toggle password">
                                    <i class="fas fa-eye text-slate-400 hover:text-slate-600"></i>
                                </button>
                            </div>
                            <div class="text-red-500 text-sm" id="confirmError" style="display:none;"></div>
                        </div>

                        <button type="submit"
                            class="w-full rounded-lg bg-[#0080ff] hover:bg-[#0059B3] text-white font-semibold py-3 shadow-md transition">
                            Set new password
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="{{ url('login') }}"
                            class="text-[#353F4C] hover:text-[#0080ff] hover:underline font-medium text-sm">Back to
                            login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // theme toggle (same behavior as other auth pages)
        const html = document.documentElement;
        const themeToggle = document.getElementById("themeToggle");
        const themeIcon = document.getElementById("themeIcon");

        if (localStorage.theme === "light") {
            html.classList.remove("dark");
            themeIcon.classList.replace("fa-moon", "fa-sun");
        } else {
            html.classList.add("dark");
            themeIcon.classList.replace("fa-sun", "fa-moon");
        }

        themeToggle?.addEventListener("click", () => {
            if (html.classList.contains("dark")) {
                html.classList.remove("dark");
                localStorage.theme = "light";
                themeIcon.classList.replace("fa-moon", "fa-sun");
            } else {
                html.classList.add("dark");
                localStorage.theme = "dark";
                themeIcon.classList.replace("fa-sun", "fa-moon");
            }
        });

        // eye toggles (keep your .toggle-password + data-target contract)
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('.toggle-password');
            if (!btn) return;
            const targetId = btn.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = btn.querySelector('i');
            if (!input) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>

    {{-- Your existing AJAX logic unchanged --}}
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
    </script>
@endsection
