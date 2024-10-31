<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM carnes");
$carnes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Carnes</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="container">
    <h1>Tipos de Carnes</h1>
    <a href="create.php" class="btn">Adicionar Novo</a>
    <br><br>
    <table>
      <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Peso por Kg</th>
        <th>Preço por Kg</th>
        <th>Fornecedor</th>
        <th>Ações</th>
      </tr>
      <?php foreach ($carnes as $carne): ?>
        <tr>
          <td><?= $carne['id'] ?></td>
          <td><?= $carne['tipo'] ?></td>
          <td><?= $carne['peso_kg'] ?></td>
          <td><?= $carne['preco_por_kg'] ?></td>
          <td><?= $carne['fornecedor'] ?></td>
          <td>
            <a href="edit.php?id=<?= $carne['id'] ?>">Editar</a> |
            <a href="delete.php?id=<?= $carne['id'] ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>
