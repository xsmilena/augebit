document.querySelectorAll('.entrada').forEach((entrada) => {
    const dataInput = entrada.querySelector('input[type="date"]');
    const horaInput = entrada.querySelector('input[type="time"]');
    const botaoSalvar = entrada.querySelector('.botao-salvar');
  
    botaoSalvar.addEventListener('click', function () {
      if (dataInput.value && horaInput.value) {
        alert('Suas informações foram salvas com sucesso!');
  
        // Desativa os inputs e o botão
        dataInput.disabled = true;
        horaInput.disabled = true;
        botaoSalvar.disabled = true;
  
        botaoSalvar.style.backgroundColor = '#ccc';
        botaoSalvar.style.cursor = 'not-allowed';
      } else {
        alert('Por favor, preencha a data e a hora antes de salvar.');
      }
    });
  });
  