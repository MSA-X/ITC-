const carousel = document.querySelector('.carousel');
const items = document.querySelectorAll('.car');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
const sections = document.querySelectorAll("section");

let currentIndex = 0;

function getItemsPerSlide() {
  const screenWidth = window.innerWidth;

  if (screenWidth >= 1400) {
    return 4;
  } else if (screenWidth >= 1200) {
    return 2;
  } else if (screenWidth >= 768) {
    return 1;
  } else {
    return 1;
  }
}

function updateCarousel() {
  const itemsPerSlide = getItemsPerSlide();
  const offset = currentIndex * (100 / itemsPerSlide);
  carousel.style.transform = `translateX(-${offset}%)`;
  carousel.style.transition = 'transform 0.5s ease'; // optional
  console.log("Current Index:", currentIndex);
}

next.addEventListener('click', () => {
  const itemsPerSlide = getItemsPerSlide();
  const maxIndex = items.length - itemsPerSlide;

  if (currentIndex >= maxIndex) {
    currentIndex = 0; // balik ke awal
  } else {
    currentIndex++;
  }

  updateCarousel();
});

prev.addEventListener('click', () => {
  const itemsPerSlide = getItemsPerSlide();
  const maxIndex = items.length - itemsPerSlide;

  if (currentIndex <= 0) {
    currentIndex = maxIndex; // balik ke akhir
  } else {
    currentIndex--;
  }

  updateCarousel();
});

window.addEventListener('resize', () => {
  // Reset index agar tidak error saat jumlah item per slide berubah
  const itemsPerSlide = getItemsPerSlide();
  const maxIndex = items.length - itemsPerSlide;
  if (currentIndex > maxIndex) {
    currentIndex = maxIndex;
  }
  updateCarousel();
});

updateCarousel();

// Animasi bagian .section jika diperlukan
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    }
  });
}, { threshold: 0.1 });

sections.forEach(section => {
  observer.observe(section);
});


window.addEventListener('load', function () {
    document.body.classList.add('fade-in');
  });

document.addEventListener("DOMContentLoaded", function () {
  const faders = document.querySelectorAll('.fade-in');

  const appearOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px"
  };

  const appearOnScroll = new IntersectionObserver(function (
    entries,
    appearOnScroll
  ) {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;

      entry.target.classList.add("visible");
      appearOnScroll.unobserve(entry.target);
    });
  }, appearOptions);

  faders.forEach(fader => {
    appearOnScroll.observe(fader);
  });
});
