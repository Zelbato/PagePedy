
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
