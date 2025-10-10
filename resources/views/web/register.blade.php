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
    </style>
@endsection

@section('content')
    {{-- Minimal header (same as login) --}}
    <header class="absolute inset-x-0 top-0 z-20">
        <div class="mx-auto px-8 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <img src="{{ asset('public/theme/assets/web/images/nave-icon.png') }}" alt="AutoBoli" class="h-8 w-auto block">
            </a>

            <div class="flex items-center gap-3">
                <!-- Theme toggle (shared helper binds via data attributes) -->
                <button data-theme-toggle
                    class="flex items-center justify-center p-2 rounded-md text-sm font-medium border border-gray-600 dark:border-gray-300 text-white dark:text-gray-900 bg-transparent hover:bg-gray-800 dark:hover:bg-gray-100 transition"
                    aria-label="Toggle theme">
                    <span class="material-symbols-outlined text-xl" data-theme-icon>flare</span>
                </button>

                <a href="{{ url('/') }}"
                    class="text-white dark:text-gray-900 rounded-md px-2 lg:px-4 py-2 font-medium cursor-pointer transform text-sm border border-[#353F4C] dark:border-gray-300 hover:bg-[#0080ff] hover:border-[#0080ff] transition bg-transparent">
                    Back to Home
                </a>
            </div>
        </div>
    </header>

    {{-- Full-height screen like login --}}
    <section class="relative min-h-screen overflow-hidden bg-[#000f21] dark:bg-gray-100 pt-20 transition-colors">

        {{-- Decorative diagonal band (same pattern as login) --}}
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-[42%]">
            <div class="absolute right-0 bottom-0 w-[120%] h-full -skew-y-3 origin-bottom-right bg-[#0080ff]"></div>
            <div
                class="absolute right-0 bottom-0 w-[120%] h-full -skew-y-3 origin-bottom-right bg-[radial-gradient(#7b3fe6_1.2px,transparent_1.2px)] [background-size:16px_16px] opacity-30">
            </div>
        </div>

        <div class="relative z-10 max-w-6xl mx-auto px-4 py-10">
            {{-- Heading (mirrors login typography/colors) --}}
            <header class="text-center mb-8 animate-slideUp ">
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white dark:text-slate-900">
                    Create your Autoboli Account
                </h1>
                <p class="mt-2 text-white/80 dark:text-slate-600">
                    Built for dealers & traders — fast onboarding, powerful insights.
                </p>
            </header>

            {{-- Card (same container styling as login) --}}
            <div
                class="rounded bg-[#0f1c2c] dark:bg-white shadow-2xl px-6 sm:px-10 md:px-12 py-8 md:py-10 relative z-10 animate-slideUp transition-colors">
                {{-- Alert (kept) --}}
                <div
                    class="rounded-md border border-red-500/30 bg-red-500/10 text-red-200 dark:text-red-800 p-3 text-sm mb-6">
                    <p class="mb-2">
                        <strong>AUTOBOLI LTD</strong> is exclusively for independent dealers, motor dealers, traders, and
                        individuals engaged in the motor business. By using our platform, you confirm that you meet this
                        criterion.
                    </p>
                    <p>
                        <em>We may suspend/terminate accounts that do not meet eligibility.</em>
                        <a href="#" class="text-[#8abfff] dark:text-[#0080ff] underline underline-offset-2">Read
                            more</a>
                    </p>
                </div>


                {{-- Form (your original fields, styled to match login dark/light) --}}
                <form class="register-form" enctype="multipart/form-data" action="{{ url('/register_submit') }}"
                    method="post">
                    <input type="hidden" name="payment_method" value="" />
                    @csrf

                    {{-- Company Details --}}
                    <section class="mb-8">
                        <h2 class="text-xl font-extrabold text-white dark:text-slate-900 py-4">Company Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input name="companyName" value="My Company" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Company / Trading or Business Name" />
                                <small class="error error-companyName text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="companyAddress1" value="Company Address 1" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Company Address 1" />
                                <small class="error error-companyAddress1 text-red-400 dark:text-red-600"></small>
                            </div>

                            <div>
                                <select name="businessType"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-[#0f1c2c] dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900">
                                    <option value="">Business Type</option>
                                    <option selected value="dealer">Motor Dealer</option>
                                    <option value="trader">Motor Trader</option>
                                    <option value="independent">Independent Dealer</option>
                                    <option value="other">Other</option>
                                </select>
                                <small class="error error-businessType text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="companyAddress2" value="Company Address 2" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Company Address 2 (Optional)" />
                                <small class="error error-companyAddress2 text-red-400 dark:text-red-600"></small>
                            </div>

                            <div>
                                <input name="companyReg" value="Company Reg. Number" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Company Reg. Number (Optional)" />
                                <small class="error error-companyReg text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="townCity" value="Town / City" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Town / City" />
                                <small class="error error-townCity text-red-400 dark:text-red-600"></small>
                            </div>

                            <div>
                                <input name="website" value="https://autodroid.co.uk/" type="url"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Website (Optional)" />
                                <small class="error error-website text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="country" value="Country" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Country" />
                                <small class="error error-country text-red-400 dark:text-red-600"></small>
                            </div>

                            <div>
                                <input name="businessEmail" value="business@gmail.com" type="email"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Business Email (Optional)" />
                                <small class="error error-businessEmail text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="postcode" value="123" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Postcode / Zip code" />
                                <small class="error error-postcode text-red-400 dark:text-red-600"></small>
                            </div>

                            <div>
                                <select name="motorTradeInsurance" required
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-[#0f1c2c] dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900">
                                    <option value="">Motor Trade Insurance?</option>
                                    <option selected value="yes">Yes</option>
                                    <option value="no">No</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <small class="error error-postcode text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="telephone" value="03112239342" type="tel"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Telephone" />
                                <small class="error error-telephone text-red-400 dark:text-red-600"></small>
                            </div>

                            <div>
                                <input name="vatNumber" value="123" type="text"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="VAT Number (if applicable)" />
                                <small class="error error-vatNumber text-red-400 dark:text-red-600"></small>
                            </div>
                        </div>
                    </section>

                    {{-- Personal Information --}}
                    <section class="mb-8">
                        <h2 class="text-xl font-extrabold text-white dark:text-slate-900 py-4">Personal Information</h2>
                        <p class="text-white/80 dark:text-slate-600 text-sm mb-4">
                            Add details for proprietors/partners/directors and your authorized buyer. Include proof of
                            identity (driving license or passport in .jpg, .png, or .pdf).
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <input name="firstName"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    value="Owais" placeholder="First Name" />
                                <small class="error error-firstName text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="surname"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    value="Azam" placeholder="Surname" />
                                <small class="error error-surname text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input name="title"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    value="Owais Azam" placeholder="Title" />
                                <small class="error error-title text-red-400 dark:text-red-600"></small>
                            </div>

                            <div>
                                <input name="jobTitle" value="Dev"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Job Title" />
                                <small class="error error-jobTitle text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input type="email" value="iamowaisazam@gmail1.com" name="personalEmail"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Personal Email OR Login Email" />
                                <small class="error error-personalEmail text-red-400 dark:text-red-600"></small>
                            </div>
                            <div>
                                <input type="password" value="owais123" name="password"
                                    class="w-full rounded-lg border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100 px-4 py-3 text-white dark:text-gray-900"
                                    placeholder="Password" />
                                <small class="error error-password text-red-400 dark:text-red-600"></small>
                            </div>
                            {{-- Phone with country select (kept) --}}
                            <div
                                class="flex rounded-lg overflow-hidden border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100">
                                <div class="relative" id="customSelect">
                                    <div class="custom-select-selected px-3 flex items-center gap-2 h-full cursor-pointer"
                                        id="selectedOption">
                                        <img src="https://flagcdn.com/w40/gb.png" alt="GB"
                                            class="h-5 w-5 rounded-sm">
                                        <span class="text-white dark:text-slate-700">+44</span>
                                    </div>
                                    <div class="custom-select-options hidden absolute z-20 mt-1 w-40 rounded-lg border border-slate-200 bg-white shadow-md"
                                        id="optionList">
                                        <div class="custom-select-option px-3 py-2 flex items-center gap-2 hover:bg-slate-50 cursor-pointer"
                                            data-code="+44" data-flag="gb">
                                            <img src="https://flagcdn.com/w40/gb.png" alt="GB"
                                                class="h-4 w-4 rounded-sm"><span>+44 (GB)</span>
                                        </div>
                                        <div class="custom-select-option px-3 py-2 flex items-center gap-2 hover:bg-slate-50 cursor-pointer"
                                            data-code="+1" data-flag="us">
                                            <img src="https://flagcdn.com/w40/us.png" alt="US"
                                                class="h-4 w-4 rounded-sm"><span>+1 (US)</span>
                                        </div>
                                        <div class="custom-select-option px-3 py-2 flex items-center gap-2 hover:bg-slate-50 cursor-pointer"
                                            data-code="+92" data-flag="pk">
                                            <img src="https://flagcdn.com/w40/pk.png" alt="PK"
                                                class="h-4 w-4 rounded-sm"><span>+92 (PK)</span>
                                        </div>
                                        <div class="custom-select-option px-3 py-2 flex items-center gap-2 hover:bg-slate-50 cursor-pointer"
                                            data-code="+61" data-flag="au">
                                            <img src="https://flagcdn.com/w40/au.png" alt="AU"
                                                class="h-4 w-4 rounded-sm"><span>+61 (AU)</span>
                                        </div>
                                    </div>
                                </div>
                                <input name="phone" type="tel" value="03112239342"
                                    class="flex-1 px-4 py-3 outline-none text-white dark:text-slate-900 bg-transparent dark:bg-gray-100 border-l border-slate-300 dark:border-gray-300"
                                    placeholder="Phone Number" />
                            </div>
                            <div
                                class="flex rounded-lg overflow-hidden border border-slate-300 dark:border-gray-300 bg-transparent dark:bg-gray-100">
                                <select name="ReferralSource" required
                                    class="flex-1 px-4 py-3 outline-none text-white dark:text-slate-900 bg-transparent dark:bg-gray-100 border-l border-slate-300 dark:border-gray-300"
                                    placeholder="Referral Source" />
                                <option value="">Referral Source?</option>
                                <option value="Google">Google</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Online Advertisement">Online Advertisement</option>
                                <option value="Friend / Colleague Referral">Friend / Colleague Referral</option>
                                <option value="Dealership Partner">Dealership Partner</option>
                                <option value="Trade Event or Expo">Trade Event or Expo</option>
                                <option value="Vehicle Trader Forum">Vehicle Trader Forum</option>
                                <option value="Other (please specify)">Other (please specify)</option>

                                </select>
                            </div>

                        </div>
                    </section>

                    {{-- File upload --}}
                    <section class="mb-6 max-w-md">
                        <label class="font-semibold text-white dark:text-slate-900">Profile Image <span
                                class="text-red-400 dark:text-red-600">*</span></label>
                        <div class="mt-2 flex items-center gap-3">
                            <label
                                class="w-56 text-center cursor-pointer rounded-lg border border-slate-300 dark:border-gray-300 px-4 py-3 bg-transparent dark:bg-gray-100 text-white dark:text-slate-800">
                                Select file (Max. 4MB)
                                <input name="avatar" type="file" class="fileName" accept=".jpg,.jpeg,.png,.pdf"
                                    hidden />
                            </label>
                            <div id="fileName" class="text-white/80 dark:text-slate-600">No file chosen.</div>
                        </div>
                        <small class="error error-avatar text-red-400 dark:text-red-600 block mt-1"></small>
                        <small class="text-white/70 dark:text-slate-500">Upload must be .jpg, .png or .pdf.</small>
                    </section>

                    {{-- Proof --}}
                    <section class="mb-8">
                        <h2 class="text-xl font-extrabold text-white dark:text-slate-900 py-4">Proof</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="font-semibold text-white dark:text-slate-900">Proof of motor trade <span
                                        class="text-red-400 dark:text-red-600">*</span></label>
                                <div class="mt-2 flex items-center gap-3">
                                    <label
                                        class="w-56 text-center cursor-pointer rounded-lg border border-slate-300 dark:border-gray-300 px-4 py-3 bg-transparent dark:bg-gray-100 text-white dark:text-slate-800">
                                        Select file (Max. 4MB)
                                        <input name="avatar" type="file" class="fileName"
                                            accept=".jpg,.jpeg,.png,.pdf" hidden />
                                    </label>
                                    <div id="fileName" class="text-white/80 dark:text-slate-600">No file chosen.</div>
                                </div>
                                <small class="error error-avatar text-red-400 dark:text-red-600 block mt-1"></small>
                                <small class="text-white/70 dark:text-slate-500">Upload must be .jpg, .png or .pdf.</small>
                            </div>
                            <div>
                                <label class="font-semibold text-white dark:text-slate-900">Proof of address <span
                                        class="text-red-400 dark:text-red-600">*</span></label>
                                <div class="mt-2 flex items-center gap-3">
                                    <label
                                        class="w-56 text-center cursor-pointer rounded-lg border border-slate-300 dark:border-gray-300 px-4 py-3 bg-transparent dark:bg-gray-100 text-white dark:text-slate-800">
                                        Select file (Max. 4MB)
                                        <input name="avatar" type="file" class="fileName"
                                            accept=".jpg,.jpeg,.png,.pdf" hidden />
                                    </label>
                                    <div id="fileName" class="text-white/80 dark:text-slate-600">No file chosen.</div>
                                </div>
                                <small class="error error-avatar text-red-400 dark:text-red-600 block mt-1"></small>
                                <small class="text-white/70 dark:text-slate-500">Upload must be .jpg, .png or .pdf.</small>
                            </div>


                        </div>
                    </section>

                    {{-- Terms --}}
                    <p class="text-white/80 dark:text-slate-600 text-sm mb-6">
                        By submitting this form, you agree to the
                        <a href="/autoboli//terms" target="_blank"
                            class="text-[#8abfff] dark:text-[#0080ff] underline underline-offset-2">Terms &
                            Conditions</a>
                        and
                        <a href="/autoboli/privacy" target="_blank"
                            class="text-[#8abfff] dark:text-[#0080ff] underline underline-offset-2">Privacy
                            Policy</a>
                        applied by Autoboli LTD.
                    </p>

                    {{-- Submit --}}
                    <div>
                        <button type="submit"
                            class="w-full rounded-lg bg-[#0080ff] hover:bg-[#0059B3] text-white font-semibold py-3 shadow-md transition">
                            Submit Application
                        </button>
                    </div>
                </form>

                <p class="mt-6 text-center text-white/90 dark:text-slate-600">
                    Already have an account?
                    <a href="{{ url('/login') }}"
                        class="font-semibold text-[#8abfff] dark:text-[#0080ff] hover:underline">Log in</a>
                </p>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // AJAX submit (kept)
        $(document).ready(function() {
            $('.register-form').on('submit', function(e) {
                e.preventDefault();
                $('.error').text('');
                const $btn = $('button[type=submit]').prop('disabled', true).text('Loading...');
                const form = this;
                const formData = new FormData(form);

                $.ajax({
                    url: $(form).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success && response.redirect_url) {
                            window.location.href = response.redirect_url;
                        } else {
                            alert(response.message || "Form submitted successfully!");
                        }
                    },
                    error: function(xhr) {
                        if (xhr?.responseJSON?.errors) {
                            $.each(xhr.responseJSON.errors, function(key, messages) {
                                $(`.error-${key}`).text(messages);
                            });
                        } else {
                            alert(xhr?.responseJSON?.message || "Something went wrong");
                        }
                    },
                    complete: function() {
                        $btn.prop('disabled', false).text('Submit Application');
                    }
                });
            });
        });

        // Country code dropdown (kept)
        const selected = document.getElementById("selectedOption");
        const options = document.getElementById("optionList");
        selected?.addEventListener("click", () => options.classList.toggle('hidden'));
        options?.querySelectorAll(".custom-select-option")?.forEach((item) => {
            item.addEventListener("click", () => {
                const flag = item.getAttribute("data-flag");
                const code = item.getAttribute("data-code");
                selected.innerHTML =
                    `<img src="https://flagcdn.com/w40/${flag}.png" alt="${flag}" class="h-5 w-5 rounded-sm"> <span class="text-white dark:text-slate-700">${code}</span>`;
                options.classList.add('hidden');
            });
        });
        document.addEventListener("click", (e) => {
            if (!document.getElementById("customSelect")?.contains(e.target)) {
                options?.classList.add('hidden');
            }
        });

        // File name preview (kept)
        document.querySelectorAll('.fileName').forEach(function(input) {
            input.addEventListener('change', function() {
                const box = this.closest('section,div').querySelector('#fileName');
                if (box) box.textContent = this.files.length ? this.files[0].name : 'No file chosen.';
            });
        });
    </script>
@endsection
