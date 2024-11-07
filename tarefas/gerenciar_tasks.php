<?php
include '/admin/config.php';
$id = intval($_GET['id']);

$query = "DELETE FROM tarefas WHERE id = $id";
if ($conexao->query($query) === TRUE) {
    header('Location: ../index.php'); // Redireciona após excluir
    exit();
} else {
    echo "<div class='alert alert-danger'>Erro ao excluir tarefa: " . $conexao->error . "</div>";
}
?>
