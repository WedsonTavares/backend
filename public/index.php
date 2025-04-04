<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="style.css">  
    <title>Cadastro de Corretores</title>
</head>
<body>
    <div class="container mt-5">
        <?php include '../views/form.php'; ?>
        <?php include '../views/table.php'; ?>

        <?php if (isset($_GET['msg'])): ?>
            <div id="alertMessage" class="alert">
                <?= htmlspecialchars($_GET['msg']) ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="script.js" defer></script>  
</body>
</html>