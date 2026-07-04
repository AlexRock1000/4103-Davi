<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

try{
    $stmt = $pdo->query("SELECT * FROM clientes ORDER BY data_cadastro DESC");
    $clientes = $stmt->fetchAll();
}
catch(PDOException $e){
    $_SESSION['error'] = "Erro ao carregar clientes: " . $e->getMessage();

}

$title = "Lista de Clientes";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <h1 class="title">Clientes Cadastrados</h1>
            </div>
            <div class="level-right">
                <a href="cadastrar.php" class="button is-primary">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Novo Cliente</span>
                </a>
            </div>
        </div>

<?php if (isset($_SESSION['success'])): ?>
    <div class="notification is-seccess"></div>
    <?php unset($_SESSION['seccess']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="notification is-danger"><?php $_SESSION['error'] ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

        <div class="table-responsive">
            <table class="table is-fullwidth is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Responsável</th>
                        <th>Nome Fantasia</th>
                        <th>Documento</th>
                        <th>Cadastrado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente['id'] ?></td>
                        <td><?= sanitize($cliente['responsavel']) ?></td>
                        <td><?= sanitize($cliente['nome_fantasia']) ?></td>
                        <td>
                            <span class="tag is-info">
                                <?= $cliente['tipo'] ?>: <?= sanitize($cliente['documento']) ?>
                            </span>
                        </td>
                        <td><?= date('d/m/Y H:i', strtotime($cliente['data_cadastro']))?></td>
                        <td>
                            <div class="buttons are-small">
                                <a href="detalhes.php?id=<?=  $cliente['id'] ?>" 
                                   class="button is-info" 
                                   title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="editar.php?id=<?= $cliente['id'] ?>"
                                   class="button is-warning" 
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="excluir.php?id=<?= $cliente['id'] ?>" 
                                   class="button is-danger" 
                                   title="Excluir"
                                   onclick="return confirm('Tem certeza que deseja excluir este cliente?');">
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