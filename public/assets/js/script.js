const menuOpenBtn = document.querySelector("#menuOpenBtn");
const menuCloseBtn = document.querySelector("#menuCloseBtn");

menuOpenBtn.addEventListener("click", () => {
    document.body.classList.toggle("showMobileMenu");
});

menuCloseBtn.addEventListener("click", () => menuOpenBtn.click());


// Dropdown Cardápio Mobile
const dropdowns = document.querySelectorAll('.nav-item.dropdown');

dropdowns.forEach(dropdown => {
    const link = dropdown.querySelector('.nav-link');

    link.addEventListener('click', e => {
        if (window.innerWidth <= 900) {
            e.preventDefault();

            // Fecha outros dropdowns abertos
            dropdowns.forEach(d => {
                if (d !== dropdown) d.classList.remove('active');
            });

            // Alterna o atual
            dropdown.classList.toggle('active');
        }
    });
});

// Fecha dropdown se clicar fora
document.addEventListener('click', e => {
    if (window.innerWidth <= 900) {
        dropdowns.forEach(dropdown => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    }
});


window.addEventListener('scroll', function() {
  const header = document.getElementById('header');
  if (window.scrollY > 150) { // quando rolar 50px
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});
