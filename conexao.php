<?php
// conexao.php
// Conexão central do sistema - usada por todo o projeto

$host = "localhost";
$user = "root";
$pass = "";
$db   = "veterinaria";

// Criar conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Definir charset para evitar erros com acentos
$conn->set_charset("utf8mb4");
?>
