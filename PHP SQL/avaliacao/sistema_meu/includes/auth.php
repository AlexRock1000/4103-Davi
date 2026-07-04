<?php
function checkLogin(){
    if (!isset($_SESSION['usuario_id'])){
        redirect('login.php');
    }
}
?>