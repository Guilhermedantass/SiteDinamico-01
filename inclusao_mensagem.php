<?php
    include('classes/MySql.php');

    if (isset($_POST['acao'])) {
        # code...
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];

        $sql = MySql::conectar()->prepare("INSERT INTO `tb_mensagem` VALUES(NULL, ?,?,?,?,?)");

        $sql->execute(array($nome,$sobrenome, $email, $telefone,$mensagem));

    }else{

    }

?>