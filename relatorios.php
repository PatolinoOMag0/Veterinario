<?php
include 'includes/db_connect.php';
include 'auth.php';

// Deletar consulta se botão for clicado
if(isset($_POST['finalizar']) && isset($_POST['consulta_id'])){
    $id = $_POST['consulta_id'];
    mysqli_query($conn, "DELETE FROM consultas WHERE id = $id");
}

// Pegar clientes, animais e consultas
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
<style>
.container h2, .container h3 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}

table th {
    background-color: #3498db;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

section {
    padding: 20px 0;
}

button.finalizar {
    background-color: #2ecc71;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
}

button.finalizar:hover {
    background-color: #27ae60;
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
        <h2>Relatórios</h2>

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
                <th>Ação</th>
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
                <td>
                    <form method="post" style="margin:0;">
                        <input type="hidden" name="consulta_id" value="<?= $row['id'] ?>">
                        <button type="submit" name="finalizar" class="finalizar">Consulta Realizada</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
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
