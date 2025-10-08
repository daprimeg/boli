<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AUTOBILI LTD - Vehicle Auction Data</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,500,0,0&icon_names=check_circle" />
    <link rel="icon" type="image/x-icon" href="{{ asset('public/theme/fav.png')}}" />

    {{-- <link rel="stylesheet" href="{{asset('/public/theme/styles.css')}}" /> --}}
    <!-- Hugeicons Free Icon Font -->
    <link rel="stylesheet" href="https://cdn.hugeicons.com/1.0.0/hugeicons.css">

    <link rel="stylesheet" href="{{asset('public/theme/css/toastr.min.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/theme/assets/web/css/loader.css')}}" />
    <link rel="stylesheet" href="{{asset('public/theme/assets/web/css/home.css')}}" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Dark Mode Configuration -->
    <script>
      tailwind.config = {
        darkMode: "class", // Enable class-based dark mode
      };
    </script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      body {
        font-family: "Inter", sans-serif !important;
      }

      /* Optional: Improve backdrop rendering */
      @supports (
        (-webkit-backdrop-filter: blur(0)) or (backdrop-filter: blur(0))
      ) {
        #siteNav.backdrop-blur-xl {
          -webkit-backdrop-filter: blur(16px);
          backdrop-filter: blur(16px);
        }
      }
    </style>
    
     @yield('css')
  </head>
  <body>

     @include('web.partial.nav')
     @yield('content')
   
     
<footer class="bg-[#071524] text-[#B2C0CE] px-8 md:px-16 lg:px-32 py-12">
  <div class="max-w-7xl mx-auto space-y-10">

    <!-- Top Section -->
    <div>
      <h2 class="text-2xl font-semibold text-white">AUTOBOLI Ltd</h2>
      <p class="mt-3 text-[#AAB8C5] max-w-3xl">
        Helping dealers, exporters, and traders buy smarter with real-time auction data from across the UK & Japan. 
        Save money, reduce risk, and grow your automotive business — all in one platform.
      </p>
    </div>

    <!-- Links Section -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 md:gap-12 text-sm">
      <!-- Column 1 -->
      <div>
        <h3 class="text-white font-semibold mb-2">AutoBoli</h3>
        <ul class="space-y-1">
          <li><a href="#" class="hover:text-white transition">about us</a></li>
          <li><a href="#" class="hover:text-white transition">customer</a></li>
          <li><a href="#" class="hover:text-white transition">community</a></li>
          <li><a href="#" class="hover:text-white transition">Affiliate & Referrals</a></li>
          <li><a href="#" class="hover:text-white transition">News</a></li>
          <li><a href="#" class="hover:text-white transition">Brand</a></li>
          <li><a href="#" class="hover:text-white transition">Bidding</a></li>
          <li><a href="#" class="hover:text-white transition">Roadmap</a></li>
        </ul>
      </div>

      <!-- Column 2 -->
      <div>
        <h3 class="text-white font-semibold mb-2">Learn</h3>
        <ul class="space-y-1">
          <li><a href="#" class="hover:text-white transition">Actions</a></li>
          <li><a href="#" class="hover:text-white transition">Actions</a></li>
          <li><a href="#" class="hover:text-white transition">Actions</a></li>
          <li><a href="#" class="hover:text-white transition">Actions</a></li>
          <li><a href="#" class="hover:text-white transition">Actions</a></li>
        </ul>
      </div>

      <!-- Column 3 -->
      <div>
        <h3 class="text-white font-semibold mb-2">Resources</h3>
        <ul class="space-y-1">
          <li><a href="#" class="hover:text-white transition">Guidance</a></li>
          <li><a href="#" class="hover:text-white transition">Explore</a></li>
          <li><a href="#" class="hover:text-white transition">featuristic panels</a></li>
          <li><a href="#" class="hover:text-white transition">blog</a></li>
          <li><a href="#" class="hover:text-white transition">support</a></li>
          <li><a href="#" class="hover:text-white transition">vin search</a></li>
          <li><a href="#" class="hover:text-white transition">find auc</a></li>
          <li><a href="#" class="hover:text-white transition">vehicle value</a></li>
        </ul>
      </div>

      <!-- Column 4 -->
      <div>
        <h3 class="text-white font-semibold mb-2">Connect</h3>
        <ul class="space-y-1">
          <li><a href="#" class="hover:text-white transition">Facebook</a></li>
          <li><a href="#" class="hover:text-white transition">Insta</a></li>
          <li><a href="#" class="hover:text-white transition">Tiktok</a></li>
          <li><a href="#" class="hover:text-white transition">X</a></li>
        </ul>
      </div>
    </div>

    <!-- Bottom Section -->
    <div class="border-t border-gray-700 pt-6 text-sm text-[#8C9BAB]">
      <p>© AUTOBOLI Ltd 2025. All rights reserved.</p>
      <p class="mt-2">Proudly built & hosted with secure infrastructure in the UK & EU.</p>
    </div>
  </div>
</footer>
  </body>

  <script src="{{asset('/public/themeadmin/assets/js/jquery.js')}}"></script>
  <script src="{{asset('/public/theme/js/bootstrap.js')}}"></script>
  <script src="{{asset('/public/theme/app.js')}}"></script>
  <script src="{{asset('public/theme/js/toastr.min.js')}}"></script>
  
   @yield('js')
 <script>
      // Loader hide logic
      window.addEventListener("load", () => {
        setTimeout(() => {
          const loader = document.getElementById("loader");
          loader.classList.add("opacity-0");
          setTimeout(() => {
            loader.style.display = "none";
          }, 500);
        }, 1500);
      });


      // Simple button-controlled scroll for the snap carousel
  (function () {
    const track = document.getElementById('resTrack');
    const prev  = document.getElementById('resPrev');
    const next  = document.getElementById('resNext');

    function move(dir = 1) {
      // one card width + gap
      const card = track.querySelector('article');
      if (!card) return;
      const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap) || 24;
      const delta = (card.getBoundingClientRect().width + gap) * dir;
      track.scrollBy({ left: delta, behavior: 'smooth' });
    }

    prev.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));

    // keyboard accessibility when track is focused
    track.setAttribute('tabindex', '0');
    track.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') move(1);
      if (e.key === 'ArrowLeft')  move(-1);
    });
  })();


(() => {
  const els = document.querySelectorAll('.stat-number');
  if (!els.length) return;

  // Count-up with easing
  function animate(el){
    const target = Number(el.dataset.target || 0);
    const suffix = el.dataset.suffix || '';
    const dur = 1200; // ms
    const start = performance.now();

    function tick(now){
      const p = Math.min(1, (now - start) / dur);
      // easeOutCubic
      const eased = 1 - Math.pow(1 - p, 3);
      const value = Math.floor(target * eased);
      el.textContent = value.toLocaleString() + suffix;
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  const io = new IntersectionObserver((entries, obs) => {
    entries.forEach(e => {
      if (e.isIntersecting){
        animate(e.target);
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.4 });

  els.forEach(el => io.observe(el));
})();

  (function () {
  const els = document.querySelectorAll('.counter');
  if (!els.length) return;

  function animate(el) {
    const target = +el.dataset.target || 0;
    const dur = 1200; // ms
    const start = performance.now();
    function tick(now) {
      const p = Math.min(1, (now - start) / dur);
      const eased = 1 - Math.pow(1 - p, 3); // easeOutCubic
      el.textContent = Math.floor(target * eased).toLocaleString();
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  // reveal-on-view (run once)
  const io = new IntersectionObserver((entries, obs) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        animate(e.target);
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.4 });

  els.forEach(el => io.observe(el));
})();


      // --- Sticky, blurry navbar on scroll ---
      const siteNav = document.getElementById("siteNav");

      function updateNavOnScroll() {
        const scrolled = window.scrollY > 8; // tweak threshold if you like
        siteNav.classList.toggle("backdrop-blur-xl", scrolled);
        siteNav.classList.toggle("bg-white/60", scrolled);
        siteNav.classList.toggle("dark:bg-gray-900/40", scrolled);
        // siteNav.classList.toggle("border-b", scrolled);
        siteNav.classList.toggle("border-white/40", scrolled);
        siteNav.classList.toggle("dark:border-white/10", scrolled);
        siteNav.classList.toggle("shadow-sm", scrolled);
      }

      // Run once on load and on scroll
      updateNavOnScroll();
      window.addEventListener("scroll", updateNavOnScroll, { passive: true });

      const toggleBtn = document.getElementById("themeToggle");
      const html = document.documentElement;
      const iconImg = document.getElementById("themeIcon");

      // Function to update icon based on current theme
      function updateIcon() {
  const icon = document.getElementById("themeIcon");
  const isDark = html.classList.contains("dark");

  // Change the icon name
  icon.textContent = isDark ? "dark_mode" : "light_mode";

        icon.src = isDark
          ? "/assets/images/night-mode.png"
          : "/assets/images/day-mode.png";
        icon.alt = isDark ? "Night Mode" : "Day Mode";
      }

      if (localStorage.theme === "dark") {
        html.classList.add("dark");
      }
      updateIcon(); // Set correct icon on load

      // Toggle theme on button click
      toggleBtn.addEventListener("click", () => {
        if (html.classList.contains("dark")) {
          html.classList.remove("dark");
          localStorage.theme = "light";
        } else {
          html.classList.add("dark");
          localStorage.theme = "dark";
        }
        updateIcon();
      });

      // Reveal the four cards on scroll (once)
      (function () {
        const cards = document.querySelectorAll("#features .feat-card");
        if (!("IntersectionObserver" in window) || !cards.length) {
          cards.forEach((c) => c.classList.add("revealed"));
          return;
        }
        const io = new IntersectionObserver(
          (entries, obs) => {
            entries.forEach((e) => {
              if (e.isIntersecting) {
                e.target.classList.add("revealed");
                obs.unobserve(e.target);
              }
            });
          },
          { threshold: 0.15 }
        );
        cards.forEach((c) => io.observe(c));
      })();
    </script>
</html>
