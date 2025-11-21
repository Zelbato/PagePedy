
window.addEventListener('scroll', () => {
    const textoPainel = document.querySelector('.painel-texto');

    if (window.scrollY > 150) { // exemplo
        textoPainel.style.color = '#fff';
    } else {
        textoPainel.style.color = '#300a33';
    }
});

// Função para formatar a data em "dd/mm/aaaa HH:MM"
function formatarData(dataStr) {
    const dataObj = new Date(dataStr.replace(" ", "T")); // transforma "YYYY-MM-DD HH:MM:SS" em objeto Date
    const dia = String(dataObj.getDate()).padStart(2, '0');
    const mes = String(dataObj.getMonth() + 1).padStart(2, '0');
    const ano = dataObj.getFullYear();
    const hora = String(dataObj.getHours()).padStart(2, '0');
    const minuto = String(dataObj.getMinutes()).padStart(2, '0');
    return `${dia}/${mes}/${ano} ${hora}:${minuto}`;
}

// Fecha modal
document.getElementById('closeModalBtn').onclick = () => {
    document.getElementById('modalPedido').style.display = "none";
};

// Abrir modal
document.querySelectorAll(".abrir-modal").forEach(btn => {
    btn.addEventListener("click", () => {
        const id = btn.dataset.id;
        const modal = document.getElementById('modalPedido');
        const modalBody = document.getElementById("modalBody");

        modal.style.display = "flex";
        modalBody.innerHTML = "<p>Carregando detalhes...</p>";

        fetch(`../../FUNCAO/fdetalhes_pedido.php?id=${id}`)
            .then(res => res.json())
            .then(data => {

                // Formata a data
                const dataFormatada = formatarData(data.pedido.data_pedido);

                // Monta o HTML do modal
                let html = `
                    <p><b>Nº Pedido:</b> ${data.pedido.id_pedi}</p>
                    <p><b>Cliente:</b> ${data.pedido.cliente}</p>
                    <p><b>Data:</b> ${dataFormatada}</p>
                    <p><b>Status:</b> ${data.pedido.status_pedi}</p>
                    <p><b>Destino:</b> ${data.pedido.destino}</p>

                    <hr>

                    <h3>Produto Base</h3>
                    <p><b>${data.base.nome_prod}</b> - R$ ${parseFloat(data.base.preco).toFixed(2)}</p>

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
