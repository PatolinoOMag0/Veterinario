<?php
include 'includes/db_connect.php';
include 'auth.php';

// Pegar clientes e animais para os relatórios
$clientes = mysqli_query($conn, "SELECT * FROM clientes");
$animais = mysqli_query($conn, "SELECT * FROM animais");
$consultas = mysqli_query($conn, "SELECT * FROM consultas");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relatórios - VetCare</title>
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
<h3>Clientes</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Email</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($clientes)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nome'] ?></td>
        <td><?= $row['cpf'] ?></td>
        <td><?= $row['endereco'] ?></td>
        <td><?= $row['telefone'] ?></td>
        <td><?= $row['email'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h3>Animais</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Espécie</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>Sexo</th>
        <th>Peso</th>
        <th>Cliente ID</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($animais)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nome'] ?></td>
        <td><?= $row['especie'] ?></td>
        <td><?= $row['raca'] ?></td>
        <td><?= $row['idade'] ?></td>
        <td><?= $row['sexo'] ?></td>
        <td><?= $row['peso'] ?></td>
        <td><?= $row['cliente_id'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<h3>Consultas</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Animal ID</th>
        <th>Cliente ID</th>
        <th>Veterinário</th>
        <th>Observações</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($consultas)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['data'] ?></td>
        <td><?= $row['hora'] ?></td>
        <td><?= $row['animal_id'] ?></td>
        <td><?= $row['cliente_id'] ?></td>
        <td><?= $row['veterinario'] ?></td>
        <td><?= $row['observacoes'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</section>

<footer class="footer">
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
