<?php
// index.php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clínica Veterinária</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function toggleMenu() {
            const nav = document.querySelector("nav");
            nav.classList.toggle("active");
        }
    </script>
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <div class="menu-container">
            <div class="menu-toggle" onclick="toggleMenu()">☰</div>
            <nav>
                <a href="index.php">Início</a>
                <a href="sobre.php">Sobre</a>
                <a href="login.php">Login</a>
            </nav>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner">
        <h1>Bem-vindo à VetCare</h1>
        <p>Cuidando do seu melhor amigo com carinho e dedicação 💙</p>
        <a href="login.php" class="btn">Área Restrita</a>
    </section>

    <!-- Serviços -->
    <section class="servicos">
        <h2>Nossos Serviços</h2>
        <div class="cards">
            <div class="card">
                <h3>Consultas</h3>
                <p>Atendimento veterinário completo para cães e gatos.</p>
            </div>
            <div class="card">
                <h3>Vacinação</h3>
                <p>Proteção contra doenças com vacinas atualizadas.</p>
            </div>
            <div class="card">
                <h3>Exames</h3>
                <p>Exames laboratoriais e diagnósticos rápidos.</p>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer>
        <p>© 2025 VetCare - Todos os direitos reservados.</p>
    </footer>
</body>
</html>
