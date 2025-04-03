<?php
include '../config/database.php';
include '../models/Corretor.php';

$corretor = new Corretor($pdo);
$corretores = $corretor->listar();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>CRECI</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($corretores as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['cpf']) ?></td>
            <td><?= htmlspecialchars($row['creci']) ?></td>
            <td>
                <button onclick="editarCorretor(<?= $row['id'] ?>, '<?= $row['name'] ?>', '<?= $row['cpf'] ?>', '<?= $row['creci'] ?>')">Editar</button>
                <a href="../controllers/excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
function editarCorretor(id, name, cpf, creci) {
    document.getElementById('id').value = id;
    document.getElementById('name').value = name;
    document.getElementById('cpf').value = cpf;
    document.getElementById('creci').value = creci;
    document.getElementById('form').action = '../controllers/CorretoresController.php';
    document.getElementById('submitBtn').innerText = 'Salvar';
}
</script>
