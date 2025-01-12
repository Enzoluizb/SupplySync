<?php
require_once '../../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM categories WHERE id = $id";

    if ($conn->query($query)) {
        header('Location: ../categories.php');
    } else {
        echo "Erro ao excluir categoria: " . $conn->error;
    }
} else {
    echo "ID inválido.";
}
