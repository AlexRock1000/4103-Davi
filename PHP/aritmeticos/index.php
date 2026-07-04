<?php
    $numero1 = 30;
    $numero2 = 7;
    $soma = $numero1 + $numero2;
    $subtraçao = $numero1 - $numero2;
    $multiplicaçao = $numero1 * $numero2;
    $divisao = $numero1 / $numero2;
    $resto = $numero1 % $numero2;
    $nome = "Davi Alexnadre"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exemplo de Operadores em PHP</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Exemplo de Operadores em PHP</h1>
            </div>
            <div class="card-body">
                <?php
                    echo "<h3>Operadores Aritméticos:</h3>";
                    echo "<p>Soma: $numero1 + $numero2 = <span class='resultado'> $soma Resultado da soma</span></p>";
                    echo "<p>Subtração: $numero1 - $numero2 = <span class='resultado'> $subtraçao Resultado da subtração</span></p>";
                    echo "<p>Multiplicação: $numero1 * $numero2 = <span class='resultado'> $multiplicaçao Resultado da multiplicação</span></p>";
                    echo "<p>Divisão: $numero1 / $numero2 = <span class='resultado'> $divisao Resultado da divisão</span></p>";
                    echo "<p>Resto da Divisão: $numero1 % $numero2 = <span class='resultado'> $resto Resto da divisão</span></p>";
                    ?>
            </div>
            <div class="card-footer text-muted text-center">
                <?php echo "Exemplo desenvolvido por: $nome";?> 
            </div>
        </div>
    </div>
</body>
</html>