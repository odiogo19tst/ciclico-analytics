<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CICLICO ANALYTICS - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f5;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container img {
            width: 150px;
            margin-bottom: 20px;
        }
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 30px;
            color: #007bff;
        }
        .btn-login {
            background-color: #007bff;
            color: white;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo da empresa -->
        <img src="logo_empresa.png" alt="Logo da Empresa">
        <!-- Nome do projeto -->
        <h1>CICLICO ANALYTICS</h1>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Usuário" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-login">Entrar</button>
        </form>
    </div>
</body>
</html>
