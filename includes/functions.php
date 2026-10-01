<?php
require_once __DIR__ . '/../database/connect.php';

function cadastrar_produtos($conexao, $nome, $codigo, $categoria, $preco, $estoque)
{
    $sql = "INSERT INTO produtos (nome, codigo, categoria, preco, quantidade_estoque) VALUES(:nome, :codigo, :categoria, :preco, :quantidade_estoque)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":codigo", $codigo);
    $stmt->bindParam(":categoria", $categoria);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":quantidade_estoque", $estoque);

    $stmt->execute();
    echo "produtos cadastrado com sucesso!";
}

function excluir_produtos($conexao, $id)
{
    $sql = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $produtos = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "produtos $id deletado.";
}

function consultar_produtos($conexao, $id)
{
    $sql = "SELECT nome, codigo, categoria, preco, quantidade_estoque FROM produtos WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $produtos = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "produtos: {$produtos['nome']}<br> Código: {$produtos['codigo']}<br> Categoria: {$produtos['categoria']}<br> Preço: {$produtos['preco']}<br> Quantidade em estoque: {$produtos['quantidade_estoque']}<br>";
}

function relatorio_produtos($conexao){
    $sql = "SELECT * FROM produtos";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $produtoss = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($produtoss as $produtos){
        echo "ID: {$produtos['id']}<br>";
        echo "NOME: {$produtos['nome']}<br>";
        echo "Codigo: {$produtos['codigo']}<br>";
        echo "Categoria: {$produtos['categoria']}<br>";
        echo "Preço: {$produtos['preco']}<br>";
        echo "<hr>";
    }
}

function atualizar_produtos($conexao, $id, $nome, $codigo, $categoria, $preco, $estoque)
{
    $sql = "UPDATE produtos SET nome = :nome , codigo = :codigo , categoria = :categoria , preco = :preco, quantidade_estoque = :estoque WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":codigo", $codigo);
    $stmt->bindParam(":categoria", $categoria);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":estoque", $estoque);
    $stmt->execute();
}

// Funções para login
function cadastrar_user($conexao, $email, $senha){

    $sql = "INSERT INTO usuarios(email,senha) VALUES(:email, :senha)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);

    $stmt->execute();
    echo "Usuário cadastrado com sucesso!";
}

function consultar_user($conexao, $email)
{
    $sql = "SELECT id, nome, senha FROM usuarios WHERE nome = :nome";

    try{
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}
?>