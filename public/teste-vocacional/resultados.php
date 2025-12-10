<?php
session_start();

/*
  resultados.php
  - Exibe resultado do teste vocacional
  - Recebe $_SESSION['resultados'] gerado por formulario.php
*/

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

// Descrições atualizadas para os 6 perfis
$descricoesCursos = [
    'Tecnologia (Desenvolvimento de Sistemas / Informática)' => [
        'descricao' => 'Perfil técnico focado em lógica, programação e soluções digitais.',
        'areas' => ['Desenvolvimento Web', 'Aplicativos Mobile', 'Banco de Dados', 'Redes e Suporte', 'Automação'],
        'mercado' => 'Alta demanda por profissionais, oportunidades em empresas de tecnologia, startups e setor público.',
        'cor' => '#1E88E5',
        'motivo' => 'Suas respostas indicam facilidade com raciocínio lógico, interesse por tecnologia e preferência por tarefas analíticas — características centrais para atuar em TI.'
    ],
    'Gestão (Administração / Logística)' => [
        'descricao' => 'Perfil voltado para gestão, processos, organização e comunicação.',
        'areas' => ['Administração', 'Logística', 'Marketing', 'Recursos Humanos', 'Comercial'],
        'mercado' => 'Ampla oferta de vagas em empresas de todos os setores; ótima base para empreender também.',
        'cor' => '#283593',
        'motivo' => 'Você demonstra organização, capacidade de planejamento e habilidade para trabalhar com pessoas e processos — aptidões essenciais nessas áreas.'
    ],
    'Saúde (Enfermagem / Nutrição)' => [
        'descricao' => 'Perfil vocacionado ao cuidado, empatia, responsabilidade e práticas de saúde.',
        'areas' => ['Enfermagem', 'Nutrição', 'Atenção Básica', 'Urgência e Emergência', 'Promoção de Saúde'],
        'mercado' => 'Grande demanda contínua; profissões com estabilidade e impacto social direto.',
        'cor' => '#D81B60',
        'motivo' => 'Suas respostas mostram sensibilidade, paciência e desejo de ajudar — qualidades fundamentais para quem trabalha com saúde.'
    ],
    'Infraestrutura (Edificações / Mecânica)' => [
        'descricao' => 'Perfil prático com habilidade manual, inteligência espacial e foco em execução técnica.',
        'areas' => ['Construção Civil', 'Manutenção Industrial', 'Projetos', 'Eletrotécnica', 'Automação'],
        'mercado' => 'Setores essenciais (construção e indústria) com demanda constante por técnicos qualificados.',
        'cor' => '#EF6C00',
        'motivo' => 'Você tem interesse por soluções concretas e trabalho manual, além de boa percepção técnica — o que combina com cursos práticos e de campo.'
    ],
    'Ciências da Natureza e suas Tecnologias' => [
        'descricao' => 'Perfil investigativo com foco em ciência, natureza e produção sustentável.',
        'areas' => ['Análises Laboratoriais', 'Gestão Ambiental', 'Química Industrial', 'Agronegócio', 'Segurança do Trabalho'],
        'mercado' => 'Crescimento em indústrias, laboratórios, órgãos ambientais e empresas agropecuárias.',
        'cor' => '#43A047',
        'motivo' => 'Você valoriza a ciência aplicada, observação detalhada e soluções voltadas à natureza e à produção — características típicas dessas áreas.'
    ],
    'Marketing' => [
        'descricao' => 'Perfil criativo, expressivo e focado em linguagem visual e experiências.',
        'areas' => ['Produção de Eventos', 'Design Gráfico', 'Audiovisual', 'Fotografia', 'Marketing Digital'],
        'mercado' => 'Oportunidades em agências, produtoras, mídias e empresas que valorizam identidade visual e conteúdo.',
        'cor' => '#8E24AA',
        'motivo' => 'Sua criatividade, sensibilidade estética e desejo de se expressar indicam que você se desenvolverá bem em áreas artísticas e de comunicação.'
    ]
];

$infoCurso = $descricoesCursos[$cursoRecomendado] ?? [
    'descricao' => 'Perfil técnico com boas oportunidades no mercado.',
    'areas' => ['Formação Técnica'],
    'mercado' => 'Boa demanda no mercado de trabalho.',
    'cor' => '#666666',
    'motivo' => 'Suas respostas indicaram um perfil técnico ou prático compatível com cursos técnicos.'
];

arsort($todasPontuacoes);
$outrosCursos = $todasPontuacoes;
unset($outrosCursos[$cursoRecomendado]);
$outrosCursos = array_slice($outrosCursos, 0, 3, true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Resultado - Teste Vocacional InformaETEC</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/result.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <div class="top">
                <div id="chartContainer" style="width:160px;height:160px;position:relative;">
                    <canvas id="doughnut"></canvas>
                    <div style="position:absolute;left:0;top:0;width:100%;height:100%;display:flex;align-items:center;justify-content:center;flex-direction:column">
                        <div style="font-weight:800;font-size:20px;color:<?= htmlspecialchars($infoCurso['cor']) ?>"><?= $porcentagemCompatibilidade ?>%</div>
                        <div style="font-size:12px;color:var(--muted)">Compatibilidade</div>
                    </div>
                </div>

                <div class="title">
                    <h1>Resultado do Teste Vocacional</h1>
                    <p class="lead">Curso recomendado: <strong><?= htmlspecialchars($cursoRecomendado) ?></strong></p>
                    <p style="margin:6px 0;color:var(--muted)"><?= htmlspecialchars($infoCurso['descricao']) ?></p>
                    <div style="margin-top:10px">
                        <span class="badge" style="background:<?= htmlspecialchars($infoCurso['cor']) ?>"><?= $porcentagemCompatibilidade ?>%</span>
                        <span style="margin-left:10px;color:var(--muted)">Pontuação: <?= $pontuacao ?> / <?= $totalPerguntas ?></span>
                    </div>
                </div>
            </div>

            <div class="curso-info">
                <div class="card-section">
                    <h3>Por que você combina com esse curso?</h3>
                    <p style="margin:8px 0;color:var(--muted)"><?= htmlspecialchars($infoCurso['motivo']) ?></p>

                    <h4 style="margin-top:12px">Áreas de atuação</h4>
                    <ul class="areas-lista">
                        <?php foreach ($infoCurso['areas'] as $area): ?>
                            <li>• <?= htmlspecialchars($area) ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <h4 style="margin-top:12px">Mercado de trabalho</h4>
                    <p style="margin:6px 0;color:var(--muted)"><?= htmlspecialchars($infoCurso['mercado']) ?></p>

                    <h4 style="margin-top:12px">Dicas para você</h4>
                    <ul style="margin:6px 0 0 18px;color:var(--muted)">
                        <li>• Procure fazer cursos extras na área (cursos curtos, oficinas, bootcamps).</li>
                        <li>• Participe de projetos práticos e feiras da escola.</li>
                        <li>• Busque estágios ou programas de iniciação profissional.</li>
                    </ul>
                </div>

                <div>
                    <div class="card-section">
                        <h4>Outras compatibilidades</h4>
                        <?php if (!empty($outrosCursos)): ?>
                            <ul class="outras-compatibilidades">
                                <?php foreach ($outrosCursos as $curso => $pontos): ?>
                                    <li>
                                        <span><?= htmlspecialchars($curso) ?></span>
                                        <span><?= round(($pontos / $totalPerguntas) * 100) ?>%</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p style="color:var(--muted)">Nenhuma outra compatibilidade encontrada.</p>
                        <?php endif; ?>

                        <hr style="margin:12px 0;border:none;border-top:1px solid #f0f0f0">

                        <h4>Relatório rápido</h4>
                        <p style="color:var(--muted);margin:6px 0">
                            Pontuação detalhada (por perfil):
                        </p>
                        <ul style="list-style:none;padding:0;margin:0;color:var(--muted)">
                            <?php foreach ($todasPontuacoes as $curso => $pontos): ?>
                                <li style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px dashed #f0f0f0">
                                    <span><?= htmlspecialchars($curso) ?></span>
                                    <span><?= $pontos ?> pts</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="acoes">
                            <a class="btn btn-refazer" href="formulario.php">🔄 Refazer Teste</a>
                            <a class="btn btn-novo" href="reset.php">🆕 Iniciar novo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('doughnut').getContext('2d');
        const percent = <?= $porcentagemCompatibilidade ?>;
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [percent, 100 - percent],
                    backgroundColor: ['<?= $infoCurso['cor'] ?>', '#e6eef9'],
                    borderWidth: 0,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false }, tooltip: { enabled: false }},
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>