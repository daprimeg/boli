@extends('web.partial.layout')



@section('css')

<style>
  
/* <Hero sectioon> */

/* hero img  */
.hero-img {
  margin-top: 10rem;
  height: 20vh;
  width: 80vw;
  object-fit: cover;
}

/* hersection end  */

/* carosel section */

/*carsel section title*/
.hero-title {
  font-size: clamp(2rem, 8vw, 82px);
  line-height: 1.1;
}
/*carsel section para*/

.hero-subtitle {
  font-size: clamp(1rem, 2.5vw, 1.25rem);
}

/*carsel section para btn*/

.testimonials-btn {
  font-size: clamp(1rem, 2.5vw, 1.25rem) !important;
  padding: 0.75rem 1.5rem;
}

/* hero section  wraper */
.carousel-wrapper {
  position: relative;
  height: 65vh;
  overflow: hidden;
  min-height: 400px;
}





/* .carousel-row */
.carousel-row {
  display: flex;
  flex-wrap: nowrap;
  height: 100%;
  overflow-x: hidden;
  scroll-behavior: smooth;
  padding: 0 1rem;
}

/* .carousel-card / */
.carousel-card {
  flex: 0 0 20%;
  margin: 0 16px;
  min-width: 280px;
}

/* carousel-card .card */
.carousel-card .card {
  height: 100%;
  border: none;
  border-radius: 20px;
  overflow: hidden;
  position: relative;
}

/* carousel-card card img */
.carousel-card .card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}


/* carousel-card and card-body */
.carousel-card .card-body {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 3rem 1rem;
  color: var(--white-text);
  z-index: 2;
  text-align: left;
  background: linear-gradient(to top, #000f21be, transparent);
}

/* carosel btn */
.arrow-btn {
  position: absolute;
  top: 50%;
  font-size: 20px;
  transform: translateY(-50%);
  width: 64px;
  height: 64px;
  border-radius: 50%;
  border: none;
  color: var(--text-color) !important;
  background-color: var(--white-text);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  cursor: pointer;
}
/* carosel btn hover */

.arrow-btn:hover {
  background-color: var(--text-color);
  color: var(--white-text) !important;
}

/* prev btn */
.arrow-prev {
  left: 24%;
}
/* /next */
.arrow-next {
  right: 14%;
}


/* card video */
.card video {
  position: absolute;
  top: 0;
  left: 0;
  object-fit: cover;
  width: 100%;
  height: 100%;
  z-index: 1;
  transition: 0.4s ease;
}


/* card grup hover  */
.group:hover .card-body {
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
}


/* card unuite btn  */
.unmute-btn {
  position: absolute;
  bottom: 10px;
  right: 10px;
  z-index: 3;
  background: rgba(0, 0, 0, 0.7);
  color:var(--white-text);
  border: none;
  padding: 8px 10px;
  border-radius: 50%;
  cursor: pointer;
  font-size: 18px;
  display: none;
}
 /* grtoup card under unmute btn hover  */
.group:hover .unmute-btn {
  display: block;
}



/* singnle card-title / headign*/
.card-title {
  font-size: clamp(1.5rem, 4vw, 34px) !important;
}
/* singnle card-title / headign */
.card-text {
  font-size: clamp(0.875rem, 2vw, 16px) !important;
}






/* next section  an dlast section */
.custom-radio-btn {
  margin: 0px 0.4rem;
  color:var(--white-text) !important;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  border: 2px solid var(--items-border-colur);
  border-radius: 4px;
  background-color: var(--items-background) !important;
}

.btn-check:checked+.custom-radio-btn {
  color: black !important;
  background-color:var(--white-text) !important;
}

.autoboli-card {
  margin: 5rem 0px;
  color:var(--white-text);
  border-radius: 30px;
  text-align: left;
  border: 1px solid var(--items-border-colur) !important;
  background-color: var(--items-background);
}

.Right-Visual {
  height: 100%;
  width: 100%;
  background: var(--background-color) !important;
  border-radius: 200px 8px 8px 8px;
  -webkit-border-radius: 200px 8px 8px 8px;
  -moz-border-radius: 200px 8px 8px 8px;
}

.cover-img {
  margin: 25px 10px;
  object-fit: cover;
  max-width: 100%;
  height: auto;
}
 

/* last section end  */

</style>
@endsection

@section('content')

    <section
      class="text-center px-3 py-5"
      style="
        background-color: var(--background-color);
        font-family: var(--font-family);
        height: 100vh;
      "
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10">
            <h1 class="fw-bold text-white display-5 display-lg-3">
              Unlock Exclusive Access to
            </h1>
            <h1
              class="fw-bold"
              style="
                color: var(--text-color);
                font-size: clamp(2rem, 8vw, 82px);
              "
            >
              Vehicle Auction Data
            </h1>
            <p class="text-white fs-5 mt-3">
              Gain insights into thousands of vehicle auctions and make smarter
              bidding decisions. Subscribe to access full auction data across
              the nation.
            </p>
            <button
              class="btn text-white mt-4 px-4 py-2"
              style="background-color: var(--text-color)"
            >
              Get Started Today
            </button>
          </div>

          <div class="col-12 d-flex justify-content-center">
            <img src="{{asset('/public/theme/assets/CarGroup.png')}}" class="hero-img" alt="Car Group" />
          </div>
        </div>
      </div>
    </section> 

    <!------------------ TRADE SECTION ----------------------------->

    <section
      class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-5"
      style="
        min-height: 100vh;
        background-color: var(--background-color);
        font-family: var(--font-family);
      "
    >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 mb-4">
            <h1 class="fw-bold text-white display-4 display-md-3">
              Trade like a <span style="color: var(--text-color)">pro</span>
            </h1>
            <p class="text-white mt-3 fs-4">
              Gain insights into thousands of vehicle auctions and make smarter
              bidding decisions. Subscribe to access full auction data across
              the nation.
            </p>
          </div>
          <div class="col-12 d-flex justify-content-center">
            <img
              src="{{asset('/public/theme/assets/Screenshot.png')}}"
              alt="Auction Visual"
              class="img-fluid"
              style="max-width: 90%; height: auto"
            />
          </div>
        </div>
      </div>
    </section> 

    <!-- Dont just take -->

     <section
      class="d-flex justify-content-evenly flex-column text-center"
      style="
        background-color: var(--background-color);
        font-family: var(--font-family);
      "
    >
      <div>
        <button
          class="btn text-white testimonials-btn"
          style="background-color: var(--text-color)"
        >
          Testimonials
        </button>
        <h1 class="text-white hero-title">Don't just take it from us</h1>
        <p class="text-white hero-subtitle">
          Trusted by dealers, exporters and auto traders across the UK and
          beyond
        </p>
      </div>

      <!-- CAROSEL -->
      <div class="carousel-wrapper">
        <button
          class="arrow-btn arrow-prev"
          style="font-weight: 900"
          onclick="scrollByDir(-1)"
        >
          <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button class="arrow-btn arrow-next" onclick="scrollByDir(1)">
          <i class="fa-solid fa-arrow-right"></i>
        </button>
        <div class="carousel-row" id="carouselRow">
          <div class="carousel-card group">
            <div class="card">
              <video
                id="video1"
                src="{{asset('/public/theme/assets/video/videoplayback.mp4')}}"
                muted
                loop
                class="w-100 h-100 object-cover"
                onmouseenter="handleMouseEnter(this)"
                onmouseleave="handleMouseLeave(this)"
              ></video>
              <div class="card-body">
                <h5 class="card-title">John Smith</h5>
                <p class="mb-0 small pt-3 card-text">
                  Trusted by dealers, exporters, and auto traders across the UK
                  and beyond.
                </p>
              </div>
              <button class="unmute-btn" onclick="unmuteVideo('video1', this)">
                🔊
              </button>
            </div>
          </div>
          <div class="carousel-card group">
            <div class="card">
              <video
                id="video2"
                src="{{asset('/public/theme/assets/video/videoplayback.mp4')}}"
                muted
                loop
                class="w-100 h-100 object-cover"
                onmouseenter="handleMouseEnter(this)"
                onmouseleave="handleMouseLeave(this)"
              ></video>
              <div class="card-body">
                <h5 class="card-title">Sarah Johnson</h5>
                <p class="mb-0 small card-text">
                  Trusted by dealers, exporters, and auto traders across the UK
                  and beyond.
                </p>
              </div>
              <button class="unmute-btn" onclick="unmuteVideo('video2', this)">
                🔊
              </button>
            </div>
          </div>
          <div class="carousel-card group">
            <div class="card">
              <video
                id="video3"
                src="{{asset('/public/theme/assets/video/videoplayback.mp4')}}"
                muted
                loop
                class="w-100 h-100 object-cover"
                onmouseenter="handleMouseEnter(this)"
                onmouseleave="handleMouseLeave(this)"
              ></video>
              <div class="card-body">
                <h5 class="card-title">Mike Wilson</h5>
                <p class="mb-0 small card-text">
                  Trusted by dealers, exporters, and auto traders across the UK
                  and beyond.
                </p>
              </div>
              <button class="unmute-btn" onclick="unmuteVideo('video3', this)">
                🔊
              </button>
            </div>
          </div>
          <div class="carousel-card group">
            <div class="card">
              <video
                id="video4"
                src="{{asset('/public/theme/assets/video/videoplayback.mp4')}}"
                muted
                loop
                class="w-100 h-100 object-cover"
                onmouseenter="handleMouseEnter(this)"
                onmouseleave="handleMouseLeave(this)"
              ></video>
              <div class="card-body">
                <h5 class="card-title">Emma Davis</h5>
                <p class="mb-0 small card-text">
                  Trusted by dealers, exporters, and auto traders across the UK
                  and beyond.
                </p>
              </div>
              <button class="unmute-btn" onclick="unmuteVideo('video4', this)">
                🔊
              </button>
            </div>
          </div>
          <div class="carousel-card group">
            <div class="card">
              <video
                id="video5"
                src="{{asset('/public/theme/assets/video/videoplayback.mp4')}}"
                muted
                loop
                class="w-100 h-100 object-cover"
                onmouseenter="handleMouseEnter(this)"
                onmouseleave="handleMouseLeave(this)"
              ></video>
              <div class="card-body">
                <h5 class="card-title">Tom Brown</h5>
                <p class="mb-0 small card-text">
                  Trusted by dealers, exporters, and auto traders across the UK
                  and beyond.
                </p>
              </div>
              <button class="unmute-btn" onclick="unmuteVideo('video5', this)">
                🔊
              </button>
            </div>
          </div>
          <div class="carousel-card group">
            <div class="card">
              <video
                id="video6"
                src="{{asset('/public/theme/assets/video/videoplayback.mp4')}}"
                muted
                loop
                class="w-100 h-100 object-cover"
                onmouseenter="handleMouseEnter(this)"
                onmouseleave="handleMouseLeave(this)"
              ></video>
              <div class="card-body">
                <h5 class="card-title">Lisa Garcia</h5>
                <p class="mb-0 small card-text">
                  Trusted by dealers, exporters, and auto traders across the UK
                  and beyond.
                </p>
              </div>
              <button class="unmute-btn" onclick="unmuteVideo('video6', this)">
                🔊
              </button>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <!-- Every thing you need -->

     <section
      class="text-center pt-5"
      style="
        background-color: var(--background-color);
        font-family: var(--font-family);
        padding: 4rem 1rem;
      "
    >
      <div class="container">
        <button
          class="btn text-white mb-4"
          style="background-color: var(--text-color)"
        >
          Get Started Today
        </button>

        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <h1 class="text-white fw-bold display-5">
              Everything you need to source smarter vehicles,<br
                class="d-none d-md-block"
              />
              all in one place
            </h1>
            <p class="text-white fs-5 mt-3">
              Designed for dealers, exporters, and professional buyers who want
              full control,<br class="d-none d-md-block" />
              accurate pricing and zero surprises
            </p>
          </div>
        </div> 

    <!-- Radio Buttons -->
     <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio1"
            autocomplete="off"
            checked
          />
          <label class="custom-radio-btn" for="btnradio1">All Auction</label>

          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio2"
            autocomplete="off"
          />
          <label class="custom-radio-btn" for="btnradio2"
            >Smart Valuation</label
          >

          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio3"
            autocomplete="off"
          />
          <label class="custom-radio-btn" for="btnradio3"
            >Create Interest</label
          >

          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio4"
            autocomplete="off"
          />
          <label class="custom-radio-btn" for="btnradio4"
            >Alerts & Watchlists</label
          >

          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio5"
            autocomplete="off"
          />
          <label class="custom-radio-btn" for="btnradio5"
            >Track Reauction</label
          >

          <input
            type="radio"
            class="btn-check"
            name="btnradio"
            id="btnradio6"
            autocomplete="off"
          />
          <label class="custom-radio-btn" for="btnradio6">VIN Check</label>
        </div>
      </div> 

    <!-- Card Section -->
     <div
        class="container autoboli-card mt-5 shadow-lg backdrop-blur-lg px-4 px-md-5 py-5"
      >
        <div class="row align-items-center"> 
    <!-- Left -->
     <div class="col-12 col-lg-6 text-start mb-4 mb-lg-0">
            <h1 class="display-5 fw-bold mb-3">
              Find the Best Auction for Your Next Buy
            </h1>
            <p class="text-light-emphasis mb-4">
              Stop bouncing between dozens of websites. AUTOBOLI brings together
              UK auctions into a single, streamlined platform.
            </p>
            <ul class="list-unstyled">
              <li class="mb-4 d-flex align-items-center">
                <span
                  class="d-inline-flex align-items-center justify-content-center me-3"
                  style="
                    width: 24px;
                    height: 24px;
                    border: 2px solid var(--text-color);
                    border-radius: 50%;
                  "
                >
                  <span class="fw-bold" style="color: var(--text-color)"
                    >✓</span
                  >
                </span>
                <span>Compare listings side-by-side</span>
              </li>
              <li class="mb-4 d-flex align-items-center">
                <span
                  class="d-inline-flex align-items-center justify-content-center me-3"
                  style="
                    width: 24px;
                    height: 24px;
                    border: 2px solid var(--text-color);
                    border-radius: 50%;
                  "
                >
                  <span class="fw-bold" style="color: var(--text-color)"
                    >✓</span
                  >
                </span>
                <span>Filter by make, model, year, mileage</span>
              </li>
              <li class="mb-4 d-flex align-items-center">
                <span
                  class="d-inline-flex align-items-center justify-content-center me-3"
                  style="
                    width: 24px;
                    height: 24px;
                    border: 2px solid var(--text-color);
                    border-radius: 50%;
                  "
                >
                  <span class="fw-bold" style="color: var(--text-color)"
                    >✓</span
                  >
                </span>
                <span>Instantly see which auction has the best deals</span>
              </li>
            </ul>
            <div class="d-flex flex-wrap gap-3 mt-4">
              <a href="#" class="btn btn-light text-dark fw-semibold"
                >Use this feature</a
              >
              <a href="#" class="btn btn-outline-light fw-semibold"
                >Bid with confidence</a
              >
            </div>
          </div> 

    <!-- Right -->
     <div class="col-12 col-lg-6 Right-Visual" style="padding: 3rem">
            <img
              src="{{asset('/public/theme/assets/AutoBoli.png')}}"
              class="cover-img img-fluid"
              alt="Autoboli Image"
            />
          </div>
        </div>
      </div>
    </section> 

    <!-- Footer -->

  

       
@endsection

@section('js')

<script>
  
    const row = document.getElementById("carouselRow");

    function scrollByDir(dir) {
      const card = row.querySelector(".carousel-card");
      const move = (card.offsetWidth + 16) * dir;
      row.scrollBy({ left: move, behavior: "smooth" });
    }

    function unmuteVideo(videoId, btn) {
        
        const card = btn.closest('.card');
        const video = card.querySelector('video');
        if(video){
          video.muted = false;
          video.controls = true;
          video.play();
          btn.style.display = 'none';
        }

    }

    function handleMouseEnter(video) {
        video.play();
    }

    function handleMouseLeave(video) {
      
          video.pause();
          video.currentTime = 0;
          video.muted = true;
          video.controls = false;
          btn.style.display = 'none';


        const cardBody = video.parentElement.querySelector('.card-body');
        if (cardBody) {
          cardBody.style.opacity = '1';
          cardBody.style.visibility = 'visible';
        }

        // Show unmute button again
        const btn = video.parentElement.querySelector('.unmute-btn');
        if (btn) {
          btn.style.display = 'block';
        }

    }

</script>

@endsection
