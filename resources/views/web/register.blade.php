@extends('web.partial.layout')
@section('hideNavbar', true)
@section('hideFooter', true)

@section('css')
    <style>
        :root {
            --primary: #0080ff;
        }

        /* Component styles using Tailwind via @apply */
        @layer components {
            .sign-input {
                @apply block w-full rounded-xl bg-white border border-slate-200 px-4 py-3 text-slate-900 placeholder-slate-400 transition ease-out duration-200;
            }

            .sign-input:focus {
                @apply outline-none ring-4 ring-[color:var(--primary)]/15 border-[color:var(--primary)] translate-y-[-1px];
            }

            .card {
                @apply rounded-2xl border border-slate-200/60 bg-white/90 backdrop-blur-md shadow-xl;
                box-shadow: 0 24px 60px -30px rgba(2, 8, 23, .35);
            }

            .btn-primary {
                @apply inline-flex items-center justify-center rounded-xl font-semibold text-white px-5 py-3 transition duration-150 ease-out;
                background: linear-gradient(135deg, var(--primary) 0%, #0051D5 100%);
            }

            .btn-primary:hover {
                filter: brightness(1.06);
                transform: translateY(-1px);
            }

            .btn-primary:active {
                transform: translateY(0);
            }
        }

        /* Divider */
        .divider {
            position: relative;
            margin: 1rem 0
        }

        .divider::before {
            content: "";
            display: block;
            height: 1px;
            background: rgba(2, 8, 23, .12)
        }

        .divider>span {
            position: absolute;
            left: 50%;
            top: -.65rem;
            transform: translateX(-50%);
            padding: 0 .5rem;
            background: #fff;
            color: #64748b;
            font-weight: 700;
            font-size: .7rem;
            letter-spacing: .15em;
            border-radius: 999px;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(28px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        .animate-slideUp {
            animation: slideUp .7s cubic-bezier(.2, .7, .2, 1) both;
        }

        .reveal {
            opacity: 0;
            transform: translateY(14px);
            transition: all .6s cubic-bezier(.2, .7, .2, 1);
        }

        .reveal.in {
            opacity: 1;
            transform: none;
        }
    </style>
@endsection

@section('content')
    <section class="relative min-h-screen overflow-hidden bg-gradient-to-b from-white to-white/95">

        <!-- Diagonal brand band + dotted texture -->
        {{-- <div class="pointer-events-none absolute bottom-0 left-0 w-full h-[42%]">
            <div class="absolute inset-0 -skew-y-3 origin-bottom-left bg-[color:var(--primary)]"></div>
            <div
                class="absolute inset-0 -skew-y-3 origin-bottom-left opacity-25
                bg-[radial-gradient(#6b21a8_1.2px,transparent_1.2px)]
                [background-size:18px_18px]">
            </div>
        </div> --}}

        <div class="relative z-10 max-w-6xl mx-auto px-4 py-10">
            <!-- Heading -->
            <header class="text-center mb-8 animate-slideUp">
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
                    Create your Autoboli Account
                </h1>
                <p class="mt-2 text-slate-600">Built for dealers & traders — fast onboarding, powerful insights.</p>
            </header>

            <!-- Card -->
            <div class="card p-6 md:p-8 animate-slideUp bg-white">
                <!-- Alert (kept) -->
                <div class="rounded-xl border border-red-500/30 bg-red-500/10 text-red-800 p-3 text-sm mb-6">
                    <p class="mb-2">
                        <strong>AUTOBOLI LTD</strong> is exclusively for independent dealers, motor dealers, traders, and
                        individuals
                        engaged in the motor business. By using our platform, you confirm that you meet this criterion.
                    </p>
                    <p>
                        <em>We may suspend/terminate accounts that do not meet eligibility.</em>
                        <a href="#" class="text-[color:var(--primary)] underline underline-offset-2">Read more</a>
                    </p>
                </div>

                <!-- Google -->
                <div class="mb-4">
                    <a href="{{ route('google.login') }}"
                        class="w-full inline-flex items-center justify-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3
                  text-slate-800 font-medium hover:bg-slate-50 transition">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="h-5 w-5"
                            alt="G">
                        Continue with Google
                    </a>
                </div>

                <div class="divider"><span>OR</span></div>

                <form class="register-form" enctype="multipart/form-data" action="{{ url('/register_submit') }}"
                    method="post">
                    <input type="hidden" name="payment_method" value="" />
                    @csrf

                    <!-- Company Details -->
                    <section class="mb-8">
                        <h2 class="text-xl font-extrabold text-slate-900">Company Details</h2>
                        <div class="h-1 w-24 rounded bg-gradient-to-r from-[color:var(--primary)] to-[#0051D5] mt-1 mb-4">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input name="companyName" value="My Company" type="text" class="sign-input"
                                    placeholder="Company / Trading or Business Name" />
                                <small class="error error-companyName text-red-600"></small>
                            </div>
                            <div>
                                <input name="companyAddress1" value="Company Address 1" type="text" class="sign-input"
                                    placeholder="Company Address 1" />
                                <small class="error error-companyAddress1 text-red-600"></small>
                            </div>

                            <div>
                                <select name="businessType" class="sign-input">
                                    <option value="">Business Type</option>
                                    <option selected value="dealer">Motor Dealer</option>
                                    <option value="trader">Motor Trader</option>
                                    <option value="independent">Independent Dealer</option>
                                    <option value="other">Other</option>
                                </select>
                                <small class="error error-businessType text-red-600"></small>
                            </div>
                            <div>
                                <input name="companyAddress2" value="Company Address 2" type="text" class="sign-input"
                                    placeholder="Company Address 2 (Optional)" />
                                <small class="error error-companyAddress2 text-red-600"></small>
                            </div>

                            <div>
                                <input name="companyReg" value="Company Reg. Number" type="text" class="sign-input"
                                    placeholder="Company Reg. Number (Optional)" />
                                <small class="error error-companyReg text-red-600"></small>
                            </div>
                            <div>
                                <input name="townCity" value="Town / City" type="text" class="sign-input"
                                    placeholder="Town / City" />
                                <small class="error error-townCity text-red-600"></small>
                            </div>

                            <div>
                                <input name="website" value="https://autodroid.co.uk/" type="url" class="sign-input"
                                    placeholder="Website (Optional)" />
                                <small class="error error-website text-red-600"></small>
                            </div>
                            <div>
                                <input name="country" value="Country" type="text" class="sign-input"
                                    placeholder="Country" />
                                <small class="error error-country text-red-600"></small>
                            </div>

                            <div>
                                <input name="businessEmail" value="business@gmail.com" type="email" class="sign-input"
                                    placeholder="Business Email (Optional)" />
                                <small class="error error-businessEmail text-red-600"></small>
                            </div>
                            <div>
                                <input name="postcode" value="123" type="text" class="sign-input"
                                    placeholder="Postcode / Zip code" />
                                <small class="error error-postcode text-red-600"></small>
                            </div>

                            <div>
                                <select name="motorTradeInsurance" class="sign-input">
                                    <option value="">Motor Trade Insurance? (Optional)</option>
                                    <option selected value="yes">Yes</option>
                                    <option value="no">No</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <small class="error error-postcode text-red-600"></small>
                            </div>
                            <div>
                                <input name="telephone" value="03112239342" type="tel" class="sign-input"
                                    placeholder="Telephone" />
                                <small class="error error-telephone text-red-600"></small>
                            </div>

                            <div>
                                <input name="vatNumber" value="123" type="text" class="sign-input"
                                    placeholder="VAT Number (if applicable)" />
                                <small class="error error-vatNumber text-red-600"></small>
                            </div>
                        </div>
                    </section>

                    <!-- Personal Information -->
                    <section class="mb-8">
                        <h2 class="text-xl font-extrabold text-slate-900">Personal Information</h2>
                        <div class="h-1 w-24 rounded bg-gradient-to-r from-[color:var(--primary)] to-[#0051D5] mt-1 mb-3">
                        </div>
                        <p class="text-slate-600 text-sm mb-4">
                            Add details for proprietors/partners/directors and your authorized buyer. Include proof of
                            identity
                            (driving license or passport in .jpg, .png, or .pdf).
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <input name="firstName" class="sign-input" value="Owais" placeholder="First Name" />
                                <small class="error error-firstName text-red-600"></small>
                            </div>
                            <div>
                                <input name="surname" class="sign-input" value="Azam" placeholder="Surname" />
                                <small class="error error-surname text-red-600"></small>
                            </div>
                            <div>
                                <input name="title" class="sign-input" value="Owais Azam" placeholder="Title" />
                                <small class="error error-title text-red-600"></small>
                            </div>

                            <div>
                                <input name="jobTitle" value="Dev" class="sign-input" placeholder="Job Title" />
                                <small class="error error-jobTitle text-red-600"></small>
                            </div>

                            <!-- Custom phone select (kept) -->
                            <div class="flex rounded-xl overflow-hidden border border-slate-200 bg-white">
                                <div class="custom-select-wrapper" id="customSelect">
                                    <div class="custom-select-selected px-3 flex items-center gap-2" id="selectedOption">
                                        <img src="https://flagcdn.com/w40/gb.png" alt="GB"
                                            class="h-5 w-5 rounded-sm">
                                        <span class="text-slate-700">+44</span>
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
                                    class="flex-1 px-4 py-3 outline-none" style="border-left:1px solid rgba(15,23,42,.12)"
                                    placeholder="Phone Number" />
                            </div>
                            <small class="error error-phone text-red-600 md:col-span-2"></small>

                            <div>
                                <input type="email" value="iamowaisazam@gmail1.com" name="personalEmail"
                                    class="sign-input" placeholder="Personal Email" />
                                <small class="error error-personalEmail text-red-600"></small>
                            </div>
                            <div>
                                <input type="password" value="owais123" name="password" class="sign-input"
                                    placeholder="Password" />
                                <small class="error error-password text-red-600"></small>
                            </div>
                        </div>
                    </section>

                    <!-- File upload -->
                    <section class="mb-6 max-w-md">
                        <label class="font-semibold text-slate-900">Profile Image <span
                                class="text-red-600">*</span></label>
                        <div class="mt-2 flex items-center gap-3">
                            <label class="sign-input cursor-pointer w-56 text-center">
                                Select file (Max. 4MB)
                                <input name="avatar" type="file" class="fileName" accept=".jpg,.jpeg,.png,.pdf"
                                    hidden />
                            </label>
                            <div id="fileName" class="text-slate-600">No file chosen.</div>
                        </div>
                        <small class="error error-avatar text-red-600 block mt-1"></small>
                        <small class="text-slate-500">Upload must be .jpg, .png or .pdf.</small>
                    </section>

                    <!-- Terms -->
                    <p class="text-slate-600 text-sm mb-6">
                        By submitting this form, you agree to the
                        <a href="#" class="text-[color:var(--primary)] underline underline-offset-2">Terms &
                            Conditions</a>
                        and
                        <a href="#" class="text-[color:var(--primary)] underline underline-offset-2">Privacy
                            Policy</a>
                        applied by Autoboli LTD.
                    </p>

                    <!-- Submit -->
                    <div class="grid">
                        <button type="submit" class="btn-primary">Submit Application</button>
                    </div>
                </form>
            </div>

            <p class="text-center mt-6 text-slate-600">
                Already have an account?
                <a href="{{ url('/login') }}" class="text-[color:var(--primary)] font-semibold hover:underline">Log in</a>
            </p>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Reveal-on-scroll for small motion
        (function() {
            const els = document.querySelectorAll('.reveal');
            if (!('IntersectionObserver' in window)) {
                els.forEach(e => e.classList.add('in'));
                return;
            }
            const io = new IntersectionObserver((entries, obs) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('in');
                        obs.unobserve(e.target);
                    }
                });
            }, {
                threshold: .15
            });
            els.forEach(el => io.observe(el));
        })();

        // --- Your existing AJAX flow (unchanged) ---
        $(document).ready(function() {
            $('.register-form').on('submit', async function(e) {
                e.preventDefault();
                $('.error').text('');
                const $btn = $('button[type=submit]').prop('disabled', true).text('Loading');
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

        // Country code dropdown (kept, but Tailwind-friendly)
        const selected = document.getElementById("selectedOption");
        const options = document.getElementById("optionList");
        selected?.addEventListener("click", () => {
            options.classList.toggle('hidden');
        });
        options?.querySelectorAll(".custom-select-option")?.forEach((item) => {
            item.addEventListener("click", () => {
                const flag = item.getAttribute("data-flag");
                const code = item.getAttribute("data-code");
                selected.innerHTML =
                    `<img src="https://flagcdn.com/w40/${flag}.png" alt="${flag}" class="h-5 w-5 rounded-sm"> <span class="text-slate-700">${code}</span>`;
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
