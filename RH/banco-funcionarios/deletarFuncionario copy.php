<?php
include '../../conexao.php';

file_put_contents('log_debug.txt', "Nome recebido: " . $_POST['nome'] . PHP_EOL, FILE_APPEND);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o nome foi enviado
    if (!isset($_POST['nome']) || empty(trim($_POST['nome']))) {
        echo json_encode(['success' => false, 'error' => 'Nome não fornecido']);
        exit;
    }

    $nome = trim($_POST['nome']);

    // Verifica se o registro existe
    $query = $conn->prepare("SELECT * FROM dados_bancarios WHERE nome = ?");
    $query->bind_param("s", $nome);
    $query->execute();
    $resultado = $query->get_result();

    if ($resultado->num_rows === 0) {
        echo json_encode(['success' => false, 'error' => 'Registro bancário não encontrado']);
        $query->close();
        exit;
    }
    $query->close();

    // Realiza o DELETE
    $sql = "DELETE FROM dados_bancarios WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Requisição inválida']);
}
?>
