console.log("O JavaScript foi carregado!");

document.addEventListener("DOMContentLoaded", function () {
    console.log("O DOM está pronto!");

    // Testando se o elemento com ID "id" existe
    console.log("Elemento ID:", document.getElementById("id"));
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("corretorForm");

    if (!form) {
        console.error("❌ Formulário NÃO encontrado! Verifique o ID no HTML.");
        return;
    }

    console.log("✅ Formulário encontrado!");

    // Adiciona máscara de entrada para CPF
    const cpfInput = document.getElementById("cpf");
    cpfInput.addEventListener("input", function () {
        let value = cpfInput.value.replace(/\D/g, "");
        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
        cpfInput.value = value.substring(0, 14);
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Impede envio automático

        console.log("🚀 Tentando enviar o formulário...");

        let nome = document.getElementById("nome").value.trim();
        let creci = document.getElementById("creci").value.trim();
        let cpf = cpfInput.value.replace(/\D/g, "");
        cpfInput.value = cpf;

        // Validações
        if (nome.length < 2) {
            alert("❌ Nome deve ter pelo menos 2 caracteres.");
            return;
        }
        if (cpf.length !== 11) {
            alert("❌ CPF deve ter exatamente 11 dígitos.");
            return;
        }
        if (creci.length < 2) {
            alert("❌ CRECI deve ter pelo menos 2 caracteres.");
            return;
        }

        const submitButton = form.querySelector("button[type='submit']");
        submitButton.disabled = true;
        submitButton.textContent = "Enviando...";

        setTimeout(() => {
            form.submit();
        }, 2000);
    });
});


function editarCorretor(id, name, cpf, creci) {

    document.getElementById('id').value = id;
    document.getElementById('nome').value = name;
    document.getElementById('cpf').value = cpf;
    document.getElementById('creci').value = creci;

    const submitButton = document.getElementById('submitBtn');
    submitButton.innerText = 'Salvar';
    submitButton.classList.remove('btn-success');
    submitButton.classList.add('btn-primary');
}
document.addEventListener("DOMContentLoaded", function () {
    const alertMessage = document.getElementById("alertMessage");
    if (alertMessage) {
        setTimeout(() => {
            alertMessage.style.opacity = "0"; // Gradualmente desaparece
            setTimeout(() => {
                alertMessage.style.display = "none"; // Remove da tela
            }, 500); // Tempo para a transição (0.5s)
        }, 2000); // 2000ms = 2 segundos
    }
});
