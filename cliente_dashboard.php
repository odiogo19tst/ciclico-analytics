<?php
session_start();
if ($_SESSION['usuario_tipo'] !== 'cliente') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cliente Dashboard - CICLICO ANALYTICS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bem-vindo, Cliente!</h1>
    <p>Aqui estão os gráficos e resultados que você pode visualizar.</p>
    <ul>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</body>
</html>
