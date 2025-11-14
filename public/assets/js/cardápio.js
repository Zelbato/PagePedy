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


document.addEventListener('DOMContentLoaded', () => {
  // ========= Atualiza o ano automaticamente =========
  const anoElemento = document.getElementById("year");
  if (anoElemento) {
    anoElemento.textContent = new Date().getFullYear();
  }

  // ========= Sistema de filtro por categoria =========
  const botoes = document.querySelectorAll('.btnCategoria button');
  const produtos = document.querySelectorAll('.card-produto');

  if (botoes.length > 0 && produtos.length > 0) {
    botoes.forEach(btn => {
      btn.addEventListener('click', () => {
        botoes.forEach(b => b.classList.remove('ativo'));
        btn.classList.add('ativo');
        const categoria = btn.dataset.categoria;

        produtos.forEach(prod => {
          prod.style.display = (categoria === 'todos' || prod.classList.contains(categoria)) ? '' : 'none';
        });
      });
    });
  }

  // ========= Exibir acompanhamentos e botão após escolher a base =========
  const radiosBase = document.querySelectorAll('input[name="base_id"]');
  const divAcompanhamentos = document.getElementById('acompanhamentos');
  const btnFinalizarContainer = document.getElementById('btnFinalizarContainer');

  if (radiosBase.length > 0 && divAcompanhamentos && btnFinalizarContainer) {
    radiosBase.forEach(radio => {
      radio.addEventListener('change', () => {
        divAcompanhamentos.classList.remove('oculto');
        btnFinalizarContainer.classList.remove('oculto');
      });
    });
  }
});

window.addEventListener('scroll', function () {
  const header = document.getElementById('header');
  if (window.scrollY > 150) { // quando rolar 50px
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});

//Limite de Acompanhamentos 
document.addEventListener("DOMContentLoaded", function () {
    const limit = 3; // <<< ALTERA O LIMITE AQUI
    const container = document.getElementById("acompanhamentos");
    if (!container) return; // segurança

    const checkboxes = container.querySelectorAll("input[type='checkbox']");

    checkboxes.forEach(cb => {
        cb.addEventListener("change", () => {
            const marcados = Array.from(checkboxes).filter(c => c.checked);

            if (marcados.length >= limit) {
                checkboxes.forEach(c => {
                    if (!c.checked) {
                        c.disabled = true;
                        c.parentElement.classList.add("desabilitado");
                    }
                });
            } else {
                checkboxes.forEach(c => {
                    c.disabled = false;
                    c.parentElement.classList.remove("desabilitado");
                });
            }
        });
    });
});
