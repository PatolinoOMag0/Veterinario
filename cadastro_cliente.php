<?php
include 'includes/db_connect.php';
include 'auth.php';

$mensagem = "";
$tipo = "";

// Verifica se o formulário foi enviado
if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    echo '<p style="color:green; font-weight:bold; margin-top:10px;">Cliente cadastrado com sucesso!</p>';
    echo '<a href="cadastro_animal.php" class="btn-cadastrar-animal">Cadastrar Animal</a>';


    // Prepara a query para inserir os dados no banco
    $stmt = $conn->prepare("INSERT INTO clientes (nome, cpf, endereco, telefone, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $cpf, $endereco, $telefone, $email);

    if($stmt->execute()){
        $mensagem = "Cliente cadastrado com sucesso!";
        $tipo = "success";
    } else {
        $mensagem = "Erro ao cadastrar cliente: " . $stmt->error;
        $tipo = "error";
    }
    // Fecha a declaração
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Clientes - VetCare</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<div class="container">
<h1>VetCare</h1>
<nav>
<input type="checkbox" id="menu-toggle">
<label for="menu-toggle" class="hamburger"><span></span><span></span><span></span></label>
<ul class="menu">
<li><a href="index.php">Home</a></li>
<li><a href="cadastro_cliente.php">Clientes</a></li>
<li><a href="cadastro_animal.php">Animais</a></li>
<li><a href="agendamento.php">Consultas</a></li>
<li><a href="relatorios.php">Relatórios</a></li>
</ul>
</nav>
</div>
</header>

<section>
<div class="container">
<h2>Cadastro de Clientes</h2>
<form action="" method="post">
<label>Nome:</label>
<input type="text" name="nome" required>

<label>CPF:</label>
<input type="text" name="cpf" required>

<label>Endereço:</label>
<input type="text" name="endereco" required>

<label>Telefone:</label>
<input type="text" name="telefone" required>

<label>Email:</label>
<input type="email" name="email" required>

<input type="submit" name="submit" value="Cadastrar Cliente">
</form>

<?php if($mensagem != ""): ?>
<div id="mensagem" class="mensagem-sucesso <?= $tipo ?>">
<?= $mensagem ?>
</div>
<?php endif; ?>

</div>
</section>

<footer class="footer">
<p>© 2025 VetCare - Todos os direitos reservados</p>
</footer>

<script>
const msg = document.getElementById('mensagem');
if(msg){
    msg.classList.add('show');
    setTimeout(() => { msg.classList.remove('show'); }, 3000);
}

const menuLinks = document.querySelectorAll('.menu a');
const menuToggle = document.getElementById('menu-toggle');
menuLinks.forEach(link => { link.addEventListener('click', () => { menuToggle.checked = false; }); });
</script>
</body>
</html>
