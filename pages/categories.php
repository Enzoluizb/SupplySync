<?php
require_once '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$query = "SELECT * FROM categories";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="/supplysync/assets/css/styles.css">
    <link rel="stylesheet" href="/supplysync/assets/css/header.css">
    <link rel="stylesheet" href="/supplysync/assets/css/footer.css">
    <link rel="stylesheet" href="/supplysync/assets/css/categories.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <main class="main-content">
        <h1>Gestão de Categorias</h1>
        <p>Gerencie as categorias de produtos cadastradas no sistema.</p>
        <a href="subpages/add_category.php" class="btn">Adicionar Categoria</a>
        <table class="categories-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td>
                                <a href="subpages/edit_category.php?id=<?= $row['id'] ?>" class="btn">Editar</a>
                                <a href="subpages/delete_category.php?id=<?= $row['id'] ?>" class="btn delete-btn">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Nenhuma categoria cadastrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>

</html>