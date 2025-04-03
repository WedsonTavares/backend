<form id="corretorForm" action="../controllers/CorretoresController.php" method="POST">
    <input type="hidden" id="id" name="id">
    <label>Nome:</label>
    <input type="text" id="nome" name="nome" required minlength="2">
    <label>CPF:</label>
    <input type="text" id="cpf" name="cpf" required minlength="11" maxlength="14" placeholder="Digite o CPF">
    <label>CRECI:</label>
    <input type="text" id="creci" name="creci" required minlength="2">
    <button type="submit">Enviar</button>
</form>
