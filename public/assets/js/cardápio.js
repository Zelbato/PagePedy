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

// Quando o usuário selecionar um tamanho, mostra o card de acompanhamentos
const radios = document.querySelectorAll('input[name="base_id"]');
const acompDiv = document.getElementById('acompanhamentos');

radios.forEach(radio => {
  radio.addEventListener('change', () => {
    acompDiv.classList.remove('oculto');
    acompDiv.classList.add('mostrar');
  });
});
