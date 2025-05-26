// script2.js

// Pega o botão que abre o modal e o próprio modal
const btnAbrirModal = document.getElementById('openModal');
const modal = document.getElementById('modal');
const btnFecharModal = document.getElementById('fecharModal');

// Ao clicar no botão, mostra o modal
btnAbrirModal.addEventListener('click', () => {
  modal.style.display = 'block';
});

// Ao clicar no X do modal, esconde o modal
btnFecharModal.addEventListener('click', () => {
  modal.style.display = 'none';
});

// Opcional: clicar fora do conteúdo do modal fecha ele também
window.addEventListener('click', (event) => {
  if(event.target === modal) {
    modal.style.display = 'none';
  }
});

// --- Envio do formulário via AJAX e atualização da tabela ---
const formFuncionario = document.getElementById('formFuncionario');
const tabela = document.getElementById('tabelaFuncionarios').querySelector('tbody');

formFuncionario.addEventListener('submit', function(event) {
  event.preventDefault(); // evita reload da página

  const formData = new FormData(formFuncionario);

  fetch('gerenciarFuncionarios.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      const f = data.funcionario;

      // Cria nova linha na tabela
      const tr = document.createElement('tr');
      tr.innerHTML = `
  <td>${f.nome}</td>
  <td>${f.cpf}</td>
  <td>${f.rg}</td>
  <td>${f.nascimento}</td>
  <td>${f.genero}</td>
  <td>${f.endereco}</td>
  <td>${f.telefone}</td>
  <td>${f.email}</td>
  <td>${f.estado}</td>
  <td>${f.pis_pasep}</td>
  <td>${f.carteira}</td>
  <td>
    ${f.foto ? `<img src="uploads/${f.foto}" alt="Foto" style="width:40px; height:40px; object-fit:cover; border-radius: 50%;">` : ''}
  </td>
  <td style="text-align:center;">
    <img src="img/editar.png" alt="Editar" class="editar" style="width:20px; cursor:pointer; margin-right:8px;">
    <img src="img/lixeira.png" alt="Remover" class="remover" style="width:20px; cursor:pointer;">
  </td>
`;

      tabela.appendChild(tr);

      // Limpa o formulário e fecha o modal
      formFuncionario.reset();
      modal.style.display = 'none';
    } else {
      alert('Erro: ' + data.error);
    }
  })
  .catch(error => {
    console.error('Erro na requisição:', error);
  });
});

const modalAtualizar = document.getElementById('modalAtualizar');
const btnFecharAtualizar = document.getElementById('fecharAtualizar');
const btnCancelarAtualizar = document.getElementById('cancelarAtualizar');
const formAtualizarFuncionario = document.getElementById('formAtualizarFuncionario');

let linhaEditando = null;  // variável para armazenar a linha que está sendo editada

// Abre modal atualizar com dados da linha clicada em editar
tabela.addEventListener('click', (event) => {
  if (event.target.classList.contains('editar')) {
    linhaEditando = event.target.closest('tr');
    const celulas = linhaEditando.querySelectorAll('td');
    function atualizarContadores() {
      const linhas = tabela.querySelectorAll('tr');
      let total = 0;
      let homens = 0;
      let mulheres = 0;
    
      linhas.forEach(linha => {
        const genero = linha.cells[4].textContent.trim().toLowerCase();
        total++;
    
        if (genero === 'masculino') {
          homens++;
        } else if (genero === 'feminino') {
          mulheres++;
        }
      });
    
      document.getElementById('totalFuncionarios').textContent = total.toString().padStart(2, '0');
      document.getElementById('homens').textContent = homens.toString().padStart(2, '0');
      document.getElementById('mulheres').textContent = mulheres.toString().padStart(2, '0');
    }
    

    formAtualizarFuncionario.nome.value = celulas[0].textContent.trim();
    formAtualizarFuncionario.cpf.value = celulas[1].textContent.trim();
    formAtualizarFuncionario.rg.value = celulas[2].textContent.trim();
    formAtualizarFuncionario.nascimento.value = celulas[3].textContent.trim();
    formAtualizarFuncionario.genero.value = celulas[4].textContent.trim();
    formAtualizarFuncionario.endereco.value = celulas[5].textContent.trim();
    formAtualizarFuncionario.telefone.value = celulas[6].textContent.trim();
    formAtualizarFuncionario.email.value = celulas[7].textContent.trim();
    formAtualizarFuncionario.estado.value = celulas[8].textContent.trim();
    formAtualizarFuncionario.pis_pasep.value = celulas[9].textContent.trim();
    formAtualizarFuncionario.carteira.value = celulas[10].textContent.trim();

    // Se quiser, pode setar a foto no preview (se tiver foto na célula 11)
    const imgTd = celulas[11];
    const imgElem = imgTd.querySelector('img');
    if (imgElem) {
      document.getElementById('previewImagemAtualizar').src = imgElem.src;
    } else {
      document.getElementById('previewImagemAtualizar').src = './img/add.png';
    }

    modalAtualizar.style.display = 'block';
  }
});

// Fecha modal atualizar
btnFecharAtualizar.addEventListener('click', () => {
  modalAtualizar.style.display = 'none';
});
btnCancelarAtualizar.addEventListener('click', () => {
  modalAtualizar.style.display = 'none';
});
window.addEventListener('click', (event) => {
  if (event.target === modalAtualizar) {
    modalAtualizar.style.display = 'none';
  }
});

// Envio do formulário atualizar via AJAX
formAtualizarFuncionario.addEventListener('submit', function(event) {
  event.preventDefault();

  if (!linhaEditando) {
    alert('Erro: linha para editar não encontrada.');
    return;
  }

  const formData = new FormData(formAtualizarFuncionario);

  fetch('atualizarFuncionario.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      const f = data.funcionario;

      // Atualiza as células da linha existente
      linhaEditando.cells[0].textContent = f.nome;
      linhaEditando.cells[1].textContent = f.cpf;
      linhaEditando.cells[2].textContent = f.rg;
      linhaEditando.cells[3].textContent = f.nascimento;
      linhaEditando.cells[4].textContent = f.genero;
      linhaEditando.cells[5].textContent = f.endereco;
      linhaEditando.cells[6].textContent = f.telefone;
      linhaEditando.cells[7].textContent = f.email;
      linhaEditando.cells[8].textContent = f.estado;
      linhaEditando.cells[9].textContent = f.pis_pasep;
      linhaEditando.cells[10].textContent = f.carteira;
      linhaEditando.cells[11].innerHTML = f.foto ? `<img src="uploads/${f.foto}" alt="Foto" style="width:40px; height:40px; object-fit:cover; border-radius: 50%;">` : '';

      // Fecha modal e limpa o form
      modalAtualizar.style.display = 'none';
      formAtualizarFuncionario.reset();
      linhaEditando = null;
    } else {
      alert('Erro ao atualizar: ' + data.error);
    }
  })
  .catch(error => {
    console.error('Erro na requisição:', error);
  });

  // Excluir funcionário ao clicar na lixeira
tabela.addEventListener('click', (event) => {
  if (event.target.classList.contains('remover')) {
    const linha = event.target.closest('tr');
    const cpf = linha.cells[1].textContent.trim();

    if (confirm(`Confirma exclusão do funcionário com CPF ${cpf}?`)) {
      fetch('deletarFuncionario.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `cpf=${encodeURIComponent(cpf)}`
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          linha.remove(); // Remove a linha da tabela
          alert('Funcionário removido com sucesso!');
        } else {
          alert('Erro ao remover: ' + data.error);
        }
      })
      .catch(err => {
        console.error('Erro na requisição:', err);
        alert('Erro ao remover o funcionário.');
      });
    }
  }
});

});

// Pesquisa e filtra a tabela de funcionários
const inputPesquisar = document.getElementById('inputPesquisar');

inputPesquisar.addEventListener('input', () => {
  const filtro = inputPesquisar.value.toLowerCase();
  const linhas = tabela.querySelectorAll('tr');

  linhas.forEach(linha => {
    const textoLinha = linha.textContent.toLowerCase();
    if (textoLinha.includes(filtro)) {
      linha.style.display = '';
    } else {
      linha.style.display = 'none';
    }
  });
});
