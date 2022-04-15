<?php
include('config.php');
include('inclusao_mensagem.php');
Site::updateUsuarioOnline();

site::contador();

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="<?php echo $base_url ?>estilo/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url ?>estilo/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descriçao do meu website">
    <meta name="keywords" content="Palavras-chaves,do meu, site">
    <title>Projeto 01</title>
    <link rel="icon" type="image/x-icon" href="<?php echo $base_url ?>images/favicon.png">
</head>

<body>


    <base base='<?php echo $base_url; ?>' />
    <?php 
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    switch ($url) {
        case 'Sobre':
            echo '<target target="sobre"></target>';
            break;
        case 'Servicos':
            echo '<target target="servicos"></target>';
            break;
    }

    ?>


    <header>
        <div class="center">

            <div class="logo left"><a href="<?php echo $base_url ?>">Logomarca</a></div>

            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo $base_url ?>home">Home</a></li>
                    <li><a href="<?php echo $base_url ?>Sobre">Sobre</a></li>
                    <li><a href="<?php echo $base_url ?>Servicos">Serviços</a></li>
                    <li><a realtime='contato' href="<?php echo $base_url ?>Contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile"><i class="fa-solid fa-bars"></i></div>
                <ul>
                    <li><a href="<?php echo $base_url ?>">Home</a></li>
                    <li><a href="<?php echo $base_url ?>Sobre">Sobre</a></li>
                    <li><a href="<?php echo $base_url ?>Servicos">Serviços</a></li>
                    <li><a realtime='contato' href="<?php echo $base_url ?>Contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </header>

    <div class="conteiner-principal">
        <?php

        if (file_exists('Pages/' . $url . '.php')) {
            include('Pages/' . $url . '.php');
        } else {
            if ($url != 'Sobre' and $url != 'Servicos') {
                $erro404 = true;
                include('Pages/404.php');
            } else {
                include('Pages/home.php');
            }
        }

        ?>
    </div>

    <footer <?php if (isset($erro4044)) echo "class='fixed'" ?>>
        <div class="center">
            <p>@ Todos direitos reservados</p>
        </div>
    </footer>


    <script src="<?php echo $base_url; ?>js/jquery.js"></script>
    <script src="<?php echo $base_url; ?>js/scripts.js"></script>
    <script src="<?php echo $base_url; ?>js/constantes.js"></script>

    <script src="<?php echo $base_url; ?>js/slider.js"></script>
    <?php
    if ($url == 'Contato' || $url == 'home' || $url == '') { ?>

    <script src="<?php echo $base_url; ?>js/textWrite.js"></script>

    <?php } ?>
</body>
<script src="<?php echo $base_url; ?>js/exemplo.js"></script>

</html>