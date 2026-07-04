<?php
    function calcularMedia($alunos, $nomeAluno){
        foreach ($alunos as $aluno){
            if ($aluno['nome'] === $nomeAluno){
                $media = array_sum($aluno['notas'])/count($aluno['notas']);
                return $media;
            }
        }
    }
?>
