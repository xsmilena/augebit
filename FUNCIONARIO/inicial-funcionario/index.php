<?php
// Iniciar a sessão
session_start();

// Verificar se o nome foi passado via formulário ou outra ação (exemplo)
if (isset($_POST['nome'])) {
    $_SESSION['nome'] = $_POST['nome']; // Armazenando o nome na sessão
}

// Verificando se o nome está armazenado na sessão
$nomeUsuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Milena';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Augebit</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="comeco">
    <img class="logo" src="./img/augebit.png" alt="">
    <div class="texto">
      <h1 class="saudacao1">Olá, <?php echo $nomeUsuario; ?>!</h1> <!-- Exibe o nome dinâmico -->
      <h1 class="saudacao2">Veja suas atividades para hoje</h1>
    </div>
  </div>

  <div class="tudo">
    <div class="tudo1">
      <div class="sidebar">
        <div class="icon-circle">
          <img src="img/home.png" alt="Home icon">
        </div>
        <a href="notebook.php" class="menu-item">
          <span class="icon notebook"></span>
        </a>
        <a href="cap.php" class="menu-item">
          <span class="icon cap"></span>
        </a>
        <a href="chart.php" class="menu-item">
          <span class="icon chart"></span>
        </a>
        <a href="phone.php" class="menu-item">
          <span class="icon phone"></span>
        </a>
      </div>
      <div class="perfil">
        <a class="person" href=""></a>
      </div>
    </div>

    <div class="informacoes">
      <div class="part1">
        <div class="caixa1">
          <img class="img1" src="./img/img1.png" alt="">
          <div class="textinhos">
            <a class="info-texto" href="">Solicitações</a>
            <a class="info-subtexto" href="">Solicitar férias, folgas, etc</a>
          </div>
        </div>

        <div class="caixa1">
          <img class="img2" src="./img/img2.png" alt="">
          <div class="textinhos">
            <a class="info-texto2" href="">Cursos</a>
            <a class="info-subtexto2" href="">Desempenho nos cursos</a>
          </div>
        </div>

        <div class="caixa1">
          <img class="img3" src="./img/img3.png" alt="">
          <div class="textinhos">
            <a class="info-texto3" href="">Justificativa</a>
            <a class="info-subtexto3" href="">Justifique atrasos, faltas, etc</a>
          </div>
        </div>

        <div class="caixa4">
          <button>
            <img class="mais" src="./img/mais.png" alt="">
          </button>
        </div>
      </div>

      <div class="part2">
        <div class="caixa2">
          <h1 class="info-texto4">Check-in / Check-out</h1>

          <!-- Entrada -->
          <div class="entrada">
            <h1 class="Check-in">Dia e Horário de entrada</h1>
            <div class="linha">
              <label>Data:</label>
              <input id="dataEntrada" class="data-entrada" type="date">
              <label class="hora">Hora:</label>
              <input id="horaEntrada" class="hora-entrada" type="time">
              <button id="btnEntrada" class="botao-salvar">
                <h1 class="titulo-salvar">salvar</h1>
              </button>
            </div>
          </div>

          <!-- Saída -->
          <div class="entrada">
            <h1 class="Check-in">Dia e Horário de saída</h1>
            <div class="linha1">
              <label>Data:</label>
              <input id="dataSaida" class="data-entrada" type="date">
              <label class="hora">Hora:</label>
              <input id="horaSaida" class="hora-entrada" type="time">
              <button id="btnSaida" class="botao-salvar">
                <h1 class="titulo-salvar">salvar</h1>
              </button>
            </div>
          </div>
        </div>

        <div class="caixa5">
          <h1 class="info-texto5">Desempenho Profissional em %</h1>
        </div>
      </div>

      <div class="part3">
        <div class="caixa6">
          <h1 class="info-texto6">Cursos</h1>
        </div>
        <div class="caixa6">
          <h1 class="info-texto6">Cursos</h1>
        </div>
        <div class="caixa6">
          <h1 class="info-texto6">Cursos</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Importando o script JS -->
  <script src="./script.js"></script>
</body>
</html>
