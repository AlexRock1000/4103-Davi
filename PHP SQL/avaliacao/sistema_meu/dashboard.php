<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';
checkLogin();

$title = "Dashboard";
include 'includes/header.php';
include 'includes/navbar.php';

// Últimos clientes
$stmt = $pdo->query("SELECT nome_fantasia, documento, data_cadastro FROM clientes ORDER BY data_cadastro DESC LIMIT 5");
$clientes = $stmt->fetchAll();

// Últimas vendas
$stmt = $pdo->query("SELECT v.total, v.data_venda, c.nome_fantasia FROM vendas v JOIN clientes c ON v.cliente_id = c.id ORDER BY v.data_venda DESC LIMIT 5");
$vendas = $stmt->fetchAll();
?>
<section class="section">
    <div class="container">
        <h1 class="title">Dashboard</h1>
        
        <div class="columns">
            <!-- Últimos Clientes -->
            <div class="column">
                <div class="box">
                    <h2 class="subtitle">Últimos Clientes Cadastrados</h2>
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Documento</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= sanitize($cliente['nome_fantasia']) ?></td>
                                <td><?= number_format($cliente['documento'], 2, ',', '.') ?></td>
                                <td><?= date('d/m/Y', strtotime($cliente['data_cadastro'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Últimas Vendas -->
            <div class="column">
                <div class="box">
                    <h2 class="subtitle">Últimas Vendas</h2>
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vendas as $venda): ?>
                            <tr>
                                <td><?= sanitize($venda['nome_fantasia']) ?></td>
                                <td>R$ <?= number_format($venda['total'], 2, ',', '.') ?></td>
                                <td><?= date('d/m/Y', strtotime($venda['data_venda'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>