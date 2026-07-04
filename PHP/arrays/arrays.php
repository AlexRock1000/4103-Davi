<?php
    $produtos = array("MP3 Player", "Camera", "PC");
    $carros = array(
        array(
        "modelo" => "Onix",
        "marca" => "Chevrolet",
        "ano" => 2019,
        ),
        array(
            "modelo" => "Argo",
            "marca" => "Fiat",
            "ano" => 2020,
        ),
        array(
            "modelo" => "Cruze",
            "marca" => "Chevrolet",
            "ano" => 2023,
        ),
        array(
            "modelo" => "Cronos",
            "marca" => "Fiat",
            "ano" => 2024,
        ),
    );
    foreach($carros as $listaCarros){
        echo $listaCarros["modelo"] . " - " . $listaCarros["marca"] . " - " . $listaCarros["ano"] . "<br>";
    };
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <?php
        
    ?>
</body>
</html>