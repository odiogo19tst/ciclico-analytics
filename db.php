<?php
try {
    $pdo = new PDO('sqlite:inventario.db'); // Conexão SQLite
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criação da tabela de usuários, caso não exista
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome VARCHAR(255),
        email VARCHAR(255) UNIQUE,
        senha VARCHAR(255),
        role VARCHAR(50) -- admin, padrao ou cliente
    )");

    try(<?php
        $pdo = new PDO('sqlite:inventario.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Criação da tabela usuários, caso não exista
        $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY,
            nome TEXT,
            email TEXT UNIQUE,
            senha TEXT,
            tipo TEXT
        )");
)

    // Criação do primeiro usuário admin, caso não exista
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $email = 'admin@ciclico.com'; // Email padrão do admin
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $senha = password_hash('admin', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, role) VALUES ('Admin', :email, :senha, 'admin')");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        echo "Usuário admin criado com sucesso.";
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
