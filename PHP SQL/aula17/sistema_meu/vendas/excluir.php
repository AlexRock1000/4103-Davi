<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])){
    redirect('index.php');
}

try {
    $pdo->beginTransaction();

    $stmtItens = $pdo->prepare("SELECT * FROM vendas_itens WHERE venda_id = ?");
    $stmtItens->execute([$_GET['id']]);
    $itens = $stmtItens->fetchAll();

    foreach ($itens as $item){
        $stmt = $pdo->prepare("UPDATE produtos SET quantidade = quantidade + ? WHERE id = ?");
        $stmt->execute([$item['quantidade'], $item['produto_id']]);
    }

    $pdo->prepare("DELETE FROM vendas_itens WHERE venda_id = ?")
        ->execute([$_GET['id']]);

    $pdo->prepare("DELETE FROM vendas WHERE id = ?")
        ->execute([$_GET['id']]);
        
    $pdo->commit();
    $_SESSION['success'] = "Venda excluída com sucesso!";
}
catch (Exception $e) {
    $pdo->rollBack();
    $_SESSION['error'] = "Erro ao excluir: " . $e->getMessage();
}
redirect('index.php');

$title = "Detalhes de Venda";
include '../includes/header.php';
include '../includes/navbar.php';
?>