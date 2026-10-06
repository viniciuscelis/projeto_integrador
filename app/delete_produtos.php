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
    <title>delete.php</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?>
    <h1>Deletar produtos</h1>
    <main>
    <!-- Formulario para indicar o ID do produto a ser excluido -->
    <form action="" method="post">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id"> <br>
        <input type="reset" value="Limpar">
        <input type="submit" value="Apagar">
        
    </form>
    <?php
    // Executa a exclusao se o formulario foi submetido
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        excluir_produtos($conexao, $_POST['id']);
    }
    ?>
    <a href="/app/select_produtos.php">Ver relatório de produtos</a>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>