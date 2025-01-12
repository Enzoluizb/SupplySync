<?php
require_once '../../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    $query = "INSERT INTO categories (name) VALUES ('$name')";
    if ($conn->query($query)) {
        header('Location: ../categories.php');
    } else {
        echo "Erro ao cadastrar categoria: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Categoria</title>
    <link rel="stylesheet" href="/supplysync/assets/css/styles.css">
    <link rel="stylesheet" href="/supplysync/assets/css/header.css">
    <link rel="stylesheet" href="/supplysync/assets/css/footer.css">
    <link rel="stylesheet" href="/supplysync/assets/css/categories.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../../includes/header.php'; ?>
    <main class="main-content">
        <h1>Adicionar Categoria</h1>
        <form action="" method="POST" class="category-form">
            <label for="name">Nome da Categoria:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit" class="btn">Cadastrar</button>
        </form>
    </main>
    <?php include '../../includes/footer.php'; ?>
</body>

</html>