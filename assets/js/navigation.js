// Sistema de Navegação com Loading entre Sections
document.addEventListener('DOMContentLoaded', function() {
    // Esconder todas as seções exceto a home
    hideAllSections();
    showSection('home-content');

    // Adicionar event listeners aos links de navegação
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            navigateToSection(targetId);
        });
    });

    // Navegação com loading
    function navigateToSection(sectionId) {
        // Mapear IDs dos links para IDs das seções
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
            // 1. Primeiro ocultar o conteúdo atual
            hideAllSections();
            
            // 2. Mostrar loading abaixo do hero
            showSectionLoading();
            
            // 3. Pequeno delay para efeito visual do loading
            setTimeout(() => {
                // 4. Esconder loading
                hideSectionLoading();
                
                // 5. Mostrar nova seção
                showSection(targetSectionId);
                
                // 6. Atualizar navegação
                updateActiveNav(sectionId);
                
                // 7. Scroll para conteúdo
                scrollToContent();
            }, 600); // 600ms de loading
        }
    }

    function showSectionLoading() {
        // Criar elemento de loading
        const loadingHTML = `
            <div id="section-loading">
                <div class="loading-spinner">
                    <div class="spinner"></div>
                    <p>Carregando conteúdo...</p>
                </div>
            </div>
        `;
        
        // Inserir loading ANTES das sections (não substituir tudo)
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
            // Pequeno delay para a animação CSS funcionar
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

    // Inicializar navegação ativa
    updateActiveNav('home');
    
    // Garantir que a home esteja visível
    showSection('home-content');
});