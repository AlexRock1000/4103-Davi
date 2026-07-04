<?php
    echo "Olá, mundo ";
    echo "Bem vindo ao PHP.\n";

    $idade = 20;
    if ($idade > 18){
        echo"Você é maior de idade.\n";
    }

    //Função para dividir dois números
    function dividir($numerador, $denominador){
        if ($denominador == 0){
            //Lançando uma exceção se o donominador for zero
            throw new Exception("Divisão por zero não é permintido.");
        }

        //Se o denominador dpr válido (diferente de zero), realize a divisão
        return $numerador / $denominador;
    }

    try{
        //Tentando dividir 10 por 0, o que causará ima exceção
        echo dividir(10, 2);
    }
    catch (Exception $erro){
        //Captura a exceção lançada no bloco try e exibe a mensagem de erro
        echo "Erro: " . $erro->getMessage();
    }
?>