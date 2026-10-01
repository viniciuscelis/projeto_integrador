<?php 
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Cadastro de produtos</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?> <br>
    <main>
        <h1>Cadastro de Produtos</h1>
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"> <br>

        <label for="codigo">Código: </label>
        <input type="number" name="codigo" id="codigo"> <br>

        <label for="categoria">Categoria: </label>
        <input type="date" name="categoria" id="categoria"> <br>

        <label for="preco">Preço: </label>
        <input type="number" name="preco" id="preco"> <br>

        <label for="estoque">Quantidade no estoque: </label>
        <input type="number" name="estoque" id="estoque"> <br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Cadastrar"> <br>
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        cadastrar_produtos($conexao, $_POST['nome'], $_POST['codigo'], $_POST['categoria'], $_POST['preco'], $_POST['quantidade_estoque']);
    }
    ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>