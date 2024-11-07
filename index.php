<!-- index.php -->
<?php
include 'admin/config.php'; // Arquivo de configuração do banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas - Kanban</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/css/style.css">
</head>
<body>
    <!-- Adicione uma nav bar com links ou botões -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Quadro Kanban</h2>
        <div class="row">
            <!-- Adicione botões para criar novas tarefas -->
            <!-- Coluna "A Fazer" -->
            <div class="col-md-4">
                <div class="kanban-column">
                    <h3 class="text-center">A Fazer</h3>
                    <?php
                    $result = $conexao->query("SELECT tarefas.*, usuarios.nome AS usuario_nome 
                    FROM tarefas 
                    LEFT JOIN usuarios ON tarefas.id_usuario = usuarios.id 
                    WHERE tarefas.status = 'a_fazer'");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='task-card'>";
                        echo "<p><strong>Descrição:</strong> {$row['descricao']}</p>";
                        echo "<p><strong>Setor:</strong> {$row['setor']}</p>";
                        echo "<p><strong>Prioridade:</strong> {$row['prioridade']}</p>";
                        echo "<p><strong>Vinculado a:</strong> {$row['usuario_nome']}</p>";

                        // Botões Editar e Excluir
                        echo "<a href='tarefas/editar_tarefa.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>";
                        echo "<a href='tarefas/excluir_tarefa.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir esta tarefa?\");'>Excluir</a>";
                        
                        // Formulário para alterar status
                        echo "<form action='tarefas/alterar_status.php' method='POST' class='mt-2'>";
                        echo "<input type='hidden' name='id' value='{$row['id']}'>";
                        echo "<select name='status' class='form-select form-select-sm' style='width: auto; display: inline-block;'>";
                        echo "<option value='a_fazer' " . ($row['status'] === 'a_fazer' ? 'selected' : '') . ">A Fazer</option>";
                        echo "<option value='fazendo' " . ($row['status'] === 'fazendo' ? 'selected' : '') . ">Fazendo</option>";
                        echo "<option value='pronto' " . ($row['status'] === 'pronto' ? 'selected' : '') . ">Pronto</option>";
                        echo "</select>";
                        echo "<button type='submit' class='btn btn-info btn-sm'>Alterar Status</button>";
                        echo "</form>";

                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Coluna "Fazendo" -->
            <div class="col-md-4">
                <div class="kanban-column">
                    <h3 class="text-center">Fazendo</h3>
                    <?php
                    $result = $conexao->query("SELECT tarefas.*, usuarios.nome AS usuario_nome 
                    FROM tarefas 
                    LEFT JOIN usuarios ON tarefas.id_usuario = usuarios.id 
                    WHERE tarefas.status = 'fazendo'");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='task-card'>";
                        echo "<p><strong>Descrição:</strong> {$row['descricao']}</p>";
                        echo "<p><strong>Setor:</strong> {$row['setor']}</p>";
                        echo "<p><strong>Prioridade:</strong> {$row['prioridade']}</p>";
                        echo "<p><strong>Vinculado a:</strong> {$row['usuario_nome']}</p>";

                        echo "<a href='tarefas/editar_tarefa.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>";
                        echo "<a href='tarefas/excluir_tarefa.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir esta tarefa?\");'>Excluir</a>";
                        
                        // Formulário para alterar status
                        echo "<form action='tarefas/alterar_status.php' method='POST' class='mt-2'>";
                        echo "<input type='hidden' name='id' value='{$row['id']}'>";
                        echo "<select name='status' class='form-select form-select-sm' style='width: auto; display: inline-block;'>";
                        echo "<option value='a_fazer' " . ($row['status'] === 'a_fazer' ? 'selected' : '') . ">A Fazer</option>";
                        echo "<option value='fazendo' " . ($row['status'] === 'fazendo' ? 'selected' : '') . ">Fazendo</option>";
                        echo "<option value='pronto' " . ($row['status'] === 'pronto' ? 'selected' : '') . ">Pronto</option>";
                        echo "</select>";
                        echo "<button type='submit' class='btn btn-info btn-sm'>Alterar Status</button>";
                        echo "</form>";

                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <!-- Coluna "Pronto" -->
            <div class="col-md-4">
                <div class="kanban-column">
                    <h3 class="text-center">Pronto</h3>
                    <?php
                    $result = $conexao->query("SELECT tarefas.*, usuarios.nome AS usuario_nome 
                    FROM tarefas 
                    LEFT JOIN usuarios ON tarefas.id_usuario = usuarios.id 
                    WHERE tarefas.status = 'pronto'");
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='task-card'>";
                        echo "<p><strong>Descrição:</strong> {$row['descricao']}</p>";
                        echo "<p><strong>Setor:</strong> {$row['setor']}</p>";
                        echo "<p><strong>Prioridade:</strong> {$row['prioridade']}</p>";
                        echo "<p><strong>Vinculado a:</strong> {$row['usuario_nome']}</p>";

                        echo "<a href='tarefas/editar_tarefa.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>";
                        echo "<a href='tarefas/excluir_tarefa.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir esta tarefa?\");'>Excluir</a>";
                        
                        // Formulário para alterar status
                        echo "<form action='tarefas/alterar_status.php' method='POST' class='mt-2'>";
                        echo "<input type='hidden' name='id' value='{$row['id']}'>";
                        echo "<select name='status' class='form-select form-select-sm' style='width: auto; display: inline-block;'>";
                        echo "<option value='a_fazer' " . ($row['status'] === 'a_fazer' ? 'selected' : '') . ">A Fazer</option>";
                        echo "<option value='fazendo' " . ($row['status'] === 'fazendo' ? 'selected' : '') . ">Fazendo</option>";
                        echo "<option value='pronto' " . ($row['status'] === 'pronto' ? 'selected' : '') . ">Pronto</option>";
                        echo "</select>";
                        echo "<button type='submit' class='btn btn-info btn-sm'>Alterar Status</button>";
                        echo "</form>";

                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="Assets/js/script.js"></script>
</body>
</html>

</html>
