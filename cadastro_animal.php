<?php
include 'includes/db_connect.php';
$mensagem = "";

$clientes = mysqli_query($conn, "SELECT id, nome FROM clientes");

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $peso = $_POST['peso'];
    $historico = $_POST['historico'];
    $observacoes = $_POST['observacoes'];
    $cliente_id = $_POST['cliente_id'];

    $sql = "INSERT INTO animais 
        (nome, especie, raca, idade, sexo, peso, historico_vacinas, observacoes, cliente_id) 
        VALUES ('$nome','$especie','$raca','$idade','$sexo','$peso','$historico','$observacoes','$cliente_id')";
    if(mysqli_query($conn, $sql)){
        $mensagem = "Animal cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar animal: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Animais - VetCare</title>
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
        <h2>Cadastro de Animais</h2>
        <?php if($mensagem != "") { ?>
            <p style="color:green; font-weight:bold;"><?= $mensagem ?></p>
        <?php } ?>

        <form action="" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>Espécie:</label>
            <input type="text" name="especie" required>

            <label>Raça:</label>
            <input type="text" name="raca" required>

            <label>Idade:</label>
            <input type="number" name="idade" required>

            <label>Sexo:</label>
            <select name="sexo" required>
                <option value="">Selecione</option>
                <option value="M">Macho</option>
                <option value="F">Fêmea</option>
            </select>

            <label>Peso (kg):</label>
            <input type="number" step="0.01" name="peso" required>

            <label>Histórico de Vacinas:</label>
            <textarea name="historico" rows="4"></textarea>

            <label>Observações:</label>
            <textarea name="observacoes" rows="4"></textarea>

            <label>Cliente:</label>
            <select name="cliente_id" required>
                <option value="">Selecione um cliente</option>
                <?php while($row = mysqli_fetch_assoc($clientes)) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
                <?php } ?>
            </select>

            <input type="submit" name="submit" value="Cadastrar Animal">
        </form>
    </div>
</section>

<footer>
    <p>© 2025 VetCare - Todos os direitos reservados</p>
</footer>

<script>
const menuLinks = document.querySelectorAll('.menu a');
const menuToggle = document.getElementById('menu-toggle');
menuLinks.forEach(link => {
    link.addEventListener('click', () => { menuToggle.checked = false; });
});
</script>

</body>
</html>
