document.addEventListener('DOMContentLoaded', function () {
    const loadingScreen = document.getElementById('loading-screen');

    // Verifica se já visitou antes
    const hasVisitedBefore = localStorage.getItem('hasVisitedBefore');

    if (hasVisitedBefore) {
        loadingScreen.classList.add('hidden');
        setTimeout(() => {
            loadingScreen.style.display = 'none';
        }, 800);
    } else {
        const totalTime = 3500;

        setTimeout(() => {
            loadingScreen.classList.add('hidden');
            localStorage.setItem('hasVisitedBefore', 'true');

            setTimeout(() => {
                loadingScreen.style.display = 'none';
            }, 800);
        }, totalTime);
    }

    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Shrink logo on scroll
    const logo = document.getElementById("logoNav");
    logo.style.transition = "all 0.3s ease";
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            logo.style.height = "40px";
        } else {
            logo.style.height = "60px";
        }
    });
});
