<?php
    session_start();

    date_default_timezone_set('America/Sao_Paulo');
    
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);
    
    // $base_url = "http://" . $_SERVER['HTTP_HOST'];
    // $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    // $config['base_url'] = $base_url;

    define('INCLUDE_PATH', 'http://localhost/FullStack/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //Banco de dados
    define('HOST','localhost');
    define('DB','sitedinamico');
    define('USER','root');
    define('PASS','root');


    /*   */

    function pegaCargo($cargo){
        $arr = [
            '0' => 'Normal',    
            '1' => 'Sub Administrador',
            '2' => 'Administrador',
        ];

        return $arr[$cargo];
    }

    define('NOME_EMPRESA','Guilherme')








?>