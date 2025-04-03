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

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Impede envio automático

        console.log("🚀 Tentando enviar o formulário...");

        let nome = document.getElementById("nome").value.trim();
        let cpfInput = document.getElementById("cpf");
        let creci = document.getElementById("creci").value.trim();

        // Remove caracteres não numéricos do CPF
        let cpf = cpfInput.value.replace(/\D/g, "");

        // Atualiza o valor do campo CPF no formulário
        cpfInput.value = cpf;

        console.log("📌 Dados enviados:");
        console.log("Nome:", nome);
        console.log("CPF:", cpf); // Agora sem pontos e traço
        console.log("CRECI:", creci);

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

        console.log("✅ Formulário validado!");

        // Desativa o botão para evitar múltiplos envios
        const submitButton = form.querySelector("button[type='submit']");
        submitButton.disabled = true;
        submitButton.textContent = "Enviando...";

        // Simulação de um envio assíncrono (AJAX pode ser usado aqui)
        setTimeout(() => {
            form.submit(); // Envia o formulário
        }, 500); // Tempo curto para simular envio
    });
});

// Função para preencher os campos ao editar um corretor
function editarCorretor(id, nome, cpf, creci) {
    document.getElementById("id").value = id;
    document.getElementById("nome").value = nome;
    document.getElementById("cpf").value = cpf;
    document.getElementById("creci").value = creci;

    console.log(`✏️ Editando corretor: ID=${id}, Nome=${nome}, CPF=${cpf}, CRECI=${creci}`);
}
