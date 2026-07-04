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
    define('BASE_URL', '/aula05');
    define('UPLOAD_DIR', __DIR__ . '/../assets/uploads/');

    //Função Úteis
    function sanitize($data){
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    function redirect($url){
        header("Location: " . $url);
        exit;
    }
?>