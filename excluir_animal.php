<?php
require 'auth_check.php';
require 'conexao.php';

$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM animais WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: listar_animais.php?sucesso=1");
exit;
?>
