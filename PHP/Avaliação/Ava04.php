<?php
    $valorInicial = "100";
    $valorAlvo = "3000";
    $incremento = "5";
    $iteracoes = "0";

    while ($valorInicial < $valorAlvo){
        $valorInicial += $incremento;
        $iteracoes++;
    }

    echo "Número de iterações necessárias: " . $incremento . "<br>";
    echo "Valor final: " . $valorInicial;
?>