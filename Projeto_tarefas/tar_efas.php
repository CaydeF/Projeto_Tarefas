<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
</head>
<style>
    header{
        background-color: #3880fc;
        padding: 50px;
        text-align: center;
    }
</style>
<header>
    <h1>CADASTRO DE TAREFAS</h1>
    <a href="usu_arios.php"><input type="button" value="Cadastro de Usuários"></a>
    <a href="tar_efas.php"><input type="button" value="Cadastro de Tarefas"></a>
    <a href="gerenciar.php"><input type="button" value="Gerenciamento de Tarefas"></a>
    <a href="tela_principal.php"><input type="button" value="Voltar"></a>
</header>

<body>
    <form action="tar_efas_inserir.php" method="POST">
        <label for="setor">Setor:</label>
        <input type="text" name="setor" id="setor" required>
        <br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status" required>
        <br><br>

        <label for="prioridade">Prioridade:</label>
        <select name="prioridade" id="prioridade">
            <option value="Alta">Alta</option>
            <option value="Média">Média</option>
            <option value="Baixa">Baixa</option>
        </select>
        <br><br>

        <label for="usu_codigo">Usuário:</label>
        <select id="usu_codigo" >
            <option value="">Selecione um usuário</option>
            <?php
            include 'conexao.php';
            $sql = "SELECT usu_codigo, usu_nome FROM usuarios";
            $result = mysqli_query($conexao, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['usu_codigo']}'>{$row['usu_nome']}</option>";
            }
            mysqli_close($conexao);
            ?>
        </select>
        <br><br>

        <button type="submit" name="submit">Cadastrar Tarefa</button>
    </form>
    
</body>

</html>
