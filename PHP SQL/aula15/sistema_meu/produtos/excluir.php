<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
checkLogin();

if (!isset($_GET['id'])){
    redirect('index.php');
}

try {
    $stmt = $pdo->prepare("SELECT imagem FROM produtos WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $produto = $stmt->fetch();

    if ($produto && $produto['imagem']){
        $filePath = UPLOAD_DIR . $produto['imagem'];
        if (file_exists($filePath)){
            unlink($filePath);
        }
    }

    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $_SESSION['success'] = "Produto excluído com secesso!";
}
catch (PDOException $e) {
    $_SESSION['error'] = "Erro ao excluir: " . $e->getMessage();
}

redirect('index.php');
?>