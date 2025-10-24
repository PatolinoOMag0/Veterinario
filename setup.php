<?php
$servername = "localhost";
$username = "root";
$password = "";


// Professor anderson, peço que não me pergunte como, mas eu arrumei uma maneira de ja criar o banco de dados através desse código, apenas rodando o setup.php
// Eu particularmente ODEIO toda vez ter que abrir o PHP my admin e criar tudo do 0 no SQL, então dei o meu jeitinho kkkkkk



// Conecta no MySQL
$conn = new mysqli($servername, $username, $password);

// Checa conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Cria o banco
if($conn->query("CREATE DATABASE IF NOT EXISTS clinica_veterinaria") === TRUE){
    echo "Banco de dados criado ou já existe.<br>";
} else {
    die("Erro ao criar banco: " . $conn->error);
}

// Seleciona o banco
$conn->select_db("clinica_veterinaria");

// Cria a tabela de usuários
$conn->query("
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);
");

// Cria o usuário admin inicial
$conn->query("
INSERT IGNORE INTO usuarios (email, senha) VALUES ('admin@vetcare.com', MD5('123456'));
");

// Cria a tabela de clientes
$conn->query("
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(20),
    endereco VARCHAR(255),
    telefone VARCHAR(20),
    email VARCHAR(100)
);
");

// Cria a tabela de animais
$conn->query("
CREATE TABLE IF NOT EXISTS animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    especie VARCHAR(50),
    raca VARCHAR(50),
    idade INT,
    sexo VARCHAR(10),
    peso DECIMAL(5,2),
    cliente_id INT,
    observacoes TEXT
);
");

// Cria a tabela de consultas
$conn->query("
CREATE TABLE IF NOT EXISTS consultas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE,
    hora TIME,
    animal_id INT,
    cliente_id INT,
    veterinario VARCHAR(100),
    observacoes TEXT
);
");

echo "<br>Tabelas criadas com sucesso!<br>";
echo "<br><a href='login.php'>Ir para login</a>";

$conn->close();
?>
