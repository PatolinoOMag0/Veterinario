<?php 
require 'auth_check.php';
require 'conexao.php';

// Buscar animal
$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM animais WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$animal = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Atualizar
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = htmlspecialchars($_POST['nome']);
    $especie = htmlspecialchars($_POST['especie']);
    $raca = htmlspecialchars($_POST['raca']);
    $idade = intval($_POST['idade']);
    $sexo = htmlspecialchars($_POST['sexo']);
    $peso = floatval($_POST['peso']);
    $cliente_id = intval($_POST['cliente_id']);
    $obs = htmlspecialchars($_POST['observacoes']);

    $stmt = $conn->prepare("UPDATE animais SET nome=?, especie=?, raca=?, idade=?, sexo=?, peso=?, cliente_id=?, observacoes=? WHERE id=?");
    $stmt->bind_param("sssisdissi", $nome, $especie, $raca, $idade, $sexo, $peso, $cliente_id, $obs, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: listar_animais.php?sucesso=1");
    exit;
}
?>

<?php include 'header.php'; ?>

<h2>Editar Animal</h2>

<form method="post">
    Nome: <input type="text" name="nome" value="<?= $animal['nome'] ?>"><br>
    Espécie: <input type="text" name="especie" value="<?= $animal['especie'] ?>"><br>
    Raça: <input type="text" name="raca" value="<?= $animal['raca'] ?>"><br>
    Idade: <input type="number" name="idade" value="<?= $animal['idade'] ?>"><br>
    Sexo: <input type="text" name="sexo" value="<?= $animal['sexo'] ?>"><br>
    Peso: <input type="number" step="0.01" name="peso" value="<?= $animal['peso'] ?>"><br>
    Dono (cliente): <input type="number" name="cliente_id" value="<?= $animal['cliente_id'] ?>"><br>
    Observações:<br>
    <textarea name="observacoes"><?= $animal['observacoes'] ?></textarea><br>

    <button type="submit">Salvar</button>
</form>

<?php include 'footer.php'; ?>
