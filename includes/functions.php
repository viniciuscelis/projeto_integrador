<?php
// Carrega o arquivo de conexao com o banco de dados
require_once __DIR__ . '/../database/connect.php';

// Funcao para cadastrar um novo produto no banco de dados
function cadastrar_produtos($conexao, $nome, $codigo, $categoria, $preco, $estoque)
{
    // Comando SQL para inserir os dados do produto
    $sql = "INSERT INTO produtos (nome, codigo, categoria, preco, quantidade_estoque) VALUES(:nome, :codigo, :categoria, :preco, :quantidade_estoque)";

    try {
        // Prepara a instrucao SQL para evitar injecao de SQL
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":codigo", $codigo);
        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":quantidade_estoque", $estoque);

        // Executa a gravacao no banco de dados
        $stmt->execute();
        echo "<p style='color: green;'>Produto cadastrado com sucesso!</p>";
    } catch (PDOException $e) {
        // Exibe mensagem caso ocorra erro
        echo "<p style='color: red;'>Erro ao cadastrar produto: " . $e->getMessage() . "</p>";
    }
}

// Funcao para excluir um produto pelo identificador
function excluir_produtos($conexao, $id)
{
    // Comando SQL para deletar o produto pelo ID
    $sql = "DELETE FROM produtos WHERE id = :id";

    try {
        // Prepara e executa a exclusao
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        // Verifica se alguma linha foi afetada no banco
        if ($stmt->rowCount() > 0) {
            echo "<p style='color: green;'>Produto $id deletado com sucesso.</p>";
        } else {
            echo "<p style='color: red;'>Nenhum produto encontrado com o ID $id.</p>";
        }
    } catch (PDOException $e) {
        // Exibe mensagem caso ocorra erro
        echo "<p style='color: red;'>Erro ao deletar produto: " . $e->getMessage() . "</p>";
    }
}

// Funcao para buscar e exibir os dados de um unico produto
function consultar_produtos($conexao, $id)
{
    // Comando SQL para buscar o produto pelo ID
    $sql = "SELECT id, nome, codigo, categoria, preco, quantidade_estoque FROM produtos WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        // Obtem os dados do produto retornado
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se o produto foi encontrado, exibe os detalhes formatados
        if ($produto) {
            $precoFormatado = number_format($produto['preco'], 2, ',', '.');
            echo "<div class='card-detalhe-produto'>";
            echo "<h3>Detalhes do Produto #{$produto['id']}</h3>";
            echo "<p><strong>Nome:</strong> " . htmlspecialchars($produto['nome']) . "</p>";
            echo "<p><strong>Código:</strong> " . htmlspecialchars($produto['codigo']) . "</p>";
            echo "<p><strong>Categoria:</strong> " . htmlspecialchars($produto['categoria']) . "</p>";
            echo "<p><strong>Preço:</strong> R$ {$precoFormatado}</p>";
            echo "<p><strong>Quantidade em estoque:</strong> {$produto['quantidade_estoque']}</p>";
            echo "</div>";
        } else {
            echo "<p style='color: red;'>Nenhum produto encontrado com o ID " . htmlspecialchars($id) . ".</p>";
        }
    } catch (PDOException $e) {
        // Exibe mensagem caso ocorra erro
        echo "<p style='color: red;'>Erro ao consultar produto: " . $e->getMessage() . "</p>";
    }
}

// Funcao para gerar relatorio com todos os produtos
function relatorio_produtos($conexao){
    // Busca todos os produtos ordenados pelo ID
    $sql = "SELECT id, nome, codigo, categoria, preco, quantidade_estoque FROM produtos ORDER BY id ASC";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        // Retorna todos os registros em forma de array
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verifica se a tabela esta vazia
        if (empty($produtos)) {
            echo "<p>Nenhum produto cadastrado no momento.</p>";
            return;
        }

        // Exibe os dados organizados em tabela
        echo "<div class='tabela-container'>";
        echo "<table class='tabela-produtos'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>Código</th>";
        echo "<th>Categoria</th>";
        echo "<th>Preço</th>";
        echo "<th>Estoque</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Percorre a lista gerando as linhas da tabela
        foreach($produtos as $p){
            $precoFormatado = number_format($p['preco'], 2, ',', '.');
            echo "<tr>";
            echo "<td>{$p['id']}</td>";
            echo "<td><strong>" . htmlspecialchars($p['nome']) . "</strong></td>";
            echo "<td>" . htmlspecialchars($p['codigo']) . "</td>";
            echo "<td>" . htmlspecialchars($p['categoria']) . "</td>";
            echo "<td>R$ {$precoFormatado}</td>";
            echo "<td>{$p['quantidade_estoque']}</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } catch (PDOException $e) {
        // Exibe mensagem caso ocorra erro
        echo "<p style='color: red;'>Erro ao gerar relatório: " . $e->getMessage() . "</p>";
    }
}

// Funcao para atualizar os dados de um produto existente
function atualizar_produtos($conexao, $id, $nome, $codigo, $categoria, $preco, $estoque)
{
    // Comando SQL para atualizar os campos do produto
    $sql = "UPDATE produtos SET nome = :nome , codigo = :codigo , categoria = :categoria , preco = :preco, quantidade_estoque = :estoque WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":codigo", $codigo);
        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":estoque", $estoque);
        $stmt->execute();

        // Verifica se alguma linha foi modificada
        if ($stmt->rowCount() > 0) {
            echo "<p style='color: green;'>Produto $id atualizado com sucesso!</p>";
        } else {
            echo "<p style='color: red;'>Nenhuma alteração feita ou produto $id não encontrado.</p>";
        }
    } catch (PDOException $e) {
        // Exibe mensagem caso ocorra erro
        echo "<p style='color: red;'>Erro ao atualizar produto: " . $e->getMessage() . "</p>";
    }
}

// Funcao para cadastrar um novo usuario no banco
function cadastrar_user($conexao, $nome, $senha, $atribuicao = 'empregado'){
    // Gera a criptografia segura da senha
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios(nome, senha, atribuicao) VALUES(:nome, :senha, :atribuicao)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":senha", $hash);
    $stmt->bindParam(":atribuicao", $atribuicao);

    $stmt->execute();
    echo "Usuário cadastrado com sucesso!";
}

// Funcao para buscar um usuario pelo nome no banco de dados
function consultar_user($conexao, $nome)
{
    $sql = "SELECT id, nome, senha, atribuicao FROM usuarios WHERE nome = :nome";

    try{
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();
        // Obtem os dados do usuário
        $nome = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se o usuário foi encontrado, exibe os detalhes formatados
        if ($nome) {
            echo "<div class='card-detalhe-usuario'>";
            echo "<h3>Detalhes do usuario: {$nome['nome']}</h3>";
            echo "<p><strong>Id:</strong> " . htmlspecialchars($nome['id']) . "</p>";
            echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome['nome']) . "</p>";
            echo "</div>";
        } else {
            echo "<p style='color: red;'>Nenhum usuario encontrado com o ID " . htmlspecialchars($nome) . ".</p>";
        }
    } catch (PDOException $e) {
        // Exibe mensagem caso ocorra erro
        echo "<p style='color: red;'>Erro ao consultar usuario: " . $e->getMessage() . "</p>";
    }
}

function verificar_user($conexao, $nome)
{
    $sql = "SELECT id, nome, senha, atribuicao FROM usuarios WHERE nome = :nome";

    try{
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();

        // Retorna o registro do usuario encontrado
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    } catch (PDOException $e){
        // Exibe mensagem caso ocorra erro
        echo $e->getMessage();
    }
}
?>