<?php
    include('conexao.php');

    if (isset($_POST['acao'])) {
        # code...
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];

        $sql = $pdo->prepare("INSERT INTO `tb_mensagem` VALUES(NULL, ?,?,?,?,?)");

        $sql->execute(array($nome,$sobrenome, $email, $telefone,$mensagem));

    }else{

    }

?>