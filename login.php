<?php
session_start();
include 'includes/db_connect.php';
$mensagem = "";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $senha = md5($_POST['senha']); // senha em MD5

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['usuario'] = mysqli_fetch_assoc($result);
        header("Location: index.php"); // redireciona para home
        exit;
    } else {
        $mensagem = "Email ou senha incorretos!";
    }
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
.login-container {
    width: 350px;
    margin: 80px auto;
    padding: 30px;
    background-color: #f2f2f2;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    text-align: center;
}

.login-container h2 {
    color: #007BFF;
    margin-bottom: 20px;
}

.login-container input[type="email"],
.login-container input[type="password"] {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.login-container input[type="submit"] {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-container input[type="submit"]:hover {
    background-color: #0056b3;
}

/* botão de criar conta */
.login-container .btn-cadastrar {
    display: block;
    margin: 15px auto 0 auto;
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
}

.login-container .btn-cadastrar:hover {
    background-color: #218838;
}

.mensagem-sucesso {
    background-color: #dc3545;
    color: white;
    padding: 10px;
    margin-top: 15px;
    border-radius: 5px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-container">
    <h2>Login VetCare</h2>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="submit" name="submit" value="Entrar">
    </form>

    <a href="cadastro_usuario.php" class="btn-cadastrar">Criar Conta</a>

    <?php if($mensagem != ""): ?>
    <div class="mensagem-sucesso"><?= $mensagem ?></div>
    <?php endif; ?>
</div>
</body>
</html>
