document.addEventListener("DOMContentLoaded", function () {
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navbarNav = document.querySelector(".navbar-nav");
  
    navbarToggler.addEventListener("click", function () {
      navbarNav.classList.toggle("show");
    });
  });
  const toggleSwitch = document.querySelector('.dark-mode-toggle');

  toggleSwitch.addEventListener('click', switchTheme);
  
  function switchTheme() {
    document.body.classList.toggle('dark-mode');
    const isDarkMode = document.body.classList.contains('dark-mode');
    const toggleImg = document.querySelector('.dark-mode-toggle');
  
    if (isDarkMode) {
      toggleImg.src = '/IMG/sun.png';
    } else {
      toggleImg.src = '/IMG/night.png';
    }
  }

  
  