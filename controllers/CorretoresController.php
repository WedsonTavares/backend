<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Corretor.php';

$corretor = new Corretor($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $creci = $_POST['creci'] ?? '';

    // Remove caracteres não numéricos do CPF
    $cpf = preg_replace('/\D/', '', $cpf);

    // Validação de CPF
    if (!$corretor->validarCPF($cpf)) {
        header("Location: ../public/index.php?msg=Erro: CPF inválido!");
        exit;
    }

    if (strlen($creci) >= 2 && strlen($nome) >= 2) {
        if ($id) {
            $corretor->editar($id, $nome, $cpf, $creci);
            header("Location: ../public/index.php?msg=Corretor atualizado com sucesso!");
            exit;
        } else {
            // Verifica se o CPF já está cadastrado antes de inserir
            if ($corretor->cpfExiste($cpf)) {
                header("Location: ../public/index.php?msg=Erro: CPF já cadastrado!");
                exit;
            }

            $corretor->cadastrar($nome, $cpf, $creci);
            header("Location: ../public/index.php?msg=Cadastrado com sucesso!");
            exit;
        }
    } else {
        header("Location: ../public/index.php?msg=Erro na validação!");
        exit;
    }
}
?>