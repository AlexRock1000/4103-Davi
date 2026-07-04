<?php
require_once '../includes/config.php'; // Inclui configurações do banco de dados
require_once '../includes/auth.php'; // Inclui funções de autenticação
checkLogin(); // Verifica se o usuário está logado

// Verifica se o ID do cliente foi passado
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "ID do cliente não informado.";
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Busca o cliente no banco de dados
try {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
    $stmt->execute([$id]);
    $cliente = $stmt->fetch();

    if (!$cliente) {
        $_SESSION['error'] = "Cliente não encontrado.";
        header("Location: index.php");
        exit;
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Erro ao buscar o cliente: " . $e->getMessage();
    header("Location: index.php");
    exit;
}

// Processa o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $responsavel = $_POST['responsavel'] ?? '';
    $nome_fantasia = $_POST['nome_fantasia'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $documento = $_POST['documento'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validação básica dos campos
    if (empty($responsavel) || empty($nome_fantasia) || empty($tipo) || empty($documento)) {
        $_SESSION['error'] = "Preencha todos os campos obrigatórios.";
    } else {
        try {
            // Atualiza os dados do cliente
            $sql = "UPDATE clientes SET
                    responsavel = ?,
                    nome_fantasia = ?,
                    tipo = ?,
                    documento = ?,
                    endereco = ?,
                    telefone = ?,
                    email = ?
                    WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $responsavel,
                $nome_fantasia,
                $tipo,
                $documento,
                $endereco,
                $telefone,
                $email,
                $id
            ]);

            $_SESSION['success'] = "Cliente atualizado com sucesso!";
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erro ao atualizar o cliente: " . $e->getMessage();
        }
    }
}

$title = "Editar Cliente";
include '../includes/header.php';
include '../includes/navbar.php';
?>

<section class="section">
    <div class="container">
        <h1 class="title">Editar Cliente</h1>
        
        <form method="POST">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Responsável *</label>
                        <div class="control">
                            <input class="input" type="text" name="responsavel" value="<?= htmlspecialchars($cliente['responsavel'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Nome Fantasia *</label>
                        <div class="control">
                            <input class="input" type="text" name="nome_fantasia" value="<?= htmlspecialchars($cliente['nome_fantasia'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Tipo *</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="tipo" required>
                                    <option value="CPF" <?= $cliente['tipo'] === 'CPF' ? 'selected' : '' ?>>CPF</option>
                                    <option value="CNPJ" <?= $cliente['tipo'] === 'CNPJ' ? 'selected' : '' ?>>CNPJ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Documento *</label>
                        <div class="control">
                            <input class="input" type="text" name="documento" value="<?= htmlspecialchars($cliente['documento'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label">Endereço *</label>
                        <div class="control">
                            <textarea class="textarea" name="endereco" required><?= htmlspecialchars($cliente['endereco'], ENT_QUOTES, 'UTF-8') ?></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Telefone *</label>
                        <div class="control">
                            <input class="input" type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">E-mail *</label>
                        <div class="control">
                            <input class="input" type="email" name="email" value="<?= htmlspecialchars($cliente['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Atualizar Cliente</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>