<?php
    require_once 'includes/config.php';

    //Se já estiver logado, vai para dashboard
    if (isset($_SESSION['usuario_id'])){
        redirect('dashboard.php');
    }
    else {
        redirect('login.php');
    }
    exit;
?>