<?php
// Inclui o arquivo de configuração
include '../admin/config.php';

// Inicializa variáveis
$tarefa = null;
$usuarios = [];

// Verifica se foi passado um ID via GET e busca a tarefa correspondente
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Garantir que $id seja um inteiro para evitar injeção de SQL
    $query = "SELECT * FROM tarefas WHERE id = $id";
    $result = $conexao->query($query);

    if ($result) {
        $tarefa = $result->fetch_assoc();
    } else {
        echo "Erro ao buscar tarefa: " . $conexao->error;
    }
}

// Consulta para buscar todos os usuários cadastrados
$usuariosQuery = "SELECT id, nome FROM usuarios";
$usuariosResult = $conexao->query($usuariosQuery);

if ($usuariosResult) {
    while ($usuarioRow = $usuariosResult->fetch_assoc()) {
        $usuarios[] = $usuarioRow;
    }
}

// Verifica se o formulário foi enviado via POST para atualizar a tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $descricao = $conexao->real_escape_string($_POST['descricao']);
    $setor = $conexao->real_escape_string($_POST['setor']);
    $prioridade = $conexao->real_escape_string($_POST['prioridade']);
    $id_usuario = intval($_POST['id_usuario']);
    
    // Verifica e valida o valor de status
    $status = $conexao->real_escape_string($_POST['status']);
    $prioridadePermitidas = ['baixa', 'media', 'alta'];
    $statusPermitidos = ['a_fazer', 'fazendo', 'pronto'];
    
    if (!in_array($prioridade, $prioridadePermitidas) || !in_array($status, $statusPermitidos)) {
        echo "Erro: Prioridade ou Status inválido.";
        exit();
    }

    // Query para atualizar os dados da tarefa
    $updateQuery = "UPDATE tarefas SET descricao='$descricao', setor='$setor', prioridade='$prioridade', id_usuario='$id_usuario', status='$status' WHERE id=$id";
    
    // Executa a atualização e redireciona para a página inicial em caso de sucesso
    if ($conexao->query($updateQuery)) {
        header('Location: ../index.php');
        exit(); // Sempre use exit após redirecionar
    } else {
        echo "Erro ao atualizar tarefa: " . $conexao->error;
    }
}
?>

<!-- HTML do Formulário -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/css/style.css">
</head>
<body>
    <!-- Adicione uma nav bar com links ou botões -->
    <h1>Editar Tarefa</h1>
    <form method="POST" action="editar_tarefa.php">
        <!-- Campo oculto com o ID da tarefa -->
        <input type="hidden" name="id" value="<?php echo isset($tarefa['id']) ? $tarefa['id'] : ''; ?>">

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" required><?php echo isset($tarefa['descricao']) ? htmlspecialchars($tarefa['descricao']) : ''; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Setor</label>
            <input type="text" class="form-control" name="setor" value="<?php echo isset($tarefa['setor']) ? htmlspecialchars($tarefa['setor']) : ''; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prioridade</label>
            <select class="form-control" name="prioridade" required>
                <option value="baixa" <?php echo (isset($tarefa['prioridade']) && $tarefa['prioridade'] === 'baixa') ? 'selected' : ''; ?>>Baixa</option>
                <option value="media" <?php echo (isset($tarefa['prioridade']) && $tarefa['prioridade'] === 'media') ? 'selected' : ''; ?>>Média</option>
                <option value="alta" <?php echo (isset($tarefa['prioridade']) && $tarefa['prioridade'] === 'alta') ? 'selected' : ''; ?>>Alta</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Vinculado a</label>
            <select class="form-control" name="id_usuario" required>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?php echo $usuario['id']; ?>" <?php echo (isset($tarefa['id_usuario']) && $tarefa['id_usuario'] == $usuario['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($usuario['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-control" name="status" required>
                <option value="a_fazer" <?php echo (isset($tarefa['status']) && $tarefa['status'] === 'a_fazer') ? 'selected' : ''; ?>>A Fazer</option>
                <option value="fazendo" <?php echo (isset($tarefa['status']) && $tarefa['status'] === 'fazendo') ? 'selected' : ''; ?>>Em Andamento</option>
                <option value="pronto" <?php echo (isset($tarefa['status']) && $tarefa['status'] === 'pronto') ? 'selected' : ''; ?>>Concluída</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</body>
</html>
