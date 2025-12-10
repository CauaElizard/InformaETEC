<?php

$servername = "localhost";
$username = "root"; 
$password = "&tec77@info!"; 
$dbname = "etec_site";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}


$sqlCursos = "SELECT * FROM cursos";
$stmtCursos = $pdo->prepare($sqlCursos);
$stmtCursos->execute();
$cursos = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);


$sqlProfessores = "SELECT * FROM professores";
$stmtProfessores = $pdo->prepare($sqlProfessores);
$stmtProfessores->execute();
$professores = $stmtProfessores->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Prof Jose Sant'Ana de Castro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_home.css">
</head>
<body>
    <div id="loading-screen">
        <div class="logo-container">
            <img src="assets/img/logoIETEC.png" id="logoLoader" alt="Logo ETEC">
        </div>
        <div class="loader-container">
            <div class="spinner"></div>
        </div>
    </div>
    <div id="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#home">
                    <img src="assets/img/logo_mini_IETEC.png" alt="Logo" id="logoNav">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cursos">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#professores">Professores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#infraestrutura">Infraestrutura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://vestibulinho.etec.sp.gov.br/home/">Vestibulinho</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contato">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="public/teste-vocacional/formulario.php">Teste Vocacional</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="hero-section" id="home-hero">
            <div class="hero-bg">
                <img src="assets/img/faixada_escola.jpg" alt="Fachada da ETEC">
            </div>
            <div class="container">
                <div class="hero-content fade-in">
                    <h1 class="hero-title">ETEC Prof. <span class="hero-highlight">Jose Sant'Ana de Castro</span></h1>
                    <p class="hero-subtitle">Uma escola que combina Ensino Médio e formação técnica oferecendo aos alunos uma educação integral alinhada às demandas do mercado e da sociedade.</p>
                    <div class="hero-logos">
                        <img src="assets/img/logo_CPS.png" alt="Centro Paula Souza" class="hero-logo">
                        <img src="assets/img/logomarca-sp.png" alt="Governo de São Paulo" class="hero-logo">
                        <img src="assets/img/logoEtec.png" alt="ETEC" class="hero-logo">
                    </div>
                </div>
            </div>
        </section>
        <main id="dynamic-content">
            <section id="home-content" class="content-section active">
                <div class="section-padding">
                    <div class="container">
                        <div class="row mb-5">
                            <div class="col-12 text-center">
                                <h2 class="section-title">Bem-vindo à ETEC Prof. Jose Sant'Ana de Castro</h2>
                                <p class="hero-subtitle">Uma informação bem estruturada é capaz de gerar clareza e satisfação, pois oferece ao usuário a sensação de compreensão e promove interações mais eficientes e significativas.</p>
                            </div>
                        </div>
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 mb-4">
                                <div class="about-content">
                                    <h3 class="about-subtitle">Transformando Vidas Através da Educação</h3>
                                    <p class="about-text">A educação tem o poder de abrir portas, criar oportunidades e transformar realidades. Quando o acesso à informação é garantido e bem estruturado, o estudante passa a compreender melhor seus caminhos e faz escolhas mais seguras para seu futuro. Projetos como o InformaETEC reforçam essa transformação ao oferecer clareza sobre cursos, professores e ambientes escolares, contribuindo para decisões mais conscientes. Assim, por meio do conhecimento, é possível reduzir a evasão, fortalecer a autonomia dos jovens e construir trajetórias educacionais mais sólidas, mostrando que educar é, acima de tudo, transformar vidas.</p>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="about-image position-relative">
                                    <img src="assets/img/faixada_escola.jpg" alt="Nossa Escola"
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                        <!-- Porque Escolher Nossa Escola -->
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-4">
                                <h3 class="section-title">Por Que Escolher Nossa Escola?</h3>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="feature-box h-100">
                                    <div class="feature-icon">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <h3 class="feature-title">Formação Acadêmica</h3>
                                    <p>Os cursos técnicos são estruturados para atender às demandas reais do mercado, aumentando as oportunidades de empregabilidade. Alunos formados em ensino técnico têm maiores taxas de inserção profissional e melhores perspectivas salariais, como apontam pesquisas recentes citadas na documentação.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="feature-box h-100">
                                    <div class="feature-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h3 class="feature-title">Foco no Emprego</h3>
                                    <p>Os cursos técnicos são estruturados para atender às demandas reais do mercado, aumentando as oportunidades de empregabilidade. Alunos formados em ensino técnico têm maiores taxas de inserção profissional e melhores perspectivas salariais, como apontam pesquisas recentes citadas na documentação.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="feature-box h-100">
                                    <div class="feature-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h3 class="feature-title">Comunidade Engajada</h3>
                                    <p>A escola conta com professores qualificados, infraestrutura adequada e um ambiente que valoriza o protagonismo estudantil. Projetos como o Centro Interdisciplinar de Ciências estimulam colaboração, criatividade e autonomia, fortalecendo o vínculo entre alunos e comunidade escolar.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="feature-box h-100">
                                    <div class="feature-icon">
                                        <i class="fas fa-hand-holding-heart"></i>
                                    </div>
                                    <h3 class="feature-title">Apoio e Acompanhamento ao Estudante</h3>
                                    <p>A instituição oferece orientação constante para ajudar o aluno a compreender cada curso, sua rotina e suas possibilidades futuras. Esse suporte diminui dúvidas na escolha do curso, reduz a evasão escolar e garante que cada estudante trilhe um caminho mais seguro e alinhado aos seus objetivos.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Nossa História -->
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-4">
                                <h3 class="section-title">Nossa História</h3>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <div class="about-content">
                                    <p class="about-text">A ETEC Prof. José Sant’Ana de Castro, localizada em Cruzeiro (SP), foi criada 
                                        pelo Decreto Estadual nº 51.334/1969. Inicialmente, funcionava junto a duas escolas de ensino 
                                        fundamental, passando por várias mudanças estruturais e denominações ao longo das décadas. A 
                                        partir dos anos 1970 e 1980, consolidou-se como instituição voltada ao ensino profissionalizante
                                        , oferecendo cursos técnicos como Mecânica, Enfermagem e formação para o magistério. Em 1994, 
                                        passou a integrar oficialmente o Centro Paula Souza.</p>
                                    <p class="about-text">Com a LDB de 1996, a escola ampliou sua atuação no ensino técnico, atendendo 
                                        estudantes do ensino médio regular ou já formado. Em 2019, completou 50 anos, tendo formado
                                        milhares de profissionais para o mercado de trabalho.</p>
                                    <p class="about-text">Localizada em uma área estratégica do Vale do Paraíba, a ETEC recebe alunos
                                        de diversas cidades de São Paulo, Minas Gerais e Rio de Janeiro, beneficiada por sua 
                                        proximidade com grandes rodovias e pela variedade econômica regional.</p>
                                    <p class="about-text">Atualmente, oferece Ensino Médio integrado com habilitações técnicas em 
                                        Mecânica e Desenvolvimento de Sistemas, além de cursos Novotec integrados como Logística, Marketing, Edificações e Nutrição. Também conta com itinerários formativos em Ciências Biológicas e Ciências da Natureza, parceria com a SEDUC para Informática para Internet, e cursos técnicos modulares noturnos em diversas áreas, incluindo Administração, Gastronomia, Informática, Mecânica e o novo curso de Desenho da Construção Civil.</p>
                                    <p class="about-text">A última década marcou importantes avanços: implantação do ensino integral
                                        (2012), eventos de empreendedorismo (2016), chegada do modelo Mtec (2020), programa de energia
                                        solar (2021), criação do evento Startec (2021 e 2023), retorno da EXPOTIN (2022) e expansão
                                        de cursos técnicos. A escola também fortaleceu sua presença digital com Facebook, Instagram 
                                        e o lançamento de seu canal no YouTube.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Estatísticas Arrancadas de vc sabe onde -->
                        <div class="row g-4 mb-5">
                            <div class="col-12">
                                <div class="bg-light-custom rounded p-5">
                                    <div class="row g-4 text-center">
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <h3 class="text-primary mb-2"
                                                    style="font-size: 2.5rem; font-weight: 700;">2.500+</h3>
                                                <p class="text-muted fw-medium">Profissionais Formados</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <h3 class="text-primary mb-2"
                                                    style="font-size: 2.5rem; font-weight: 700;">94%</h3>
                                                <p class="text-muted fw-medium">Taxa de Empregabilidade</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <h3 class="text-primary mb-2"
                                                    style="font-size: 2.5rem; font-weight: 700;">25+</h3>
                                                <p class="text-muted fw-medium">Anos de Excelência</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <h3 class="text-primary mb-2"
                                                    style="font-size: 2.5rem; font-weight: 700;">15+</h3>
                                                <p class="text-muted fw-medium">Cursos Técnicos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-4">
                                <h3 class="section-title">Metodologia de Ensino</h3>
                                <p class="hero-subtitle">Como transformamos conhecimento em competência</p>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-flask"></i>
                                    </div>
                                    <h3 class="feature-title">Aprendizado Prático</h3>
                                    <p>Atividades e projetos em laboratórios que aproximam o aluno da realidade profissional.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h3 class="feature-title">Trabalho em Equipe</h3>
                                    <p>Projetos integradores que desenvolvem colaboração, comunicação e solução conjunta de problemas.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-brain"></i>
                                    </div>
                                    <h3 class="feature-title">Pensamento Crítico</h3>
                                    <p>Estímulo à análise, investigação e tomada de decisão por meio de desafios reais.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            
            </section>
<!-- ============================================
     CURSOS (AGORA DENTRO DO #dynamic-content)
=============================================== -->
<section id="cursos-content" class="content-section">
    <div class="section-padding bg-light-custom">
        <div class="container">

            <h2 class="section-title">Nossos Cursos</h2>
            <p class="text-center mb-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Quidem odio laboriosam voluptates deleniti explicabo temporibus.
            </p>

            <div class="row" id="cards-cursos">

                <?php foreach ($cursos as $curso): ?>
                <div class="col-md-4 mb-4">

                    <!-- Card do curso -->
                    <div class="course-card card-item"
                         data-id="<?= $curso['id']; ?>"
                         data-type="curso">

                        <div class="course-img">
                            <img src="<?= $curso['imagem']; ?>"
                                 alt="<?= htmlspecialchars($curso['nome']); ?>">
                        </div>

                        <div class="course-content">

                            <h3 class="course-title">
                                <?= htmlspecialchars($curso['nome']); ?>
                            </h3>

                            <p class="course-desc">
                                <?= htmlspecialchars($curso['descricao']); ?>
                            </p>

                            <div class="course-info">
                                <span class="course-duration">
                                    <i class="fas fa-clock"></i>
                                    <?= htmlspecialchars($curso['duracao']); ?>
                                </span>

                                <span class="course-modality">
                                    <i class="fas fa-laptop"></i>
                                    <?= htmlspecialchars($curso['modalidade']); ?>
                                </span>
                            </div>

                        </div>
                    </div>

                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>


<!-- ============================================
     OVERLAY DA SIDEBAR DE CURSOS
=============================================== -->
<div id="sidebarOverlay"
     style="
        display:none;
        position:fixed;
        inset:0;
        background:rgba(0,0,0,0.45);
        z-index:1040;
     ">
</div>


<!-- ============================================
     SIDEBAR DE CURSOS
=============================================== -->
<div id="course-sidebar"
     class="content-section active bg-light-custom"
     style="
        display:none;
        position:fixed;
        top:0;
        right:0;
        width:420px;
        max-width:95%;
        height:100vh;
        background:white;
        box-shadow:-4px 0 20px rgba(0,0,0,0.15);
        z-index:1050;
     ">

    <div style="height:100%; overflow-y:auto;">
        <div class="course-card p-4 position-relative" style="min-height:100%;">

            <!-- Botão fechar -->
            <button id="closeSidebar"
                style="
                    position:absolute;
                    top:12px;
                    right:16px;
                    background:rgba(0,0,0,0.05);
                    border:none;
                    font-size:1.8rem;
                    color:#333;
                    cursor:pointer;
                    border-radius:50%;
                    width:36px;
                    height:36px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    transition:all .2s ease;
                ">
                &times;
            </button>

            <!-- Imagem do curso -->
            <div class="course-img mb-3">
                <img src="assets/img/curso-ds.jpg"
                     id="sidebarImg"
                     alt="Imagem do curso"
                     class="img-fluid rounded">
            </div>

            <!-- Conteúdo -->
            <div class="course-content">

                <h3 id="sidebarTitle" class="course-title">
                    Título do Curso
                </h3>

                <p id="sidebarDesc" class="course-desc">
                    Descrição do curso...
                </p>

                <div class="course-info mt-3">
                    <span class="course-duration">
                        <i class="fas fa-clock"></i>
                        <span id="sidebarDuration">3 anos</span>
                    </span>

                    <span class="course-modality">
                        <i class="fas fa-laptop"></i>
                        <span id="sidebarModality">Presencial</span>
                    </span>
                </div>

                <hr class="my-4">

                <!-- Competências -->
                <div class="mb-4">
                    <h4 class="course-title" style="font-size:1.1rem;">
                        Competências Desenvolvidas
                    </h4>

                    <ul style="list-style:none; padding-left:0; margin-top:1rem; color:var(--gray);">
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Competência 1</li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Competência 2</li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Competência 3</li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i> Competência 4</li>
                    </ul>
                </div>

                <!-- Sobre o curso -->
                <div class="mb-4">
                    <h4 class="course-title" style="font-size:1.1rem;">Sobre o Curso</h4>
                    <p class="course-desc">
                        Texto sobre o curso...
                    </p>
                </div>

                <!-- Coordenação -->
                <div class="mb-4">
                    <h4 class="course-title" style="font-size:1.1rem;">Coordenação</h4>

                    <div class="d-flex align-items-center mt-2">
                        <div class="teacher-avatar me-3">
                            <i class="fas fa-user-tie"></i>
                        </div>

                        <div>
                            <h5 class="mb-1"
                                style="font-size:1rem; color:var(--primary);">
                                Nome do Coordenador
                            </h5>
                            <small class="text-muted">Coordenador do curso</small>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-3">
                    <p class="text-muted" style="font-size:0.9rem;">
                        * Informações sujeitas a atualização conforme plano de curso vigente.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>




<!-- PROFESSORES -->
<section id="professores-content" class="content-section">
    <div class="section-padding bg-light-custom">
        <div class="container">
            <h2 class="section-title">Nossos Professores</h2>
            <p class="text-center mb-5">
                Conheça o corpo docente responsável por formar, orientar e inspirar nossos alunos
                ao longo da jornada acadêmica.
            </p>

            <div class="row" id="cards-professores">

                <?php foreach ($professores as $professor): ?>
                <div class="col-md-4 mb-4">

                    <!-- CARD DO PROFESSOR -->
                    <div class="course-card professor-card"
                         data-id="<?php echo $professor['id']; ?>">

                        <div class="course-img">
                            <img src="<?php echo $professor['imagem']; ?>"
                                 alt="<?php echo htmlspecialchars($professor['nome']); ?>">
                        </div>

                        <div class="course-content">
                            <h3 class="course-title">
                                <?php echo htmlspecialchars($professor['nome']); ?>
                            </h3>

                            <p class="course-desc">
                                <?php echo htmlspecialchars($professor['biografia']); ?>
                            </p>

                            <div class="course-info">

                                <span class="course-duration">
                                    <i class="fas fa-user-tie"></i>
                                    <?php echo htmlspecialchars($professor['materia']); ?>
                                </span>

                                <span class="course-modality">
                                    <i class="fas fa-envelope"></i>
                                    <?php echo htmlspecialchars($professor['email']); ?>
                                </span>

                            </div>
                        </div>

                    </div>

                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>


<!-- SIDEBAR EXCLUSIVA PARA PROFESSORES -->
<div id="professor-sidebar"
     class="p-4"
     style="
        display:none;
        position:fixed;
        top:0;
        right:0;
        width:400px;
        height:100vh;
        background:#ffffff;
        box-shadow:-4px 0 14px rgba(0,0,0,0.15);
        z-index:1050; /* SOBREPOE A NAVBAR */
        overflow-y:auto;
        transition:all .3s ease;
     ">

    <!-- Botão fechar -->
    <button id="closeProfessorSidebar"
            class="btn btn-outline-secondary mb-3"
            style="position:absolute; top:15px; right:15px;">
        <i class="fas fa-times"></i>
    </button>

    <!-- Foto -->
    <div class="text-center mt-4">
        <img id="profSidebarImg"
             src=""
             class="rounded-circle shadow-sm"
             style="width:150px; height:150px; object-fit:cover;">
    </div>

    <!-- Nome -->
    <h3 id="profSidebarName" class="text-center mt-3 fw-bold">Nome do Professor</h3>

    <!-- Área -->
    <p id="profSidebarArea" class="text-center text-muted">
        Área / Disciplina
    </p>

    <hr class="my-4">

    <!-- Bio -->
    <h5 class="fw-semibold">Sobre o professor</h5>
    <p id="profSidebarDesc" class="text-muted">
        Descrição do professor
    </p>

    <hr class="my-4">

    <!-- Contato -->
    <h5 class="fw-semibold">Contato</h5>
    <p class="mb-1">
        <i class="fas fa-envelope text-primary"></i>
        <span id="profSidebarEmail">email@instituicao.com</span>
    </p>

</div>


<!-- OVERLAY -->
<div id="professorSidebarOverlay"
     style="
        display:none;
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,.45);
        z-index:1040;
     ">
</div>


<!-- JS DA SIDEBAR DE PROFESSORES (NAVBAR NÃO SOME) -->
<script>
document.addEventListener("DOMContentLoaded", () => {

    const sidebar = document.getElementById("professor-sidebar");
    const overlay = document.getElementById("professorSidebarOverlay");

    // ABRIR SIDEBAR
    document.querySelectorAll(".professor-card").forEach(card => {
        card.addEventListener("click", () => {

            const nome  = card.querySelector(".course-title")?.textContent || "";
            const desc  = card.querySelector(".course-desc")?.textContent || "";
            const img   = card.querySelector("img")?.src || "";
            const area  = card.querySelector(".course-duration")?.textContent.trim() || "";
            const email = card.querySelector(".course-modality")?.textContent.trim() || "";

            // Preencher sidebar
            document.getElementById("profSidebarName").textContent = nome;
            document.getElementById("profSidebarDesc").textContent = desc;
            document.getElementById("profSidebarImg").src = img;
            document.getElementById("profSidebarArea").textContent = area;
            document.getElementById("profSidebarEmail").textContent = email;

            // Mostrar sidebar e overlay
            sidebar.style.display = "block";
            overlay.style.display = "block";

            document.body.classList.add("no-scroll");
        });
    });

    // FECHAR SIDEBAR
    const closeSidebar = () => {
        sidebar.style.display = "none";
        overlay.style.display = "none";
        document.body.classList.remove("no-scroll");
    };

    document.getElementById("closeProfessorSidebar").addEventListener("click", closeSidebar);
    overlay.addEventListener("click", closeSidebar);

});
</script>

            <!-- Infraestrutura -->
            <section id="infraestrutura-content" class="content-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mb-4">
                            <h3 class="section-title">Galeria de Instalações</h3>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/labCientifico.png', 'Laboratório Científico')">
                                <img src="public/imagens/labCientifico.png" alt="Laboratório Científico" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Laboratório Científico</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/auditorio3.jpeg', 'Auditório')">
                                <img src="public/imagens/auditorio3.jpeg" alt="Auditório" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Auditório</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/auditorio2.jpeg', 'Auditório')">
                                <img src="public/imagens/auditorio2.jpeg" alt="Auditório" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Auditório</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/biblioteca4.png', 'Biblioteca')">
                                <img src="public/imagens/biblioteca4.png" alt="bilbioteca" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Biblioteca</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/patio3.png', 'Patio')">
                                <img src="public/imagens/patio3.png" alt="Patio" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Patio</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/laguinho.png', 'Laguinho')">
                                <img src="public/imagens/laguinho.png" alt="Laguinho" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Laguinho</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/labMecanica.png', 'Laboratório de Mecanica')">
                                <img src="public/imagens/labMecanica.png" alt="Laboratório de Mecanica" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Laboratório de Mecanica</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/biblioteca4.png', 'Biblioteca')">
                                <img src="public/imagens/biblioteca4.png" alt="bilbioteca" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Biblioteca</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/cpd.png', 'Centro de Processamento de Dados')">
                                <img src="public/imagens/cpd.png" alt="Centro de Processamento de Dados" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Centro de Processamento de Dados</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/edificacao.PNG', 'Edificações')">
                                <img src="public\imagens\edificacao.PNG" alt="Edificações" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Edificações</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/entradaSecretaria.PNG', 'Secretaria')">
                                <img src="public\imagens\entradaSecretaria.PNG" alt="Secretaria" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Secretaria</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/esperimento.PNG', 'Laboratório Científico')">
                                <img src="public\imagens\esperimento.PNG" alt="Laboratório Científico" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Laboratório Científico</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/estudio.PNG', 'Estudio de Gravações')">
                                <img src="public\imagens\estudio.PNG" alt="Estudio de Gravações" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Estudio de Gravações</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/faixada2.PNG', 'Faixada')">
                                <img src="public\imagens\faixada2.PNG" alt="Faixada" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Faixada</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/lab1.PNG', 'Laboratório de Informática')">
                                <img src="public\imagens\lab1.PNG" alt="Laboratório de Informática" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Laboratório de Informática</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/lab2.PNG', 'Laboratório de Informática')">
                                <img src="public\imagens\lab2.PNG" alt="Laboratório de Informática" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Laboratório de Informática</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/lab4.PNG', 'Laboratório de Informática')">
                                <img src="public\imagens\lab4.PNG" alt="Laboratório de Informática" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Laboratório de Informática</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/lazer.PNG', 'Área Verde')">
                                <img src="public\imagens\lazer.PNG" alt="Área Verde" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Área Verde</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/lazer2.PNG', 'Área Verde')">
                                <img src="public\imagens\lazer2.PNG" alt="Área Verde" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Área Verde</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/orta.PNG', 'Orta')">
                                <img src="public\imagens\orta.PNG" alt="Orta" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Orta</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/patio.PNG', 'Pátio')">
                                <img src="public\imagens\patio.PNG" alt="Pátio" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Pátio</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/patio2.PNG', 'Pátio')">
                                <img src="public\imagens\patio2.PNG" alt="Pátio" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Pátio</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/patio4.PNG', 'Pátio')">
                                <img src="public\imagens\patio4.PNG" alt="Pátio" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Pátio</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/quadraExterna.PNG', 'Quadra Externa')">
                                <img src="public\imagens\quadraExterna.PNG" alt="Quadra Externa" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Quadra Externa</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/quadraInterna.PNG', 'Quadra Interma')">
                                <img src="public\imagens\quadraInterna.PNG" alt="Quadra Interma" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Quadra Interma</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/refeitorio.PNG', 'Refeitorio')">
                                <img src="public\imagens\refeitorio.PNG" alt="Refeitorio" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Refeitorio</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/sala.PNG', 'Sala de Aula')">
                                <img src="public\imagens\sala.PNG" alt="Sala de Aula" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Sala de Aula</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/salaMaker.PNG', 'Sala Maker')">
                                <img src="public\imagens\salaMaker.PNG" alt="Sala Maker" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Sala Maker</p>
                            </div>
                        </div>
                       
                        <div class="col-md-4 mb-4">
                            <div class="infra-gallery-item" onclick="openModal('public/imagens/secretaria.PNG', 'Secretaria')">
                                <img src="public\imagens\secretaria.PNG" alt="Secretaria" class="img-fluid rounded shadow-sm">
                                <p class="text-center mt-2 fw-medium">Secretaria</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Modal de Imagem Expandida -->
            <div id="imageModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="modal-content" id="expandedImg">
                <div id="caption"></div>
            </div>
            </section>
            <!-- Contato -->
            <section id="contato-content" class="content-section">
                <div class="section-padding">
                    <div class="container">
                        <h2 class="section-title">Entre em Contato</h2>
                        <div class="row">
                            <div class="col-lg-8 mb-4">
                                <div class="contact-form">
                                    <form id="contactForm">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="text" class="form-control" placeholder="Seu nome" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="email" class="form-control" placeholder="Seu e-mail"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Assunto" required>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" rows="5" placeholder="Sua mensagem"
                                                required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="contact-info">
                                    <h4>Informações de Contato</h4>
                                    <div class="contact-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>R. Nelson Lopes - Itagaçaba, Cruzeiro - SP</span>
                                    </div>
                                    <div class="contact-item">
                                        <i class="fas fa-phone"></i>
                                        <span>(12) 3141-1100</span>
                                    </div>
                                    <div class="contact-item">
                                        <i class="fas fa-envelope"></i>
                                        <span>e127dir@cps.sp.gov.br</span>
                                    </div>
                                    <div class="contact-item">
                                        <i class="fas fa-clock"></i>
                                        <span>Segunda a Sexta: 7h às 23h</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <h4 class="footer-title">ETEC Prof. Jose Sant'Ana de Castro</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam voluptates
                            deleniti explicabo.</p>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <h4 class="footer-title">Localização</h4>
                        <div class="footer-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4619.16935537524!2d-44.958672524699104!3d-22.585702379482402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9df431cbeeec0d%3A0x553d382afc6332f3!2sEtec%20Prof.%20Jos%C3%A9%20Sant&#39;Ana%20de%20Castro!5e1!3m2!1spt-BR!2sbr!4v1761001056492!5m2!1spt-BR!2sbr"
                                width="100%" height="200" style="border:0; border-radius: 8px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <a href="https://maps.google.com/?q=R. Nelson Lopes - Itagaçaba, Cruzeiro - SP"
                                target="_blank" class="map-link">
                                <i class="fas fa-external-link-alt me-2"></i>Abrir mapa completo
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <h4 class="footer-title">Contato</h4>
                        <ul class="footer-links">
                            <li><i class="fas fa-map-marker-alt me-2"></i> R. Nelson Lopes - Itagaçaba, Cruzeiro - SP
                            </li>
                            <li><i class="fas fa-phone me-2"></i> (12) 3141-1100</li>
                            <li><i class="fas fa-envelope me-2"></i> e127dir@cps.sp.gov.br</li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <p>© 2025 ETEC Prof. Jose Sant'Ana de Castro. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/loading_indicator.js"></script>
    <script src="assets/js/navigation.js"></script>
    <script>
        function openModal(imgSrc, captionText) {
            const modal = document.getElementById("imageModal");
            const modalImg = document.getElementById("expandedImg");
            const caption = document.getElementById("caption");

            modal.style.display = "block";
            modalImg.src = imgSrc;
            caption.innerHTML = captionText;
        }

        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }

        // Fecha o modal ao clicar fora da imagem
        window.onclick = function(event) {
            const modal = document.getElementById("imageModal");
            if (event.target === modal) {
                closeModal();
            }
        };
    </script>
</body>
</html>