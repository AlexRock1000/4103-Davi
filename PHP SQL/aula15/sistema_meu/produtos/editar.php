<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "ID do produto não informado.";
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $produto = $stmt->fetch();
} 
catch (PDOException $e) {
    $_SESSION['error'] = "Erro ao buscar o produto: " . $e->getMessage();
    header("Location: index.php");
    exit;
}

if (!$produto) {
    $_SESSION['error'] = "Produto não encontrado: ";
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
    $valor_compra = isset($_POST['valor_compra']) ? $_POST['valor_compra'] : 0;
    $valor_venda = isset($_POST['valor_venda']) ? $_POST['valor_venda'] : 0;
    $imagem = isset($_FILES['imagem']) ? $_FILES['imagem'] : null;

    if (empty($codigo) || empty($nome) || empty($categoria)) {
        $_SESSION['error'] = "Preencha todos os campos obrigatórios.";
    } else {
        try {
            $pdo->beginTransaction();
            $sql = "UPDATE produtos SET codigo = ?, nome = ?, categoria = ?, quantidade = ?, valor_compra = ?, valor_venda = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codigo, $nome, $categoria, $quantidade, $valor_compra, $valor_venda, $id]);

            if ($imagem && $imagem['error'] === UPLOAD_ERR_OK) {
                $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
                $nomeImagem = uniqid() . '.' . $extensao;
                $caminhoImagem = '../assets/uploads/' . $nomeImagem;

                if ($produto['imagem'] && file_exists('../assets/uploads/' . $produto['imagem'])) {
                    unlink('../assets/uploads/' . $produto['imagem']);
                }

                if (move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
                    $stmt = $pdo->prepare("UPDATE produtos SET imagem = ? WHERE id = ?");
                    $stmt->execute([$nomeImagem, $id]);
                } else {
                    throw new Exception("Erro ao fazer upload da imagem.");
                }
            }

            $pdo->commit();
            $_SESSION['success'] = "Produto atualizado com sucesso!";
            header("Location: index.php");
            exit;
        } catch (Exception $e) {
            $pdo->rollBack();
            $_SESSION['error'] = "Erro ao atualizar o produto: " . $e->getMessage();
        }
    }
}

$title = "Editar Produto";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <h1 class="title">Editar Produto</h1>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Código *</label>
                        <div class="control">
                            <input class="input" type="text" name="codigo" value="<?= sanitize($produto['codigo']) ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nome *</label>
                        <div class="control">
                            <input class="input" type="text" name="nome" value="<?= sanitize($produto['nome']) ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Categoria *</label>
                        <div class="control">
                            <input class="input" type="text" name="categoria" value="<?= sanitize($produto['categoria']) ?>" required>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label">Quantidade em Estoque *</label>
                        <div class="control">
                            <input class="input" type="number" name="quantidade" value="<?= sanitize($produto['quantidade']) ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Valor de Compra *</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="valor_compra" value="<?= sanitize($produto['valor_compra']) ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Valor de Venda *</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="valor_venda" value="<?= sanitize($produto['valor_venda']) ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Imagem do Produto</label>
                <div class="file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="imagem" accept="image/*">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Escolher arquivo...
                            </span>
                        </span>
                        <span class="file-name"><?= isset($produto['imagem']) ? sanitize($produto['imagem']) : 'Nenhum arquivo selecionado' ?></span>
                    </label>
                </div>
                <?php if ($produto['imagem']): ?>
                    <figure class="image is-128x128 mt-3">
                        <img src="../assets/uploads/<?= sanitize($produto['imagem']) ?>" alt="Imagem do produto">
                    </figure>
                <?php endif; ?>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Atualizar Produto</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
// Atualiza o nome do arquivo no input de upload
document.querySelector('.file-input').onchange = function() {
    const fileName = this.files[0] ? this.files[0].name : "Nenhum arquivo selecionado";
    document.querySelector('.file-name').textContent = fileName;
};
</script>

<?php include '../includes/footer.php'; ?>