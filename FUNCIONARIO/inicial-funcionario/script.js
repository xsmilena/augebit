const items = document.querySelectorAll(".menu-item");

// Marcar ativo se clicar (opcional no SPA)
items.forEach(item => {
  item.addEventListener("click", () => {
    items.forEach(i => i.classList.remove("active"));
    item.classList.add("active");
  });
});
