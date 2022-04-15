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
                <a href="">Cadastrar depoimentos</a>
                <a href="">Cadastrar serviços</a>
                <a href="">Cadastrar Slides</a>
                <h2>Gestão</h2>
                <a href="">Listar Depoimentos</a>
                <a href="">Listar Serviços</a>
                <a href="">Listar Slides</a>
                <h2>Administração do Painel</h2>
                <a href="">Editar usuario</a>
                <a href="">Adicionar usuário</a>
                <h2>Configuração Geral</h2>
                <a href="">Editar</a>
            </div>
        </div>
    </div>

    <header>
        <div class="center">
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div>
            <div class="loggout">
            <a href="<?php INCLUDE_PATH_PAINEL; ?>"><span>Home</span> <i
                        class="fa fa-home"></i></a>
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
</body>

</html>