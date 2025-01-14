<?php
spl_autoload_register('pathfunct');

function pathfunct($kelas){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
    $path= "classes/";
    $extension= ".php";
    if(strpos($url,'include')){
        $path = "../classes/";
    }else if(strpos($url,'classes')){
        $path = "";
    }
    require_once $path.$kelas.$extension;
}