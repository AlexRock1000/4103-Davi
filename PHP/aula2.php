<?php
    $nome = "Fulano da Silva";
    $curso = "PHP Básico";
    $valorMensalidade = 3000000000.53;
    $aulas = 100000000000000000;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variáveis</title>
</head>
<body>
    <h1>Olá, <?php echo $nome ?></h1>
    <h2>você está matriculado no curso <?php echo $curso ?>, sua mensalidade é de R$ <?php echo $valorMensalidade ?> e você ainda tem <?php echo $aulas ?> de aulas restantes e a vida inteira pra desperdiçar.</h2>
</body>
</html>