<?php
session_start(); 
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ 
    ?>
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Admin | Israel Campos</title>
</head>
<body>
    <div class="area-site">
        <div class="site-area">
            <h1>Seus próximos eventos:</h1>
            <div class="eventos-proximos">         
                <table border="0">
                <tr>
                    <th>Nome do Local</th>
                    <th>Endereço</th>
                    <th>Horario</th>
                    <th>Ações</th>
                </tr>
                <?php
                
                require_once('../agendaConfig.php');
                require_once('./configDatas.php');
                require_once('./pesquisa.php');
                $sql = "SELECT * FROM agenda ORDER BY horario ASC";
                $sql = $pdo->query($sql);

                $hoje = date('Y-m-d H:i:s');
                if($sql->rowCount() > 0){
                    foreach($sql->fetchAll() as $agenda){
                        $horarioNovo = date('d/m/Y'.' - '.'H:i', strtotime($agenda['horario']));
                    
                        if($agenda['horario'] > $hoje){
                            echo '<tr>';
                            echo '<td>'.$agenda['nome_local'].'</td>';
                            echo '<td>'.$agenda['endereco'].'</td>';
                            echo '<td>'.$horarioNovo.'</td>';
                            echo '<td><a class="editBtn" href="editar.php?id='.$agenda['id'].'">Editar</a> - <a class="deleteBtn" href="deletar.php?id='.$agenda['id'].'">Exluir</a></td>';
                            echo '</tr>';
                        }
                    }
                }
                ?>
                </table>
            </div>
            <div class="adicionar">
                <a class="btnAdd" href="adicionar.php">Adicionar Novo Evento +</a>
            </div>
            <div class="data-passada">
                <div class="data-cabecalho">
                    <h1>Shows anteriores:</h1>
                    
                    <form method="GET" action="pesquisa.php" >
                        <input type="date" id="date" name="date" class="search" >
                        <input type="submit" value="Enviar">
                    </form>

                </div>
                <div class="body-datasPassadas">
                    <table class="eventosAnteriores" border="0">
                    <tr>
                        <th>Nome do Local</th>
                        <th>Endereço</th>
                        <th>Horario</th>
                    </tr>
                    <?php 
                    foreach($dadosAgenda as $datasPassadas) {
                        if($datasPassadas['horario'] < $hoje){
                            $horarioPassado = date('d-m-Y H:i', strtotime($datasPassadas['horario']));
                            echo '<tr>';
                            echo '<td>'.$datasPassadas['nome_local'].'</td>';
                            echo '<td>'.$datasPassadas['endereco'].'</td>';
                            echo '<td>'.$horarioPassado.'</td>';
                        }
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>

<?php 
} else {
    header("Location: login.php");
}
?>

