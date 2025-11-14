<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'etec_site';
$username = 'root'; // Substitua pelo seu usuário do MySQL
$password = '&tec77@info!'; // Substitua pela sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Função para sanitizar entradas
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = sanitizeInput($_POST['tipo']);
    
    if ($tipo === 'curso') {
        // Sanitiza os dados do curso
        $nome = sanitizeInput($_POST['nome']);
        $descricao = sanitizeInput($_POST['descricao']);
        $duracao = sanitizeInput($_POST['duracao']);
        $modalidade = sanitizeInput($_POST['modalidade']);
        $imagem = !empty($_POST['imagem']) ? sanitizeInput($_POST['imagem']) : null;
        $competencias = !empty($_POST['competencias']) ? sanitizeInput($_POST['competencias']) : null;
        $sobre = !empty($_POST['sobre']) ? sanitizeInput($_POST['sobre']) : null;
        $coordenador = !empty($_POST['coordenador']) ? sanitizeInput($_POST['coordenador']) : null;
        $email_coordenador = !empty($_POST['email_coordenador']) ? filter_var($_POST['email_coordenador'], FILTER_VALIDATE_EMAIL) : null;

        // Validação de campos obrigatórios
        if (empty($nome) || empty($descricao) || empty($duracao) || empty($modalidade)) {
            $error = "Preencha todos os campos obrigatórios.";
        } elseif ($email_coordenador === false && !empty($_POST['email_coordenador'])) {
            $error = "Email do coordenador inválido.";
        } else {
            try {
                $stmt = $pdo->prepare("INSERT INTO cursos (nome, descricao, duracao, modalidade, imagem, competencias, sobre, coordenador, email_coordenador) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$nome, $descricao, $duracao, $modalidade, $imagem, $competencias, $sobre, $coordenador, $email_coordenador]);
                $success = "Curso adicionado com sucesso!";
            } catch (PDOException $e) {
                $error = "Erro ao adicionar curso: " . $e->getMessage();
            }
        }
    } elseif ($tipo === 'professor') {
        // Sanitiza os dados do professor
        $nome = sanitizeInput($_POST['nome']);
        $biografia = !empty($_POST['biografia']) ? sanitizeInput($_POST['biografia']) : null;
        $materia = sanitizeInput($_POST['materia']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $imagem = !empty($_POST['imagem']) ? sanitizeInput($_POST['imagem']) : null;

        // Validação de campos obrigatórios
        if (empty($nome) || empty($materia) || $email === false) {
            $error = "Preencha todos os campos obrigatórios e um email válido para professor.";
        } else {
            try {
                $stmt = $pdo->prepare("INSERT INTO professores (nome, biografia, materia, email, imagem) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nome, $biografia, $materia, $email, $imagem]);
                $success = "Professor adicionado com sucesso!";
            } catch (PDOException $e) {
                $error = "Erro ao adicionar professor: " . $e->getMessage();
            }
        }
    } else {
        $error = "Tipo inválido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Populate Database - ETEC Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: 1px solid rgba(0, 0, 0, 0.125);
            transition: box-shadow 0.15s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-control:focus, .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .alert {
            border-radius: 0.375rem;
        }
        .section-padding {
            padding: 2rem 0;
        }
        .bg-light-custom {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1><i class="fas fa-database me-2"></i>Populate Database</h1>
                    <p class="lead">Adicione cursos e professores ao banco de dados da ETEC</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <?php if (isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-info-circle me-2"></i>Instruções</h3>
                    </div>
                    <div class="card-body">
                        <p>Esta página permite adicionar novos cursos e professores ao banco de dados <code>etec_site</code>.</p>
                        <p>Por favor, preencha os formulários abaixo com as informações necessárias e clique no botão correspondente para inserir os dados.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Formulário de Cursos -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-book-open me-2"></i>Adicionar Curso</h3>
                    </div>
                    <div class="card-body">
                        <form id="cursoForm" method="POST">
                            <input type="hidden" name="tipo" value="curso">
                            <div class="mb-3">
                                <label for="cursoNome" class="form-label">Nome do Curso *</label>
                                <input type="text" class="form-control" id="cursoNome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="cursoDescricao" class="form-label">Descrição *</label>
                                <textarea class="form-control" id="cursoDescricao" name="descricao" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="cursoDuracao" class="form-label">Duração *</label>
                                <input type="text" class="form-control" id="cursoDuracao" name="duracao" required>
                            </div>
                            <div class="mb-3">
                                <label for="cursoModalidade" class="form-label">Modalidade *</label>
                                <select class="form-select" id="cursoModalidade" name="modalidade" required>
                                    <option value="">Selecione...</option>
                                    <option value="Presencial">Presencial</option>
                                    <option value="EAD">EAD</option>
                                    <option value="Semipresencial">Semipresencial</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cursoImagem" class="form-label">URL da Imagem</label>
                                <input type="text" class="form-control" id="cursoImagem" name="imagem" placeholder="assets/img/curso-exemplo.jpg">
                            </div>
                            <div class="mb-3">
                                <label for="cursoCompetencias" class="form-label">Competências</label>
                                <textarea class="form-control" id="cursoCompetencias" name="competencias" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="cursoSobre" class="form-label">Sobre o Curso</label>
                                <textarea class="form-control" id="cursoSobre" name="sobre" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="cursoCoordenador" class="form-label">Coordenador</label>
                                <input type="text" class="form-control" id="cursoCoordenador" name="coordenador">
                            </div>
                            <div class="mb-3">
                                <label for="cursoEmailCoordenador" class="form-label">Email do Coordenador</label>
                                <input type="email" class="form-control" id="cursoEmailCoordenador" name="email_coordenador">
                            </div>
                            <button type="submit" class="btn btn-success w-100"><i class="fas fa-plus me-2"></i>Adicionar Curso</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Formulário de Professores -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-chalkboard-teacher me-2"></i>Adicionar Professor</h3>
                    </div>
                    <div class="card-body">
                        <form id="professorForm" method="POST">
                            <input type="hidden" name="tipo" value="professor">
                            <div class="mb-3">
                                <label for="professorNome" class="form-label">Nome do Professor *</label>
                                <input type="text" class="form-control" id="professorNome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="professorBiografia" class="form-label">Biografia</label>
                                <textarea class="form-control" id="professorBiografia" name="biografia" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="professorMateria" class="form-label">Matéria / Área *</label>
                                <input type="text" class="form-control" id="professorMateria" name="materia" required>
                            </div>
                            <div class="mb-3">
                                <label for="professorEmail" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="professorEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="professorImagem" class="form-label">URL da Imagem</label>
                                <input type="text" class="form-control" id="professorImagem" name="imagem" placeholder="assets/img/professor-exemplo.jpg">
                            </div>
                            <button type="submit" class="btn btn-success w-100"><i class="fas fa-plus me-2"></i>Adicionar Professor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Aviso Importante</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-danger">
                            <strong>Atenção:</strong> Certifique-se de que o banco de dados <code>etec_site</code> e as tabelas <code>cursos</code> e <code>professores</code> já existam.
                            As credenciais do banco de dados devem ser configuradas no script <code>populate_db.php</code>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-dark text-center py-3 mt-5">
        <div class="container">
            <p>&copy; 2025 ETEC Prof. Jose Sant'Ana de Castro. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```