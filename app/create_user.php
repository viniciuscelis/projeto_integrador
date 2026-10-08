<?php 
// Carrega as funcoes e verifica se o usuario esta autenticado
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

// Bloqueia o acesso caso o usuario nao possua o perfil de dono
if (!isset($_SESSION['atribuicao']) || $_SESSION['atribuicao'] !== 'dono') {
    echo "Acesso negado: apenas o dono pode cadastrar novos usuários.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto_integrador//style/style.css">
    <title>Cadastro de usuários</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?> <br>
    <main>
        <h1>Cadastro de Usuários</h1>
    <!-- Formulario para criacao de novo usuario -->
    <form action="" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome completo: "> <br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha" placeholder="Senha: "> <br>

        <label for="atribuicao">Atribuição: </label>
        <select name="atribuicao" id="atribuicao">
            <option value="empregado">Empregado</option>
            <option value="dono">Dono</option>
        </select> <br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Cadastrar"> <br>
    </form>
    <?php
    // Envia os dados para a funcao de criacao de usuario
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        cadastrar_user($conexao, $_POST['nome'], $_POST['senha'], $_POST['atribuicao']);
    }
    ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>