<?php
session_start();

// Se não estiver logado, não entra
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}
?>
