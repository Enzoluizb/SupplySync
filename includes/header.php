<header>
    <nav>
        <a href="../index.php">Home</a>
        <a href="/supplysync/pages/products.php">Produtos</a>
        <a href="/supplysync/pages/categories.php">Categorias</a>
        <a href="/supplysync/pages/suppliers.php">Fornecedores</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="/supplysync/pages/login.php?logout=true">Sair</a>
        <?php else: ?>
            <a href="/supplysync/pages/login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>