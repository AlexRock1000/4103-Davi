<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    echo "O cliente: ", $nome, " enrou em contato.<br>";
    echo "Retorno no email: ", $email, " ou no telefone: ", $telefone;
?>