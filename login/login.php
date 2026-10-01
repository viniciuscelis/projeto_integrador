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
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $usuario = consultar_user($conexao,$_POST['nome']);
            if($usuario['nome']==$_POST['nome'] && $usuario['senha'] == $hash){

                $_SESSION['id'] = $usuario['id'];

                echo "Usuário logado!";
                header("Location: /index.php");

            } else {
                echo "Usuário ou senha inválidos";
            }
        }
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>