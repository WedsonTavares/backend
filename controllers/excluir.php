<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Corretor.php';

$corretor = new Corretor($pdo);
if (isset($_GET['id'])) {
    $corretor->excluir($_GET['id']);
    header("Location: ../public/index.php?msg=Registro excluído!");
}
?>
