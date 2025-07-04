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
    </style>
