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
                            <a class="nav-link" href="#vestibulinho">Vestibulinho</a>
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
                    <p class="hero-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio
                        laboriosam voluptates deleniti explicabo temporibus.</p>
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
                                <p class="hero-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem
                                    odio laboriosam voluptates deleniti explicabo temporibus.</p>
                            </div>
                        </div>
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 mb-4">
                                <div class="about-content">
                                    <h3 class="about-subtitle">Transformando Vidas Através da Educação</h3>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
                                    <div class="about-features">
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Lorem ipsum dolor sit amet consectetur</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Adipisicing elit sed do eiusmod tempor</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Incididunt ut labore et dolore magna</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Aliqua ut enim ad minim veniam quis</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="about-image position-relative">
                                    <img src="assets/img/faixada_escola.jpg" alt="Nossa Escola"
                                        class="img-fluid rounded">
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge bg-accent text-dark p-2">Põe algo aqui</span>
                                    </div>
                                    <div class="position-absolute bottom-0 end-0 m-3">
                                        <span class="badge bg-primary text-white p-2">Aqui tbm</span>
                                    </div>
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
                                    <h3 class="feature-title">Depressão Acadêmica</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="feature-box h-100">
                                    <div class="feature-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h3 class="feature-title">Foco no Desemprego</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="feature-box h-100">
                                    <div class="feature-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h3 class="feature-title">Comunidade desengajada</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="feature-box h-100">
                                    <div class="feature-icon">
                                        <i class="fas fa-hand-holding-heart"></i>
                                    </div>
                                    <h3 class="feature-title">Fiquei sem ideia de o que colocar aqui</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Nossa História -->
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-4">
                                <h3 class="section-title">Nossa História</h3>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <div class="about-content text-center">
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
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
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h3 class="feature-title">Trabalho em Equipe</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-brain"></i>
                                    </div>
                                    <h3 class="feature-title">Pensamento Crítico</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-4">
                                <h3 class="section-title">O Que Dizem Sobre Nós</h3>
                                <p class="hero-subtitle">Avaliações de alunos e responsáveis</p>
                                <div class="d-flex justify-content-center align-items-center mb-4">
                                    <div class="text-warning me-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <strong class="text-primary fs-4 ms-2">4.8</strong>
                                    <small class="text-muted ms-2">(69 avaliações)</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#reviewsCarousel" data-bs-slide-to="0"
                                            class="active"></button>
                                        <button type="button" data-bs-target="#reviewsCarousel"
                                            data-bs-slide-to="1"></button>
                                        <button type="button" data-bs-target="#reviewsCarousel"
                                            data-bs-slide-to="2"></button>
                                        <button type="button" data-bs-target="#reviewsCarousel"
                                            data-bs-slide-to="3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <div class="teacher-card text-center mx-auto"
                                                        style="max-width: 600px;">
                                                        <div class="teacher-avatar">
                                                            <i class="fas fa-user-graduate"></i>
                                                        </div>
                                                        <h4 class="teacher-name">Flor de Liz</h4>
                                                        <div class="teacher-subject">
                                                            <div class="text-warning mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <small class="text-muted">Aluna de Desenvolvimento de
                                                                Sistemas</small>
                                                        </div>
                                                        <p class="teacher-bio">"Lorem ipsum dolor sit amet consectetur
                                                            adipisicing elit. Quidem odio laboriosam voluptates deleniti
                                                            explicabo temporibus."</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <div class="teacher-card text-center mx-auto"
                                                        style="max-width: 600px;">
                                                        <div class="teacher-avatar">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <h4 class="teacher-name">Tio Paulo</h4>
                                                        <div class="teacher-subject">
                                                            <div class="text-warning mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <small class="text-muted">Pai de Aluno</small>
                                                        </div>
                                                        <p class="teacher-bio">"Lorem ipsum dolor sit amet consectetur
                                                            adipisicing elit. Quidem odio laboriosam voluptates deleniti
                                                            explicabo temporibus."</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <div class="teacher-card text-center mx-auto"
                                                        style="max-width: 600px;">
                                                        <div class="teacher-avatar">
                                                            <i class="fas fa-user-graduate"></i>
                                                        </div>
                                                        <h4 class="teacher-name">Pessoa</h4>
                                                        <div class="teacher-subject">
                                                            <div class="text-warning mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <small class="text-muted">Ex-Aluno de poha nenhuma</small>
                                                        </div>
                                                        <p class="teacher-bio">"Lorem ipsum dolor sit amet consectetur
                                                            adipisicing elit. Quidem odio laboriosam voluptates deleniti
                                                            explicabo temporibus."</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#reviewsCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-primary rounded-circle p-3"></span>
                                        <span class="visually-hidden">Anterior</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#reviewsCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-primary rounded-circle p-3"></span>
                                        <span class="visually-hidden">Próximo</span>
                                    </button>
                                </div>
                            </div>
                        </div>
            </section>
            <!-- Cursos -->
            <section id="cursos-content" class="content-section">
                <div class="section-padding bg-light-custom">
                    <div class="container">
                        <h2 class="section-title">Nossos Cursos</h2>
                        <p class="text-center mb-5">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio
                            laboriosam voluptates deleniti explicabo temporibus.
                        </p>
                        <div class="row" id="cards-cursos">
                            <?php foreach ($cursos as $curso): ?>
                            <div class="col-md-4 mb-4">
                                <div class="course-card card-item" data-id="<?php echo $curso['id']; ?>" data-type="curso">
                                    <div class="course-img">
                                        <img src="<?php echo $curso['imagem']; ?>" alt="<?php echo htmlspecialchars($curso['nome']); ?>">
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-title"><?php echo htmlspecialchars($curso['nome']); ?></h3>
                                        <p class="course-desc">
                                            <?php echo htmlspecialchars($curso['descricao']); ?>
                                        </p>
                                        <div class="course-info">
                                            <span class="course-duration"><i class="fas fa-clock"></i> <?php echo htmlspecialchars($curso['duracao']); ?></span>
                                            <span class="course-modality"><i class="fas fa-laptop"></i> <?php echo htmlspecialchars($curso['modalidade']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <div id="sidebarOverlay"
                style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:1040; transition:opacity 0.2s ease;">
            </div>
            <!-- Sidebar reaproveitada (claramente essa parte foi feita pelo chatgpt) -->
            <div id="course-sidebar" class="content-section active bg-light-custom"
                style="display:none; position:fixed; top:0; right:0; width:420px; max-width:95%; height:100vh; box-shadow:-4px 0 20px rgba(0,0,0,0.15); z-index:1050;">
                <div style="height:100%; overflow-y:auto;">
                    <div class="course-card p-4 position-relative" style="min-height:100%;">
                        <button id="closeSidebar" style="
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
          transition:all 0.2s ease;
        " title="Fechar painel">&times;</button>
                        <div class="course-img mb-3">
                            <img src="assets/img/curso-ds.jpg" alt="Imagem do curso" class="img-fluid rounded">
                        </div>
                        <div class="course-content">
                            <h3 class="course-title" id="sidebarTitle">Desenvolvimento de Sistemas</h3>
                            <p class="course-desc" id="sidebarDesc">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio
                                laboriosam voluptates deleniti explicabo temporibus. Vitae laudantium
                                sapiente mollitia veritatis, odit obcaecati sequi! Maxime, adipisci
                                animi! Quaerat nobis mollitia excepturi.
                            </p>
                            <div class="course-info mt-3">
                                <span class="course-duration"><i class="fas fa-clock"></i> 3 anos</span>
                                <span class="course-modality"><i class="fas fa-laptop"></i> Presencial</span>
                            </div>
                            <hr class="my-4">
                            <div class="mb-4">
                                <h4 class="course-title" style="font-size:1.1rem;">Principais competências desenvolvidas
                                </h4>
                                <ul style="list-style:none; padding-left:0; margin-top:1rem; color:var(--gray);">
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> aaaaaaaa</li>
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> aaaaa</li>
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> aaaaaa</li>
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> aaaaaaaaa</li>
                                </ul>
                            </div>
                            <div class="mb-4">
                                <h4 class="course-title" style="font-size:1.1rem;">Sobre o curso</h4>
                                <p class="course-desc">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis
                                    iusto possimus unde libero vel amet nemo veritatis error pariatur.
                                    Quasi eius praesentium, iure at consequatur reprehenderit quod
                                    deleniti consequuntur nesciunt?
                                </p>
                            </div>
                            <div class="mb-4">
                                <h4 class="course-title" style="font-size:1.1rem;">Coordenação</h4>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="teacher-avatar me-3">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1" style="font-size:1rem; color:var(--primary);">Bebel Gaiozo</h5>
                                        <small class="text-muted">Coordenador do curso</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-3">
                                <p class="text-muted" style="font-size:0.9rem;">
                                    * As informações apresentadas nesta página têm caráter informativo e
                                    podem ser atualizadas conforme o plano de curso vigente. Para detalhes
                                    sobre inscrições, consulte a área do Vestibulinho.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Professores -->
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
                                <div class="course-card card-item" data-id="<?php echo $professor['id']; ?>" data-type="professor">
                                    <div class="course-img">
                                        <img src="<?php echo $professor['imagem']; ?>" alt="<?php echo htmlspecialchars($professor['nome']); ?>">
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-title"><?php echo htmlspecialchars($professor['nome']); ?></h3>
                                        <p class="course-desc">
                                            <?php echo htmlspecialchars($professor['biografia']); ?>
                                        </p>
                                        <div class="course-info">
                                            <span class="course-duration"><i class="fas fa-user-tie"></i> <?php echo htmlspecialchars($professor['materia']); ?></span>
                                            <span class="course-modality"><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($professor['email']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Infraestrutura -->
            <section id="infraestrutura-content" class="content-section">
                <div class="section-padding">
                    <div class="container">
                        <h2 class="section-title">Infraestrutura Completa</h2>
                        <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio
                            laboriosam voluptates deleniti explicabo temporibus.</p>
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 mb-4">
                                <div class="about-image">
                                    <img src="assets/img/faixada_escola.jpg" alt="Laboratórios de Informática"
                                        class="img-fluid rounded shadow-sm">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="about-content">
                                    <h3 class="about-subtitle">Laboratórios de Informática</h3>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus.</p>
                                    <div class="about-features">
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Computadores origem duvidosa</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Softwares terceirizados</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Ambiente climatizado</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 mb-4 order-lg-2">
                                <div class="about-image">
                                    <img src="assets/img/faixada_escola.jpg" alt="Biblioteca"
                                        class="img-fluid rounded shadow-sm">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 order-lg-1">
                                <div class="about-content">
                                    <h3 class="about-subtitle">Biblioteca</h3>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus.</p>
                                    <div class="about-features">
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Acervo com livros que ninguém lê</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Ambiente de estudo cheio de gente chata</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Computadores para pesquisa, mas meio véios</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 mb-4">
                                <div class="about-image">
                                    <img src="assets/img/faixada_escola.jpg" alt="Laboratórios Científicos"
                                        class="img-fluid rounded shadow-sm">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="about-content">
                                    <h3 class="about-subtitle">Laboratórios Científicos</h3>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus.</p>
                                    <div class="about-features">
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Equipamentos meio capengas</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Não há materiais para experimentos</span>
                                        </div>
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Segurança e só isso mesmo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 mb-4 order-lg-2">
                                <div class="about-image">
                                    <img src="assets/img/faixada_escola.jpg" alt="Área Esportiva"
                                        class="img-fluid rounded shadow-sm">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 order-lg-1">
                                <div class="about-content">
                                    <h3 class="about-subtitle">Quadra</h3>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus. Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit.</p>
                                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus.</p>
                                    <div class="about-features">
                                        <div class="about-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Quadra poliesportiva coberta</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12 text-center mb-4">
                                <h3 class="section-title">Outras Instalações</h3>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <h3 class="feature-title">Cantina e Refeitório</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-wifi"></i>
                                    </div>
                                    <h3 class="feature-title">Internet de Alta Velocidade</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="feature-box text-center">
                                    <div class="feature-icon">
                                        <i class="fas fa-theater-masks"></i>
                                    </div>
                                    <h3 class="feature-title">Auditório</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odio laboriosam
                                        voluptates deleniti explicabo temporibus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <h3 class="section-title">Galeria de Instalações</h3>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="infra-gallery-item">
                                    <img src="assets/img/faixada_escola.jpg" alt="Laboratório de Informática"
                                        class="img-fluid rounded shadow-sm">
                                    <p class="text-center mt-2 fw-medium">Laboratório de Informática</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="infra-gallery-item">
                                    <img src="assets/img/faixada_escola.jpg" alt="Biblioteca"
                                        class="img-fluid rounded shadow-sm">
                                    <p class="text-center mt-2 fw-medium">Biblioteca</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="infra-gallery-item">
                                    <img src="assets/img/faixada_escola.jpg" alt="Laboratório Científico"
                                        class="img-fluid rounded shadow-sm">
                                    <p class="text-center mt-2 fw-medium">Laboratório Científico</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="infra-gallery-item">
                                    <img src="assets/img/faixada_escola.jpg" alt="Quadra Esportiva"
                                        class="img-fluid rounded shadow-sm">
                                    <p class="text-center mt-2 fw-medium">Quadra Esportiva</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Vestibulinho -->
            <section id="vestibulinho-content" class="content-section">
                <div class="section-padding bg-light-custom">
                    <div class="container">
                        <h2 class="section-title">Processo Seletivo</h2>
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4">
                                <div class="admission-info">
                                    <h3 class="admission-subtitle">Lorem Ipsum Dolor</h3>
                                    <p class="admission-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Quidem odio laboriosam voluptates deleniti explicabo temporibus.</p>
                                    <div class="admission-details">
                                        <div class="admission-detail">
                                            <i class="fas fa-calendar-alt"></i>
                                            <div>
                                                <strong>Lorem Ipsum</strong>
                                                <p>Lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>
                                        <div class="admission-detail">
                                            <i class="fas fa-file-alt"></i>
                                            <div>
                                                <strong>Dolor Sit Amet</strong>
                                                <p>Consectetur adipiscing elit</p>
                                            </div>
                                        </div>
                                        <div class="admission-detail">
                                            <i class="fas fa-graduation-cap"></i>
                                            <div>
                                                <strong>Consectetur</strong>
                                                <p>Sed do eiusmod tempor</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="admission-image text-center">
                                    <i class="fas fa-university admission-icon"></i>
                                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
</body>
</html>