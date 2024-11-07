<?php
include '../admin/config.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = $conexao->real_escape_string($_POST['status']);
    
    // Atualiza o status da tarefa
    $query = "UPDATE tarefas SET status = '$status' WHERE id = $id";
    
    if ($conexao->query($query)) {
        header('Location: ../index.php'); // Redireciona após atualizar o status
        exit();
    } else {
        echo "Erro ao alterar status da tarefa: " . $conexao->error;
    }
} else {
    echo "Dados inválidos.";
}
?>
