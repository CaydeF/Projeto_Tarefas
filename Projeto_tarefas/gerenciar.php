<?php
include 'conexao.php';

$sql = "SELECT tar_codigo, tar_setor, tar_prioridade, tar_status FROM tarefas";
$queryTarefas = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <script>
        function atualizarStatus(tarefaId) {
            const status = document.getElementById('status-' + tarefaId).value;
            const formData = new FormData();
            formData.append('tar_codigo', tarefaId);
            formData.append('status', status);

            fetch('atualizar_status.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("mensagem").innerHTML = data.mensagem;
            })
            .catch(error => {
                console.error('Erro:', error);
                document.getElementById("mensagem").innerHTML = "Erro ao atualizar o status.";
            });
        }

        function excluirTarefa(tarefaId) {
            if (confirm("Tem certeza de que deseja excluir esta tarefa?")) {
                const formData = new FormData();
                formData.append('tar_codigo', tarefaId);

                fetch('excluir_tarefa.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("mensagem").innerHTML = data.mensagem;
                    if (data.sucesso) {
                        document.getElementById('tarefa-' + tarefaId).remove();
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    document.getElementById("mensagem").innerHTML = "Erro ao excluir a tarefa.";
                });
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>GERENCIAMENTO DE TAREFAS</h1>
        <a href="usu_arios.php"><input type="button" value="Cadastro de Usuários"></a>
        <a href="tar_efas.php"><input type="button" value="Cadastro de Tarefas"></a>
        <a href="gerenciar.php"><input type="button" value="Gerenciamento de Tarefas"></a>
        <a href="tela_principal.php"><input type="button" value="Voltar"></a>
    </header>

    <section>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Setor</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($queryTarefas) > 0) {
                    while ($linhaTarefa = mysqli_fetch_assoc($queryTarefas)) {
                        echo "<tr id='tarefa-{$linhaTarefa['tar_codigo']}'>";
                        echo "<td>{$linhaTarefa['tar_codigo']}</td>";
                        echo "<td>{$linhaTarefa['tar_setor']}</td>";
                        echo "<td>{$linhaTarefa['tar_prioridade']}</td>";
                        echo "<td>
                                <select id='status-{$linhaTarefa['tar_codigo']}' class='statusSelect'>
                                    <option value='à fazer' " . ($linhaTarefa['tar_status'] == 'à fazer' ? 'selected' : '') . ">À fazer</option>
                                    <option value='em andamento' " . ($linhaTarefa['tar_status'] == 'em andamento' ? 'selected' : '') . ">Em andamento</option>
                                    <option value='concluído' " . ($linhaTarefa['tar_status'] == 'concluído' ? 'selected' : '') . ">Concluído</option>
                                </select>
                              </td>";
                        echo "<td>
                                <button onclick='atualizarStatus({$linhaTarefa['tar_codigo']})' class='btn-update'>Atualizar</button>
                                <button onclick='excluirTarefa({$linhaTarefa['tar_codigo']})' class='btn-delete'>Excluir</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhuma tarefa encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <p id="mensagem"></p>
    </section>
</body>
<style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
        }

        header{
        background-color: #3880fc;
        padding: 50px;
        text-align: center;
    }
    H1{
        color: black;
    }

        nav {
            background-color: #3880fc;
            display: flex;
            justify-content: center;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 25px;
            background-color: #444;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #3880fc;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1rem;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #3880fc;
            color: white;
        }

        .statusSelect {
            width: 100%;
        }

        .btn-update, .btn-delete {
            padding: 5px 10px;
            color: white;
            border: none;
            cursor: pointer;
        }

    </style>
</html>

<?php mysqli_close($conexao); ?>