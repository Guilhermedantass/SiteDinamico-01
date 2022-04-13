<?php
    session_start();
    
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH', 'http://localhost/FullStack/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //Banco de dados
    define('HOST','localhost');
    define('DB','sitedinamico');
    define('USER','root');
    define('PASS','');


    /*   */

    function pegaCargo($cargo){
        $arr = [
            '0' => 'Normal',    
            '1' => 'Sub Administrador',
            '2' => 'Administrador',
        ];

        return $arr[$cargo];
    }
?>