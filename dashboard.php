<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espla Beauty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-spa"></i>
            <span>Espla Beauty</span>
        </a>
        <ul class="nav-links">
            <li><a href="#"><i class="fas fa-home"></i> Início</a></li>
            <li><a href="#"><i class="fas fa-calendar-alt"></i> Agendamentos</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Perfil</a></li>
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="welcome-message">
            <h1>Seja bem-vindo(a), <?php echo $_SESSION['usuario']; ?>!</h1>
            <p>Estamos felizes em te ver novamente no Espla Beauty.</p>
        </div>
    </div>

    <div class="carrossel-promocoes">
    <h2 id="produtos" style="text-align: center; color: var(--rosa-escuro); margin-bottom: 20px;">Nossos Produtos</h2>
    <div class="produto-grid">
        <div class="produto-card">
            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/86b67dad-3521-435f-9615-94dc1c8caf28.png" alt="Creme Especial">
            <h3>Creme Facial</h3>
            <p>Revitalização profunda para pele</p>
        </div>
        <div class="produto-card">
            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e079f948-5e25-48dc-984b-ae9ed2bcd0ee.png" alt="Shampoo Premium">
            <h3>Shampoo Luxo</h3>
            <p>Força e brilho para seus cabelos</p>
        </div>
    </div>
    
    <h2 id="promocoes" style="text-align: center; color: var(--rosa-escuro); margin: 40px 0 20px;">Promoções</h2>
        <div class="carrossel" id="carrossel">
            <!-- Slides serão adicionados aqui via JavaScript -->
        </div>
    </div>
    
    <div class="controls">
        <button class="prev" id="prev">Anterior</button>
        <button class="next" id="next">Próximo</button>
    </div>
    
    <div class="dots" id="dots">
        <!-- Indicadores serão adicionados aqui via JavaScript -->
    </div>
    
    <div class="contato-section" id="contato">
    <h2 style="text-align: center; color: var(--rosa-escuro); margin: 40px 0 20px;">Entre em Contato</h2>
    <form class="add-image-form">
        <h2 style="color: var(--rosa-escuro); margin-bottom: 15px; text-align: center;">Agende Seu Horário</h2>
        <div class="form-group">
            <label for="image-url">URL da Imagem:</label>
            <input type="text" id="image-url" placeholder="Cole a URL da imagem aqui">
        </div>
        <div class="form-group">
            <label for="image-title">Título:</label>
            <input type="text" id="image-title" placeholder="Digite um título para a imagem">
        </div>
        <div class="form-group">
            <label for="image-desc">Descrição:</label>
            <textarea id="image-desc" rows="3" placeholder="Digite uma descrição para a imagem"></textarea>
        </div>
        <button class="add-btn" id="add-btn">Adicionar ao Carrossel</button>
    </div>

    <a href="logout.php">Sair da página</a>

</body>
</html>

<style>

        h1 {
            align-items: center;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary-pink: #ff6b9c;
            --dark-pink: #e84986;
            --light-pink: #ffc0d5;
            --text-dark: #333;
            --text-light: #fff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9f9f9;
            color: var(--text-dark);
        }

        .navbar {
            background-color: var(--primary-pink);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
        }
        
        .logo {
            display: flex;
            align-items: center;
            color: var(--text-light);
            text-decoration: none;
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .logo i {
            margin-right: 10px;
            font-size: 1.8rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 1.5rem;
            position: relative;
        }
        
        .nav-links a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            display: inline-block;
        }
        
        .nav-links a:hover {
            opacity: 0.8;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--text-light);
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .logout-btn {
            background-color: var(--dark-pink);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background-color: var(--light-pink);
            color: var(--text-dark);
        }
        
        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .welcome-message {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .welcome-message h1 {
            color: var(--primary-pink);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .nav-links {
                margin-top: 1rem;
                width: 100%;
                justify-content: center;
            }
            
            .nav-links li {
                margin: 0 0.5rem;
            }
        }

        .flex-container {
            display: flex;
            background-color: DodgerBlue;
        }

        .flex-container > div {
            background-color: var(--primary-pink);
            margin: 10px;
            padding: 20px;
            font-size: 30px;
        }

        .imagem-um {
            width: 80px;
            height: 100px;
            display: flex;

        }

        :root {
            --rosa-principal: #ff80ab;
            --rosa-escuro: #c94f7c;
            --rosa-claro: #ffb2dd;
            --branco: #fff9fb;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--branco);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .header {
            text-align: center;
        }
        
        nav {
            margin-bottom: 30px;
        }
        
        nav a {
            color: var(--rosa-escuro);
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: var(--rosa-principal);
        }
        
        .produto-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        
        .produto-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .carrossel-promocoes {
            position: relative;
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .carrossel {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 450px;
        }
        
        .slide {
            min-width: 100%;
            position: relative;
        }
        
        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .slide-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(199, 79, 124, 0.8), transparent);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .slide-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .slide-desc {
            font-size: 1rem;
        }
        
        .controls {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .prev, .next {
            background-color: var(--rosa-principal);
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .prev:hover, .next:hover {
            background-color: var(--rosa-escuro);
            transform: scale(1.05);
        }
        
        .dots {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            background-color: var(--rosa-claro);
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dot.active {
            background-color: var(--rosa-principal);
            transform: scale(1.2);
        }
        
        .add-image-form {
            margin-top: 30px;
            background-color: var(--rosa-claro);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 800px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: var(--rosa-escuro);
            font-weight: bold;
        }
        
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid var(--rosa-principal);
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .add-btn {
            background-color: var(--rosa-principal);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .add-btn:hover {
            background-color: var(--rosa-escuro);
        }
        
        @media (max-width: 768px) {
            .carrossel {
                height: 350px;
            }
            
            .slide-title {
                font-size: 1.4rem;
            }
        }
        
        @media (max-width: 480px) {
            .carrossel {
                height: 250px;
            }
            
            .slide-title {
                font-size: 1.2rem;
            }
            
            .slide-desc {
                font-size: 0.8rem;
            }
        }

        a {
            text-align: center;
        }
    </style>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const carrossel = document.getElementById('carrossel');
            const prevBtn = document.getElementById('prev');
            const nextBtn = document.getElementById('next');
            const dotsContainer = document.getElementById('dots');
            const imageUrlInput = document.getElementById('image-url');
            const imageTitleInput = document.getElementById('image-title');
            const imageDescInput = document.getElementById('image-desc');
            const addBtn = document.getElementById('add-btn');
            
            let slides = [
                {
                    url: 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/5cbdc2b1-14e3-4206-acaa-9fcb57c87a41.png',
                    title: 'Imagem de Exemplo 1',
                    desc: 'Esta é uma imagem de exemplo para o carrossel'
                },
                {
                    url: 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7b2b3354-32eb-4fc8-8676-5016c9c0aa9a.png',
                    title: 'Imagem de Exemplo 2',
                    desc: 'Outra imagem de exemplo com diferentes propriedades'
                },
                {
                    url: 'https://placehold.co/800x450',
                    title: 'Imagem de Exemplo 3',
                    desc: 'Terceira imagem de exemplo para demonstração'
                }
            ];
            
            let currentSlide = 0;
            
            // Renderiza slides iniciais
            renderSlides();
            renderDots();
            
            // Adiciona um slide ao carrossel
            addBtn.addEventListener('click', function() {
                const url = imageUrlInput.value.trim();
                const title = imageTitleInput.value.trim();
                const desc = imageDescInput.value.trim();
                
                if (url) {
                    slides.push({
                        url: url || 'https://placehold.co/800x450',
                        title: title || 'Novo Slide',
                        desc: desc || 'Descrição não fornecida'
                    });
                    
                    renderSlides();
                    renderDots();
                    goToSlide(slides.length - 1);
                    
                    // Limpa os campos do formulário
                    imageUrlInput.value = '';
                    imageTitleInput.value = '';
                    imageDescInput.value = '';
                } else {
                    alert('Por favor, insira pelo menos a URL da imagem!');
                }
            });
            
            // Botão anterior
            prevBtn.addEventListener('click', function() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                updateCarrossel();
            });
            
            // Botão próximo
            nextBtn.addEventListener('click', function() {
                currentSlide = (currentSlide + 1) % slides.length;
                updateCarrossel();
            });
            
            // Renderiza todos os slides
            function renderSlides() {
                carrossel.innerHTML = '';
                
                slides.forEach((slide, index) => {
                    const slideElement = document.createElement('div');
                    slideElement.className = 'slide';
                    
                    slideElement.innerHTML = `
                        <img src="${slide.url}" alt="${slide.title}" />
                        <div class="slide-content">
                            <h2 class="slide-title">${slide.title}</h2>
                            <p class="slide-desc">${slide.desc}</p>
                        </div>
                    `;
                    
                    carrossel.appendChild(slideElement);
                });
                
                updateCarrossel();
            }
            
            // Renderiza os pontos de navegação
            function renderDots() {
                dotsContainer.innerHTML = '';
                
                slides.forEach((_, index) => {
                    const dot = document.createElement('div');
                    dot.className = 'dot' + (index === currentSlide ? ' active' : '');
                    dot.addEventListener('click', () => goToSlide(index));
                    dotsContainer.appendChild(dot);
                });
            }
            
            // Atualiza a posição do carrossel
            function updateCarrossel() {
                carrossel.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Atualiza o estado dos dots
                const dots = dotsContainer.querySelectorAll('.dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });
            }
            
            // Vai para um slide específico
            function goToSlide(index) {
                currentSlide = index;
                updateCarrossel();
            }
            
            // Navegação automática (opcional)
            let autoSlideInterval = setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
                updateCarrossel();
            }, 5000);
            
            // Pausa a navegação automática quando o mouse está sobre o carrossel
            carrossel.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });
            
            carrossel.addEventListener('mouseleave', () => {
                autoSlideInterval = setInterval(() => {
                    currentSlide = (currentSlide + 1) % slides.length;
                    updateCarrossel();
                }, 5000);
            });
        });
    </script>