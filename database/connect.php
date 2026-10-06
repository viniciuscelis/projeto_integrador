<?php 
// Arquivo de conexao com o banco de dados PostgreSQL usando PDO

$host = "192.168.10.42"; // Endereco do servidor do banco de dados ou localhost
$dbname = "sistema_padaria"; // Nome do banco de dados
$user = "padaria"; // Usuario do banco de dados
$pass = "padaria"; // Senha do banco de dados

try {
    // Cria a conexao com o banco de dados
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
    return $conexao;
} catch(PDOException $e) {
    // Exibe mensagem caso ocorra erro na conexao
    echo "Erro: ". $e->getMessage();
}
?>
