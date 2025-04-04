<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cadastro_corretores";

try {
    $pdo = new PDO(
        "mysql:host=$servername;dbname=$database;charset=utf8",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lança exceções em erros
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna resultados como arrays associativos
            PDO::ATTR_PERSISTENT => false // Desativa conexões persistentes para evitar problemas de desempenho
        ]
    );
} catch (PDOException $e) {
    error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
    die("Erro na conexão com o banco de dados. Tente novamente mais tarde.");
}
?>