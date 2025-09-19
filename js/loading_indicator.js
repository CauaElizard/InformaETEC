        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loading-screen');
            
            // Verifica se algum autista já abriu a página alguma vez; se sim ele mostra o loading
            const hasVisitedBefore = localStorage.getItem('hasVisitedBefore');
            
            // Se já visitou antes, não mostra a tela de loading
            if (hasVisitedBefore) {
                loadingScreen.classList.add('hidden');
                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                }, 800);
            } else {
                // Se a página nunca foi visitada ele mostra o loading, senão ele obviamente não mostra
                const totalTime = 3500; // dá três segundos de delay pra esconder a tela de loading
                
                
                setTimeout(() => {
                    // Esconde o bglh do loading
                    loadingScreen.classList.add('hidden');
                    
                    // Marca que a página já foi carregada
                    localStorage.setItem('hasVisitedBefore', 'true');
                    
                    // Esconder o bglh do loading depois da transição
                    setTimeout(() => {
                        loadingScreen.style.display = 'none';
                    }, 800);
                }, totalTime);
            }
        });

// script feito com muito café e xingamentos gratuitos