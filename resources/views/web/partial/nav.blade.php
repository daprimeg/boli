    <header id="siteNav" class="sticky top-0 z-40 transition-all duration-300">
        <nav class="container h-14 py-2 mx-auto p-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div>
                    <img src="{{asset('public/theme/assets/web/images/nave-icon.png')}}" alt="Logo" />
                </div>

                <!-- Nav Links -->
                <div class="space-x-5 hidden lg:block font-medium">
                    <a class="py-3 border-0 hover:border-b-2 hover:border-b-[#0080ff] text-gray-500 hover:text-[#0f1c2c] dark:hover:text-white inline-block   {{ Request::is('autionshadule') ? 'active' : '' }}"
                        href="{{ url('/autionshadule') }}">Auction Solutions</a>
                    <a class="py-3 border-0 hover:border-b-2 hover:border-b-[#0080ff] text-gray-500 hover:text-[#0f1c2c] dark:hover:text-white inline-block {{ Request::is('features') ? 'active' : '' }}"
                        href="{{ url('/features') }}">Features</a>
                    <a href="{{ url('/pricing') }}"
                        class="py-3 border-0 hover:border-b-2 hover:border-b-[#0080ff] text-gray-500 hover:text-[#0f1c2c] dark:hover:text-white inline-block {{ Request::is('/pricing') ? 'active' : '' }}">Pricing</a>
                    <a href="#"
                        class="py-3 border-0 hover:border-b-2 hover:border-b-[#0080ff] text-gray-500 hover:text-[#0f1c2c] dark:hover:text-white inline-block">Explore</a>
                    <a href="#"
                        class="py-3 border-0 hover:border-b-2 hover:border-b-[#0080ff] text-gray-500 hover:text-[#0f1c2c] dark:hover:text-white inline-block">Resources</a>
                    <a href="Find.html"
                        class="py-3 border-0 hover:border-b-2 hover:border-b-[#0080ff] text-gray-500 hover:text-[#0f1c2c] dark:hover:text-white inline-block">Find
                        Here</a>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-x-2 md:gap-x-4">
                    <!-- Theme Toggle Button -->
                    <button id="themeToggle"
                        class="cursor-pointer p-1 px-2 rounded-full border border-gray-300 bg-white text-gray-700 hover:bg-blue-100 active:scale-95 transition-all duration-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 dark:hover:bg-blue-600 dark:shadow-md">
                        <span id="themeIcon"
                            class="material-symbols-outlined transition-transform duration-300 hover:rotate-12 text-xl">
                        </span>
                    </button>

                    <!-- <a
              href="{{ url('/dashboard') }}"
              style="font-size: var(--font-p2); color: var(--nave-text-color)">My
              Account</a> -->

                    <!-- Login Button -->
                    <a class="text-white dark:text-white rounded-md px-2 lg:px-4 py-2 font-medium cursor-pointer transform text-sm hidden lg:block"
                        href="{{ url('/login') }}">Sign In</a>
                    <!-- Account Button -->
                    <a class=" hover:bg-[#0080ff] bg-[#0f1c2c] border border-[#E2E8F0] dark:border-[#353F4C] text-white dark:text-white rounded-md px-2 lg:px-4 py-2 font-medium cursor-pointer transform text-sm hidden lg:block"
                        href="{{ url('/register') }}">Get Started</a>

                    <!-- Hamburger Menu for Mobile -->
                    <div class="lg:hidden">
                        <!-- Light Mode Icon -->
                        <img src="/assets/images/hamburger.png" alt="Menu" width="25"
                            class="hidden dark:block transition-all duration-300" />

                        <!-- Dark Mode Icon -->
                        <img src="/assets/images/hamburger-dark.png" alt="Menu" width="25"
                            class="block dark:hidden transition-all duration-300" />
                    </div>
                </div>
            </div>
        </nav>
    </header>
