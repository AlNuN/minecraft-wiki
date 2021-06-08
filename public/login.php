<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft - Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main>
        <h1>Login de Acesso</h1>
        <form action="menu.php" method="post">
            <div class="form-field">
                <label for="email" >Login do Jogador:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-field">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
            </div>
            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>