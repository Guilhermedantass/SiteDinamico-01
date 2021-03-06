<?php
if (isset($_GET['loggout'])) {
    Painel::loggout();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/all.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title>
</head>

<body>

    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <?php if ($_SESSION['img'] == '') { ?>
                <div class="avatar-usuario">
                    <i class="fa fa-user"></i>
                </div>
                <?php } else { ?>

                <div class="img-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img'] ?>" alt="">
                </div>

                <?php } ?>
                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome'] ?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']) ?></p>
                </div>
            </div>
            <div class="itens-menu">
                <h2>Cadastro</h2>
                <a
                    <?php selecionadoMenu('cadastrar-depoimento'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-depoimento">Cadastrar
                    depoimentos</a>
                <a
                    <?php selecionadoMenu('cadastrar-servico'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-servico">Cadastrar
                    serviço</a>
                <a
                    <?php selecionadoMenu('cadastrar-slides'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-slides">Cadastrar
                    Slides</a>
                <h2>Gestão</h2>
                <a
                    <?php selecionadoMenu('listar-depoimentos'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-depoimentos">Listar
                    Depoimentos</a>
                <a <?php selecionadoMenu('listar-servicos'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-servicos">Listar
                    Serviços</a>
                <a <?php selecionadoMenu('listar-slides'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-slides">Listar
                    Slides</a>
                <h2>Administração do Painel</h2>
                <a <?php selecionadoMenu('editar-usuario'); ?>
                    href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuario">Editar
                    usuario</a>
                <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2) ?>
                    href="<?php echo INCLUDE_PATH_PAINEL; ?>adicionar-usuario">Adicionar
                    usuário</a>
                <h2>Notificações</h2>
                <a
                    <?php selecionadoMenu('listar-mensagens'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-mensagens">Listar
                    mensagem</a>
                <h2>Gestão de notícias</h2>
                <a
                    <?php selecionadoMenu('cadastrar-categoria'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-categoria">Cadastrar
                    Categoria</a>
                <a
                    <?php selecionadoMenu('listar-categorias'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-categorias">listar
                    Categorias</a>
                <a
                    <?php selecionadoMenu('cadastrar-noticia'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-noticia">Cadastrar
                    notícia</a>
                <a <?php selecionadoMenu('listar-noticias'); ?>href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-noticias">listar
                    notícias</a>
            </div>
        </div>
    </div>

    <header>
        <div class="center">
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
            <div class="loggout">
                <a <?php if (@$_GET['url'] == '' || @$_GET['url'] == 'home') { ?>
                    style="background-color:#686899; padding: 22px;" <?php } ?>
                    href="<?php INCLUDE_PATH_PAINEL; ?>home"><span>Home</span> <i class="fa fa-home"></i></a>
                <a href="<?php INCLUDE_PATH_PAINEL; ?>?loggout"><span>Sair</span> <i
                        class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
            <div class="clear"></div>
        </div>
    </header>

    <div class="content">
        <?php Painel::carregarPagina(); ?>

    </div>


    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
    <script src="https://cdn.tiny.cloud/1/5q1mmi8c6r0h9p67w5iaccalljiexbjquag2sc9026y0fhn8/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '.tinymce',
        plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
    </script>

</body>

</html>