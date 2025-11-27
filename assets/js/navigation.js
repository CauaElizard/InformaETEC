document.addEventListener('DOMContentLoaded', function() {
    hideAllSections();
    showSection('home-content');

    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            navigateToSection(targetId);
        });
    });

    function navigateToSection(sectionId) {
        const sectionMap = {
            'home': 'home-content',
            'cursos': 'cursos-content',
            'professores': 'professores-content',
            'infraestrutura': 'infraestrutura-content',
            'vestibulinho': 'vestibulinho-content',
            'contato': 'contato-content'
        };

        const targetSectionId = sectionMap[sectionId];
        
        if (targetSectionId) {
            hideAllSections();
            showSectionLoading();
            
            setTimeout(() => {
                hideSectionLoading();
                showSection(targetSectionId);
                updateActiveNav(sectionId);
                scrollToContent();
            }, 600);
        }
    }

    function showSectionLoading() {
        const loadingHTML = `
            <div id="section-loading">
                <div class="loading-spinner">
                    <div class="spinner"></div>
                    <p>Carregando conteúdo...</p>
                </div>
            </div>
        `;
        
        const dynamicContent = document.getElementById('dynamic-content');
        const loadingElement = document.createElement('div');
        loadingElement.innerHTML = loadingHTML;
        dynamicContent.appendChild(loadingElement.firstElementChild);
    }

    function hideSectionLoading() {
        const loading = document.getElementById('section-loading');
        if (loading) {
            loading.remove();
        }
    }

    function hideAllSections() {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => {
            section.style.display = 'none';
        });
    }

    function showSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'block';
            setTimeout(() => {
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }, 50);
        }
    }

    function updateActiveNav(activeId) {
        const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${activeId}`) {
                link.classList.add('active');
            }
        });
    }

    function scrollToContent() {
        const heroHeight = document.querySelector('.hero-section').offsetHeight;
        const navHeight = document.querySelector('.navbar').offsetHeight;
        
        setTimeout(() => {
            window.scrollTo({
                top: heroHeight - navHeight + 20,
                behavior: 'smooth'
            });
        }, 300);
    }

    updateActiveNav('home');
    showSection('home-content');
});

document.addEventListener('DOMContentLoaded', function() {
    var reviewsCarousel = new bootstrap.Carousel(document.getElementById('reviewsCarousel'), {
        interval: 5000,
        pause: 'hover', 
        wrap: true
    });
});

// Abrir sidebar ao clicar em um card
document.querySelectorAll('.card-item').forEach(card => {
    card.addEventListener('click', () => {
            const title = card.querySelector('.course-title')?.textContent || '';
            const desc = card.querySelector('.course-desc')?.textContent || '';
             const img = card.querySelector('img')?.src || '';

document.getElementById('sidebarTitle').textContent = title;
document.getElementById('sidebarDesc').textContent = desc;
document.querySelector('#course-sidebar img').src = img;

const sidebar = document.getElementById('course-sidebar');
sidebar.style.display = 'block';
sidebar.style.animation = 'fadeIn 0.3s ease forwards';
                    });
                });

                document.getElementById('closeSidebar').addEventListener('click', () => {
                    const sidebar = document.getElementById('course-sidebar');
                    sidebar.style.animation = 'fadeInUp 0.3s ease reverse forwards';
                    setTimeout(() => (sidebar.style.display = 'none'), 250);
                });

const sidebar = document.getElementById('course-sidebar');
const overlay = document.getElementById('sidebarOverlay');
const closeBtn = document.getElementById('closeSidebar');

document.querySelectorAll('.card-item').forEach(card => {
  card.addEventListener('click', () => {
    sidebar.style.display = 'block';
    overlay.style.display = 'block';
    document.body.classList.add('no-scroll');
  });
});

closeBtn.addEventListener('click', () => {
  sidebar.style.display = 'none';
  overlay.style.display = 'none';
  document.body.classList.remove('no-scroll');
});

overlay.addEventListener('click', () => {
  sidebar.style.display = 'none';
  overlay.style.display = 'none';
  document.body.classList.remove('no-scroll');
});