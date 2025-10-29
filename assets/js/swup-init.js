// Inicialização do Swup
document.addEventListener('DOMContentLoaded', function() {
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

    // Mostrar apenas a página home inicialmente
    showPage('home');

    // Adicionar indicador de loading
    const loadingIndicator = document.createElement('div');
    loadingIndicator.className = 'swup-loading-indicator';
    document.body.appendChild(loadingIndicator);

    // Eventos do Swup
    swup.on('animationInStart', () => {
        loadingIndicator.classList.add('is-loading');
    });

    swup.on('animationInDone', () => {
        loadingIndicator.classList.remove('is-loading');
        loadingIndicator.classList.add('is-finishing');
        setTimeout(() => {
            loadingIndicator.classList.remove('is-finishing');
        }, 400);
    });

    swup.on('contentReplaced', function() {
        // Atualizar título da página
        updatePageTitle();
        
        // Scroll para o conteúdo abaixo do hero
        scrollToContent();
        
        // Re-inicializar componentes Bootstrap
        initBootstrapComponents();
        
        // Ativar menu ativo
        setActiveMenu();
    });

    // Função para mostrar página específica
    function showPage(pageId) {
        const pages = document.querySelectorAll('.page');
        pages.forEach(page => {
            page.style.display = page.id === pageId ? 'block' : 'none';
        });
    }

    // Função para atualizar título da página
    function updatePageTitle() {
        const currentPage = document.querySelector('.page:not([style*="display: none"])');
        if (currentPage && currentPage.dataset.title) {
            document.title = `${currentPage.dataset.title} - ETEC Prof Jose Sant'Ana de Castro`;
        }
    }

    // Função para scroll suave até o conteúdo
    function scrollToContent() {
        const heroHeight = document.querySelector('.hero-section').offsetHeight;
        const navHeight = document.querySelector('.navbar').offsetHeight;
        window.scrollTo({
            top: heroHeight - navHeight,
            behavior: 'smooth'
        });
    }

    // Função para inicializar componentes Bootstrap
    function initBootstrapComponents() {
        // Dropdowns
        const dropdowns = document.querySelectorAll('.dropdown-toggle');
        dropdowns.forEach(dropdown => {
            new bootstrap.Dropdown(dropdown);
        });
    }

    // Função para definir menu ativo
    function setActiveMenu() {
        const currentPage = document.querySelector('.page:not([style*="display: none"])');
        if (!currentPage) return;

        const navLinks = document.querySelectorAll('.nav-link[data-swup-link]');
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentPage.id}`) {
                link.classList.add('active');
            }
        });
    }

    // Inicializar na primeira carga
    updatePageTitle();
    initBootstrapComponents();
    setActiveMenu();
});