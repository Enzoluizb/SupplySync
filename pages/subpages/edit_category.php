<?php
require_once '../../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
    } else {
        echo "Categoria não encontrada.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $query = "UPDATE categories SET name = '$name' WHERE id = $id";

    if ($conn->query($query)) {
        header('Location: ../categories.php');
    } else {
        echo "Erro ao atualizar categoria: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="/supplysync/assets/css/styles.css">
    <link rel="stylesheet" href="/supplysync/assets/css/header.css">
    <link rel="stylesheet" href="/supplysync/assets/css/footer.css">
    <link rel="stylesheet" href="/supplysync/assets/css/categories.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../../includes/header.php'; ?>
    <main class="main-content">
        <h1>Editar Categoria</h1>
        <form action="" method="POST" class="category-form">
            <label for="name">Nome da Categoria:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
            <button type="submit" class="btn">Atualizar</button>
        </form>
    </main>
    <?php include '../../includes/footer.php'; ?>
</body>

</html>