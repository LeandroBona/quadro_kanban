<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Assets/css/style.css">
    <title>Cadastro de Tarefa</title>
</head>
<body>
    <!-- Adicione uma nav bar com links ou botões -->
    <div class="container mt-5">
        <h2>Cadastro de Tarefa</h2>
        <form action="./tarefas/cadastrar_tarefa.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="form-group">
                <label for="setor">Setor:</label>
                <input type="text" class="form-control" id="setor" name="setor" required>
            </div>
            <div class="form-group">
                <label for="prioridade">Prioridade:</label>
                <select class="form-control" id="prioridade" name="prioridade">
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <select class="form-control" id="usuario" name="id_usuario">
                    <?php
                    include 'admin/config.php';
                    $result = $conexao->query("SELECT id, nome FROM usuarios");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Tarefa</button>
        </form>
    </div>
    <script src="Assets/js/script.js"></script>
</body>
</html>
