<?php
namespace Formazion;

use Formazion\Core\Manager;

session_start();

require 'vendor/autoload.php';
include_once "core/Manager.class.php";

Manager::getInstance();

/***
 * @param $class
 */
function myAutoloader($classParams)
{
    $class = $classParams.'.class.php';
    $class = str_replace('Formazion\\Service\\', '', $class);
    $classModel = str_replace('Formazion\\Models\\', '', $classParams.'.php');
    $class = str_replace('Formazion\\Core\\', '', $class);

    if(file_exists("src/models/".$classModel)) {
        include_once("src/models/" . $classModel );
    } else if (file_exists("core/".$class)) {
        include_once "core/".$class;
    } else if (file_exists("src/services/".$class)) {
        include_once("src/services/" . $class);
    }
}

spl_autoload_register("Formazion\myAutoloader");

$uri = substr(urldecode($_SERVER["REQUEST_URI"]), strlen(dirname($_SERVER["SCRIPT_NAME"])));

$uri = ltrim($uri, "/");

$uri = explode("?", $uri);

$uriExploded = explode("/", $uri[0]);

$c = (empty($uriExploded[0]))?"index":$uriExploded[0];
$a = (empty($uriExploded[1]))?"index":$uriExploded[1];

$c = ucfirst(strtolower($c))."Controller";
$a = strtolower($a)."Action";

unset($uriExploded[0]);
unset($uriExploded[1]);

$uriExploded = array_values($uriExploded);

$params = [
    "POST"=>$_POST,
    "GET"=>$_GET,
    "URL"=>$uriExploded
];

if(file_exists("src/controllers/".$c.".class.php")){
    include "src/controllers/".$c.".class.php";
    $c = "Formazion\\Controller\\" . $c;
    if( class_exists($c) ){
        $objC = new $c();

        if( method_exists($objC, $a) ){
            $objC->$a($params);
        }else{
            die("L'action ".$a." n'existe pas");
        }
    }else{
        die("Le controller ".$c." n'existe pas");
    }
}else{
    die("Le fichier ".$c." n'existe pas");
}
