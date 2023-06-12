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
    toggleImg.src = '../IMG/sun.png';
  } else {
    toggleImg.src = '../IMG/night.png';
  }
<<<<<<< HEAD
}
/// js api coin 


=======
  /// js api coin 
  
  
  
>>>>>>> 6383c264001a179567fc537f87656718917ad899
