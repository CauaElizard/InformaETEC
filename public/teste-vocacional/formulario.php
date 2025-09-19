<?php
session_start();

if (!isset($_SESSION['formulario_iniciado'])) {
    $_SESSION['indice_pergunta'] = 0;
    $_SESSION['formulario_iniciado'] = true;
    $_SESSION['respostas'] = [];
}

$indice = $_SESSION['indice_pergunta'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['voltar'])) {
        if ($indice > 0) {
            $_SESSION['indice_pergunta']--;
        }
    } else {
        $resposta = $_POST['resposta'] ?? null;
        if ($resposta !== null) {
            $_SESSION['respostas'][$indice] = $resposta;

            if ($indice + 1 >= count($_SESSION['todas_perguntas'] ?? [])) {
                calcularResultados();
                header('Location: resultados.php');
                exit;
            }
            $_SESSION['indice_pergunta']++;
        }
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

function calcularResultados() {
    // Mapeamento das respostas para cursos
    $cursos = [
        'a' => 'Desenvolvimento de Sistemas / Técnico em Informática',
        'b' => 'Mecânica / Edificações',
        'c' => 'Nutrição',
        'd' => 'Enfermagem',
        'e' => 'Técnico em Informática / Logística',
        'f' => 'Logística / Administração',
        'g' => 'Edificações',
        'h' => 'Ciências da Natureza',
        'i' => 'Marketing / Gastronomia',
        'j' => 'Administração'
    ];
    
    $pontuacao = [];
    
    // Contar pontos para cada curso
    foreach ($_SESSION['respostas'] as $resposta) {
        if (isset($cursos[$resposta])) {
            $curso = $cursos[$resposta];
            if (!isset($pontuacao[$curso])) {
                $pontuacao[$curso] = 0;
            }
            $pontuacao[$curso]++;
        }
    }
    
    // Encontrar o curso com maior pontuação
    arsort($pontuacao);
    $cursoRecomendado = array_key_first($pontuacao);
    $maxPontos = $pontuacao[$cursoRecomendado];
    
    $_SESSION['resultados'] = [
        'curso_recomendado' => $cursoRecomendado,
        'pontuacao' => $maxPontos,
        'total_perguntas' => count($_SESSION['respostas']),
        'todas_pontuacoes' => $pontuacao
    ];
}

if (!isset($_SESSION['todas_perguntas'])) {
    $_SESSION['todas_perguntas'] = [
        [
            'id' => 1,
            'texto_pergunta' => 'Qual dessas cenas te deixa mais empolgado?',
            'opcoes' => [
                'a' => 'Criar um jogo ou aplicativo.',
                'b' => 'Montar uma peça de motor.',
                'c' => 'Preparar refeições saudáveis.',
                'd' => 'Ajudar pacientes em hospital ou posto de saúde.',
                'e' => 'Consertar computadores e redes.',
                'f' => 'Organizar entregas e transportes.',
                'g' => 'Desenhar plantas e projetos de obras.',
                'h' => 'Fazer experimentos em laboratório.',
                'i' => 'Criar propagandas e ideias criativas.',
                'j' => 'Administrar o caixa ou documentos de uma empresa.'
            ]
        ],
        [
            'id' => 2,
            'texto_pergunta' => 'Qual matéria você manda melhor ou mais gosta?',
            'opcoes' => [
                'a' => 'Matemática e lógica.',
                'b' => 'Física.',
                'c' => 'Biologia.',
                'd' => 'Química.',
                'e' => 'Artes/Português.',
                'f' => 'Geografia/Sociologia.'
            ]
        ],
        [
            'id' => 3,
            'texto_pergunta' => 'Se tivesse que resolver um problema, qual te animaria mais?',
            'opcoes' => [
                'a' => 'Um bug no computador.',
                'b' => 'Uma máquina que parou de funcionar.',
                'c' => 'Uma dieta pra melhorar a saúde de alguém.',
                'd' => 'Acompanhamento de um paciente doente.',
                'e' => 'Uma rede de computadores travada.',
                'f' => 'Um atraso em entregas de mercadorias.',
                'g' => 'Um cálculo estrutural pra construir algo.',
                'h' => 'Descobrir por que um experimento deu errado.',
                'i' => 'Vender um produto difícil.',
                'j' => 'Resolver problemas de gestão numa empresa.'
            ]
        ],
        [
            'id' => 4,
            'texto_pergunta' => 'Você se vê mais…',
            'opcoes' => [
                'a' => 'Sozinho no computador.',
                'b' => 'Mexendo em ferramentas e máquinas.',
                'c' => 'Em contato direto com pessoas.',
                'd' => 'Criando ideias novas.',
                'e' => 'Organizando coisas pra ficarem mais rápidas e práticas.'
            ]
        ],
        [
            'id' => 5,
            'texto_pergunta' => 'O que você acha mais divertido?',
            'opcoes' => [
                'a' => 'Programar, jogar ou explorar tecnologia.',
                'b' => 'Descobrir como objetos funcionam.',
                'c' => 'Aprender sobre saúde, corpo e alimentos.',
                'd' => 'Falar e lidar com pessoas.',
                'e' => 'Cuidar de tudo estar organizado.'
            ]
        ],
        [
            'id' => 6,
            'texto_pergunta' => 'Qual dessas profissões você mais respeita?',
            'opcoes' => [
                'a' => 'Programador.',
                'b' => 'Mecânico.',
                'c' => 'Nutricionista.',
                'd' => 'Enfermeiro.',
                'e' => 'Técnico de TI.',
                'f' => 'Logístico.',
                'g' => 'Engenheiro civil.',
                'h' => 'Cientista.',
                'i' => 'Publicitário.',
                'j' => 'Administrador.'
            ]
        ],
        [
            'id' => 7,
            'texto_pergunta' => 'Qual ambiente você gostaria de trabalhar?',
            'opcoes' => [
                'a' => 'Escritório cheio de computadores.',
                'b' => 'Oficina ou chão de fábrica.',
                'c' => 'Cozinha ou hospital.',
                'd' => 'Empresa com movimentação de cargas.',
                'e' => 'Obras em construção.',
                'f' => 'Laboratório científico.',
                'g' => 'Agência de publicidade.',
                'h' => 'Empresa de gestão.'
            ]
        ],
        [
            'id' => 8,
            'texto_pergunta' => 'O que mais te motiva no trabalho?',
            'opcoes' => [
                'a' => 'Resolver problemas com lógica.',
                'b' => 'Usar a prática e mão na massa.',
                'c' => 'Ajudar pessoas a ficarem melhores.',
                'd' => 'Ser criativo e inovar.',
                'e' => 'Planejar e organizar processos.'
            ]
        ],
        [
            'id' => 9,
            'texto_pergunta' => 'Se tivesse que escolher um projeto, qual seria?',
            'opcoes' => [
                'a' => 'Criar um app que ajude estudantes.',
                'b' => 'Consertar um carro quebrado.',
                'c' => 'Montar uma dieta saudável.',
                'd' => 'Ajudar em campanhas de vacinação.',
                'e' => 'Melhorar a rede de internet de uma escola.',
                'f' => 'Organizar entregas para bairros.',
                'g' => 'Planejar uma ponte.',
                'h' => 'Fazer experimentos sobre meio ambiente.',
                'i' => 'Montar a campanha de marketing de um show.',
                'j' => 'Gerenciar a abertura de uma loja.'
            ]
        ],
        [
            'id' => 10,
            'texto_pergunta' => 'Você prefere trabalhar mais com…',
            'opcoes' => [
                'a' => 'Computadores e sistemas.',
                'b' => 'Máquinas e estruturas.',
                'c' => 'Pessoas e saúde.',
                'd' => 'Organização e logística.',
                'e' => 'Criatividade e inovação.'
            ]
        ]
    ];
}

$pergunta_atual = $_SESSION['todas_perguntas'][$indice];
$ultimaPergunta = ($indice + 1 >= count($_SESSION['todas_perguntas']));
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Vocacional - Escola Técnica</title>
    <link rel="stylesheet" href="../../assets/css/formulario.css">
</head>
<body>
    <div class="container">
        <div class="progress-container">
            <div class="progress-text"><?= $indice + 1 ?>/<?= count($_SESSION['todas_perguntas']) ?></div>
            <div class="progress-bar">
                <?php $percentual = (($indice + 1) / count($_SESSION['todas_perguntas'])) * 100; ?>
                <div class="progress-fill" style="width: <?= $percentual ?>%;"></div>
            </div>
        </div>

        <div class="title-box">
            <h1>🎯 Teste Vocacional</h1>
            <p>Descubra qual curso técnico combina mais com você!</p>
        </div>

        <div class="question-box">
            <p><strong><?= $indice + 1 ?>.</strong> <?= htmlspecialchars($pergunta_atual['texto_pergunta']) ?></p>

            <form method="POST">
                <?php foreach ($pergunta_atual['opcoes'] as $letra => $texto): ?>
                    <label>
                        <input type="radio" name="resposta" value="<?= $letra ?>" required
                            <?= (isset($_SESSION['respostas'][$indice])) && $_SESSION['respostas'][$indice] == $letra ? 'checked' : '' ?>>
                        <strong><?= strtoupper($letra) ?>)</strong> <?= htmlspecialchars($texto) ?>
                    </label>
                <?php endforeach; ?>

                <div class="navigation">
                    <?php if ($indice > 0): ?>
                        <button type="submit" name="voltar" value="1" class="anterior">← Voltar</button>
                    <?php endif; ?>

                    <button type="submit" name="proxima" value="1" class="proxima">
                        <?= $ultimaPergunta ? 'Ver Resultado 🎉' : 'Próxima →' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const voltarBtn = document.querySelector('button[name="voltar"]');
        if (voltarBtn) {
            voltarBtn.addEventListener('click', function() {
                document.querySelectorAll('input[required]').forEach(el => el.removeAttribute('required'));
            });
        }
    </script>
</body>
</html>
