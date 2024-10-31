<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM carnes WHERE id = ?");
$stmt->execute([$id]);
$carne = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$carne) {
  die("Carne não encontrada.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $tipo = $_POST['tipo'];
  $peso_kg = $_POST['peso_kg'];
  $preco_por_kg = $_POST['preco_por_kg'];
  $fornecedor = $_POST['fornecedor'];

  $stmt = $pdo->prepare("UPDATE carnes SET tipo = ?, peso_kg = ?, preco_por_kg = ?, fornecedor = ? WHERE id = ?");
  $stmt->execute([$tipo, $peso_kg, $preco_por_kg, $fornecedor, $id]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Editar Carne</title>
</head>

<body>
  <h1>Editar Carne</h1>
  <form method="POST" action="">
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" id="tipo" value="<?= $carne['tipo'] ?>" required><br>
    
    <label for="peso_kg">Peso (Kg):</label>
    <input type="text" name="peso_kg" id="peso_kg" value="<?= $carne['peso_kg'] ?>" required><br>
    
    <label for="preco_por_kg">Preço por Kg:</label>
    <input type="text" name="preco_por_kg" id="preco_por_kg" value="<?= $carne['preco_por_kg'] ?>" required><br>
    
    <label for="fornecedor">Fornecedor:</label>
    <input type="text" name="fornecedor" id="fornecedor" value="<?= $carne['fornecedor'] ?>" required><br>
    
    <button type="submit">Atualizar</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>