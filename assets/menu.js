document.addEventListener("DOMContentLoaded", function() {
    var menuToggle = document.querySelector('.menu-toggle');
    var menuContainer = document.querySelector('.menu-container');

    menuToggle.addEventListener('click', function() {
        menuContainer.classList.toggle('active');
    });
});
    