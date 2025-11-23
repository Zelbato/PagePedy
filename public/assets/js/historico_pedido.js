
document.addEventListener('DOMContentLoaded', () => {
    const busca = document.getElementById('busca');
    const linhas = document.querySelectorAll('#tabelaPedidos tbody tr');


    const norm = txt => String(txt || '').replace(/\s+/g, ' ').trim().toLowerCase();

    busca.addEventListener('input', () => {
        const texto = norm(busca.value);

        linhas.forEach(linha => {

            const id = norm(linha.children[0]?.textContent);
            const data = norm(linha.children[1]?.textContent);
            const valor = norm(linha.children[2]?.textContent);
            const status = norm(linha.children[3]?.textContent);
            const destino = norm(linha.children[4]?.textContent);


            const corresponde =
                texto === '' ||
                id.includes(texto) ||
                data.includes(texto) ||
                status.includes(texto) ||
                destino.includes(texto) ||
                valor.includes(texto);


            if (corresponde) {
                linha.style.display = '';

                linha.getBoundingClientRect();
                linha.style.opacity = '1';

                if (texto !== '' && status.includes(texto)) {
                    linha.classList.add('highlight');
                } else {
                    linha.classList.remove('highlight');
                }
            } else {
                linha.style.opacity = '0';
                linha.classList.remove('highlight');
                setTimeout(() => { linha.style.display = 'none'; }, 160);
            }
        });
    });
});


// Fechar modal
document.getElementById('closeModalBtn').onclick = () => {
    document.getElementById('modalPedido').style.display = "none";
};

// Abrir modal
document.querySelectorAll(".visualizarPedido").forEach(btn => {
    btn.addEventListener("click", () => {
        const id = btn.dataset.id;
        document.getElementById('modalPedido').style.display = "flex";

        fetch("../FUNCAO/fdetalhes_pedido.php?id=" + id)
            .then(res => res.json())
            .then(data => {

                let html = `
                <p><b>Nº Pedido:</b> ${data.pedido.id_pedi}</p>
                <p><b>Data:</b> ${data.pedido.data_pedido}</p>
                <p><b>Status:</b> ${data.pedido.status_pedi}</p>
                <p><b>Destino:</b> ${data.pedido.destino}</p>

                <hr>

                <h3>Produto Base</h3>
                <p><b>${data.base.nome_prod}</b> – R$ ${parseFloat(data.base.preco).toFixed(2)}</p>

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