<?php
require_once ('../agendaConfig.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);

    $sql = "DELETE FROM agenda WHERE id = '$id'";
    $sql = $pdo->query($sql);

    header("Location: admin.php");

} else {
    header("Location: admin.php");
}
?>