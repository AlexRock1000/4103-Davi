<?php
    require_once 'includes/config.php';
    $erro = '';

    //Verificando se o formulário foi enviado via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Resgata os valores digitados
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if ($username === '' || $password === ''){
            $erro = 'Preencha todos os campos.';
        }
        else {
            try {
                //Consulta o usuário no banco
                $sql = "SELECT * FROM usuarios WHERE username = :usermane";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':username', $username, PDO::PARAM_STR);
                $stmt->execute();
        
                //Se encontrou algum usuário
                if ($stmt->rowCount() > 0){
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    //Verificando a senha
                    if ($password == $user['password']){
                        //Autenticação OK - gravar dados na sessão
                        $_SESSION['usuario_id'] = $user['id'];
                        $_SESSION['usuario_nome'] = $user['username'];
                        $_SESSION['usuario_admin'] = $user['is_admir'];

                        //Redireciona para a dashboard
                        redirect('dashboard.php');
                        exit;
                    }
                    else {
                        //Senha incorreta
                        $erro = 'Usuário ou senha inválidos.';
                    }
                }
                else {
                    $erro = 'Usuário não encontrado.';
                }
            }
            catch (PDOException $e){
                $erro = 'Falha ao consultar o banco: ' . htmlspecialchars($e->getMessage());
            }
        }
    }
    $title = "Login";
    include 'includes/header.php';
?>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-5">
                <?php if ($erro): ?>
                    <div class="notification is-danger"><?php echo $erro; ?></div>
                <?php endif; ?>

                <div class="box">
                    <h1 class="title has-text-centered">Login</h1>
                    <form method="POST">
                        <div class="field">
                            <label class="label">Usuário</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" name="username" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Senha</label>
                            <div class="control has-icons-left">
                                <input class="input" type="password" name="password" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <button class="button is-primary is-fullwidth">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>