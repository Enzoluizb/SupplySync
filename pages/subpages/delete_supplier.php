<?php
require_once '../../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID do fornecedor não fornecido.";
    exit;
}

$query = "DELETE FROM suppliers WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header('Location: ../suppliers.php');
    exit;
} else {
    echo "Erro ao excluir fornecedor: " . $conn->error;
}
