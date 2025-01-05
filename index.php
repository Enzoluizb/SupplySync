<?php
require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/supplysync/assets/css/styles.css">
    <link rel="stylesheet" href="/supplysync/assets/css/header.css">
    <link rel="stylesheet" href="/supplysync/assets/css/footer.css">
    <link rel="stylesheet" href="/supplysync/assets/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="main-content">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <p>Esta é a página inicial do sistema de controle de estoque.</p>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>