<?php
// Caminho do banco de dados SQLite
$databaseFile = 'inventario.db';

// Verifica se o banco de dados já existe
if (!file_exists($databaseFile)) {
    // Conecta ao banco de dados SQLite (ou cria o banco de dados se não existir)
    $pdo = new PDO('sqlite:' . $databaseFile);

    // Define o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela "inventario" se não existir
    $sql = "CREATE TABLE IF NOT EXISTS inventario (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        sku VARCHAR(255) NOT NULL,
        descricao VARCHAR(255) NOT NULL,
        quantidade_disponivel INTEGER NOT NULL,
        valor_unitario DECIMAL(10, 2) NOT NULL
    )";

    // Executa a criação da tabela
    $pdo->exec($sql);

    echo "Banco de dados e tabela 'inventario' criados com sucesso.";
} else {
    echo "Banco de dados já existe. Nenhuma ação necessária.";
}
?>
