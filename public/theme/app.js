

 function rotateIcon(el) {
    if (el.textContent.trim() === "+") {
      el.textContent = "–";
      el.style.transform = "rotate(180deg)";
    } else {
      el.textContent = "+";
      el.style.transform = "rotate(0deg)";
    }

    el.style.transition = "transform 0.4s ease";
  }

  



function setActiveLink() {
  const currentPage = window.location.pathname.split("/").pop() || "index.html";

  document.querySelectorAll(".nav-link").forEach(link => {
    const linkPage = link.getAttribute("href");
    if (linkPage === currentPage) {
      link.classList.add("active");
    }
  });
}





  // 2 carsel
const carousel = document.getElementById("cardCarousel");
    const cardWidth = 320; 
    function nextSlide() {
      carousel.scrollBy({ left: cardWidth, behavior: "smooth" });
    }

    function previousSlide() {
      carousel.scrollBy({ left: -cardWidth, behavior: "smooth" });
    }


    