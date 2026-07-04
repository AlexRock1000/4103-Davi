<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}
try{
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $cliente = $stmt->fetch();
}
catch (PDOException $e){
    $_SESSION['error'] = "Erro ao carregar cliente: " . $e->getMessage();
    header("Location: index.php");
    exit;
}
if (!$cliente){
    $_SESSION['error'] = "Cliente não encontrado";
    header("Location: index.php");
    exit;
}

$title = "Detalhes do Cliente";
include '../includes/header.php';
include '../includes/navbar.php';
?>

<section class="section">
    <div class="container">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Detalhes do Cliente #<?= $cliente['id'] ?>
                </p>
            </header>
            
            <div class="card-content">
                <div class="content">
                    <div class="columns">
                        <div class="column">
                            <p><strong>Responsável:</strong><?= sanitize($cliente['responsavel']) ?></p>
                            <p><strong>Nome Fantasia:</strong><?= sanitize($cliente['nome_fantasia']) ?></p>
                            <p><strong>Tipo:</strong><?= $cliente['tipo'] ?></p>
                            <p><strong>Documento:</strong><?= sanitize($cliente['documento']) ?></p>
                        </div>
                        
                        <div class="column">
                            <p><strong>Endereço:</strong><?= sanitize($cliente['endereco']) ?></p>
                            <p><strong>Telefone:</strong><?= sanitize($cliente['telefone']) ?></p>
                            <p><strong>E-mail:</strong><?= sanitize($cliente['email']) ?></p>
                            <p><strong>Cadastrado em:</strong><?= date('d/m/Y H:i', strtotime($cliente['data_cadastro'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="card-footer">
                <a href="index.php" class="card-footer-item button is-light">
                    <i class="fas fa-arrow-left"></i>&nbsp; Voltar à lista
                </a>
                <a href="editar.php?id=<?= $cliente['id'] ?>" class="card-footer-item button is-warning">
                    <i class="fas fa-edit"></i>&nbsp; Editar
                </a>
            </footer>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>