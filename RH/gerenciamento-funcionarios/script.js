// ELEMENTOS GERAIS
const openModal = document.getElementById("openModal");
const modal = document.getElementById("modal");
const fecharModal = document.getElementById("fecharModal");
const cancelar = document.getElementById("cancelar");
const form = document.getElementById("formFuncionario");
const tabela = document.querySelector("#tabelaFuncionarios tbody");
const uploadImagem = document.getElementById('uploadImagem');
const previewImagem = document.getElementById("previewImagem");
let imagemBase64 = "";

// MODAL DE CADASTRO
openModal.addEventListener("click", () => modal.style.display = "block");
fecharModal.addEventListener("click", fecharCadastro);
cancelar.addEventListener("click", fecharCadastro);

function fecharCadastro() {
  modal.style.display = "none";
  form.reset();
  imagemBase64 = "";
  previewImagem.src = "./img/add.png";
}

// UPLOAD DE IMAGEM - CADASTRO
uploadImagem.addEventListener('change', function (event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      imagemBase64 = e.target.result;
      previewImagem.src = imagemBase64;
    };
    reader.readAsDataURL(file);
  }
});

// PADRONIZAÇÃO DE GÊNERO
function getGeneroPadronizado(texto) {
  return texto.trim().toLowerCase();
}

// ATUALIZAÇÃO DE CONTADORES
function atualizarContadores(deltaHomem, deltaMulher) {
  const totalEl = document.getElementById('totalFuncionarios');
  const homensEl = document.getElementById('homens');
  const mulheresEl = document.getElementById('mulheres');

  let homens = parseInt(homensEl.textContent) || 0;
  let mulheres = parseInt(mulheresEl.textContent) || 0;

  homens += deltaHomem;
  mulheres += deltaMulher;

  totalEl.textContent = String(homens + mulheres).padStart(2, '0');
  homensEl.textContent = String(homens).padStart(2, '0');
  mulheresEl.textContent = String(mulheres).padStart(2, '0');
}

// ADICIONAR FUNCIONÁRIO
form.addEventListener("submit", (e) => {
  e.preventDefault();

  const dados = new FormData(form);
  const genero = getGeneroPadronizado(dados.get("genero"));

  if (genero === "masculino") atualizarContadores(1, 0);
  else if (genero === "feminino") atualizarContadores(0, 1);

  const novaLinha = document.createElement("tr");
  novaLinha.innerHTML = `
    <td>${dados.get("nome")}</td>
    <td>${dados.get("cpf")}</td>
    <td>${dados.get("rg")}</td>
    <td>${dados.get("nascimento")}</td>
    <td>${dados.get("genero")}</td>
    <td>${dados.get("endereco")}</td>
    <td>${dados.get("telefone")}</td>
    <td>${dados.get("email")}</td>
    <td>${dados.get("estado")}</td>
    <td>${dados.get("PIS/PASEP")}</td>
    <td>${dados.get("carteira")}</td>
    <td><img src="${imagemBase64}" alt="Foto" class="foto-icon" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;"></td>
    <td>
      <img src="./img/lixeira.png" alt="Excluir" class="icon-acao excluir" style="cursor:pointer;">
      <img src="./img/editar.png" alt="Editar" class="icon-acao editar" style="cursor:pointer;">
    </td>
  `;
  tabela.appendChild(novaLinha);
  fecharCadastro();
});

// PESQUISA POR NOME
document.querySelector('.pesquisa').addEventListener('input', function () {
  const termo = this.value.toLowerCase();
  const linhas = tabela.getElementsByTagName('tr');

  for (let linha of linhas) {
    const nome = linha.cells[0]?.textContent.toLowerCase();
    linha.style.display = nome.includes(termo) ? '' : 'none';
  }
});

// MODAL DE ATUALIZAÇÃO
const modalAtualizar = document.getElementById("modalAtualizar");
const formAtualizar = document.getElementById("formAtualizarFuncionario");
const fecharAtualizar = document.getElementById("fecharAtualizar");
const cancelarAtualizar = document.getElementById("cancelarAtualizar");
const uploadImagemAtualizar = document.getElementById("uploadImagemAtualizar");
const previewImagemAtualizar = document.getElementById("previewImagemAtualizar");

let linhaEditando = null;
let imagemAtualizarBase64 = "";

// FECHAR MODAL ATUALIZAÇÃO
fecharAtualizar.addEventListener("click", fecharAtualizacao);
cancelarAtualizar.addEventListener("click", fecharAtualizacao);

function fecharAtualizacao() {
  modalAtualizar.style.display = "none";
  linhaEditando = null;
}

// UPLOAD DE IMAGEM - ATUALIZAÇÃO
uploadImagemAtualizar.addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      imagemAtualizarBase64 = e.target.result;
      previewImagemAtualizar.src = imagemAtualizarBase64;
    };
    reader.readAsDataURL(file);
  }
});

// EDITAR / EXCLUIR - EVENTO DELEGADO
tabela.addEventListener("click", function (e) {
  const alvo = e.target;
  const linha = alvo.closest("tr");

  if (alvo.classList.contains("excluir")) {
    const genero = getGeneroPadronizado(linha.children[4].textContent);
    if (genero === "masculino") atualizarContadores(-1, 0);
    else if (genero === "feminino") atualizarContadores(0, -1);
    linha.remove();
  }

  if (alvo.classList.contains("editar")) {
    linhaEditando = linha;
    const campos = linha.querySelectorAll("td");
    const inputs = formAtualizar.elements;

    inputs["nome"].value = campos[0].textContent;
    inputs["cpf"].value = campos[1].textContent;
    inputs["rg"].value = campos[2].textContent;
    inputs["nascimento"].value = campos[3].textContent;
    inputs["genero"].value = campos[4].textContent;
    inputs["endereco"].value = campos[5].textContent;
    inputs["telefone"].value = campos[6].textContent;
    inputs["email"].value = campos[7].textContent;
    inputs["estado"].value = campos[8].textContent;
    inputs["PIS/PASEP"].value = campos[9].textContent;
    inputs["carteira"].value = campos[10].textContent;

    imagemAtualizarBase64 = campos[11].querySelector("img").src;
    previewImagemAtualizar.src = imagemAtualizarBase64;

    modalAtualizar.style.display = "block";
  }
});

// SUBMIT DO FORMULÁRIO DE ATUALIZAÇÃO
formAtualizar.addEventListener("submit", function (event) {
  event.preventDefault();
  if (!linhaEditando) return;

  const dados = new FormData(formAtualizar);
  const campos = linhaEditando.querySelectorAll("td");

  const generoAntigo = getGeneroPadronizado(campos[4].textContent);
  const generoNovo = getGeneroPadronizado(dados.get("genero"));

  if (generoAntigo !== generoNovo) {
    if (generoAntigo === "masculino") atualizarContadores(-1, 0);
    if (generoAntigo === "feminino") atualizarContadores(0, -1);
    if (generoNovo === "masculino") atualizarContadores(1, 0);
    if (generoNovo === "feminino") atualizarContadores(0, 1);
  }

  campos[0].textContent = dados.get("nome");
  campos[1].textContent = dados.get("cpf");
  campos[2].textContent = dados.get("rg");
  campos[3].textContent = dados.get("nascimento");
  campos[4].textContent = dados.get("genero");
  campos[5].textContent = dados.get("endereco");
  campos[6].textContent = dados.get("telefone");
  campos[7].textContent = dados.get("email");
  campos[8].textContent = dados.get("estado");
  campos[9].textContent = dados.get("PIS/PASEP");
  campos[10].textContent = dados.get("carteira");
  campos[11].querySelector("img").src = imagemAtualizarBase64;

  fecharAtualizacao();
});
