<?php 
// Carrega as funcoes e verifica se o usuario esta logado
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Cadastro Aluno</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?> <br>
    <main>
    <!-- Formulario para realizacao de cadastro -->
    <form action="" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email"> <br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha"> <br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Cadastrar"> <br>
    </form>
    <?php
    // Executa a funcao de cadastro ao enviar os dados
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        cadastrar_user($conexao, $_POST['email'], $_POST['senha']);
    }
    ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>