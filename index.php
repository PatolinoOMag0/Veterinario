<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetCare - Cuidado e Dedicação</title>
    
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
    <header class="header">
  <input type="checkbox" id="menu-toggle" hidden>
  <label for="menu-toggle" class="menu-icon">☰</label>

  <nav class="menu">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Serviços</a></li>
      <li><a href="#">Equipe</a></li>
      <li><a href="#">Contato</a></li>
    </ul>
  </nav>
</header>





    <section class="home" id="home">
        <div class="home-content">
            <h1>Bem-vindo à VetCare</h1>
            <p>Cuidando do seu melhor amigo com carinho e dedicação ❤️</p>
        </div>
    </section>

    <script>
        let menuIcon = document.querySelector('#menu-icon');
        let navbar = document.querySelector('#navbar');

        menuIcon.onclick = () => {
            // Alterna a classe 'active' para abrir/fechar o menu
            navbar.classList.toggle('active');
        };

        // Fecha o menu ao clicar em um link (opcional, mas recomendado no mobile)
        document.querySelectorAll('.navbar a').forEach(link => {
            link.addEventListener('click', () => {
                navbar.classList.remove('active');
            });
        });
    </script>
</body>
</html>