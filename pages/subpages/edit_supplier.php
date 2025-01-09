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

$query = "SELECT * FROM suppliers WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Fornecedor não encontrado.";
    exit;
}

$supplier = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE suppliers SET name = ?, phone = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('sssi', $name, $phone, $email, $id);

    if ($stmt->execute()) {
        header('Location: ../suppliers.php');
        exit;
    } else {
        echo "Erro ao atualizar fornecedor: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" href="/supplysync/assets/css/styles.css">
    <link rel="stylesheet" href="/supplysync/assets/css/header.css">
    <link rel="stylesheet" href="/supplysync/assets/css/footer.css">
    <link rel="stylesheet" href="/supplysync/assets/css/suppliers.css">
</head>

<body>
    <?php include '../../includes/header.php'; ?>
    <main class="main-content">
        <h1>Editar Fornecedor</h1>
        <form action="" method="POST" class="supplier-form">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($supplier['name']) ?>" required>

            <label for="phone">Contato:</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($supplier['phone']) ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($supplier['email']) ?>" required>

            <button type="submit" class="btn">Salvar Alterações</button>
        </form>
    </main>
    <?php include '../../includes/footer.php'; ?>
</body>

</html>