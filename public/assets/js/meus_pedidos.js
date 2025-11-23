// Campo de busca
const inputBusca = document.getElementById("buscaPedido");
const tabela = document.getElementById("tabelaPedidos");
const linhas = tabela?.getElementsByTagName("tr");
const contador = document.getElementById("contador");

function atualizarContador(qtd) {
    contador.textContent = `${qtd} pedido${qtd !== 1 ? 's' : ''} encontrado${qtd !== 1 ? 's' : ''}`;
}

if (inputBusca && linhas) {
    inputBusca.addEventListener("input", () => {
        const filtro = inputBusca.value.toLowerCase();
        let visiveis = 0;

        for (let i = 1; i < linhas.length; i++) {
            const celulas = linhas[i].getElementsByTagName("td");
            let corresponde = false;

            for (let c of celulas) {
                if (c.innerText.toLowerCase().includes(filtro)) {
                    corresponde = true;
                    break;
                }
            }

            linhas[i].style.display = corresponde ? "" : "none";
            if (corresponde) visiveis++;
        }

        atualizarContador(visiveis);
    });

    atualizarContador(linhas.length - 1);
}


document.getElementById("year").textContent = new Date().getFullYear();
// Abrir modal
document.querySelectorAll(".visualizar-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        const id = btn.dataset.id;
        document.getElementById("modalPedido").style.display = "flex";

        fetch("../FUNCAO/fdetalhes_pedido.php?id=" + id)
            .then(res => res.json())
            .then(data => {

                // -------------------------
                // 👉 FORMATAR DATA AQUI
                // -------------------------
                const dataFormatada = new Date(data.pedido.data_pedido)
                    .toLocaleString('pt-BR', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                let html = `
                    <p><b>Nº Pedido:</b> ${data.pedido.id_pedi}</p>
                    <p><b>Data:</b> ${dataFormatada}</p>
                    <p><b>Status:</b> ${data.pedido.status_pedi}</p>
                    <p><b>Destino:</b> ${data.pedido.destino}</p>

                    <hr>

                    <h3>Produto Base</h3>
                    <p><b>${data.base.nome_prod}</b> — R$ ${parseFloat(data.base.preco).toFixed(2)}</p>

                    <hr>

                    <h3>Acompanhamentos</h3>
                `;

                if (data.acompanhamentos.length > 0) {
                    html += "<ul>";
                    data.acompanhamentos.forEach(a => {
                        html += `<li>${a.nome_mp} — R$ ${parseFloat(a.preco_unitario).toFixed(2)}</li>`;
                    });
                    html += "</ul>";
                } else {
                    html += "<p>Nenhum acompanhamento.</p>";
                }

                html += `
                    <hr>
                    <h3>Total</h3>
                    <p><b>R$ ${parseFloat(data.pedido.valor_total).toFixed(2)}</b></p>
                `;

                document.getElementById("modalBody").innerHTML = html;
            })
            .catch(() => {
                document.getElementById("modalBody").innerHTML = "<p>Erro ao carregar detalhes.</p>";
            });
    });
});

// Fechar modal
document.getElementById("closeModalBtn").onclick = () => {
    document.getElementById("modalPedido").style.display = "none";
};
