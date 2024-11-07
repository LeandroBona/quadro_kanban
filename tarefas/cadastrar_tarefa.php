<?php
include '../admin/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $id_usuario = $_POST['id_usuario'];

    $query = "INSERT INTO tarefas (descricao, setor, prioridade, id_usuario) VALUES ('$descricao', '$setor', '$prioridade', $id_usuario)";
    if ($conexao->query($query) === TRUE) {
        header('Location: ../index.php'); // Redireciona após excluir
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar tarefa: " . $conexao->error . "</div>";
    }
}
?>
