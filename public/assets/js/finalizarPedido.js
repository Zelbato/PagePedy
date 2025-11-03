const form = document.querySelector('.form-finalizar');

form.addEventListener('submit', async (e) => {
    e.preventDefault(); // impede o envio padrão

    const formData = new FormData(form);

    try {
        //O link esta CORRETO, não alterar!!!
        const response = await fetch('../FUNCAO/ffinalizar_pedido.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            //HTTP entre 200 e 299
            Swal.fire({
                title: 'Compra finalizada!',
                html: '<p style="font-size:1.1rem; color:rgb(25,25,25);">Seu pedido foi concluído com sucesso.</p>',
                icon: 'success',
                confirmButtonText: 'Voltar ao cardápio',
                confirmButtonColor: '#890AA3',
                background: '#f3f6f9',
                color: 'rgb(25,25,25)',
                backdrop: 'rgba(36, 36, 36, 0.8)'
            }).then(() => {
                window.location.href = '../view/vcardapio.php';
            });
        } else {
            //HTTP entre 200 e 299
            Swal.fire({
                title: 'Erro ao finalizar a compra!',
                html: `
                <p style="font-size:1.1rem; color:rgb(25, 25, 25);">Ocorreu um problema ao finalizar a compra.</p>
                <p style="color:rgb(184, 6, 6); font-weight:600;">Verifique os dados e tente novamente.</p>`,
                icon: 'error',
                background: '#f3f6f9',
                color: 'rgb(184, 6, 6)',
                confirmButtonText: 'Tentar novamente',
                confirmButtonColor: 'red',
                backdrop: 'rgba(36, 36, 36, 0.8)'
            });

        }

    } catch (err) {
        //Caso servidor caia/Offiline, URL incorreta, sem Internet
        Swal.fire({
            title: 'Erro!',
            text: 'Não foi possível conectar ao servidor!',
            icon: 'error'
        });
    }
});