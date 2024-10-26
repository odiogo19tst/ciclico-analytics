<?php
session_start();
if ($_SESSION['usuario_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - CICLICO ANALYTICS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bem-vindo, Administrador!</h1>
    <p>Opções disponíveis:</p>
    <ul>
        <li><a href="cadastro_usuario.php">Cadastrar Novo Usuário</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</body>
</html>
