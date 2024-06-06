<?php
require_once('../agendaConfig.php');

    if(isset($_POST['nome_local']) && !empty($_POST['nome_local'])) {
        $nomeLocal = $_POST['nome_local'];
        $endereco = $_POST['endereco'];
        $horario = $_POST['horario'];
        
        $sql = "INSERT INTO agenda SET nome_local = '$nomeLocal', endereco = '$endereco', horario = '$horario'";
        $sql = $pdo->query($sql);
        header("Location: admin.php");
    }
?>

<head>
    <title>Adicionar Usuário | BM</title>
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
</head>
<link rel="stylesheet" href="../assets/css/add.css">

<form method="POST">
    <label for="nome_local">Nome do Local:</label>
    <input type="text" name="nome_local"><br>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco"><br>

    <label for="horario">Horario:</label>
    <input type="datetime-local" name="horario"><br>

    <input class="btn" type="submit" value="Cadastrar Evento">
<form>