<?php
// Carrega as funcoes e verifica se o usuario esta autenticado
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto_integrador/style/style.css">
    <title>Consulta produtos</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?>
    <main>
    <h1>Consultar Usuários</h1>
    <!-- Formulario para buscar o usuário pelo nome -->
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"> <br>
        <input type="reset" value="Limpar">
        <input type="submit" value="Consultar">
        
    </form>
    <?php 
    // Realiza a consulta se o ID foi enviado
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        consultar_user($conexao, $_POST['nome']);
    }
    ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>