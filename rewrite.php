<?php
$requri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathinfo = urldecode($requri);

// Se o arquivo existir então não usa o rewrite
if (is_file($pathinfo)) {
    return false;
}

//Testa com regex a rota, se falha envia false e o PHP procura um arquivo de verdade ou emite erro 404
if (!preg_match('#^/download/([a-z0-9\-]+)\.csv#', $pathinfo, $match)) {
     return false;
}

// Se o preg_match fizer o "match" então simula a passagem do _GET e chama o csv.php
$_GET['date'] = $match[1];

require 'csv.php';