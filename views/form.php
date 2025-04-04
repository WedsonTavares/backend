<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<div class="text-center mb-4">
    <h3>Cadastro de Corretores</h3>
</div>
<form id="corretorForm" action="../controllers/CorretoresController.php" method="POST" class="p-2 border mx-auto rounded shadow-sm bg-light" style="max-width: 700px;">
    <input type="hidden" id="id" name="id">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
    <div class="mb-2">
        <input type="text" id="nome" name="nome" class="form-control" required minlength="2" placeholder="Digite o nome do corretor">
    </div>
    <div class="mb-2">
        <input type="text" id="cpf" name="cpf" class="form-control" required minlength="11" maxlength="14" placeholder="Digite o CPF">
    </div>
    <div class="mb-3">
        <input type="text" id="creci" name="creci" class="form-control" required minlength="2" placeholder="Digite o CRECI">
    </div>
    <div class="text-center mb-2">
        <button type="submit" class="btn btn-success w-50" id="submitBtn">Enviar</button>
    </div>
</form>
