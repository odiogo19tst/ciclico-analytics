<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_tipo'] = $usuario['tipo'];

        if ($usuario['tipo'] === 'admin') {
            header('Location: admin_dashboard.php');
        } elseif ($usuario['tipo'] === 'padrao') {
            header('Location: usuario_dashboard.php');
        } elseif ($usuario['tipo'] === 'cliente') {
            header('Location: cliente_dashboard.php');
        }
        exit;
    } else {
        $erro = 'Credenciais inválidas.';
    }
}

    /* Estilo geral */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    /* Logo e título */
    .logo-container {
        text-align: center;
        margin-top: 50px;
    }

    .logo {
        max-width: 150px;
    }

    h1 {
        color: #007BFF;
        font-size: 24px;
    }

    /* Barra de progresso */
    .progress-bar-background {
        width: 80%;
        margin: 20px auto;
        background-color: #e0e0e0;
        border-radius: 25px;
        height: 30px;
    }

    .progress-bar {
        width: 0%;
        height: 100%;
        background-color: #007BFF;
        text-align: center;
        line-height: 30px;
        color: white;
        border-radius: 25px;
        transition: width 0.5s ease;
    }

    /* Estilo da tela de login */
    #login-container {
        display: none;
    }

    .login-container {
        width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    input[type="email"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        box-sizing: border-box;
    }

    button {
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #0056b3;
    }

    
    <?php
    session_start();
    require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];

            if ($usuario['tipo'] === 'admin') {
                header('Location: admin_dashboard.php');
            } elseif ($usuario['tipo'] === 'padrao') {
                header('Location: usuario_dashboard.php');
            } elseif ($usuario['tipo'] === 'cliente') {
                header('Location: cliente_dashboard.php');
            }
            exit;
        } else {
            $erro = 'Credenciais inválidas.';
        }
    }
    ?>

    <!-- HTML Formulário de Login -->
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Login -

?>

<!-- HTML Formulário de Login -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - CICLICO ANALYTICS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login - CICLICO ANALYTICS</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <?php if (isset($erro)): ?>
                <p class="error"><?php echo $erro; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
            <!DOCTYPE html>
            <html lang="pt-BR">
            <head>
                <meta charset="UTF-8">
                <title>Login - CICLICO ANALYTICS</title>
                <link rel="stylesheet" href="styles.css">
                <script>
                    function carregarSistema() {
                        var progressBar = document.getElementById("progressBar");
                        var width = 0;
                        var interval = setInterval(function() {
                            if (width >= 100) {
                                clearInterval(interval);
                                document.getElementById("preload-container").style.display = "none";
                                document.getElementById("login-container").style.display = "block";
                            } else {
                                width++;
                                progressBar.style.width = width + "%";
                                progressBar.innerHTML = width + "%";
                            }
                        }, 50); // Controla a velocidade do carregamento
                    }

                    window.onload = carregarSistema;
                </script>
            </head>
            <body>
                <!-- Preloader Container -->
                <div id="preload-container">
                    <div class="logo-container">
                        <img src="tpc-logo.png" alt="Logo TPC" class="logo">
                        <h1>CICLICO ANALYTICS</h1>
                    </div>
                    <div class="progress-bar-background">
                        <div id="progressBar" class="progress-bar"></div>
                    </div>
                </div>

                <!-- Login Form (Oculto até o carregamento) -->
                <div id="login-container" style="display: none;">
                    <div class="login-container">
                        <h2>Login - CICLICO ANALYTICS</h2>
                        <form method="POST">
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="senha" placeholder="Senha" required>
                            <button type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </body>
            </html>
