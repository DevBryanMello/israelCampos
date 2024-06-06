<?php
require_once('../agendaConfig.php');

try {
    $sql = "SELECT * FROM agenda";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
        $dadosAgenda = $sql->fetchAll();
    } else {
        $dadosAgenda = 0;
    }

} catch(PDOException $e){
    echo "Falhou: ".$e->getMessage();
}

?>
