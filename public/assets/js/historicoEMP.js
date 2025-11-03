document.addEventListener('DOMContentLoaded', () => {
    // Exemplo de filtro por status (opcional)
    const statusFiltro = "Concluído"; // você pode mudar dinamicamente

    const pedidos = document.querySelectorAll('.pedido-card');

    pedidos.forEach(pedido => {
        const status = pedido.querySelector('.status').innerText;
        if (statusFiltro && status !== statusFiltro) {
            pedido.style.display = 'none';
        }
    });

    // Mais funcionalidades podem ser adicionadas aqui
});
