@extends('web.partial.layout')
@section('css')
    <style>
        .card-sheen::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(120deg, rgba(255, 255, 255, .06), transparent 40%);
            opacity: .4;
            mix-blend-lighten;
            border-radius: inherit;
        }

        .dotline {
            background-image: linear-gradient(to right, rgba(255, 255, 255, .12) 33%, rgba(255, 255, 255, 0) 0);
            background-size: 8px 1px;
            background-repeat: repeat-x;
            background-position: bottom;
        }

        .table-sticky thead th,
        .table-sticky thead td {
            position: sticky;
            top: 72px;
            z-index: 20
        }

        /* subtle focus ring for keyboard users */
        .focusable:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 128, 255, .35)
        }
    </style>
@endsection

@section('content')
    <section class="min-h-screen w-full bg-[#0b1624] text-white pt-28 pb-20">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Header --}}
            <div class="text-center mb-8 md:mb-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-sm">
                    <span class="opacity-80">Monthly</span>
                    <span class="opacity-30">•</span>
                    <span class="opacity-80">Yearly</span>
                    <span class="ml-1 text-[#8abfff] text-xs">Up to 20% OFF</span>
                </div>
                <h1 class="mt-5 text-3xl md:text-4xl font-extrabold">Flexible plans for AI content creators</h1>
                <p class="mt-2 text-white/70">Choose the best plan for your needs.</p>
            </div>

            {{-- Billing Toggle --}}
            <div class="flex items-center justify-center mb-8">
                <div class="inline-flex rounded-xl border border-white/10 bg-white/5 p-1">
                    <button id="billMonthly"
                        class="focusable tab-btn active px-4 py-2 text-sm rounded-lg bg-[#1a2640] border border-white/10">Monthly</button>
                    <button id="billYearly" class="focusable tab-btn px-4 py-2 text-sm rounded-lg hover:bg-white/5">Yearly
                        <span class="ml-1 text-[#8abfff]">–20%</span></button>
                </div>
            </div>

            {{-- Pricing Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-6">
                {{-- Free --}}
                <div class="relative rounded-2xl border border-white/10 bg-[#0f1c2c]/70 p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Free</h3>
                    <div class="mt-2">
                        <span class="text-3xl font-bold" data-price data-month="0" data-plan="Free">$0</span>
                        <span class="text-white/60">/month</span>
                    </div>

                    <a href="{{ url('/register?plan_id=2') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg border border-white/20 bg-transparent px-4 py-2.5 font-semibold hover:bg-white/10 transition focusable">
                        Get Started
                    </a>

                    <div class="mt-5 dotline pb-3 text-sm text-white/70">40 credits / <span class="lowercase">day</span>
                    </div>

                    <ul class="mt-4 space-y-3 text-sm">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Generation — 3 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Editing — 1 project</li>
                    </ul>
                </div>

                {{-- Entry --}}
                <div class="relative rounded-2xl border border-white/10 bg-[#0f1c2c] p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Entry</h3>
                    <div class="mt-2">
                        <span class="text-3xl font-bold" data-price data-month="10" data-plan="Entry">$10</span>
                        <span class="text-white/60">/month</span>
                    </div>

                    <a href="{{ url('/register?plan_id=5') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-white text-black font-semibold px-4 py-2.5 hover:bg-white/90 transition focusable">
                        Get Started
                    </a>

                    <div class="mt-5 dotline pb-3 text-sm text-white/70">3k credits / <span class="lowercase">month</span>
                    </div>

                    <ul class="mt-4 space-y-3 text-sm">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Generation — 9 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Video
                            Generation — 18 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Editing — 5 projects</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Parallel
                            jobs — 2 gens at a time</li>
                    </ul>
                </div>

                {{-- Core --}}
                <div class="relative rounded-2xl border border-white/10 bg-[#0f1c2c] p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Core</h3>
                    <div class="mt-2">
                        <span class="text-3xl font-bold" data-price data-month="30" data-plan="Core">$30</span>
                        <span class="text-white/60">/month</span>
                    </div>

                    <a href="{{ url('/register') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-white text-black font-semibold px-4 py-2.5 hover:bg-white/90 transition focusable">
                        Get Started
                    </a>

                    <div class="mt-5 dotline pb-3 text-sm text-white/70">15k credits / <span class="lowercase">month</span>
                    </div>

                    <ul class="mt-4 space-y-3 text-sm">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Generation — 10 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Video
                            Generation — 24 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Editing — 15 projects</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Parallel
                            jobs — 4 gens at a time</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Model
                            Training</li>
                    </ul>
                </div>

                {{-- Plus (Most popular) --}}
                <div
                    class="relative rounded-2xl border-2 border-[#0080ff]/60 bg-[#0f1c2c] p-5 lg:p-6 ring-1 ring-[#0080ff]/20 shadow-[0_0_0_4px_rgba(0,128,255,.05)]">
                    <span
                        class="absolute right-4 -top-3 text-xs bg-[#0080ff] text-white px-2 py-1 rounded-md font-semibold shadow">Most
                        popular</span>
                    <h3 class="text-xl font-semibold">Plus</h3>
                    <div class="mt-2">
                        <span class="text-3xl font-extrabold" data-price data-month="65" data-plan="Plus">$65</span>
                        <span class="text-white/60">/month</span>
                    </div>

                    <a href="{{ url('/register?plan_id=4') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-[#0080ff] font-semibold px-4 py-2.5 hover:bg-[#006fe0] transition focusable">
                        Get Started
                    </a>

                    <div class="mt-5 dotline pb-3 text-sm text-white/80">35k credits / <span class="lowercase">month</span>
                    </div>

                    <ul class="mt-4 space-y-3 text-sm">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Generation — 10 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Video
                            Generation — 24 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Editing — 50 projects</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Parallel
                            jobs — 8 gens at a time</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Model
                            Training</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Top-up
                            Credits</li>
                    </ul>
                </div>

                {{-- Ultra --}}
                <div class="relative rounded-2xl border border-white/10 bg-[#0f1c2c] p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Ultra</h3>
                    <div class="mt-2">
                        <span class="text-3xl font-bold" data-price data-month="175" data-plan="Ultra">$175</span>
                        <span class="text-white/60">/month</span>
                    </div>

                    <a href="{{ url('/register?plan_id=3') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-white text-black font-semibold px-4 py-2.5 hover:bg-white/90 transition focusable">
                        Get Started
                    </a>

                    <div class="mt-5 dotline pb-3 text-sm text-white/70">100k credits / <span
                            class="lowercase">month</span></div>

                    <ul class="mt-4 space-y-3 text-sm">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Generation — 10 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Video
                            Generation — 24 AI models</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Image
                            Editing — Unlimited projects</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Parallel
                            jobs — 10 gens at a time</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Model
                            Training</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check mt-1 text-[#8abfff]"></i> Top-up
                            Credits</li>
                    </ul>
                </div>
            </div>

            {{-- Comparison Table --}}
            <div class="mt-16">
                <h2 class="text-2xl font-semibold mb-5">Compare features and model access across all plans</h2>
                <div class="overflow-x-auto rounded-2xl border border-white/10 table-sticky">
                    <table class="min-w-[900px] w-full text-left bg-[#0f1c2c]">
                        <thead class="bg-[#0b1624] border-b border-white/10">
                            <tr class="text-sm text-white/80">
                                <th class="py-4 px-4">Choose Your Plan</th>
                                <th class="py-4 px-4">Free</th>
                                <th class="py-4 px-4">Entry</th>
                                <th class="py-4 px-4">Core</th>
                                <th class="py-4 px-4">Plus</th>
                                <th class="py-4 px-4">Ultra</th>
                            </tr>
                        </thead>
                        <tbody class="[&>tr:nth-child(even)]:bg-white/5">
                            {{-- Example block (you can paste your existing rows here; I kept the structure lean) --}}
                            <tr>
                                <th class="py-3 px-4 text-white/90">Auction Overview</th>
                                <td class="py-3 px-4">✖</td>
                                <td class="py-3 px-4">✖</td>
                                <td class="py-3 px-4">✖</td>
                                <td class="py-3 px-4"><span
                                        class="material-symbols-outlined text-[#8abfff] align-middle">check_circle</span>
                                </td>
                                <td class="py-3 px-4"><span
                                        class="material-symbols-outlined text-[#8abfff] align-middle">check_circle</span>
                                </td>
                            </tr>

                            {{-- Paste the rest of your rows from the old table here.
                 Keep the same content; the styling will carry over. --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        // Billing toggle logic (Monthly vs Yearly)
        const monthlyBtn = document.getElementById('billMonthly');
        const yearlyBtn = document.getElementById('billYearly');
        const priceEls = document.querySelectorAll('[data-price]');

        function setActive(btn, active) {
            btn.classList.toggle('bg-[#1a2640]', active);
            btn.classList.toggle('border', active);
            btn.classList.toggle('border-white/10', active);
        }

        function asCurrency(v) {
            return '$' + v.toString();
        }

        function applyBilling(mode) {
            priceEls.forEach(el => {
                const month = Number(el.dataset.month || 0);
                let display = month;
                if (mode === 'yearly') {
                    display = Math.round(month * 12 * 0.8); // 20% off
                }
                el.textContent = asCurrency(display);
            });
            if (mode === 'yearly') {
                setActive(yearlyBtn, true);
                setActive(monthlyBtn, false);
                yearlyBtn.classList.add('bg-[#1a2640]', 'border', 'border-white/10');
                monthlyBtn.classList.remove('bg-[#1a2640]', 'border', 'border-white/10');
            } else {
                setActive(monthlyBtn, true);
                setActive(yearlyBtn, false);
                monthlyBtn.classList.add('bg-[#1a2640]', 'border', 'border-white/10');
                yearlyBtn.classList.remove('bg-[#1a2640]', 'border', 'border-white/10');
            }
        }

        monthlyBtn.addEventListener('click', () => applyBilling('monthly'));
        yearlyBtn.addEventListener('click', () => applyBilling('yearly'));
        // default
        applyBilling('monthly');
    </script>
@endsection
