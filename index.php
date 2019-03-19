<?php
namespace Formazion;

session_start();

require 'vendor/autoload.php';
require 'bootstrap.php'; 

/***
 * @param $class
 */
function myAutoloader($class)
{
    $class = $class.'.class.php';
    $class = str_replace('Formazion\\Service\\', '', $class);
    $class = str_replace('Formazion\\Model\\', '', $class);
    $class = str_replace('Formazion\\Core\\', '', $class);


    if(file_exists("models/".$class))
    {
        include_once("src/models/" . $class);
    } else if (file_exists("core/".$class))
    {
        include_once "core/".$class;
    } else if (file_exists("services/".$class)) {
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
