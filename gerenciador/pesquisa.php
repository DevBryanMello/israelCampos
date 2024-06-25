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
<a class="btnVoltar" href="admin.php">Voltar</a>
    <div class="eventosPassados">
    <table>
        <tr>
            <th>Nome do Local</th>
            <th>Endereço</th>
            <th>Horario</th>
        </tr>

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
     foreach($eventoFiltrado as $ev){
        $oldTime = date('d/m/Y H:i', strtotime($ev['horario']));
        echo '<tr>';
        echo '<td>'.$ev['nome_local'].'</td>';
        echo '<td>'.$ev['endereco'].'</td>';
        echo '<td>'.$oldTime.'</td>';
        echo '</tr>';

}
}
?>
 </table>
</div>
</body>