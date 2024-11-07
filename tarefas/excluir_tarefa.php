<?php
include '../admin/config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM tarefas WHERE id = $id";
    
    if ($conexao->query($query)) {
        header('Location: ../index.php'); // Redireciona após excluir
        exit();
    } else {
        echo "Erro ao excluir tarefa: " . $conexao->error;
    }
} else {
    echo "ID inválido.";
}
?>
