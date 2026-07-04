<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "ID da venda não informado.";
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM vendas WHERE id = ?");
    $stmt->execute(['id']);
    $venda = $stmt->fetch();

    if (!$venda) {
        $_SESSION['error'] = "Venda não encontrado: ";
        header("Location: index.php");
        exit;
    }

    $stmtItens = $pdo->prepare("SELECT * FROM vendas_intes WHERE venda_id = ?");
    $stmtItens->execute(['id']);
    $itens = $stmtItens->fetchAll();
} 
catch (PDOException $e) {
    $_SESSION['error'] = "Erro ao buscar a venda: " . $e->getMessage();
    header("Location: index.php");
    exit;
}

try {
    $clientes = $pdo->query("SELECT id, nome_fantasia FROM clientes")->fetchAll();
    $produtos = $pdo->query("SELECT id, nome FROM produtos")->fetchAll();
}
catch (PDOException $e) {
    $_SESSION['error'] = "Erro ao carregar dados: " . $e->getMessage();
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = $_POST['cliente_id'] ?? '';
    $produtos = $_POST['produtos'] ?? [];

    if (empty($cliente_id) || empty($produtos)){
        $_SESSION['error'] = "Preencha todos os campos obrigatórios.";
    }
    else {
        try {
            $pdo->beginTransaction();

            $stmtVenda = $pdo->prepare("UPDATE vendas SET cliente_id = ? WHERE id = ?");
            $stmtVenda->execute([$cliente_id, $id]);

            $stmtDeleteItens = $pdo->prepare("DELETE FROM vendas_itens WHERE venda_id = ?");
            $stmtDeleteItens->execute([$id]);

            $totalVenda = 0;

            foreach ($produtos as $produto){
                $produto_id = $produto['id'];
                $quantidade = $produto['quantidade'];
                $preco_unitario = $produto['preco'];

                $stmtItem = $pdo->prepare("INSERT INTO vendas_intes (venda_id, produto_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)");
                $stmtItem->execute([$id, $produto_id, $quantidade, $preco_unitario]);
                $totalVenda += ($quantidade * $preco_unitario);
            }

            $stmtTotal = $pdo->prepare("UPDATE vendas SET total = ? WHERE id = ?");
            $stmtTotal->execute([$totalVenda, $id]);

            $pdo->commit();
            $_SESSION['success'] = "Venda atualizada com sucesso!";
            header("Location: index.php");
            exit;
        }
        catch (Exception $e){
            $pdo->rollBack();
            $_SESSION['error'] = "Erro ao atualizar a venda: " . $e->getMessage();
        }
    }
}

$title = "Detalhes de Venda";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <h1 class="title">Editar Venda</h1>
        
        <form method="POST">
            <div class="field">
                <label class="label">Cliente *</label>
                <div class="select is-fullwidth">
                    <select name="cliente_id" required>
                        <option value="">Selecione um cliente</option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?= $cliente['id'] ?>" <?= $venda['cliente_id'] == $cliente['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cliente['nome_fantasia'], ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <h3 class="subtitle">Produtos</h3>
            <div id="produtos-container" class="mb-4">
                <?php foreach ($itens as $index => $item): ?>
                    <div class="box produto-item">
                        <div class="field">
                            <label class="label">Produto *</label>
                            <div class="select is-fullwidth">
                                <select name="produtos[<?= $index ?>][id]" required onchange="atualizarPreco(this, <?= $index ?>)">
                                    <option value="">Selecione</option>
                                    <?php foreach ($produtos as $produto): ?>
                                        <option value="<?= $produto['id'] ?>" data-preco="<?= $item['produto_id'] == $produto['id'] ? 'selected' : '' ?>">
                                            <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Quantidade *</label>
                                    <input type="number" name="produtos[<?= $index ?>][quantidade]" class="input" min="1" value="<?= $item['quantidade'] ?>" required onchange="calcularTotal()">
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Preço Unitário</label>
                                    <input type="number" step="0.01" name="produtos[
                                    <?= $index ?>][preco]" class="input preco-unitario" value="<?= $item['preco_unitario'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="button is-danger is-small" onclick="this.parentElement.remove(); calcularTotal()">
                            <i class="fas fa-times"></i>&nbsp; Remover
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="field">
                <button type="button" class="button is-info" onclick="adicionarProduto()">
                    <i class="fas fa-plus"></i>&nbsp; Adicionar Produto
                </button>
            </div>

            <div class="field">
                <div class="box">
                    <h4 class="title is-5">Total da Venda: R$ <span id="total-venda"><?= number_format($venda['total'], 2, ',', '.') ?></span></h4>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Atualizar Venda</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
const produtosDisponiveis = <?= json_encode($produtos) ?>;

function adicionarProduto() {
    const container = document.getElementById('produtos-container');
    const index = container.children.length;

    const html = `
    <div class="box produto-item">
        <div class="field">
            <label class="label">Produto *</label>
            <div class="select is-fullwidth">
                <select name="produtos[${index}][id]" required onchange="atualizarPreco(this, ${index})">
                    <option value="">Selecione</option>
                    ${produtosDisponiveis.map(p => `
                        <option value="${p.id}" data-preco="${p.preco}">
                            ${p.nome}
                        </option>
                    `).join('')}
                </select>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Quantidade *</label>
                    <input type="number" name="produtos[${index}][quantidade]" class="input" min="1" value="1" required onchange="calcularTotal()">
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Preço Unitário</label>
                    <input type="number" step="0.01" name="produtos[${index}][preco]" class="input preco-unitario" readonly>
                </div>
            </div>
        </div>

        <button type="button" class="button is-danger is-small" onclick="this.parentElement.remove(); calcularTotal()">
            <i class="fas fa-times"></i>&nbsp; Remover
        </button>
    </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}

function atualizarPreco(select, index) {
    const preco = select.options[select.selectedIndex].dataset.preco;
    document.querySelectorAll('.preco-unitario')[index].value = preco;
    calcularTotal();
}

function calcularTotal() {
    let total = 0;
    document.querySelectorAll('.produto-item').forEach(item => {
        const preco = parseFloat(item.querySelector('.preco-unitario').value) || 0;
        const quantidade = parseFloat(item.querySelector('input[type="number"]').value) || 0;
        total += preco * quantidade;
    });
    document.getElementById('total-venda').textContent = total.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Adiciona primeiro item automaticamente
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('produtos-container').children.length === 0) {
        adicionarProduto();
    }
});
</script>

<?php include '../includes/footer.php'; ?>