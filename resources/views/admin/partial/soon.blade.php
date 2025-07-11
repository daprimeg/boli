<style>


.container {
    text-align: center;
    background-color: #ffffff; /* White container for content */
    padding: 3rem;
    border-radius: 10px; /* Slightly more rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    max-width: 80%; /* Responsive width */
    width: 600px; /* Maximum width */
}

h1 {
    font-size: 2.5rem; /* Larger heading */
    font-weight: bold;
    color: #e74c3c; /* A brighter accent color */
    margin-bottom: 1.5rem;
    letter-spacing: -0.02em;
}

p {
    font-size: 1.1rem; /* Slightly larger paragraph text */
    color: #555; /* Slightly darker gray for body text */
    margin-bottom: 2rem;
    line-height: 1.7; /* Improved line height for readability */
}

#countdown {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
    gap: 1.5rem; /* Increased gap between timer elements */
}

.time-block {
    background-color: #3498db; /* A more vibrant color for the timer boxes */
    color: white;
    padding: 1.2rem; /* Slightly increased padding */
    border-radius: 8px; /* More rounded corners for timer boxes */
    width: 100px; /* Fixed width for timer blocks */
    height: 100px; /* Fixed height for timer blocks */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 2rem; /* Larger font size for the numbers */
    font-weight: bold;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Add shadow to timer blocks */
    transition: transform 0.2s ease; /* Smooth transition for hover effect */
}

.time-block:hover {
    transform: scale(1.05); /* Slight scale on hover */
}


.time-label {
    font-size: 0.8rem;
    color: #fff; /* White text for labels */
    opacity: 0.8; /* Slightly less opaque labels */
    margin-top: 0.5rem; /* Add space between number and label */
    text-transform: uppercase; /* Uppercase labels */
}





</style>


<p>Our website is under construction, but we're working hard to get it up and running.  Stay tuned for something amazing!</p>

<div id="countdown">
    <div class="time-block">
        <div id="days">00</div>
        <div class="time-label">Days</div>
    </div>
    <div class="time-block">
        <div id="hours">00</div>
        <div class="time-label">Hours</div>
    </div>
    <div class="time-block">
        <div id="minutes">00</div>
        <div class="time-label">Minutes</div>
    </div>
    <div class="time-block">
        <div id="seconds">00</div>
        <div class="time-label">Seconds</div>
    </div>
</div>



<div class="social-icons">
    <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
    <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
    <a href="#" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1nqEd00GjQj7AgPgxqKGCAlFmXjoR" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script> <script>
(function () {
    'use strict';

    const targetDate = new Date();
    targetDate.setDate(targetDate.getDate() + 10);

    function updateCountdown() {
        const now = new Date();
        const diff = targetDate.getTime() - now.getTime();

        if (diff <= 0) {
            document.getElementById('countdown').innerHTML = '<p>We are Live!</p>';
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = String(days).padStart(2, '0');
        document.getElementById('hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);

    const newsletterForm = document.getElementById('newsletter-form');
    newsletterForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const emailInput = newsletterForm.querySelector('input[type="email"]');
        if (emailInput.value.trim() !== "") {
            alert(`Thank you for subscribing!  We'll keep you updated.`);
            emailInput.value = '';
        } else {
            alert('Please enter a valid email address.');
        }
    });
})();
</script>

