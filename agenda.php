<?php
require('agendaConfig.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/frames/fonticons/css/all.min.css">
    <link rel="stylesheet" href="assets/css/agenda.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <script src="assets/js/script.js"></script>
    <title>Agenda - Israel Campos</title>
</head>
<body>
    <header>
        <div class="cabecalho">
            <a href="index.html"><img src="assets/images/logoIsrael.png" alt="Logo"></a>
            <nav>
                <ul class="menu">
                    <li><a href="index.html">Início</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="agenda.html">Agenda</a></li>
                    <li><a href="fotos.html">Fotos</a></li>
                    <li><a href="contato.html">Contato</a></li>
                </ul>
                <div onclick="showMenu()" class="mobile-menu-icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </nav>
        </div>
       
    </header>
    <div id="menu" class="menu-mobile" >
        <ul>
            <li class="nav-item"><a href="index.html">Início</a></li>
            <li class="nav-item"><a href="sobre.html">Sobre</a></li>
            <li class="nav-item"><a href="agenda.html">Agenda</a></li>
            <li class="nav-item"><a href="fotos.html">Fotos</a></li>
            <li class="nav-item"><a href="contato.html">Contato</a></li>
        </ul>
    </div>
    
    <section id="agenda">
    <?php
        if($dado == 0){
            echo "<h1/ style='color:#fff;margin-top:50px;'>Sem eventos próximos</h1>";
        }else {
            foreach($dado as $d){
                $date = date('d/m/Y H:i', strtotime($d['horario']));
                if($d['horario'] > $date){   
    ?>
        <div class="evento">
            <div class="data"><?=$date;?></div>
            <div class="info">
                <div class="nome"><?php echo $d['nome_local']; ?></div>
                <div class="endereco"><?=$d['endereco'];?></div>
            </div>
        </div>
    <?php }}} ?>
    </section>

    <footer>
        <div class="submenu">
            <div class="textoFooter">
                <p>&copy; Todos os direitos reservados - <i>BM</i> - 2024 </p>
            </div>
            <div class="redesSociais">
                <span>Redes Sociais:</span>
                <div class="logo-redes">
                    <a class="instagram" target="_blank" href="https://www.instagram.com/israelcampos___/"><img src="assets/images/instagram.svg"></a>
                    <a class="facebook" target="_blank" href="https://www.facebook.com/israel.campos.7311352"><img src="assets/images/facebook.svg"></a>
                    <a class="youtube" target="_blank" href="https://www.youtube.com/@israelcampos_"><img src="assets/images/youtube.svg"></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>