<?php
include 'includes/db_connect.php';

$sql = "SELECT c.id, c.data, c.hora, a.nome AS animal, cl.nome AS cliente, c.veterinario, c.observacoes 
        FROM consultas c
        JOIN animais a ON c.animal_id = a.id
        JOIN clientes cl ON c.cliente_id = cl.id
        ORDER BY c.data DESC, c.hora DESC";
$consultas = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relatórios - VetCare</title>
<link rel="stylesheet" href="style.css">
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
table th, table td {
    border: 1px solid #007BFF;
    padding: 10px;
    text-align: left;
}
table th {
    background-color: #007BFF;
    color: #fff;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
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
        <h2>Relatórios de Consultas</h2>
        <table>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Animal</th>
                <th>Cliente</th>
                <th>Veterinário</th>
                <th>Observações</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($consultas)) { ?>
            <tr>
                <td><?= date("d/m/Y", strtotime($row['data'])) ?></td>
                <td><?= date("H:i", strtotime($row['hora'])) ?></td>
                <td><?= $row['animal'] ?></td>
                <td><?= $row['cliente'] ?></td>
                <td><?= $row['veterinario'] ?></td>
                <td><?= $row['observacoes'] ?></td>
            </tr>
            <?php } ?>
        </table>
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
