<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $Nome = $_POST['Nome'];
    $Email = $_POST['Email'];

    if ($statement = $conexao->prepare('INSERT INTO usuarios(usu_nome, usu_email) VALUES(?,?)')) {
        $statement->bind_param('ss', $Nome, $Email);
        $statement->execute();
        $statement->close();
    }
}
?>
