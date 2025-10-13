    <header id="siteNav" class="sticky top-0 z-40 transition-all duration-300 bg-[#000f21] border-b border-[#353F4C]">
        <nav class="container h-14  mx-auto flex items-center justify-between">

            <!-- Logo -->
            <div>
                <a href="{{ url('/') }}"> <img src="{{ asset('public/theme/assets/web/images/nave-icon.png') }}"
                        width="140" alt="Logo" /></a>
            </div>

            <!-- Nav Links -->
            <div class="space-x-5 hidden lg:flex items-center justify-center font-medium h-full">
                <a class="flex items-center justify-center h-full  border-0 hover:border-b hover:border-b-[#0080ff] text-gray-500  hover:text-white    {{ Request::is('autionshadule') ? 'active' : '' }}"
                    href="{{ url('/autionshadule') }}">Auction Solutions</a>
                <a class="flex items-center justify-center h-full  border-0 hover:border-b hover:border-b-[#0080ff] text-gray-500  hover:text-white {{ Request::is('features') ? 'active' : '' }}"
                    href="{{ url('/features') }}">Features</a>
                <a href="{{ url('/pricing') }}"
                    class="flex items-center justify-center h-full  border-0 hover:border-b hover:border-b-[#0080ff] text-gray-500  hover:text-white {{ Request::is('/pricing') ? 'active' : '' }}">Pricing</a>
                <a href="#"
                    class="flex items-center justify-center h-full  border-0  hover:border-b hover:border-b-[#0080ff] text-gray-500  hover:text-white ">Explore</a>
                <a href="#"
                    class="flex items-center justify-center h-full  border-0  hover:border-b hover:border-b-[#0080ff] text-gray-500  hover:text-white ">Resources</a>
                <a href="Find.html"
                    class="flex items-center justify-center h-full  border-0  hover:border-b hover:border-b-[#0080ff] text-gray-500  hover:text-white ">Find
                    Here</a>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-x-2 md:gap-x-4">
                <!-- Theme Toggle Button -->
                <button data-theme-toggle
                    class="cursor-pointer p-1 flex items-center justify-center active:scale-95 transition-all duration-300 shadow-sm text-gray-100 hover:text-[#0080ff] hover:bg-[#0f1c2c] hover:border-gray-600 rounded-full"
                    aria-label="Toggle theme">
                    <span class="material-symbols-outlined text-xl" data-theme-icon>flare</span>
                </button>


                <!-- <a
                            href="{{ url('/dashboard') }}"
                            style="font-size: var(--font-p2); color: var(--nave-text-color)">My
                            Account</a> -->

                <!-- Login Button -->
                <a class="text-white rounded-md px-2 lg:px-4 py-2 font-medium cursor-pointer transform text-sm hidden lg:block"
                    href="{{ url('/login') }}">Sign In</a>
                <!-- Account Button -->
                <a class=" hover:bg-[#0080ff] bg-[#0f1c2c] border border-[#353F4C] text-white dark:text-white rounded-md px-2 lg:px-4 py-2 font-medium cursor-pointer transform text-sm hidden lg:block"
                    href="{{ url('/register') }}">Get Started</a>

                <!-- Hamburger Menu for Mobile -->
                <div class="lg:hidden">
                    <img src="{{ asset('public/theme/assets/web/images/hamburger.png') }}" alt="Menu"
                        width="25" class="block dark:hidden transition-all duration-300" />
                </div>
            </div>
        </nav>
    </header>
