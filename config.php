<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');

$autoload = function ($class) {
    include('classes/' . $class . '.php');
};

spl_autoload_register($autoload);

$base_url = "http://" . $_SERVER['HTTP_HOST'];
// $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
// $config['base_url'] = $base_url;

define('INCLUDE_PATH', $base_url . '/FullStack/');
define('INCLUDE_PATH_PAINEL', INCLUDE_PATH . 'painel/');

define('BASE_DIR_PAINEL', __DIR__ . '/painel');
//Banco de dados
define('HOST', 'localhost');
define('DB', 'sitedinamico');
define('USER', 'root');
define('PASS', 'root');





/*   */

function pegaCargo($indice)
{

    return Painel::$cargos[$indice];
}

function selecionadoMenu($par)
{
    // <i class="fa-solid fa-arrow-left"></i>
    $url = explode('/', @$_GET['url'])[0];
    if ($url == $par) {
        echo 'class="menu-active"';
    }
}
function verificaPermissaoMenu($permissao)
{
    if ($_SESSION['cargo'] >= $permissao) {
        return;
    } else {
        echo 'style="display:none;"';
    }
}
function verificaPermissaoPagina($permissao)
{
    if ($_SESSION['cargo'] >= $permissao) {
        return;
    } else {
        include('painel/pages/permissao-negada.php');
        die();
    }
}

define('NOME_EMPRESA', 'Guilherme');

function recoverPost($post)
{
    if (isset($_POST[$post])) {
        echo $_POST[$post];
    }
}