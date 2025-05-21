<?php
$host = "localhost";
$usuario = "root";
$senha = ""; // coloque a senha do seu banco, se tiver
$banco = "seu_banco_de_dados"; // substitua pelo nome real do seu banco

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM funcionarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["cpf"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["rg"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["nascimento"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["genero"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["endereco"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["telefone"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["estado"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["pis"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["carteira"]) . "</td>";
    
    if (!empty($row["foto"])) {
      echo "<td><img src='uploads/" . htmlspecialchars($row["foto"]) . "' width='50'></td>";
    } else {
      echo "<td>Sem foto</td>";
    }

    echo "<td>
      <button class='editar' data-id='" . $row["id"] . "'>Editar</button>
      <button class='deletar' data-id='" . $row["id"] . "'>Excluir</button>
    </td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='13'>Nenhum funcionário encontrado.</td></tr>";
}

$conn->close();
?>
