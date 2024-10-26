<?php
session_start();
require 'db.php';

if ($_SESSION['usuario_tipo'] !== 'admin') {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)');
    $stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $senha, 'tipo' => $tipo]);

    $mensagem = 'Usuário cadastrado com sucesso!';
}
?>

<!-- HTML Formulário de Cadastro de Usuário -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário - CICLICO ANALYTICS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Cadastrar Novo Usuário</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <select name="tipo" required>
            <option value="admin">Administrador</option>
            <option value="padrao">Usuário Padrão</option>
            <option value="cliente">Cliente</option>
        </select>
        <button type="submit">Cadastrar</button>
        <?php if (isset($mensagem)): ?>
            <p><?php echo $mensagem; ?></p>
        <?php endif; ?>
    </form>
    <a href="admin_dashboard.php">Voltar</a>
</body>
</html>
