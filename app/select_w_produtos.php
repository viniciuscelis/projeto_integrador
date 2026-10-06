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
    <link rel="stylesheet" href="/style/style.css">
    <title>Consulta produtos</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?>
    <main>
    <h1>Consultar produtos</h1>
    <!-- Formulario para buscar o produto pelo ID -->
    <form action="" method="post">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id"> <br>
        <input type="reset" value="Limpar">
        <input type="submit" value="Consultar">
        
    </form>
    <?php 
    // Realiza a consulta se o ID foi enviado
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        consultar_produtos($conexao, $_POST['id']);
    }
    ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>
