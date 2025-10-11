@extends('web.partial.layout')

@section('hideNavbar', true)
@section('hideFooter', true)

@section('css')
    <style>
        /* Animations (minimal, necessary) */
        @keyframes slideUpFade {
            from {
                opacity: 0;
                transform: translateY(28px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .animate-slideUp {
            animation: slideUpFade .6s ease-out forwards
        }

        /* Progress shimmer */
        .progress-sheen {
            position: relative;
            isolation: isolate
        }

        .progress-sheen::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, .22) 40%, transparent 80%);
            transform: translateX(-100%);
            animation: sheenMove 2.2s linear infinite;
            pointer-events: none;
        }

        @keyframes sheenMove {
            to {
                transform: translateX(100%)
            }
        }

        /* Respect reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-slideUp {
                animation: none
            }

            .progress-sheen::after {
                animation: none
            }

            .stripes {
                animation: none
            }
        }
    </style>
@endsection

@section('content')


    <header class="absolute inset-x-0 top-0 z-20">
        <div class="mx-auto px-6 md:px-8 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <img src="{{ asset('public/theme/assets/web/images/nave-icon.png') }}" alt="AutoBoli" class="h-8 w-auto block">
            </a>
            <div class="flex items-center gap-3">
                <!-- Theme toggle button -->
                <button data-theme-toggle
                    class="flex items-center justify-center p-2 rounded-full text-sm font-medium text-gray-900 dark:text-white bg-transparent transition"
                    aria-label="Toggle theme">
                    <span class="material-symbols-outlined text-xl" data-theme-icon>flare</span>
                </button>

                <a href="{{ url('/') }}"
                    class="rounded-md px-2 lg:px-4 py-2 font-medium cursor-pointer transform text-sm border border-[#353F4C] dark:border-gray-300 text-gray-900 bg-[#0080ff] hover:bg-[#0080ff] text-white hover:border-[#0080ff] transition">
                    Back to Home
                </a>
            </div>
        </div>
    </header>


    <section class="h-screen w-full flex  bg-[#000f21] dark:bg-gray-100 pt-20 md:pt-0">
        {{-- LEFT: Content + Step Form --}}
        <div
            class="h-[calc(100vh)] w-full lg:w-3/5 overflow-y-auto
                   bg-[var(--light-theme-secondary)] dark:bg-[var(--dark-theme-secondary)]
                   flex flex-col gap-6 lg:gap-10 p-6 md:p-10 lg:p-14">
            {{-- Heading --}}
            <div class="mt-2">
                <h1
                    class="text-3xl md:text-4xl lg:text-5xl font-bold text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]">
                    Create your Autoboli Account
                </h1>
                <p class="text-[#353F4C] dark:text-[var(--dark-text-secondary)]/80 text-base md:text-lg">
                    Built for dealers & traders — fast onboarding, powerful insights.
                </p>
            </div>

            {{-- Card + Progress --}}
            <div
                class="w-full max-w-5xl mx-auto rounded-lg
                       bg-[var(--light-theme-primary)] dark:bg-[var(--dark-theme-secondary)]
                       shadow-2xl p-5 md:p-8 animate-slideUp">
                <div id="stepHeader" class="mb-4">
                    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight
                               text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]"
                        data-step-title>
                        Company information
                    </h2>
                    <p class="mt-1 text-sm text-black/70 dark:text-white/70" data-step-sub>
                        Provide your company details.
                    </p>

                    <div class="mt-4">
                        <div class="h-2 rounded-full bg-black/10 dark:bg-white/10 overflow-hidden">
                            <div id="progressBar"
                                class="h-full w-0 bg-gradient-to-r from-[#0080ff] to-[#46a1ff] progress-sheen transition-[width] duration-500 ease-out">
                            </div>
                        </div>
                        <div class="mt-2 flex items-center justify-between text-xs text-black/60 dark:text-white/60">
                            <span>Step <span id="progressText">1</span> of 4</span>
                            <span id="progressHint">Company → User → Proofs → Security</span>
                        </div>
                    </div>
                </div>

                {{-- Inline error --}}
                <div id="inlineError"
                    class="hidden mt-3 rounded-md border border-red-500/30 bg-red-500/10 text-red-700 dark:text-red-200 p-3 text-sm">
                </div>

                {{-- FORM --}}
                <form class="register-form" enctype="multipart/form-data" action="{{ url('/register_submit') }}"
                    method="POST" id="stepForm">
                    @csrf
                    <input type="hidden" name="payment_method" value="">

                    {{-- STEP 1: Company (NO proofs here) --}}
                    <div class="step-pane active space-y-6" data-step="1">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <input name="companyName"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Company / Trading or Business Name"
                                value="{{ old('companyName', 'My Company') }}">

                            <input name="companyAddress1"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Company Address 1" value="{{ old('companyAddress1', 'Company Address 1') }}">

                            <select name="businessType"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                           text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                           px-4 py-3 focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25">
                                <option value="">Business Type</option>
                                <option value="dealer" selected>Motor Dealer</option>
                                <option value="trader">Motor Trader</option>
                                <option value="independent">Independent Dealer</option>
                                <option value="other">Other</option>
                            </select>

                            <input name="companyAddress2"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Company Address 2 (Optional)"
                                value="{{ old('companyAddress2', 'Company Address 2') }}">

                            <input name="companyReg"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Company Reg. Number (Optional)"
                                value="{{ old('companyReg', 'Company Reg. Number') }}">

                            <input name="townCity"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25 dark:text-white"
                                placeholder="Town / City" value="{{ old('townCity', 'Town / City') }}">

                            <input name="website" type="url"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Website (Optional)" value="{{ old('website', 'https://autodroid.co.uk/') }}">

                            <input name="country"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Country" value="{{ old('country', 'Country') }}">

                            <input name="businessEmail" type="email"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Business Email (Optional)"
                                value="{{ old('businessEmail', 'business@gmail.com') }}">

                            <input name="postcode"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Postcode / Zip code" value="{{ old('postcode', '123') }}">

                            <select name="motorTradeInsurance"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 
             bg-transparent
           text-gray-900 dark:text-white
           px-4 py-3 focus:outline-none 
           focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25">
                                <option class="dark:bg-gray-800" value="">Motor
                                    Trade Insurance?</option>
                                <option class="dark:bg-gray-800" value="yes" selected>Yes</option>
                                <option class="dark:bg-gray-800" value="no">No
                                </option>
                                <option class="dark:bg-gray-800" value="pending">
                                    Pending</option>
                            </select>


                            <input name="telephone" type="tel"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Telephone" value="{{ old('telephone', '03112239342') }}">

                            <input name="vatNumber"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="VAT Number (if applicable)" value="{{ old('vatNumber', '123') }}">
                        </div>
                    </div>

                    {{-- STEP 2: User Info + Profile Image --}}
                    <div class="step-pane hidden space-y-6" data-step="2">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <input name="firstName"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="First Name" value="{{ old('firstName', 'Owais') }}">

                            <input name="surname"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Surname" value="{{ old('surname', 'Azam') }}">

                            <input name="title"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Title" value="{{ old('title', 'Owais Azam') }}">

                            <input name="jobTitle"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Job Title" value="{{ old('jobTitle', 'Dev') }}">

                            <div>
                                <div class="flex rounded-lg overflow-hidden border border-black/20 dark:border-white/20">
                                    <select
                                        class="bg-transparent text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] px-3 py-3">
                                        <option value="+44">+44</option>
                                        <option value="+1">+1</option>
                                        <option value="+92" selected>+92</option>
                                        <option value="+61">+61</option>
                                    </select>
                                    <input name="phone" type="tel"
                                        class="flex-1 bg-transparent text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] px-4 py-3 focus:outline-none"
                                        placeholder="Phone Number" value="{{ old('phone', '03112239342') }}">
                                </div>
                                <small class="error error-phone text-red-500"></small>
                            </div>

                            <div>
                                <select name="ReferralSource"
                                    class="w-full rounded-lg border border-black/20 dark:border-white/20
           bg-transparent
           text-gray-900 dark:text-white
           px-4 py-3
           focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25">
                                    <option class="dark:bg-gray-800" value="">Referral Source?</option>
                                    <option class="dark:bg-gray-800" value="Google">Google</option>
                                    <option class="dark:bg-gray-800" value="Social Media">Social Media</option>
                                    <option class="dark:bg-gray-800" value="Online Advertisement">Online Advertisement
                                    </option>
                                    <option class="dark:bg-gray-800" value="Friend / Colleague Referral">Friend /
                                        Colleague Referral</option>
                                    <option class="dark:bg-gray-800" value="Dealership Partner">Dealership Partner
                                    </option>
                                    <option class="dark:bg-gray-800" value="Trade Event or Expo">Trade Event or Expo
                                    </option>
                                    <option class="dark:bg-gray-800" value="Vehicle Trader Forum">Vehicle Trader Forum
                                    </option>
                                    <option class="dark:bg-gray-800" value="Other (please specify)">Other (please specify)
                                    </option>
                                </select>

                            </div>
                        </div>

                        {{-- Profile Image (moved here) --}}
                        <div>
                            <label class="block text-sm text-black/80 dark:text-white/80 mb-1">Profile Image <span
                                    class="text-red-500">*</span></label>
                            <label
                                class="inline-flex items-center justify-center rounded-lg border border-dashed border-black/25 dark:border-white/25 px-4 py-3 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] hover:bg-black/5 dark:hover:bg-white/5 cursor-pointer transition">
                                Select file (Max. 4MB)
                                <input name="avatar" type="file" class="fileName" accept=".jpg,.jpeg,.png,.pdf"
                                    hidden>
                            </label>
                            <div class="mt-2 text-sm text-black/60 dark:text-white/60" data-file="avatar">No file chosen.
                            </div>
                            <small class="error error-avatar text-red-500"></small>
                            <small class="block text-xs mt-1 text-black/50 dark:text-white/50">Accepted: .jpg, .png or
                                .pdf</small>
                        </div>
                    </div>

                    {{-- STEP 3: Proof documents --}}
                    <div class="step-pane hidden space-y-6" data-step="3">
                        <h3
                            class="text-lg font-semibold text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]">
                            Proof Documents</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm text-black/80 dark:text-white/80 mb-1">
                                    Proof of motor trade <span class="text-red-500">*</span>
                                </label>
                                <label
                                    class="inline-flex items-center justify-center rounded-lg border border-dashed border-black/25 dark:border-white/25 px-4 py-3 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] hover:bg-black/5 dark:hover:bg-white/5 cursor-pointer transition">
                                    Select file (Max. 4MB)
                                    <input name="proof_motor_trade" type="file" class="fileName"
                                        accept=".jpg,.jpeg,.png,.pdf" hidden>
                                </label>
                                <div class="mt-2 text-sm text-black/60 dark:text-white/60" data-file="proof_motor_trade">
                                    No file chosen.</div>
                                <small class="error error-proof_motor_trade text-red-500"></small>
                                <small class="block text-xs mt-1 text-black/50 dark:text-white/50">Accepted: .jpg, .png,
                                    .pdf</small>
                            </div>

                            <div>
                                <label class="block text-sm text-black/80 dark:text-white/80 mb-1">
                                    Proof of address <span class="text-red-500">*</span>
                                </label>
                                <label
                                    class="inline-flex items-center justify-center rounded-lg border border-dashed border-black/25 dark:border-white/25 px-4 py-3 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] hover:bg-black/5 dark:hover:bg-white/5 cursor-pointer transition">
                                    Select file (Max. 4MB)
                                    <input name="proof_address" type="file" class="fileName"
                                        accept=".jpg,.jpeg,.png,.pdf" hidden>
                                </label>
                                <div class="mt-2 text-sm text-black/60 dark:text-white/60" data-file="proof_address">No
                                    file chosen.</div>
                                <small class="error error-proof_address text-red-500"></small>
                                <small class="block text-xs mt-1 text-black/50 dark:text-white/50">Accepted: .jpg, .png,
                                    .pdf</small>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 4: Credentials --}}
                    <div class="step-pane hidden space-y-6" data-step="4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="email" name="personalEmail"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Personal / Login Email"
                                value="{{ old('personalEmail', 'iamowaisazam@gmail1.com') }}">

                            <input type="password" name="password"
                                class="w-full rounded-lg border border-black/20 dark:border-white/20 bg-transparent
                                          text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                          px-4 py-3 placeholder-black/50 dark:placeholder-white/50
                                          focus:outline-none focus:border-[#0080ff] focus:ring-4 focus:ring-[#0080ff]/25"
                                placeholder="Password" value="{{ old('password', 'owais123') }}">
                        </div>

                        <p class="text-xs text-black/60 dark:text-white/60">
                            By submitting this form, you agree to the
                            <a href="/autoboli/terms" target="_blank" class="underline text-[#0080ff]">Terms &
                                Conditions</a>
                            and
                            <a href="/autoboli/privacy" target="_blank" class="underline text-[#0080ff]">Privacy
                                Policy</a>.
                        </p>
                    </div>

                    {{-- NAV BUTTONS --}}
                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <button type="button"
                            class="inline-flex items-center gap-2 rounded-lg px-4 py-2 border border-black/15 dark:border-white/15
                                       bg-black/5 dark:bg-white/10 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]
                                       hover:bg-black/10 dark:hover:bg-white/15 transition"
                            id="prevStep">
                            <span class="material-symbols-outlined">arrow_back</span> Back
                        </button>

                        <button type="button"
                            class="inline-flex items-center gap-2 rounded-lg px-4 py-2 bg-[#0080ff] text-white hover:brightness-110 transition"
                            id="nextStep">
                            <span class="material-symbols-outlined">arrow_forward</span> Next step
                        </button>

                        <button type="submit"
                            class="hidden inline-flex items-center gap-2 rounded-lg px-4 py-2 bg-[#0080ff] text-white hover:brightness-110 transition"
                            id="submitBtn">
                            <span class="material-symbols-outlined">check_circle</span> Submit Application
                        </button>
                    </div>
                </form>

                <p class="mt-6 text-center text-black/70 dark:text-white/80">
                    Already have an account?
                    <a href="{{ url('/login') }}" class="font-semibold text-[#0080ff] hover:underline">Log in</a>
                </p>
            </div>
        </div>

        {{-- RIGHT: Decorative vertical lines panel --}}
        <div
            class="hidden lg:flex w-2/5 h-screen bg-[var(--light-theme-primary)] dark:bg-[var(--dark-theme-primary)] items-center justify-center relative overflow-hidden">

            <!-- Stepper container -->
            <div class="relative z-10 px-6 text-center w-full max-w-md">
                <div
                    class="space-y-6 bg-[var(--light-theme-primary)] dark:bg-[var(--dark-theme-secondary)] p-8 rounded-2xl shadow-lg ">


                    <ol class="relative space-y-12 ml-12">
                        <!-- Step 1 - Active -->
                        <li class="pointer-events-none relative step-item step-active group" data-step-li="1">
                            <div class="absolute -left-12 top-0">
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-black/10 dark:bg-white/10 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] shadow transition group-hover:scale-105">
                                    1
                                </span>
                            </div>
                            <div class="text-left">
                                <p
                                    class="text-2xl font-bold text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]">
                                    Company
                                </p>
                                <p class="text-sm text-black/60 dark:text-white/60">
                                    Business details
                                </p>
                            </div>
                        </li>

                        <!-- Step 2 -->
                        <li class="pointer-events-none relative step-item group" data-step-li="2">
                            <div class="absolute -left-12 top-0">
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-black/10 dark:bg-white/10 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] shadow transition group-hover:scale-105">
                                    2
                                </span>
                            </div>
                            <div class="text-left">
                                <p
                                    class="text-2xl font-bold text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]">
                                    User
                                </p>
                                <p class="text-sm text-black/60 dark:text-white/60">
                                    Info & avatar
                                </p>
                            </div>
                        </li>

                        <!-- Step 3 -->
                        <li class="pointer-events-none relative step-item group" data-step-li="3">
                            <div class="absolute -left-12 top-0">
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-black/10 dark:bg-white/10 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] shadow transition group-hover:scale-105">
                                    3
                                </span>
                            </div>
                            <div class="text-left">
                                <p
                                    class="text-2xl font-bold text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]">
                                    Proofs
                                </p>
                                <p class="text-sm text-black/60 dark:text-white/60">
                                    Docs
                                </p>
                            </div>
                        </li>

                        <!-- Step 4 -->
                        <li class="pointer-events-none relative step-item group" data-step-li="4">
                            <div class="absolute -left-12 top-0">
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-black/10 dark:bg-white/10 text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)] shadow transition group-hover:scale-105">
                                    4
                                </span>
                            </div>
                            <div class="text-left">
                                <p
                                    class="text-2xl font-bold text-[var(--light-text-primary)] dark:text-[var(--dark-text-primary)]">
                                    Security
                                </p>
                                <p class="text-sm text-black/60 dark:text-white/60">
                                    Email & password
                                </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('js')
    <script>
        // ------- Elements -------
        const panes = [...document.querySelectorAll('.step-pane')];
        const nextBtn = document.getElementById('nextStep');
        const prevBtn = document.getElementById('prevStep');
        const submitBtn = document.getElementById('submitBtn');
        const inlineError = document.getElementById('inlineError');
        const stepLis = [...document.querySelectorAll('[data-step-li]')];
        const headerTitle = document.querySelector('[data-step-title]');
        const headerSub = document.querySelector('[data-step-sub]');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');

        const meta = {
            1: {
                title: 'Company information',
                sub: 'Provide your company details.'
            },
            2: {
                title: 'User information & avatar',
                sub: 'Add your personal details and profile image.'
            },
            3: {
                title: 'Proof documents',
                sub: 'Upload required proof documents.'
            },
            4: {
                title: 'Security',
                sub: 'Set your login email & password.'
            },
        };

        let currentStep = 1;
        const totalSteps = 4;

        // ------- Helpers -------
        function setProgress() {
            const pct = ((currentStep - 1) / (totalSteps - 1)) * 100;
            progressBar.style.width = pct + '%';
            if (progressText) progressText.textContent = currentStep;
        }

        function switchPane(next) {
            const cur = panes.find(p => Number(p.dataset.step) === currentStep);
            const nxt = panes.find(p => Number(p.dataset.step) === next);
            if (!cur || !nxt) return;
            cur.classList.add('hidden');
            nxt.classList.remove('hidden');
        }

        function updateStepperUI() {
            stepLis.forEach(li => {
                const n = Number(li.dataset.stepLi);
                const badge = li.querySelector('span');

                if (badge) {
                    // Reset badge
                    badge.classList.remove('text-white', 'bg-[#0080ff]', 'shadow', 'bg-neutral-500');
                    badge.classList.add('bg-black/10', 'dark:bg-white/10', 'text-black', 'dark:text-white');
                }

                if (n < currentStep) {
                    if (badge) {
                        badge.classList.remove('bg-black/10', 'dark:bg-white/10', 'text-black', 'dark:text-white');
                        badge.classList.add('bg-neutral-500', 'text-white');
                    }
                }
                if (n === currentStep) {
                    if (badge) {
                        badge.classList.remove('bg-black/10', 'dark:bg-white/10', 'text-black', 'dark:text-white',
                            'bg-neutral-500');
                        badge.classList.add('bg-[#0080ff]', 'text-white', 'shadow');
                    }
                }
                li.setAttribute('aria-current', n === currentStep ? 'step' : 'false');
            });
        }

        function updateHeader() {
            headerTitle.textContent = meta[currentStep].title;
            if (headerSub) headerSub.textContent = meta[currentStep].sub;
        }

        function updateButtons() {
            prevBtn.classList.toggle('opacity-60', currentStep === 1);
            prevBtn.classList.toggle('pointer-events-none', currentStep === 1);
            nextBtn.classList.toggle('hidden', currentStep === totalSteps);
            submitBtn.classList.toggle('hidden', currentStep !== totalSteps);
        }

        function showInlineError(msg) {
            inlineError.textContent = msg || 'Please check the required fields.';
            inlineError.classList.remove('hidden');
        }

        function clearInlineError() {
            inlineError.classList.add('hidden');
            inlineError.textContent = '';
        }

        // File rules
        const FILE_MAX = 4 * 1024 * 1024;
        const FILE_TYPES = ['image/jpeg', 'image/png', 'application/pdf'];

        function validFile(input, required = false) {
            const has = input.files && input.files.length;
            if (!has) return !required ? true : (showInlineError('Please select required file.'), false);
            const f = input.files[0];
            if (f.size > FILE_MAX) {
                showInlineError('Selected file is larger than 4MB.');
                return false;
            }
            if (!FILE_TYPES.includes(f.type)) {
                showInlineError('Invalid file type. Use JPG, PNG or PDF.');
                return false;
            }
            return true;
        }

        function validateStep() {
            // Required fields per step
            const required = {
                1: ['companyName', 'companyAddress1', 'businessType', 'townCity', 'country', 'postcode'],
                2: ['firstName', 'surname', 'title', 'jobTitle', 'phone', 'avatar'], // avatar required here
                3: ['proof_motor_trade', 'proof_address'],
                4: ['personalEmail', 'password'],
            } [currentStep] || [];

            for (const name of required) {
                const el = document.querySelector(`[name="${name}"]`);
                if (!el) continue;

                if (el.type === 'file') {
                    if (!validFile(el, true)) return false;
                } else if (!el.value || !el.value.trim()) {
                    showInlineError('Please fill the required fields to continue.');
                    el.focus();
                    return false;
                }
            }

            clearInlineError();
            return true;
        }

        function go(step) {
            const target = Math.max(1, Math.min(totalSteps, step));
            if (target === currentStep) return;
            switchPane(target);
            currentStep = target;
            updateHeader();
            updateStepperUI();
            updateButtons();
            setProgress();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // ------- Events -------
        // init
        panes.forEach(p => p.classList.toggle('hidden', Number(p.dataset.step) !== 1));
        updateHeader();
        updateStepperUI();
        updateButtons();
        setProgress();

        nextBtn.addEventListener('click', () => {
            if (!validateStep()) return;
            nextBtn.classList.add('opacity-60', 'pointer-events-none');
            setTimeout(() => {
                nextBtn.classList.remove('opacity-60', 'pointer-events-none');
                go(currentStep + 1);
            }, 200);
        });

        prevBtn.addEventListener('click', () => go(currentStep - 1));

        stepLis.forEach(li => {
            li.addEventListener('click', () => {
                const target = Number(li.dataset.stepLi);
                if (target > currentStep && !validateStep()) return;
                go(target);
            });
        });

        // file name preview
        document.querySelectorAll('.fileName').forEach(input => {
            input.addEventListener('change', function() {
                const box = document.querySelector(`[data-file="${this.name}"]`);
                if (box) box.textContent = this.files.length ? this.files[0].name : 'No file chosen.';
            });
        });

        // AJAX submit
        $(document).ready(function() {
            $('.register-form').on('submit', function(e) {
                e.preventDefault();
                $('.error').text('');
                $('#submitBtn').addClass('opacity-60 pointer-events-none').html(
                    '<span class="material-symbols-outlined">hourglass_top</span> Submitting…'
                );

                const formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(r) {
                        if (r.success && r.redirect_url) {
                            window.location.href = r.redirect_url;
                        } else {
                            alert(r.message || 'Form submitted successfully!');
                        }
                    },
                    error: function(xhr) {
                        if (xhr?.responseJSON?.errors) {
                            $.each(xhr.responseJSON.errors, function(k, messages) {
                                $(`.error-${k}`).text(messages);
                            });
                            showInlineError('Please review the highlighted errors.');
                        } else {
                            alert(xhr?.responseJSON?.message || 'Something went wrong');
                        }
                    },
                    complete: function() {
                        $('#submitBtn').removeClass('opacity-60 pointer-events-none').html(
                            '<span class="material-symbols-outlined">check_circle</span> Submit Application'
                        );
                    }
                });
            });
        });
    </script>
@endsection
