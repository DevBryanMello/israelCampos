<?php
require_once('../agendaConfig.php');

$id = 0;
    if(isset($_GET['id']) && !empty($_GET['id'])){ 
        $id = addslashes($_GET['id']);
    }

    if(isset($_POST['nome_local']) && !empty($_POST['nome_local'])){
        $nomeLocal = $_POST['nome_local'];
        $endereco = $_POST['endereco'];
        $horario = $_POST['horario'];

        $sql = "UPDATE agenda SET nome_local = '$nomeLocal', endereco = '$endereco', horario = '$horario' WHERE id = '$id'";
        $sql = $pdo->query($sql);

        header("Location: admin.php");
    }

    $sql = "SELECT * FROM agenda WHERE id = '$id'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
    } else {
        header("Location: admin.php");
    }

?>

<html lang="pt-BR">
<head>
    <title>Editar | BM</title>
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
</head>
<link rel="stylesheet" href="../assets/css/edit.css">

<form method="POST">
    <label for="nome_local">Nome do Local:</label>
    <input type="text" name="nome_local" value="<?php echo $dado['nome_local']?>"><br/>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" value="<?php echo $dado['endereco']?>"><br/>

    <label for="horario">Horario:</label>
    <input type="datetime-local" name="horario" value="<?php echo $dado['horario']?>"><br/>

    <input class="btn" type="submit" value="Atualizar">
<form>
</html>