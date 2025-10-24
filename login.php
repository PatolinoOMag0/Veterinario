<?php
session_start();
include 'includes/db_connect.php';

$erro = "";
$mensagem = "";

// Login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();

    if($usuario && password_verify($senha, $usuario['senha'])){
        $_SESSION['usuario_id'] = $usuario['id'];
        header('Location: index.php');
        exit;
    } else {
        $erro = "Email ou senha incorretos.";
    }
}

// Cadastro
if(isset($_POST['cadastrar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $mensagem = "Email já cadastrado!";
    } else {
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashSenha);
        if($stmt->execute()){
            $mensagem = "Cadastro realizado com sucesso! Agora faça login.";
        } else {
            $mensagem = "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - VetCare</title>
<link rel="stylesheet" href="style.css">
<style>
.container { max-width:400px; margin:auto; padding-top:50px; }
.btn-group { display:flex; justify-content: space-between; margin-top:10px; }
.mensagem { margin-top:10px; padding:10px; border-radius:5px; text-align:center; }
.mensagem.success { background-color:#d4edda; color:#155724; }
.mensagem.erro { background-color:#f8d7da; color:#721c24; }
</style>
</head>
<body>
<section>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm" method="post">
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Senha:</label>
            <input type="password" name="senha" required>

            <div class="btn-group">
                <input type="submit" name="login" value="Entrar">
                <button type="button" id="showCadastro">Criar Conta</button>
            </div>
        </form>

        <form id="cadastroForm" method="post" style="display:none; margin-top:20px;">
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Senha:</label>
            <input type="password" name="senha" required>

            <input type="submit" name="cadastrar" value="Cadastrar">
            <button type="button" id="voltarLogin">Voltar</button>
        </form>

        <?php if($erro != ""): ?>
        <div id="mensagem" class="mensagem erro">
            <?= $erro ?>
        </div>
        <?php endif; ?>

        <?php if($mensagem != ""): ?>
        <div id="mensagem" class="mensagem success">
            <?= $mensagem ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Alterna entre login e cadastro
const loginForm = document.getElementById('loginForm');
const cadastroForm = document.getElementById('cadastroForm');

document.getElementById('showCadastro').addEventListener('click', () => {
    loginForm.style.display = 'none';
    cadastroForm.style.display = 'block';
});

document.getElementById('voltarLogin').addEventListener('click', () => {
    cadastroForm.style.display = 'none';
    loginForm.style.display = 'block';
});

// Mensagem desaparece em 3s
const msg = document.getElementById('mensagem');
if(msg){
    msg.classList.add('show');
    setTimeout(() => { msg.classList.remove('show'); }, 3000);
}
</script>
</body>
</html>
