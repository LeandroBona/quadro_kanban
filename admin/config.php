<?php
$host = 'localhost';
$user = 'root';
$password = 'root'; // Coloque a senha aqui, se houver (exemplo: $password = 'sua_senha')
$database = 'gerenciamento_tarefas';
$port = 3306;

$conexao = new mysqli($host, $user, $password, $database, $port);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
?>