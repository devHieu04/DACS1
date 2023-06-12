window.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const img = carousel.querySelector('.carousel-item img');
    const width = img.getBoundingClientRect().width;
    carousel.style.height = width + 'px';
});


  
  