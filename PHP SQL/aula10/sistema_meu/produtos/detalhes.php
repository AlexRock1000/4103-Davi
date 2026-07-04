<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
try {
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $produto = $stmt->fetch();
} 
catch (PDOException $e) {
    $_SESSION['error'] = "Erro ao carregar produto: " . $e->getMessage();
    header("Location: index.php");
}

if (!$produto) {
    $_SESSION['error'] = "Produto não encontrado: ";
    header("Location: index.php");
    exit;
}

$title = "Detalhes do Produto";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <div class="card">
            <div class="is-flex is-justify-content-center">
                <?php if ($produto['imagem']): ?>
                <figure class="image is-128x128 is-rounded">
                    <img src="../assets/uploads/<?= sanitize($produto['imagem']) ?>" alt="Imagem do produto" class="is-rounded mt-3">
                </figure>
                <?php endif; ?>
            </div>
            
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-4"><?= sanitize($produto['nome']) ?></p>
                        <p class="subtitle is-6">Código: <?= sanitize($produto['codigo']) ?></p>
                    </div>
                </div>

                <div class="content">
                    <div class="columns">
                        <div class="column">
                            <p><strong>Categoria:</strong><?= sanitize($produto['categoria']) ?></p>
                            <p><strong>Quantidade em Estoque:</strong><?= $produto['quantidade'] ?></p>
                            <p><strong>Valor de Compra:</strong> R$ <?= number_format($produto['valor_compra'], 2, ',', '.') ?></p>
                        </div>
                        <div class="column">
                            <p><strong>Valor de Venda:</strong> R$ <?= number_format($produto['valor_venda'], 2, ',', '.') ?></p>
                            <p><strong>Margem de Lucro:</strong><?= calcularMargem($produto['valor_compra'], $produto['valor_venda']) ?>%</p>
                            <p><strong>Cadastrado em:</strong><?= date('d/m/Y H:i', strtotime($produto['data_cadastro'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="editar.php?id=<?= $produto['id'] ?>" 
            class="card-footer-item button is-warning">
            <footer class="card-footer">
                <a href="index.php" class="card-footer-item button is-light">
                    <i class="fas fa-arrow-left"></i>&nbsp; Voltar
                </a>
                <a href="editar.php?id=<?= $produto['id'] ?>" class="card-footer-item button is-warning">
                    <i class="fas fa-edit"></i>&nbsp; Editar
                </a>
            </footer>
        </div>
    </div>
</section>

<?php 
function calcularMargem($compra, $venda){
    if ($compra == 0) return 0;
    return number_format((($venda - $compra) / $compra) * 100, 2, ',', '.');
}
include '../includes/footer.php'; 
?>