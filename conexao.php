<?php 
    define('HOST','localhost');
    define('DB','sitedinamico');
    define('USER','root');
    define('PASS','');


    try{
        $pdo = new PDO('mysql:host='.HOST.';dbname='.DB,USER, PASS, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }catch(Exception $e){
        echo 'Opss, parece que ocorreu um erro';
    }



?>