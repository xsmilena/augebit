<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $rg = $_POST["rg"];
  $endereco = $_POST["endereco"];
  $genero = $_POST["genero"];
  $email = $_POST["email"];
  $telefone = $_POST["telefone"];
  $nascimento = $_POST["nascimento"];
  $estado_civil = $_POST["estado"];
  $pis_pasep = $_POST["PIS/PASEP"];
  $carteira_trabalho = $_POST["carteira"];

  // Upload da imagem (opcional)
  $foto = '';
  if (!empty($_FILES['foto']['name'])) {
    $fotoNome = uniqid() . "_" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $fotoNome);
    $foto = 'uploads/' . $fotoNome;
  }

  $sql = "INSERT INTO funcionarios (nome, cpf, rg, endereco, genero, email, telefone, nascimento, estado_civil, pis_pasep, carteira_trabalho, foto)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome, $cpf, $rg, $endereco, $genero, $email, $telefone, $nascimento, $estado_civil, $pis_pasep, $carteira_trabalho, $foto]);

  echo "Funcionário adicionado com sucesso!";
}
?>
