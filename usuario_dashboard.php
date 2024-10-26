<?php
session_start();
if ($_SESSION['usuario_tipo'] !== 'padrao') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Usuário Padrão Dashboard - CICLICO ANALYTICS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bem-vindo, Usuário Padrão!</h1>
    <p>Você pode alimentar dados e análises.</p>
    <ul>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</body>
</html>
