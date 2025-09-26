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
</head>
<body>
    <!-- Cabeçalho -->
    <header class="header">
    <a href="#" class="logo">VetCare</a> <nav class="navbar" id="navbar">
        <a href="#home">Início</a>
        <a href="#sobre">Sobre Nós</a>
        <a href="#servicos">Serviços</a>
        <a href="#contato">Contato</a>
    </nav>

    <div id="menu-icon" class="menu-icon">
        <i class="fas fa-bars"></i> 
        &#9776; 
    </div>

    <script>
    // 1. Seleciona o ícone de menu e o container de navegação
    let menuIcon = document.querySelector('#menu-icon');
    let navbar = document.querySelector('#navbar');

    // 2. Adiciona um evento de clique ao ícone
    menuIcon.onclick = () => {
        // 3. Alterna a classe 'active' no menu de navegação
        // Se a classe existir, ele remove; se não existir, ele adiciona.
        navbar.classList.toggle('active');
    };
</script>
<body>
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
