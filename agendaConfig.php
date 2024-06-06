<?php
date_default_timezone_set('America/Los_Angeles');

$dns = "mysql:dbname=israelCampos;host=localhost";
$dbuser = "root";
$dbpass = "";

try{
    $pdo = new PDO($dns,$dbuser,$dbpass);
    $sql = "SELECT * FROM agenda ORDER BY horario ASC";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){
        $dado = $sql->fetchAll();
    } else {
        $dado = 0;
    }

} catch(PDOException $e) {
    echo "Falhou: ".$e->getMessage();
}
