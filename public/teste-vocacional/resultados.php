<?php
session_start();

if (!isset($_SESSION['resultados'])) {
    header('Location: formulario.php');
    exit;
}

$resultado = $_SESSION['resultados'];
$cursoRecomendado = $resultado['curso_recomendado'];
$pontuacao = $resultado['pontuacao'];
$totalPerguntas = $resultado['total_perguntas'];
$todasPontuacoes = $resultado['todas_pontuacoes'];

$porcentagemCompatibilidade = round(($pontuacao / $totalPerguntas) * 100);

$descricoesCursos = [
    'Desenvolvimento de Sistemas / Técnico em Informática' => [
        'descricao' => 'Você tem perfil para trabalhar com tecnologia, programação e sistemas computacionais.',
        'areas' => ['Programação', 'Desenvolvimento Web', 'Aplicativos Mobile', 'Banco de Dados', 'Redes'],
        'mercado' => 'Área em alta demanda com excelentes oportunidades de emprego e salários atrativos.',
        'cor' => '#2196F3'
    ],
    'Mecânica / Edificações' => [
        'descricao' => 'Você tem aptidão para trabalhar com máquinas, estruturas e projetos de construção.',
        'areas' => ['Manutenção Industrial', 'Projetos Estruturais', 'Construção Civil', 'Máquinas', 'Automação'],
        'mercado' => 'Setor fundamental da economia com oportunidades em indústrias e construção civil.',
        'cor' => '#FF9800'
    ],
    'Nutrição' => [
        'descricao' => 'Você demonstra interesse em saúde, alimentação e bem-estar das pessoas.',
        'areas' => ['Alimentação Saudável', 'Dietas Terapêuticas', 'Nutrição Esportiva', 'Saúde Pública'],
        'mercado' => 'Área em crescimento com foco na prevenção e promoção da saúde.',
        'cor' => '#4CAF50'
    ],
    'Enfermagem' => [
        'descricao' => 'Você tem vocação para cuidar de pessoas e trabalhar na área da saúde.',
        'areas' => ['Cuidados Hospitalares', 'Saúde Pública', 'Emergências', 'Pediatria', 'Geriatria'],
        'mercado' => 'Profissão essencial com alta demanda e estabilidade no mercado.',
        'cor' => '#E91E63'
    ],
    'Técnico em Informática / Logística' => [
        'descricao' => 'Você combina habilidades técnicas com organização e planejamento.',
        'areas' => ['Suporte Técnico', 'Gestão de Estoques', 'Transporte', 'Armazenagem', 'TI'],
        'mercado' => 'Áreas complementares com boa demanda no mercado atual.',
        'cor' => '#9C27B0'
    ],
    'Logística / Administração' => [
        'descricao' => 'Você tem perfil organizacional e gosta de planejar e gerenciar processos.',
        'areas' => ['Gestão de Estoques', 'Administração', 'Recursos Humanos', 'Finanças', 'Planejamento'],
        'mercado' => 'Áreas fundamentais em qualquer empresa, com boa estabilidade profissional.',
        'cor' => '#795548'
    ],
    'Edificações' => [
        'descricao' => 'Você tem interesse em construção, projetos arquitetônicos e engenharia civil.',
        'areas' => ['Projetos Arquitetônicos', 'Construção Civil', 'Orçamentos', 'Fiscalização de Obras'],
        'mercado' => 'Setor importante da economia com oportunidades em construtoras e escritórios.',
        'cor' => '#607D8B'
    ],
    'Ciências da Natureza' => [
        'descricao' => 'Você demonstra curiosidade científica e interesse em pesquisa e experimentação.',
        'areas' => ['Pesquisa Científica', 'Laboratórios', 'Meio Ambiente', 'Análises', 'Biotecnologia'],
        'mercado' => 'Área em crescimento com foco em sustentabilidade e inovação.',
        'cor' => '#009688'
    ],
    'Marketing / Gastronomia' => [
        'descricao' => 'Você tem perfil criativo e gosta de trabalhar com pessoas e experiências.',
        'areas' => ['Marketing Digital', 'Publicidade', 'Gastronomia', 'Eventos', 'Comunicação'],
        'mercado' => 'Áreas criativas com boa demanda, especialmente no setor de serviços.',
        'cor' => '#FF5722'
    ],
    'Administração' => [
        'descricao' => 'Você tem perfil gerencial e interesse em liderar equipes e processos.',
        'areas' => ['Gestão Empresarial', 'Recursos Humanos', 'Finanças', 'Planejamento Estratégico'],
        'mercado' => 'Área fundamental com oportunidades em diversos setores da economia.',
        'cor' => '#3F51B5'
    ]
];

$infoCurso = $descricoesCursos[$cursoRecomendado] ?? [
    'descricao' => 'Curso técnico com boas oportunidades no mercado.',
    'areas' => ['Área Técnica'],
    'mercado' => 'Boa demanda no mercado de trabalho.',
    'cor' => '#666666'
];

$outrosCursos = array_slice($todasPontuacoes, 1, 3, true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Resultado do seu teste vocacional">
    <title>Seu Resultado - Teste Vocacional</title>
    <link rel="stylesheet" href="../../assets/css/result.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="dashboard">
        <div class="dashboard-content">
            <div class="progress-section">
                <div class="progress-container">
                    <div class="progress-circle">
                        <canvas id="circleChart"></canvas>
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                            <div style="font-size: 36px; font-weight: bold; color: <?= $infoCurso['cor'] ?>;"><?= $porcentagemCompatibilidade ?>%</div>
                            <div style="font-size: 12px; color: #666;">compatibilidade</div>
                        </div>
                    </div>
                </div>
                
                <div class="progress-labels">
                    <div class="status-label" style="color: <?= $infoCurso['cor'] ?>;">
                        🎯 <?= htmlspecialchars($cursoRecomendado) ?>
                    </div>
                </div>
            </div>
            
            <div class="recomendacoes-container">
                <div class="recomendacoes-header">SEU PERFIL VOCACIONAL</div>
                
                <div class="curso-info">
                    <h3>📚 Curso Recomendado</h3>
                    <p><strong><?= htmlspecialchars($cursoRecomendado) ?></strong></p>
                    <p><?= htmlspecialchars($infoCurso['descricao']) ?></p>
                    
                    <h4>🎯 Áreas de Atuação:</h4>
                    <ul>
                        <?php foreach ($infoCurso['areas'] as $area): ?>
                            <li><?= htmlspecialchars($area) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <h4>💼 Mercado de Trabalho:</h4>
                    <p><?= htmlspecialchars($infoCurso['mercado']) ?></p>
                    
                    <?php if (!empty($outrosCursos)): ?>
                        <h4>📊 Outras Compatibilidades:</h4>
                        <ul>
                            <?php foreach ($outrosCursos as $curso => $pontos): ?>
                                <li><?= htmlspecialchars($curso) ?> - <?= round(($pontos / $totalPerguntas) * 100) ?>%</li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                
                <div class="acoes">
                    <a href="formulario.php" class="btn-refazer">🔄 Refazer Teste</a>
                    <a href="reset.php" class="btn-novo">🆕 Novo Teste</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctxCircle = document.getElementById('circleChart').getContext('2d');
        
        new Chart(ctxCircle, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?= $porcentagemCompatibilidade ?>, 100 - <?= $porcentagemCompatibilidade ?>],
                    backgroundColor: [
                        '<?= $infoCurso['cor'] ?>',
                        '#e0e0e0'
                    ],
                    borderWidth: 0,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });
    </script>
</body>
</html>
