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