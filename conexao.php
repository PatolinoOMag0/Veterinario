<?php
// conexao.php

$host = "localhost";   // servidor
$user = "root";        // usuário padrão do XAMPP
$pass = "";            // senha padrão (vazia no XAMPP)
$db   = "veterinaria"; // nome do banco que você criou no phpMyAdmin

// Criar conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Se quiser ver uma mensagem de sucesso ao testar:
// echo "Conectado com sucesso!";
?>
