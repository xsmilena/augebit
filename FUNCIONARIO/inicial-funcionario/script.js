
document.getElementById("btnEntrada").addEventListener("click", function(event) {
  event.preventDefault(); // impede envio ou recarregamento da página
  alert("As informações foram salvas.");

  // Desabilita os campos de entrada
  document.getElementById("dataEntrada").disabled = true;
  document.getElementById("horaEntrada").disabled = true;
  this.disabled = true; // desativa o botão também
});

document.getElementById("btnSaida").addEventListener("click", function(event) {
  event.preventDefault(); 
  alert("As informações foram salvas.");

  // Desabilita os campos de saída
  document.getElementById("dataSaida").disabled = true;
  document.getElementById("horaSaida").disabled = true;
  this.disabled = true;
});

