<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

try {
    $stmt = $pdo->query("SELECT * FROM produtos ORDER BY data_cadastro DESC");
    $produtos = $stmt->fetchAll();
}
catch (PDOException $e) {
     $_SESSION['error'] = "Erro ao cadastrar: " . $e->getMessage();
}

$title = "Lista de Produtos";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <h1 class="title">Produtos Cadastrados</h1>
            </div>
            <div class="level-right">
                <a href="cadastrar.php" class="button is-primary">
                    <i class="fas fa-plus"></i>&nbsp; Novo Produto
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
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Estoque</th>
                        <th>Valor Venda</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= sanitize($produto['codigo']) ?></td>
                        <td><?= sanitize($produto['nome']) ?></td>
                        <td><?= sanitize($produto['categoria']) ?></td>
                        <td><?= $produto['quantidade'] ?></td>
                        <td>R$ <?= number_format($produto['valor_venda'], 2, ',', '.') ?></td>
                        <td>
                            <?php if ($produto['imagem']): ?>
                                <img src="../assets/uploads/<?= sanitize($produto['imagem']) ?>" alt="Imagem do produto" class="image is-48x48 is-rounded">
                            <?php else: ?>
                            <span class="tag is-light">Sem imagem</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="buttons are-small">
                                <a href="detalhes.php?id=<?= $produto['id'] ?>" 
                                   class="button is-info"
                                   title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="editar.php?id=<?= $produto['id'] ?>" 
                                   class="button is-warning" 
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="excluir.php?id=<?=  $produto['id'] ?>"
                                   class="button is-danger" 
                                   title="Excluir"
                                   onclick="return confirm('Tem certeza que deseja excluir este produto?');">
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

<?php 

include '../includes/footer.php'; 
?>