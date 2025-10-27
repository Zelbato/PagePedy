// Seleciona botões e produtos
const botoes = document.querySelectorAll('.btnCategoria button');
const produtos = document.querySelectorAll('.card-produto');

// Adiciona evento de clique em cada botão
botoes.forEach(botao => {
  botao.addEventListener('click', () => {
    const categoriaSelecionada = botao.getAttribute('data-categoria');

    // Atualiza classe ativa
    botoes.forEach(b => b.classList.remove('ativo'));
    botao.classList.add('ativo');

    // Mostra apenas produtos da categoria selecionada
    produtos.forEach(produto => {
      if (categoriaSelecionada === 'todos' || produto.classList.contains(categoriaSelecionada)) {
        produto.style.display = 'block';
      } else {
        produto.style.display = 'none';
      }
    });
  });
});
