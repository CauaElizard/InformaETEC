// Inicialização do Swup com Overlay Animation
document.addEventListener('DOMContentLoaded', function() {
    // Criar overlays
    createOverlays();
    
    // Inicializar Swup
    const swup = new Swup({
        containers: ['#swup'],
        animationSelector: '[class*="swup-transition-"]',
        cache: true,
        plugins: [],
        linkSelector: 'a[data-swup-link]',
        skipPopStateHandling: function(event) {
            return !event.state;
        }
    });

    // Criar overlays de transição
    function createOverlays() {
        const overlays = [
            { class: 'overlay overlay-1' },
            { class: 'overlay overlay-2' },
            { class: 'overlay overlay-3' }
        ];

        overlays.forEach(overlay => {
            const element = document.createElement('div');
            element.className = overlay.class;
            document.body.appendChild(element);
        });
    }

    // Criar barra de progresso
    const progressBar = document.createElement('div');
    progressBar.className = 'swup-progress-bar';
    document.body.appendChild(progressBar);

    // Eventos do Swup
    swup.on('animationOutStart', () => {
        // Mostrar overlays
        document.querySelectorAll('.overlay').forEach((overlay, index) => {
            setTimeout(() => {
                overlay.classList.add('active');
            }, index * 100);
        });
        
        // Iniciar barra de progresso
        progressBar.style.transform = 'scaleX(0.3)';
    });

    swup.on('animationInStart', () => {
        // Esconder overlays
        document.querySelectorAll('.overlay').forEach((overlay, index) => {
            setTimeout(() => {
                overlay.classList.remove('active');
            }, index * 100);
        });
        
        // Completar barra de progresso
        progressBar.style.transform = 'scaleX(1)';
    });

    swup.on('animationInDone', () => {
        // Resetar barra de progresso
        setTimeout(() => {
            progressBar.style.transform = 'scaleX(0)';
        }, 300);
    });

    swup.on('contentReplaced', function() {
        // Atualizar título da página
        updatePageTitle();
        
        scrollToContent();
        
        // Re-inicializar componentes Bootstrap
        initBootstrapComponents();
        
        // Ativar menu ativo
        setActiveMenu();
    });

    function updatePageTitle() {
        const currentPage = document.querySelector('.page');
        if (currentPage && currentPage.id) {
            const pageTitles = {
                'home': 'Home',
                'cursos': 'Cursos',
                'professores': 'Professores',
                'infraestrutura': 'Infraestrutura',
                'vestibulinho': 'Vestibulinho',
                'contato': 'Contato'
            };
            document.title = `${pageTitles[currentPage.id]} - ETEC Prof Jose Sant'Ana de Castro`;
        }
    }

    function scrollToContent() {
        const heroHeight = document.querySelector('.hero-section').offsetHeight;
        const navHeight = document.querySelector('.navbar').offsetHeight;
        
        setTimeout(() => {
            window.scrollTo({
                top: heroHeight - navHeight + 20,
                behavior: 'smooth'
            });
        }, 600);
    }

    function initBootstrapComponents() {
        const dropdowns = document.querySelectorAll('.dropdown-toggle');
        dropdowns.forEach(dropdown => {
            new bootstrap.Dropdown(dropdown);
        });
    }

    function setActiveMenu() {
        const currentPage = document.querySelector('.page');
        if (!currentPage) return;

        const navLinks = document.querySelectorAll('.nav-link[data-swup-link]');
        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href === `#${currentPage.id}` || (href === '#home' && currentPage.id === 'home')) {
                link.classList.add('active');
            }
        });
    }

    // Inicialização inicial
    updatePageTitle();
    initBootstrapComponents();
    setActiveMenu();
});