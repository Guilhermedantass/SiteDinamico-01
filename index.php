<?php
include('config.php');
include('inclusao_mensagem.php');
Site::updateUsuarioOnline();

site::contador();

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descriçao do meu website">
    <meta name="keywords" content="Palavras-chaves,do meu, site">
    <title>Projeto 01</title>
    <link rel="icon" type="image/x-icon" href="<?php echo INCLUDE_PATH ?>images/favicon.png">
</head>

<body>


    <base base='<?php echo INCLUDE_PATH  ?>' />
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

            <div class="logo left"><a href="<?php echo INCLUDE_PATH ?>home">Logomarca</a></div>

            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH ?>home">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>Sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>Servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>noticias">Notícias</a></li>
                    <li><a realtime='contato' href="<?php echo INCLUDE_PATH ?>Contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile"><i class="fa-solid fa-bars"></i></div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH ?>home">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>Sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>Servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>noticias">Notícias</a></li>
                    <li><a realtime='contato' href="<?php echo INCLUDE_PATH ?>Contato">Contato</a></li>
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
                $urlPar = explode('/', $url)[0];
                if ($urlPar != 'noticias') {
                    $erro404 = true;
                    include('Pages/404.php');
                } else {
                    include('Pages/noticias.php');
                }
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


    <script src="<?php echo INCLUDE_PATH  ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH  ?>js/scripts.js"></script>
    <script src="<?php echo INCLUDE_PATH  ?>js/constantes.js"></script>

    <script src="<?php echo INCLUDE_PATH  ?>js/slider.js"></script>
    <?php
    if ($url == 'Contato' || $url == 'home' || $url == '' || $url == 'noticias') { ?>

    <script src="<?php echo INCLUDE_PATH  ?>js/textWrite.js"></script>

    <?php } ?>
</body>
<script src="<?php echo INCLUDE_PATH  ?>js/exemplo.js"></script>

</html>