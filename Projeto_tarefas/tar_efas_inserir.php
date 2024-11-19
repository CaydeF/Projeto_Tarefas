<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status'];
    $usu_codigo = $_POST['usu_codigo'];

    $statement = $conexao->prepare("INSERT INTO tarefas (tar_setor, tar_prioridade, tar_status, usu_codigo) VALUES (?, ?, ?, ?)");

    if ($statement === false) {
        die('Erro ao preparar a consulta: ' . $conexao->error);
    }

    $statement->bind_param('ssss', $setor, $prioridade, $status, $usu_codigo);

    if ($statement->execute()) {
        echo "Tarefa cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar tarefa: " . $statement->error;
    }

    $statement->close();
}

$conexao->close();
?>
