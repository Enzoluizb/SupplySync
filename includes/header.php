<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Produtos</a>
        <a href="categories.php">Categorias</a>
        <a href="suppliers.php">Fornecedores</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="/supplysync/pages/login.php?logout=true">Sair</a>
        <?php else: ?>
            <a href="/supplysync/pages/login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>