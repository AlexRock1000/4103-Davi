<?php
    //Diretório de destino dos arquivos
    $folder = "uploads";

    //Definindo o nome do arquivo
    $folder = $folder . "/" . basename($_FILES["objetoArquivo"]["name"]);

    if (move_uploaded_file($_FILES["objetoArquivo"]["tmp_name"], $folder)){
        echo "O arquivo " . basename($_FILES["objetoArquivo"]["name"]) . " foi enviado ao servido!";
    }
    else{
        echo "Ocorreu um erro ao enviar o arquivo.";
    }
?>