//Geral
function showToast(message, type = "success", duration = 1500) {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = `custom-toast-popup ${type}`;
    toast.innerText = message;

    // cria a barra de progresso
    const progress = document.createElement('div');
    progress.className = 'progress';
    progress.style.animation = `progressBar ${duration}ms linear forwards`;

    toast.appendChild(progress);
    container.appendChild(toast);

    // remove toast após o tempo
    setTimeout(() => {
        toast.style.transition = "opacity 0.5s, transform 0.5s";
        toast.style.opacity = "0";
        toast.style.transform = "translateY(20px)";
        setTimeout(() => toast.remove(), 500);
    }, duration);
}


// intercepta o submit do formulário deletar
//Deletar
const deleteForm = document.querySelector('.form-deletar');
deleteForm.addEventListener('submit', function (e) {
    e.preventDefault(); // evita recarregar a página

    const id = document.getElementById('id_prod').value;

    fetch(`../../FUNCAO/fdelete_produto.php?id_prod=${id}`)
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                showToast(data.msg, "success");
                // opcional: atualizar tabela sem recarregar
                setTimeout(() => location.reload(), 1500);
            } else {
                showToast(data.msg, "error");
            }
        })
        .catch(err => showToast("Erro na requisição", "error"));
});


//Cadastro
const cadastroForm = document.querySelector('.form-cadastro');

cadastroForm.addEventListener('submit', function (e) {
    e.preventDefault(); // evita reload da página

    const formData = new FormData(cadastroForm);

    fetch('../../FUNCAO/fcadastro_produto.php', {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                showToast(data.msg, "success"); // mostra toast de sucesso
                cadastroForm.reset(); // limpa formulário
                // opcional: atualizar tabela ou recarregar página
                setTimeout(() => location.reload(), 1500);
            } else {
                showToast(data.msg, "error"); // mostra toast de erro
            }
        })
        .catch(err => showToast("Erro na requisição", "error"));
});


//Editar
const editarForm = document.querySelector('.form-editar');

editarForm.addEventListener('submit', function (e) {
    e.preventDefault(); // evita recarregar a página

    const formData = new FormData(editarForm);

    fetch('../../FUNCAO/fedite_produto.php', {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                showToast(data.msg, "success"); // toast verde
                editarForm.reset(); // opcional: limpar formulário
                // opcional: atualizar tabela
                setTimeout(() => location.reload(), 1500);
            } else {
                showToast(data.msg, "error"); // toast vermelho
            }
        })
        .catch(err => showToast("Erro na requisição", "error"));
});

