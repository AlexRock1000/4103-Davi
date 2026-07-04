<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

try {
    $stmt = $pdo->query("SELECT v.id, v.data_venda, v.total, c.nome_fantasia 
                        FROM vendas v 
                        JOIN clientes c 
                        ON v.cliente_id = c.id 
                        ORDER BY v.data_venda DESC");
    $vendas = $stmt->fetchAll();
}
catch (PDOException $e) {
     $_SESSION['error'] = "Erro ao carregar vendas: " . $e->getMessage();
}

$title = "Lista de Vendas";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <h1 class="title">Vendas Realizadas</h1>
            </div>
            <div class="level-right">
                <a href="cadastrar.php" class="button is-primary">
                    <i class="fas fa-plus"></i>&nbsp; Nova Venda
                </a>
            </div>
        </div>
        
        <?php if (isset($_SESSION['success'])): ?>
            <div class="notification is-success"><?=  $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="notification is-danger"><?=  $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($vendas as $venda): ?>
                    <tr>
                        <td><?= $venda['id'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($venda['data_venda'])) ?></td>
                        <td><?= sanitize($venda['nome_fantasia']) ?></td>
                        <td>R$ <?= number_format($venda['total'], 2, ',', '.') ?></td>
                        <td>
                            <div class="buttons are-small">
                                <a href="detalhes.php?id=<?= $venda['id'] ?>" 
                                   class="button is-info"
                                   title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" 
                                   class="button is-warning"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" 
                                   class="button is-danger"
                                   title="Excluir"
                                   onclick="return confirm('Tem certeza que deseja excluir esta venda?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>