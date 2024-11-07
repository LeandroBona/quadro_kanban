<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <!-- Altere o nome da página-->
    <title>Cadastro de Usuários</title>
</head>
<body>
<!-- Adicione uma nav bar com links ou botões -->
    <div class="container mt-5">
        <h2>Cadastro de Usuário</h2>
        <form action="./usuarios/cadastrar_usuario.php" method="POST" class="mt-4">
            <!-- colocar os campos do formuário aqui -->
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="Assets/js/script.js"></script>
</body>
</html>
