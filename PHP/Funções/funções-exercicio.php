<?php
    function calculoMedia($nota1, $nota2, $nota3, $nota4){
        $mediaCalculo = ($nota1 + $nota2 + $nota3 + $nota4)/4;
        return $mediaCalculo;
    }
    $nota1_aluno = 4;
    $nota2_aluno = 8;
    $nota3_aluno = 9;
    $nota4_aluno = 10;
    $resultadoMedia = calculoMedia($nota1_aluno, $nota2_aluno, $nota3_aluno, $nota4_aluno);
    echo "A média do aluno foi: " . $resultadoMedia;
?>