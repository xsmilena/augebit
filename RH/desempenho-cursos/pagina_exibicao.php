<?php
include '../../conexao.php';

// Função para escapar texto e evitar problemas de segurança (XSS)
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// Recebendo dados enviados via POST
$nome = isset($_POST['nome_funcionario']) ? htmlspecialchars($_POST['nome_funcionario']) : 'Funcionário';
$titulo_secao1 = $_POST['titulo_secao1'] ?? '';
$curso1 = $_POST['curso1'] ?? '';
$porcentagem1 = $_POST['porcentagem1'] ?? '';

$criterio1 = $_POST['criterio1'] ?? [];
$resultado1 = $_POST['resultado1'] ?? [];

$classificacao = $_POST['classificacao'] ?? '';
$resumo = $_POST['resumo'] ?? '';

$titulo_secao2 = $_POST['titulo_secao2'] ?? '';
$progresso_curso_atual = $_POST['progresso_curso_atual'] ?? [];
$curso_atual_nome = $_POST['curso_atual_nome'] ?? [];
$curso_atual_desc1 = $_POST['curso_atual_desc1'] ?? [];
$curso_atual_desc2 = $_POST['curso_atual_desc2'] ?? [];

$conn->query("DELETE FROM cursos_atuais WHERE nome_funcionario = '$nome'");

// Depois insere os novos
for ($i = 0; $i < count($curso_atual_nome); $i++) {
    $curso = $conn->real_escape_string($curso_atual_nome[$i]);
    $desc1 = $conn->real_escape_string($curso_atual_desc1[$i]);
    $desc2 = $conn->real_escape_string($curso_atual_desc2[$i]);
    $progresso = intval($progresso_curso_atual[$i]);

    $conn->query("INSERT INTO cursos_atuais (nome_funcionario, curso_nome, descricao_1, descricao_2, progresso)
                  VALUES ('$nome', '$curso', '$desc1', '$desc2', $progresso)");
}
$titulo_secao3 = $_POST['titulo_secao3'] ?? '';
$curso_pendente_nome = $_POST['curso_pendente_nome'] ?? [];
$curso_pendente_desc = $_POST['curso_pendente_desc'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Augebit</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="comeco">
    <img class="logo" src="./img/augebit.png" alt="" />
    <div class="texto">
      <h1 class="saudacao1">Olá, <?php echo $nome; ?>!</h1>
      <h1 class="saudacao2">Acompanhe seu desempenho nos treinamentos complementares</h1>
    </div>
  </div>

  <div class="tudo">
    <div class="tudo1">
      <div class="sidebar">
        <a href="" class="menu-item"><span class="icon home"></span></a>
        <a href="" class="menu-item"><span class="icon people"></span></a>
        <a href="" class="menu-item"><span class="icon docs"></span></a>
        <div class="icon-circle"><img src="img/chapeuu.png" alt="Home icon" /></div>
        <a href="" class="menu-item"><span class="icon grafico"></span></a>
        <a href="" class="menu-item"><span class="icon calendario"></span></a>
      </div>
      <div class="perfil">
        <a class="person" href=""></a>
      </div>
    </div>

    <div class="informacoes">
      <input type="text" class="section-title-input" value="<?= h($titulo_secao1) ?>" readonly />

      <input type="text" class="course-title-input" value="<?= h($curso1) ?>" readonly />

      <div class="completed-section">
        <div class="section1">
          <div class="progress-circle">
            <div class="circle-bg">
              <div class="circle-inner">
                <input type="number" class="percentage-input" value="<?= h($porcentagem1) ?>" min="0" max="100" readonly />
                <div class="percentage-label">% de acertos</div>
              </div>
            </div>
          </div>

          <div class="results-section">
            <div class="results-table">
              <div class="table-header">
                <input type="text" class="table-header-input" value="Critério" disabled />
                <input type="text" class="table-header-input" value="Resultado" disabled />
              </div>

              <?php
              for ($i = 0; $i < count($criterio1); $i++) {
                $crit = $criterio1[$i] ?? '';
                $resu = $resultado1[$i] ?? '';
                echo '
                  <div class="table-row">
                    <input type="text" class="table-input" value="' . h($crit) . '" readonly>
                    <input type="text" class="table-input" value="' . h($resu) . '" readonly>
                  </div>
                ';
              }
              ?>
            </div>
          </div>
        </div>

        <div class="section">
          <div class="info">
            <img class="summary-icon" src="./img/chapeu1.png" alt="" />
            <select class="desempenho" disabled>
              <option value="">Classifique o desempenho ▼</option>
              <option value="ruim" <?= $classificacao == 'ruim' ? 'selected' : '' ?>>Ruim</option>
              <option value="regular" <?= $classificacao == 'regular' ? 'selected' : '' ?>>Regular</option>
              <option value="bom" <?= $classificacao == 'bom' ? 'selected' : '' ?>>Bom</option>
              <option value="ótimo" <?= $classificacao == 'ótimo' ? 'selected' : '' ?>>Ótimo</option>
              <option value="excelente" <?= $classificacao == 'excelente' ? 'selected' : '' ?>>Excelente</option>
            </select>
          </div>

          <h1 class="resumo">Resumo da avaliação</h1>
          <div class="summary-card">
            <textarea class="summary-textarea" readonly><?= h($resumo) ?></textarea>
          </div>
        </div>
      </div>

      <!-- CURSOS ATUAIS -->
      <input type="text" class="section-title-input" value="<?= h($titulo_secao2) ?>" readonly />

      <div class="section2">
        <div class="current-courses">
          <?php
          for ($i = 0; $i < count($progresso_curso_atual); $i++) {
            $prog = $progresso_curso_atual[$i] ?? '';
            $nome = $curso_atual_nome[$i] ?? '';
            $desc1 = $curso_atual_desc1[$i] ?? '';
            $desc2 = $curso_atual_desc2[$i] ?? '';
            echo '
              <div class="course-card1">
                <div class="course-progress">
                  <input type="number" class="progress-input" value="' . h($prog) . '" min="0" max="100" readonly />%
                </div>
                <div class="course-info">
                  <input type="text" class="course-name-input" value="' . h($nome) . '" readonly />
                  <input type="text" class="course-desc-input1" value="' . h($desc1) . '" readonly />
                  <input type="text" class="course-desc-input" value="' . h($desc2) . '" readonly />
                </div>
              </div>
            ';
          }
          ?>
        </div>
      </div>

      <!-- CURSOS PENDENTES -->
      <div class="section2">
        <input type="text" class="section-title-input" value="<?= h($titulo_secao3) ?>" readonly />
        <div class="pending-courses">
          <?php
          for ($i = 0; $i < count($curso_pendente_nome); $i++) {
            $nome_p = $curso_pendente_nome[$i] ?? '';
            $desc_p = $curso_pendente_desc[$i] ?? '';
            // A imagem não está sendo enviada via POST, manter uma imagem padrão ou vazia
            $img_path = "./img/img" . ($i + 1) . ".png";
            echo '
              <div class="pending-card">
                <div class="pending-content">
                  <input type="text" class="pending-title-input" value="' . h($nome_p) . '" readonly />
                  <textarea class="pending-desc-textarea" readonly>' . h($desc_p) . '</textarea>
                </div>
                <img class="pending-illustration" src="' . $img_path . '" alt="" />
              </div>
            ';
          }
          ?>
        </div>
      </div>
    </div>

    <script src="script.js"></script>
  </div>

</body>
</html>
