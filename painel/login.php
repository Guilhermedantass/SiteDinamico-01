<?php
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password =$_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM  `tb_admin.usuarios` WHERE user = ? and password = ?");
        $sql->execute(array($user, $password));

        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];  
            
            header('location: '.INCLUDE_PATH_PAINEL);
            die();

        }
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

    <div class="box-login">
        <?php 
        if(isset($_POST['acao'])){
            $user = $_POST['user'];
            $password = $_POST['password'];

            $sql = MySql::conectar()->prepare("SELECT * FROM  `tb_admin.usuarios` WHERE user = ? and password = ?");
            $sql->execute(array($user, $password));

            if($sql->rowCount() == 1){
                $info = $sql->fetch();
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['cargo'] = $info['cargo'];
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['img'] = $info['img'];
                if(isset($_POST['lembrar'])){
                    setcookie('lembrar',true,time()+(60*60*24),'/');
                    setcookie('user',$user,time()+(60*60*24),'/');
                    setcookie('password',$password,time()+(60*60*24),'/');
                }

                header('location: '.INCLUDE_PATH_PAINEL);
                die();
            }else{
                echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorreta!</div>';
            }
        }
    
    ?>
        <h2>Efetue o login!</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <div class="form-group-login left">
                <input type="submit" value="Logar!" name="acao">
            </div>
            <div class="form-group-login right ">
                <label for="">Lembrar-me</label>
                <input type="checkbox" name="lembrar" id="">
            </div>

            <div class="clear"></div>
        </form>

    </div>


</body>

</html>