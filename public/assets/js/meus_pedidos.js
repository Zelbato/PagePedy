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
