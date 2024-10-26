<?php
try {
    $pdo = new PDO('sqlite:inventario.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT * FROM inventario');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($rows) {
        echo "<table class='table table-striped'>";
        echo "<tr><th>ID</th><th>SKU</th><th>Descrição</th><th>Quantidade</th><th>Valor Unitário</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['sku']}</td>";
            echo "<td>{$row['descricao']}</td>";
            echo "<td>{$row['quantidade_disponivel']}</td>";
            echo "<td>{$row['valor_unitario']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum dado encontrado.";
    }
} catch (PDOException $e) {
    echo "Erro ao consultar o banco de dados: " . $e->getMessage();
}
