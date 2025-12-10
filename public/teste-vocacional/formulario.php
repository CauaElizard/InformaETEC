<?php
session_start();

/*
  formulario.php
  - Teste vocacional com 15 perguntas
  - Opções: a, b, c, d, e, f
  - Cada letra soma 1 ponto ao curso correspondente:
      a -> Tecnologia (Desenvolvimento de Sistemas / Informática)
      b -> Gestão (Administração / Logística / RH)
      c -> Saúde (Enfermagem / Nutrição / Análises Clínicas)
      d -> Infraestrutura (Edificações / Mecânica / Eletrotécnica)
      e -> Ambiente & Produção (Meio Ambiente / Química / Agronegócio)
      f -> Comunicação & Design (Eventos / Design / Audiovisual)
*/

// Inicializa sessão do formulário
if (!isset($_SESSION['formulario_iniciado'])) {
    $_SESSION['indice_pergunta'] = 0;
    $_SESSION['formulario_iniciado'] = true;
    $_SESSION['respostas'] = [];
}

// Array de 15 perguntas com 6 opções cada
if (!isset($_SESSION['todas_perguntas'])) {
    $_SESSION['todas_perguntas'] = [

        [
            'id' => 1,
            'texto_pergunta' => 'Qual tipo de atividade você mais gosta de fazer na escola?',
            'opcoes' => [
                'a' => 'Programar, resolver quebra-cabeças lógicos ou montar robôs.',
                'b' => 'Organizar eventos, gerenciar projetos ou criar planos de negócio.',
                'c' => 'Ajudar colegas, cuidar de pessoas ou aprender sobre o corpo humano.',
                'd' => 'Construir maquetes, desenhar plantas ou consertar equipamentos.',
                'e' => 'Fazer experimentos científicos, analisar amostras ou cuidar da natureza.',
                'f' => 'Criar vídeos, desenhar layouts ou produzir peças artísticas.'
            ]
        ],

        [
            'id' => 2,
            'texto_pergunta' => 'O que mais te atrai em um futuro profissional?',
            'opcoes' => [
                'a' => 'Criar tecnologias que resolvam problemas reais.',
                'b' => 'Liderar equipes, tomar decisões e gerenciar recursos.',
                'c' => 'Cuidar da saúde, bem-estar ou alimentação das pessoas.',
                'd' => 'Construir, montar ou manter estruturas e máquinas.',
                'e' => 'Trabalhar com análises laboratoriais, meio ambiente ou produção sustentável.',
                'f' => 'Produzir conteúdo criativo, eventos ou ambientes visuais.'
            ]
        ],

        [
            'id' => 3,
            'texto_pergunta' => 'Você prefere aprender por meio de:',
            'opcoes' => [
                'a' => 'Tutoriais, códigos e simulações digitais.',
                'b' => 'Estudos de caso, planejamento e simulações empresariais.',
                'c' => 'Prática clínica, primeiros socorros ou nutrição aplicada.',
                'd' => 'Oficinas práticas, desenho técnico e projetos de engenharia.',
                'e' => 'Laboratórios, campo (natureza) e experimentos químicos/biológicos.',
                'f' => 'Produção audiovisual, design gráfico ou cenografia.'
            ]
        ],

        [
            'id' => 4,
            'texto_pergunta' => 'Como você lida com um problema novo?',
            'opcoes' => [
                'a' => 'Busco soluções tecnológicas ou automatizadas.',
                'b' => 'Planejo etapas e delego tarefas conforme habilidades.',
                'c' => 'Pergunto como as pessoas estão afetadas e ofereço apoio.',
                'd' => 'Testo soluções práticas com as mãos ou ferramentas.',
                'e' => 'Analiso amostras, dados ou impactos ambientais.',
                'f' => 'Crio uma representação visual ou narrativa do problema.'
            ]
        ],

        [
            'id' => 5,
            'texto_pergunta' => 'Qual ambiente te deixa mais motivado(a)?',
            'opcoes' => [
                'a' => 'Laboratório de informática ou hackathon.',
                'b' => 'Sala de reuniões, startup ou centro logístico.',
                'c' => 'Clínica, hospital ou cozinha experimental de nutrição.',
                'd' => 'Oficina mecânica, obra ou laboratório de eletricidade.',
                'e' => 'Laboratório químico, horta urbana ou estação de tratamento.',
                'f' => 'Estúdio de vídeo, atelier de design ou palco de evento.'
            ]
        ],

        [
            'id' => 6,
            'texto_pergunta' => 'Você se considera mais:',
            'opcoes' => [
                'a' => 'Lógico(a) e curioso(a) por tecnologia.',
                'b' => 'Organizado(a) e bom(a) em tomar decisões.',
                'c' => 'Empático(a) e atencioso(a) com as necessidades alheias.',
                'd' => 'Habilidoso(a) com ferramentas e máquinas.',
                'e' => 'Observador(a) e interessado(a) em ciência e natureza.',
                'f' => 'Criativo(a) e expressivo(a) artisticamente.'
            ]
        ],

        [
            'id' => 7,
            'texto_pergunta' => 'Qual projeto escolar você escolheria?',
            'opcoes' => [
                'a' => 'Desenvolver um app para ajudar a comunidade escolar.',
                'b' => 'Organizar uma feira de empreendedorismo ou logística escolar.',
                'c' => 'Campanha de vacinação ou oficina de alimentação saudável.',
                'd' => 'Construir uma ponte de madeira ou sistema de irrigação automático.',
                'e' => 'Análise da qualidade da água local ou compostagem na escola.',
                'f' => 'Produzir um curta-metragem ou redecorar um espaço da escola.'
            ]
        ],

        [
            'id' => 8,
            'texto_pergunta' => 'O que te deixa mais orgulhoso(a) ao terminar algo?',
            'opcoes' => [
                'a' => 'Ver um código funcionando perfeitamente.',
                'b' => 'Ver um processo otimizado ou lucro gerado.',
                'c' => 'Ver alguém mais saudável ou feliz.',
                'd' => 'Ver uma estrutura ou máquina funcionando bem.',
                'e' => 'Ver um experimento com resultados claros ou impacto ambiental positivo.',
                'f' => 'Ver pessoas emocionadas com sua criação artística.'
            ]
        ],

        [
            'id' => 9,
            'texto_pergunta' => 'Você prefere trabalhar:',
            'opcoes' => [
                'a' => 'Com computadores, dados e algoritmos.',
                'b' => 'Com planilhas, pessoas e prazos.',
                'c' => 'Com pacientes, alimentos ou protocolos de saúde.',
                'd' => 'Com materiais, ferramentas e desenhos técnicos.',
                'e' => 'Com substâncias, amostras ou ecossistemas.',
                'f' => 'Com câmeras, cores, sons ou cenários.'
            ]
        ],

        [
            'id' => 10,
            'texto_pergunta' => 'Qual frase combina mais com você?',
            'opcoes' => [
                'a' => '“A tecnologia pode mudar o mundo.”',
                'b' => '“Organização é o segredo do sucesso.”',
                'c' => '“Cuidar do outro me realiza.”',
                'd' => '“Construir algo durável é meu propósito.”',
                'e' => '“A ciência ajuda a entender e proteger a vida.”',
                'f' => '“A arte transforma a realidade.”'
            ]
        ],

        [
            'id' => 11,
            'texto_pergunta' => 'Seu hobby ideal envolve:',
            'opcoes' => [
                'a' => 'Jogos de lógica, programação ou eletrônica.',
                'b' => 'Empreender, vender ou organizar eventos.',
                'c' => 'Cuidar de idosos, animais ou cozinhar.',
                'd' => 'Consertar carros, montar móveis ou soldar.',
                'e' => 'Jardinagem, reciclagem ou observar a natureza.',
                'f' => 'Fotografia, pintura, música ou teatro.'
            ]
        ],

        [
            'id' => 12,
            'texto_pergunta' => 'Você se vê melhor em uma equipe quando:',
            'opcoes' => [
                'a' => 'Resolve problemas técnicos ou automatiza tarefas.',
                'b' => 'Coordena tarefas, define metas ou negocia.',
                'c' => 'Oferece apoio emocional ou cuida da saúde do grupo.',
                'd' => 'Executa a parte prática, constrói ou instala.',
                'e' => 'Testa hipóteses, coleta dados ou avalia riscos.',
                'f' => 'Cria a identidade visual ou comunicação do projeto.'
            ]
        ],

        [
            'id' => 13,
            'texto_pergunta' => 'Qual curso técnico parece mais interessante?',
            'opcoes' => [
                'a' => 'Desenvolvimento de Sistemas ou Informática.',
                'b' => 'Administração, Logística ou Recursos Humanos.',
                'c' => 'Enfermagem, Nutrição ou Análises Clínicas.',
                'd' => 'Edificações, Mecânica ou Eletrotécnica.',
                'e' => 'Meio Ambiente, Química ou Agronegócio.',
                'f' => 'Eventos, Design de Interiores ou Audiovisual.'
            ]
        ],

        [
            'id' => 14,
            'texto_pergunta' => 'Você valoriza mais em um trabalho:',
            'opcoes' => [
                'a' => 'Inovação e resolução de problemas complexos.',
                'b' => 'Eficiência, lucro e crescimento profissional.',
                'c' => 'Impacto social e cuidado humano.',
                'd' => 'Precisão, resistência e funcionalidade.',
                'e' => 'Sustentabilidade, análise e segurança.',
                'f' => 'Estética, originalidade e expressão.'
            ]
        ],

        [
            'id' => 15,
            'texto_pergunta' => 'Como você imagina seu primeiro emprego?',
            'opcoes' => [
                'a' => 'Como programador(a) ou suporte de TI.',
                'b' => 'Como assistente administrativo(a) ou logístico(a).',
                'c' => 'Como técnico(a) em saúde ou nutrição.',
                'd' => 'Como auxiliar em obras, fábricas ou instalações.',
                'e' => 'Como técnico(a) em laboratório ou meio ambiente.',
                'f' => 'Como produtor(a) de conteúdo ou designer.'
            ]
        ]

    ];
}

$indice = $_SESSION['indice_pergunta'] ?? 0;
$totalPerguntas = count($_SESSION['todas_perguntas']);
$pergunta_atual = $_SESSION['todas_perguntas'][$indice];
$ultimaPergunta = ($indice + 1 >= $totalPerguntas);

// Processa submissão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['voltar'])) {
        if ($indice > 0) {
            $_SESSION['indice_pergunta'] = max(0, $indice - 1);
        }
    } else {
        $resposta = $_POST['resposta'] ?? null;
        if ($resposta !== null) {
            $_SESSION['respostas'][$indice] = $resposta;

            if ($indice + 1 >= $totalPerguntas) {
                // Mapeamento atualizado com 6 perfis
                $mapeamentoCursos = [
                    'a' => 'Tecnologia (Desenvolvimento de Sistemas / Informática)',
                    'b' => 'Gestão (Administração / Logística / RH)',
                    'c' => 'Saúde (Enfermagem / Nutrição / Análises Clínicas)',
                    'd' => 'Infraestrutura (Edificações / Mecânica / Eletrotécnica)',
                    'e' => 'Ambiente & Produção (Meio Ambiente / Química / Agronegócio)',
                    'f' => 'Comunicação & Design (Eventos / Design / Audiovisual)'
                ];

                $pontuacao = array_fill_keys($mapeamentoCursos, 0);

                foreach ($_SESSION['respostas'] as $resp) {
                    if (isset($mapeamentoCursos[$resp])) {
                        $curso = $mapeamentoCursos[$resp];
                        $pontuacao[$curso]++;
                    }
                }

                arsort($pontuacao);
                $cursoRecomendado = array_key_first($pontuacao);
                $_SESSION['resultados'] = [
                    'curso_recomendado' => $cursoRecomendado,
                    'pontuacao' => $pontuacao[$cursoRecomendado],
                    'total_perguntas' => $totalPerguntas,
                    'todas_pontuacoes' => $pontuacao
                ];

                header('Location: resultados.php');
                exit;
            }
            $_SESSION['indice_pergunta'] = $indice + 1;
        }
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Teste Vocacional - Informa ETEC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        :root{
            --bg:#f5f7fb; --card:#ffffff; --accent:#1976d2; --muted:#666;
        }
        body{font-family:Inter,system-ui,Arial,Helvetica,sans-serif;background:var(--bg);margin:0;padding:20px;display:flex;align-items:center;justify-content:center;min-height:100vh}
        .container{width:100%;max-width:760px;background:var(--card);box-shadow:0 6px 22px rgba(10,20,40,0.08);border-radius:12px;padding:22px}
        .title-box h1{margin:0 0 6px 0;font-size:20px}
        .title-box p{margin:0;color:var(--muted)}
        .progress-container{margin-bottom:18px}
        .progress-text{font-size:13px;color:var(--muted);margin-bottom:8px}
        .progress-bar{height:10px;background:#eee;border-radius:8px;overflow:hidden}
        .progress-fill{height:100%;background:linear-gradient(90deg,var(--accent),#4fb3ff);width:0}
        .question-box p{font-size:18px;margin:0 0 14px}
        label{display:block;padding:10px;border-radius:8px;border:1px solid #e6e9ef;margin-bottom:10px;cursor:pointer}
        input[type="radio"]{margin-right:10px}
        .navigation{display:flex;gap:10px;justify-content:space-between;margin-top:14px}
        .anterior{background:#fff;border:1px solid #d0d7df;padding:8px 14px;border-radius:8px;cursor:pointer}
        .proxima{background:var(--accent);color:#fff;border:0;padding:8px 14px;border-radius:8px;cursor:pointer}
        .footer-note{font-size:13px;color:var(--muted);margin-top:12px;text-align:center}
        @media (max-width:520px){ .navigation{flex-direction:column-reverse} }
    </style>
</head>
<body>
    <div class="container">
        <div class="title-box">
            <h1>🎯 Teste Vocacional - InformaETEC</h1>
            <p>Responda honestamente. Não existe resposta certa — o objetivo é descobrir seu perfil profissional.</p>
        </div>

        <div class="progress-container">
            <div class="progress-text"><?= $indice + 1 ?>/<?= $totalPerguntas ?> perguntas</div>
            <?php $percentual = round((($indice + 1) / $totalPerguntas) * 100); ?>
            <div class="progress-bar"><div class="progress-fill" style="width: <?= $percentual ?>%;"></div></div>
        </div>

        <div class="question-box">
            <p><strong><?= $indice + 1 ?>.</strong> <?= htmlspecialchars($pergunta_atual['texto_pergunta']) ?></p>

            <form method="POST" id="formPergunta">
                <?php foreach ($pergunta_atual['opcoes'] as $letra => $texto): ?>
                    <?php
                        $checked = (isset($_SESSION['respostas'][$indice]) && $_SESSION['respostas'][$indice] === $letra) ? 'checked' : '';
                    ?>
                    <label>
                        <input type="radio" name="resposta" value="<?= $letra ?>" required <?= $checked ?>>
                        <strong><?= strtoupper($letra) ?>)</strong> <?= htmlspecialchars($texto) ?>
                    </label>
                <?php endforeach; ?>

                <div class="navigation">
                    <div>
                        <?php if ($indice > 0): ?>
                            <button type="submit" name="voltar" class="anterior">← Voltar</button>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="proxima" class="proxima">
                            <?= $ultimaPergunta ? 'Ver Resultado 🎉' : 'Próxima →' ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer-note">Teste criado pela equipe InformaETEC • ETEC Prof. José Sant’Ana de Castro</div>
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