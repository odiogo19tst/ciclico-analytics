<?php
// Inclui a biblioteca PHPSpreadsheet
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

try {
    // Verifica se um arquivo foi enviado
    if (isset($_FILES['file'])) {
        // Caminho temporário do arquivo
        $file_tmp = $_FILES['file']['tmp_name'];

        // Carrega o arquivo Excel
        $spreadsheet = IOFactory::load($file_tmp);
        $worksheet = $spreadsheet->getActiveSheet();

        // Conexão com o banco de dados SQLite
        $pdo = new PDO('sqlite:inventario.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Itera pelas linhas do Excel
        foreach ($worksheet->getRowIterator() as $index => $row) {
            if ($index === 0) continue; // Ignora o cabeçalho

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $sku = $cellIterator->current()->getValue();
            $descricao = $cellIterator->next()->getValue();
            $quantidade_disponivel = $cellIterator->next()->getValue();
            $valor_unitario = $cellIterator->next()->getValue();

            // Inserção no banco de dados
            $stmt = $pdo->prepare("INSERT INTO inventario (sku, descricao, quantidade_disponivel, valor_unitario) 
                                   VALUES (:sku, :descricao, :quantidade_disponivel, :valor_unitario)");
            $stmt->execute([
                ':sku' => $sku,
                ':descricao' => $descricao,
                ':quantidade_disponivel' => $quantidade_disponivel,
                ':valor_unitario' => $valor_unitario
            ]);
        }
        echo "<div class='alert alert-success'>Upload e processamento concluídos com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Nenhum arquivo foi enviado.</div>";
    }
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
}
?>
