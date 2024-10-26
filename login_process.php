<?php
session_start();

// Dados de login padrão (para o primeiro acesso)
$admin_user = 'adm';
$admin_pass = 'adm';

// Captura os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Verifica se o usuário é admin
if ($username === $admin_user && $password === $admin_pass) {
    $_SESSION['user_type'] = 'admin';
    header("Location: admin_dashboard.php");
} else {
    // Aqui, você pode adicionar a lógica para outros tipos de usuário.
    // Exemplo para um usuário padrão ou cliente:
    $_SESSION['user_type'] = 'usuario';  // Mude conforme o tipo
    header("Location: user_dashboard.php");
}

// Caso o login falhe
if (!isset($_SESSION['user_type'])) {
    echo "<script>alert('Usuário ou senha inválidos!');window.location.href='login.php';</script>";
}
?>
