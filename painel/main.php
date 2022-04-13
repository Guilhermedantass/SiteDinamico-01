<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/all.min.css">
    <link rel="stylesheet" href="<?php INCLUDE_PATH_PAINEL; ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title>
</head>

<body>

<div class="menu">
    <div class="box-usuario">
        <div class="avatar-usuario">
            <i class="fa fa-user"></i>
        </div> 
        <div class="nome-usuario">
            <p>Guilherme Dantas</p>
            <p>Administrador</p>
        </div>
    </div>


</div>
<header>
    <div class="center">
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
        <div class="loggout"> 
            <a href="<?php INCLUDE_PATH_PAINEL; ?>?loggout"><span>Sair</span> <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
        <div class="clear"></div>
    </div>
</header>

</body>

</html>