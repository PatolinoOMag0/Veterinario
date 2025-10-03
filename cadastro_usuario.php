<?php
include 'includes/db_connect.php';
$mensagem = "";
$tipo = "";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $senha = md5($_POST['senha']); // criptografia simples para login

    // Verifica se o email já existe
    $check = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        $mensagem = "Este email já está cadastrado!";
        $tipo = "error";
    } else {
        $sql = "INSERT INTO usuarios (email,senha) VALUES ('$email','$senha')";
        if(mysqli_query($conn, $sql)){
            // Redireciona para login após 2 segundos
            $mensagem = "Usuário cadastrado com sucesso! Redirecionando para login...";
            $tipo = "success";
            header("refresh:2;url=login.php"); // 2 segundos de espera
        } else {
            $mensagem = "Erro ao cadastrar usuário: " . mysqli_error($conn);
            $tipo = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Usuário - VetCare</title>
<link rel="stylesheet" href="style.css">
<style>
.usuario-container {
    width: 350px;
    margin: 80px auto;
    padding: 30px;
    background-color: #f2f2f2;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    text-align: center;
}

.usuario-container h2 {
    color: #007BFF;
    margin-bottom: 20px;
}

.usuario-container input[type="email"],
.usuario-container input[type="password"] {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.usuario-container input[type="submit"] {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.usuario-container input[type="submit"]:hover {
    background-color: #0056b3;
}

.mensagem-sucesso {
    padding: 10px;
    margin-top: 15px;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
}

.mensagem-sucesso.success {
    background-color: #4caf50;
    color: white;
}

.mensagem-sucesso.error {
    background-color: #dc3545;
    color: white;
}
</style>
</head>
<body>
<div class="usuario-container">
    <h2>Cadastro de Usuário</h2>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="submit" name="submit" value="Cadastrar">
    </form>

    <?php if($mensagem != ""): ?>
    <div class="mensagem-sucesso <?= $tipo ?>"><?= $mensagem ?></div>
    <script>
        const msg = document.querySelector('.mensagem-sucesso');
        msg.classList.add('show');
        setTimeout(() => { msg.classList.remove('show'); }, 3000);
    </script>
    <?php endif; ?>
</div>
</body>
</html>
