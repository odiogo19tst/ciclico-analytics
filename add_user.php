<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $matricula = $_POST['matricula'];
    $senha_temporaria = substr(md5(time()), 0, 8); // Gera uma senha temporária

    // Conectar ao banco de dados
    $pdo = new PDO('sqlite:inventario.db');
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, matricula, senha, tipo) VALUES (?, ?, ?, ?, 'usuario')");
    $stmt->execute([$nome, $email, $matricula, password_hash($senha_temporaria, PASSWORD_BCRYPT)]);

    // Enviar e-mail de confirmação
    $mensagem = "Olá $nome, sua conta foi criada. Sua senha temporária é: $senha_temporaria";
    mail($email, "Sua conta CICLICO ANALYTICS", $mensagem);

    echo "<div class='alert alert-success'>Usuário adicionado com sucesso. Um e-mail foi enviado com a senha temporária.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CICLICO ANALYTICS - Adicionar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Novo Usuário</h2>
        <form method="POST" action="add_user.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="matricula">Matrícula:</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
        <a href="admin_dashboard.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
