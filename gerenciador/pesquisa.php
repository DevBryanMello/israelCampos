<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/pesquisa.css">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Pesquisa | Israel Campos</title>
</head>  
<body>
    <table>
        
    </table>

</body>

<?php
require_once('../agendaConfig.php');

    $sql = "SELECT * FROM agenda ";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        $dados = $sql->fetchAll();
    } else {
        $dados = 0;
    }
    $filtrarByData = 0;


    if(isset($_GET['date']) && !empty($_GET['date'])){
        $inputDate = $_GET['date'];
        $filtrarByData = date('mY ', strtotime($inputDate));
        $eventoFiltrado = [];
    foreach($dados as $d){
        $dataEvento = date('mY', strtotime($d['horario']));
        if(intval($filtrarByData) == intval($dataEvento)){
            $eventoFiltrado[$d['id']] = $d;
        }
    }
    echo "<h1>Data pesquisada é: ".date('d/m/Y',strtotime($inputDate))."</h1>";
   // print_r($eventoFiltrado);
     foreach($eventoFiltrado as $ev){
        echo "<pre>"; 
        echo $ev['nome_local'];
}
}
?>

    