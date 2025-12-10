document.addEventListener('DOMContentLoaded', function () {

    /* ==========================================
       CONTROLE DE SEÇÕES (NAVIGATION)
    ========================================== */

    hideAllSections();
    showSection('home-content');

    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
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
        </div>`;

        const dynamicContent = document.getElementById('dynamic-content');
        const loadingElement = document.createElement('div');
        loadingElement.innerHTML = loadingHTML;
        dynamicContent.appendChild(loadingElement.firstElementChild);
    }

    function hideSectionLoading() {
        const loading = document.getElementById('section-loading');
        if (loading) loading.remove();
    }

    function hideAllSections() {
        document.querySelectorAll('.content-section').forEach(section => {
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
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${activeId}`) {
                link.classList.add('active');
            }
        });
    }

    function scrollToContent() {
        const heroHeight = document.querySelector('.hero-section')?.offsetHeight || 0;
        const navHeight = document.querySelector('.navbar')?.offsetHeight || 0;

        setTimeout(() => {
            window.scrollTo({
                top: heroHeight - navHeight + 20,
                behavior: 'smooth'
            });
        }, 300);
    }

    updateActiveNav('home');
    showSection('home-content');


    /* ==========================================
       SIDEBAR DE CURSOS
    ========================================== */

    const sidebar = document.getElementById('course-sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const closeBtn = document.getElementById('closeSidebar');
    const navbar = document.querySelector('.navbar');

    // 🔥 ABRIR A SIDEBAR DE CURSOS
    document.querySelectorAll('.card-item').forEach(card => {
        card.addEventListener('click', () => {

            // ⚠️ GARANTE QUE A SECTION CURSOS ESTÁ VISÍVEL
            hideAllSections();
            showSection('cursos-content');

            // Coletar dados
            const title = card.querySelector('.course-title')?.textContent || '';
            const desc = card.querySelector('.course-desc')?.textContent || '';
            const img = card.querySelector('img')?.src || '';

            document.getElementById('sidebarTitle').textContent = title;
            document.getElementById('sidebarDesc').textContent = desc;
            document.querySelector('#course-sidebar img').src = img;

            sidebar.style.display = 'block';
            overlay.style.display = 'block';

            document.body.classList.add('no-scroll');

            // Sumir navbar apenas na sidebar dos cursos
            navbar.style.display = 'none';
        });
    });

    // FECHAR SIDEBAR — botão X
    closeBtn.addEventListener('click', () => {
        sidebar.style.display = 'none';
        overlay.style.display = 'none';
        document.body.classList.remove('no-scroll');
        navbar.style.display = 'flex';
    });

    // FECHAR SIDEBAR — clicar no fundo
    overlay.addEventListener('click', () => {
        sidebar.style.display = 'none';
        overlay.style.display = 'none';
        document.body.classList.remove('no-scroll');
        navbar.style.display = 'flex';
    });

});
