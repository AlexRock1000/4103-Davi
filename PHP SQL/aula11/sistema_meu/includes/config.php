<?php
    session_start();

    //Conexão PDO
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=sistema_estoque", 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
        die("Erro ao conectar com o banco: " . $e->getMessage());
    }

    //Configurações do sistema
    define('BASE_URL', '/sistema_meu');
    define('UPLOAD_DIR', __DIR__ . '/../assets/uploads/');

    //Função Úteis
    function sanitize($data){
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    function redirect($url){
        header("Location: " . $url);
        exit;
    }

    function handleUpload($file){
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)){
            throw new Exception("Tipo de arquivo não permitido");
        }

        if ($file['size'] > 2 * 1024 * 1024){
            throw new Exception("Tamanho máximo excedido (2MB)");
        }

        $filename = uniqid() . '.' . $ext;
        $destination = UPLOAD_DIR . $filename;

        if (!move_uploaded_file($file['tmp_name'], $destination)){
            throw new Exception("Falha ao fazer upload");
        }

        return $filename;
    }
?>