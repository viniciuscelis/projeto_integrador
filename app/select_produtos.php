<?php
// Carrega as funcoes e verifica se o usuario esta autenticado
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto_integrador//style/style.css">
    <title>Relatório de produtos</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?>
    <main>
    <?php 
        // Exibe a tabela completa com os produtos cadastrados
        relatorio_produtos($conexao)
    ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>