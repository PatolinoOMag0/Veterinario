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
    <h2>Seu pet merece o melhor — e a gente cuida disso</h2>
    <p>Na <strong>Clínica Veterinária Patolina</strong>, acreditamos que o cuidado com os animais vai muito além do atendimento: envolve carinho, atenção e compromisso em cada detalhe. Nossa missão é garantir qualidade de vida e bem-estar para o seu melhor amigo, oferecendo atendimento completo com profissionais apaixonados por pets.</p>

    <p>Contamos com uma equipe experiente e equipamentos modernos para oferecer diagnósticos rápidos e tratamentos eficazes. Aqui, cada paciente é tratado com respeito, dedicação e aquele toque de amor que faz toda a diferença.</p>

    <h3>Nossos principais serviços</h3>
    <ul>
    <p>🐾 Consultas de rotina e check-ups completos</p>
    <p>💉 Vacinação e controle de parasitas</p>
    <p>🩺 Exames laboratoriais e diagnósticos por imagem</p>
    <p>⚕️ Cirurgias com monitoramento seguro</p>
    <p>🍖 Nutrição e acompanhamento de peso</p>
    <p>❤️ Atendimento emergencial e cuidados intensivos</p>
    </ul>

    <h3>Seu pet em boas mãos</h3>
    <p>Seja para uma simples vacina, um exame detalhado ou uma consulta de emergência, estamos prontos para cuidar do seu companheiro com o máximo de atenção. Na Patolino, cada pet é tratado como parte da nossa família.</p>

    <p><strong>Agende uma visita</strong> e descubra porque somos referência em cuidado, confiança e amor pelos animais.</p>

    <a href="cadastro_cliente.php" class="btn">Agendar Agora</a><br>

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
