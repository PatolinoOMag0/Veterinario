<?php
include 'includes/db_connect.php';
include 'auth.php';

// Pega lista de clientes e animais
$clientes = mysqli_query($conn, "SELECT id, nome FROM clientes");
$animais = mysqli_query($conn, "SELECT id, nome FROM animais");

if(isset($_POST['submit'])){
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $animal_id = $_POST['animal_id'];
    $cliente_id = $_POST['cliente_id'];
    $veterinario = $_POST['veterinario'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO consultas 
        (data, hora, animal_id, cliente_id, veterinario, observacoes) 
        VALUES ('$data','$hora','$animal_id','$cliente_id','$veterinario','$observacoes')";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamento de Consultas - VetCare</title>
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
        <h2>Agendamento de Consultas</h2>
        <form action="" method="post">
            <label>Data:</label>
            <input type="date" name="data" required>

            <label>Hora:</label>
            <input type="time" name="hora" required>

            <label>Animal:</label>
            <select name="animal_id" required>
                <option value="">Selecione um animal</option>
                <?php while($row = mysqli_fetch_assoc($animais)) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
                <?php } ?>
            </select>

            <label>Cliente:</label>
            <select name="cliente_id" required>
                <option value="">Selecione um cliente</option>
                <?php while($row = mysqli_fetch_assoc($clientes)) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
                <?php } ?>
            </select>

            <label>Veterinário:</label>
            <input type="text" name="veterinario" required>

            <label>Observações:</label>
            <textarea name="observacoes" rows="4"></textarea>

            <input type="submit" name="submit" value="Agendar Consulta">
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
