<?php 
//arquivo para ser chamado sempre que precisar conectar ao banco de dados, por exemplos quando formos fazer um CRUD pelo php 

$host = "192.168.10.42"; // Coloque o id de seu servidor aqui, ou "localhost" em uma conexão local
$dbname = "sistema_padaria"; // nome do banco de dados
$user = "padaria"; // usuário onde o banco foi criado
$pass = "padaria"; // senha do usuário

try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
    return $conexao;
} catch(PDOException $e) {
    echo "Erro: ". $e->getMessage();
}
?>
