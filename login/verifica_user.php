<?php 
// Inicia a sessao caso ainda nao esteja ativa
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Verifica se o usuario esta autenticado, senao redireciona para a tela de login
if(!isset($_SESSION['id'])){
    header("location: /login/login.php");
    exit;
}
?>