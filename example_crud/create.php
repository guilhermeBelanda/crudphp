<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $tipo = $_POST['tipo'];
  $peso_kg = $_POST['peso_kg'];
  $preco_por_kg = $_POST['preco_por_kg'];
  $fornecedor = $_POST['fornecedor'];

  $stmt = $pdo->prepare("INSERT INTO carnes (tipo, peso_kg, preco_por_kg, fornecedor) VALUES (?, ?, ?, ?)");
  $stmt->execute([$tipo, $peso_kg, $preco_por_kg, $fornecedor]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Adicionar Carne</title>
</head>

<body>
  <h1>Adicionar Carne</h1>
  <form method="POST" action="">
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" id="tipo" required><br>
    
    <label for="peso_kg">Peso (Kg):</label>
    <input type="text" name="peso_kg" id="peso_kg" required><br>
    
    <label for="preco_por_kg">Preço por Kg:</label>
    <input type="text" name="preco_por_kg" id="preco_por_kg" required><br>
    
    <label for="fornecedor">Fornecedor:</label>
    <input type="text" name="fornecedor" id="fornecedor" required><br>
    
    <button type="submit">Adicionar</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>