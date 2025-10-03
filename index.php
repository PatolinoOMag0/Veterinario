<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home - VetCare</title>
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
        <h2>Bem-vindo ao VetCare</h2>
        <p>Bem vindo ao meu trabalho do 4º Bimestre: Criar uma página de veterinário.</p>
        <p>Sinceramente eu queria muito fazer a Etecflix kkkk, tava com umas ideias boas, mas estou orgulhoso do meu resultado nessa página de veterinária!</p>
        <p>Até que eu to gostando desse curso de informática, sem necessidade nenhuma esses comentarios, só queria cobrir o vazio que tava nesse espaço kkkkk.</p>  
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
