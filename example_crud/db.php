<?php
$host = 'localhost';  // Endereço do servidor
$dbname = 'Carne';  // Nome do banco de dados
$username = 'postgres';  // Usuário do banco de dados
$password = 'admin';  // Senha do banco de dados

try {
  // String de conexão para PostgreSQL
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
