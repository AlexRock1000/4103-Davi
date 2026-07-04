<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])) {
    redirect('index.php');
}

try {
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $_SESSION['success'] = "Cliente excluído com sucesso!";
} catch (PDOException $e) {
    $_SESSION['error'] = "Erro ao excluir: " . $e->getMessage();
}

redirect('index.php');