<?php
    //Informação do pedido
    $nomeProduto = "Camisinha";
    $valorUnidade = 59.99;
    $quantidadePedido = 100;
    $valorRetirada = $valorUnidade * $quantidadePedido;

    //Informação do frete
    $estadoFrete = "SP";
    if ($estadoFrete == "SP"){
        $taxaEstado = 0.13;
    }
    else{
        $taxaEstado = 0.90;
    }
    $valorFrete = $valorRetirada * $taxaEstado;
    $valorEntrega = $valorFrete + $valorRetirada;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detalhes do Produto</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center text-white">CONFIRMAÇÃO E INFORMAÇÕES DO PEDIDO</h1>
            </div>
            <div class="card-body">
                <?php
                echo "<p>Produto: $nomeProduto </p>";
                echo "<p>Valor unitário: R$ $valorUnidade </p>";
                if ($quantidadePedido > 1){
                    echo "Qauntidade do pedido: $quantidadePedido unidade";
                }
                else{
                    echo "Quantidade do pedido: $quantidadePedido unidades";
                }
                echo "<hr>";
                echo "<p class='font-semibold'>Valor do pedido para retirada: R$ $valorRetirada </p>";
                echo "<hr>";
                echo "<p>Valor do frete: R$ $valorFrete ";
                echo "<hr>";
                echo "<p class='font-semibold'>Valor do pedido com frete: R$ $valorEntrega </p>";
                ?>
            </div>
            <div class="card-footer text-center text-sm text-slate-500">
                <small>Sistema e Pedido Fictício</small>
            </div>
        </div>
    </div>
</body>
</html>