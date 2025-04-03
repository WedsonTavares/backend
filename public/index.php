<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Corretores</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
    <div class="container">
        <h1>Cadastro de Corretores</h1>
        <?php include '../views/form.php'; ?>
        <?php include '../views/table.php'; ?>
    </div>
    <?php if (isset($_GET['msg'])): ?>
        <p><?= htmlspecialchars($_GET['msg']) ?></p>
        <?php endif; ?>
        <script src="script.js" defer></script>  
</body>
</html>
