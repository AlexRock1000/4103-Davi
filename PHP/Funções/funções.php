<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções</title>
</head>
<body>
    <?php
        function olaUsuario($nome){
            echo "Olá $nome, boas vindas.";
        }

        function novoSalario($salario, $aumento){
            return $salario + $aumento;
        }

        function calculoFatorial($numero){
            if ($numero <= 1){
                return 1;
            }
            else {return $numero * calculoFatorial($numero - 1);
            }
        }
    ?>
    <h1><?php olaUsuario("Roberto Carlos") ?></h1>
    <h2><?php echo "Seu novo salário é: R$" . novoSalario(3550, 3490); ?></h2>
    <h1>CALCULO FATORIAL</h1>
    <h2><?php echo calculoFatorial(5) ?></h2>
</body>
</html>