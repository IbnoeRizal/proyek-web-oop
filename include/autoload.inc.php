<?php
spl_autoload_register('pathfunct');

function pathfunct($kelas){
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    $url = $host . $uri;
    
    $path= "classes/";
    $extension= ".class.php";
    if(strpos($url,'include')){
        $path = "../classes/";
    }else if(strpos($url,'classes')){
        $path = "";
    }
    require_once $path.$kelas.$extension;
}