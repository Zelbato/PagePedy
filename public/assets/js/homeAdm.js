
window.addEventListener('scroll', () => {
    const textoPainel = document.querySelector('.painel-texto');

    if (window.scrollY > 150) { // exemplo
        textoPainel.style.color = '#fff';
    } else {
        textoPainel.style.color = '#300a33';
    }
});
