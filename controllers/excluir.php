<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Corretor.php';

$corretor = new Corretor($pdo);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $corretor->excluir((int)$_GET['id']);
    header("Location: ../public/index.php?msg=Registro excluído com sucesso!");
    exit;
} else {
    header("Location: ../public/index.php?msg=Erro: ID inválido!");
    exit;
}
?>