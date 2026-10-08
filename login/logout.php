<?php
// Inicia a sessao caso ainda nao esteja ativa
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

// Limpa todos os dados da sessao e encerra a conexao do usuario
$_SESSION = array();
session_destroy();

// Redireciona para a pagina inicial
header("Location: /projeto_integrador/index.php");
?>