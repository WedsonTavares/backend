<?php
include '../config/database.php';
include '../models/Corretor.php';

$corretor = new Corretor($pdo);
$corretores = $corretor->listar();
?>

<div class="table-responsive mt-4" style="max-width: 700px; margin: 0 auto;">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>CRECI</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($corretores as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['cpf']) ?></td>
                    <td><?= htmlspecialchars($row['creci']) ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="editarCorretor(<?= $row['id'] ?>, '<?= $row['name'] ?>', '<?= $row['cpf'] ?>', '<?= $row['creci'] ?>')">Editar</button>
                        <a href="../controllers/excluir.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function editarCorretor(id, name, cpf, creci) {
    // Preenche os campos do formulário com os dados do corretor
    document.getElementById('id').value = id;
    document.getElementById('nome').value = name; // Certifique-se de que o ID é 'nome'
    document.getElementById('cpf').value = cpf;
    document.getElementById('creci').value = creci;

    // Atualiza o botão do formulário para indicar edição
    const submitButton = document.getElementById('submitBtn');
    submitButton.innerText = 'Salvar'; // Altera o texto do botão para "Salvar"
    submitButton.classList.remove('btn-success'); // Remove a classe de "Enviar"
    submitButton.classList.add('btn-primary'); // Adiciona a classe de "Salvar"
}
</script>