<?php 
// Inicia a sessao caso ainda nao esteja ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Obtem o nome do arquivo atual para destacar o item ativo no menu
$pagina = basename($_SERVER['PHP_SELF']);
?>
<header>
    <h1></h1>
    <!-- Barra de navegacao principal do sistema -->
    <nav>
        <div>
            <br>
            <!-- Links para operacoes com produtos -->
            <a href="/projeto_integrador/index.php" class="<?= ($pagina == 'index.php') ? 'ativo' : '' ?>">Inicio</a>
            <a href="/projeto_integrador/app/create_produtos.php" class="<?= ($pagina == 'create_produtos.php') ? 'ativo' : '' ?>">Cadastrar</a>
            <a href="/projeto_integrador/app/delete_produtos.php" class="<?= ($pagina == 'delete_produtos.php') ? 'ativo' : '' ?>">Excluir</a>
            <a href="/projeto_integrador/app/select_produtos.php" class="<?= ($pagina == 'select_produtos.php') ? 'ativo' : '' ?>">Relatório</a>
            <a href="/projeto_integrador/app/select_w_produtos.php" class="<?= ($pagina == 'select_w_produtos.php') ? 'ativo' : '' ?>">Consultar produto</a>
            <a href="/projeto_integrador/app/update_produtos.php" class="<?= ($pagina == 'update_produtos.php') ? 'ativo' : '' ?>">Atualizar</a>
        </div>
        <div>
            <!-- Opcao exibida apenas se o usuario logado for dono -->
            <?php if (($_SESSION['atribuicao'] ?? '') === 'dono'): ?>
                <a href="/projeto_integrador/app/create_user.php" class="<?= ($pagina == 'create_user.php') ? 'ativo' : '' ?>">Cadastrar usuário</a>
            <?php endif; ?>
            <!-- Links para autenticacao no sistema -->
            <a href="/projeto_integrador/login/login.php" class="<?= ($pagina == 'login.php') ? 'ativo' : '' ?>">Entrar</a>
            <a href="/projeto_integrador/login/logout.php">Sair</a>
        </div>
    </nav>
    <hr>
</header>