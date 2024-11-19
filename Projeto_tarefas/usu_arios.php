<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
</head>
<header>
    <h1>CADASTRO DE USUÁRIOS</h1>
    <a href="usu_arios.php"><input type="button" value="Cadastro de Usuários"></a>
    <a href="tar_efas.php"><input type="button" value="Cadastro de Tarefas"></a>
    <a href="gerenciar.php"><input type="button" value="Gerenciamento de Tarefas"></a>
    <a href="tela_principal.php"><input type="button" value="Voltar"></a>
</header>
<body>
    <form action="usu_arios_inserir.php" method="post">
        <label for="Nome">Nome:</label>
        <input type="text" name="Nome" id="Nome" required>
        <br>
        <label for="Email">Email:</label>
        <input type="email" name="Email" id="Email" required>
        <br>
        <button type="submit" name="submit">Cadastrar</button>    
    </form>
</body>
<style>
    header {
        background-color: #3880fc;
        padding: 50px;
        text-align: center;
    }
</style>
</html>
