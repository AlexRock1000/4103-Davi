<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT v.*, c.* FROM vendas v JOIN clientes c 
                        ON v.cliente_id = c.id WHERE v.id = ?");
    $stmt->execute([$_GET['id']]);
    $venda = $stmt->fetch();
    $stmt = $pdo->prepare("SELECT vi.*, p.nome FROM vendas_itens vi JOIN produtos p 
                        ON vi.produto_id = p.id WHERE vi.venda_id = ?");
    $stmt->execute([$_GET['id']]);
    $itens = $stmt->fetchAll();
}
catch (PDOException $e) {
    errorRedirect("Erro ao carregar venda: " . $e->getMessage());
}

$title = "Detalhes de Venda";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Venda #<?= $venda['id'] ?> - <?= date('d/m/Y H:i', strtotime($venda['data_venda'])) ?>
                </p>
            </header>
            
            <div class="card-content">
                <div class="content">
                    <div class="columns">
                        <div class="column">
                            <p><strong>Cliente:</strong><?= sanitize($venda['nome_fantasia']) ?></p>
                            <p><strong>Documento:</strong><?= $venda['tipo'] ?>: <?= sanitize($venda['documento']) ?></p>
                        </div>
                        <div class="column">
                            <p><strong>Total da Venda:</strong> R$ <?= number_format($venda['total'], 2, ',', '.') ?></p>
                            <p><strong>Data:</strong><?= date('d/m/Y H:i', strtotime($venda['data_venda'])) ?></p>
                        </div>
                    </div>

                    <h3 class="subtitle">Produtos Vendidos</h3>
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($itens as $item): ?>
                            <tr>
                                <td><?= sanitize($item['nome']) ?></td>
                                <td><?= $item['quantidade'] ?></td>
                                <td>R$ <?= number_format($item['preco_unitario'], 2, ',', '.') ?></td>
                                <td>R$ <?= number_format($item['quantidade'] * $item['preco_unitario'], 2, ',', '.') ?></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>

            <footer class="card-footer">
                <a href="index.php" class="card-footer-item button is-light">
                    <i class="fas fa-arrow-left"></i>&nbsp; Voltar
                </a>
            </footer>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>