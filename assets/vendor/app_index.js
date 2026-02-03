// Navbar scroll effect
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        if (this.getAttribute('href') !== '#') {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 70,
                    behavior: 'smooth'
                });
            }
        }
    });
});

// Animation on scroll
const fadeElements = document.querySelectorAll('.fade-in');

function checkFade() {
    fadeElements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;

        if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('active');
        }
    });
}

// Initial check on page load
window.addEventListener('DOMContentLoaded', checkFade);

// Check on scroll
window.addEventListener('scroll', checkFade);

// Hero icons animation
const heroIcons = [
    document.getElementById('icon1'),
    document.getElementById('icon2'),
    document.getElementById('icon3'),
    document.getElementById('icon4'),
    document.getElementById('icon5')
];

let currentIconIndex = 0;

function showNextIcon() {
    // Hide all icons
    heroIcons.forEach(icon => {
        icon.classList.remove('active');
    });

    // Show current icon
    heroIcons[currentIconIndex].classList.add('active');

    // Update index for next icon
    currentIconIndex = (currentIconIndex + 1) % heroIcons.length;

    // Schedule next icon change
    setTimeout(showNextIcon, 2000);
}

// Start the icon animation when page loads
window.addEventListener('DOMContentLoaded', function () {
    // Position icons in the center of the container
    heroIcons.forEach(icon => {
        icon.style.top = '-100%';
        icon.style.left = '50%';
        icon.style.transform = 'translate(-50%, -50%)';
    });

    // Start the animation
    showNextIcon();
});
