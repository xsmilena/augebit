<?php
include '../../conexao.php';

header('Content-Type: application/json');

// Atualize os campos abaixo para refletirem a nova estrutura da tabela
$sql = "SELECT nome, cargo, setor, horario_entrada, horario_saida, tipo_contrato, data_admissao, salario, sindicato FROM funcionarios";
$result = $conn->query($sql);

$funcionarios = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $funcionarios[] = $row;
    }
}

echo json_encode([
    'success' => true,
    'funcionarios' => $funcionarios
]);

$conn->close();
?>
