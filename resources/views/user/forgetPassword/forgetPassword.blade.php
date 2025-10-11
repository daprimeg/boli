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

        /* Smooth theme transition */
        html {
            transition: background-color .3s, color .3s;
        }
    </style>
@endsection

@section('content')
    <!-- Minimal header (logo + theme toggle) -->
    <header class="absolute inset-x-0 top-0 z-20">
        <div class="mx-auto px-8 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <img src="{{ asset('public/theme/assets/web/images/nave-icon.png') }}" alt="AutoBoli" class="h-8 w-auto block">
            </a>

            <div class="flex items-center gap-3">
                <!-- Theme toggle -->
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

                    <!-- Title -->
                    <h1 class="text-3xl font-extrabold mb-6 text-white dark:text-gray-900">
                        Forgot your password?
                    </h1>

                    <p class="text-sm text-slate-300 dark:text-slate-600 mb-6">
                        Enter your email and we’ll send you a reset link.
                    </p>

                    <!-- Form (unchanged ids & names for your AJAX) -->
                    <form id="resetPasswordForm" class="space-y-5 fv-plugins-bootstrap5 fv-plugins-framework">
                        @csrf

                        <div class="space-y-2">
                            <label for="email"
                                class="block text-xs font-semibold text-slate-200 dark:text-gray-700">Email</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 dark:text-gray-500">
                                    <!-- mail icon -->
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5L4 8V6l8 5 8-5v2Z" />
                                    </svg>
                                </span>
                                <input type="email" id="email" name="email"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100
                              pl-10 pr-3 py-3 text-white dark:text-gray-900 placeholder:text-slate-400"
                                    placeholder="Enter your email" required autofocus>
                            </div>
                            <div class="text-red-500 text-sm" id="emailError"></div>
                        </div>

                        <button type="submit"
                            class="w-full rounded-lg bg-[#0080ff] hover:bg-[#0059B3] text-white font-semibold py-3 shadow-md transition">
                            Send me the link
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="{{ url('login') }}"
                            class="text-[#353F4C] hover:text-[#0080ff] hover:underline font-medium text-sm">or sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    {{-- Your existing AJAX logic (unchanged) --}}
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
