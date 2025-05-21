const openModal = document.getElementById("openModal");
const modal = document.getElementById("modal");
const fecharModal = document.getElementById("fecharModal");
const cancelar = document.getElementById("cancelar");
const form = document.getElementById("formFuncionario");
const tabela = document.querySelector("#tabelaFuncionarios tbody");

openModal.addEventListener("click", () => {
  modal.style.display = "block";
});

fecharModal.addEventListener("click", () => {
  modal.style.display = "none";
});

cancelar.addEventListener("click", () => {
  modal.style.display = "none";
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const dados = new FormData(form);
  const novaLinha = document.createElement("tr");

  novaLinha.innerHTML = `
    <td>${dados.get("nome")}</td>
    <td>${dados.get("cpf")}</td>
    <td>${dados.get("rg")}</td>
    <td>${dados.get("endereco")}</td>
    <td>${dados.get("genero")}</td>
    <td>${dados.get("email")}</td>
    <td>${dados.get("telefone")}</td>
    <td>${dados.get("nascimento")}</td>
    <td>${dados.get("estado")}</td>
    <td>${dados.get("PIS/PASEP")}</td>
    <td>${dados.get("carteira")}</td>
  `;

  tabela.appendChild(novaLinha);
  form.reset();
  modal.style.display = "none";
});

document.getElementById('uploadImagem').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewImagem');
  
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result; // Mostra a imagem carregada
      };
      reader.readAsDataURL(file); // Lê o arquivo como URL base64
    }
  });
  