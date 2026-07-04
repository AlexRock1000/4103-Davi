<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
         $required = ['codigo', 'nome', 'categoria', 'quantidade', 'valor_compra', 'valor_venda'];
         foreach ($required as $field){
            if (!isset($_POST[$field]) || trim($_POST[$field]) === ''){
                throw new Exception("O campo " . ucfirst($field) . " é obrigatório!");
            }
         }

           $imagem = null;
           if (!empty($_FILES['imagem']['name'])){
            $imagem = handleUpload($_FILES['imagem']);
           }

        $stmt = $pdo->prepare("INSERT INTO produtos (codigo, nome, categoria, quantidade, valor_compra, valor_venda, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            sanitize($_POST['codigo']),
            sanitize($_POST['nome']),
            sanitize($_POST['categoria']),
            intval($_POST['quantidade']),
            str_replace(',', '.', $_POST['valor_compra']),
            str_replace(',', '.', $_POST['valor_venda']),
            $imagem
        ]);

        $_SESSION['success'] = "Produto cadastrado com sucesso!";
        redirect('index.php');
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "Erro ao cadastrar produto: " . $e->getMessage();
    }
    catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }
}
$title = "Cadastrar Produtos";
include '../includes/header.php';
include '../includes/navbar.php';
?>
<section class="section">
    <div class="container">
        <h1 class="title">Novo Produto</h1>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="notification is-success"><?php echo $_SESSION['success']; ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="notification is-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Código *</label>
                        <div class="control">
                            <input class="input" type="text" name="codigo" value="<?php echo isset($_POST['codigo']) ? sanitize($_POST['codigo']) : ''; ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nome *</label>
                        <div class="control">
                            <input class="input" type="text" name="nome" value="<?php echo isset($_POST['nome']) ? sanitize($_POST['nome']) : ''; ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Categoria *</label>
                        <div class="control">
                            <input class="input" type="text" name="categoria" value="<?php echo isset($_POST['categoria']) ? sanitize($_POST['categoria']) : ''; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label">Quantidade em Estoque *</label>
                        <div class="control">
                            <input class="input" type="number" name="quantidade" min="0" value="<?php echo isset($_POST['quantidade']) ? intval($_POST['quantidade']) : ''; ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Valor de Compra *</label>
                        <div class="control">
                            <input class="input" type="text" name="valor_compra" value="<?php echo isset($_POST['valor_compra']) ? sanitize($_POST['valor_compra']) : ''; ?>"
                                   pattern="^\d+([.,]\d{1,2})?$" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Valor de Venda *</label>
                        <div class="control">
                            <input class="input" type="text" name="valor_venda" value="<?php echo isset($_POST['valor_venda']) ? sanitize($_POST['valor_venda']) : ''; ?>"
                                   pattern="^\d+([.,]\d{1,2})?$" required>
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
                        <span class="file-name">Nenhum arquivo selecionado</span>
                    </label>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Cadastrar Produto</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
// Atualiza nome do arquivo no input
document.querySelector('.file-input').onchange = function() {
    const fileName = this.files[0] ? this.files[0].name : "Nenhum arquivo selecionado";
    document.querySelector('.file-name').textContent = fileName;
};
</script>

<?php include '../includes/footer.php'; ?>