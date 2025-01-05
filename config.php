<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'stock_control';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
