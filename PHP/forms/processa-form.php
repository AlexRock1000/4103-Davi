<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = trim($_POST['nome']);
        $telefone = trim($_POST['telefone']);
        $email = trim($_POST['email']);
        $mensagem = trim($_POST['mensagem']);

        //Validação dos dados para evitar campos em branco
        if (empty($nome) || empty($telefone) || empty($email) || empty($mensagem)){
            header("Location: contato-feito.php");
            exit();
        }
    }
?>