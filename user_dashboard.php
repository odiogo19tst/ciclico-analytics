<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário - CICLICO ANALYTICS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Bem-vindo ao CICLICO ANALYTICS!</h1>
        <p>Acesso ao sistema conforme seu nível de permissão.</p>
        <!-- Adicione funcionalidades específicas para o usuário padrão ou cliente -->
    </div>
</body>
</html>
