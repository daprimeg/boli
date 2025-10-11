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

        /* dotted baseline used under feature labels */
        .dotline {
            background-image: linear-gradient(to right, var(--dot) 33%, rgba(255, 255, 255, 0) 0);
            background-size: 8px 1px;
            background-repeat: repeat-x;
            background-position: bottom;
        }

        /* sticky header */
        .cmp-table thead th,
        .cmp-table thead td {
            position: sticky;
            top: 72px;
            z-index: 30;
            background: var(--bg2);
        }

        /* ========== Brand (already used) ========== */
        :root {
            --brand: #0080ff;
        }

        /* ========== Your Theme Palettes ========== */
        /* Light Theme Colors */
        :root {
            --light-theme-primary: #ffffff;
            --light-theme-secondary: #f5f6f7;
            --light-text-primary: #000f21;
            --light-text-secondary: #0f1c2c;

            /* Dark Theme Colors */
            --dark-theme-primary: #000f21;
            --dark-theme-secondary: #0f1c2c;
            --dark-text-primary: #ffffff;
            --dark-text-secondary: #f5f6f7;
        }

        /* ========== Semantic tokens used by this page ========== */
        /* We’ll only swap these per theme, the rest of your CSS already uses them */
        :root {
            /* default = dark (so it looks the same if no theme picked yet) */
            --page-bg: var(--dark-theme-primary);
            /* whole page background */
            --surface: var(--dark-theme-secondary);
            /* cards, table body */
            --head: #0b1624;
            /* table header band (slightly darker) */

            --ink: var(--dark-text-primary);
            /* main text color */
            --muted: rgba(255, 255, 255, .70);
            /* secondary text on dark */
            --dot: rgba(255, 255, 255, .14);
            /* dotted underline */
            --plus-bg: rgba(0, 128, 255, .08);
            /* subtle highlight for Plus column */
        }

        /* Light theme mapping (applied when html has .theme-light) */
        html.theme-light {
            --page-bg: var(--light-theme-primary);
            --surface: var(--light-theme-secondary);
            --head: #e9eef3;

            --ink: var(--light-text-primary);
            --muted: rgba(0, 15, 33, .65);
            --dot: rgba(0, 15, 33, .18);
            --plus-bg: rgba(0, 128, 255, .08);
        }

        /* Dark theme mapping (applied when html has .theme-dark) */
        html.theme-dark {
            --page-bg: var(--dark-theme-primary);
            --surface: var(--dark-theme-secondary);
            --head: #0b1624;

            --ink: var(--dark-text-primary);
            --muted: rgba(255, 255, 255, .70);
            --dot: rgba(255, 255, 255, .14);
            --plus-bg: rgba(0, 128, 255, .08);
        }

        /* ========== Small helpers so we can keep your markup terse ========== */
        .ink {
            color: var(--ink) !important;
        }

        .muted {
            color: var(--muted) !important;
        }

        .bg-page {
            background: var(--page-bg) !important;
        }

        .bg-surface {
            background: var(--surface) !important;
        }

        .bg-head {
            background: var(--head) !important;
        }

        /* ===== existing styles (kept intact), just point them to tokens ===== */
        .dotline {
            background-image: linear-gradient(to right, var(--dot) 33%, rgba(255, 255, 255, 0) 0);
            background-size: 8px 1px;
            background-repeat: repeat-x;
            background-position: bottom;
        }

        .cmp-table thead th,
        .cmp-table thead td {
            position: sticky;
            top: 72px;
            z-index: 30;
            background: var(--head);
        }

        @media (min-width:1024px) {
            .cmp-sticky-col {
                position: sticky;
                left: 0;
                z-index: 25;
                background: var(--surface);
            }
        }

        .cmp-table .is-plus {
            position: relative;
        }

        @media (min-width:768px) {
            .cmp-table .is-plus {
                background: var(--plus-bg);
            }

            .cmp-table .is-plus::before {
                content: "";
                position: absolute;
                inset: 0;
                border-left: 1px solid rgba(0, 0, 0, .06);
                border-right: 1px solid rgba(0, 0, 0, .06);
                pointer-events: none;
            }
        }

        .tick {
            color: var(--brand);
            display: inline-flex;
            align-items: center;
            gap: .25rem;
        }

        .cross {
            color: #f07373;
        }

        .badge-pop {
            background: var(--brand);
            color: #fff;
            font-weight: 700;
            font-size: .65rem;
            padding: .25rem .4rem;
            border-radius: .4rem;
            margin-left: .5rem;
        }
    </style>
@endsection

@section('content')
    <section class="min-h-screen w-full bg-page ink pt-28 pb-20">
        <div class="max-w-7xl mx-auto px-6">
            {{-- Header --}}
            <div class="text-center mb-8 md:mb-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-sm">
                    <span class="opacity-80">Monthly</span> <span class="opacity-30">•</span> <span
                        class="opacity-80">Yearly</span> <span class="ml-1 text-[#8abfff] text-xs">Up to 20% OFF</span>
                </div>
                <h1 class="mt-5 text-3xl md:text-5xl font-bold">Flexible plans for AI content creators</h1>
                <p class="mt-2 text-white/70">Choose the best plan for your needs.</p>
            </div>
            {{-- Billing Toggle --}}
            <div class="flex items-center justify-center mb-8">
                <div class="inline-flex rounded-xl border border-white/10 bg-white/5 p-1"> <button id="billMonthly"
                        class="focusable tab-btn active px-4 py-2 text-sm rounded-lg bg-[#1a2640] border border-white/10">Monthly</button>
                    <button id="billYearly" class="focusable tab-btn px-4 py-2 text-sm rounded-lg hover:bg-white/5">Yearly
                        <span class="ml-1 text-[#8abfff]">–20%</span></button>
                </div>
            </div>


            {{-- Pricing Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 py-14 gap-6 lg:gap-0">
                {{-- Free --}}
                <div class="relative rounded-l-xl border border-white/10 bg-[#0f1c2c]/70 p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Free</h3>
                    <div class="mt-2"> <span class="text-3xl font-bold" data-price data-month="0"
                            data-plan="Free">$0</span> <span class="text-white/60">/month</span> </div> <a
                        href="{{ url('/register?plan_id=2') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg border border-white/20 bg-transparent px-4 py-2.5 font-semibold hover:bg-white/10 transition focusable">
                        Get Started </a>
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
                <div class="relative rounded lg:rounded-none border border-white/10 bg-[#0f1c2c] p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Entry</h3>
                    <div class="mt-2"> <span class="text-3xl font-bold" data-price data-month="10"
                            data-plan="Entry">$10</span> <span class="text-white/60">/month</span> </div> <a
                        href="{{ url('/register?plan_id=5') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-white text-black font-semibold px-4 py-2.5 hover:bg-white/90 transition focusable">
                        Get Started </a>
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

                <div class="relative rounded lg:rounded-none border border-white/10 bg-[#0f1c2c] p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Core</h3>
                    <div class="mt-2"> <span class="text-3xl font-bold" data-price data-month="30"
                            data-plan="Core">$30</span> <span class="text-white/60">/month</span> </div> <a
                        href="{{ url('/register') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-white text-black font-semibold px-4 py-2.5 hover:bg-white/90 transition focusable">
                        Get Started </a>
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
                    class="relative border-2 border-[#0080ff]/60 bg-[#0f1c2c] p-5 lg:p-6 ring-1 ring-[#0080ff]/20 shadow-[0_0_0_4px_rgba(0,128,255,.05)] lg:-my-10 rounded-xl">
                    <span
                        class="absolute right-4 -top-3 text-xs bg-[#0080ff] text-white px-2 py-1 rounded-md font-semibold shadow">Most
                        popular</span>
                    <h3 class="text-xl font-semibold">Plus</h3>
                    <div class="mt-2"> <span class="text-3xl font-extrabold" data-price data-month="65"
                            data-plan="Plus">$65</span> <span class="text-white/60">/month</span> </div> <a
                        href="{{ url('/register?plan_id=4') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-[#0080ff] font-semibold px-4 py-2.5 hover:bg-[#006fe0] transition focusable">
                        Get Started </a>
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
                <div class="relative rounded-r-xl border border-white/10 bg-[#0f1c2c] p-5 lg:p-6 card-sheen">
                    <h3 class="text-xl font-semibold">Ultra</h3>
                    <div class="mt-2"> <span class="text-3xl font-bold" data-price data-month="175"
                            data-plan="Ultra">$175</span> <span class="text-white/60">/month</span> </div> <a
                        href="{{ url('/register?plan_id=3') }}"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-lg bg-white text-black font-semibold px-4 py-2.5 hover:bg-white/90 transition focusable">
                        Get Started </a>
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

                <div class="overflow-x-auto rounded-2xl border border-white/10 cmp-wrap">
                    <table class="cmp-table min-w-[980px] w-full text-left bg-surface text-[15px]">
                        {{-- Header with plan names --}}
                        <thead class="border-b border-white/10 text-white/85">
                            <tr class="text-xs md:text-sm">
                                <th class="py-4 px-4 cmp-sticky-col font-semibold"></th>
                                <th class="py-4 px-4">Free</th>
                                <th class="py-4 px-4">Entry</th>
                                <th class="py-4 px-4">Core</th>
                                <th class="py-4 px-4 is-plus">
                                    Plus <span class="badge-pop hidden md:inline-block">Most popular</span>
                                </th>
                                <th class="py-4 px-4">Ultra</th>
                            </tr>
                        </thead>

                        <tbody class="[&>tr:nth-child(even)]:bg-white/5 text-white/90">
                            {{-- =========================
              SECTION: Usage
          ========================== --}}
                            <tr>
                                <td colspan="6" class="py-5 px-4">
                                    <div class="text-white font-semibold">Usage</div>
                                </td>
                            </tr>

                            {{-- Credits --}}
                            <tr class="align-top">
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2 flex items-center gap-2">
                                        Credits <span
                                            class="inline-block text-[10px] px-1.5 py-0.5 rounded bg-white/10 text-white/70">/
                                            period</span>
                                    </div>
                                </th>
                                <td class="py-3 px-4">40 <span class="text-white/60">/day</span></td>
                                <td class="py-3 px-4">3,000 <span class="text-white/60">/month</span></td>
                                <td class="py-3 px-4">15,000 <span class="text-white/60">/month</span></td>
                                <td class="py-3 px-4 is-plus">35,000 <span class="text-white/60">/month</span></td>
                                <td class="py-3 px-4">100,000 <span class="text-white/60">/month</span></td>
                            </tr>

                            {{-- Batch size --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">Batch size</div>
                                </th>
                                <td class="py-3 px-4">1</td>
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">4</td>
                                <td class="py-3 px-4 is-plus">8</td>
                                <td class="py-3 px-4">10</td>
                            </tr>

                            {{-- Content storage history (fixed Free = 30 days) --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">Content storage history</div>
                                </th>
                                <td class="py-3 px-4">30 days</td>
                                <td class="py-3 px-4">Unlimited</td>
                                <td class="py-3 px-4">Unlimited</td>
                                <td class="py-3 px-4 is-plus">Unlimited</td>
                                <td class="py-3 px-4">Unlimited</td>
                            </tr>

                            {{-- Commercial Rights --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">Commercial Rights</div>
                                </th>
                                <td class="py-3 px-4 cross">✖</td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4 is-plus"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                            </tr>

                            {{-- Lossless image format --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">Lossless image format</div>
                                </th>
                                <td class="py-3 px-4 cross">✖</td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4 is-plus"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                            </tr>

                            {{-- Faster image generation --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">Faster image generation</div>
                                </th>
                                <td class="py-3 px-4 cross">✖</td>
                                <td class="py-3 px-4 cross">✖</td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4 is-plus"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                                <td class="py-3 px-4"><span
                                        class="tick material-symbols-outlined align-middle">check_circle</span></td>
                            </tr>

                            {{-- =========================
              SECTION: Image Generator
          ========================== --}}
                            <tr>
                                <td colspan="6" class="py-6 px-4">
                                    <div class="text-white font-semibold">Image Generator</div>
                                </td>
                            </tr>

                            {{-- FLUX1 [schnell] --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">FLUX1 [schnell]</div>
                                </th>
                                <td class="py-3 px-4">40 images</td>
                                <td class="py-3 px-4">3,000 images</td>
                                <td class="py-3 px-4">15,000 images</td>
                                <td class="py-3 px-4 is-plus">35,000 images</td>
                                <td class="py-3 px-4">100,000 images</td>
                            </tr>

                            {{-- FLUX1 [dev] --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">FLUX1 [dev]</div>
                                </th>
                                <td class="py-3 px-4">8 images</td>
                                <td class="py-3 px-4">600 images</td>
                                <td class="py-3 px-4">3,000 images</td>
                                <td class="py-3 px-4 is-plus">7,000 images</td>
                                <td class="py-3 px-4">20,000 images</td>
                            </tr>

                            {{-- Qwen Image --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">Qwen Image</div>
                                </th>
                                <td class="py-3 px-4">1 image</td>
                                <td class="py-3 px-4">120 images</td>
                                <td class="py-3 px-4">600 images</td>
                                <td class="py-3 px-4 is-plus">1,400 images</td>
                                <td class="py-3 px-4">4,000 images</td>
                            </tr>

                            {{-- FLUX1 Kontext [pro] --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">FLUX1 Kontext [pro]</div>
                                </th>
                                <td class="py-3 px-4 cross">✖</td>
                                <td class="py-3 px-4">100 images</td>
                                <td class="py-3 px-4">500 images</td>
                                <td class="py-3 px-4 is-plus">1,166 images</td>
                                <td class="py-3 px-4">3,333 images</td>
                            </tr>

                            {{-- GPT Image (example) --}}
                            <tr>
                                <th class="py-3 px-4 cmp-sticky-col">
                                    <div class="dotline pb-2">GPT Image</div>
                                </th>
                                <td class="py-3 px-4 cross">✖</td>
                                <td class="py-3 px-4">6.6 images</td>
                                <td class="py-3 px-4">333 images</td>
                                <td class="py-3 px-4 is-plus">777 images</td>
                                <td class="py-3 px-4">2,222 images</td>
                            </tr>

                            {{-- …add any remaining rows you need using the same pattern… --}}
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

        (function() {
            const KEY = 'theme'; // 'light' | 'dark'
            const root = document.documentElement;

            function applyTheme(mode) {
                root.classList.remove('theme-light', 'theme-dark');
                root.classList.add(mode === 'light' ? 'theme-light' : 'theme-dark');
            }

            // initial (respect saved, default = dark)
            const saved = localStorage.getItem(KEY) || 'dark';
            applyTheme(saved);

            // any button with data-theme-toggle will toggle
            document.addEventListener('click', (e) => {
                const btn = e.target.closest('[data-theme-toggle]');
                if (!btn) return;
                const next = root.classList.contains('theme-dark') ? 'light' : 'dark';
                localStorage.setItem(KEY, next);
                applyTheme(next);

                // optional: swap any icon text you use
                const icon = btn.querySelector('[data-theme-icon]');
                if (icon) {
                    icon.textContent = (next === 'light') ? 'light_mode' : 'dark_mode';
                }
            });
        })();
    </script>
@endsection
