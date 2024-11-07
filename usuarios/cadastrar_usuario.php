<?php
include '../admin/config.php';

// adicione aqui as variáveis que precisam ser armazenadas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $query = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    if ($conexao->query($query) === TRUE) {
        header('Location: ../index.php'); // Redireciona após excluir
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar: " . $conexao->error . "</div>";
    }
}
?>