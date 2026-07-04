<?php
    $alunos = array(
        array(
            "nome" => "Calor Eduardo",
            "codigo" => "0987665",
            "curso" => "Informática Básica",
        ),
        array(
            "nome" => "Thalita Bianchi",
            "codigo" => "123456",
            "curso" => "Photoshop Avançado",
        ),
        array(
            "nome" => "Felipe Cagado",
            "codigo" => "456789",
            "curso" => "PHP Básico",
        ),
    );

    foreach($alunos as $listaAlunos){
    echo "Nome: " . $listaAlunos["nome"] . " - " . "Código: " . $listaAlunos["codigo"] . " - " . "Curso: " . $listaAlunos["curso"] . "<br>";
    }
?>