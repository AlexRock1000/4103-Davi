<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checklogin();
$title = "Cadastrar Cliente";
include '../includes/header.php';
include '../includes/navbar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $smt = $pdo->prepare("INSERT INTO clientes
        (responsavel, nome_fantasia, tipo, documento, endereco, telefone, email)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $smt->execute([
            sanitize($_POST['responsavel']),
            sanitize($_POST['nome_fantasia']),
            $_POST['tipo'],
            sanitize($_POST['documento']),
            sanitize($_POST['endereco']),
            sanitize($_POST['telefone']),
            sanitize($_POST['email'])
        ]);

        $_SESSION['success'] = "Cliente cadastrado com sucesso!";
        redirect('index.php');
    } catch (PDOException $e) {
        $_SESSION['error'] = "Erro ao cadastrar: " . $e->getMessage();
    } // Correção: chave de fechamento adicionada aqui
}
?>
<section class="section">
    <div class="container">
        <h1 class="title">Cadastrar Novo Cliente</h1>

        <form method="POST" action="">
            <div class="field">
                <label class="label">Responsável</label>
                <div class="control">
                    <input class="input" type="text" name="responsavel" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Nome Fantasia</label>
                <div class="control">
                    <input class="input" type="text" name="nome_fantasia" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Tipo</label>
                <div class="control">
                    <div class="select">
                        <select name="tipo" required>
                            <option value="CPF">CPF</option>
                            <option value="CNPJ">CNPJ</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Documento</label>
                <div class="control">
                    <input class="input" type="text" name="documento" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Endereço</label>
                <div class="control">
                    <input class="input" type="text" name="endereco" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Telefone</label>
                <div class="control">
                    <input class="input" type="text" name="telefone" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="text" name="email" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>