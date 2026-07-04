<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulando Strings</title>
</head>
<body>
    <?php
        $frase = "Ao sair, apague a luz.";
        $frase = trim($frase);
        $frase2 = "0001 - Vá para a p*t@ que p@r*!";
        $frase3 = "Camiseta de boila com tecido macio";
    ?>
    <h1><?= strtolower($frase) ?></h1>
    <p><?= $frase2 ?></p>
    <p><?= $frase3 ?></p>
    <p><?= str_replace("tecido macio", "algodão premium", $frase3) ?></p>
    <input type="text" name="" id="" size="60" value="<?= $frase ?>">
</body>
</html>