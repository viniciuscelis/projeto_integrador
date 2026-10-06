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
    <title>Atualização de produtos</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?> <br>
    <main>
        <!-- Formulario para edicao dos dados do produto -->
        <form action="" method="post">
            <label for="id">ID: </label>
            <input type="number" name="id" id="id"> <br>

            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome"> <br>

            <label for="codigo">Código: </label>
            <input type="text" name="codigo" id="codigo"> <br>

            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria"> <br>

            <label for="preco">Preço: </label>
            <input type="number" step="0.01" min="0" name="preco" id="preco"> <br>

            <label for="estoque">Quantidade em Estoque: </label>
            <input type="number" step="any" min="0" name="estoque" id="estoque"> <br>

            <input type="reset" value="Limpar">
            <input type="submit" value="Atualizar"> <br>
        </form>
        <?php
        // Executa a atualizacao se o formulario foi enviado
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            atualizar_produtos($conexao,$_POST['id'],$_POST['nome'],$_POST['codigo'],$_POST['categoria'],$_POST['preco'],$_POST['estoque']);
        }
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>