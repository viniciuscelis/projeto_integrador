<?php 
require_once __DIR__ . '/../includes/functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Login</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?>
    <main>
        <h1>Faça login para continuar</h1>
        <form action="" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Insira seu nome" required> <br>

            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required> <br>

            <input type="reset" value="Limpar">
            <input type="submit" value="Entrar">
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $usuario = consultar_user($conexao, $_POST['nome']);

            // password_verify compara a senha digitada com o hash salvo no banco
            if ($usuario && password_verify($_POST['senha'], $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['atribuicao'] = $usuario['atribuicao'];

                header("Location: /index.php");
                exit;
            } else {
                echo "<p style='color: red;'>Usuário ou senha inválidos</p>";
            }
        }
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>